<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Buscaqui</a>.</strong> Todos direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Atividades recentes</h3>
        <ul class="control-sidebar-menu">
          <?php $counter1=-1;  if( isset($ractivities) && ( is_array($ractivities) || $ractivities instanceof Traversable ) && sizeof($ractivities) ) foreach( $ractivities as $key1 => $value1 ){ $counter1++; ?>
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-cog bg-red"></i>

              <div class="menu-info">
                <h3 class="control-sidebar-subheading"><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>(<?php echo htmlspecialchars( $value1["idperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)</h3>
                <h5><?php echo htmlspecialchars( $value1["desactivity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["destype"], ENT_COMPAT, 'UTF-8', FALSE ); ?>(<?php echo htmlspecialchars( $value1["idtype"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)</h5>
                <p><?php echo htmlspecialchars( $value1["dtregister"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
              </div>
            </a>
          </li>
          <?php } ?>
        </ul>
        <p style="text-align: center"> <a href="#">Ver Mais</a> </p>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/res/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/res/admin/dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>