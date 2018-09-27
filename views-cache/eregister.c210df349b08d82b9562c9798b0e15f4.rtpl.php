<?php if(!class_exists('Rain\Tpl')){exit;}?>      <div class="intro-full ms-hero-img-black_wall ms-hero-bg-primary color-white ms-bg-fixed" id="home">
        <div class="intro-full-content index-1">
          <div class="container">

            <div class="row justify-content-md-center">
              <div class="col-lg-6">
                <div class="card  card-dark animated fadeInUp animation-delay-7">
                  <div class="card-body">
                    <h4 class="color-primary text-center" id="name_form">Sobre <span class="color-success">você</span>:</h4>
                    <form class="form-horizontal" action="/eregister" method="post" id="form">
                      <fieldset id="form1">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <input required type="email" class="form-control " onblur="ck_email()" id="email" name="email" placeholder="Seu email pessoal" ><small class="color-primary">Você usará esse e-mail para fazer login.</small><div class="color-danger" id="msg_email"></div> </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-2 col-3">
                            <input required type="text" maxlength="2" class="form-control " name="ddd" placeholder="DDD" onfocus="msgsmall(this.name)"><small class="color-primary" id="smallcddd"></small>  </div>
                          <div class="col-md-10 col-9">
                            <input onfocus="msgsmall(this.name)" required type="text" maxlength="9" class="form-control" name="mobile" placeholder="Celular para contato" ><small class="color-primary" id="smallcmobile"></small>  </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-4">
                            <input required type="text" class="form-control" name="firstname" placeholder="Nome" maxlength="40"> </div>
                            <div class="col-md-8">
                            <input required type="text" class="form-control" name="lastname" placeholder="Sobrenome" maxlength="80" > </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-12">
                            <select required name="office" class="form-control  selectpicker">

                              <option disabled="" selected="">Cargo</option>
                              <option value="Administrador">Administrador </option>
                              <option value="Diretor">Diretor </option>
                              <option value="Sócio-Administrador">Sócio-Administrador </option>
                              <option value="Titular">Titular </option>

                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-6">
                            <input required type="text" name="cpf" class="form-control " placeholder="CPF" maxlength="11" onfocus="msgsmall(this.name)" ><small class="color-primary" id="smallccpf" ></small> </div>
                            <div class="col-md-6">
                            <input required type="text" name="rg" class="form-control" placeholder="RG" maxlength="9" onfocus="msgsmall(this.name)" ><small class="color-primary" id="smallcrg" ></small> </div>
                        </div>

                        <div class="row form-group is-empty">
                          <div class="col-md-12">
                            <select required id="inputGen" name="rg_issuing" class="form-control selectpicker" data-dropup-auto="false" data-live-search="true">
                              <option selected="" disabled="">Orgão Emissor - RG</option>
                              <option value="SSP">SSP - Secretaria de Segurança Pública</option>
                              <option value="PM">PM - Polícia Militar</option>
                              <option value="PC">PC - Policia Civil</option>
                              <option value="CNT">CNT - Carteira Nacional de Habilitação</option>
                              <option value="DIC">DIC - Diretoria de Identificação Civil</option>
                              <option value="CTPS">CTPS - Carteira de Trabaho e Previdência Social</option>
                              <option value="FGTS">FGTS - Fundo de Garantia do Tempo de Serviço
                              <option value="IFP">IFP - Instituto Félix Pacheco</option>
                              <option value="IPF">IPF - Instituto Pereira Faustino</option>
                              <option value="IML">IML - Instituto Médico-Legal</option>
                              <option value="MTE">MTE - Ministério do Trabalho e Emprego</option>
                              <option value="MMA">MMA - Ministério da Marinha</option>
                              <option value="MAE">MAE - Ministério da Aeronáutica</option>
                              <option value="MEX">MEX - Ministério do Exército</option>
                              <option value="POF">POF - Polícia Federal</option>
                              <option value="POM">POM - Polícia Militar</option>
                              <option value="SES">SES - Carteira de Estrangeiro</option>
                              <option value="SJS">SJS - Secretaria da Justiça e Segurança</option>
                              <option value="SJTS">SJTS - Secretaria da Justiça do Trabalho e Segurança</option>
                              <option value="ZZZ">Outros</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <input required type="password" name="password" class="form-control" placeholder="Digite sua senha" > </div>
                        </div>



                      <button class="btn btn-raised btn-primary btn-block" onclick="next_form()">Próximo
                        <i class="zmdi zmdi-long-arrow-right no-mr ml-1"></i>
                      </button>

                      </fieldset>
                      <!-- formulario 2-->

                      <fieldset id="form2" style="display: none">

                        <div class="form-group row">
                          <div class="col-md-12">
                            <input required type="text" class="form-control " name="name" placeholder="Nome" > </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <input required type="text" class="form-control " name="address" placeholder="Endereço" > </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-4 col-4">
                            <input required type="text" class="form-control " id="fcity" name="city" placeholder="Cidade" autocomplete="off" onblur="changetheme()" > </div>

                            <div class="col-md-2 col-2">
                            <input required type="text" maxlength="2" class="form-control " name="province" id="province" placeholder="UF"></div>

                            <div class="col-md-4 col-4">
                            <input required type="text" class="form-control " name="zipcode" placeholder="CEP" onfocus="msgsmall(this.name)" autocomplete="off" maxlength="8" ><small class="color-primary" id="smallczipcode"></small> </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-6">
                            <input required type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ" onfocus="msgsmall(this.name)"><small class="color-primary" id="smallccnpj"></small> </div>
                            <div class="col-md-6">
                              <input type="checkbox" id="no_cnpj" name="no_cnpj" onchange="ck_cnpj()"> <span class="color-primary">Atesto que sou Freelancer/Autônomo</span></div>
                        </div>
                        
                        <!--<div class="form-group row" >
                          <label style="text-align: left!important" class="col-lg-4">Horário de funcionamento</label>
                          <div class="col-md-3 col-3">
                            <input required type="time" class="form-control " name="start_hour"> </div>
                            <div class="col-md-2 col-2 color-primary">
                              <label class="control-label">às</label></div>
                            <div class="col-md-3 col-3">
                            <input required type="time" class="form-control " name="end_hour"> </div>
                        </div>--> 

                        <div class="row form-group">
                          <div class="col-md-12">
                            <select required id="categories" name="category" class="form-control selectpicker" onchange="getsubcategories()">
                              <option disabled="" selected="">Categoria</option>
                              <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
                              
                              <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-12" id="selectcategory">
                            <select required id="subcategories" name="idsubcategory[]" class="form-control selectpicker" multiple="">
                                <option>Subcategoria</option>
                            </select>
                          </div>
                        </div>

                        <label><input required type="checkbox">Declaro que li e aceito os <span class="color-success">termos de uso.</span></label>
                        <button onclick="back_form()" class="btn btn-raised btn-block">Voltar
                          <i class="zmdi zmdi-long-arrow-left no-mr ml-1"></i>
                        </button>
                        <button style="float:right" class="btn btn-raised btn-primary btn-block">Cadastrar
                          <i class="zmdi zmdi-long-arrow-right no-mr ml-1"></i>
                        </button>

                      </fieldset>

                      
                    </form>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="btn-back-top">
        <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
          <i class="zmdi zmdi-long-arrow-up"></i>
        </a>
      </div>
