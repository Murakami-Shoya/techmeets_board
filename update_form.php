<?php $id = $_POST['update_id']; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TECHMEETS掲示板</title>
  <style>
    body {
      width: 800px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <h1><?php echo '更新ページ' . '<br>'; ?></h1>
  <h2><?php echo 'ID:' . $id . 'のユーザーの更新'; ?></h2>
  <form action="./update.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id ?>">
	<label>名前</label>
	<input type="text" name="name">
	<label>メールアドレス</label>
	<input type="text" name="email">
	<label>パスワード</label>
	<input type="password" name="pass">
	<input type="submit" value="更新">
	</form>
  <footer>
    <?php require_once('./template.php'); ?>
  </footer>
</body>
</html>
