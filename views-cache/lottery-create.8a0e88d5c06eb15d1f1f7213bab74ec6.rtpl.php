<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Sorteios
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/lottery">Sorteios</a></li>
    <li class="active"><a href="/admin/lottery/create">Cadastrar</a></li>
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
        <form role="form" action="/admin/lottery/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="dtstart">Data de Início</label>
              <input type="date" class="form-control" id="dtstart" name="dtstart" >
            </div>
            <div class="form-group">
              <label for="hrstart">Hora de Início</label>
              <input type="time" class="form-control" id="hrstart" name="hrstart" >
            </div>
            <div class="form-group">
              <label for="dtend">Data Final</label>
              <input type="date" class="form-control" id="dtend" name="dtend" >
            </div>
            <div class="form-group">
              <label for="hrend">Hora Final</label>
              <input type="time" class="form-control" id="hrend" name="hrend" >
            </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->