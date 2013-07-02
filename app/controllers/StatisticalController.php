<?php
use JpGraph\JpGraph;
define('TTF_DIR','/Users/tommy/Developing/php/cixiuguan/fonts/');
define('MBTTF_DIR','/Users/tommy/Developing/php/cixiuguan/fonts/');
header('Content-type: text/html; charset=gbk') ;

class StatisticalController extends BaseController {
	
	public function index()
	{
		return View::make('bar');
	}
	
	/**
	 * 获得统计图像
	 *
	 * @param $dataOne, $dateTwo
	 */
	public function getBar()
	{
		JpGraph::load();//load jpgraph的方法
		JpGraph::module('bar');
		$dataOne = date('Y-m-d h:i:s', time()-30*24*60*60);//本月数据
		$dateTwo = date('Y-m-d h:i:s');//当前时间
		$thex = array();//景点名称X轴显示
		$data = array();//统计景点个数柱状显示 

		$results = StatisticalModel::getBar($dataOne, $dateTwo);//查询一个月数据

		$i = 0;
		foreach ($results as $key => $value) {
		//	$thex[$i] = iconv('UTF-8', 'GB2312', $value->title) ;
			$thex[$i] = $value->title;
			$data[$i] = $value->num;
			$i++;
		}

		// var_dump($thex);
		// echo '<hr>';
		// var_dump($data);
		// exit();

		$graph = new Graph(800,800,'auto');
		$graph->SetScale("textlin");
		$graph->yaxis->scale->SetGrace(20); 
		$graph->SetBox(false);
		$graph->ygrid->SetFill(false);

	//	$graph->title->SetFont(FF_SIMSUN,FS_BOLD);	
		$graph->title->Set("周庄景点统计数量");
		$graph->title->SetMargin(70);
		$graph->title->SetColor("red");

	//	$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
		$graph->yaxis->title->Set("统计数量");	
		$graph->yaxis->title->SetColor("red");
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);

	//	$graph->xaxis->SetFont(FF_SIMSUN,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
		$graph->xaxis->title->Set("刺绣管名称");
		$graph->xaxis->title->SetColor("red");
		$graph->xaxis->title->SetMargin(7);
		$graph->xaxis->SetLabelAlign('right');
		$graph->xaxis->SetTickLabels($thex);
		$graph->xaxis->SetLabelAngle(15);//x轴名称旋转30度

		$b1plot = new BarPlot($data);
		$graph->Add($b1plot);
		$b1plot->SetColor("white");
		$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
		$b1plot->SetWidth(45);
		$graph->Stroke(); 
	}	
}