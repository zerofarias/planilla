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
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="modalPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Planilla de Recepcion</h5>
        <button type="button" class="close" data-dismiss="modal" id="cerrarPDF" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <iframe id="pdf" width="100%" height="400" style="visibility:visible" src="logica/pdf.php"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" id="cerrarPDF">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php
    include_once "includes/footer.php";
?>