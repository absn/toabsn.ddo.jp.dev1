<div class="posts view">
<h2><?php  __('投稿内容');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!--
		<dt<?php // if ($i % 2 == 0) echo $class;?>>
			<?php //__('Id'); ?></dt>
		<dd<?php //if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $post['Post']['id']; ?>
			&nbsp;
		</dd>
		-->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('タイトル'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('本文'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('投稿日'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('更新日'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('メニュー'); ?></h3>
	<ul>
<?php if($user){ ?>
		<li><?php echo $this->Html->link(__('新規投稿', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('編集', true), array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('削除', true), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('%s行目を削除しますがよろしいですか？?', true), $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('一覧へ戻る', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ログアウト', true), array('action' => 'logout')); ?> </li>
<?php }else{ ?>
		<li><?php echo $this->Html->link(__('ログイン', true), array('action' => 'login')); ?> </li>
<?php } ?>
	</ul>
</div>
