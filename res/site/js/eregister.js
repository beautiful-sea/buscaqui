function next_form(){//Passar para proxima etapa do formulario
 $('#form1').css('display','none');
 $('#form2').css('display','block');
 $("#name_form").html("Sobre o <span class='color-success'>negócio</span>:");
};

function back_form(){//Voltar formulario para etapa anterior
  $('#form1').css('display','block');
  $('#form2').css('display','none');
  $("#name_form").html("Sobre o <span class='color-success'>dono do negócio</span>:");
}


function ck_cnpj(){//marcar ou desmarcar cnpj
  if ($("#no_cnpj").is(":checked")) {
    $("#cnpj").css('display','none');
      $("#cnpj").removeAttr('required');

  }else{
   $("#cnpj").css('display','block');
     $("#cnpj").attr('required','true');
  }
  
}

function getsubcategories(){//obter subcategorias conforme categoria
   $('#subcategories').html("");
   //$("#subcategories").removeClass('selectpicker');
  value = $("#categories option:selected").val();

  $.post('/eregister-subcategories', {
    id : value
  }, function(result){
    result = JSON.parse(result);

    if(result[0] != null){

      $.each(result, function(i,subcategory){
        console.log(result[i].name);
        $("#subcategories").append("<option value='"+result[i].id+"'>"+result[i].name+"</option>");
      });
      $('.selectpicker').selectpicker('refresh');
    }else{
      $("#msg_email").html('');
    }
  })
}

function changetheme(){//alterar tema do input cidade para funco branco
  $("#city").css("background-color","white");
  $("#city").removeClass("eac-dark");
  $("#city").addClass("color-primary");

}
function ck_email(){//Checar se email já existe
  var email = $("#email").val();

  $.post('/eregister-ck-email', {
    data : email
  }, function(result){
    result = JSON.parse(result);

    if(result[0] != null){
      $("#msg_email").html('E-mail já está cadastrado');
    }else{
      $("#msg_email").html('');
    }
  })
}

function msgsmall(name){//Escreve a mensagem de "somente números" em baixo do campo clicado
    names = ['cpf','rg','ddd','mobile','zipcode','cnpj'];
    for (var i = 0; i < names.length; i++) {
      if(names[i] != name){
         $("#smallc"+names[i]).html('');
      }else if(names[i] == name){
        $("#smallc"+names[i]).html('Somente números');
      }
    }
  }


/*FORMATAR CAMPOS COM SOMENTE NÚMEROS, EM TEMPO REAL*/

$('input[name=zipcode]').keyup(function(){
    value = this.value.replace(/\D/g, '');
    $('input[name=zipcode]').val(value);
})

$('input[name=ddd]').keyup(function(){
    value = this.value.replace(/\D/g, '');
    $('input[name=ddd]').val(value);
})

$('input[name=mobile]').keyup(function(){
    value = this.value.replace(/\D/g, '');
    $('input[name=mobile]').val(value);
})

$('input[name=cpf]').keyup(function(){
    value = this.value.replace(/\D/g, '');
    $('input[name=cpf]').val(value);
})

$('input[name=rg]').keyup(function(){
    value = this.value.replace(/\D/g, '');
    $('input[name=rg]').val(value);
})

$('input[name=cnpj]').keyup(function(){
    value = this.value.replace(/\D/g, '');
    $('input[name=cnpj]').val(value);
})
