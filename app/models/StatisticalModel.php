<?php 
class StatisticalModel extends Eloquent
{
	
	public static function getBar($startTime, $finishTime)
	{
		$results = DB::table('checkin')
					->select(DB::raw('count(*) as num, title'))
					->join('place', 'place_id', '=', 'place.id')
                    ->whereBetween('create_at', array($startTime, $finishTime))
                    ->groupBy('place_id')
                    ->get();
		return $results; 
	}
}