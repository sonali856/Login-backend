<?php
require "init.php";

$email_id=$_GET['email'];
$query_search = "UPDATE users SET confirm='1' WHERE email_id = '".$email_id."';";
$query_exec = mysqli_query($conn,$query_search);
echo $query_exec;
if($query_exec)
{
	echo"<html><body><p>Thank you for registering with Cyklo </p></body></html>";
	
}
else
	echo"<html><body><p>Error</p></body></html>";

?>