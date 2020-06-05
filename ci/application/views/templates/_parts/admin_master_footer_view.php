<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<footer>
  <div class="container">
        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>
</footer>
<script src="<?= site_url('assets/admin/js/jquery-3.5.1.min.js') ?>"></script>
<script src="<?= site_url('assets/admin/js/bootstrap.min.js') ?>"></script>
 <?= $before_body; ?>
</body>
 
</html>
