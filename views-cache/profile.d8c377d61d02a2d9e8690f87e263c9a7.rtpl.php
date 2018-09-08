<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="modal modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog animated zoomIn animated-3x" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title color-primary" id="myModalLabel">Selecione a categoria do Cliente</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
            </div>
            <div class="modal-body">
              <label for="descategory">Categoria</label>
              <select name="category" id="category" class="form-control">
                <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
                <option id="descategory" value="<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn  btn-primary" onclick="go()">Escolher</button>
            </div>
        </div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Meus Dados
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/business">Clientes</a></li>
  </ol>
</section>
<script type="text/javascript">

</script>
<!-- Main content -->
<section class="content">

 <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edite seu perfil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="/admin/business/create" method="post">
                <div class="box-body">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="desbusiness">Nome</label>
                      <input type="text" class="form-control" id="desbusiness" name="desbusiness" value="<?php echo htmlspecialchars( $business["desbusiness"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                      <label for="nrcnpj_cpf">CNPJ/ CPF</label>
                      <input type="text" class="form-control" id="nrcnpj_cpf" name="nrcnpj_cpf" value="<?php echo htmlspecialchars( $business["nrcnpj_cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                      <label for="dessubcategory">Categoria</label>
                      <select onchange="" id="subcategories" name="descategory" class="form-control">
                        <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
                        <option id="descategory" value="<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Subcategoria</label>
                      <select name="dessubcategory" class="form-control">
                        <?php $counter1=-1;  if( isset($subcategories) && ( is_array($subcategories) || $subcategories instanceof Traversable ) && sizeof($subcategories) ) foreach( $subcategories as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["idsubcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["dessubcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                      </select>
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
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="desaddress">Endereço</label>
                      <input type="text" class="form-control" id="desaddress" name="desaddress"value="<?php echo htmlspecialchars( $business["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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
                      <label>Descreva seu negócio</label>
                      <textarea class="form-control" rows="3" ><?php echo htmlspecialchars( $business["desdescribe"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-lg btn-success">Salvar</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div> 

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->