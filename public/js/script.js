
jQuery(document).ready(function(){

	var wow = new WOW({
      	boxClass: 'animate-me',
    });
    
    wow.init();

    
    
	$('.cards-list').change(function(){
		var count = $('.cards-list:checked').length;

		if (count > 21) {
			alert('You can\'t select more than 21 cards');
			$(this).attr('checked', false);
			return;
		}
	});

	$('.compare-decks').submit(function(event){
		event.preventDefault();
		var $that = $(this);

		if ($('#deck1').val() && $('#deck2').val()) {
			window.history.pushState('deck1', 'Title', '/decks-compare/'+$('#deck1').val());
			window.history.pushState('deck2', 'Title', '/decks-compare/'+$('#deck1').val()+'/'+$('#deck2').val());
			$.ajax({
				url : $(this).attr('action'),
				type: $(this).attr('method'),
				data: { 'deck_one' : $('#deck1').val(), 'deck_two' : $('#deck2').val() },
				success : function(response) {
					if (response.status) {
						$('#response').html(response.data);
						var share = new Share(".share-button", {});
					} else {
						swal("Oops!", "You have entered invalid Deck Id. Please check", "error");
					}
				}
			});
		} else {
			swal("Oops!", "Please enter Deck Id", "error");
		}
	});
});
