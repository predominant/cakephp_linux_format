<div class="users form">
<?php echo $this->Form->create('User', array('url' => array('action' => 'login')));?>
	<fieldset>
 		<legend><?php __('Login'); ?></legend>
	<?php
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Login', true));?>
</div>