$(document).ready(function(){

	$("#city").keyup(function(){

		busca = $("#city").val();

		showsearch(busca);
	})

	function showsearch(busca){
		var options = {

		  url: function(phrase) {
		    return "vendor/search.php";
		  },

		  getValue: "nome",
		  list: {
				match: {
					enabled: true
				}
			},

			template: {
			type: "description",
			fields: {
			description: "uf"
				}
			},

		  ajaxSettings: {
		    dataType: "json",
		    method: "POST",
		    data: {
		      dataType: "json",
		      acao: "cities",
		      parametro: busca
		    }
		  },
		  theme:"dark",

		  preparePostData: function(data) {

		    data.phrase = $("#city").val();
		    return data;
		  }
		};

		$("#city").easyAutocomplete(options);
		$("#city").focus();
		
	}

})