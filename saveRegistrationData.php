<html>
<?php
 
    //Connection to database 
    include 'connection.php';
    
	//set timezone of ASIA
	date_default_timezone_set('Asia/Kolkata');
	
	//accept VALUES
	$lFname=ucwords($_POST['firstName']);
	$lLname=ucwords($_POST['lastName']);
	$lEmail=$_POST['Email'];
	$lContact=$_POST['Contact'];
	$lPassword=$_POST['Password'];
	//$lConfPass=$_POST['ConfirmPassword'];
	$date = date('Y-m-d');
	$dateLogin = date('Y-m-d h:i:s');
      
	//Insert data into database
    $sql = "INSERT INTO registration (first_name,last_name,email,contact,password,Date,Login_Date)
             VALUES ('$lFname','$lLname','$lEmail','$lContact','$lPassword','$date','$dateLogin')";

   
     //check successful registration or not
    if (mysqli_query($conn, $sql)) {
       header("location:successRegistration.html");
    } 
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

   
   //Close the connection
   mysqli_close($conn);
?>



