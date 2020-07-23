<fieldset>
<legend>新增問卷</legend>
<form action="api/add_que.php" method="post">
    <table>
        <tr id="more">
            <td>問卷名稱</td>
            <td><input type="text" name="subject" id="subject"></td>
        </tr>
        <tr>
            <td>選項</td>
            <td><input type="text" name="option[]"><input type="button" value="更多" onclick="more()"></td>
        </tr>
    </table>
    <input type="submit" value="新增"><input type="reset" value="清空">
</form>

</fieldset>

<script>
    function more(){
        let opt=`
        <tr>
            <td>選項</td>
            <td><input type="text" name="option[]"></td>
        </tr>
        `;
        $("#more").after(opt);
    }
</script>