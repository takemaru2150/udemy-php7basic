<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/style.css">

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
// DateBaseにアクセス
try {
    // PDO = PHP Date Object
    // mysql ホスト名　キャラセット　ユーザー名　パスワード
    $db = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    echo 'DB接続エラー：'.$e->getMessage();
}

// ※INSERT INTO のクオーテンションと、SQLのクオーテーションを分ける
// execは影響を与えた数を返す
// $count = $db->exec('INSERT INTO my_items SET maker_id=1, item_name="もも", price=210, keyword="缶詰,ピンク,甘い"');
// echo $count.'件のデータを挿入しました';

// 59. query - SELECT SQLを実行する
// queryは得られた値を返す
$records = $db->query('SELECT * FROM my_items');
// fetchは1行を取得する。なくなるとfalse
// $recordは連想配列
// while ($record = $records->fetch()) {
    // echo $record['item_name']."\n";
// }

?>
</pre>
    </main>
</body>

</html>