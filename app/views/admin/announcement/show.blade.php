@extends('admin.layout')

@section('mainarea')

	<ul class="breadcrumb">
		<li><a href="{{ action('AdminController@index') }}">管理后台</a> <span class="divider">/</span></li>
		<li><a href="{{ action('AnnouncementController@index') }}">公告模块</a> <span class="divider">/</span></li>
		<li class="active">详情</li>
	</ul>

	<table class="table table-bordered">
		<tr>
			<th>标题</th>
			<td>{{ $data->title }}</td>
		</tr>
		<tr>
			<th>内容</th>
			<td>{{ $data->content }}</td>
		</tr>
		<tr>
			<th>创建时间</th>
			<td>{{ $data->create_at }}</td>
		</tr>
		<tr>
			<th>更新时间</th>
			<td>{{ $data->update_at }}</td>
		</tr>
		<tr>
			<th>操作</th>
			<td>
				<div class="btn-group">
					<a href="{{ action('AnnouncementController@getEdit', array('id' => $data->id)) }}" class="btn">编辑</a>
					<a href="{{ action('AnnouncementController@destory', array('id' => $data->id)) }}" class="btn">删除</a>
				</div>
			</td>
		</tr>
	</table>

@stop