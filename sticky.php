<?php
$me=$_SERVER['PHP_SELF'];
$submitted=false; $errmsg="";
$defuname=""; $defcomment="";

if (isset($_REQUEST['user'])){
    $submitted=true;
    $uname=$_REQUEST['user']; $defuname=$uname;
}

if (isset($_REQUEST['comment'])){
    $submitted=true;
    $comment=$_REQUEST['comment'];
    $defcomment=$comment;
}

if ($submitted) {
    if ($uname == ""){ $errmsg .= "ユーザ名が入力されていません <br>"; };
    if ($comment == ""){ $errmsg.="一言が入力されていません.<br>"; };
    if ($errmsg === ""){ //エラーが起きてなかったら入力欄は空白に戻す。
        $defuname = ""; $defcomment="";
    }
}

echo<<<EOD

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">    
<link rel="stylesheet" type="text/css" href="my.css"> </head>
<body>
<body>
EOD;

if ($submitted) {
    if ( $errmsg === ""){ // seems ok.
        echo "<div class='msg'>{$uname}は、「{$comment}」と言いました。</div>";
    } else { // submitted and error occured
        echo "<div class='errmsg'>{$errmsg}</div>\n";
    }
}

echo<<<EOD
<h1>一言どうぞ</h1>
<div id='myform'>
<form action="{$me}" method="GET">
あなたの名前: <input type="text" name="user" value="{$defuname}"/><br/>
一言:<input type="text" name="comment" value="{$defcomment}"/><br/>
<input type="submit">
</form>
</div>
</body>
</html>
EOD;
?>