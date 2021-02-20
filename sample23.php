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

<!-- 36. 剰余算 - 一行ごとにテーブルセルの色を変える -->
<?php

$week = ['金', '土', '日', '月', '火', '水', '木'];

// for ($i = 0; $i < 7; ++$i) {
//     echo $week[$i]."\n";
// }

for ($i = 1; $i < 31; ++$i) {
    echo $week[$i % 7]."\n";
}

?>
</pre>

        <table>
            <?php

for ($i = 1; $i <= 10; ++$i) {
    if ($i % 2) {
        echo '<tr style="background-color: #ccc">';
    } else {
        echo '<tr>';
    }
    echo '<td>'.$i.'行目</td>';
    echo '</tr>';
}
?>
            <tr>
            </tr>
        </table>

    </main>
</body>

</html>