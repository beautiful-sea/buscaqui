<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="modal modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog animated zoomIn animated-3x" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title color-primary" id="myModalLabel">Selecione a categoria do Sorteio</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
            </div>
        </div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Sorteios
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/business">Sorteios</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

  <div class="row">

  	<div class="col-md-6">
      <h1>Todos os sorteios</h1>
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="lottery/create"><input class="btn btn-success" value="Cadastrar Sorteio"></a>
            </div>
            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 140px">Data de Início</th>
                    <th style="width: 140px">Data Final</th>
                    <th style="width: 140px">Status</th>
                    <th style="width: 140px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($lottery) && ( is_array($lottery) || $lottery instanceof Traversable ) && sizeof($lottery) ) foreach( $lottery as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><?php echo htmlspecialchars( $value1["idlottery"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["dtstart"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["dtend"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td>
                      <a href="/admin/lottery/<?php echo htmlspecialchars( $value1["idlottery"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/admin/lottery/<?php echo htmlspecialchars( $value1["idlottery"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>

    <div class="col-md-6">
      <h1>Participantes do Sorteio Atual</h1>
    <div class="box box-primary" >
          <div class="box-header">
            <a href="lottery/pal/create"><input class="btn btn-success" value="Cadastrar Participante"></a>
          </div>
          <div class="box-body no-padding">
            <table class="table table-striped" style="white-space: wrap;">
              <thead>
                <tr>
                  <th style="">#</th>
                  <th style="">Nome</th>
                  <th style="">Email</th>
                  <th style="">CPF/ ID</th>
                   <th style="">Whatsapp</th>
                   <th style="">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter1=-1;  if( isset($participants) && ( is_array($participants) || $participants instanceof Traversable ) && sizeof($participants) ) foreach( $participants as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                  <td ><?php echo htmlspecialchars( $value1["idparticipant"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td ><?php echo htmlspecialchars( $value1["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td ><?php echo htmlspecialchars( $value1["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td ><?php echo htmlspecialchars( $value1["nrcpfid"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td ><?php echo htmlspecialchars( $value1["nrwhatsapp"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td>
                    <a href="/admin/lottery/pal/<?php echo htmlspecialchars( $value1["idparticipant"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
    </div>

    <div class="content">
     <div class="row">
      <div class="col-md-6">
        
      </div>
        <div class="col-md-6">
          <h1>Sorteio Atual</h1>

        <div class="box box-primary">
            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 140px">Início</th>
                    <th style="width: 140px">Término</th>
                    <th style="width: 140px">Total de Participantes</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($activeLottery) && ( is_array($activeLottery) || $activeLottery instanceof Traversable ) && sizeof($activeLottery) ) foreach( $activeLottery as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><?php echo htmlspecialchars( $value1["idlottery"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["dtstart"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["dtend"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["count"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
              <!-- /.box-body -->
          </div>

        </div>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->