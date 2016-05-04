<?php
require "init.php";
echo "fswvd";

$email = $_POST['email'];
echo "$email";
$password=$_POST['txtPassword'];
echo "$password";
if(count($_POST)>0)
{$query_search = "UPDATE users SET password=$password WHERE email_id = $email";
if(mysqli_query($conn,$query_search))
{
	echo"Successful ";
}
else
	echo"not successful";
}
?>