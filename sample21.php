<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>PHP</title>
</head>

<body>
    <header>
        <h1 class="font-weight-normal">PHP</h1>
    </header>

    <main>
        <h2>Practice</h2>
        <pre>
<?php
// 郵便番号を正規表現を使ってチェックする
// $zip = '１２３-４５６７';　// 郵便番号：〒123-4567
$zip = '123-4567';

// a	「全角」英数字を「半角」に変換します。
$zip = mb_convert_kana($zip, 'a', 'UTF-8');
if (preg_match("/\A\d{3}[-]\d{4}\z/", $zip)) {
    echo '郵便番号：〒'.$zip;
} else {
    echo '※郵便番号を　123-4567の形式でご記入ください';
}
?>
<!-- 近年ではメールアドレスのチェックを正規表現で行うと非常に難しいため、ブラウザの標準機能に任せる方法が多い -->
</pre>
    </main>
</body>

</html>