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
  <div class="container">
    <?php
    // MySQLに接続する
    try {
      $db = new PDO('mysql:dbname=practice;host=127.0.0.1;charset=utf8','root','root');
    } catch(PDOException $e) {
      echo 'DB接続エラー：' . $e->getMessage();
    }

    // 一覧表を作る
    $items = $db->query("select * from items order by id");
    ?>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>id</th>
          <th>名前</th>
          <th>種類</th>
          <th>価格</th>
          <th>備考</th>
          <th>登録日</th>
        </tr>
      </thread>
      <tbody>
        <?php while($item = $items->fetch()): ?>
          <tr>
            <td><?php print($item['id']); ?></td>
            <td><?php print($item['item_name']); ?></td>
            <td><?php print($item['item_type']); ?></td>
            <td><?php print($item['price']); ?></td>
            <td><?php print($item['remarks']); ?></td>
            <td><?php print($item['created_at']); ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <a href="input.html">新規登録へ</a>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>    
</html>