<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Negócios
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-4">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Negócio</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/business/<?php echo htmlspecialchars( $business["idbusiness"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <input type="hidden" class="form-control" value="<?php echo htmlspecialchars( $business["idbusiness"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="idbusiness" name="idbusiness" >
            <div class="form-group">
              <label for="desbusiness">Nome</label>
              <input type="text" class="form-control" value="<?php echo htmlspecialchars( $business["desbusiness"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="desbusiness" name="desbusiness" >
            </div>
            <div class="form-group">
              <label for="nrcnpj_cpf">CNPJ/ CPF</label>
              <input type="text" class="form-control" id="nrcnpj_cpf" name="nrcnpj_cpf" value="<?php echo htmlspecialchars( $business["nrcnpj_cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="nrphone">Telefone</label>
              <input type="number" class="form-control" id="nrphone" name="nrphone" value="<?php echo htmlspecialchars( $business["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="nrwhatsapp">Whatsapp</label>
              <input type="number" class="form-control" id="nrwhatsapp" name="nrwhatsapp" value="<?php echo htmlspecialchars( $business["nrwhatsapp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desemail">Email</label>
              <input type="text" class="form-control" id="desemail" name="desemail" value="<?php echo htmlspecialchars( $business["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desaddress">Endereço</label>
              <input type="text" class="form-control" id="desaddress" name="desaddress" value="<?php echo htmlspecialchars( $business["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desneighborhood">Bairro</label>
              <input type="text" class="form-control" id="desneighborhood" name="desneighborhood" value="<?php echo htmlspecialchars( $business["desneighborhood"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="descity">Cidade</label>
              <input type="text" class="form-control" id="descity" name="descity" value="<?php echo htmlspecialchars( $business["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desstate">Estado</label>
              <input type="text" class="form-control" id="desstate" name="desstate" value="<?php echo htmlspecialchars( $business["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="nrzipcode">CEP</label>
              <input type="number" class="form-control" id="nrzipcode" name="nrzipcode" value="<?php echo htmlspecialchars( $business["nrzipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="deslogin">Login</label>
              <input type="text" class="form-control" id="deslogin" name="deslogin" value="<?php echo htmlspecialchars( $business["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="file">Foto</label>
              <input type="file" class="form-control" id="file" name="file">
              <div class="box box-widget">
                <div class="box-body">
                  <img class="img-responsive" id="image-preview" src="<?php echo htmlspecialchars( $business["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">
                </div>
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