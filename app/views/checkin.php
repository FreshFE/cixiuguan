<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title></title>
	</head>
	
	<body>
		<!--根据ID查找数据-->
		<div id="search">
			<?php echo Form::open(array('url' => 'admin/checkin/search')) ?>
				<span>编号搜索</span>
				<?php echo Form::text('id'); ?>
			    <?php echo Form::submit('search'); ?>
		    <?php echo Form::close() ?>
		</div>

		<div id="showcheckin">
			<table>
				<tr>
					<td>编号</td>
					<td>精度</td>
					<td>纬度</td>
					<td>评价</td>
					<td>星</td>
					<td>创建时间</td>
					<td>更新时间</td>
				</tr>

				<?php foreach ($checkinDetail  as $checkinArray) { ?>
				<tr>
					<td>
						<?php echo $id = $checkinArray->id; ?>
						<?php echo HTML::link("admin/checkin/".$id."/delete", '删除') ?>
					</td>
				
					<td>
						<?php echo $checkinArray->lat; ?>
					</td>
				
					<td>
						<?php echo $checkinArray->lng; ?>
					</td>
					
					<td>
						<?php echo $checkinArray->comments; ?>
					</td>
					
					<td>
						<?php echo $checkinArray->stars; ?>
					</td>

					<td>
						<?php echo $checkinArray->create_at; ?>
					</td>

					<td>
						<?php echo $checkinArray->update_at; ?>
					</td>
				</tr>
				<?php 	} ?>	
			</table>
		</div>	
	</body>
</html>
