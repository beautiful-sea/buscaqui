<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Sorteios
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/clients">Sorteios</a></li>
    <li class="active"><a href="/clients/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Sorteio</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/lottery/<?php echo htmlspecialchars( $lottery["idlottery"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="dtstart">Data de Início (<?php echo htmlspecialchars( $lottery["dtstart"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)</label>
              <input type="date" class="form-control" id="dtstart" name="dtstart">
            </div>
            <div class="form-group">
              <label for="hrstart">Hora de Início </label>
              <input type="time" class="form-control" id="hrstart" name="hrstart" >
            </div>
            <div class="form-group">
              <label for="dtend">Data Final (<?php echo htmlspecialchars( $lottery["dtend"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)</label>
              <input type="date" class="form-control" id="dtend" name="dtend" >
            </div>
            <div class="form-group">
              <label for="hrend">Hora Final</label>
              <input type="time" class="form-control" id="hrend" name="hrend">
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="1">Ativo</option>
                <option value="0">Desativo</option>
                <option value="2">Concluído</option>
              </select>
            </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->