$(document).ready(function() {
    function ValidarQR (string){
        if (string.length >= 1) {
            if (string.includes('https://camaravm.com.ar/autogestion/')) {
                const cod = string.slice(56)
                $.ajax({
                    url: "pdf/pdf.php",
                    method: "POST",
                    data: { cod: cod, opcion:1 },
                    datatype: "json",
                    success: function(data) {
                        let dir = document.getElementById('pdf');
                        var url = $(dir).attr( "src", "pdf/"+cod+".pdf" );
                        $('#modalPDF').modal('show');
                    },
                    error: function(data) { 
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR : '+data,
                            text: 'Comuniquese con el administrador'
                        })
                    },
                })
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
            document.getElementById("formQR").reset();
        }
    };


    function BorrarPDF(string){
        if (string.includes('https://camaravm.com.ar/autogestion/')) {
                const cod = string.slice(56)
                $.ajax({
                    url: "pdf/pdf.php",
                    method: "POST",
                    data: { cod: cod, opcion:2 },
                    datatype: "json",
                    success: function(data) {
                        document.getElementById("formQR").reset();
                    },
                    error: function(data) { 
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR : '+data,
                            text: 'Comuniquese con el administrador'
                        })
                    },
                })
        }else{
            location.href ='index.php';
        }
    }



    $(document).on('click','#buscar',function(event){
        event.preventDefault();    
        let qr = document.getElementById('qr').value;
        ValidarQR(qr)
    });


    $(document).on('click','#cerrarPDF',function(event){
        event.preventDefault();    
        let qr = document.getElementById('qr').value;
        BorrarPDF(qr);
    });


    $(document).on('click','#i',function(event){
        event.preventDefault();    
        let qr = document.getElementById('qr').value;
        $("#qr").val('https://camaravm.com.ar/autogestion/seguimientoPlanilla/726287e201a0c53944131c6fd314f3871c5368efaba9668702bb2ccf587ab387');
        
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