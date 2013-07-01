@extends('admin.layout')

@section('mainarea')

	<ul class="breadcrumb">
		<li><a href="{{ action('AdminController@index') }}">管理后台</a> <span class="divider">/</span></li>
		<li><a href="{{ action('CheckinController@index') }}">评价模块</a> <span class="divider">/</span></li>
		<li class="active">列表</li>
	</ul>

	{{ Form::open(array('action' => 'AnnouncementController@search', 'class' => 'form-search pull-right', 'method' => 'get')) }}
		{{ Form::text('id', null, array('class' => 'input-medium search-query', 'placeholder' => '搜索编号')) }}
		{{ Form::button('搜索', array('type' => 'submit', 'class' => 'btn')) }}
	{{ Form::close() }}

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
					<a href="{{ action('AnnouncementController@destory', array('id' => $data->id)) }}" class="btn btn-mini" title="删除"><i class="icon-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@stop