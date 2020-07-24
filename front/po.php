<style>
    fieldset a {
        display: block;
        margin: 10px;
    }

    .contain {
        display: flex;
    }
</style>

<p>目前位置：首頁 > 分類網誌 > <span class="nav"></span></p>
<div class="contain">
    <fieldset style="width:30%">
        <legend>分類網誌</legend>
        <a href="javascript:getList(1)" class="item"> 健康新知</a>
        <a href="javascript:getList(2)" class="item"> 菸害防治</a>
        <a href="javascript:getList(3)" class="item"> 癌症防治</a>
        <a href="javascript:getList(4)" class="item"> 慢性病防治</a>
    </fieldset>
    <fieldset style="width:60%">
        <legend>文章列表</legend>
        <div class="list"></div>
        <div class="post" style="display:none"></div>
    </fieldset>
</div>

<script>
    let item = [
        '健康新知',
        '菸害防治',
        '癌症防治',
        '慢性病防治'
    ]
    getList(1);

    function getList(i) {
        $(".nav").html(item[i - 1]);
        $.get("api/get_list.php", {
            'type': i
        }, function(list) {
            $(".list").html(list);
            $(".list").show();
            $(".post").hide();
        })
    }
    
    function getPost(id) {
        $.get("api/get_post.php", {
            'id': id
        }, function(post) {
            $(".post").html(post);
            $(".list").hide();
            $(".post").show();
        })
    }
</script>