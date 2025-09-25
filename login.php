<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <style>
        body { font-family: sans-serif; max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        h1 { text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #218838; }
        .signup-link { text-align: center; margin-top: 15px; }
        .error { color: red; text-align: center; }
    </style>
</head>
<body>

    <h1>ログイン</h1>

    <?php
    // URLに ?error=1 が付いていたらエラーメッセージを表示
    if (isset($_GET['error'])) {
        echo '<p class="error">ユーザー名またはパスワードが違います。</p>';
    }
    ?>

    <form action="login_process.php" method="POST">
        <div class="form-group">
            <label for="username">ユーザー名</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">ログイン</button>
    </form>

    <div class="signup-link">
        <p>アカウントをお持ちでないですか？ <a href="signup.php">新規登録</a></p>
    </div>

</body>
</html>