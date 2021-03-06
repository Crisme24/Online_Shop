
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title-centered" id="titleModal">New Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="tile">

            <div class="tile-body">
              <form id="formRol" name="formRol">
                  <input type="hidden" id="idRol" name="idRol" value="">
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Enter role name" required="">
                </div>

                <div class="form-group">
                  <label class="control-label">Description</label>
                  <textarea class="form-control" rows="2" id="txtDescripcion" name="txtDescripcion" placeholder="Enter role description" required=""></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Status</label>
                    <select class="form-control" id="listStatus" name="listStatus" required="">
                      <option value="1">Active</option>
                      <option value="2">Inactive</option>
                    </select>
                  </div>
                  <div class="tile-footer">
              <button id="btnActionForm" class="btn btn-outline-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Save</span></button>&nbsp;&nbsp;&nbsp;
              <a class="btn btn-outline-dark" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
              </form>
            </div>

          </div>
      </div>

    </div>
  </div>
</div>
