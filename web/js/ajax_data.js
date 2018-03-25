function saveCertTemplate ()
{
	$.ajax({
		url: 'index.php?r=used-template/save-ajax-cert',
		type  : 'post',
		data: $('#f_cert').serialize(),
		success: function(data) {
			alert(data.result);	
			location.reload();
			closeModal() ;
			return true;
		},
		error: function () {
			alert("have error");
		}
	});
	return false;
}

function closeModal() 
{
	$("#modal-setting-cert-template").hide();
	$("#modal-setting-cert-template").fadeOut(300);
}
