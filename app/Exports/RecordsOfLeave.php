<?php

namespace App\Exports;

use App\Record;
use App\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class RecordsOfLeave implements FromCollection,ShouldAutoSize,WithHeadings
{
  public function collection()
  {
        return Record::select(
            'employee_id',
            'inclusivePeriod',
            'natureOfActivity',
            'noOfDaysCredited',
            'dsoNumber1',
            'inclusiveDates',
            'noOfDaysLeave',
            'serviceCreditBalance',
            'leaveWithoutpay',
            'natureOfLeave',
            'dsoNumber2',
            'remarks')->get();
  }

  public function headings(): array
  {
      return [
        "EMPLOYEE_ID",
        "INCLUSIVE PERIOD",
        "NATURE OF AVTIVITY",
        "NO OF DAYS CREATED",
        "DSO NUMBER",
        "INCLUSIVE DATES",
        "NUMBER OF DAYS LEAVE",
        "SERVICE CREDIT BALANCE",
        "LEAVE WITHOUT PAY",
        "NATURE OF LEAVE",
        "DSO NUMBER",
        "REMARKS",
      ];
  }
}
