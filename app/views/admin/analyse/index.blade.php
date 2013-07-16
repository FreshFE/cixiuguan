@extends('admin.layout')

@section('mainarea')

	<ul class="breadcrumb">
		<li><a href="{{ action('AdminController@index') }}">管理后台</a> <span class="divider">/</span></li>
		<li><a href="{{ action('CheckinController@index') }}">统计模块</a> <span class="divider">/</span></li>
		<li class="active">图标</li>
	</ul>

	<div class="toolbar clearfix">
	<!-- 	{{ Form::open(array('action' => 'AnalyseController@getChatPlace', 'class' => 'form-search pull-right', 'method' => 'get')) }}
	 -->	
	 		开始时间：{{ Form::text('startTime', null, array('id'=>'startTime', 'class' => 'input-medium search-query', 'placeholder' => '起始时间')) }}
			截止时间：{{ Form::text('finishTime', null, array('id'=>'finishTime', 'class' => 'input-medium search-query', 'placeholder' => '结束时间')) }}
			{{ Form::button('搜索', array('type' => 'button', 'class' => 'btn', 'onclick' => 'show()')) }}
	<!-- 	{{ Form::close() }} -->
	</div>	


	<div id="showImg">
		<img id="jpgrapg" src="{{ action('AnalyseController@getChatPlace') }}">
<!-- <img id="jpgrapg" src="{{ 'http://'.$_SERVER['HTTP_HOST'].'/a1.jpg' }}">-->	
	</div>

@stop

@section('bodyjs')

	<script type="text/javascript" src="{{ asset('assets/js/datePicker/jquery-ui.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/datePicker/jquery-css.css') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/datePicker/datePicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/datePicker/js/jquery-ui-1.10.3.custom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/datePicker/js/jquery-ui-1.10.3.custom.min.js') }}"></script>
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/js/datePicker/css/cupertino/jquery-ui-1.10.3.custom.css') }}"></script>

@stop