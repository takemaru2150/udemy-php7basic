<?php
session_start();
require 'dbconnect.php';

if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
    $_SESSION['time'] = time();

    $members = $db->prepare('SELECT * FROM members WHERE id=?');
    $members->execute([$_SESSION['id']]);
    $member = $members->fetch();
} else {
    header('Location:login.php');
    exit();
}

if (!empty($_POST)) {
    if ($_POST['message'] !== '') {
        $message = $db->prepare('INSERT INTO posts SET member_id=?, message=?, reply_message_id=?, created=NOW()');
        $message->execute([$member['id'], $_POST['message'], $_POST['reply_post_id']]);

        header('Location:index.php');
        exit();
    }
}

$page = $_REQUEST['page']; //URLのページ数を取得
if ($page == '') {// 何もない時に1ページ目を表示
    $page = 1;
}
$page = max($page, 1); // 例）-100ページは1ページ目を表示

$counts = $db->query('SELECT COUNT(*) AS cnt FROM posts');
$cnt = $counts->fetch();
$maxPage = ceil($cnt['cnt'] / 5);
$page = min($page, $maxPage); // 例）100ページはmaxページを表示

$start = ($page - 1) * 5;

$posts = $db->prepare('SELECT m.name, m.picture,p.* FROM members m, posts p WHERE m.id=p.member_id ORDER BY p.created DESC LIMIT ?,5');
$posts->bindParam(1, $start, PDO::PARAM_INT);
$posts->execute();

if (isset($_REQUEST['res'])) {
    // 返信の処理
    $response = $db->prepare('SELECT m.name,m.picture,p. * FROM members m , posts p WHERE m.id=p.member_id AND p.id=?');
    $response->execute([$_REQUEST['res']]);

    $table = $response->fetch();
    $message = '@'.$table['name'].'  '.$table['message'];
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ひとこと掲示板</title>

    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="wrap">
        <div id="head">
            <h1>ひとこと掲示板</h1>
        </div>
        <div id="content">
            <div style="text-align: right"><a href="logout.php">ログアウト</a></div>
            <form action="" method="post">
                <dl>
                    <dt><?php echo htmlspecialchars($member['name'], ENT_QUOTES); ?>さん、メッセージをどうぞ</dt>
                    <dd>
                        <textarea name="message" cols="50"
                            rows="5"><?php echo htmlspecialchars($message, ENT_QUOTES); ?></textarea>
                        <input type="hidden" name="reply_post_id"
                            value="<?php echo htmlspecialchars($_REQUEST['res'], ENT_QUOTES); ?>" />
                    </dd>
                </dl>
                <div>
                    <p>
                        <input type="submit" value="投稿する" />
                    </p>
                </div>
            </form>
            <?php foreach ($posts as $post): ?>
            <div class="msg">
                <img src="member_picture/<?php echo htmlspecialchars($post['picture'], ENT_QUOTES); ?>" width="48"
                    height="48" alt="<?php echo htmlspecialchars($post['name'], ENT_QUOTES); ?>" />
                <p><?php echo htmlspecialchars($post['message'], ENT_QUOTES); ?><span
                        class="name">（<?php echo htmlspecialchars($post['name'], ENT_QUOTES); ?>）</span>[<a
                        href="index.php?res=<?php echo htmlspecialchars($post['id'], ENT_QUOTES); ?>">Re</a>]</p>
                <p class="day">
                    <a
                        href="view.php?id=<?php echo htmlspecialchars($post['id'], ENT_QUOTES); ?>"><?php echo htmlspecialchars($post['created'], ENT_QUOTES); ?></a>
                    <!-- 返信があるものだけ表示 -->
                    <?php if ($post['reply_message_id'] > 0):?>
                    <a href="view.php?id=<?php echo htmlspecialchars($post['reply_message_id'], ENT_QUOTES); ?>">
                        返信元のメッセージ</a>
                    <?php endif; ?>
                    <?php if ($_SESSION['id'] == $post['member_id']): ?>
                    [<a href="delete.php?id=<?php echo htmlspecialchars($post['id'], ENT_QUOTES); ?>"
                        style="color: #F33;">削除</a>]
                    <?php endif; ?>
                </p>
            </div>
            <?php endforeach; ?>
            <ul class="paging">
                <?php if ($page > 1):?>
                <li><a href="index.php?page=<?php echo htmlspecialchars($page - 1, ENT_QUOTES); ?>">前のページへ</a></li>
                <?php else: ?>
                <li>前のページへ</li>
                <?php endif; ?>
                <?php if ($page < $maxPage):?>
                <li><a href="index.php?page=<?php echo htmlspecialchars($page + 1, ENT_QUOTES); ?>">次のページへ</a></li>
                <?php else: ?>
                <li>次のページへ</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</body>

</html>