<?php echo $this->Form->create('Task');?>
<h2><?php __('TODO');?></h2>
<table>
<tr>
<th><?php echo $this->Paginator->sort('タスク内�','content'); ?></th>
<th><?php echo $this->Paginator->sort('状態','status'); ?></th>
<th><?php echo $this->Paginator->sort('作成日','created'); ?></th>
</tr>
<?php foreach($tasks as $task) { ?>
<tr>
<td><?php echo h($task['Task']['content']) ?></td>
<td><?php echo h($task['Task']['status']) ?></td>
<td><?php echo h($task['Task']['created']) ?></td>
</tr>
<?php } ?>
</table>
