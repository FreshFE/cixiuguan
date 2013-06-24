<div id="showAnnouncement">
<?php echo Form::open(array('url' => 'admin/announcement/edit', 'method' => 'post')) ?>
	<table>
		<tr>
		</tr>
	
		<?php foreach ($announcementDetail  as $announcementArray) { ?>
		<tr>
			<td>编号</td>
			<td>
				<input type="text" name="id" value= <?php echo $announcementArray['id'] ?> readonly >
				
			</td>
		</tr>
		
		<tr>
			<td>主题</td>
			<td>
				<input type="text" name="title" value= <?php echo $announcementArray['title'] ?> >
			</td>
		</tr>
		
		<tr>
			<td>内容</td>
			<td>
				<input type="text" name="content" value= <?php echo $announcementArray['content'] ?> >
			</td>
		</tr>
		
		<tr>
			<td>创建时间</td>
			<td>
			<input type="text" name="create_at" value= <?php echo $announcementArray['create_at'] ?> readonly>
			</td>
		</tr>
		<tr>
			<td><?php echo Form::submit('update'); ?></td>
		</tr>

		
		<?php 	} ?>	
	</table>
<?php echo Form::close() ?>
</div>	