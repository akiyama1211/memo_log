<?php
$title = 'メモ作成';
$content = __DIR__ . '/views/new.php';

$errors = [];
$memo = [
  'title' => '',
  'status' => '',
  'priority' => '',
  'content' => ''
];

include __DIR__ . '/views/layout.php';
