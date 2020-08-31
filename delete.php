<?php
$id = $_POST['delete_id'];
require_once('./connect.php');

if ($db) {
  $connect_message = '接続に成功しました';
  $sql = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($db, $sql);
  $del_data = $result->fetch_all(MYSQLI_ASSOC);
  // var_dump($del_data);

  $id = $del_data[0]['id'];
  $name = $del_data[0]['name'];
  $email = $del_data[0]['email'];
  $pass = $del_data[0]['pass'];

  $sql = "DELETE FROM users WHERE id = $id;";
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
  <h1>削除ページ</h1>
  <?php echo $connect_message ?>
  <p>以下のユーザーを削除しました</p>
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