<?php
// 必ずセッションを開始
session_start();

// データベース接続
require_once('dbconnect.php');

// フォームから送信されたデータを取得
$username = $_POST['username'];
$password = $_POST['password'];

// 入力が空でないか確認
if (empty($username) || empty($password)) {
    // エラーメッセージと共にログインページへリダイレクト
    header('Location: login.php?error=1');
    exit();
}

try {
    // ユーザー名でユーザーを検索
    $stmt = $dbcon->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // ユーザーが存在し、かつパスワードが正しいか検証
    if ($user && password_verify($password, $user['password'])) {
        // ログイン成功
        
        // セッションIDを再生成してセキュリティを強化
        session_regenerate_id(true);

        // セッションにユーザー情報を保存
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // トップページへリダイレクト
        header('Location: index.php');
        exit();
    } else {
        // ログイン失敗
        header('Location: login.php?error=1');
        exit();
    }
} catch (PDOException $e) {
    // データベースエラー
    // 本番環境ではエラーメッセージを詳細に表示しない方が良い
    die("データベースエラーが発生しました。");
}