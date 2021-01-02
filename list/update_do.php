<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<title>一覧表</title>
</head>
<body>
<header>
    
</header>

<main>
  <pre>
    <div class="container">
      <?php
      // MySQLに接続する
      require('dbconnection.php');

      // 値段が半角数字かどうかチェック
      $price = $_POST['price'];
      $price = mb_convert_kana($price, 'n', 'UTF-8');
      if (!is_numeric($price)) {
        echo '<p>価格は数字を入力してください</p>';
        echo '<a href="list.php">一覧へ戻る</a>';
        exit();
      }

      //bindしてUPDATE
      $statement = $db->prepare("UPDATE items SET item_name=?, item_type=?, price=?, remarks=?, updated_at=NOW() where id=?");
      $statement->bindParam(1, $_POST['item_name']);
      $statement->bindParam(2, $_POST['item_type']);
      $statement->bindParam(3, $price);
      $statement->bindParam(4, $_POST['remarks']);
      $statement->bindParam(5, $_POST['id']);
      $statement->execute();
      echo '<p>商品情報を更新しました</p>';
      ?>
      <a href="list.php">商品一覧表へ</a>
    </div>
  </pre>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>    
</html>