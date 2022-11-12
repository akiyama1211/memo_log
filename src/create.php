<?php
require_once __DIR__ . '/lib/mysql.php';

$memo = [];

// sql挿入
function createMemo($link, $memo) {
  $sql = <<<EOT
  INSERT INTO memos (
    title,
    status,
    priority,
    contents
) VALUES  (
  "{$memo['title']}",
  "{$memo['status']}",
  "{$memo['priority']}",
  "{$memo['content']}"
  )
EOT;

$result = mysqli_query($link, $sql);
if(!$result) {
  error_log('Error: fail to creats review');
  error_log('Debugging Error;' . mysqli_error($link));
  }
}

// バリデーション
function validate($memo) {
  $errors = [];

  if(!strlen($memo['title'])) {
    $errors['title'] = '件名を入力してください。';
  }

  if(!in_array($memo['status'], ['完了', '未完了'])) {
    $errors['status'] = '完了or未完了から状態を選択してください。';
  }

  if(!strlen($memo['priority'])) {
    $errors['priority'] = '重要度を選択してください。';
  } elseif($memo['priority'] < 1 || $memo['priority'] > 5) {
    $errors['priority'] = '重要度は1~5で入力してください。';
  }

  if(!strlen($memo['content'])) {
    $errors['content'] = '内容を入力してください。';
  }

  return $errors;
}


if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $status = '';
  if(array_key_exists('status', $_POST)) {
    $status = $_POST['status'];
  }

  $memo['title'] = $_POST['title'];
  $memo['status'] = $status;
  $memo['priority'] = $_POST['priority'];
  $memo['content'] = $_POST['content'];

  $errors = validate($memo);
  if(!count($errors)) {
    $link = dbConnect();
    createMemo($link, $memo);
    mysqli_close($link);
    header('Location:  index.php');
  } else {
    $title = 'メモ作成';
    $content = __DIR__ . '/views/new.php';
    include __DIR__ . '/views/layout.php';
  }
}
