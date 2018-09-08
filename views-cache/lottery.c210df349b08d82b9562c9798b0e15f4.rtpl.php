<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Material Style</title>
    <meta name="description" content="Material Style Theme">
    <link rel="shortcut icon" href="res/site/img/favicon.png?v=3">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="res/site/css/preload.min.css">
    <link rel="stylesheet" href="res/site/css/plugins.min.css">
    <link rel="stylesheet" href="res/site/css/style.light-blue-500.min.css">
    <!--[if lt IE 9]>
        <script src="res/site/js/html5shiv.min.js"></script>
        <script src="res/site/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <script language="Javascript"> 

  var YY = parseInt(<?php echo htmlspecialchars( $lottery["yy"], ENT_COMPAT, 'UTF-8', FALSE ); ?>);
  var MM = parseInt(<?php echo htmlspecialchars( $lottery["mm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>);
  var DD = parseInt(<?php echo htmlspecialchars( $lottery["dd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>);
  var HH = parseInt(<?php echo htmlspecialchars( $lottery["hh"], ENT_COMPAT, 'UTF-8', FALSE ); ?>);
  var MI = parseInt(<?php echo htmlspecialchars( $lottery["mi"], ENT_COMPAT, 'UTF-8', FALSE ); ?>);
  var SS = parseInt(<?php echo htmlspecialchars( $lottery["ss"], ENT_COMPAT, 'UTF-8', FALSE ); ?>);
  
  function atualizaContador(YY,MM,DD,HH,MI,SS) 
  {  
  var hoje = new Date();  
  var futuro = new Date(YY,MM-1,DD,HH,MI,SS);   
  var ss = parseInt((futuro - hoje) / 1000);  
  var mm = parseInt(ss / 60);  
  var hh = parseInt(mm / 60);  
  var dd = parseInt(hh / 24);   
  ss = ss - (mm * 60);  
  mm = mm - (hh * 60);  
  hh = hh - (dd * 24);   
  var faltam = '';  
  faltam += (dd && dd > 1) ? dd+' dias, ' : (dd==1 ? '1 dia, ' : '');  
  faltam += (toString(hh).length) ? hh+' hr, ' : '';  
  faltam += (toString(mm).length) ? mm+' min e ' : '';  
  faltam += ss+' seg';   

   if (dd+hh+mm+ss > 0) 
   {
    document.getElementById('contador').innerHTML = faltam; 
    setTimeout(atualizaContador,1000);
   }
   else
   {
    document.getElementById('faltam').innerHTML = 'CHEGOU!!!!'; 
    setTimeout(atualizaContador,1000);  
   }
  }

  click = 0;
  function share(){
    
    click++;
    return click;
  }

  function verifyShare(){

    click = share();
    if(click < 2){
      alert("É necessario compartilhar a publicação e marcar 3 amigos.");
      click = 0;
      event.preventDefault();
      return false;
    }else{
      return true;
    }
  }
</script>
  <body onload="atualizaContador()">
    <div id="ms-preload" class="ms-preload">
      <div id="status">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
    </div>
    <div class="bg-full-page ms-hero-img-coffee ms-hero-bg-primary ms-bg-fixed back-fixed">
      <div class="absolute-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-6">
              <div class="card card-flat bg-transparent">
                <div class="card-body color-white">
                  <header class="text-center mb-2">
                    <span class="ms-logo ms-logo-lg ms-logo-white center-block mb-2 animated zoomInDown animation-delay-5"><i class="fa fa-search"></i></span>
                    <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Busca
                      <span>qui</span>
                    </h1>
                    <h2>Como participar?</h2>
                    <p class="lead lead-xl mt-2 animated fadeInUp animation-delay-7">São apenas 4 passos para concorrer:</p>
                  </header>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="text-center card-body animated zoomIn animation-delay-10">
                        <span class="btn-circle btn-circle-raised btn-circle-white btn-circle-xlg color-danger">
                          <h2>1</h2>
                        </span>
                        <p class="">Preencha o formulário com seus dados.</p>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="text-center card-body animated zoomIn animation-delay-10">
                        <span class="btn-circle btn-circle-raised btn-circle-white btn-circle-xlg color-danger">
                          <h2>2</h2>
                        </span>
                        <p class="">Clique no botão "COMPARTILHAR".</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="text-center card-body animated zoomIn animation-delay-10">
                        <span class="btn-circle btn-circle-raised btn-circle-white btn-circle-xlg color-danger">
                          <h2>3</h2>
                        </span>
                        <p class="">Compartilhe a publicação e marque 3 amigos.</p>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="text-center card-body animated zoomIn animation-delay-10">
                        <span class="btn-circle btn-circle-raised btn-circle-white btn-circle-xlg color-danger">
                         <h2>4</h2>
                        </span>
                        <p class="">Clique no botão "CONCLUIR".</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="card index-1 animated zoomInRight animation-delay-7">
                <div class="card-body-big">
                  <h1 class="color-primary">Participe Agora!</h1>
                  <p class="lead">A cada 2 dias serão realizados sorteios de vales no valor de R$ 30,00 para você utilizar nos serviços de nossos anunciantes. Você vai perder?</p>
                  
                 <h2 class="text-center color-warning" id="faltam" >Faltam <span id="contador"></span></h2>
                  <h2 class="color-primary">Confirme sua participação</h2>

                  <form action="/registerparticipant" method="post" onsubmit="verifyShare();">
                    <div class="form-group label-floating mt-2 mb-1">
                      <div class="input-group center-block">
                        <label class="control-label" for="ms-desname">
                          <i class="zmdi zmdi-card"></i> Nome completo</label>
                        <input type="text" name="desname" id="ms-desname" class="form-control" required=""> </div>
                    </div>
                    <div class="form-group label-floating mt-2 mb-1">
                      <div class="input-group center-block">
                        <label class="control-label" for="ms-desemail">
                          <i class="zmdi zmdi-email"></i> Email</label>
                        <input type="email" name="desemail" id="ms-desemail" class="form-control" required=""> </div>
                    </div>
                    <div class="form-group label-floating mt-2 mb-1">
                      <div class="input-group center-block">
                        <label class="control-label" for="ms-nrcpfid">
                          <i class="zmdi zmdi-card"></i> CPF/ Identidade</label>
                        <input type="number" name="nrcpfid" id="ms-nrcpfid" class="form-control" required=""> </div>
                    </div>
                    <div class="form-group label-floating mt-2 mb-1">
                      <div class="input-group center-block">
                        <label class="control-label" for="ms-nrwhatsapp">
                          <i class="zmdi zmdi-whatsapp"></i> Whatsapp</label>
                        <input type="number" name="nrwhatsapp" id="ms-nrwhatsapp" class="form-control" required=""> </div>
                    </div>
                    <p class="color-primary">Clique abaixo para entrar na publicação e validar sua participação.</p>
                    <a href="https://www.facebook.com/ComidaCaseiraAdrianaeGilberto/photos/rpp.156985921518009/241819603034640/?type=3&theater" target="__blank">
                    <button onclick="share()" class="btn btn-raised btn-primary btn-block" type="button"><i class="zmdi zmdi-facebook"></i>COMPARTILHAR</button></a>
                    <button class="btn btn-raised btn-primary btn-block" type="submit">Concluir</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <p class="lead lead-sm text-center mt-4 color-medium animated fadeInUp animation-delay-16">Material Style &copy; Copyright 2016</p>
        </div>
      </div>
    </div>
    <script src="res/site/js/plugins.min.js"></script>
    <script src="res/site/js/app.min.js"></script>
    <script src="res/site/js/coming.js"></script>
  </body>
</html>