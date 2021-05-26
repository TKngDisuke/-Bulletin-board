<?php include("common.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title> 軽音楽同好会提示版 </title>
        <meta charset="utf8">
            <style>
            p{padding;5px; margin-left: 50px; }
            div.content {border-top: 1px dashed #555; margin-top: 10px;}
        </style>
    </head>
    <body>
        <h1>軽音楽同好会掲示板</h1>
        <form action="write.php" method="post">
            名前<br>
            <input type="text" name="name" value="" size="24"><br>
            コメント<br>    
            <textarea name="comment" cols="40" rows="3"></textarea><br>
            <input type="submit" name="submit" value="書き込み"><br>
        </form>
<?php   
    $records = bbs_read();
    foreach ($records as $key => $record) {
    ?><div class="content">
        <span class="id"><?php print h($key + 1); ?></span>　
        <span class="name">名前:<?php print h($record["name"]); ?></span>
        <span class="time"><?php
            print date("Y年 m月 d日 H時 i分 s秒", intval($record["time"]));
        ?></span>   
        <p class="comment"><?php print nl2br (h($record["comment"])); ?></p>   
    </div>


    
    <?php } ?>
    </body>
</html>