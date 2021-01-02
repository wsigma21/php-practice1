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
    require('dbconnection.php');

    // idが数字で指定されているかチェック
    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
      $id = $_REQUEST['id'];
      
      $items = $db->prepare('select * from items where id = ?');
      $items->execute(array($id));
      $item = $items->fetch();
    }
    ?>

    <form action="update_do.php" method="post">
      <input type="hidden" name="id" value="<?php print($id); ?>">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>id</th>
            <th>名前</th>
            <th>種類</th>
            <th>価格</th>
            <th>備考</th>
          </tr>
          </thread>
        <tbody>
          <tr>
            <td><?php print($id); ?></td>
            <td><input type="text" id="item_name" name="item_name" class="form-control" value="<?php print($item['item_name']); ?>"></td>
            <td>
              <select id="item_type" name="item_type" class="form-control" value="<?php print($item['item_type']); ?>">
                <option <?php echo $item['item_type'] == "衣服" ? "selected" : ""; ?>>衣服</option>
                <option <?php echo $item['item_type'] == "食品" ? "selected" : ""; ?>>食品</option>
                <option <?php echo $item['item_type'] == "書籍" ? "selected" : ""; ?>>書籍</option>
                <option <?php echo $item['item_type'] == "雑貨" ? "selected" : ""; ?>>雑貨</option>
              </select>
            </td>
            <td><input type="text" id="price" name="price" class="form-control" value="<?php print($item['price']); ?>"></td>
            <td><input type="text" id="remarks" name="remarks" class="form-control" value="<?php print($item['remarks']); ?>"></td>
          </tr>
        </tbody>
      </table>
      <div class="submit-button">
        <button type="submit" class="btn btn-primary">更新</button>
      </div>
    </form>

    <a href="list.php">一覧へ戻る</a>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>    
</html>