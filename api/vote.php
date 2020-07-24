<?php
include_once "../base.php";
$opt=$Que->find($_POST['opt']);
$parent=$Que->find($opt['parent']);
$parent['count']++;
$opt['count']++;
$Que->save($opt);
$Que->save($parent);

to("../index.php?do=result&q=".$parent['id']);