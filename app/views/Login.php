<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div><?php echo implode(",", $msg) ?></div>

	<div>
		<?php echo Form::open(array('url' => 'loginSuccess', 'method' => 'post')) ?>
			<div>姓名<?php echo Form::text('username'); ?></div>
			<div>密码<?php echo Form::text('password'); ?></div>	
			<div><?php echo Form::submit('login'); ?></div>
		<?php echo Form::close() ?>
	</div>
</body>
</html>