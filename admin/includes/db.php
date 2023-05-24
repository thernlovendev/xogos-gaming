<?php

$db['db_host'] = 'xogosgaming-do-user-14057711-0.b.db.ondigitalocean.com:25060';
$db['db_user'] = 'doadmin';
$db['db_pass'] = 'AVNS_vyWqBA_ydiHYTBC-tiw';
$db['db_name'] = 'defaultdb';

foreach ($db as $key => $value) {

    define(strtoupper($key), $value);
}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//if ($connection) {
  //   echo 'We are connected';
 //}