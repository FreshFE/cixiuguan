@extends('admin.layout')

@section('navigation')
@stop

@section('mainarea')

	<div class="page-header">
		<h1>登录 <small>Login</small></h1>
	</div>

	<div class="section">

		<div class="alert alert-success">
			输入用户名和密码登录刺绣馆后台管理系统
		</div>

		<img src="{{ asset('assets/img/banner.jpg') }}" style="width: 100%; margin-bottom: 20px; border-radius: 3px;">

		{{ Form::open(array('action' => 'LoginController@loginSuccess', 'class' => 'form')) }}

			<div class="control-group">
				<label class="control-label">用户名</label>
				<div class="controls">
					{{ Form::text('username') }}
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">密码</label>
				<div class="controls">
					{{ Form::password('password') }}
				</div>
			</div>

			<div class="form-action">
				{{ Form::button('登录', array('class' => 'btn', 'type' => 'submit', 'name' => 'slogin')) }}
			</div>

		{{ Form::close() }}

	</div>

@stop