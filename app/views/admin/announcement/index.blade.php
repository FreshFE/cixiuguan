@extends('admin.layout')

@section('mainarea')

	<ul class="breadcrumb">
		<li><a href="{{ action('AdminController@index') }}">管理后台</a> <span class="divider">/</span></li>
		<li><a href="{{ action('AnnouncementController@index') }}">公告模块</a> <span class="divider">/</span></li>
		<li class="active">列表</li>
	</ul>

	<div class="toolbar clearfix">
		<a href="{{ action('AnnouncementController@getCreate') }}" class="btn"><i class="icon-file"></i> 创建</a>

		{{ Form::open(array('action' => 'AnnouncementController@show', 'class' => 'form-search pull-right', 'method' => 'get')) }}
			{{ Form::text('id', null, array('class' => 'input-medium search-query', 'placeholder' => '搜索编号')) }}
			{{ Form::button('搜索', array('type' => 'submit', 'class' => 'btn')) }}
		{{ Form::close() }}
	</div>

	<table class="table">
		<thead>
			<tr>
				<td class="span1">编号</td>
				<td>主题</td>
				<td class="span4">创建时间</td>
				<td class="span1">操作</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($datas as $data)
			<tr>
				<td>{{ $data->id }}</td>
				<td>{{ $data->title }}</td>
				<td>{{ $data->create_at }}</td>
				<td>
					<div class="btn-group">
						<a href="{{ action('AnnouncementController@show', array('id' => $data->id)) }}" class="btn btn-mini" title="详情"><i class="icon-th"></i></a>
						<a href="{{ action('AnnouncementController@getEdit', array('id' => $data->id)) }}" class="btn btn-mini" title="编辑"><i class="icon-edit"></i></a>
						<a href="{{ action('AnnouncementController@destory', array('id' => $data->id)) }}" class="btn btn-mini" title="删除"><i class="icon-trash"></i></a>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop