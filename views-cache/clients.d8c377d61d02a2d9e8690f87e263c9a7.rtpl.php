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
    Lista de Clientes
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/business">Clientes</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/clients/create"><input class="btn btn-success" value="Cadastrar Cliente"></a>
            </div>
            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 140px">Nome</th>
                    <th style="width: 140px">Endereço</th>
                    <th style="width: 140px">Email</th>
                    <th style="width: 140px">Whatsapp</th>
                    <th style="width: 140px">Telefone Residencial</th>
                    <th style="width: 140px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($clients) && ( is_array($clients) || $clients instanceof Traversable ) && sizeof($clients) ) foreach( $clients as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><?php echo htmlspecialchars( $value1["idclient"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desclient"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["nrwhatsapp"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td/>
                    <td>
                      <a href="/clients/<?php echo htmlspecialchars( $value1["idclient"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/clients/<?php echo htmlspecialchars( $value1["idclient"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->