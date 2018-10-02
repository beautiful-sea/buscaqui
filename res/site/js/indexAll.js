 $(document).ready(function(){

  

  $("#busca").keyup(function(){//Ao realizar uma busca por SERVIÇOS
    busca = $("#busca").val();
    showsearch(busca);
    $("#eac-container-busca").addClass('color-warning');
  })

  $("#brandlocation").keyup(function(){//Ao realizar uma busca por CIDADES
    busca = $("#brandlocation").val();
    searchLocation(busca);
    $("#eac-container-brandlocation").addClass('color-warning');
  })

  $("#brandlocation").click(function(){//Ao CLICAR NA BUSCA DE CIDADES    
     $("#eac-container-brandlocation").addClass('color-warning');
  })

$.ajax({
  type: "POST",
  url: 'vendor/search.php',
  data: {
    acao:'autocomplete'
  },
  success: function(data){
    console.log(data)
}});
  function showsearch(busca){//Mostra resultados para a busca realizada em serviços
    var options = {

      url: function(phrase) {
        return "vendor/search.php";
      },
      template:{
        type: "description",
        fields:{
          description:"icon"
        }
      },

      getValue: "name",
      list: {
        match: {
          enabled: true
        },
        sort: {
          enabled: true
        }
      },

      ajaxSettings: {
        dataType: "json",
        method: "POST",
        data: {
          dataType: "json",
          acao: "autocomplete",
          parametro: busca
        }, success: function(data){
          console.log(data);
        }
      },

      preparePostData: function(data) {
      
        data.phrase = $("#busca").val();
     
        return data;
      },
      theme:"dark",
      requestDelay: 100
    };
      $("#busca").easyAutocomplete(options);
      $("#busca").focus();
    
    //$("#search-box-slidebar").attr('background-color','none');
  }

  function searchLocation(busca){//Mostra resultados para a busca realizada em CIDADES
      
    var options = {

      url: function(phrase) {
        return "vendor/search.php";
      },

      getValue: "name",
      list: {
        match: {
          enabled: true
        },
        sort: {
          enabled: true
        }
      },
      template: {
        type: "description",
        fields:{
          description: "description"
        }
      },

      ajaxSettings: {
        dataType: "json",
        method: "POST",
        data: {
          dataType: "json",
          acao: "location",
          parametro: busca
        }, success: function(data){
          
        }
      },

      preparePostData: function(data) {
      
        data.phrase = $("#brandlocation").val();
     
        return data;
      },
      theme:"dark",
      requestDelay: 100 
    };
      $("#brandlocation").easyAutocomplete(options);
      $("#brandlocation").focus();
      console.log(options.template);
    
   $("#brandlocation").attr('background-color','none');

  }

  $("#brandlocation").blur(function(){//Ao realizar uma busca manter fundo transparente
    $("#brandlocation").css("background-color", "rgba(66,66,66,.04)");
  })

  $("#menu").click(function(){//Ao clicar no menu
    
    value = $("#brandlocation").val();

    $("#lcity").html(value);
  })

   function getLocation(){// Pega a localização atual do usuario
        // verifica se o navegador tem suporte a geolocalização
        if(navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(function(position){ // callback de sucesso

                urlApi = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+position.coords.latitude+","+position.coords.longitude+"&key=AIzaSyBaCAEg6M0-KbFOMtH-FhcU72f72OTF7c0";
                
                $.ajax({
                  url: urlApi,
                  type: 'GET',
                  success: function(res) {//Resultado em Json do local atual
                    res = res.results;//Refinando resultado
                    address_components = [];
                    for (var i = 0; i < res.length; i++) {// Refinando endereço
                      address_components[i] = res[i].address_components;

                      $.each(address_components[i], function(i,value){//Filtrando endereço por tipo
                        for (var i = 0; i < value.types.length; i++) {
                          if(value.types[i] == 'country'){
                            country = value.long_name;
                          }
                          if(value.types[i] == 'locality'){
                            city = value.long_name;
                            $("#brandlocation").attr("placeholder",city);
                            $("#lcity").html(city);
                          }
                          if(value.types[i] == "administrative_area_level_1"){
                            province = value.long_name;
                            UF = value.short_name;
                            $("#lprovince").html(UF);
                          }
                        }
                      });
                    }
                  }
                });
              
            }, 
            function(error){ // callback de erro
               alert('Erro ao obter localização!');
               console.log('Erro ao obter localização.', error);
               $("#body").css('display','none');
            });
        } else {
            console.log('Navegador não suporta Geolocalização!');

        }
        
      }
      getLocation();


  })

