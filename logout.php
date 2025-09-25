<?php
// セッションを開始
session_start();

// セッション変数をすべて空にする
$_SESSION = array();

// セッションを破棄
session_destroy();

// トップページへリダイレクト
header('Location: index.php');
exit();