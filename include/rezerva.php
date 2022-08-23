
<?php if (islogin()) {?>
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Rezerva
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Selecteaza detele de rezervare !</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">data start</label>
                                <input type="date" name="start_date">
                            </div>
                            <div class="form-group">
                                <label for="">data end</label>
                                <input type="date" name="end_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Preferinte</label>
                            <input type="text" name="detalii" placeholder="preferinte">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuleaza</button>
                            <input type="submit" class="btn btn-primary adaugareCos" value="Rezerva">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }
else{
    echo "Este necesara autentificarea pentru rezervare!";
}?>
