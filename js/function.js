$(document).ready(function() {

    function tablaDetalle(){
        
        var lstProductosVenta = $('#lstProductosVenta').DataTable({
            "ajax": {
                "url": "pdf/pdf.php",
                "method": 'POST', //usamos el metodo POST
                "data": { opcion: 4 }, //enviamos opcion
                "dataSrc": "",
            },
            
            "columns": [
                { "data": "hashCabezal" ,
                "visible": false},
                { "data": "nombre" },
                { "data": "quincena" },
                { "data": "fecha_creacion"},
                { "defaultContent": "<div class='text-center'><div class='btn-group'></button><button class='btn btn-danger' id='delReg' title='Eliminar'><i class='fas fa-times'></i></button></div></div>" }
            ],
            'rowCallback': function(row, data , index) {
                //if (data.maneja_stock == 1) {
                //    $(row).find('td:eq(3)').html('<form action=""><input type="number" min="0" placeholder="'+data.cantidad+'" id="inpCantidad" ><button type="submit" class="btn btn-info" id="addd"  hidden><i class="fas fa-cash-register"></i></button></form>');
                //}
            },
            
            order: [
                [0, "desc"]
            ],
            iDisplayLength: 50,
            language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando...",
            },
            //para usar los botones   
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            dom: 'Bfrtilp',
            searching: false,
            bPaginate: false,
            buttons: []       
        });
        lstProductosVenta.destroy();
    };

    function ValidarQR (string){
        if (string.length >= 1) {
            if (string.includes('https://camaravm.com.ar/autogestion/')) {
                const cod = string.slice(56)
                $.ajax({
                    url: "pdf/pdf.php",
                    method: "POST",
                    data: { cod: cod, opcion:5 },
                    datatype: "json",
                        success: function(data) {
                            document.getElementById("formQR").reset();
                            imp = JSON.parse(data);
                            switch (imp) {
                                case 1:
                                        total();
                                    break;
                                case 2:
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'CODIGO QR YA ESCANEADO',
                                            text: 'Verifique que dicho QR ya ha sido escaneado'
                                        })
                                    break;
                                case 3:
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'CODIGO QR NO ENCONTRADO',
                                        text: 'Verifique que dicho QR sea legible'
                                    })
                                break;
                            
                                default:
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'ALGO SALIO MAL',
                                        text: 'Contacte al administrador'
                                    })
                                    break;
                            }
                            
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




    function BorrarPDF(cod){
        if (cod.length >= 1) {
                $.ajax({
                    url: "pdf/pdf.php",
                    method: "POST",
                    data: { cod: cod, opcion:2 },
                    datatype: "json",
                    success: function(data) {
                        if (data = 1) {
                            document.getElementById("formQR").reset();
                            total()
                        }
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

    function GererarPDF(comisionista,importe,comentario) {
        $.ajax({
            url: "pdf/pdf.php",
            method: "POST",
            data: { comisionista :comisionista ,importe : importe,comentario : comentario,opcion:1 },
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



    $(document).on('click','#buscar',function(event){
        event.preventDefault();    
        let qr = document.getElementById('qr').value;
        ValidarQR (qr)
    });


    $(document).on('click','#cerrarPDF',function(event){
        event.preventDefault();    
        let qr = document.getElementById('codigoPDF').value;
        BorrarPDF(qr);
    });

    $(document).on('click','#nuevo',function(event){
        //event.preventDefault();    
        $('#modalEnvio').modal('show');
        
    });


    $(document).on('click','#i',function(event){
        event.preventDefault();    
        let qr = document.getElementById('qr').value;
        $("#qr").val('https://camaravm.com.ar/autogestion/seguimientoPlanilla/726287e201a0c53944131c6fd314f3871c5368efaba9668702bb2ccf587ab387');
        
    });

    $(document).on('click','#grabar',function(event){
        event.preventDefault();    
        let comisionista = document.getElementById('comisionista').value;
        let importe = document.getElementById('importe').value;
        let comentario = document.getElementById('comentario').value;
        if (comisionista.length >= 1) {
            GererarPDF(comisionista,importe,comentario)
        }else{
            Swal.fire(
                'DEBE INGRESAR UN COMISIONISTA/CADETE',
                'por favor complete los campos',
                'question'
            )
        }
    });

    
    $(document).on("click", "#delReg", function(event){
        //function add() {
        fila = $(this).closest("tr");
        cod = fila.find('td:eq(0)').text();
        $.ajax({
            url: "pdf/pdf.php",
            type: "POST",
            datatype: "json",
            data: { opcion: 7 , cod: cod },
            success: () => {
                tablaDetalle()
                //lstProductosVenta.ajax.reload(null, false);
                //lstProductosVenta.destroy();
                total();
            }
        });
    });

    function total() {
        $.ajax({
            url: "pdf/pdf.php",
            type: "POST",
            datatype: "json",
            data: { opcion: 6 },
            success: (total) => {
                imp = JSON.parse(total);
                if (imp.cantidad >= 1) {
                    $("#bloque").attr("hidden",false);
                    $("#botonera").attr("hidden",false);

                    document.getElementById("cantidad").innerHTML = "Cantidad <b>"+ imp.cantidad;
                    tablaDetalle();
                }if (imp.cantidad < 1) {
                    $("#bloque").attr("hidden",true);
                    $("#botonera").attr("hidden",true);
                }
                
                
        
            }
        })
        }
    
    total();


});
