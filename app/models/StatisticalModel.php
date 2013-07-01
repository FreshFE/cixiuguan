<?php 
class StatisticalModel extends Eloquent
{
	public static function getBar()
	{
		$results = DB::select('SELECT COUNT(*) AS num,title 
							   FROM checkin c 
							   JOIN place p 
							   ON c.place_id = p.id 
							   GROUP BY place_id'
				    );
		return $results; 
	}
}