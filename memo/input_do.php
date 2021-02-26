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

// 60. フォームからの情報を保存する①
// try {
    // $db = new PDO('mysql:dbname=mydb;host:8080;charset=utf-8', 'root', 'root');

    // $db->exec('INSERT INTO memos SET memo="'.$_POST['memo'].'", created_at=NOW()');

    // 61. フォームからの情報を保存する②
    // prepare = 事前準備
    /* $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
    $statement->bindparam(1, $_POST['memo']);
    $statement->execute([$_POST['memo']]);
    echo メッセージが登録されました; */
    // } catch (PDOException $e) {
        // echo 'DB接続エラー:'.$e->getMessage();
        // }

// 64. 接続プログラムを共通プログラムにする
require 'dbconnect.php';
$statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
$statement->bindparam(1, $_POST['memo']);
$statement->execute([$_POST['memo']]);
echo メッセージが登録されました;
?>
</pre>
    </main>
</body>

</html>