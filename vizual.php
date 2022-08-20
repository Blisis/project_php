<?php
require_once "global/db.php";
require_once "global/functii.php";
$database=Database::getInstatnta();
$id=$_GET['id'];
$camera=$database->query("
select * from camere where id={$id}; 
")->fetch_all(MYSQLI_ASSOC);

$camera=reset($camera);
?>
<html>
<head>
    <title><?php echo $camera['camera_nr']; ?></title>
<!--    DE AICI -->
<!--    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">-->
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    //


<!--    pana aici-->
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
        <div class="col-md-12">
            <h1><?php echo $camera['camera_nr']; ?></h1>
        </div>
        <div class="col-md-3">
            <img src="<?php url?>imagini/camere/<?php echo $camera['poza'] ?>" class="img-responsive" style="">
        </div>
        <div class="col-md-9">
            <div class="col-md-3">
                Descriere:
            </div>
            <div class="col-md-9">
                <?php echo $camera['descriere']; ?>
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
                <?php if (islogin()) {?>
            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Rezerva
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Selecteaza dele de rezervare !</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!------ Include the above in your HEAD tag ---------->

                                <div class="container">
                                    <div class="row">
                                        <div class="span12">
                                            <table class="table-condensed table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th colspan="7" >
                                                        <a class="btn"><i class="icon-chevron-left"></i></a>
                                                        <a class="btn">February 2012</a>
                                                        <a class="btn"><i class="icon-chevron-right"></i></a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="muted">29</td>
                                                    <td class="muted">30</td>
                                                    <td class="muted">31</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>6</td>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td>10</td>
                                                    <td>11</td>
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>13</td>
                                                    <td>14</td>
                                                    <td>15</td>
                                                    <td>16</td>
                                                    <td>17</td>
                                                    <td>18</td>
                                                </tr>
                                                <tr>
                                                    <td>19</td>
                                                    <td><strong>20</strong></td>
                                                    <td>21</td>
                                                    <td>22</td>
                                                    <td>23</td>
                                                    <td>24</td>
                                                    <td>25</td>
                                                </tr>
                                                <tr>
                                                    <td>26</td>
                                                    <td>27</td>
                                                    <td>28</td>
                                                    <td>29</td>
                                                    <td class="muted">1</td>
                                                    <td class="muted">2</td>
                                                    <td class="muted">3</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuleaza</button>
                                <button type="button" class="btn btn-primary adaugareCos" data-id="<?php echo $camera['id'];?>" role="button">Rezerva</button>
                            </div>
                        </div>
                    </div>
                </div></div>
                <?php }
                else{
                    echo "Este necesara autentificarea pentru rezervare!";
                }?>
            </p>
        </div>
    </div>
</div>
<script>
    $('.adaugare_rezervare').on('click',function (e) {
        e.preventDefault();
        let idcamera=$(this).data('id');
        $.ajax({
            url:'adauga_rezervare.php?id_produs='+idcamera
        });
        return false;
    })
</script>
</body>
</html>