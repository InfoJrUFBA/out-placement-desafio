<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="header">
            <p>Home</p>
            <a href="editUser.php">Perfil</a>
            <p>sair</p>
            <img class="hamburger" src=""></img>
        </div>
        <?php include('includes/navbar.inc'); ?>
        <div id="today">Hoje</div>
        <div id="byTime">
                <?php for($i = 2016; $i>=1998; $i--): ?>
                    <div><?php echo $i;?></div>
                <?php endfor; ?>
        </div>
        <?php include('includes/footer.inc'); ?>
    </body>

</html>
