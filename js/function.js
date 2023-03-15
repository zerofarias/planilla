$(document).ready(function() {
    function validarQR (string){
        if (string.length >= 1) {
            if (string.includes('https://camaravm.com.ar/autogestion/')) {
                $('#modalPDF').modal('show');
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'CODIGO QR NO VALIDO',
                    text: 'no se encuentra codigo , o el mismo no es valido'
                })

                document.getElementById("formQR").reset();

            }
        }else{
            Swal.fire(
                'CODIGO QR VACIO',
                'por favor escane el codigo QR',
                'question'
            )
        }
    }

    $(document).on('click','#buscar',function(event){
        event.preventDefault();    
        let qr = document.getElementById('qr').value;
        validarQR(qr)
    });
    

    $(document).on('click','#cerrarPDF',function(event){
        event.preventDefault();    
        document.getElementById("formQR").reset();
    });
    
});

















            //$.ajax({
            //  url: "../bd/datos.php",
            //  method: "POST",
            //  data: { id: id, opcion: opcion },
            //  datatype: "json",
            //  beforeSend:function() {
            //    document.getElementById('loading').style.display='block';
            //    document.getElementById('loading').innerHTML='<img src="../img/load.gif" width="150" height="150">'
            //  },
            //  success: function(data) {
            //    tablaDatosExterno.ajax.reload(null, false);
            //    document.getElementById('loading').style.display='none';
            //  }
            //})