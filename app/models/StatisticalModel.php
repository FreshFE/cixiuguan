<?php 
class StatisticalModel extends Eloquent
{
	
	public static function getBar($dateOne, $dataTwo)
	{
		
		/*$results = DB::select('SELECT COUNT(*) AS num,title 
							   FROM checkin c 
							   JOIN place p 
							   ON c.place_id = p.id 
							   where create_at > DATE_SUB(create_at, INTERVAL 1 MONTH)
							   GROUP BY place_id'	
							);*/
		
		//查询一个月间的数据	
		$results = DB::select("SELECT COUNT(*) AS num,title 
							   FROM checkin c 
							   JOIN place p 
							   ON c.place_id = p.id 
							   where create_at between '".$dateOne."' and '".$dataTwo."'
							   GROUP BY place_id"	 
				    );
		return $results; 
	}
}