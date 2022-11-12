<?php

require_once __DIR__ . '/lib/mysql.php';
require_once __DIR__ . '/lib/escape.php';

function listMemos($link) {
  $memos = [];
  $sql = <<<EOT
SELECT * FROM memos;
EOT;

  $result = mysqli_query($link, $sql);
  while($memo = mysqli_fetch_assoc($result)) {
    $memos[] = $memo;
  }
  mysqli_free_result($result);
  return $memos;
}

$link = dbConnect();
$memos = listMemos($link);

$title = 'メモ帳一覧';
$content = __DIR__ . '/views/index.php';

include __DIR__ . '/views/layout.php';
