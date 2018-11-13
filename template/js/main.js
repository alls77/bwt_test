		$(document).ready (function () { 
			$("#done").click (function () { 
				$('#messageShow2').hide (); 
				var name = $("#name").val ();
                var surname = $("#surname").val ();
				var fail = ""; 
				if (name.length < 3) fail = "Name is at least 3 characters long";  
				else if (surname.length < 3) fail = "Surname is at least 3 characters long"; 

				if (fail != "") { 
					$('#messageShow2').html ("<h3 style='color:green;text-align:center' >"+fail+"</h3>"); 
					$('#messageShow2').show (); 
					return false; 
				} 
 		}); 
 	}); 