$(document).ready(function () {
	$('#field').change(function(){
		window.location.href = "/admin/statements/index/"+$('#field').find('option:selected').html();
	});
});
