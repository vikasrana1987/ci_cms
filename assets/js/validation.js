$(document).ready(function() {
	var loading = $.loading();
	// Add User Validation
	var validator = new FormValidator('addClientForm', [{
		name: 'client_first_name',
		display: 'First Name',    
		rules: 'required'
	},{
		name: 'client_last_name',
		display: 'Last Name',    
		rules: 'required'
	},{
		name: 'client_address',
		display: 'Client Address',    
		rules: 'required'
	},{
		name: 'client_timezone',
		display: 'Client Timezone',    
		rules: 'required'
	},{
		name: 'client_phone_number',
		display: 'Phone Number',
		rules: 'required'
	},{
		name: 'client_url',
		display: 'Client URL',
		rules: 'valid_url'
	},{
		name: 'client_fb_page_url',
		display: 'Facebook Page URL',
		rules: 'valid_url'
	},{
		name: 'client_twitter_page_url',
		display: 'Twitter Page URL',
		rules: 'valid_url'
	},{
		name: 'email',
		display: 'Email',
		rules: 'required|valid_email'
	},{
		name: 'password',
		display: 'Password',
		rules: 'required'/* ,
		depends: function(field)
		{
			console.log($('#phone_number').length);
			if ($('#phone_number').length > 0) {
				return false;
			}
		} */
	}], function(errors, event) {
		if (errors.length > 0) {
			setErrors(errors);
		}
		else
		{
			var countryData = $(".international-number").intlTelInput("getSelectedCountryData");
			var number = $(".international-number").intlTelInput("getNumber");
			
			console.log(number);
			if(countryData.hasOwnProperty("dialCode"))
			{
				$('#client_country_code').val(countryData.dialCode);
				//$('#client_phone_number').val(number);
			}
			loading.open();
			return false;
		}
	});
});

function setErrors(errors)
{
	//loading.close();
	var errorString = '';
	for (var i = 0, errorLength = errors.length; i<errorLength; i++) {
		errorString += '<p>'+errors[i].message + '</p>';
	}
	setMessage(errorString);
}

function setMessage(message)
{
	var html='<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>'+message+'</div>';
	$('.errorContainer').html(html);
}