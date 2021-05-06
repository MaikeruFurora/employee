let id=$('#hideID').val();
$('#alertSuccess').hide();
$('#alertEdit').hide();
function submitform(name)
{ var bool;
  var boolArray=[];
 $('#'+name+' .form-control').each(function(){
   if($(this).val() == ''){
     $(this).removeClass('is-valid').addClass('is-invalid');
     	bool = false;
   }else{
      $(this).removeClass('is-invalid').addClass('is-valid');
   		bool=true;
		boolArray.push(bool);
   }

 });
 
if (name=='formLeaveCard' && boolArray.length > 0) {
	 leaveForm();
	 $('#formLeaveCard')[0].reset();
	 $('.form-control').removeClass('is-valid is-invalid');
	 $('#alertSuccess').show().fadeOut(3000);
   $('#minus_noOfDaysLeave').prop("disabled", false);
  $('#add_noOfDaysCredited').prop("disabled", false);
		table.ajax.reload();
}

if (name=='formLeaveCardEdit' && boolArray.length > 0) {
	 leaveFormUpdated();
	 //$('#formLeaveCardEdi')[0].reset();
	 $('.form-control').removeClass('is-valid is-invalid');
	 $('#alertEdit').show().fadeOut(3000);
	 table.ajax.reload();
}

}//last function statement


function closeModal() {
	$('.form-control').removeClass('is-valid is-invalid');
}

function leaveForm() {
	$.ajax({
		url:'/record',
		type:'post',
	    dataType:'json',
	    data:$('#formLeaveCard').serialize(),
	    success:function(data){},
	})
}

function leaveFormUpdated() {
	$.ajax({
		url:'/record/'+$('#record_id').val(),
		type:'PUT',
	    //dataType:'json',
	    data:$('#formLeaveCardEdit').serialize(),
	    success:function(data){},
	})
}


$(document).on('click','.delete',function(e){
  e.preventDefault();
  if(confirm('Are you sure you want to delete it?')){
      $.ajax({
        url:'/record/remove/one',
        type:'get',
        //dataType:'json',
        data:{id:$(this).attr('id')},
        success:function(data){ table.ajax.reload(); },
      }); 
  }else{
      return false;
  }
});

$(document).on('click','.edit',function(e){
  e.preventDefault();
  var id=$(this).attr('id');
	$.ajax({
	url:'/record/'+id+'/edit',
	dataType:'json',
	success:function(data){
		// console.log(data);
		$('#inclusivePeriod').val(data.response.inclusivePeriod);
		$('#natureOfActivity').val(data.response.natureOfActivity);
		$('#noOfDaysCredited').val(data.response.noOfDaysCredited);
		$('#dsoNumber1').val(data.response.dsoNumber1);
		$('#inclusiveDates').val(data.response.inclusiveDates);
		$('#noOfDaysLeave').val(data.response.noOfDaysLeave);
		$('#serviceCreditBalance').val(data.response.serviceCreditBalance);
		$('#leaveWithoutpay').val(data.response.leaveWithoutpay);
		$('#natureOfLeave').val(data.response.natureOfLeave);
		$('#dsoNumber2').val(data.response.dsoNumber2);
		$('#remarks').val(data.response.remarks);
		$('#record_id').val(data.response.id);
	}
  }); 
});


let table = $('#example').DataTable({
	lengthChange: false,
    searching: false,
    Paginate:true,
    ordering: false,
    pageLength: 10,
    ajax:"/record/list/"+id,
    columns:[
        {data:"inclusivePeriod"},
        {data:"natureOfActivity"},
        {data:"noOfDaysCredited"},
        {data:"dsoNumber1"},
        {data:"inclusiveDates"},
        {data:"noOfDaysLeave"},
        {data:"serviceCreditBalance"},
        {data:"leaveWithoutpay"},
        {data:"natureOfLeave"},
        {data:"dsoNumber2"},
        {data:"remarks"

        },
        {data:null,
          render:function(data,row,type){
            return `<center>
                      <button type="submit" id="${data.record_id}" style="font-size:9px" class="delete btn btn-sm btn-danger pl-2 pr-2" ><i class="material-icons">delete_sweep</i></button>
                      </center>`;
          }
        },
        {data:null,
          render:function(data,row,type){
            return `<center><button type="submit" id="${data.record_id}" style="font-size:10px" class="edit btn pl-2 pr-2 btn-sm btn-primary" data-toggle="modal" data-target="#leaveCardEdit"><i class="material-icons">edit</i></button>
                    </center>`;
          }
        }
    ],
  //   columnDefs: [ {
  //   targets: [4,5,6,7,8,9,10],
  //   "createdCell": function (td, cellData, rowData, row, col) {
  //   		$(td).css('color', 'red')
      
  //   }
  // } ],

   'rowCallback': function(row, data, index){
    if(data.remarks=="W/OUT PAY"){
        $(row).find('td:eq(10)').css('color', 'red');
    }
  },


});

function fetching(){
  $.ajax({
      url:'/record/list/'+id,
      type:'GET',
      dataType:'json',
      success:function(response){
        if (parseInt(response.data.length) != 0) {
          $('#checkExport').click(function(){
              $(this).attr('href','/export/'+id);  
              $(this).text('Downloading...');
          });
          
          $('#printRecord').attr('href','/print/record/'+id);
          $('#printRecord').attr('target','_blank');
        }else{
          $('#checkExport').attr('href','#');
          $('#printRecord').attr('href','#');
          $('#checkExport').click(function(){
            $(this).text('No data Record Leave, Sorry');
          });
          $('#printRecord').click(function(){
            $(this).text('No data Record Leave, Sorry');
          })
        }
      }
  });
}

fetching();

function getLastValue(handleData){
  $.ajax({
    url:'/record/last/'+id,
    type:'get',
      success:function(data){
        handleData(data.serviceCreditBalance);
      },
  })
}

getLastValue(function(output){

  $('#last_serviceCreditBalance').val((isNaN(parseFloat(output))?'':parseFloat(output)));
  $('#add_noOfDaysCredited').on('input', function() {
     var total= $('#last_serviceCreditBalance').val(parseFloat($('#add_noOfDaysCredited').val()) + parseFloat($('#last_serviceCreditBalance').val()));

     if (isNaN(total.val())){
      $('#last_serviceCreditBalance').val(output);
     }
     if (this.value>=0) {
      $('#minus_noOfDaysLeave').prop("disabled", true);
     } 
     if(!this.value){
      $('#minus_noOfDaysLeave').prop("disabled", false);
     }
    });

   $('#minus_noOfDaysLeave').on('input', function() {
     var total= $('#last_serviceCreditBalance').val(parseFloat($('#last_serviceCreditBalance').val())-parseFloat($('#minus_noOfDaysLeave').val()));
     if (isNaN(total.val())){
      $('#last_serviceCreditBalance').val(output);
     }
     if (this.value>=0) {
      $('#add_noOfDaysCredited').prop("disabled", true);
     } 
     if(!this.value){
      $('#add_noOfDaysCredited').prop("disabled", false);
     }
    });

});


/**
*
* TO FOLLOW
*
**/
// $('#search_natureOfActivity').keyup(function(){
//   var query=$(this).val();
//   var _token = $('input[name="_token"]').val();

//   if (query!='') {
//     $.ajax({
//       url:'/record/autocomplete/',
//       type:'post',
//       data:{query:query,_token:_token},
//       success:function(data){
//         console.log(data);
//         $('#show_natureOfActivity').fadeIn();
//         $('#show_natureOfActivity').html(data);
//       }
//     })
//   }
// })