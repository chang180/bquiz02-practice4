<style>
    .line,.num{
display:inline-block;

    }
    .line{
        width:85%;
        background:#ccc;
        height:20px;
    }
</style>
<?php
$que = $Que->find($_GET['q']);
$option = $Que->all(['parent' => $_GET['q']]);
$parent=($que['count']!=0)?$que['count']:1;
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $que['text']; ?> </legend>
    <p style="font-weight:bolder"><?= $que['text']; ?></p>
    <table>
        <?php
        foreach($option as $k=>$opt){
            $rate=$opt['count']/$parent;
        ?>
    <tr>
        <td width="50%"><?=$opt['text'];?></td>
        <td width="50%">
            <div class="line" style="width:<?=round($rate*100);?>%"></div>
            <div class="num"><?=$opt['count'];?>票(<?=round($rate*100);?>%)</div>
        </td>
    </tr>
<?php } ?>
    </table>
    <div class="ct">
        <button onclick="location.href='index.php?do=que'">返回</button>
    </div>

</fieldset>