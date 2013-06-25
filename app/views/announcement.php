<html>
	<head>
	</head>

	<body>
<!--退出按钮-->



<!--添加数据模块-->
		<div id="addAnnouncement">
			<?php echo Form::open(array('url' => 'admin/announcement', 'method' => 'post')) ?>
				主题<?php echo Form::text('title'); ?><br/>
				内容<?php echo Form::textarea('content'); ?></br>
				合格标签<?php echo Form::text('valid_tag'); ?><br/>
				<?php echo Form::submit('add'); ?>
			<?php echo Form::close() ?>
		</div>	


<!--根据ID查找数据-->
		<div id="search">
			<?php echo Form::open(array('url' => 'admin/announcement/search')) ?>
				<span>编号搜索</span>
				<?php echo Form::text('id'); ?>
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
					<td>更新时间</td>
				</tr>

				<?php foreach ($announcementDetail  as $announcementArray) { ?>
				<tr>
					<td>
						<?php echo $id = $announcementArray['id']; ?>
						<?php echo HTML::link("admin/announcement/".$id."/delete", '删除') ?>
					</td>
				
					<td>
						<?php echo HTML::link("admin/announcement/".$id."/edit/", $announcementArray['title']) ?>
					</td>
				
					<td>
						<?php echo $announcementArray['content']; ?>
					</td>
				
					<td>
						<?php echo $announcementArray['create_at']; ?>
					</td>

					<td>
						<?php echo $announcementArray['update_at']; ?>
					</td>
				</tr>
				<?php 	} ?>	
			</table>
		</div>	
	</body>
</html>
