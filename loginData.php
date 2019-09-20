<html>
<head>
       <link rel="stylesheet" type="text/css" href="css\login.css">
</head>
<?php
   //Connection to database 
   include 'connection.php';
   
   //set timezone of ASIA
   date_default_timezone_set('Asia/Kolkata');
   
   if (isset($_POST['btnSubmitLogin']))
   {
	 $username = $_POST['EmailLogin'];
	 $password = $_POST['PasswordLogin'];
 
	 //select data from database 
     $sql = "SELECT * FROM `registration` WHERE email='$username' and password='$password'";
     $result = mysqli_query($conn, $sql);


     if (mysqli_num_rows($result) > 0) 
	 {
    
			//display data in the form of table
	       echo "<div style='border:1px solid black;'>
		              <div class='loginDisplay headinglogin'>First Name</div>
		              <div class='loginDisplay headinglogin'>Last Name</div>
					  <div class='loginDisplay headinglogin'>Email</div>
				      <div class='loginDisplay headinglogin'>Contact</div>
					  <div class='loginDisplay headinglogin'>Account Created Date</div>
				      <div class='loginDisplay headinglogin'>Last Login</div><hr></hr><br>";
      
	      // output data of each row
	          while($row = mysqli_fetch_assoc($result)) 
			  {
                    echo "<div class='loginDisplayValues'>" . $row["first_name"]. "</div>
					      <div class='loginDisplayValues'>" . $row["last_name"]. "</div>
	                      <div class='loginDisplayValues'>" . $row["email"]. "</div>
						  <div class='loginDisplayValues'>" . $row["contact"]. "</div>
						  <div class='loginDisplayValues'>" . Date($row["Date"]). "</div>
						  <div class='loginDisplayValues'>" . Date($row["Login_Date"]). "</div><br>";
	   
              }
	      echo "</div>";
     }
	 else 
	 {
        echo "<div class='loginFailed'>Failed To Logged in</div>";
     }
	 
	 //Update DATETIME for LAST LOGIN
	 
	   //current date and time
       $date = date('Y-m-d h:i:s');
       
	   //update date and time for to fetch last login, when new logged in
	   $SqlUpdate="UPDATE `registration` set Login_Date='$date' where email='$username' and password='$password'";
        
		//execute update query
		mysqli_query($conn, $SqlUpdate);
       
       //close the connection
	   mysqli_close($conn);
   }
?>