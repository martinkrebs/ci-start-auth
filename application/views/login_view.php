<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter</title>
        <style>
            label { display: block; }
            .error { color: red; }                     
        </style>
    </head>
    <body>
        <h1>Login</h1>
        <?php echo form_open('admin'); ?>
        <p>
            <?php echo form_label('Email Address', 'email_address'); ?>
            <?php echo form_input('email_address', set_value('email_address'), ['id' => 'email_adddress']); ?>
        </p>
        <p>
            <?php echo form_label('Password:', 'password'); ?>
            <?php echo form_password('password', '', ['id' => 'password']); ?>
        </p>
        <p>
            <?php echo form_submit('submit', 'login'); ?>
        </p>
        <?php echo form_close(); ?>
        
        <div class="error">            
            <?php echo validation_errors(); ?>
        </div> 
    </body>
</html>