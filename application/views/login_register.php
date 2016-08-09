<h1><?php echo $heading; ?></h1>

<?php echo form_open(); ?>
    <div>
        <?php echo form_label('Email Address', 'email_address'); ?>
        <?php echo form_input('email_address', set_value('email_address'), ['id' => 'email_adddress']); ?>
    </div><br>
    <div>
        <?php echo form_label('Password:', 'password'); ?>
        <?php echo form_password('password', '', ['id' => 'password']); ?>
    </div><br>
    <div>
        <?php echo form_submit('submit', 'submit'); ?>
    </div>    
<?php echo form_close(); ?>

<div class="error">            
    <?php echo validation_errors(); ?>
</div> 

<?php if ($heading == 'Login'): ?>
<br><br>
<div><?php echo "Don't have an account? please  " .  
        anchor('users/register', 'Register'); ?></div>
<?php else: ?>
<br><br>
<div><?php echo "Already registered? please  " .  
        anchor('users/Login', 'Login'); ?></div>
<?php endif; ?>
