<?php   
$attributes = array('class' => '', 'id' => '_categories');
echo form_open($form_action, $attributes); 
?>

<?php if(isset($categories)){ ?>
<input id="id" type="hidden" name="id" value="<?=$categories->id;?>" />
<?php } ?>
 <div class="form-group">
        <label for="name"><?=$this->lang->line('application_name');?></label>
        <input id="name" name="name" type="text" class="required form-control"  value="<?php if(isset($categories)){ echo $categories->name; } ?>"  required/>
</div>
 <div class="form-group">
        <label for="icon"><?=$this->lang->line('application_icon');?></label>
        <input id="icon" name="icon" type="text" class="required form-control"  value="<?php if(isset($categories)){ echo $categories->icon; } ?>"  required/>
</div>

        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>
<?php echo form_close(); ?>