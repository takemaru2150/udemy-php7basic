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
        <?php
// try {
//     $db = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8', 'root', 'root');
// } catch (PDOException $e) {
//     echo 'DB接続エラー：'.$e->getMessage();
// }

// 64. 接続プログラムを共通プログラムにする
require 'dbconnect.php';

// 62. データの一覧・詳細画面を作る①
// $memos = $db->query('SELECT * FROM memos WHERE id=1');

// 63. データの一覧・詳細画面を作る②
// 安全性を確かめる。
$id = $_REQUEST['id'];
if (!is_numeric($id) || $id <= 0) { // is_numeric 数字であるかどうか
    echo '1以上の数字で指定してください';
    exit();
}

// URLパラメータを渡す
$memos = $db->prepare('SELECT * FROM memos WHERE id=?');
$memos->execute([$id]);

$memo = $memos->fetch();
?>
        <article>
            <pre><?php echo $memo['memo']; ?></pre>

            <a href="index.php">戻る</a>
        </article>
    </main>
</body>

</html>