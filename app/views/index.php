<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<title>Home</title>
</head>

<body>
    <header>
        <div class="inner">
            <?php include('includes/navbar.inc'); ?>
        </div>
    </header>
    <div class="inner">
        <div><a href="">Novo Usuário</a></div>
        <div><a href="">Novo Cargo</a></div>
        <div><a href="">Novo Projeto</a></div>
        <div class="cards" id="today">Hoje</div>
        <div id="byTime">
                <?php for($i = 2016; $i>=1998; $i--): ?>
                    <div class="cards"><?php echo $i;?></div>
                <?php endfor; ?>
        </div>
    </div>
    <?php include('includes/footer.inc'); ?>
</body>

</html>
