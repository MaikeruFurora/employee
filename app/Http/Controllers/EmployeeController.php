<?php

namespace App\Http\Controllers;
use App\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\facades\Excel;
class EmployeeController extends Controller
{
  
    function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {
       return view('employee.index');
    }

   
    // public function export()
    // {
    //     return Excel::download(new EmployeesExport,'sample.csv');   
    // }

    public function store()
    {
        Employee::create([
            "name"=> request('name'),
            "position"=> request('position'),
            "dateEmployed"=> request('dateEmployed'),
            "sex"=> request('sex'),
            "dob"=> request('dob'),
            "pob"=> request('pob'),
            "employeeNumber"=> request('employeeNumber'),
            "station"=> request('station'),
            "civilStatus"=> request('civilStatus')
        ]);
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit(Employee $employee)
    {
        return response()->json(["response"=>$employee]);
    }

   
    public function update(Request $request, Employee $employee)
    {

        $employee->update([
            "name"=> request('name'),
            "position"=> request('position'),
            "dateEmployed"=> request('dateEmployed'),
            "sex"=> request('sex'),
            "dob"=> request('dob'),
            "pob"=> request('pob'),
            "employeeNumber"=> request('employeeNumber'),
            "station"=> request('station'),
            "civilStatus"=> request('civilStatus'),
        ]);

    }
    public function removeEmployee()
    {
        return Employee::destroy(request('id'));
    }
    public function list()
    {
        return response()->json(["data"=>Employee::all()]);
    }

    public function importEmployee(Request $request)
    {
        $data= request('file');
        $extension = $data->getClientOriginalExtension();
        if ($extension=='csv') {
            if ($data) {
                $filename = request('file');
                $file = fopen($filename, "r");
                $row=1; $error=false;
                $employees=array();
                $name=$position=$dateEmployed=$dob=$pob=$employeeNumber=$station=$civilStatus=$sex=null;
                while (($data=fgetcsv($file,10000,","))!==FALSE) {
                if ($row==1) { $row++; continue; }
                if (empty($data[0])) { $error=true; }else{ $name=$data[0]; }
                if (empty($data[1])) { $error=true; }else{ $position=$data[1]; }
                if (empty($data[2])) { $error=true; }else{ $dateEmployed=$data[2]; }
                if (empty($data[3])) { $error=true; }else{ $sex=$data[3]; }
                if (empty($data[4])) { $error=true; }else{ $dob=$data[4]; }
                if (empty($data[5])) { $error=true; }else{ $pob=$data[5]; }
                if (empty($data[6])) { $error=true; }else{ $employeeNumber=$data[6]; }
                if (empty($data[7])) { $error=true; }else{ $station=$data[7]; }
                if (empty($data[8])) { $error=true; }else{ $civilStatus=$data[8]; }
                  array_push($employees,[
                    'name'=>$name,
                    'position'=>$position,
                    'dateEmployed'=>$dateEmployed,
                    'sex'=>$sex,
                    'dob'=>$dob,
                    'pob'=>$pob,
                    'employeeNumber'=>$employeeNumber,
                    'station'=>$station,
                    'civilStatus'=>$civilStatus
                  ]);
                }
                if ($error) {
                   return response()->json("empty");
                }else{
                    Employee::insert($employees);
                }
           }
        }else{
             return response()->json("invalid");
        }
    }

}
