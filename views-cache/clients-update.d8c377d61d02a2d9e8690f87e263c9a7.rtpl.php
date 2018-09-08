<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Clientes
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Cliente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/clients/<?php echo htmlspecialchars( $client["idclient"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" >
          <div class="box-body">
            <div class="form-group">
              <label for="desclient">Nome</label>
              <input type="text" class="form-control" id="desclient" name="desclient" value="<?php echo htmlspecialchars( $client["desclient"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desaddress">Endereço</label>
              <input type="text" class="form-control" id="desaddress" name="desaddress" value="<?php echo htmlspecialchars( $client["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desemail">E-mail</label>
              <input type="email" class="form-control" id="desemail" name="desemail" value="<?php echo htmlspecialchars( $client["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="nrwhatsapp">Whatsapp</label>
              <input type="text" class="form-control" id="nrwhatsapp" name="nrwhatsapp" value="<?php echo htmlspecialchars( $client["nrwhatsapp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="nrphone">Telefone Residencial</label>
              <input type="text" class="form-control" id="nrphone" name="nrphone" value="<?php echo htmlspecialchars( $client["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->