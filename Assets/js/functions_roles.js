var tableRoles;

document.addEventListener('DOMContentLoaded', function() {
    tableRoles = $('#tableRoles').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/English.json"
        },
        "ajax":{
            "url":  " "+base_url+"/Roles/getRoles",
            "dataSrc":""
        },
        "columns":[
            {data:"id"},
            {data:"name"},
            {data:"description"},
            {data:"status"},
            {data:"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    });

    //Nuevo Rol
    var formRol = document.querySelector('#formRol');
    formRol.onsubmit = function(e) {
        e.preventDefault();//Prevenir que se recarge el formulario o la pagina

        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intStatus = document.querySelector('#listStatus').value;

        if(strNombre == '' || strDescripcion == '' || intStatus == '')
        {
            swal("Alert", "All fields are required", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Roles/setRol';
        var formData = new FormData(formRol);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function()
        {
            if(request.readysState == 4 && request.status == 200) {
                //console.log(request.responseText);

                var objData = JSON.parse(request.responseText); //convertir un array en un objeto de JS

                if(objData.status)
                {
                    $('#modalFormRol').modal("hide");
                    formRol.reset();
                    swal("Success", objData.msg, "success");
                    tableRoles.api().ajax.reload(function(){
                        fntEditRol();
                        fntDelRol();
                        fntPermisos();
                    });
                }else {
                    swal("Error", objData.msg, "error")
                }
            }
        }
    }
});

$('#tableRoles').DataTable();



function openModal() {
    $('#modalFormRol').modal('show');
}
