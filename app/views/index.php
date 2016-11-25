<!DOCTYPE html>
<html>
<head>
<title>Home</title>
</head>

<body>
    <div class="header">
        <p>Home</p>
        <img class="hamburger" src=""></img>
    </div>
    <?php include('includes/navbar.inc'); ?>
    <div id="today">Hoje</div>
    <div id="byTime">
            <?php for($i = 2016; $i>=1998; $i--): ?>
                <div><?php echo $i;?></div>
            <?php endfor; ?>
    </div>
</body>

</html>
