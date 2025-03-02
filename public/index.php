<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/www/src/Services/DatabaseDataProvider.php');
require_once(__ROOT__.'/www/src/Services/DataFixtureManager.php');

/*
 * Requirements:
 * Reporting API. Transactions - payments. Merchant, amount, taxes. Billions.
 * Request data.
 * Report - monthly. For each merchant.
 *
 * Solution:
 * Controller - Reportcontroller:getReport.
 *
 *
 * */

try {
    $connection = getConnection();
    //$fixtureManager = new DataFixtureManager($connection);
    //$fixtureManager->run();


} catch (\Throwable $t) {
    echo 'Error: ' . $t->getMessage();
    echo '<br />';
}
function getConnection()
{
    $host = 'db';
    $dbname = 'database';
    $user = 'user';
    $pass = 'pass';
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

    return new \PDO($dsn, $user, $pass);
}
