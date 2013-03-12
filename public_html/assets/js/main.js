$(document).ready(function() {
	$('#products').sortable();
	$('.close').click(function() {
		$(this).parent().remove();
	});
});
