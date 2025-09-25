<?php
// セッションを開始して、ログイン状態を記憶・確認できるようにする
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ホームページ</title>
    <link rel="stylesheet" type="text/css" href="my.css">
    <style>
        body { font-family: sans-serif; padding: 20px; max-width: 600px; margin: 40px auto; }
        h1 { border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        .menu-section { border: 1px solid #ddd; padding: 15px; margin-top: 20px; border-radius: 5px; }
        h2 { font-size: 1.2em; color: #333; }
        ul { list-style: none; padding: 0; }
        li { margin: 15px 0; }
        a { text-decoration: none; color: #007bff; font-size: 1.2em; }
        a:hover { text-decoration: underline; }
        .welcome-message { text-align: right; }
    </style>
</head>
<body>

    <?php if (isset($_SESSION['username'])): ?>
        <div class="welcome-message">
            <p>ようこそ、<strong><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></strong> さん！</p>
            <a href="logout.php">ログアウト</a>
        </div>
    <?php endif; ?>

    <h1>Webサイト トップページ</h1>
    
    <?php if (isset($_SESSION['username'])): ?>
        <p>ようこそ！メニューから機能を選んでください。👇</p>
    <?php else: ?>
        <p>ようこそ！まずはログインまたは新規登録をしてください。👇</p>
    <?php endif; ?>


    <div class="menu-section">
        <h2>アカウント管理</h2>
        <ul>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="mypage.php">👤 マイページへ</a></li>
                 <li><a href="logout.php">🔑 ログアウトする</a></li>
            <?php else: ?>
                <li><a href="signup.php">🔐 新規登録ページへ</a></li>
                <li><a href="login.php">🔑 ログインページへ</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="menu-section">
        <h2>掲示板機能</h2>
        <ul>
            <li><a href="sticky.php">✍️ 新規投稿ページへ</a></li>
            <li><a href="dbtest.php">📋 投稿一覧ページへ</a></li>
        </ul>
    </div>

</body>
</html>