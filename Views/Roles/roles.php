<?php
    headerAdmin($data);
    getModal('modalRoles', $data);
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
            <div class="tile-body">User Roles</div>
          </div>
        </div>
      </div>
    </main>

<?php footerAdmin($data); ?>
