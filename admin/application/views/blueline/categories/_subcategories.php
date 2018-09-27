<?php  
$attributes = array('class' => '', 'id' => '_subcategories');
echo form_open($form_action, $attributes); 
?>
<?php if(isset($subcategories)){ ?>
<input id="id" type="hidden" name="id" value="<?=$subcategories->id;?>" />
<?php } ?>
 <div class="form-group">
        <label for="name"><?=$this->lang->line('application_name');?></label>
        <input id="name" name="name" type="text" class="required form-control"  value="<?php if(isset($subcategories)){ echo $subcategories->name; } ?>"  required/>
</div>
 <div class="form-group">
        <label for="icon"><?=$this->lang->line('application_icon');?></label>
        <input id="icon" name="icon" type="text" class="required form-control"  value="<?php if(isset($subcategories)){ echo $subcategories->icon; } ?>"  required/>
</div>
<div class="form-group">
        <label for="categories"><?=$this->lang->line('application_category');?></label>
        <?php $options = array();
                foreach ($categories as $value):  
                $options[$value->id] = $value->name;
                endforeach;
        
        echo form_dropdown('idcategory', $options, 0, 'style="width:100%" class="chosen-select form-control"');?>
</div> 

        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>
<?php echo form_close(); ?>