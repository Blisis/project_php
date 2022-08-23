<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
$id=$_GET['id'];
$camera=$database->query("
select * from camere  where id={$id}; 
")->fetch_all(MYSQLI_ASSOC);
$camera=reset($camera);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = [];
    $success= false;
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    if (DateTime::createFromFormat('Y-m-d', $startDate) === false) {
        $errors[] = 'start date gresit';
    }
    if (DateTime::createFromFormat('Y-m-d', $endDate) === false) {
        $errors[] = 'end date gresit';
    }

    if (count($errors) == 0) {
        $id_user=$_SESSION["user"]["id"];
        $id_camera=$id;
        $detalii=$_POST["detalii"];
        echo "<pre>";
        var_dump($id_camera);
//        echo "<pre>".PHP_EOL;
//        var_dump($endDate);
//        die();





        $database->query("
                insert into `rezervari`(`id_user`,`id_camere`,`data_start`, `data_stop`,`preferinte`) 
                values ('{$id_user}','{$id_camera}','{$startDate}', '{$endDate}','{$detalii}')
                ");
        $success = true;
    }
}
?>
<html>
<head>
    <title><?php echo $camera['camera_nr']; ?></title>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha512-Dop/vW3iOtayerlYAqCgkVr2aTr2ErwwTYOvRFUpzl2VhCMJyjQF0Q9TjUXIo6JhuM/3i0vVEt2e/7QQmnHQqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha512-oBTprMeNEKCnqfuqKd6sbvFzmFQtlXS3e0C/RGFV0hD6QzhHV+ODfaQbAlmY6/q0ubbwlAM/nCJjkrgA3waLzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.css" integrity="sha512-jLmtg/HHup28rUf0sXLUCyrZVMBvp+tp1kEqYJcSQuG26ytM6oEDn08vg7Scn23UnS59x13IijVJMdR8MJTGNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<body>
<div class="container">
    <?php include "include/header.php"; ?>
</div>
<div class="container">
    <div class="row">
        <?php if (isset($success) && $success === true) {  ?>
            <div class="alert alert-warning">
                Rezervarea s-a creeat asteptati e-mail de confirmare!
            </div>
        <?php  }  ?>
        <div class="col-md-12">
            <h1><?php echo $camera['camera_nr']; ?></h1>
        </div>
        <div class="col-md-3">
            <img src="<?php url?>imagini/camere/<?php echo $camera['poza'] ?>" class="img-responsive" style="">
        </div>
        <div class="col-md-9">
            <?php
                if (isset($errors) && count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo $error."\n";
                    }
                }
            ?>
            <div class="col-md-3">
                Descriere:
            </div>
            <div class="col-md-9">
                <?php echo $camera['descriere']; ?>
            </div>
            <br>


            <div class="col-md-3">
                Feed-back clienti:
            </div>
            <div class="col-md-9">
                <?php echo $camera['feedback']; ?>
            </div>
            <br>




            <div class="col-md-3">
                Pret :
            </div>
            <div class="col-md-9">
                <?php echo $camera['pret']; ?>
            </div>
            <br>
            <p><a href="index.php" class="btn btn-info" role="button">Inapoi</a>
                <?php include "include/rezerva.php";?>
            </p>
        </div>
    </div>
</div>

</body>
</html>