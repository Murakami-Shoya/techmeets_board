<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$id = $_POST['id'];

require_once('./connect.php');
if ($db) {
  $connect_message = '接続に成功しました';
  $sql = "UPDATE users SET name = '$name', email = '$email', pass = '$pass' 
          WHERE id = '$id'";
  $result = mysqli_query($db, $sql);
} else {
  $connect_message = '接続に失敗しました';
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
  <h1>更新確認ページ</h1>
  <?php echo $connect_message ?>
  <p>以下のように変更しました。</p>
  <dl>
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