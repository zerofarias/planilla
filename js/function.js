$(document).ready(function() {

    $(document).on('click','#buscar',function(event){
        let qr = document.getElementById('qr').value;
        qr.substring(0,2); // Resulta “Ho”


        alert(qr)
        event.preventDefault();    
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