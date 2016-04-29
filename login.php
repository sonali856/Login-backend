
<?php
require "init.php";

$username =$_GET['username'];
$password =$_GET['password'];
$email = $_GET['password'];
$result=array('success'=>0,'message'=>null);
$check=0;
$query_search = "SELECT * from users WHERE username = '".$username."' AND password = '".$password."';";
$query_exec = mysqli_query($conn,$query_search) or die("unable to connect");


$row=mysqli_fetch_array($query_exec,MYSQLI_NUM);
$rowuser = mysqli_num_rows($query_exec);

 if($rowuser == 0) { 
    $sql = "SELECT * FROM users WHERE email_id = '".$email."' AND password = '".$password."'";
    $query = mysqli_query($conn,$sql) or die(mysqli_error());
  $row=mysqli_fetch_row($query,MYSQLI_NUM);
    $rowemail = mysqli_num_rows($query);
	  if($rowemail == 0)
     	  {
			  $result['message']='Not a valid user';
	      
	      }
	  else if($row[5]==1)
	  {$result['success']=1;
       $check=1;
       $result['message']='Valid User';
	   
	  }
      else
      {
		  $result['message']='Please activate account via email';
     
      }	  
    }
 else if($row[5]==1)  {
	 
	 $result['success']=1;
	 $result['message']='Valid User';
	 
 }
 else
 {   if($check==0)
	 $result['message']='Please activate account via email';
	
 } 
 echo(json_encode($result));
?>