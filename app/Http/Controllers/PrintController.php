<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Record;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Element\Table;

class PrintController extends Controller
{
    public function printRecord($id)
    {
    	$prints = Employee::select(
            'employees.name',
            'employees.position',
            'employees.dateEmployed',
            'employees.sex',
            'employees.dob',
            'employees.pob',
            'employees.employeeNumber',
            'employees.station',
            'employees.civilStatus',
            'employees.id',
            'records.id as leave_id',
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
           )->join('records','employees.id','=','records.employee_id')
            ->where('employees.id',$id)->get();
        return view('print.record.index',compact('prints'));
    }

    public function natureLeave($var){
        $findMe="";
        switch ($var) {
            case 'SL':
            $findMe="Sick leave w/out pay";
            break;
            case 'VL':
            $findMe="Vacation leave w/out pay";
            break;
            default:
            $findMe="Undefined N-o-L";
            break;
            return $findMe;
        }
    }

    public function downloadWord($id)
    {
        $cerfs = Employee::select(
            'employees.name',
            'employees.position',
            'employees.dateEmployed',
            'employees.sex',
            'employees.dob',
            'employees.pob',
            'employees.employeeNumber',
            'employees.station',
            'employees.civilStatus',
            'employees.id',
            'records.id as leave_id',
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
            )->join('records','employees.id','=','records.employee_id')
            ->where(['employees.id'=>$id,'records.remarks'=>'W/OUT PAY'])->get();
            (intval($cerfs->count())<=10)?$templateToBeUse="template.docx":$templateToBeUse="columnTwo.docx";
            $templateProcessor = new TemplateProcessor("word-template/".$templateToBeUse);    
            $arr= array();
            $arr1= array();
            $arr2= array();
           foreach($cerfs as $cerf){
                $templateProcessor->setValue('name',$cerf->name); 
                $templateProcessor->setValue('position',$cerf->position); 
                $templateProcessor->setValue('station',$cerf->station); 
                $templateProcessor->setValue('dateNow',date("jS")." day of ".date("F Y")); 
                $filename = $cerf->name;
            }
        
           $num=(int) ($cerfs->count()/2 );
           $left=(int) ($cerfs->count()-$num);
           if (intval($cerfs->count())<=10) {
               foreach($cerfs as $cerf){
                   switch ($cerf->natureOfLeave) {
                        case 'SL':
                        $findMe="Sick leave w/out pay";
                        break;
                        case 'VL':
                        $findMe="Vacation leave w/out pay";
                        break;
                        default:
                        $findMe="Undefined N-o-L";
                        break;
                    }
                    $arr[] = array('inclusiveDates'=>$cerf->inclusiveDates,'natureOfLeave'=>$findMe);
               }
                $templateProcessor->cloneRowAndSetValues('inclusiveDates',$arr);
            }else{
                foreach($cerfs as $cerf){
                    switch ($cerf->natureOfLeave) {
                        case 'SL':
                        $findMe="Sick leave w/out pay";
                        break;
                        case 'VL':
                        $findMe="Vacation leave w/out pay";
                        break;
                        default:
                        $findMe="Undefined N-o-L";
                        break;
                        return $findMe;
                    }
                     $arr1[] = array('inclusiveDates'=>$cerf->inclusiveDates,'natureOfLeave'=>$findMe);
                }
                $templateProcessor->cloneRowAndSetValues('inclusiveDates',$arr1);
                // for ($i=0; $i <max($num,$left); $i++) {
                    // $findLeave1=$this->natureLeave($cerfs[$i]['natureOfLeave']);
                    // $arr1[] = array('inclusiveDates'=>$cerfs[$i]['inclusiveDates'],'L'=>$cerfs[$i]['natureOfLeave']);
                // }
                // for ($j=max($num,$left); $j <$cerfs->count(); $j++){
                    // $findLeave2=$this->natureLeave($cerfs[$j]['natureOfLeave']);
                    // $arr2[] = array('inclusiveDates1'=>$cerfs[$j]['inclusiveDates'],'L1'=>$cerfs[$j]['natureOfLeave']);
                // }
                // $templateProcessor->cloneRowAndSetValues('inclusiveDates1',$arr2);
            }
        $templateProcessor->saveAs($filename."_".date("F_d_Y")."_.docx");
        return response()->download($filename."_".date("F_d_Y")."_.docx");
    }

    public function printCertificate($id)
    {
    	$cerfs = Employee::select(
            'employees.name',
            'employees.position',
            'employees.dateEmployed',
            'employees.sex',
            'employees.dob',
            'employees.pob',
            'employees.employeeNumber',
            'employees.station',
            'employees.civilStatus',
            'employees.id',
            'records.id as leave_id',
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
            )->join('records','employees.id','=','records.employee_id')
            ->where(['employees.id'=>$id,'records.remarks'=>'W/OUT PAY'])->get();
        return view('print.certificate.index',compact('cerfs'));   
    }

    public function printSelected(Employee $employee)
    {
        $array_id = request('checkbox_value');
        $cerfs = Record::whereIn('id',$array_id)->get();
        return view('print.selected.index',compact('cerfs','employee'));
    }
}
