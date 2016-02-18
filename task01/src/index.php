<?php
/**
 * Created by Astashov Andrey <mvc.aaa@gmail.com>
 * Date: 12.02.2016 / 9:09
 */

namespace mvcaaa\phpdevtask01;

use DateTime;
use mvcaaa\phpdevtask02\DateRange;
use PDO;

require __DIR__ . '/db.php';
require_once __DIR__ . '/Application.php';
require_once __DIR__ . '/DateRange.php';

$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHARSET,
);

try
{
	$databaseHandler = new PDO(DB_TYPE . ':host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USER, DB_PASSWD, $options);
} catch (\PDOException $e)
{
	die("Connection error:" . $e->getMessage());
}

$range = new DateRange(new DateTime($_GET['date_start']), new DateTime($_GET['date_end']));

$app = new Application($databaseHandler);
$results = $app->getData($range);

header('Content-type: application/json');
echo json_encode($results);





