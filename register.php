<?php
// データベース接続ファイルを読み込む
require_once('dbconnect.php');

// エラーメッセージを格納する変数を初期化
$error_message = '';
// 登録成功メッセージを格納する変数を初期化
$success_message = '';

// POSTリクエストがある場合のみ処理を実行
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // フォームから送信されたデータを取得
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // 1. バリデーション (入力値のチェック)
    if (empty($username) || empty($password) || empty($password_confirm)) {
        $error_message = 'すべての項目を入力してください。';
    } elseif ($password !== $password_confirm) {
        $error_message = 'パスワードが一致しません。';
    } else {
        try {
            // 2. ユーザー名の重複チェック
            $stmt = $dbcon->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
            $stmt->execute([$username]);
            if ($stmt->fetchColumn() > 0) {
                $error_message = 'そのユーザー名は既に使用されています。';
            } else {
                // 3. パスワードのハッシュ化
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                // 4. データベースへの登録 (プリペアドステートメントを使用)
                $stmt = $dbcon->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                $stmt->execute([$username, $password_hash]);

                // 登録成功後の処理
                $success_message = '登録が完了しました。ログインページに移動します。';
                // 5. リダイレクト
                header("Refresh: 3; url=login.php"); // 3秒後にlogin.phpへリダイレクト
                
            }
        } catch (PDOException $e) {
            // データベースエラー
            $error_message = 'データベースエラー: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>登録処理</title>
    <style>
        body { font-family: sans-serif; max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; text-align: center; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>登録処理結果</h1>
    <?php if (!empty($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
        <a href="signup.php">登録ページに戻る</a>
    <?php endif; ?>
    <?php if (!empty($success_message)): ?>
        <p class="success"><?php echo $success_message; ?></p>
    <?php endif; ?>
</body>
</html>