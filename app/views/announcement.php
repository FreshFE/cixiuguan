<html>
	<head>
	</head>

	<body>



		<div id="addAnnouncement">
			<?php echo Form::open(array('url' => 'announcement/create', 'method' => 'post')) ?>
				主题<?php echo Form::text('title'); ?>
				内容<?php echo Form::text('content'); ?>
				标签<?php echo Form::text('valid_tag'); ?>
				<?php echo Form::submit('add'); ?>
			<?php echo Form::close() ?>
		</div>	

		<div id="search">
			<?php echo Form::open(array('url' => 'announcementShow', 'method' => 'post')) ?>
				<span>编号搜索</span>
				<?php echo Form::text('aid'); ?>
			    <?php echo Form::submit('search'); ?>
		    <?php echo Form::close() ?>
		</div>

		<div id="showAnnouncement">
			<table>
				<tr>
					<td>编号</td>
					<td>主题</td>
					<td>内容</td>
					<td>创建时间</td>
				</tr>
			
				<?php foreach ($announcementDetail as $announcementObj) { ?>
				<tr>
					<td>
						<?php echo $aid = $announcementObj ->id; ?>
						<?php echo HTML::link("announcement/del/".$aid, '删除') ?>
					</td>
				
					<td>
						<?php echo HTML::link("#", $announcementObj ->title) ?>
					</td>
				
					<td>
						<?php echo $announcementObj ->content; ?>
					</td>
				
					<td>
						<?php echo $announcementObj ->create_at; ?>
					</td>
				</tr>
				<?php 	} ?>	
			</table>
		</div>	
	</body>
</html>
