@extends('admin.layout')

@section('mainarea')

	<ul class="breadcrumb">
		<li><a href="#">管理后台</a> <span class="divider">/</span></li>
		<li><a href="#">评价模块</a> <span class="divider">/</span></li>
		<li class="active">列表</li>
	</ul>

	<form class="form-search pull-right">
		<input type="text" class="input-medium search-query" placeholder="搜索编号">
		<button type="submit" class="btn">Search</button>
	</form>

	<table class="table">
		<thead>
			<tr>
				<td class="span1">编号</td>
				<td>评价</td>
				<td>星级</td>
				<td>创建时间</td>
				<td class="span1">操作</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>1</td>
				<td>1</td>
				<td>1</td>
				<td>
					<a href="#" class="btn btn-mini"><i class="icon-trash"></i></a>
				</td>
			</tr>
		</tbody>
	</table>

@stop