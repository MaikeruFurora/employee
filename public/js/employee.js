$('#alertSuccess').hide();
$('#alertSuccessEdit').hide();
let table = $('#example').DataTable({
    ajax:"employee/list",
    columns:[
        {data:"name",orderable:false},
        {data:"position",orderable:false},
        {data:"dateEmployed",orderable:false},
        {data:"employeeNumber",orderable:false},
        {data:null,
          orderable:false,
          render:function(data,row,type){
            return `<center>
                      <button type="submit" id="${data.id}" style="font-size:10px" class="delete btn btn-sm btn-danger">Delete</button>
                      <button type="submit" id="${data.id}" style="font-size:10px" class="edit btn btn-sm btn-primary" data-toggle="modal" data-target="#editEmployee">Edit</button>
                      <a href="record/${data.id}" style="font-size:10px" class="btn btn-sm btn-warning">View</a>
                    </center>`;
          }
        }
    ]
});
function submitform(name)
{ var bool = true;
 $('#'+name+' .form-control').each(function(){
   if($(this).val() == ''){
     $(this).removeClass('is-valid').addClass('is-invalid');
     bool = false;
   }else{
      $(this).removeClass('is-invalid').addClass('is-valid');
   }
 });
 if (bool && name=='addEmployee') { 
    addEmployee();
    table.ajax.reload();
     $('#addEmployee')[0].reset();
     $('.form-control').removeClass('is-valid');
     $('#alertSuccess').show().fadeOut(3000);
  }

  if (bool && name=='EditEmployeeForm') { 
    updateEmployee();
    table.ajax.reload();
     $('.form-control').removeClass('is-valid');
     $('#alertSuccessEdit').show().fadeOut(3000);
  }
}
function addEmployee() {
  $.ajax({
    url:'/employee',
    type:'post',
    dataType:'json',
    data:$('#addEmployee').serialize(),
    success:function(data){},
  });
}

function updateEmployee() {
  id=$('#id').val();
  $.ajax({
    url:'/employee/'+id,
    type:'put',
    // dataType:'json',
    data:$('#EditEmployeeForm').serialize(),
    success:function(data){},
  });
}

$(document).on('click','.delete',function(e){
  e.preventDefault();
  if (confirm('Are you sure you want to delete it?')) {
    $.ajax({
      url:'/employee/remove',
      type:'get',
      //dataType:'json',
      data:{id:$(this).attr('id')},
      success:function(data){
        table.ajax.reload();},
    }); 
  }else{ return false; }
});

$(document).on('click','.edit',function(e){
  id=$(this).attr('id')
  e.preventDefault();
  $.ajax({
    url:'/employee/'+id+'/edit',
    type:'get',
    dataType:'json',
    success:function(data){
      $('#id').val(data.response.id);
      $('#name').val(data.response.name);
      $('#dateEmployed').val(data.response.dateEmployed);
      $('#position').val(data.response.position);
      $('#sex').val(data.response.sex);
      $('#dob').val(data.response.dob);
      $('#pob').val(data.response.pob);
      $('#employeeNumber').val(data.response.employeeNumber);
      $('#station').val(data.response.station);
      $('#civilStatus').val(data.response.civilStatus);
      table.ajax.reload();},
  });   
});
 materialKit.initFormExtendedDatetimepickers();