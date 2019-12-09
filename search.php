<?php
  require_once('dbconnect.php');
// 検索ボタンをクリックしたらユーザーした内容と一致するデータ
// を画面に表示する
// $_GET['nickname']が存在していれば
$nickname='';
if(isset($_GET['nickname'])){
    $nickname=$_GET['nickname'];
    // var_dump($nickname);
    
}

// ユーザーが入力した内容を取得
// 取得した内容は$nicknameに代入
// 変数$nicknameを画面に取得できてるか確認

// ユーザーが入力した内容でDBで検索
$stmt = $dbh->prepare('SELECT * FROM surveys WHERE nickname=?');
$stmt->execute([$nickname]);
$results = $stmt->fetchAll();

// echo '<pre>';
// var_dump($results);
// exit;
// 検索結果を画面に表示する
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
</head>
<body>
    <form action="search.php" method="GET">
        <p>検索したいnicknameを入力してください。</p>
        <input type="text" name="nickname">
        <input type="submit" value="検索">
    </form>
    <!-- 画面に表示する -->
    <?php foreach($results as $result):?>
     <p><?php echo $result['nickname'] ?></p>
     <p><?php echo $result['email'] ?></p>

    <?php endforeach;?>
</body>
</html>