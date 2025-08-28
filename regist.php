<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$form   = $_SESSION['form']   ?? [];
?>
<!doctype HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>アカウント登録</title>
    <style>
        .error { color: red; font-size: 0.9em; }
    </style>
</head>

<body>
    <h1>アカウント登録画面</h1>

    <form method="post" action="regist_confirm.php">
        <div>
            <label>名前（姓）</label>
            <input type="text" name="family_name" maxlength="10"
                   value="<?= $form['family_name'] ?? '' ?>">
            <?php if(isset($errors['family_name'])): ?>
                <p class="error"><?= $errors['family_name'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>名前（名）</label>
            <input type="text" name="last_name" maxlength="10"
                   value="<?= $form['last_name'] ?? '' ?>">
            <?php if(isset($errors['last_name'])): ?>
                <p class="error"><?= $errors['last_name'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>カナ（姓）</label>
            <input type="text" name="family_name_kana" maxlength="10"
                   value="<?= $form['family_name_kana'] ?? '' ?>">
            <?php if(isset($errors['family_name_kana'])): ?>
                <p class="error"><?= $errors['family_name_kana'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>カナ（名）</label>
            <input type="text" name="last_name_kana" maxlength="10"
                   value="<?= $form['last_name_kana'] ?? '' ?>">
            <?php if(isset($errors['last_name_kana'])): ?>
                <p class="error"><?= $errors['last_name_kana'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>メールアドレス</label>
            <input type="text" name="mail" maxlength="100"
                   value="<?= $form['mail'] ?? '' ?>">
            <?php if(isset($errors['mail'])): ?>
                <p class="error"><?= $errors['mail'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>パスワード</label>
            <input type="password" name="password" maxlength="10"
                   value="<?= $form['password'] ?? '' ?>">
            <?php if(isset($errors['password'])): ?>
                <p class="error"><?= $errors['password'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>性別</label>
            <label><input type="radio" name="gender" value="0"
                <?= ($form['gender'] ?? '0') === '0' ? 'checked' : '' ?>>男</label>
            <label><input type="radio" name="gender" value="1"
                <?= ($form['gender'] ?? '') === '1' ? 'checked' : '' ?>>女</label>
            <?php if(isset($errors['gender'])): ?>
                <p class="error"><?= $errors['gender'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>郵便番号</label>
            <input type="text" name="postal_code" maxlength="7"
                   value="<?= $form['postal_code'] ?? '' ?>">
            <?php if(isset($errors['postal_code'])): ?>
                <p class="error"><?= $errors['postal_code'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>住所（都道府県）</label>
            <select name="prefecture">
                <option value=""></option>
                <?php
                $prefs = ["北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県",
                          "茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県",
                          "新潟県","富山県","石川県","福井県","山梨県","長野県","岐阜県",
                          "静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県",
                          "奈良県","和歌山県","鳥取県","島根県","岡山県","広島県","山口県",
                          "徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県",
                          "熊本県","大分県","宮崎県","鹿児島県","沖縄県"];
                foreach ($prefs as $pref) {
                    $selected = ($form['prefecture'] ?? '') === $pref ? 'selected' : '';
                    echo "<option value='{$pref}' {$selected}>{$pref}</option>";
                }
                ?>
            </select>
            <?php if(isset($errors['prefecture'])): ?>
                <p class="error"><?= $errors['prefecture'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>住所（市区町村）</label>
            <input type="text" name="address_1" maxlength="10"
                   value="<?= $form['address_1'] ?? '' ?>">
            <?php if(isset($errors['address_1'])): ?>
                <p class="error"><?= $errors['address_1'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>住所（番地）</label>
            <input type="text" name="address_2" maxlength="100"
                   value="<?= $form['address_2'] ?? '' ?>">
            <?php if(isset($errors['address_2'])): ?>
                <p class="error"><?= $errors['address_2'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <label>アカウント権限</label>
            <select name="authority">
                <option value="0" <?= ($form['authority'] ?? '0') === '0' ? 'selected' : '' ?>>一般</option>
                <option value="1" <?= ($form['authority'] ?? '') === '1' ? 'selected' : '' ?>>管理者</option>
            </select>
            <?php if(isset($errors['authority'])): ?>
                <p class="error"><?= $errors['authority'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <button type="submit">確認する</button>
        </div>
    </form>
</body>
</html>
