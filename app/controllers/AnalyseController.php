<?php

use JpGraph\JpGraph;

class AnalyseController extends BaseController {
	
	/**
	 * 统计首页
	 */
	public function index()
	{
		return View::make('admin/analyse/index');
	}
	
	/**
	 * 获得统计图像
	 *
	 * @param $dataOne, $dateTwo
	 */
	public function getChatPlace($dateOne, $dateTwo)
	{
		// 配置字体常量
		define('TTF_DIR', base_path() . '/fonts/');
		define('MBTTF_DIR', base_path() . '/fonts/');

		// 加载模块
		JpGraph::module('bar');

		// 计算时间
		// 本月数据
		// 当前时间
		$dataOne = date('Y-m-d h:i:s', time()-30*24*60*60);
		$dateTwo = date('Y-m-d h:i:s');

		// 查询一个月数据
		$results = StatisticalModel::getBar($dataOne, $dateTwo);

		// 景点名称X轴显示
		// 统计景点个数柱状显示 
		$thex = array();
		$data = array();

		foreach ($results as $key => $value) {
			$thex[$key] = $value->title;
			$data[$key] = $value->num;
		}

		// 新建画布
		$graph = new Graph(800,800,'auto');
		$graph->SetScale("textlin");
		$graph->yaxis->scale->SetGrace(20); 
		$graph->SetBox(false);
		$graph->ygrid->SetFill(false);

		$graph->title->SetFont(FF_SIMSUN,FS_BOLD);	
		$graph->title->Set("周庄景点统计数量");
		$graph->title->SetMargin(70);
		$graph->title->SetColor("red");

		$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
		$graph->yaxis->title->Set("统计数量");	
		$graph->yaxis->title->SetColor("red");
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);

		$graph->xaxis->SetFont(FF_SIMSUN,FS_BOLD);
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