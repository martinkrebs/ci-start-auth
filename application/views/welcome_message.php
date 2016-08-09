<h1>Kick Ass members only page</h1>

<h2>Hello <?php echo $_SESSION['username']; ?> you successfully logged in.:</h2>


<div>
    <?php echo anchor('users/logout', 'logout'); ?>
</div>
