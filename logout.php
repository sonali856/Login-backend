<?php
session_start();
$_SESSION['logout']=0;
$response['success'] = 1;
echo(json_encode($response));
?>