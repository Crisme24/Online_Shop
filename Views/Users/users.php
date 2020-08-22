<?php
    headerAdmin($data);
    getModal('modalUsers', $data);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><?php echo $data['page_title']; ?>
          <button class="btn btn-outline-dark btn-sm" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i>  New </button></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/roles"><?php echo $data['page_title']; ?></a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableUsuarios">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>FIRST NAME</th>
                      <th>LAST NAME</th>
                      <th>EMAIL</th>
                      <th>PHONE NUMBER</th>
                      <th>ROLE</th>
                      <th>STATUS</th>
                      <th>ACTIONS</th>
                    </tr>
                    <tr>
                      <th>1</th>
                      <th>prueba</th>
                      <th>prueba</th>
                      <th>prueba</th>
                      <th>prueba</th>
                      <th>prueba</th>
                      <th>prueba</th>
                      <th>prueba</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php footerAdmin($data); ?>
