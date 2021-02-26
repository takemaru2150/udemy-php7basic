<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/style.css" />

    <title>PHP</title>
</head>

<body>
    <header>
        <h1 class="font-weight-normal">PHP</h1>
    </header>

    <main>
        <h2>Practice</h2>
        <!-- 68. メモを変更する、編集画面
 -->
        <?php
if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $memos = $db->prepare('SELECT * FROM memos WHERE id=?');
    $memos->execute([$id]);
    $memo = $memos->fetch();
}
?>

        <form action="update_do.php" method="POST">
            <input type="hidden" name="id" value=<?php echo $id; ?>>
            <textarea name="memo" cols="50" rows="10"><?php echo $memo['memo']; ?></textarea><br />
            <button type="submit">登録する</button>
        </form>
        <a href="memo.php?id=<?php echo $id; ?>">戻る</a>
    </main>
</body>

</html>