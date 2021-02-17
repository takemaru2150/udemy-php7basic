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
// echo 1 + 1;
// date_default_timezone_set('Asia/Tokyo');
// echo 現在は.date('l jS \of F Y h:i:s A');

// $today = new DateTime();
// echo $today->format('G時i分s秒');

$sum = 100 + 300 + 1000;

// エスケープシーケンスは””で囲う
// 変数は""で囲うと変数の中身が表示される
echo '$sum'."\n";
echo "$sum"."\n";

// レッスン16
// $i = 1;
// while ($i <= 10) {
//     echo $i++."\n";
// }

// レッスン17
// for ($i = 1; $i <= 10; ++$i) {
//     echo $i."\n";
// }

// レッスン18
// for ($i = 1; $i <= 10; ++$i) {
//     echo  $i."\n";
// }
// 明日の日付を表示
echo date('n/j(D)', time() + 60 * 60 * 24)."\n";

// 二日後の日付
// レッスン19
echo date('n/j(D)', strtotime('+2day'))."\n";

// 繰り返し
// for ($i = 0; $i < 366; ++$i) {
    //     $date = strtotime('+'.$i.'day');
    //     echo date('n/j(D)', $date)."\n";
    // }

    /* for ($i = 0; $i < 366; ++$i):
        $date = strtotime('+'.$i.'day');
        echo date('n/j(D)', $date)."\n";
    endfor; */

    // レッスン20

    echo date(w)."\n";

    $week_name = ['日', '月', '火', '水', '木', '金', '土'];

    echo $week_name[1]."\n";

    echo $week_name[date(w)]."\n";

    // 曜日を英語表記から日本語表記へ
    /* for ($i = 0; $i < 366; ++$i) {
        $date = strtotime('+'.$i.'day');
        echo date('n/j', $date);
        echo '('.$week_name[date(w, $date)].')'."\n";
    } */

    // レッスン21. 連想配列とforeach構文 - 英単語と日本語の対応表を作る
    $fruits = ['apple' => 'りんご',
    'grape' => 'ぶどう',
    'lemon' => 'レモン',
    'tomato' => 'トマト',
    'peach' => 'もも', ];

// echo $fruits[lemon];

foreach ($fruits as $val) {
    echo $val."\n";
}

foreach ($fruits as $english => $japanese) {
    echo $english.':'.$japanese."\n";
}

// レッスン22. if構文 - 9時よりも前の時間の場合に、警告を表示する
    if (date('G') < 9) {
        echo ※現在受付時間外です;
    } else {
        echo ようこそ."\n";
    }

    $x = 'aiueo';
    if ($x) { // true / false
        echo 文字が入っています."\n";
    }

    // レッスン23 ceil, floor, round - 小数を整数に切り上げる・切り下げる
    // 3000円のものから、100円引きした場合はO％引きです。
    // 切り捨てfloor
echo '3000円のものから、100円引きした場合は'.floor(100 / 3000 * 100)."％引きです。\n";

// ■そのほかの計算
// 切り上げceil
echo '3000円のものから、100円引きした場合は'.ceil(100 / 3000 * 100).'％引きです。'."\n";

// 四捨五入round
echo '3000円のものから、100円引きした場合は'.round(100 / 3000 * 100, 1).'％引きです。'."\n";

// レッスン24 sprintf - 書式を整える
// dはdigit桁の意味、sはstring文字の意味
$date = sprintf('%04d年 %02d月 %02d日 %s', 2020, 2, 16, 火);
echo $date."\n";

// レッスン25　file_put_contents - ファイルに内容を書き込む
$success = file_put_contents('../../news_date/news.txt', '2020-02-16 ホームページをリニューアルしました');
if ($success) {
    echo ファイルの書き込みが完了しました."\n";
} else {
    echo 書き込みに失敗しました。フォルダの権限などを確認してください。."\n";
}
    ?>
</pre>
    </main>
</body>

</html>