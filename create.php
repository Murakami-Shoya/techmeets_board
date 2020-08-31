<?php
require_once('./connect.php');
if($db){
  $connect_message = "接続に成功しました";
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $sql = "INSERT INTO users (name, email, pass) VALUES ('$name', '$email', '$pass');";
  $result = mysqli_query($db, $sql);
  
  if($result){
    echo '書き込みに成功しました';
    $sql = "SELECT * FROM users GROUP BY id DESC LIMIT 1;";
    $result = mysqli_query($db, $sql);
    $new_data = $result->fetch_all(MYSQLI_ASSOC);
    // var_dump($new_data);
    $id = $new_data[0]['id'];
    $name = $new_data[0]['name'];
    $email = $new_data[0]['email'];
    $pass = $new_data[0]['pass'];
  }else{
    echo '書き込みに失敗しました';
  }
}else{
  $connect_message = "接続に失敗しました";
}
$db->close();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TECHMEETS掲示板</title>
  <style>
    body {
      width: 400px;
      margin: 0 auto;
      line-height: 2.5rem;
    }
    dt {
      float: left;
      font-weight: bold;
    }

    dt::after {
      content: "\00A0:\00A0";
    }
  </style>
</head>
<body>
<h1>ユーザー作成</h1>
  <?php echo $connect_message ?>
  <p>以下のように追加しました。</p>
  <dl>
    <dt>id</dt>
    <dd><?php echo $id; ?></dd>
    <dt>名前</dt>
    <dd><?php echo $name; ?></dd>
    <dt>Email</dt>
    <dd><?php echo $email; ?></dd>
    <dt>Password</dt>
    <dd><?php echo $pass; ?></dd>
  </dl>
  <?php require_once('./template.php'); ?>
</body>
</html>