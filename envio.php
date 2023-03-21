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
                    <h1>PLANILLA DE ENVIO / RECEPCION</h1>
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
                                        <label for="" class="col-form-label" id="importec" >TIPO TRAMITE</label>
                                        <select class="form-control form-control-lg" id="tipo">
                                            <option  value="2">RECEPCIONAR PAQUETE</option>
                                            <option  value="3">ENVIAR PAQUETE</option>
                                        </select>
                                    </div> 
                                </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Concepto</label>
                            <input type="text" class="form-control form-control-lg" id="concepto" >
                        </div> 
                    </div>


                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">COMISIONISTA/CADETE</label>
                            <input type="text" class="form-control form-control-lg" id="comisionista" >
                        </div> 
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Pago Importe $</label>
                            <input type="number" min="0" class="form-control form-control-lg" id="importe" >
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">DIRECCION ENVIO / FARMACIA</label>
                            <input type="text" class="form-control form-control-lg" id="farmacia" >
                        </div> 
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="" class="col-form-label">Observacion / Comentario</label>
                            <textarea rows="3" cols="12" class="form-control form-control-lg" id="comentario"></textarea>
                        </div>  
                    </div> 

                                    </div> 
                                </div>
                            </div>
                            <!--<button type="button" id="i" class="btn btn-primary btn-lg text-center" >agregar</button>--->
                            <button type="button" id="guardarplanilla" class="btn btn-primary btn-lg text-center" >GENERAR PLANILLA</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>  
    </div>
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
        <input type="text" id="codigoPDF" hidden>
        <button type="button" class="close" data-dismiss="modal" id="cerrarPDF" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <iframe id="pdf" width="100%" height="400" style="visibility:visible" ></iframe>
      <!---<p>Dale un vistazo <a href="https://www.freecodecamp.org/" target="_blank">freeCodeCamp</a>.</p>--->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" id="cerrarPDF">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- modal formulario envio ------->
<div class="modal fade" id="modalEnvio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Envio / Recepcion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
    <form id="formCierre">    
            <div class="modal-body">
                <div class="row">
                    
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="" class="col-form-label">COMISIONISTA/CADETE</label>
                            <input type="text" class="form-control" id="comisionista" >
                        </div> 
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="col-form-label">Pago Importe $</label>
                            <input type="number" min="0" class="form-control" id="importe" >
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="" class="col-form-label">Observacion / Comentario</label>
                            <textarea rows="3" cols="12" class="form-control" id="comentario"></textarea>
                        </div>  
                    </div> 
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" id="grabar" class="btn btn-primary">GUARDAR</button>
        </div>
    </form>   
        </div>
    </div>
  </div>
</div>

<?php
    include "includes/footer1.php";
?>