/*
* form-validation.js
* Copyright (C) 2017
* Author: Vanity Tracy Stuurland <vstuurland@minddistrict.com>
* Created: 2017-11-8
*/

function isEmpty(item) {
	if (item.length > 0) {
		return false;
	}
	return true;
}

function isEmail(item) {
  var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
  return pattern.test(item);
}

$(document).ready(function () {
	// Trimming the spaces from the input fields.
	$('input, textarea').each(function(){
		$(this).val(jQuery.trim($(this).val()));
	});

	$("#rsvpForm").on("submit", function(e) {
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		var validated = true;
		var validationFeedback = 'Error';

		//Checks if someone checked the title radio button
		if( $('input[name="title"]').is(':checked') ) {
			$('#error-title').hide();
			$("input[name='title']").parent().parent().parent( ".form-group" ).removeClass("has-feedback has-error");
			$("input[name='title']").parent().parent().parent( ".form-group" ).addClass("has-feedback has-success");
		} else {
			$('#error-title').show();
			$("input[name='title']").parent().parent().parent( ".form-group" ).removeClass("has-feedback has-success");
			$("input[name='title']").parent().parent().parent( ".form-group" ).addClass("has-feedback has-error");
			validated = false;
		}

		for (var i = 0, len = postData.length; i < len; i++) {

			switch(postData[i].name)
			{
				case 'first_name':
					if (isEmpty(postData[i].value)){
						$('#error-firstname').show();
						$("input[name='surname']").parent().parent( ".form-group" ).removeClass("has-feedback has-success");
						$("input[name='first_name']").parent().parent( ".form-group" ).addClass("has-feedback has-error");
						validated = false;
					} else {
						$('#error-firstname').hide();
						$("input[name='first_name']").parent().parent( ".form-group" ).removeClass("has-feedback has-error");
						$("input[name='first_name']").parent().parent( ".form-group" ).addClass("has-feedback has-success");
					}
					break;

				case 'surname':
					if (isEmpty(postData[i].value)){
						$('#error-surname').show();
						$("input[name='surname']").parent().parent( ".form-group" ).removeClass("has-feedback has-success");
						$("input[name='surname']").parent().parent( ".form-group" ).addClass("has-feedback has-error");
						validated = false;
					} else {
						$('#error-surname').hide();
						$("input[name='surname']").parent().parent( ".form-group" ).removeClass("has-feedback has-error");
						$("input[name='surname']").parent().parent( ".form-group" ).addClass("has-feedback has-success");
					}
					break;

				case 'email':
					if (isEmpty(postData[i].value)){
						$('#error-email').show();
						$('#error-email-value').hide();
						$("input[name='email']").parent().parent( ".form-group" ).removeClass("has-feedback has-success");
						$("input[name='email']").parent().parent( ".form-group" ).addClass("has-feedback has-error");
						validated = false;
					} else if (!isEmail(postData[i].value)){
						$('#error-email').hide();
						$('#error-email-value').show();
						$("input[name='email']").parent().parent( ".form-group" ).removeClass("has-feedback has-success");
						$("input[name='email']").parent().parent( ".form-group" ).addClass("has-feedback has-error");
						validated = false;
					} else {
						$('#error-email').hide();
						$('#error-email-value').hide();
						$("input[name='email']").parent().parent( ".form-group" ).removeClass("has-feedback has-error");
						$("input[name='email']").parent().parent( ".form-group" ).addClass("has-feedback has-success");
					}
					break;
			}
		}

		if (validated) {
			console.log('Doing AJAX!');
			$.ajax({
				url: formURL,
				type: "POST",
				data: postData,
				success: function(data, textStatus, jqXHR) {
					$('#rsvpModal .modal-header .modal-title').html("Thank you for RSVPing");
					$('#rsvpModal .modal-body').html(data);
					$("#btnSubmitRSVP").remove();
					$("#rsvp-action-container").remove();
				},
				error: function(jqXHR, status, error) {
				}
			});
		}

		e.preventDefault();
		return false;
	});

});