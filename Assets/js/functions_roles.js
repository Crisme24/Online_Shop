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
    formRol.onsubmit = function(e){
        e.preventDefault();//Prevenir que se recarge el formulario o la pagina

        var intId = document.querySelector('#idRol').value;
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
            if(request.readyState == 4 && request.status == 200) {
                //console.log(request.responseText);

                var objData = JSON.parse(request.responseText); //convertir un array en un objeto de JS

                if(objData.status)
                {
                    $('#modalFormRol').modal("hide");
                    formRol.reset();
                    swal("User Roles", objData.msg, "success");
                    tableRoles.api().ajax.reload(function(){
                        fntEditRol();
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
    document.querySelector('#idRol').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-outline-info", "btn-outline-success");
    document.querySelector('#btnText').innerHTML = "Save";
    document.querySelector('#titleModal').innerHTML = "New Role";
    document.querySelector("#formRol").reset();
    $('#modalFormRol').modal('show');
}

window.addEventListener('load', function() {
    fntEditRol();
    ftnDelRol();
}, false);

function fntEditRol() {
    var btnEditRol = document.querySelectorAll(".btnEditRol");
    btnEditRol.forEach(function(btnEditRol) {
        btnEditRol.addEventListener('click', function() {

            document.querySelector('#titleModal').innerHTML = "Edit Role";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-outline-success", "btn-outline-info");
            document.querySelector('#btnText').innerHTML = "Edit";

            // $('#modalFormRol').modal('show');

            var id = this.getAttribute("rl");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');//Averiguamos si estamos en un navegador Chrom o firefox
            var ajaxUrl = base_url+'/Roles/getRol/'+id;
            request.open("GET", ajaxUrl, true);
            request.send();

            request.onreadystatechange = function() {
                if(request.readyState == 4 && request.status == 200) {

                    //console.log(request.responseText);
                    var objData = JSON.parse(request.responseText);

                    if(objData.status)
                    {
                        document.querySelector("#idRol").value = objData.data.id;
                        document.querySelector("#txtNombre").value = objData.data.name;
                        document.querySelector("#txtDescripcion").value = objData.data.description;

                        if(objData.data.status == 1)
                        {
                            var optionSelect = '<option value="1" selected class="notBlock">Active</option>';
                        }else {
                            var optionSelect = '<option value="2" selected class="notBlock">Inactive</option>';
                        }

                        var htmlSelect = `${optionSelect}
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                         `;
                        document.querySelector("#listStatus").innerHTML = htmlSelect;
                        $('#modalFormRol').modal('show');
                    }else {
                        swal("Error", objData.msg, "error");
                    }
                }
            }

        });
    });
}

function ftnDelRol(){
    var btnDelRol = document.querySelectorAll(".btnDelRol");
    btnDelRol.forEach(function(btnDelRol){
        btnDelRol.addEventListener('click', function(){
            var idrol = this.getAttribute("rl");

            swal({
                title: "Delete Role",
                text: "Are you sure you want to delete this role?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm){

                if(isConfirm)
                {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url+'/Roles/delRol/';
                    var strData = "idrol="+idrol;
                    request.open("POST", ajaxUrl, true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function() {
                        if(request.readyState == 4 && request.status == 200) {

                            //console.log(request.responseText);
                            var objData = JSON.parse(request.responseText);

                            if(objData.status)
                            {
                                swal("Deleted!", objData.msg, "success");
                                tableRoles.api().ajax.reload(function(){
                                    fntEditRol();
                                    ftnDelRol();
                                });

                            }else{
                                swal("Alert!", objData.msg, "error");
                            }
                        }
                    }

                }
            });
        });
    });
}
