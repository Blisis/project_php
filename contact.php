<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
$email=null;
$erori=[];
$succes=false;


if (islogin()){
    $email=$_SESSION['user']['email'];
    $id_user=$_SESSION['user']['id'];
}
if(ispost()){
    $erori=[];
    $subiect=$_POST['subiect'];
    $mesaj=$_POST['mesaj'];
    if($_POST['subiect']===null){
        $erori['invalid_subiect']="Lipsa Subiect";
    }
    if ($_POST['mesaj']===null){
        $erori['invalid_mesaj']="Lipsa Mesaj";
    }
    if (count($erori)==0){
        $email=$_POST['email'];
        $subiect=$_POST['subiect'];
        $mesaj=$_POST['mesaj'];
        $database->query("insert into mag.`subiecte_mesaje`(`subiect`,`id_user`) values('{$subiect}','{$id_user}');");
        $lastID=$database->insert_id;

        $database->query("insert into mag.`mesaje`(`mesaj`,`id_user`,`id_subiect`) values('{$mesaj}','{$id_user}','{$lastID}');");

        $succes=true;
    }

    foreach ($erori as $eroare) {
        echo $eroare;
    }

}
?>
<html>
<head>
    <title>Contacteaza-ne</title>
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
                <h3 class="panel-title">Contacteaza-ne!</h3>
            </div>
            <div class="panel-body">
                <?php
                if ($succes==true){

                    echo '<div class="alert alert-success">Am primit solicitarea ta , te vom contacta in cel mai scurt timp posibil!</div>';

                }

                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email"name="email" class="form-control" value="<?php
                        if ($email!==null){
                            echo $email;
                        } ?>">
                        <?php
                        if(isset($erori['invalid_mail'])){
                            echo $erori['invalid_mail'];}
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">Subiect</label>
                        <input type="varchar(255)"name="subiect" class="form-control" value=<?php $subiect?>>
                    </div>
                    <div class="form-group">
                        <label for="">Cum te putem ajuta!</label>
                        <input type="text"name="mesaj" class="form-control" value=<?php $mesaj; ?>>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success"value="Send">
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="mapouter">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="500" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=44.318199,28.6335222&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://123movies-to.org"></a><br>
                            <style>.mapouter{position:relative;text-align:right;height:400px;width:500px;}</style>
                            <a href="https://www.embedgooglemap.net">google maps iframe code generator</a>
                            <style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:500px;}</style>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <p style="font-size: x-large">Green Pearl Hotels</p>
                <p style="font-size: x-large">Descriere</p>
                <p>Această proprietate este la 1 minut pe jos față de plajă. Hotelul Green Pearl de 4 stele, amplasat pe o plajă cu nisip beneficiază de o locație centrală în stațiunea Mamaia. Are o piscină în aer liber cu șezlonguri și o sală de fitness. Oaspeţii beneficiază de acces gratuit la conexiunea WiFi în zonele publice şi de internet gratuit prin cablu în toate camerele.
                </p>
                <p>Camerele cu aer condiţionat au acces la internet prin cablu, zonă de relaxare cu TV cu ecran plat, baie privată cu duș sau cadă și articole de toaletă gratuite şi balcon. Toate camerele includ un frigider.
                </p>
                <p>Restaurantul în regim ultra all inclusive serveşte preparate culinare regionale şi internaţionale. Se oferă şi băuturi alcoolice de import.
                </p>
                <p>Recepţia stă la dispoziția oaspeților non-stop. La un cost suplimentar oaspeții pot beneficia de acces la facilitățile din sala de jocuri, printre care se numără o masă de biliard. În apropierea hotelului există un punct de închiriere de autoturisme şi biciclete. La Hotelul Green Pearl se află, de asemenea, magazine, un birou de schimb valutar şi un bar.
                </p>
                <p>Oraşul vechi din Constanta este situat la 6 km de hotel, iar staţiunea Navodari se află la mai puţin de 5 km. Parcul Action Aqua Park este la 3 km de proprietate.
                </p>
                <p>Acesta este locul preferat de turiștii din Mamaia, conform comentariilor independente.
                </p>
                <p>Cuplurile apreciază în mod deosebit această locaţie. I-au dat scorul 9,5 pentru un sejur pentru 2 persoane.
                </p>

                <p style="font-size: large">C.I.F. :  RO 123456 </p>

                <p style="font-size: large">Tel contact: +40 22 22 22 </p>
                <p style="font-size: x-large">Email:
                    <a href="mailto:contact@greanpearl.com" style="font-size:x-large;">contact@greenpearl.com</a></p>

            </div>
        </div>
    </div>
</div>
</body>
</html>




