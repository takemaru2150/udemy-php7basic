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
$age = ２０;

// 全角数字を半角数字に直す
$age = mb_convert_kana($age, 'n', 'UTF-8');

// is_numeric パラメータを数字が判断
if (is_numeric($age)) {
    echo $age.'歳';
} else {
    echo ※年齢が数字ではありません;
}
?>
</pre>
    </main>
</body>

</html>