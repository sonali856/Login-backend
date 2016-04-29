<?php
require "init.php";
$sql = "select * from users";
 
$res = mysqli_query($conn,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('id'=>$row[0],
'name'=>$row[1],
'address'=>$row[2]
));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($conn);
 
?>



?>