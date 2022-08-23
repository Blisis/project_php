<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
$id_user=$_SESSION['user']['id'];
$user=$database->query("select u.id , u.nume , u.telefon , u.adresa , u.email ,u.nick
from useri as u where u.id=$id_user;
")->fetch_all(MYSQLI_ASSOC);
$user=reset($user);
$erori=[];
if (ispost()) {
    if (!isvalidemail($_POST['email'], $database,false)) {
        $erori['invalid_mail'] = "E-mail Invalid";
    }
    if (strlen($_POST['nume']) <= 4 ){
        $erori['invald_nume'] = "Numele nu este completat ";
    };
    if (strlen($_POST['telefon']) <=9 && $_POST["telefon"]==("/^0.[0-9]{8}/gm") ) {
        $erori['invalid-telefon'] = "Numarul de telefon nu este corect!";
    };
    if (strlen($_POST['adresa']) <= 10 ) {
        $erori['invalid-adres'] = "Adresa nu este completata";
    };
    if (count($erori) == 0 ) {
        $nume=$_POST['nume'];
        $email=$_POST['email'];
        $telefon = $_POST['telefon'];
        $adresa = $_POST['adresa'];
        $nick= $_POST['nick'];
        $database->query("update useri 
                    set nume ='{$nume}' , 
                        email='{$email}' ,
                        telefon='{$telefon}',
                        adresa='{$adresa}',
                        nick='{$nick}'
                     where id='{$id_user}'");
        $_SESSION['user']["nume"] =$user["nume"];
        header('Location:user.php');
    }
    else{
        var_dump($erori);
    };
}
?>
<html>
<head>
    <title>Editeaza User</title>
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
    <div class="row backgroundAlb">
        <table class="table table-striped  table-sm" border="2">
            <thead class="table-dark ">
            <tr>
                <td>Nume</td>
                <td>E-mail</td>
                <td>User Name</td>
                <td>Telefon</td>
                <td>Adresa</td>
                <td>
                    <a href="modifica_parola.php" class="btn btn-danger btn-sm">Modifica PAROLA</a>
                </td>
            </tr>
            </thead>
            <tr class="table-dark ">
                <form method="post" action="">
                    <td>
                        <div class="form-group" >
                            <input type="text" name="nume" class="form-control" placeholder="Nume" value="<?php echo $user['nume']; ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group" >
                            <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo $user['email'];  ?>">
                        </div>
                    </td>
                    <td>
                    <div class="form-group" >
                        <input type="text" name="nick" class="form-control" placeholder="User Name" value="<?php echo $user['nick'];  ?>">
                    </div>
                    </td>
                    <td>
                        <div class="form-group" >
                            <input type="text" name="telefon" class="form-control" placeholder="Telefon" value="<?php echo $user['telefon'];  ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group" >
                            <input type="text" name="adresa" class="form-control" placeholder="Adresa" value="<?php echo $user['adresa'];  ?>">
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm"> Salveaza informatiile</button>
                    </td>
                </form>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
