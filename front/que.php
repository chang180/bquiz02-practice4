<fieldset>
<legend>目前位置：首頁 > 問卷調查</legend>
<table>
    <tr>
        <td style="width:10%">編號</td>
        <td style="width:60%">問卷題目</td>
        <td style="width:10%">投票總數</td>
        <td style="width:10%">結果</td>
        <td>狀態</td>
    </tr>
    <?php
$que=$Que->all(['parent'=>0]);
foreach($que as $k=>$q){
    ?>
    <tr>
        <td><?=($k+1);?></td>
        <td><?=$q['text'];?></td>
        <td><?=$q['count'];?></td>
        <td>
 <a href="?do=result&q=<?=$q['id'];?>">結果</a>
        </td>
        <td>
<?php
if(empty($_SESSION['login'])){
echo "請先登入";
}else{
echo "<a href='?do=vote&q=".$q['id']."'>參與投票</a>";
}
?>
        </td>
    </tr>
<?php } ?>
</table>

</fieldset>