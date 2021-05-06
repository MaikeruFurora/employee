@extends('layouts.app')

@section('content')<br><br>
<div class="container my-5 z-depth-1">


  <!--Section: Content-->
  <section class="dark-grey-text">

    <div class="row pr-lg-5">
      
      <div class="col-md-5 d-flex align-items-center">
        <div>
          
          <h3 class="font-weight-bold mb-4">Welcome User <small style="font-size: 14px"><time><?php echo date("F d, Y")."&nbsp;&nbsp;". date("l") ; ?></time></small></h3>
            <p>To backup your data Just click the button below to download and copy it in you drive (eg.flashdrive ).</p>
            <hr>
            <blockquote style="font-size: 13px">
              <em>" {{ $random }} "</em>
            </blockquote>
            {{-- <a href="{{ url('/export/database/db') }}" class="btn btn-info">backup</a> --}}
           
            <button type="button" class="btn btn-orange btn-rounded mx-0 mb-3" >PROJECT VERSION 1.0</button>
            <div class="card">{{-- data-toggle="modal" data-target="#exampleModalCenter" --}}
              <div class="card-header text-center card-header-success">
                BACKUP DATABASE
              </div>
              <div class="card-body">
                <table class="table">
                 <thead align="center">
                    <tr>
                    <th>Database Table</th>
                    <th>Download</th>
                  </tr>
                 </thead>
                  <tr>
                    <td align="left">List of employees</td>
                    <td><a id="list" href="{{ url('/export/csv/employees') }}" class="btn btn-sm btn-info"><i class="material-icons">keyboard_arrow_down</i>&nbsp;
                    &nbsp;Download</a></td>
                  </tr>
                   <tr>
                    <td align="left">Leave Records</td>
                    <td><a id="leave" href="{{ url('/export/csv/records') }}" class="btn btn-sm btn-info"><i class="material-icons">keyboard_arrow_down</i>&nbsp;
                    &nbsp;Download</a></td>
                  </tr>
                  <tr>
                    <td align="left">Database Table SQL</td>
                    <td><a id="sql" href="{{ url('/export/database/backup_database') }}" class="btn btn-sm btn-info"><i class="material-icons">keyboard_arrow_down</i>&nbsp;
                    &nbsp;Download</a></td>
                  </tr>
                </table>
              </div>
            </div>
        </div>
      </div>
      <div class="col-md-7 mb-1 mt-5">

        <div class="view">
          <?php
          $v_Month="February";
          $m_Month="May";
          $d_Month="December";
          ?>
          <?php if ($v_Month==date("F")) {?>
          <img src="{{ asset('assets/img/f.png') }}" class="img-fluid" alt="smaple image">
          <?php }elseif ($m_Month==date("F")){?>
          <img src="{{ asset('assets/img/m.png') }}" class="img-fluid" alt="smaple image">
          <?php }elseif ($d_Month==date("F")) { ?>
           <img src="{{ asset('assets/img/d.png') }}" class="img-fluid" alt="smaple image">
          <?php }else{ ?>
           <img src="{{ asset('assets/img/develop.png') }}" class="img-fluid" alt="smaple image">
          <?php } ?>
        </div>

      </div>

    </div>

  </section>
  <!--Section: Content-->
</div>
@include('about')
@endsection
@section('js')
<script type="text/javascript">
  $('#list ,#leave ,#sql').click(function(){  
        $(this).text('Downloading...');
        //$(this).attr('href','#');
  });
</script>
@endsection
