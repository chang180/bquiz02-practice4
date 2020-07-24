<?php
$que=$Que->find($_GET['q']);
$option=$Que->all(['parent'=>$_GET['q']]);
?>
<form action="api/vote.php" method="post">
    <fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$que['text'];?> </legend>
    <p style="font-weight:bolder"><?=$que['text'];?></p>
    <?php
    foreach($option as $k => $opt){
        ?>
        <p>
            <input type="radio" name="opt" value="<?=$opt['id'];?>">
            <?=$opt['text'];?>
        </p>
        <?php
    }
    ?>
    <div class="ct">
        <button>我要投票</button>
    </div>
    
    </fieldset>
</form>