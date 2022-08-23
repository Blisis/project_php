<?php
require_once "global/db.php";
require_once "global/functii.php";
$time = date("Y.m.d");
$id_user=$_SESSION["user"]["id"];
$database=Database::getInstatnta();
$rezervari=$database->query("select * from rezervari as r  , camere as c where id_user={$id_user} && r.id_camere=c.id;")->fetch_all(MYSQLI_ASSOC);
?>
<html>
<head>
    <title>Green Pearl Resort </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha512-Dop/vW3iOtayerlYAqCgkVr2aTr2ErwwTYOvRFUpzl2VhCMJyjQF0Q9TjUXIo6JhuM/3i0vVEt2e/7QQmnHQqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha512-oBTprMeNEKCnqfuqKd6sbvFzmFQtlXS3e0C/RGFV0hD6QzhHV+ODfaQbAlmY6/q0ubbwlAM/nCJjkrgA3waLzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.css" integrity="sha512-jLmtg/HHup28rUf0sXLUCyrZVMBvp+tp1kEqYJcSQuG26ytM6oEDn08vg7Scn23UnS59x13IijVJMdR8MJTGNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="container">
    <?php  include "include/header.php";
    ?>
</div>
<div class="container">
    <div class="row">
        <?php
        foreach ($rezervari as $rezervare) {
            ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="<?php echo url."imagini/camere/".$rezervare['poza']; ?>"  style="max-width: 170px;max-height: 170px">
                    <div class="caption">
                        <h3><?php echo $rezervare['camera_nr']." <b>".ucfirst($rezervare['tip'])."</b>"; ?></h3>
                        <p><?php echo "Camera cu vedere la : <b>".$rezervare['vedere']."</b>"; ?></p>
                        <p><?php echo "Rezervata in perioada : <b>".$rezervare['data_start']."-".$rezervare['data_stop']."</b>"; ?></p>
                        <p>
                            <?php
                            if( $time<$rezervare['data_stop']){
                                echo "Acorda un feedback <br>" ;
                            };?>
                                    Va asteptam cu drag!
                        </p>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>

