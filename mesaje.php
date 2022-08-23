<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
$user=$_SESSION["user"];
$mesaje = $database->query("
select * from mesaje where id_user={$user['id']}
")->fetch_all(MYSQLI_ASSOC);
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Grean Pearl </title>
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
    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3 thumbnail">
                Subiect
                    </div>
                    <div class="col-md-9 thumbnail">
                Mesaj
                    </div>
                </div>
            </div>
        </div>
<?php foreach ($mesaje as $mesaj){?>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 thumbnail">
                Rezervarea nr :<?php echo $mesaj["id_rezervare"]?>
            </div>
            <div class="col-md-9 thumbnail">
                <?php echo $mesaj["mesajul"]?>
            </div>
        </div>
    </div>
</div>
 <?php
} ?>
    </div>
</div>

</body>
</html>



