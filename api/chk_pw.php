<?php
include_once "../base.php";
$acc=$_GET['acc'];
$pw=$_GET['pw'];
$user=$User->find(['acc'=>$acc,'pw'=>$pw]);
if(empty($user)){
    echo 0;
}else{
    $_SESSION['login']=$acc;
    echo 1;
}
