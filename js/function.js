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
        ValidarQR (qr)
    });


    $(document).on('click','#cerrarPDF',function(event){
        event.preventDefault();    
        let qr = document.getElementById('qr').value;
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
                console.log(imp.cantidad);
                if (imp.cantidad >= 1) {
                    $("#bloque").attr("hidden",false);
                    document.getElementById("cantidad").innerHTML = "Cantidad <b>"+ imp.cantidad;
                    tablaDetalle();
                }if (imp.cantidad < 1) {
                    $("#bloque").attr("hidden",true);
                }
                
                
        
            }
        })
        }
    
    total();


});













//function ValidarQR (string){
//    if (string.length >= 1) {
//        if (string.includes('https://camaravm.com.ar/autogestion/')) {
//            const cod = string.slice(56)
//            $.ajax({
//                url: "pdf/pdf.php",
//                method: "POST",
//                data: { cod: cod, opcion:1 },
//                datatype: "json",
//                    success: function(data) {
//                        let dir = document.getElementById('pdf');
//                        var url = $(dir).attr( "src", "pdf/"+cod+".pdf" );
//                        $('#modalPDF').modal('show');
//                    },
//                    error: function(data) { 
//                        Swal.fire({
//                            icon: 'error',
//                            title: 'ERROR : '+data,
//                            text: 'Comuniquese con el administrador'
//                        })
//                    },
//            })
//    }else{
//            Swal.fire({
//                icon: 'error',
//                title: 'CODIGO QR NO VALIDO',
//                text: 'no se encuentra codigo , o el mismo no es valido'
//            })
//            document.getElementById("formQR").reset();
//        }
//}else{
//        Swal.fire(
//            'CODIGO QR VACIO',
//            'por favor escane el codigo QR',
//            'question'
//        )
//        document.getElementById("formQR").reset();
//    }
//};
//


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