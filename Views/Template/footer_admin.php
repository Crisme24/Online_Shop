<script>
    const base_url = "http://localhost/tienda_virtual";
</script>
<!-- Essential javascripts for application to work-->
<script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <script src="<?= media(); ?>/js/fontawesome.js"></script>
    <script src="<?= media(); ?>/js/functions_admin.js"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>

    <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>

    <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/bootstrap-select.min.js"></script>

    <!-- Page specific javascripts-->
    <?php if($data['page_name'] == "user_rol") { ?>
        <script src="<?= media(); ?>/js/functions_roles.js"></script>
    <?php } ?>

    <?php if($data['page_name'] == "users") { ?>
        <script src="<?= media(); ?>/js/functions_users.js"></script>
    <?php } ?>
  </body>
</html>
