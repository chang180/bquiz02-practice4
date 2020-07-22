<fieldset>
    <legend>會員註冊</legend>
    <h4 style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</h4>
    <form>
        <div><label for="acc">Step1:登入帳號</label><input type="text" name="acc" id="acc"></div>
        <div><label for="pw">Step2:登入密碼</label><input type="password" name="pw" id="pw"></div>
        <div><label for="pw2">Step3:再次確認密碼</label><input type="password" name="pw2" id="pw2"></div>
        <div><label for="email">Step4:信箱(忘記密碼時使用)</label><input type="text" name="email" id="email"></div>
        <div><button type="button" onclick="reg()">註冊</button><button type="reset">清除</button></div>
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
                            alert("註冊完成，歡迎加入");
                            location.href = "index.php";
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