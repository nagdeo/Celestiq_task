
function passwordMatch()
	   {
	      var pass=document.getElementById('pass').value;
	      var conPass=document.getElementById('conPass').value;
	      var contact=document.getElementById('contact').value;
		  //alert(contact);
		  
		  //Password validation
		  if(pass!=conPass)
		  {
		       //alert("");
			  document.getElementById('failedFieldsforPass').innerHTML="*Your password and confirmation password do not match."; 
             return false; 
          }
		  
		  
		   if(pass.length<8)
		  {
		      document.getElementById('failedFieldsforPass').innerHTML="*Your password should be of 8 digits."; 
             return false; 
		  }
		  
		  else if(pass.search(/[0-9]/) == -1)
		  {
		      document.getElementById('failedFieldsforPass').innerHTML="*At Least 1 numeric should be there."; 
             return false;
		  }
		  else if(pass.search(/[a-z]/) == -1)
		  {
		      document.getElementById('failedFieldsforPass').innerHTML="*At Least 1 small letter should be there."; 
             return false;
		  }
		  else if(pass.search(/[A-Z]/) == -1)
		  {
		      document.getElementById('failedFieldsforPass').innerHTML="*At Least 1 Upper letter should be there."; 
             return false;
		  }
		  
		  //contact validation
		  if(contact.length < 10)
		  {
		   //alert("Contact number should be of 10 digits.");
		   document.getElementById('failedFieldsforContact').innerHTML="*Contact number should be of 10 digits.";
		   return false;
		  }
	   }