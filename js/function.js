$(document).ready(function() {

    
    
    
    function validarPagina (string){
        if (string.includes('https://camaravm.com.ar/autogestion/')) {
            alert('IMPRIMIR RECEPCION')
        }else{
            Swal.fire({
                icon: 'error',
                title: 'QR NO VALIDO',
                text: 'el siguiente codigo no es valido'
              })
        }
    }

    $(document).on('click','#buscar',function(event){
        event.preventDefault();    
        let qr = document.getElementById('qr').value;
        if (qr.length >= 1) {
            validarPagina(qr);
        }else{
            Swal.fire(
                'QR VACIO',
                'por favor escane el codigo QR',
                'question'
              )
        }
        
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