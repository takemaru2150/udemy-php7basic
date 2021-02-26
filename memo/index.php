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
// 64. 接続プログラムを共通プログラムにする
require 'dbconnect.php';

// DateBaseにアクセス
// try {
//     // PDO = PHP Date Object
//     // mysql ホスト名　キャラセット　ユーザー名　パスワード
//     $db = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8', 'root', 'root');
// } catch (PDOException $e) {
//     echo 'DB接続エラー：'.$e->getMessage();
// }

// ※INSERT INTO のクオーテンションと、SQLのクオーテーションを分ける
// execは影響を与えた数を返す
// $count = $db->exec('INSERT INTO my_items SET maker_id=1, item_name="もも", price=210, keyword="缶詰,ピンク,甘い"');
// echo $count.'件のデータを挿入しました';

// 59. query - SELECT SQLを実行する
// queryは得られた値を返す
// $records = $db->query('SELECT * FROM my_items');
// fetchは1行を取得する。なくなるとfalse
// $recordは連想配列
// while ($record = $records->fetch()) {
    // echo $record['item_name']."\n";
// }

// 62. データの一覧・詳細画面を作る①
// $memos = $db->query('SELECT * FROM memos ORDER BY id DESC');

// 65. 件数の多いレコードを、ページを分ける「ページング（ページネーション）」①
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {// 1ページ目を表示させる
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}
$start = 5 * ($page - 1);

$memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?, 5');
$memos->bindParam(1, $start, PDO::PARAM_INT);
$memos->execute();
?>
        <article>
            <?php while ($memo = $memos->fetch()): ?>
            <p><a href="memo.php?id=<?php echo $memo['id']; ?>"><?php echo mb_substr($memo['memo'], 0, 50); ?></a></p>
            <time><?php echo $memo['created_at']; ?></time>
            <hr>
            <?php endwhile; ?>

            <!-- 66. 件数の多いレコードを、ページを分ける「ページング（ページネーション）」② -->
            <?php if ($page >= 2): ?>
            <a href="index.php?page=<?php echo $page - 1; ?>"><?php echo $page - 1; ?>ページ目へ</a>
            <?php endif; ?>
            |
            <a href="index.php?page=<?php echo $page + 1; ?>"><?php echo $page + 1; ?>ページ目へ</a>
        </article>
    </main>
</body>

</html>