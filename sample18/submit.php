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
                  <!-- index.htmlからname=genderを受信 -->
            <!-- inputのname属性が入る。フラグを指定。 -->
            <!-- method属性がgetなので、$_REQUESTまたは$_GET -->
            <!-- getはgetに対応、postはpostに対応、$_REQUESTはどちらかわかっていない時に使用ただしパスワードの利用に注意 -->
    お名前： <?php echo htmlspecialchars($_REQUEST['my_name'], ENT_QUOTES); ?>
</pre>
    </main>
</body>

</html>