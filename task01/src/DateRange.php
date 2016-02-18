<?php
/**
 * Created by Astashov Andrey <mvc.aaa@gmail.com>
 * Date: 12.02.2016 / 9:39
 */

namespace mvcaaa\phpdevtask02;


use DateTime;

class DateRange
{

	private $date_start;
	private $date_end;

	public function __construct(DateTime $date_start, DateTime $date_end)
	{
		$this->date_end = $date_end;
		$this->date_start = $date_start;
	}

	public function toSqlPartString()
	{
		return "BETWEEN '" . $this->date_start->format("Y-m-d") . "' AND '" . $this->date_end->format("Y-m-d") . "'";
	}
}