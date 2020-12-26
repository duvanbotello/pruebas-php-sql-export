<?php

require_once dirname(__FILE__) . '/vendor/autoload.php';
require dirname(__FILE__) . '/config.php';

/* ----------------- QUERY FOR THE DATABASE  ---------------*/
$sql = 'SELECT * from usuario';

try {
    /* ----------------- typeArchive
    1 for CSV
    2 for XLS
     ---------------*/
    SqlExport::exportQuery($sql, 1);
} catch (Exception $e) {
    echo $e;
}

