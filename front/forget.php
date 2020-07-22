<fieldset>
    <legend>忘記密碼</legend>
    <h3>請輸入信箱以查詢密碼</h3>
    <input type="text" name="email" id="email">
    <div id="result"></div>
    <button onclick="findPw()">尋找</button>
</fieldset>
<script>
function findPw(){
    let email=$("#email").val();
    $.get("api/forget.php",{email},function(result){
        $("#result").html(result);
    })
}
</script>