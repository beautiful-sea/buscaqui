<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Negócios
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/business">Negócios</a></li>
    <li class="active"><a href="/admin/business/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Negócio</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/business/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="desbusiness">Nome</label>
              <input type="text" class="form-control" id="desbusiness" name="desbusiness" placeholder="Digite o nome">
            </div>
            <div class="form-group">
              <label for="nrcnpj_cpf">CNPJ/ CPF</label>
              <input type="text" class="form-control" id="nrcnpj_cpf" name="nrcnpj_cpf" placeholder="Digite o CPF ou CNPJ">
            </div>
            <div class="form-group">
              <label for="dessubcategory">Subcategoria</label>
              <select name="dessubcategory" class="form-control">
                <?php $counter1=-1;  if( isset($subcategories) && ( is_array($subcategories) || $subcategories instanceof Traversable ) && sizeof($subcategories) ) foreach( $subcategories as $key1 => $value1 ){ $counter1++; ?>
                <option id="dessubcategory" value="<?php echo htmlspecialchars( $value1["idsubcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["dessubcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nrphone">Telefone</label>
              <input type="number" class="form-control" id="nrphone" name="nrphone" placeholder="Digite o Telefone">
            </div>
            <div class="form-group">
              <label for="nrwhatsapp">Whatsapp</label>
              <input type="number" class="form-control" id="nrwhatsapp" name="nrwhatsapp" placeholder="Digite o nome">
            </div>
            <div class="form-group">
              <label for="desemail">Email</label>
              <input type="text" class="form-control" id="desemail" name="desemail" placeholder="Digite o nome">
            </div>
            <div class="form-group">
              <label for="desaddress">Endereço</label>
              <input type="text" class="form-control" id="desaddress" name="desaddress" placeholder="Digite o Endereço">
            </div>
            <div class="form-group">
              <label for="desneighborhood">Bairro</label>
              <input type="text" class="form-control" id="desneighborhood" name="desneighborhood" placeholder="Digite o Bairro">
            </div>
            <div class="form-group">
              <label for="descity">Cidade</label>
              <input type="text" class="form-control" id="descity" name="descity" placeholder="Digite a cidade">
            </div>
            <div class="form-group">
              <label for="desstate">Estado</label>
              <input type="text" class="form-control" id="desstate" name="desstate" placeholder="Digite o estado">
            </div>
            <div class="form-group">
              <label for="nrzipcode">CEP</label>
              <input type="number" class="form-control" id="nrzipcode" name="nrzipcode" placeholder="Digite CEP">
            </div>
            <div class="form-group">
              <label for="deslogin">Login</label>
              <input type="text" class="form-control" id="deslogin" name="deslogin" placeholder="Digite o login">
            </div>
            <div class="form-group">
              <label for="despassword">Senha</label>
              <input type="password" class="form-control" id="despassword" name="despassword" placeholder="Digite a senha">
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