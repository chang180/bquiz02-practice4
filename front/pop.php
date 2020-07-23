<style>
    .all {
        display: none;
    }

    .pop {
        background: rgba(51, 51, 51, 0.8);
        color: #FFF;
        min-height: 100px;
        width: 300px;
        position: fixed;
        display: none;
        z-index: 9999;
        overflow: auto;
    }
</style>
<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td>人氣</td>
        </tr>
        <?php
        $total = $News->count();
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? "1";
        $prev = (($now - 1) > 0) ? ($now - 1) : 1;
        $next = (($now + 1) <= $pages) ? ($now + 1) : $pages;
        $start = ($now - 1) * $div;
        $posts = $News->all(['sh' => 1], " ORDER BY `good` DESC LIMIT $start,$div ");
        foreach ($posts as $po) {
        ?>
            <tr>
                <td class="clo"><?= $po['title']; ?></td>
                <td>
                    <div class="abbr">
                        <?= mb_substr($po['text'], 0, 20, "utf8"); ?>...
                    </div>
                    <div class="all pop">
                        <?= nl2br($po['text']); ?>
                    </div>
                </td>

                <td>
                    <span id="vie<?= $po['id']; ?>"><?= $po['good']; ?></span>個人說<img src="img/02B03.jpg" width="20px">

                    <?php
                    if (!empty($_SESSION['login'])) {
                        $chk = $Log->find(['user' => $_SESSION['login'], 'news' => $po['id']]);
                        if (!empty($chk)) {
                    ?>

                            <a href="#" id="good<?= $po['id']; ?>" onclick="good('<?= $po['id']; ?>','2','<?= $_SESSION['login']; ?>')">收回讚</a>
                        <?php
                        } else {
                        ?>

                            <a href="#" id="good<?= $po['id']; ?>" onclick="good('<?= $po['id']; ?>','1','<?= $_SESSION['login']; ?>')">讚</a>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="ct">

        <?php
        echo "<a href='?do=pop&p=$prev'> < </a>";
        for ($i = 1; $i <= $pages; $i++) {
            $font = ($now == $i) ? "30px" : "20px";
            echo "<a href='?do=pop&p=$i' style='font-size:$font'>$i</a>";
        }
        echo "<a href='?do=pop&p=$next'> > </a>";
        ?>
    </div>
</fieldset>
<script>
    $(".clo").hover(function() {
        $(this).next("td").children(".all").toggle();
    })
</script>