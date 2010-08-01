<div class="movies form">
<?php
echo $this->Form->create('Movie');
echo $this->Form->inputs(array('id', 'title', 'genre', 'rating', 'format', 'length'));
echo $this->Form->end('Edit');
?>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('List Movies', array('action' => 'index'));?></li>
	</ul>
</div>