<div id="row">
    
        <div class="col-md-3">
            <div class="list-group">
                <?php foreach ($submenu as $name=>$value):
                $badge = "";
                $active = "";
                if($value == "settings/updates" && $update_count){ $badge = '<span class="badge badge-success">'.$update_count.'</span>';}
                if($value == "settings"){ $active = 'active';}?>
                   <a class="list-group-item <?=$active;?>" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$badge?> <?=$name?></a>
                <?php endforeach;?>
            </div>
        </div>


<div class="col-md-9">
<div class="table-head"><?=$this->lang->line('application_settings');?></div>
<?php   
$attributes = array('class' => '', 'id' => 'csettings_form');
echo form_open_multipart($form_action, $attributes); 
?>
<div class="table-div">
<br>
    <div id="map" style="height: 500px"></div>

    <div class="form-group">
        <label><?=$this->lang->line('application_business_name');?></label>
        <input type="text" name="name" class="required form-control" value="<?=$company->name;?>" required>
    </div>
    <div class="form-group">
        <label><?=$this->lang->line('application_address');?></label>
        <input type="text" name="address" class="required form-control" value="<?=$company->address;?>" required>
    </div>
    <div class="form-group">
        <label><?=$this->lang->line('application_city');?></label>
        <input type="text" name="city" class="required form-control" value="<?=$company->city;?>" required>
    </div>
    <div class="form-group">
        <label><?=$this->lang->line('application_province');?></label>
        <input type="text" name="province" class="required form-control" value="<?=$company->province;?>" required>
    </div>
    <div class="form-group">
        <div class="col-md-1 col-1">
            <label>DDD</label>
            <input type="text" name="tddd" class="required form-control" value="<?=substr($company->phone,0,2); ?>" required>
        </div>
        <div class="col-md-11 col-11">
            <label><?=$this->lang->line('application_phone');?></label>
            <input type="text" name="phone" class="required form-control" value="<?=substr($company->phone,2); ?>" required>
        </div>
         
    </div>
    <div class="form-group">
        <div class="col-md-1 col-1">
            <label>DDD</label>
            <input type="text" name="cddd" class="required form-control" value="<?=substr($company->mobile,0,2); ?>" required>
        </div>
        <div class="col-md-11 col-11">
            <label><?=$this->lang->line('application_mobile');?></label>
            <input type="text" name="mobile" class="required form-control" value="<?=substr($company->mobile,2); ?>" required>
        </div>
    </div>
        <div class="form-group">
        <label>CNPJ</label>
        <input type="text" name="cnpj" class="required form-control" value="<?=$company->cnpj;?>" required>
    </div>
    
    <div class="form-group">
        <label><?=$this->lang->line('application_logo');?> (max 200x200) <button type="button" class="btn-option po pull-right" data-toggle="popover" data-placement="right" data-content="<div class='logo' style='padding:10px'><img src='<?=$company->logo;?>' style='padding:10px; width:100%'></div>" data-original-title="<?=$this->lang->line('application_logo');?>"> <i class="fa fa-info-circle"></i></button>
        </label>
        <div class="form-group">
                <div><input id="uploadFile" class="form-control uploadFile" placeholder="Escolha um arquivo" disabled="disabled" />
                          <div class="fileUpload btn btn-primary">
                              <span><i class="fa fa-upload"></i><span class="hidden-xs"> <?=$this->lang->line('application_select');?></span></span>
                              <input id="uploadBtn" type="file" name="clogo" class="upload" />
                          </div>
            </div>
        </div>
                    
    </div>

    <div class="form-group">
        <label><?=$this->lang->line('application_facade_photo');?> (max 900x400) <button type="button" class="btn-option po pull-right" data-toggle="popover" data-placement="right" data-content="<div class='logo' style='padding:10px; width:100%'><img style='padding:10px; width:100%' src='<?=$company->facade_photo;?>'></div>" data-original-title="<?=$this->lang->line('application_facade_photo');?>"> <i class="fa fa-info-circle"></i><small>Essa foto será usada na divulgação do seu negócio!</small></button>
        </label>
        <div class="form-group">
                <div><input id="uploadFile2" class="form-control uploadFile" placeholder="Escolha um arquivo" disabled="disabled" />
                          <div class="fileUpload btn btn-primary">
                              <span ><i class="fa fa-upload"></i><span class="hidden-xs"> <?=$this->lang->line('application_select');?></span></span>
                              <input id="uploadBtn2" type="file" name="cfacade" class="upload" />
                          </div>
            </div>
        </div>
                    
    </div>

        <div class="form-group">
            <label><?=$this->lang->line('application_description');?> (max 500 caracteres)</label>
            <textarea class="textarea summernote" name="description" rows="5"><?=$company->description?></textarea>
        </div>
        
        <div class="form-group">
             <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
            
        </div>

    </table>
    
    <?php echo form_close(); ?>
    </div>
    </div>

    </div>
    <script>
             
            function initMap(position)
            {

                latlng = {lat: position.latitude, lng: position.longitude};

                var options = {
                    zoom: 15,
                    center: latlng,
                    mapTypeId: 'hybrid',
                    draggable: true,
                    title: 'MArque sua localização'
                };

                

                
                var map = new google.maps.Map(document.getElementById("map"), options);
                var marker = new google.maps.Marker({position: latlng, map: map});
                map.setTilt(45);
                var infoWindow = new google.maps.InfoWindow;


            }

            

            function getPosition()
            {
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position){ // callback de sucesso
                        initMap(position.coords);
                    }, 
                    function(error){ // callback de erro
                       alert('Erro ao obter localização!');
                       console.log('Erro ao obter localização.', error);
                    });
                } else {
                    alert('Navegador não suporta Geolocalização!');
                }
            }

            

      
      </script>
      <<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAr7VLcAWiDg9WcQ4Jdy5U3sbAfwpistEk&callback=getPosition"
    async defer></script>
