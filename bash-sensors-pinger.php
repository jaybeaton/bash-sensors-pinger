<?php

//const RED = "\e[0;31m";
//const YELLOW = "\e[1;33m";
//const ORANGE = "\e[0;33m";
//const MAGENTA = "\e[1;35m";
//const CYAN = "\e[1;36m";
//const BLUE = "\e[1;34m";
//const GREEN = "\e[1;32m";
const RED = "🔴";
const YELLOW = "🟡";
const ORANGE = "🟠";
const MAGENTA = "\e[1;35m";
const PURPLE = "🟣";
const BLUE = "🔵";
const GREEN = "🟢";

$host = '8.8.8.8';
//$host = 'xxxxxxxxxxxxx';
//$time = `ping $host -c 1 | grep -E -o 'time=[0-9.]+' | cut -f2 -d'='`;
$time = `( ping $host -c 1 | grep -E -o 'time=[0-9.]+' | cut -f2 -d'=') 2>/dev/null`;

//print RED . ' RED ' . YELLOW . ' YELLOW ' . ORANGE . ' ORANGE ' . MAGENTA . ' MAGENTA '
//  . CYAN . ' CYAN ' . BLUE . ' BLUE ' . GREEN . ' GREEN ' . "\n";
//  . YELLOW . ' BLUE ' . YELLOW . ' BLUE ' . YELLOW;
$color = '';
if (!$time = round(floatval($time))) {
  // https://getemoji.com/
  $time = '❌';
//  $color = RED;
}
else {
  if ($time > 1000) {
    $time = round($time / 1000, 1) . 's';
    $color = RED;
  }
  else {
    if ($time > 100) {
      $color = YELLOW;
    }
    elseif ($time > 60) {
      $color = PURPLE;
    }
    elseif ($time > 30) {
      $color = BLUE;
    }
    else {
      $color = GREEN;
    }
    $time .= 'ms';
  }
}
//print $color . $time . "\e[0m";
print trim($time . ' ' . $color);

