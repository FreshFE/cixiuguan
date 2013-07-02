@extends('admin.layout')

@section('mainarea')

	<ul class="breadcrumb">
		<li><a href="{{ action('AdminController@index') }}">管理后台</a> <span class="divider">/</span></li>
		<li><a href="{{ action('CheckinController@index') }}">统计模块</a> <span class="divider">/</span></li>
		<li class="active">图标</li>
	</ul>

	<div>
		<img src="{{ action('AnalyseController@getChatPlace') }}">
	</div>

@stop