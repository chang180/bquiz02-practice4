<?php

include_once "../base.php";
$id=$_GET['id'];
echo nl2br($News->find($id)['text']);
