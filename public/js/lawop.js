let id=$('#hideID').val();
let table = $('#example').DataTable({
	lengthChange: false,
    searching: false,
    Paginate:true,
    ordering: false,
    pageLength: 20,
    ajax:"/record/lawopList/"+id,
    columns:[
    {data:null,
          render:function(data,row,type){
            return `<input name="check_lawop[]" class="check_lawop" style="width: 20px;height: 20px;" type="checkbox" value="${data.record_id}"> `;
          }
        },
        {data:"inclusiveDates"},
        {data:"noOfDaysLeave"},
        {data:"serviceCreditBalance"},
        {data:"leaveWithoutpay"},
        {data:"natureOfLeave"},
        {data:"dsoNumber2"},
        {data:"remarks"},
    ],
});

$('#select').attr('disabled',true);
$(document).click(function(){
  var checkbox = $('.check_lawop:checked');
  if (checkbox.length >0) {
    $('#select').attr('disabled',false);
  }else{
    $('#select').attr('disabled',true);
  }
});

function fetching(){
  $.ajax({
      url:'/record/lawopList/'+id,
      type:'GET',
      dataType:'json',
      success:function(response){
        if (parseInt(response.data.length) != 0) {
          // $('#checkPrint').attr('href','/print/certificate/'+id);
          // $('#checkPrint').attr('target','_blank');
          $('#checkPrint').attr('href', '/print/cert/' + id);
          // $('#checkPrint').attr('target','_blank');
          
        }else{
          $('#checkPrint').attr('href','#');
          $('#checkPrint').removeClass('btn-success');
          $('#checkPrint').addClass('btn-danger');
          $('#checkPrint').text('CAN\'T PRINT');
          $('#checkPrint').attr('target','');
        }
      }
  });
}

$("#checkPrint").on("click", function () {
  $(this).text("Downloading...");
});


fetching();


$('#select').click(function(){
  var checkbox = $('.check_lawop:checked');
  var id=$('#select').val();
  if (checkbox.length >0) {
     var checkbox_value=[];
     $(checkbox).each(function(){
      checkbox_value.push($(this).val());
     });
     $.ajax({
        url:'/print/selected/'+id,
        method:'GET',
        data:{
          id:$('#employee_id').val(),
          checkbox_value:checkbox_value
        },
        success:function(res){
            window.open(this.url, '_blank');
        },
     });
  }else{
    alert('Select atleast one Records');
  }
});

// let submitform = (name) => {
//   let bool = true;
//   $('#'+name+' .form-control').each(function(){
//     if($(this).val() == ''){
//       $(this).removeClass('is-valid').addClass('is-invalid');
//       bool = false;
//     }else{
//        $(this).removeClass('is-invalid').addClass('is-valid');
//     }
//   });
//   if (bool) {
//     $.ajax({
//       method: "POST",
//       url: "/print/cert/" + id,
//       data: $("#cerfModal").serialize()
//     })
//     $('#'+name)[0].reset();
//     $('.form-control').removeClass('is-valid is-invalid');
//  }
// }

// let closeModal = () => {
// 	$('.form-control').removeClass('is-valid is-invalid');
// }
