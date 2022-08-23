<?php $tip_camera=$database->query("
select * from tip_camera
")->fetch_all(MYSQLI_ASSOC);
?>
<div class="row backgroundAlb">
    <div class="col-md-6">
        <img src="<?php echo url; ?>imagini/design/original.png" alt="" class="logo">
    </div>
    <div class="col-md-3">
        <?php if (islogin()) {
            ?>
            <div class="authbox">
                Bine ai venit,
                <?php
                if ($_SESSION['user']['nume']!==null){
                    echo $_SESSION['user']['nume'];
                } else{
                    echo $_SESSION['user']['email'];
                }
                ?>
                <br>
                <a href="<?php echo url; ?>logout.php" class="btn btn-danger btn-xs">Paraseste</a>
                <a href="<?php echo url; ?>user.php" class="btn btn-danger btn-xs">Contul meu</a>
                <a href="<?php echo url; ?>rezervari.php" class="btn btn-danger btn-sm">Rezervariile mele</a>
                <a href="<?php echo url; ?>mesaje.php" class="btn btn-danger btn-xs">Mesaje</a>
            </div>
        <?php } else { //aici nu esti logat?>
            <div class="autentificareHeader" >
                <a href="login.php" class="btn btn-danger">Autentificare</a>
                <a href="signin.php" class="btn btn-danger">Inregistrare</a>
            </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Acasa<span class="sr-only">(current)</span></a></li>
                    <?php
                    foreach ($tip_camera  as $tip){ ?>
                            <li><a href="<?php echo url;?>tipuri.php?id=<?php echo $tip['id']; ?>"><?php echo ucfirst($tip['nume'])?></a></li>
                    <?php }?>
                    <li><a href="<?php echo url;?>contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>