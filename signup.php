<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <style>
        body { font-family: sans-serif; max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        h1 { text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .login-link { text-align: center; margin-top: 15px; }
    </style>
</head>
<body>

    <h1>新規登録</h1>

    <form action="register.php" method="POST">
        <div class="form-group">
            <label for="username">ユーザー名</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirm">パスワード（確認用）</label>
            <input type="password" id="password_confirm" name="password_confirm" required>
        </div>
        <button type="submit">登録する</button>
    </form>

    <div class="login-link">
        <p>すでにアカウントをお持ちですか？ <a href="login.php">ログイン</a></p>
    </div>

</body>
</html>