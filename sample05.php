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
// 28. JSONを読み込む
// JavaScript Object Notation
// JSONとは「JavaScriptのオブジェクト記法を用いたデータ交換フォーマット」です。
// xmlなどではなくJSONが使われる理由：短く書ける。各データ各データの内容がわかる。

$file = file_get_contents('https://h2o-space.com/feed/json/');
$json = json_decode($file);

foreach ($json->items as $item):
?>
・<a href="<?php  echo $item->url; ?>"><?php echo $item->title; ?></a>
<?php
endforeach;
?>
</pre>
    </main>
</body>

</html>