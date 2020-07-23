<fieldset>
    <legend>最新文章管理</legend>
    <form action="api/editnews.php" method="post">
        <table>
            <tr>
                <td width="10%">編號</td>
                <td width="60%">標題</td>
                <td width="10%">顯示</td>
                <td width="10%">刪除</td>
            </tr>
            <?php
            $total = $News->count();
            $div = 3;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? "1";
            $prev = (($now - 1) > 0) ? ($now - 1) : 1;
            $next = (($now + 1) <= $pages) ? ($now + 1) : $pages;
            $start = ($now - 1) * $div;
            $posts = $News->all([], " LIMIT $start,$div ");
            foreach ($posts as $po) {
            ?>
                <tr>
                    <td><?= ($start + 1); ?>.</td>
                    <td><?= $po['title']; ?></td>
                    <td><input type="checkbox" name="sh[]" value="<?= $po['id']; ?>" <?= ($po['sh'] == 1) ? "checked" : ""; ?>></td>
                    <td><input type="checkbox" name="del[]" value="<?= $po['id']; ?>"></td>
                    <input type="hidden" name="id[]" value=<?= $po['id']; ?>>
                </tr>
            <?php
                $start++;
            } ?>
        </table>
        <div class="ct">

            <?php
            echo "<a href='?do=news&p=$prev'> < </a>";
            for ($i = 1; $i <= $pages; $i++) {
                $font = ($now == $i) ? "30px" : "20px";
                echo "<a href='?do=news&p=$i' style='font-size:$font'>$i</a>";
            }
            echo "<a href='?do=news&p=$next'> > </a>";
            ?>
        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>