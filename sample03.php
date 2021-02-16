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
// lesson26 file_get_contents - ファイルの読み込み
// news.txtを更新するだけでsample03.phpの内容も更新できる。→ホームページ更新に役立つ。
// $news = file_get_contents('../../news_date/news.txt');
// echo $news."\n";
// readfile('../../news_date/news.txt');

$news = file_get_contents('../../news_date/news.txt');
// $news .= '2020-02-18 ニュースを追加しました'."\n";
$news = "2020-02-18 ニュースを追加しました\n".$news;
file_put_contents('../../news_date/news.txt', $news);
echo $news;

?>
</pre>
    </main>
</body>

</html>