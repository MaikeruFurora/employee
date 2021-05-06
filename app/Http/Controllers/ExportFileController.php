<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\RecordsExport;
use App\Exports\EmployeesExport;
use App\Exports\RecordsOfLeave;
use Maatwebsite\Excel\facades\Excel;
use App\Employee;
use App\Record;
class ExportFileController extends Controller
{
     public function xslx_export(Employee $employee)
    {
        return Excel::download(new RecordsExport($employee['id']),strtr(ucwords($employee['name']), ' ','_').'_'.date("F_d_Y").'.xlsx');
    }
    
    public function csv_employees()
    {
    	return Excel::download(new EmployeesExport,'Employees_List '.date("F_d_Y").'.xlsx');
    }

    public function csv_records()
    {
    	return Excel::download(new RecordsOfLeave,'Records_Of_Leave '.date("F_d_Y").'.xlsx');
    }

    public function backup_database(){

        //ENTER THE RELEVANT INFO BELOW
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');
        $backup_name        = "mybackup.sql";
        $tables             = array("users","employees","records"); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach($tables as $table)
        {
         $show_table_query = "SHOW CREATE TABLE " . $table . "";
         $statement = $connect->prepare($show_table_query);
         $statement->execute();
         $show_table_result = $statement->fetchAll();

         foreach($show_table_result as $show_table_row)
         {
          $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
         }
         $select_query = "SELECT * FROM " . $table . "";
         $statement = $connect->prepare($select_query);
         $statement->execute();
         $total_row = $statement->rowCount();

         for($count=0; $count<$total_row; $count++)
         {
          $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
          $table_column_array = array_keys($single_result);
          $table_value_array = array_values($single_result);
          // $val=($table_value_array=='')?$table_value_array="NULL":$table_value_array;
          // $output .= "\nINSERT INTO $table (";
          // $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
          // $output .= "'" . implode("','", $table_value_array) . "');\n";

          $output .= "\nINSERT INTO $table (";
          $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
          $output .= '"' . implode('","', $table_value_array) . '");';
         }
        }
        $file_name = 'database_backup_on_' . date("F_d_Y") . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);


    }
}
