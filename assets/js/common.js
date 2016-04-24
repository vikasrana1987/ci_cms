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
	
	//Command Buttons
	var grid = $("#users_listing").bootgrid({
		ajax: true,
		url: site_url+"users/loadClients",
		formatters: {
			"commands": function(column, row) {
				return "<button module=\"users\" type=\"button\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " + 
					"<button module=\"users\" type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
			}
		}
	}).on("loaded.rs.jquery.bootgrid", function () {
		/* Executes after data is loaded and rendered */
		grid.find(".command-edit").on("click", function (e) {
			var module=$(this).attr('module');
			var id=$(this).data("row-id");
			window.location.href=module+'/edit/'+urlencode(base64_encode(id));
		});
		
		grid.find(".command-delete").on("click", function (e) {
			var module=$(this).attr('module');
			var id=$(this).data("row-id");
			
			 swal({
                title: "Are you sure?",
                text: "All your saved localStorage values will be removed",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function(){
				swal("Done!", "Deleting...", "success");
                window.location.href= module+'/remove/'+urlencode(base64_encode(id));
            });
			
		});
	}).on("selected.rs.jquery.bootgrid", function(e, rows)
	{
		var rowIds = [];
		for (var i = 0; i < rows.length; i++)
		{
			rowIds.push(rows[i].id);
		}
		alert("Select: " + rowIds.join(","));
	}).on("deselected.rs.jquery.bootgrid", function(e, rows)
	{
		var rowIds = [];
		for (var i = 0; i < rows.length; i++)
		{
			rowIds.push(rows[i].id);
		}
		alert("Deselect: " + rowIds.join(","));
	});
		
	/* End Users Module */
	
	$(":button").click(function(){
		var url = $(this).data('url');
		if(typeof url != 'undefined')
		{
			location.href = url;
		}
	});
});