<?php if($user){ ?>
<div class="posts index">
	<h2><?php __('投稿内容');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<!--	<th><?php // echo $this->Paginator->sort('id');?></th> -->
			<th><?php echo $this->Paginator->sort('タイトル','title');?></th>
			<th><?php echo $this->Paginator->sort('本文','body');?></th>
			<th><?php echo $this->Paginator->sort('作成日','created');?></th>
			<th><?php echo $this->Paginator->sort('更新日','modified');?></th>
			<?php if($user){ ?>
			 <th class="actions"><?php __('メニュー');?></th>
			<?php } ?>
	</tr>
	<?php
	$i = 0;
	foreach ($posts as $post):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!--<td><?php // echo $post['Post']['id']; ?>&nbsp;</td>-->
		<td><?php echo $post['Post']['title']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['body']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['created']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['modified']; ?>&nbsp;</td>
<?php if($user){ ?>
		<td class="actions">
			<?php echo $this->Html->link(__('閲覧', true), array('action' => 'view', $post['Post']['id'])); ?>
			<?php echo $this->Html->link(__('編集', true), array('action' => 'edit', $post['Post']['id'])); ?>
			<?php echo $this->Html->link(__('削除', true), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('削除してもよろしいですか？ %s行 目', true), $post['Post']['id'])); ?>
		</td>
<?php } ?>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php } ?>
<div class="actions">
	<h3><?php __('メニュー'); ?></h3>
<?php 
	if($user) { 
		echo '<p>こんにちは、'.h($user['User']['username']).'さん。';
		echo '<p>&nbsp;</p>';
?>
	<ul>
		<li><?php echo $this->Html->link(__('新規投稿', true), array('action' => 'add')); ?></li>
	<li><?php echo $this->Html->link(__('ログアウト', true), array('action' => 'logout')); ?></li>
	</ul>
<?php } else { echo $html->link(__('ログイン',true), array('controller' => 'users', 'action' => 'login'));} ?>
</div>
