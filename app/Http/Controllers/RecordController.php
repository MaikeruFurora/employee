<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Export\RecordsExport;
use Maatwebsite\Excel\facades\Excel;
use App\Employee;
use App\Record;
use DB;
class RecordController extends Controller
{
   
    public function index()
    {
       // 
    }

 
    public function create()
    {
        //
    }

    public function store()
    {
        Record::create([
            'employee_id'=>request('employee_id'),
            'inclusivePeriod'=>request('inclusivePeriod'),
            'natureOfActivity'=>request('natureOfActivity'),
            'noOfDaysCredited'=>request('noOfDaysCredited'),
            'dsoNumber1'=>request('dsoNumber1'),
            'inclusiveDates'=>request('inclusiveDates'),
            'noOfDaysLeave'=>request('noOfDaysLeave'),
            'serviceCreditBalance'=>request('serviceCreditBalance'),
            'leaveWithoutpay'=>request('leaveWithoutpay'),
            'natureOfLeave'=>request('natureOfLeave'),
            'dsoNumber2'=>request('dsoNumber2'),
            'remarks'=>request('remarks'),
        ]);
    }

  
    public function show(Employee $employee)
    {
        return view('record.leave.index',compact('employee'));
    }

    public function lawop(Employee $employee)
    {
        return view('record.lawop.index',compact('employee'));
    }
   
    public function edit($id)
    {
         return response()->json(['response'=>Record::findOrFail($id)]);    }


    public function update(Record $record)
    {
         $record->update([
            'inclusivePeriod'=>request('inclusivePeriod'),
            'natureOfActivity'=>request('natureOfActivity'),
            'noOfDaysCredited'=>request('noOfDaysCredited'),
            'dsoNumber1'=>request('dsoNumber1'),
            'inclusiveDates'=>request('inclusiveDates'),
            'noOfDaysLeave'=>request('noOfDaysLeave'),
            'serviceCreditBalance'=>request('serviceCreditBalance'),
            'leaveWithoutpay'=>request('leaveWithoutpay'),
            'natureOfLeave'=>request('natureOfLeave'),
            'dsoNumber2'=>request('dsoNumber2'),
            'remarks'=>request('remarks'),
        ]);
    }

   
     public function removeRecord()
    {
       Record::destroy(request('id'));
    }

    public function list($id)
    {
        $result=Employee::select(
            'employees.id',
            'records.id as record_id',
            'records.inclusivePeriod',
            'records.natureOfActivity',
            'records.noOfDaysCredited',
            'records.dsoNumber1',

            'records.inclusiveDates',
            'records.noOfDaysLeave',
            'records.serviceCreditBalance',
            'records.leaveWithoutpay',
            'records.natureOfLeave',
            'records.dsoNumber2',
            'records.remarks'

            )
            ->join('records','employees.id','=','records.employee_id')
            ->where('employees.id',$id)->get();

        return response()->json(["data"=>$result]);
    }

     public function lawopList($id)
    {

        $data=Employee::select(
            'records.id as record_id',
            'records.inclusiveDates',
            'records.noOfDaysLeave',
            'records.serviceCreditBalance',
            'records.leaveWithoutpay',
            'records.natureOfLeave',
            'records.dsoNumber2',
            'records.remarks'
           )->join('records','employees.id','=','records.employee_id')
            //->join('records', 'employees.id','=','records.teacher_id')
            ->where(['employees.id'=>$id,'records.remarks'=>'W/OUT PAY'])->get();

        return response()->json(["data"=>$data]);
    }

    public function csv_employees(Request $request)
    {
        $employee_id=$request->get('employee_id');
        $data= $request->file('file');
        $extension = $data->getClientOriginalExtension();
        if ($extension=='csv') {
            if ($data) {
                $filename = request('file');
                $file = fopen($filename, "r");
                $row=1;
                $employees=array();
                $name=$position=$dateEmployed=$dob=$pob=$employeeNumber=$station=$civilStatus=$sex='';
                while (($data=fgetcsv($file,10000,"`"))!==FALSE) {
                //if ($row<=) { $row++; continue; }
                $inclusivePeriod=(empty($data[0]))?null:strval($data[0]); 
                $natureOfActivity=(empty($data[1]))?null:strval($data[1]); 
                $noOfDaysCredited=(empty($data[2]))?null:strval($data[2]); 
                $dsoNumber1=(empty($data[3]))?null:strval($data[3]); 
                $inclusiveDates=(empty($data[4]))?null:strval($data[4]); 
                $noOfDaysLeave=(empty($data[5]))?null:strval($data[5]); 
                $serviceCreditBalance=(empty($data[6]))?null:strval($data[6]); 
                $leaveWithoutpay=(empty($data[7]))?null:strval($data[7]); 
                $natureOfLeave=(empty($data[8]))?null:strval($data[8]); 
                $dsoNumber2=(empty($data[9]))?null:strval($data[9]); 
                $remarks=(empty($data[10]))?null:strval($data[10]); 
                  array_push($employees,[
                    'employee_id'=>$employee_id,
                    'inclusivePeriod'=>$inclusivePeriod,
                    'natureOfActivity'=>$natureOfActivity,
                    'noOfDaysCredited'=>$noOfDaysCredited,
                    'dsoNumber1'=>$dsoNumber1,
                    'inclusiveDates'=>$inclusiveDates,
                    'noOfDaysLeave'=>$noOfDaysLeave,
                    'serviceCreditBalance'=>$serviceCreditBalance,
                    'leaveWithoutpay'=>$leaveWithoutpay,
                    'natureOfLeave'=>$natureOfLeave,
                    'dsoNumber2'=>$dsoNumber2,
                    'remarks'=>$remarks
                  ]);
                }
                Record::insert($employees);
           }
        }else{
             return response()->json("invalid");
        }
    }

    public function autocomplete_natureActivity()
    {
        if (request('query')) {
            $query=request('query');
            $data=DB::table('records')->where('natureOfActivity','LIKE','%{$query}%')->get();
            $output='<ul class="dropdown-menu" style="display:block;position:relative">';
                    foreach ($data as $value) {
                        $output.='<li><a href="#">'.$value->natureOfActivity.'</a></li>';
                    }
            $output.='<ul>';
            echo $output;
        }
    }

    public function lastRecord(Request $request)
    {
        $data = Record::select('serviceCreditBalance')->where('employee_id',$request->id)->get()->last();
        return $data;
    }
}
