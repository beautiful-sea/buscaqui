<div id="row">
    
        <div class="col-md-3">
            <div class="list-group">
                <?php foreach ($submenu as $name=>$value):
                $badge = "";
                $active = "";
                if($value == "settings/updates" && $update_count){ $badge = '<span class="badge badge-success">'.$update_count.'</span>';}
                if($value == "settings/caccess_data"){ $active = 'active';}?>
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
        <div class="col-md-12 col-12">
            <label for="username"><?=$this->lang->line('application_username');?> *</label>
            <input id="username" type="text" name="username" class="required form-control"  value="<?php if(isset($user)){echo $user->username;} ?>"  required/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-6">    
            <label for="firstname"><?=$this->lang->line('application_firstname');?> *</label>
            <input id="firstname" type="text" name="firstname" class="required form-control"  value="<?php if(isset($user)){echo $user->firstname;} ?>"  required/>
        </div>
        <div class="col-md-6 col-6">
            <label for="lastname"><?=$this->lang->line('application_lastname');?> *</label>
            <input id="lastname" type="text" name="lastname" class="required form-control"  value="<?php if(isset($user)){echo $user->lastname;} ?>"  required/>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-md-12 col-12">
            <label for="email"><?=$this->lang->line('application_email');?> *</label>
            <input id="email" type="email" name="email" class="required email form-control" value="<?php if(isset($user)){echo $user->email;} ?>"  required/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-6">    
            <label for="password"><?=$this->lang->line('application_password');?> <?php if(!isset($user)){echo '*';} ?></label>
            <input id="password" type="password" name="password" class="form-control "  minlength="6" <?php if(!isset($user)){echo 'required';} ?>/>
        </div>
        <div class="col-md-6 col-6">
            <label for="password"><?=$this->lang->line('application_confirm_password');?> <?php if(!isset($user)){echo '*';} ?></label>
            <input id="confirm_password" type="password" name="confirm_password" class="form-control" data-match="#password" />
        </div>
    </div>

    <div class="form-group">
        <div class="">
            <label for="userfile"><?=$this->lang->line('application_profile_picture');?></label>
            <div>
                <input id="uploadFile" type="text" name="dummy" class="form-control uploadFile" placeholder="Choose File" disabled="disabled" />
                <div class="fileUpload btn btn-primary">
                    <span><i class="fa fa-upload"></i><span class="hidden-xs"> <?=$this->lang->line('application_select');?></span></span>
                    <input id="uploadBtn" type="file" name="userfile" class="upload" />
                </div>
            </div>
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
