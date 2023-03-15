<?php
//$absoluta =  dirname(__DIR__);
include_once "includes/header.php";
?>

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PLANILLA DE ENTREGA</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- Default box -->
    <div class="card">
        
        <div class="card-body">
        <form id="formQR">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="" class="col-form-label" id="importec" >ESCANEE SU CODIGO QR</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"  style="font-size: 20px"><span class="material-symbols-outlined">qr_code_scanner</span>
                            </span>
                        </div>
                            <input class="form-control form-control-lg" type="text"  autocomplete="off" id="qr">
                        </div> 
                    </div>
                </div>
            <div class="card-footer" id="boton" hidden>
                <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>--->
                <button type="submit" id="buscar" class="btn btn-primary btn-lg text-center">BUSCAR</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
    <?php
        $string = "https://camaravm.com.ar/autogestion/seguimientoPlanilla/26e9178e2356968959ba0dd25f7f0d1e2f7596b97bf0122ab170ae356aae01e9";
        $varst = trim($string, "https://camaravm.com.ar/autogestion/seguimientoPlanilla/");
    ?>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

<?php
    include_once "includes/footer.php";
?>