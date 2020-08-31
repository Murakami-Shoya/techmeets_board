<?php
require_once('./connect.php');
if ($db) {
  $connect_message = '接続に成功しました';
  $sql = "SELECT id, name, email FROM users";
  $result = mysqli_query($db, $sql);
  // var_dump($result->fetch_all(MYSQLI_ASSOC));
  $user_data = $result->fetch_all(MYSQLI_ASSOC);
  // $result = mysqli_fetch_array($result);
  // var_dump($result);
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
    }

    h1 {
      text-align: center;
    }

    .user_area {
      /* display: inline-block; */
      border-top: 1px solid;
    }

    .user_area p,
    form {
      display: inline-block;
    }

    footer {
      padding-top: 30px;
    }
  </style>
</head>

<body>
  <p><?php echo ($connect_message) ?></p>
  <h1>ユーザー</h1>
  <?php foreach ($user_data as $value) : ?>
    <div class="user_area">
      <p><?php echo $value['id'], $value['name'], $value['email'] ?></p>
      <form action="./update_form.php" method="post">
        <input type="hidden" name="update_id" value="<?php echo ($value['id']); ?>">
        <input type="submit" value="更新" name="submit_button">
      </form>
      <form action="./delete.php" method="post">
        <input type="hidden" name="delete_id" value="<?php echo ($value['id']); ?>">
        <input type="submit" value="削除">
      </form>
    </div>
  <?php endforeach; ?>
  <div class="user_area"></div>
  <footer>
    <?php require_once('./template.php'); ?>
  </footer>
</body>

</html>