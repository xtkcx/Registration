<?php
session_start();
$form = $_SESSION['form'] ?? [];
?>

<!doctype HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>アカウント登録</title>
    <link rel="stylesheet" type="text/css" href="regist.css">
</head>

<body>
    <header>
        <div class="navi">
            ナビゲーションバー
        </div>
    </header>
    <h1>アカウント登録画面</h1>

    <form method="post" action="regist_confirm.php">

        <div>
            <label>名前（姓）</label>
            <input type="text" class="text" size="10" name="family_name" maxlength="10"
                   value="<?= $form['family_name'] ?? '' ?>">
        </div>

        <div>
            <label>名前（名）</label>
            <input type="text" class="text" size="10" name="last_name" maxlength="10"
                   value="<?= $form['last_name'] ?? '' ?>">
        </div>

        <div>
            <label>カナ（姓）</label>
            <input type="text" class="text" size="10" name="family_name_kana" maxlength="10"
                   value="<?= $form['family_name_kana'] ?? '' ?>">
        </div>

        <div>
            <label>カナ（名）</label>
            <input type="text" class="text" size="10" name="last_name_kana" maxlength="10"
                   value="<?= $form['last_name_kana'] ?? '' ?>">
        </div>

        <div>
            <label>メールアドレス</label>
            <input type="text" class="text" size="10" name="mail" maxlength="100"
                   value="<?= $form['mail'] ?? '' ?>">
        </div>

        <div>
            <label>パスワード</label>
            <input type="password" class="text" size="10" name="password" maxlength="10"
                   value="<?= $form['password'] ?? '' ?>">
        </div>

        <div>
            <label>性別</label>
            <label><input type="radio" name="gender" value="0" <?= (isset($form['gender']) && $form['gender'] === "0") ? "checked" : "" ?>>男</label>
            <label><input type="radio" name="gender" value="1" <?= (isset($form['gender']) && $form['gender'] === "1") ? "checked" : "" ?>>女</label>
        </div>

        <div>
            <label>郵便番号</label>
            <input type="text" class="text" size="10" name="postal_code" maxlength="7"
                   value="<?= $form['postal_code'] ?? '' ?>">
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
                    $selected = ($form['prefecture'] ?? '') === $pref ? "selected" : "";
                    echo "<option value='{$pref}' {$selected}>{$pref}</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label>住所（市区町村）</label>
            <input type="text" class="text" size="10" name="address_1" maxlength="10"
                   value="<?= $form['address_1'] ?? '' ?>">
        </div>

        <div>
            <label>住所（番地）</label>
            <input type="text" class="text" size="10" name="address_2" maxlength="100"
                   value="<?= $form['address_2'] ?? '' ?>">
        </div>

        <div>
            <label>アカウント権限</label>
            <select name="authority">
                <option value="0" <?= ($form['authority'] ?? '') === "0" ? "selected" : "" ?>>一般</option>
                <option value="1" <?= ($form['authority'] ?? '') === "1" ? "selected" : "" ?>>管理者</option>
            </select>
        </div>

        <div>
            <button type="submit">確認する</button>
        </div>

    </form>

    <footer>
        <div class="footer">
            フッター
        </div>
    </footer>
</body>
</html>
