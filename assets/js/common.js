$(function(){
	
	function urlencode(str) {
		str = (str + '')
			.toString();

		// Tilde should be allowed unescaped in future versions of PHP (as reflected below), but if you want to reflect current
		// PHP behavior, you would need to add ".replace(/~/g, '%7E');" to the following.
		return encodeURIComponent(str)
			.replace(/!/g, '%21')
			.replace(/'/g, '%27')
			.replace(/\(/g, '%28')
			.
		replace(/\)/g, '%29')
			.replace(/\*/g, '%2A')
			.replace(/%20/g, '+');
	}

	function base64_encode(data) {
		var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
		var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
			ac = 0,
			enc = '',
			tmp_arr = [];

		if (!data) {
			return data;
		}

		data = unescape(encodeURIComponent(data))

		do {
			// pack three octets into four hexets
			o1 = data.charCodeAt(i++);
			o2 = data.charCodeAt(i++);
			o3 = data.charCodeAt(i++);

			bits = o1 << 16 | o2 << 8 | o3;

			h1 = bits >> 18 & 0x3f;
			h2 = bits >> 12 & 0x3f;
			h3 = bits >> 6 & 0x3f;
			h4 = bits & 0x3f;

			// use hexets to index into b64, and append result to encoded string
			tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
		} while (i < data.length);

		enc = tmp_arr.join('');

		var r = data.length % 3;

		return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
	}

	site_url=$('#website_url').val();
	/* Clients Module */
	$('#clients_listing').dataTable({
		"bStateSave": true,
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": site_url+"clients/loadClients",
		//"aaSorting" : [[2, 'desc']], To sort by specific column by default
		"aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 13 ] }
        ],
		"aoColumns": [
            {},
            {},
            {},
            {},
            {},
            {},
            {},
            {},
            {},
			{},
			{},
			{},
			{},
            {
                "mData": null,
                "sClass": "center",
                "sDefaultContent": '<a href="" module="clients" class="editor_edit"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;<a href="" module="clients" class="editor_remove"><i class="glyphicon glyphicon-remove"></i></a>'
            }
        ]
	});
	
	// Delete a record
    $('body').on('click', 'a.editor_remove', function (e) {
        e.preventDefault();
		//$(this).parents('tr')[0].remove();
		var module=$(this).attr('module');
		var id=$(this).parents('tr').children('td').html();
		modal('Deletion Confirmation?','Are you sure you want to delete?',module+'/remove/'+urlencode(base64_encode(id)));
		
    });
   // Edit a record
    $('body').on('click', 'a.editor_edit', function (e) {
        e.preventDefault();
		var module=$(this).attr('module');
		var id=$(this).parents('tr').children('td').html();
		window.location.href=module+'/edit/'+urlencode(base64_encode(id));
    });
	/* End Users Module */
	
	$(":button").click(function(){
		var url = $(this).data('url');
		if(typeof url != 'undefined')
		{
			location.href = url;
		}
	});
	
	/* $("form").submit(function( event ) {
		var loading = $.loading();
		loading.open();
		//event.preventDefault();
	}); */
	
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
	 $("#expand").click(function(e) {
		e.preventDefault();
		$("#user-stats").toggleClass("toggled");
	});
	$(".international-number").intlTelInput({
        // allowExtensions: true,
        // autoFormat: false,
        // autoHideDialCode: false,
        // autoPlaceholder: false,
        // dropdownContainer: $("body"),
        // excludeCountries: ["us"],
        // geoIpLookup: function(callback) {
        //   $.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
        // initialCountry: "auto",
        // nationalMode: false,
        // numberType: "MOBILE",
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // preferredCountries: ['cn', 'jp'],
       // utilsScript: "lib/libphonenumber/build/utils.js"
    });
	if ($('#phone_number').length > 0) {
		$(".international-number").intlTelInput("setNumber", $('#phone_number').val());
	}	
});
function modal(title,message,action)
{
	bootbox.dialog({
		title: title,
		message: message,
		buttons: {
		success: {
			label: "No",
			className: "btn-primary",
			callback: function() {
				
			}
		},
		main: {
			label: "Yes",
			className: "btn-danger",
			callback: function() {
				window.location.href=action;
			}
		}
	  }
	});
}