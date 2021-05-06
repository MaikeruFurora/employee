@extends('layouts.app')

@section('content')
<div class="container  my-5">
<br>
<div class="card shadow-sm">
  <div class="card-header card-header-primary p-2">
     <button class="btn btn-sm btn-link text-white font-weight-bold" style="font-size: 13PX">LIST OF EMPLOYEES</button>
    <div class="nav-tabs-navigation float-right">
      <div class="nav-tabs-wrapper">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">
              <i class="material-icons">group_add</i>
              ADD EMPLOYEE
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#importFile">
              <i class="material-icons">import_export</i>
              IMPORT CSV FILE
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card-body" style="font-size: 13px">
    <!-- Button trigger modal -->
   
    <style type="text/css">
        .page-item .page-link{
          font-size: 9px;
          font-weight: bold;

         }
    </style>
    <div class="table-responsive">
    <table id="example" class="table table-striped table-bordered" style="width:100%;">
      <thead>
          <tr>
              <th vwidth="30%">Name</th>
              <th width="11%">Position</th>
              <th width="12%">Date Employed</th>
              <th width="5%">Emp.No.</th>
              <th width="25%" style="text-align: center;">Action</th>
          </tr>
      </thead>
      <tbody></tbody>
    </table>
    </div>
  </div>
</div>

</div>
@include('employee.addEmployee.index')
@include('employee.editEmployee.index')
@include('employee.importEmployee.index')
@endsection
@section('js')
<script src="{{ asset('js/employee.js') }}"></script>
<script src="{{ asset('js/import.js') }}"></script>
@endsection
