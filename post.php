<?php
session_start();
if (
    empty($_POST["present"]) ||
    $_POST["present"] == $_SESSION["priv"]
) {
    header("Location: index.php?e=true");
    exit();
}

$hex = hash("crc32", $_POST["present"]);
$seed = intval($hex,16);
mt_srand($seed);

$LF = fopen(__DIR__ . "/db.lock","w");
flock($LF,LOCK_SH);

if (file_exists(__DIR__ . "/db.json")) {
    $db = file_get_contents(__DIR__ . "/db.json");
    $db = json_decode($db,true);
}else{
    $db = ["チルノの肩たたたき券"];
}

$len = count($db) - 1;
$get = $db[mt_rand(0,$len)];
$db[] = str_replace("<","＜",$_POST["present"]);
$db = array_unique($db);

flock($LF,LOCK_EX);
file_put_contents(__DIR__ . "/db.json",json_encode($db));
flock($LF,LOCK_UN);
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
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="<?php echo "プレゼント交換で「 $get 」をもらいました！"; ?>" data-url="http://c.nucosen.live/" data-hashtags="幻想郷プレゼント交換2020" data-related="Poltergeist_L" data-lang="ja" data-dnt="true" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <form action="/index.php" method="get"><input type="submit" value="　もう一度やりなおす　"></form>
</body>
</html>