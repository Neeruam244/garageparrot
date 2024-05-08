  <?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
    if (!isset($_SESSION['user'])) {
      require_once('templates/User/connexion.php');
    } else {
      $role = $_SESSION['user']['role'];

      if ($role === 'administrateur' or $role === 'employe') {
    ?>
        <div>
          <?php
          require_once('templates/admin/admin_nav.php');

          ?>
          <div class="row d-flex justify-content-around">
            <div class="col-md-5 mt-5">
              <?php
              include('templates/admin/admin_panel_opinions.php');
              ?>
            </div>
            <div class="col-md-5 mt-5">
              <?php
              include('templates/admin/admin_panel_messaging.php');
              ?>
            </div>
          </div>

        </div>
        <?php
        if ($role === 'administrateur') {
        ?>
          <div class="row d-flex justify-content-around">
            <div class="col-md-5 mt-5">
              <?php
              include('templates/admin_panel_account_management.php');
              ?>
            </div>
          </div>
    <?php
        }
      }
    }
    ?>