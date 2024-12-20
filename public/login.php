<?php
session_start();
$email = $_SESSION['email'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error'], $_SESSION['email']);

// ログイン済みの場合はリダイレクト
if (isset($_SESSION['user_email'])) {
    header('Location: /offices');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="login-process.php" method="post">
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" value="<?php echo $email ?? ''; ?>" required>
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <p style="color: red;"><?php echo $error ?? ''; ?></p>
        </div>
        <button type="submit">ログイン</button>
    </form>
    <a href="/offices">トップページ</a
</body>
