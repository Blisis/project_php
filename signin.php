<?php
require_once "global/db.php";
require_once "global/functii.php";
$database = Database::getInstatnta();
if(ispost()){
    $erori=[];
    $success = false;
    if (!isvalidemail($_POST['email'], $database)){
        $erori['invalid_mail']="E-mail Invalid";
    }
    if (!valideaza_parola($_POST['parola'])){
        $erori['invalid_parola']="Parola Invalida";
    }
    if ($_POST['parola']!==$_POST['confirmaparola']){
        $erori['invalid_confirma_parola']="Parola nu se potriveste";
    }
    if ($_POST['nick']!==$_POST['nick']){
        $erori['invalid_nick']="";
    }
    if(count($erori)==0){
        $nume=$_POST['nume'];
        $tel=$_POST['tel'];
        $nick=$_POST['nick'];
        $email=$_POST['email'];
        $parola=md5($_POST['parola']);
        $token = md5(rand(1000, PHP_INT_MAX));
        $database->query("insert into `useri`(`nume`,`email`,`parola`, `token_activari`,`nick`) values ('{$nume}','{$email}','{$parola}', '{$token}','{$nick}')");
        sendActivationMail($email, $token);
        $success = true;
    }
}
?>
<html>
<head>
    <title>Acasa</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha512-Dop/vW3iOtayerlYAqCgkVr2aTr2ErwwTYOvRFUpzl2VhCMJyjQF0Q9TjUXIo6JhuM/3i0vVEt2e/7QQmnHQqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha512-oBTprMeNEKCnqfuqKd6sbvFzmFQtlXS3e0C/RGFV0hD6QzhHV+ODfaQbAlmY6/q0ubbwlAM/nCJjkrgA3waLzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.css" integrity="sha512-jLmtg/HHup28rUf0sXLUCyrZVMBvp+tp1kEqYJcSQuG26ytM6oEDn08vg7Scn23UnS59x13IijVJMdR8MJTGNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="container">
    <?php include "include/header.php"; ?>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Inregistrare</h3>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <?php if (isset($success) && $success === true) {  ?>
                        <div class="alert alert-info">
                            Contul a fost creat! Verifica e-mail!
                        </div>
                    <?php  }  ?>
                    <div class="form-group">
                        <label for="">Nume</label>
                        <input type="text" name="nume" class="form-control" placeholder="Numele">
                        <?php
                        if(isset($erori['invalid_nume'])){
                            echo $erori['invalid_nume'];}
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">User</label>
                        <input type="text" name="nick" class="form-control" placeholder="User name">
                        <?php
                        if(isset($erori['invalid_user'])){
                            echo $erori['invalid_user'];}
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">Numar de telefon</label>
                        <input type="number" name="tel" class="form-control" placeholder="Numarul de telefon">
                        <?php
                        if(isset($erori['invalid_telefon'])){
                            echo $erori['invalid_telefon'];}
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="E-mail">
                        <?php
                        if(isset($erori['invalid_mail'])){
                            echo $erori['invalid_mail'];}
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">Parola</label>
                        <input type="password" name="parola" class="form-control" placeholder="Parola">
                        <?php
                        if(isset($erori['invalid_parola'])){
                            echo $erori['invalid_parola'];}
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">Confirma Parola</label>
                        <input type="password" name="confirmaparola" class="form-control" placeholder="Confirmati Parola">
                        <?php
                        if(isset($erori['invalid_confirma_parola'])){
                            echo $erori['invalid_confirma_parola'];}
                        ?>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" value="Creaza">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
