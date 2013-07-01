<?php
use JpGraph\JpGraph;
define('TTF_DIR','/Users/tommy/Developing/php/cixiuguan/fonts/');
define('MBTTF_DIR','/Users/tommy/Developing/php/cixiuguan/fonts/');

class StatisticalController extends BaseController {

	public function index()
	{
		JpGraph::load();//load jpgraph的方法
		JpGraph::module('bar');

		$thex = array();//景点名称X轴显示
		$data = array();//统计景点个数柱状显示

		$results = DB::select('SELECT COUNT(*) AS num,title 
							   FROM checkin c 
							   JOIN place p 
							   ON c.place_id = p.id 
							   GROUP BY place_id'
				    ); 
		
		$i = 0;
		foreach ($results as $key => $value) {
			$thex[$i] = $value['title'];
			$data[$i] = $value['num'];
			$i++;
		}

		$graph = new Graph(800,800,'auto');
		$graph->SetScale("textlin");
		$graph->yaxis->scale->SetGrace(20); 
		$graph->SetBox(false);
		$graph->ygrid->SetFill(false);

		$graph->title->SetFont(FF_SIMSUN,FS_BOLD);	
		$graph->title->Set("周庄景点统计数量");
		$graph->title->SetMargin(70);

		$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
		$graph->yaxis->title->Set("【y轴：统计数量】");	
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);

		$graph->xaxis->SetFont(FF_SIMSUN,FS_BOLD);
		$graph->xaxis->SetLabelAlign('right');
		$graph->xaxis->SetTickLabels($thex);
		$graph->xaxis->SetLabelAngle(30);//x轴名称旋转30度

		$b1plot = new BarPlot($data);
		$graph->Add($b1plot);
		$b1plot->SetColor("white");
		$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
		$b1plot->SetWidth(45);
		$graph->Stroke(); 
	}

	
}