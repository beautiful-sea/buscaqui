<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Participantes
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/clients">Participantes</a></li>
    <li class="active"><a href="/clients/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Participante</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/lottery/pal/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="desname">Nome</label>
              <input type="text" class="form-control" id="desname" name="desname" >
            </div>
            <div class="form-group">
              <label for="desemail">Email</label>
              <input type="email" class="form-control" id="desemail" name="desemail" >
            </div>
            <div class="form-group">
              <label for="nrcpfid">CPF / IDENTIDADE</label>
              <input type="text" class="form-control" id="nrcpfid" name="nrcpfid" >
            </div>
            <div class="form-group">
              <label for="nrwhatsapp">Whatsapp</label>
              <input type="text" class="form-control" id="nrwhatsapp" name="nrwhatsapp" >
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