<?php
include("common.php");
if (isset($_POST["submit"])) {
    if (!isset($_POST["name"])) {
        $errors["name"] = "名前が入力されていません";
        } elseif (mb_strlen($_POST["name"]) == 0){
        $errors["name"] ="名前が入力されていません";
        } elseif (mb_strlen($_POST["name"]) > 20 ) {
        $errors["name"]="名前は 20文字以内で入力してください";
    }
    if (!isset($_POST["comment"])) {
        $errors["comment"] = "コメントが入力されていません";
    }elseif (mb_strlen($_POST["comment"]) == 0){
        $errors["comment"] = "コメントが入力されていません";
    } elseif (mb_strlen($_POST["comment"]) > 400){ 
        $errors["comment"] = "コメントは400文字以内で入力してください";
    }
}else {
    $errors["submit"]="フォームが正しく送信されていません";
   }
 if (count($errors) == 0) {
     $result = bbs_write($_POST);
         if (!$result) {
         $errors["$result"] = "書き込みに失敗しました";
         }
 }
 if (count($errors) == 0) { 
 header("Location: index.php"); 
 }
?>

<!DOCTYPE html>
    <html>
        <head>
        <title> 軽音楽同好会提示版投稿エラー</title>
        <meta charset="utf8">
            <style>
            ul.error {color:red;}
            </style>
        </head>
        <body>
            <h1> 軽音楽同好会掲示板 - 投稿エラー</h1>
            <h2> 以下のエラーが発生しました再度入力してください。</h2>
            <ul class="error"><?php
            foreach($errors as $error) {
            ?><li><?php print $error; ?></li><?php                
            } ?></ul>
        <a href="index.php"> 簡易提示版に戻る</a>
        </body>
    </html>