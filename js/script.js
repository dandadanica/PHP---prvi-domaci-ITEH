$(document).ready(function() {
	
	$('#sort').change(function() {
		document.location.href = 'http://localhost/iteh1/proizvodi.php?sort=' + $(this).val();
	});
	
	$('.link_delete').click(function() {
		var ask = confirm('Da li ste sigurni?');
		var url = $(this).attr('href');
		var id = $(this).parent().parent().attr('id');
				
		if(ask) {
			$.ajax({
				  url: url,
				  dataType: 'json',
				  type: 'POST',
				  data: {
				  	id: id
				  },
				  success: function(json) {
					alert(json.message);
					  
					if(json.success == true) {
						$('tr#'+id).remove();
					}
					  
				  }			  
				});
		}
		
		return false;
	});
	
});
