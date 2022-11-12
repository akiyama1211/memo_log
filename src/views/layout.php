<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheets/css/app.css">
    <title><?php echo $title?></title>
  </head>
  <body>
    <div class="container">
      <header class="mt-4">
        <h2><a href="index.php" class="text-dark text-decoration-none">メモ帳ログ</a></h2>
      </header>
      <div class="mb-4">
        <?php include $content?>
      </div>
    </div>
  </body>
</html>
