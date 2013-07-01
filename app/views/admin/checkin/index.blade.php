@extends('admin.layout')

@section('mainarea')

	<ul class="breadcrumb">
		<li><a href="{{ action('AdminController@index') }}">管理后台</a> <span class="divider">/</span></li>
		<li><a href="{{ action('CheckinController@index') }}">评价模块</a> <span class="divider">/</span></li>
		<li class="active">列表</li>
	</ul>

	{{ Form::open(array('url' => 'admin/checkin/search', 'class' => 'form-search pull-right', 'method' => 'get')) }}
		{{ Form::text('id', null, array('class' => 'input-medium search-query', 'placeholder' => '搜索编号')) }}
		{{ Form::button('搜索', array('type' => 'submit', 'class' => 'btn')) }}
	{{ Form::close() }}

	<table class="table">
		<thead>
			<tr>
				<td class="span1">编号</td>
				<td>评价</td>
				<td class="span2">星级</td>
				<td class="span2">创建时间</td>
				<td class="span1">操作</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($checkinDetail as $data)
			<tr>
				<td>{{ $data->id }}</td>
				<td>{{ $data->comments }}</td>
				<td>{{ $data->stars }}</td>
				<td>{{ $data->create_at }}</td>
				<td>
					<a href="{{ action('CheckinController@destory', array('id' => $data->id)) }}" class="btn btn-mini" title="删除"><i class="icon-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@stop