$('.alertloading').hide();
$('#importEmployee').submit(function(e){
	e.preventDefault();
	$.ajax({
		url:'/employee/import',
		type:'POST',
		enctype: 'multipart/form-data',
		processData: false, //Important!
		contentType: false,
		cache: false,
		data: new FormData(this),
		beforeSend:function(){
            $('.alertloading').show();
        },

		success:function(data){
			if (data=='invalid') {

				$('.text-danger').show().text('Invalid files, please check your upload file');
				// $('.form-control').addClass('is-invalid');

			}else if(data=='empty'){

				$('.text-danger').show().text('Some of Cell are Empty, Please check carefully');
				// $('.form-control').addClass('is-invalid');
				
			}else{
				table.ajax.reload();
				$('.text-danger').show().text('Success!');
				$('#importEmployee')[0].reset();	
			}
			// $(this).prop('disabled', true);
			
		},

		complete:function(){
            $('.alertloading').hide();
        },
	});
});

function closeModal(name) {
	$('#'+name)[0].reset();
	$('.text-danger').hide();
}

$('#importLeaveFile').submit(function(e){
	e.preventDefault();
	$.ajax({
		url:'/record/xlsx/import',
		type:'POST',
		enctype:'multipart/form-data',
		processData:false,
		contentType:false,
		cache:false,
		data:new FormData(this),
		beforeSend:function(){
			$('.alertloading').show();
		},
		success:function(data){
			if (data=='invalid') {
				$('.text-danger').show().text('Invalid files, please check your upload file');
			}else{
				table.ajax.reload();
				$('.text-danger').show().text('Success!');
				$('#importLeaveFile')[0].reset();	
			}
		},
		complete:function(){
			$('.alertloading').hide();
		}
	})
})