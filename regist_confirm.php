<?php
session_start();

$errors = [];

if (empty($_POST['family_name'])) {
    $errors['family_name'] = '名前（姓）が未入力です。';
} elseif (!preg_match('/^[\p{Hiragana}\p{Han}]+$/u', $_POST['family_name'])) {
    $errors['family_name'] = '名前（姓）はひらがな・漢字のみ入力できます。';
} elseif (mb_strlen($_POST['family_name']) > 10) {
    $errors['family_name'] = '名前（姓）は10文字以内で入力してください。';
}

if (empty($_POST['last_name'])) {
    $errors['last_name'] = '名前（名）が未入力です。';
} elseif (!preg_match('/^[\p{Hiragana}\p{Han}]+$/u', $_POST['last_name'])) {
    $errors['last_name'] = '名前（名）はひらがな・漢字のみ入力できます。';
} elseif (mb_strlen($_POST['last_name']) > 10) {
    $errors['last_name'] = '名前（名）は10文字以内で入力してください。';
}

if (empty($_POST['family_name_kana'])) {
    $errors['family_name_kana'] = 'カナ（姓）が未入力です。';
} elseif (!preg_match('/^[\p{Katakana}]+$/u', $_POST['family_name_kana'])) {
    $errors['family_name_kana'] = 'カナ（姓）はカタカナのみ入力できます。';
} elseif (mb_strlen($_POST['family_name_kana']) > 10) {
    $errors['family_name_kana'] = 'カナ（姓）は10文字以内で入力してください。';
}

if (empty($_POST['last_name_kana'])) {
    $errors['last_name_kana'] = 'カナ（名）が未入力です。';
} elseif (!preg_match('/^[\p{Katakana}]+$/u', $_POST['last_name_kana'])) {
    $errors['last_name_kana'] = 'カナ（名）はカタカナのみ入力できます。';
} elseif (mb_strlen($_POST['last_name_kana']) > 10) {
    $errors['last_name_kana'] = 'カナ（名）は10文字以内で入力してください。';
}

if (empty($_POST['mail'])) {
    $errors['mail'] = 'メールアドレスが未入力です。';
} elseif (!preg_match('/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}$/', $_POST['mail'])) {
    $errors['mail'] = 'メールアドレスの形式が正しくありません。';
} elseif (mb_strlen($_POST['mail']) > 100) {
    $errors['mail'] = 'メールアドレスは100文字以内で入力してください。';
}

if (empty($_POST['password'])) {
    $errors['password'] = 'パスワードが未入力です。';
} elseif (!preg_match('/^[0-9A-Za-z]+$/', $_POST['password'])) {
    $errors['password'] = 'パスワードは半角英数字のみ入力できます。';
} elseif (mb_strlen($_POST['password']) > 10) {
    $errors['password'] = 'パスワードは10文字以内で入力してください。';
}

if (!isset($_POST['gender'])) {
    $errors['gender'] = '性別が未入力です。';
}

if (empty($_POST['postal_code'])) {
    $errors['postal_code'] = '郵便番号が未入力です。';
} elseif (!preg_match('/^[0-9]{7}$/', $_POST['postal_code'])) {
    $errors['postal_code'] = '郵便番号は半角数字7桁で入力してください。';
}

if (empty($_POST['prefecture'])) {
    $errors['prefecture'] = '住所（都道府県）が未入力です。';
}

if (empty($_POST['address_1'])) {
    $errors['address_1'] = '住所（市区町村）が未入力です。';
} elseif (!preg_match('/^[\p{Hiragana}\p{Katakana}\p{Han}0-9 \-]+$/u', $_POST['address_1'])) {
    $errors['address_1'] = '住所（市区町村）はひらがな・カタカナ・漢字・数字・スペース・ハイフンのみ入力できます。';
} elseif (mb_strlen($_POST['address_1']) > 10) {
    $errors['address_1'] = '住所（市区町村）は10文字以内で入力してください。';
}

if (empty($_POST['address_2'])) {
    $errors['address_2'] = '住所（番地）が未入力です。';
} elseif (!preg_match('/^[\p{Hiragana}\p{Katakana}\p{Han}0-9 \-]+$/u', $_POST['address_2'])) {
    $errors['address_2'] = '住所（番地）はひらがな・カタカナ・漢字・数字・スペース・ハイフンのみ入力できます。';
} elseif (mb_strlen($_POST['address_2']) > 100) {
    $errors['address_2'] = '住所（番地）は100文字以内で入力してください。';
}

if (!isset($_POST['authority'])) {
    $errors['authority'] = 'アカウント権限が未入力です。';
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['form']   = $_POST;
    header('Location: regist.php');
    exit;
}

$_SESSION['form'] = $_POST;
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>アカウント登録確認画面</title>
</head>

<body>
    <h1>アカウント登録確認画面</h1>
    <div class="confirm">
        <p>名前(姓)<?php echo $_POST['family_name']; ?></p>
        <p>名前(名)<?php echo $_POST['last_name']; ?></p>
        <p>カナ(姓)<?php echo $_POST['family_name_kana']; ?></p>
        <p>カナ(名)<?php echo $_POST['last_name_kana']; ?></p>
        <p>メールアドレス<?php echo $_POST['mail']; ?></p>
        <p>パスワード<?php echo $_POST['password']; ?></p>
        <p>性別<?php echo $_POST['gender'] === "0" ? "男性" : "女性"; ?></p>
        <p>郵便番号<?php echo $_POST['postal_code']; ?></p>
        <p>住所（都道府県）<?php echo $_POST['prefecture']; ?></p>
        <p>住所（市区町村）<?php echo $_POST['address_1']; ?></p>
        <p>住所（番地）<?php echo $_POST['address_2']; ?></p>
        <p>アカウント権限<?php echo $_POST['authority'] === "0" ? "一般" : "管理者"; ?></p>

        <form action="regist.php" method="post"><button>前に戻る</button></form>
        <form action="regist_complete.php" method="post"><button>登録する</button></form>
    </div>
</body>

</html>