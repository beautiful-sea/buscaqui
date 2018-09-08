<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Clientes
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/clients">Clientes</a></li>
    <li class="active"><a href="/clients/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Cliente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/clients/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="desclient">Nome</label>
              <input type="text" class="form-control" id="desclient" name="desclient" placeholder="Digite o nome">
            </div>
            <div class="form-group">
              <label for="desaddress">Endereço</label>
              <input type="text" class="form-control" id="desaddress" name="desaddress" placeholder="Digite o login">
            </div>
            <div class="form-group">
              <label for="desemail">E-mail</label>
              <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o e-mail">
            </div>
            <div class="form-group">
              <label for="nrwhatsapp">Whatsapp</label>
              <input type="tel" class="form-control" id="nrwhatsapp" name="nrwhatsapp" placeholder="Digite o Whatsapp">
            </div>
            <div class="form-group">
              <label for="nrphone">Telefone Residencial</label>
              <input type="tel" class="form-control" id="nrphone" name="nrphone" placeholder="Digite o telefone">
            </div>
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