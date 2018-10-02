
function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            $('input[name=address]').val("");
            $('input[name=neighborhood]').val("");
            $('input[name=city]').val("");
            $('input[name=province]').val("");
    }


    function callback(conteudo) {
        if (!("erro" in conteudo)) {
          
            //Atualiza os campos com os valores.
            $('input[name=neighborhood]').val(conteudo.bairro);
            $('input[name=city]').val(conteudo.localidade);
            $('input[name=province]').val(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $('input[name=neighborhood]').val("...");
                $('input[name=city]').val("...");
                $('input[name=province]').val("...");

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };