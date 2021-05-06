<?php

namespace App\Exports;

use App\Record;
use App\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class RecordsExport implements ShouldAutoSize,FromView
{
    use Exportable;
     public function __construct(int $teahcer_id)
    {
        $this->teahcer_id = $teahcer_id;
    }

    public function View(): View
    {
        $employee = Employee::find($this->teahcer_id);
        $prints = Record::where('employee_id',$this->teahcer_id)->get();
        return view('excel.record.index',compact('prints','employee'));
    }
}
