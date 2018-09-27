 $(document).ready(function(){

  

  $("#busca").keyup(function(){//Ao realizar uma busca por serviços

    busca = $("#busca").val();
    type = 'search';
    showsearch(busca,type);
    $("#eac-container-busca").addClass('color-warning');
  })

  $("#search-box-slidebar").keyup(function(){//Ao realizar uma busca por localização  

    busca = $("#search-box-slidebar").val();
    type = 'location';
    showsearch(busca,type);
     $("#eac-container-search-box-slidebar").addClass('color-warning');

  })

  $("#search-box-slidebar").blur(function(){//Ao realizar uma busca manter fundo transparente
    $("#search-box-slidebar").css("background-color", "rgba(66,66,66,.04)");
  })

  $("#menu").click(function(){//Ao realizar uma busca
    
    value = $("#search-box-slidebar").val();

    console.log(value);
    $("#lcity").html(value);
  })


  function showsearch(busca,type){//Mostra resultados para a busca realizada
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
          acao: "autocomplete",
          parametro: busca,
          tipo: type
        }, success: function(data){
          
        }
      },

      preparePostData: function(data) {
      if(type == 'search'){
        data.phrase = $("#busca").val();
      }else if(type == 'location'){
        data.phrase = $("#search-box-slidebar").val();
      }
        return data;
      },
      theme:"dark"
    };

    console.log(options);
    if(type == 'search'){
      $("#busca").easyAutocomplete(options);
      $("#busca").focus();
    }else if(type == 'location'){

      $("#search-box-slidebar").easyAutocomplete(options);
      $("#search-box-slidebar").focus();
    }
    
    $("#search-box-slidebar").attr('background-color','none');
  }

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
                            $("#search-box-slidebar").attr('placeholder',city);
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
            });
        } else {
            console.log('Navegador não suporta Geolocalização!');

        }
        
      }
      getLocation();


  })

