<?php   
$attributes = array('class' => '', 'id' => '_lotteries');
echo form_open($form_action, $attributes); 
?>
<?php if(isset($lotteries)){ ?>
<input id="id" type="hidden" name="id" value="<?=$lotteries->id;?>" />
<?php } ?>
<?php if(isset($view)){ ?>
<input id="view" type="hidden" name="view" value="true" />
<?php } ?>
<input id="status" name="status" type="hidden" value="Inactive"> 
   
<?php if(isset($lotteries) ){ ?>
 <div class="form-group">
        <label for="status"><?=$this->lang->line('application_status');?></label>
        <?php $options = array(
                  'Active'  => $this->lang->line('application_Active'),
                  'Inactive'    => $this->lang->line('application_Inactive'),
                  'Completed'    => $this->lang->line('application_completed'),
                );
                echo form_dropdown('status', $options, $lotteries->status, 'style="width:100%" class="chosen-select"'); ?>

</div> 
<?php } ?>

 <div class="form-group">
        <label for="start_date"><?=$this->lang->line('application_issue_date');?></label>
        <input autocomplete="off" id="start_date" type="text" name="start_date" class="required datepicker form-control" value="<?php if(isset($lotteries) ){echo $lotteries->start_date;} ?>"  />
</div> 

 <div class="form-group">
        <label for="end_date"><?=$this->lang->line('application_end_date');?></label>
        <input autocomplete="off" id="end_date" type="text" name="end_date" class="required datepicker form-control" value="<?php if(isset($lotteries) ){echo $lotteries->end_date;} ?>"  />
</div> 

        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>


<?php echo form_close(); ?>