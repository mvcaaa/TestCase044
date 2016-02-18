<?php

/**
 * Created by Astashov Andrey <mvc.aaa@gmail.com>
 * Date: 12.02.2016 / 9:10
 */
namespace mvcaaa\phpdevtask01;

use mvcaaa\phpdevtask02\DateRange;
use PDO;

class Application
{
	private $databaseHandler;

	public function __construct(PDO $databaseHandler)
	{
		$this->databaseHandler = $databaseHandler;
	}

	public function getData(DateRange $dateRange)
	{
		$query = $this->databaseHandler->prepare("SELECT
		    HOUR(moment) AS `hour`, 
		    COUNT(*) AS `count`
			FROM systemcall
			WHERE moment " . $dateRange->toSqlPartString() . " 
			GROUP BY `hour`;");
		if (!$query)
		{
			throw (new \PDOException("Error in SQL"));
		}
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);;
	}


}