<?php
define("FILENAME", __DIR__ . "/db.txt");

// 不正検査
session_start();
if (
    empty($_POST["present"]) ||
    $_POST["present"] == $_SESSION["priv"]
) {
    header("Location: index.php?e=true");
    exit();
}
$_SESSION["priv"] = $_POST["present"];

// シード値算出
$hex = hash("crc32", $_POST["present"]);
$seed = intval($hex, 16);
mt_srand($seed);

// ロード
$db = file_exists(FILENAME) ? file(FILENAME) : ["チルノの肩たたたき券"];
$get = $db[mt_rand(0, count($db) - 1)];

// 追記
$db[] = str_replace("<", "＜", $_POST["present"]);
$db = array_unique($db);
file_put_contents(__DIR__ . "/db.txt", implode("\n",$db));
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>結果 | 幻想郷プレゼント交換2020</title>
</head>

<body>
    <script>
        console.log("Seed : " + <?php echo $seed; ?>);
    </script>
    <h1>幻想郷プレゼント交換2020</h1>
    <h2>結果</h2>
    <p>「<?php echo $get; ?>」をもらいました！</p>
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="<?php echo "プレゼント交換で「 $get 」をもらいました！"; ?>" data-url="http://c.nucosen.live/" data-hashtags="幻想郷プレゼント交換2020" data-related="Poltergeist_L" data-lang="ja" data-dnt="true" data-show-count="false">Tweet</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <form action="/index.php" method="get"><input type="submit" value="　もう一度やりなおす　"></form>
</body>

</html>