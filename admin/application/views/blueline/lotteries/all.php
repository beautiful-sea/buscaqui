	
	<div class="col-sm-12  col-md-12 main">  

     <div class="row">
			<a href="<?=base_url()?>lotteries/create" class="btn btn-primary" data-toggle="mainmodal"> <?=$this->lang->line('application_create_lottery');?></a>
			
			<div class="btn-group pull-right-responsive margin-right-3">

          <ul class="dropdown-menu pull-right" role="menu">
            <?php foreach ($submenu as $name=>$value):?>
	                <li><a id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a></li>
	            <?php endforeach;?>
          </ul>
      </div>


		</div>
		<div class="row">
		<div class="table-head"><?=$this->lang->line('application_lotteries');?></div>
		<div class="table-div">
		<table class="data table" id="lotteries" cellspacing="0" cellpadding="0">
		<thead>
			<th class="hidden-xs" width="70px"><?=$this->lang->line('application_lottery');?></th>
			<th class=""><?=$this->lang->line('application_issue_date');?></th>
			<th class="hidden-xs"><?=$this->lang->line('application_end_date');?></th>
			<th class=""><?=$this->lang->line('application_status');?></th>
			<th><?=$this->lang->line('application_action');?></th>
		</thead>
		<?php foreach ($lotteries as $value):?>

		<tr id="<?=$value->id;?>" >
			<td class="hidden-xs"><?=$value->id;?></td>
			<td class=""><?=$value->start_date ?></td>
			<td class="hidden-xs"><?=$value->end_date ?></td>
			<td><span class="label <?php if($value->status == "Active"){echo 'label-success';}else{echo "label-important";} ?>">
				<?php 	if($value->end_date <= date('d-m-Y') && $value->status != "Inactive"){
					 		echo $this->lang->line('application_ended'); 
						}else if($value->end_date > date('d-m-Y') && $value->status != "Inactive" && $value->start_date >= date('d-m-Y')){ 
							echo $this->lang->line('application_'.$value->status); 
						}else{
							echo $this->lang->line('application_'.$value->status); 
						} ?>
								
							</span></td>
			
			 <td class="option" width="8%">
				        <button type="button" class="btn-option delete po" data-toggle="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete ajax-silent' href='<?=base_url()?>lotteries/delete/<?=$value->id;?>'><?=$this->lang->line('application_yes_im_sure');?></a> <button class='btn po-close'><?=$this->lang->line('application_no');?></button> <input type='hidden' name='td-id' class='id' value='<?=$value->id;?>'>" data-original-title="<b><?=$this->lang->line('application_really_delete');?></b>"><i class="fa fa-times"></i></button>
				        <a href="<?=base_url()?>lotteries/update/<?=$value->id;?>" class="btn-option" data-toggle="mainmodal"><i class="fa fa-cog"></i></a>
			       </td>
		</tr>

		<?php endforeach;?>
	 	</table>
	 	</div>
	 	</div>

		
	</div>