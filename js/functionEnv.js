$(document).ready(function() {

    function GererarPDF(comisionista,importe,comentario,tipo , concepto,farmacia) {
        $.ajax({
            url: "pdf/pdf.php",
            method: "POST",
            data: { comisionista :comisionista ,importe : importe,comentario : comentario,opcion:8 ,tipo:tipo , concepto:concepto , farmacia:farmacia},
            datatype: "json",
            success: function(data) {
                var data = data.replace('"', '');
                var data = data.replace('"', '');
                let dir = document.getElementById('pdf');
                let url = $(dir).attr( "src", "pdf/"+data );
                $('#modalEnvio').modal('hide');

                document.getElementById("formQR").reset();
                $("#codigoPDF").val(data);
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
    }







        $(document).on('click','#guardarplanilla',function(){
                let comisionista = document.getElementById('comisionista').value; 
                let importe = document.getElementById('importe').value; 
                let farmacia = document.getElementById('farmacia').value; 
                let comentario = document.getElementById('comentario').value; 
                let tipo = document.getElementById('tipo').value; 
                let concepto = document.getElementById('concepto').value;  
                if (comisionista.length >= 1) {
                    GererarPDF(comisionista,importe,comentario,tipo,concepto,farmacia)
                }else{
                    Swal.fire(
                        'DEBE INGRESAR UN COMISIONISTA/CADETE',
                        'por favor complete los campos',
                        'question'
                    )
                }
            //alert('comi '+ comisionista + 'importe  '+ importe  + 'farmacia  '+ farmacia  +  'comentario  '+ comentario   +  'tipo  '+ tipo )
            
        });

});