<div class="posts form">
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php __('投稿内容'); ?></legend>
	<?php
		echo $this->Form->input('title', array('label' => 'タイトル'));
		echo $this->Form->input('body', array('label' => '本文'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('投稿', true));?>
</div>
<div class="actions">
	<h3><?php __('メニュー'); ?></h3>
	<ul>
<?php if($user){ ?>
		<li><?php echo $this->Html->link(__('一覧へ戻る', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('ログアウト', true), array('action' => 'logout'));?></li>
<?php }else{ ?>

		<li><?php echo $this->Html->link(__('ログイン', true), array('controller' => 'users', 'action' => 'login'));?></li>
<?php } ?>
	</ul>
</div>
