<?php

function escape($string) {
  $result =  htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
  return $result;
}
