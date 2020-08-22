document.addEventListener('DOMContentLoaded', function() {
    var formUsuario = document.querySelector("#formUsuario");
    formUsuario.onsubmit = function(e) {
        e.preventDefault();
        var strIdentification = document.querySelector('#txtIdentificacion').value;
        var strFirstName = document.querySelector('#txtNombre').value;
        var strLastName = document.querySelector('#txtApellido').value;
        var strEmail = document.querySelector('#txtEmail').value;
        var intPhoneNumber = document.querySelector('#txtTelefono').value;
        var intUserRole = document.querySelector('#listRolid').value;
        var strPassword = document.querySelector('#txtPassword').value;

        if (strIdentification == '' || strFirstName == '' || strLastName == '' || strEmail == ''
            || intPhoneNumber == '' || intUserRole == '')
        {
            swal('Alert', 'All fields are required', 'error');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Users/setUser';
        var formData = new FormData(formUsuario);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
    }
}, false);

window.addEventListener('load', function() {
    fntRolesUsuario();
}, false);

function fntRolesUsuario() {
    var ajaxUrl = base_url+'/Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listRolid').innerHTML = request.responseText;
            document.querySelector('#listRolid').value = 1;
            $('#listRolid').selectpicker('render');
            //$('#listRolid).selectpicker('refresh');
        }
    }
}

function openModal() {
    document.querySelector('#idUsuario').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-outline-info", "btn-outline-success");
    document.querySelector('#btnText').innerHTML = "Save";
    document.querySelector('#titleModal').innerHTML = "New User";
    document.querySelector("#formUsuario").reset();
    $('#modalFormUsuario').modal('show');
}
