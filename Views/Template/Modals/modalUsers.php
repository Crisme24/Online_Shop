<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title-centered" id="titleModal">New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
    </div>

    <div class="modal-body">
        <form id="formUsuario" name="formUsuario" class="form-horizontal">

            <input type="hidden" id="idUsuario" name="idUsuario" value="">
            <p class="text-primary">All fields are required</p>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="txtIdentificacion">Identification</label>
                    <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion"  required="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="txtNombre">First Name</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre"  required="">
                </div>

                <div class="form-group col-md-6">
                    <label class="txtApellido">Last Name</label>
                    <input type="text" class="form-control" id="txtApellido" name="txtApellido"  required="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="txtTelefono">Phone Number</label>
                    <input type="text" class="form-control" id="txtTelefono" name="txtTelefono"  required="">
                </div>

                <div class="form-group col-md-6">
                    <label class="txtEmail">Email</label>
                    <input type="text" class="form-control" id="txtEmail" name="txtEmail"  required="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="listRolid">User Role</label>
                    <select class="form-control" data-live-search="true" id="listRolid" name="listRolid"  required="">
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label class="listStatus">Status</label>
                    <select class="form-control selectpicker" id="listStatus" name="listStatus"  required="">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="txtPassword">Password</label>
                    <input type="password" class="form-control" id="txtPassword" name="txtPassword"  required="">
                </div>
            </div>

            <div class="tile-footer">

                <button id="btnActionForm" class="btn btn-outline-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Save</span></button>&nbsp;&nbsp;&nbsp;

                <button class="btn btn-outline-dark" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</button>

            </div>
        </form>
      </div>

    </div>
  </div>
</div>
