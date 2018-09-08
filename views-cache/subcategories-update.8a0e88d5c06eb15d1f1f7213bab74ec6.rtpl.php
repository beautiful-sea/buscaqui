<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Subcategorias
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Subcategoria</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/subcategories/<?php echo htmlspecialchars( $subcategory["idsubcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="dessubcategory">Nome da Subcategoria</label>
              <input type="text" class="form-control" id="dessubcategory" name="dessubcategory" placeholder="Digite o nome da Subcategoria" value="<?php echo htmlspecialchars( $subcategory["dessubcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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