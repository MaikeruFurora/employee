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
class EmployeesExport implements FromCollection,ShouldAutoSize,WithHeadings
{
  public function collection()
  {
        return Employee::select(
          'id',
          'name',
          'position',
          'dateEmployed',
          'sex',
          'dob',
          'pob',
          'employeeNumber',
          'station',
          'civilStatus')->get();
  }

  public function headings(): array
  {
      return [
        "ID",
        "NAME",
        "POSITION",
        "DATE EMPLOYED",
        "SEX",
        "DOB",
        "POB",
        "EMPLOYEE NUMBER",
        "STATION",
        "CIVIL STATUS",
      ];
  }
}
