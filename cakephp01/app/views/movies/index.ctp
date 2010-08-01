<div class="movies index">
	<h2>Movies</h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>Title</th>
			<th>Genre</th>
			<th>Rating</th>
			<th>Format</th>
			<th>Length</th>
			<th class="actions">Actions</th>
		</tr>
	<?php foreach ($movies as $movie): ?>
	<tr>
		<td><?php echo $movie['Movie']['title']; ?>&nbsp;</td>
		<td><?php echo $movie['Movie']['genre']; ?>&nbsp;</td>
		<td><?php echo $movie['Movie']['rating']; ?>&nbsp;</td>
		<td><?php echo $movie['Movie']['format']; ?>&nbsp;</td>
		<td><?php echo $movie['Movie']['length']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $movie['Movie']['id'])); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $movie['Movie']['id'])); ?>
			<?php echo $this->Html->link('Delete', array('action' => 'delete', $movie['Movie']['id']), null, sprintf('Are you sure you want to delete %s?', $movie['Movie']['title'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('New Movie', array('action' => 'add')); ?></li>
	</ul>
</div>