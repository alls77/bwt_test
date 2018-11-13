		$(document).ready (function () { 
			$("#done2").click (function () { 
				$('#messageShow2').hide (); 
				var name = $("#name").val ();
                var message = $("#message").val ();
				var fail = ""; 
				if (name.length < 3) fail = "Name is at least 3 characters long";  
				else if (message.length < 10) fail = "Message is at least 10 characters long"; 

				if (fail != "") { 
					$('#messageShow2').html ("<h3 style='color:green;text-align:center' >"+fail+"</h3>"); 
					$('#messageShow2').show (); 
					return false; 
				} 
 		}); 
 	}); 