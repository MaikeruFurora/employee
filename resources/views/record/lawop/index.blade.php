@extends('layouts.app')

@section('content')
<div class="container my-5"><br>
 {{--  <?php

    $a_date = "2020-02-20";
echo date("Y-m-t", strtotime($a_date));

  ?> --}}
  <div class="card">
    <div class="card-header card-header-primary p-2">
      <button class="btn btn-link btn-sm text-white font-weight-bold" style="font-size: 13px">
        LEAVE AND WITHOUT PAY &nbsp;&nbsp;&nbsp;[ <em><b>"{{ $employee->name }}"</b></em> ]
      </button>
      <div class="float-right">
        <a href="{{ url('record/'.$employee->id) }}" style="font-size:10px" class="btn btn-sm btn-warning">BACK</a>
         <a id="checkPrint" class="btn btn-success btn-sm">Download Certificate</a>
         <button id="select" value="{{ $employee->id }}" class="btn btn-info btn-sm">Print Selected</button>
      </div>
      <input type="hidden" id="employee_id" value="{{ $employee->id }}">
    </div>
    <div class="card-body">
      
      <table id="example" class="table table-bordered text-center table-striped" style="font-size: 11px">
       <style type="text/css">
         .page-item .page-link{
          font-size: 10px;
          font-weight: bold;

         }
         .text-danger{
           color:red; 
          }
       </style>
        <input type="hidden" id="hideID" value="{{ $employee->id }}">
        <thead>
           <tr>
            <td style="background-color: #4d6600" colspan="8" class="font-weight-bold text-white">RECORD OF LEAVE</td>
          </tr>
          <tr class="font-weight-bold text-white">
            <td style="background-color: #86b300" width="1%">Select</td>
            <td style="background-color: #86b300" width="20%">Inclusive Dates</td>
            <td style="background-color: #86b300" width="6">No.of Days Leave</td>
            <td style="background-color: #86b300" width="6">Service Credit Balance</td>
            <td style="background-color: #86b300" width="6">Leave W/OUT PAY</td>
            <td style="background-color: #86b300" width="6">Nature of Leave</td>
            <td style="background-color: #86b300" width="6">DSO No.</td>
            <td style="background-color: #86b300" width="10%">Remarks</td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
{{-- @include('record.lawop.modal') --}}
@endsection
@section('js')
<script src="{{ asset('js/lawop.js') }}"></script>
@endsection
