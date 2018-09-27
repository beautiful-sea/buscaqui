<div id="row">
    
        <div class="col-md-3">
            <div class="list-group">
                <?php foreach ($submenu as $name=>$value):
                $badge = "";
                $active = "";
                if($value == "settings/updates" && $update_count){ $badge = '<span class="badge badge-success">'.$update_count.'</span>';}
                if($value == "settings/cuser_data"){ $active = 'active';}?>
                   <a class="list-group-item <?=$active;?>" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$badge?> <?=$name?></a>
                <?php endforeach;?>
            </div>
        </div>


<div class="col-md-9">
<div class="table-head"><?=$this->lang->line('application_settings');?></div>
<?php   
$attributes = array('class' => '', 'id' => 'cuser_data');
echo form_open_multipart($form_action, $attributes); 
?>
<div class="table-div">
<br>

    <div class="form-group">
        <div class="col-md-6 col-6">
            <label><?=$this->lang->line('application_name');?></label>
            <input type="text" name="firstname" class="required form-control" value="<?=$client->firstname;?>" required>
        </div>
        <div class="col-md-6 col-6">
            <label><?=$this->lang->line('application_lastname');?></label>
            <input type="text" name="lastname" class="required form-control" value="<?=$client->lastname;?>" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-9 col-9">
            <label><?=$this->lang->line('application_address');?></label>
            <input type="text" name="address" class="required form-control" value="<?=$client->address;?>" required>
        </div>
        <div class="col-md-3 col-3">
            <label>CEP</label>
            <input type="text" name="zipcode" class="required form-control" value="<?=$client->zipcode;?>" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12 col-12">
            <label><?=$this->lang->line('application_city');?></label>
            <input type="text" name="city" class="required form-control" value="<?=$client->city;?>" required>
        </div>
    </div>
    <div class="form-group">
        
    </div>
    <div class="form-group">
        <div class="col-md-1 col-1">
            <label>DDD</label>
            <input type="text" name="tddd" class="required form-control" value="<?=substr($client->phone,0,2); ?>">
        </div>
        <div class="col-md-4 col-11">
            <label><?=$this->lang->line('application_phone');?></label>
            <input type="text" name="phone" class="required form-control" value="<?=substr($client->phone,2); ?>">
        </div>
         
    </div>
    <div class="col-md-2"></div>
    <div class="form-group">
        <div class="col-md-1 col-1">
            <label>DDD</label>
            <input type="text" name="cddd" class="required form-control" value="<?=substr($client->mobile,0,2); ?>" required>
        </div>
        <div class="col-md-4 col-11">
            <label><?=$this->lang->line('application_mobile');?></label>
            <input type="text" name="mobile" class="required form-control" value="<?=substr($client->mobile,2); ?>" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 col-4">
            <label>CPF</label>
            <input type="text" name="cpf" class="required form-control" value="<?=$client->cpf;?>" required disabled>
        </div>
        <div class="col-md-4 col-4">
            <label>RG</label>
            <input type="text" name="rg" class="required form-control" value="<?=$client->rg;?>" required disabled>
        </div>
        <div class="col-md-4 col-4">
            <label>Orgão Emissor - RG</label>
            <input type="text" name="rg_issuing" class="required form-control" value="<?=$client->rg_issuing;?>" required disabled>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" name="send" class="btn btn-primary btn-block" value="<?=$this->lang->line('application_save');?>"/>
        
    </div>

    </table>
    
    <?php echo form_close(); ?>
    </div>
    </div>

    </div>
