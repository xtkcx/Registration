<?php
session_start();

$form = $_SESSION['form'];

$dsn  = 'mysql:host=localhost;dbname=regist;charset=utf8mb4';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    echo "<p style='color:red;'>エラーが発生したためアカウント登録できません。</p>";
    exit;
}

$hashedPassword = password_hash($form['password'] ?? '', PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO regist
            (family_name, last_name, family_name_kana, last_name_kana, mail, password,
             gender, postal_code, prefecture, address_1, address_2, authority,
             delete_flag, registered_time, update_time)
            VALUES
            (?,?,?,?,?,?,?,?,?,?,?,?,0,NOW(),NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $form['family_name']      ?? '',
        $form['last_name']        ?? '',
        $form['family_name_kana'] ?? '',
        $form['last_name_kana']   ?? '',
        $form['mail']             ?? '',
        $hashedPassword,
        $form['gender']     ?? '0',
        $form['postal_code'] ?? '',
        $form['prefecture'] ?? '',
        $form['address_1']  ?? '',
        $form['address_2']  ?? '',
        $form['authority']  ?? '0',
    ]);

    unset($_SESSION['form']);

} catch (Throwable $e) {
    echo "<p style='color:red;'>エラーが発生したためアカウント登録できません。</p>";
    exit;
}
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>アカウント登録完了</title>
</head>
<body>
  <h1 style="text-align:center;">登録完了しました</h1>
  <div style="text-align:center;margin-top:20px;">
    <a href="D.I.blog.php">TOPページへ戻る</a>
  </div>
</body>
</html>
