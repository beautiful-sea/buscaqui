<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>All</title>
    <meta name="description" content="All">

    <link rel="shortcut icon" href="/res/site/img/favicon.png?v=3">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/res/site/css/preload.min.css">
    <link rel="stylesheet" href="/res/site/css/plugins.min.css">
    <link rel="stylesheet" href="/res/site/css/style.grey-800.min.css">
    <link rel="stylesheet" type="text/css" href="/res/site/autocomplete/easy-autocomplete.css">
    <!--[if lt IE 9]>
        <script src="/res/site/js/html5shiv.min.js"></script>
        <script src="/res/site/js/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .panel{
        padding: 10px;
        margin: 10px;
      }
    </style>
  </head>
  <body id="body">

    <!-- Modal -->
    <div class="modal modal-warning" id="modalBusiness" tabindex="-1" style="z-index: 9999" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog animated zoomIn animated-3x" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title color-primary" id="modalBusinessLabel" style="text-align: center"><strong>Já possui um negócio cadastrado?</strong></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                </div>
                <div class="modal-footer" style="display: inline-block;">
                  <a href="/eregister">
                    <button type="button" class="btn btn-danger">Não, quero cadastrar</button></a>
                  <a href="/admin/login">
                    <button type="button" class="btn  btn-success">Possuo Cadastro</button></a>
                </div>
            </div>
        </div>
    </div>

    <div id="ms-preload" class="ms-preload">
      <div id="status">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
    </div>
    <div class="ms-site-container ms-nav-fixed"  >
      <nav class="navbar navbar-expand-md navbar-fixed ms-lead-navbar navbar-mode navbar-mode mb-0" id="navbar-lead">
        <div class="container container-full">
          <div class="navbar-header">
            <div class="navbar-brand">  
              <!-- <img src="/res/site/img/demo/logo-navbar.png" alt=""> -->
                <input type="text" name="brandlocation" id="brandlocation" class="form-control" style="background-image: none">
            </div>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <!-- Links da NAVBAR -->
            </ul>
          </div>
          <!-- navbar-collapse collapse -->
          <a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu" id="menu">
            <i class="zmdi zmdi-menu"></i>
          </a>
        </div>
        <!-- container -->
      </nav>