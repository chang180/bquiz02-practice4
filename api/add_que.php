<?php
include_once "../base.php";

$Que->save(['text'=>$_POST['subject'],'parent'=>0]);

$parent=$Que->find(['text'=>$_POST['subject']])['id'];
foreach($_POST['option'] as $o){
    $new['text']=$o;
    $new['parent']=$parent;
    $Que->save($new);
}

to("../admin.php?do=que");