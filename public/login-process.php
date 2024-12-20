<?php
session_start();

// POSTリクエストのみ受け付ける
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /offices');
    exit;
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

try {
    $dsn = 'mysql:host=db;dbname=app;charset=utf8';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    // DBからユーザー情報を取得
    $dbh = new PDO($dsn, 'root', 'pass', $options);
    $stmt = $dbh->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

} catch (PDOException $e) {
    echo $e->getMessage();
    $_SESSION['error'] = 'システム管理者にお問い合わせください';
    header('Location: /login.php');
}

if (empty($user) || !password_verify($password, $user['password'])) {
    // ログイン失敗
    $_SESSION['error'] = 'メールアドレスまたはパスワードが間違っています';
    $_SESSION['email'] = $email;
    header('Location: /login.php');
    exit;
}

// ログイン成功
$_SESSION['user_email'] = $user['email'];
header('Location: /offices');
exit;
