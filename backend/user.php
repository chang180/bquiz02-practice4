<fieldset>
    <legend>帳號管理</legend>
    <form action="api/deluser.php" method="post">
        <table>
            <tr>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
            $user = $User->all();
            foreach ($user as $u) {
                if ($u['acc'] != 'admin') {
            ?>
                    <tr>
                        <td><?= $u['acc']; ?></td>
                        <td><?= str_repeat("*", strlen($u['pw'])); ?></td>
                        <td><input type="checkbox" name="del[]" value="<?= $u['id']; ?>"></td>
                    </tr>
            <?php }
            } ?>
            <tr>
                <td><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></td>
            </tr>
        </table>
    </form>
    <h3>新增會員</h3>
    <h4 style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</h4>
    <form>
        <div><label for="acc">Step1:登入帳號</label><input type="text" name="acc" id="acc"></div>
        <div><label for="pw">Step2:登入密碼</label><input type="password" name="pw" id="pw"></div>
        <div><label for="pw2">Step3:再次確認密碼</label><input type="password" name="pw2" id="pw2"></div>
        <div><label for="email">Step4:信箱(忘記密碼時使用)</label><input type="text" name="email" id="email"></div>
        <div><button type="button" onclick="reg()">新增</button><button type="reset">清除</button></div>
    </form>
</fieldset>
<script>
    function reg() {
        let acc = $("#acc").val();
        let pw = $("#pw").val();
        let pw2 = $("#pw2").val();
        let email = $("#email").val();

        if (acc != "" && pw != "" && pw2 != "" && email != "") {
            if (pw != pw2) {
                alert("密碼錯誤");
                location.reload();
            } else {
                $.get("api/chk_acc.php", {
                    acc
                }, function(res) {
                    if (res == 1) {
                        alert("帳號重覆");
                        location.reload();
                    } else {
                        $.post("api/reg.php", {
                            acc,
                            pw,
                            email
                        }, function(res) {
                            location.reload();
                        })
                    }
                })


            }
        } else {
            alert("不可空白");
            location.reload();
        }
    }
</script>
</fieldset>