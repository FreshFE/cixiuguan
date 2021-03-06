@extends('admin.layout')

@section('mainarea')

	<ul class="breadcrumb">
		<li><a href="{{ action('AdminController@index') }}">管理后台</a> <span class="divider">/</span></li>
		<li><a href="{{ action('AnnouncementController@index') }}">公告模块</a> <span class="divider">/</span></li>
		<li class="active">创建</li>
	</ul>

	{{ Form::open(array('action' => 'AnnouncementController@postCreate', 'class' => 'form')) }}

		<div class="control-group">
			<label class="control-label">主题</label>
			<div class="controls">
				{{ Form::text('title', null, array('class' => 'span6')) }}
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">内容</label>
			<div class="controls">
				{{ Form::textarea('content', null, array('class' => 'span6', 'rows' => 8)) }}
			</div>
		</div>

		<div class="form-action">
			{{ Form::button('创建', array('type' => 'submit', 'class' => 'btn btn-success')) }}
		</div>

	{{ Form::close() }}

@stop