<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es_ES">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="NuLL" />
        <meta name="author" content="Arix Corp" />
        <title>Arix Shell V1.0</title>        
        <link rel="stylesheet" type="text/css" href="public/resources/css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="public/resources/css/material-icons.css"/>        
        <link rel="stylesheet" type="text/css" href="public/resources/js/dist/sweetalert2.min.css"/>

        <!--link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css"/-->
        <?php if(!empty($js[1])){for($i=0;$i<count($js[1]);$i++){echo '<link rel="stylesheet" type="text/css" href="'.$js[1][$i].'"/>'."\n";}}else{return;} ?>
   </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">   
            <a class="navbar-brand" href="#">
              <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Cargando ... <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-md-2 active" id="sucursal-db" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <small>Cargando ...</small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" id="sucursal-db-list" aria-labelledby="sucursal-db">
                        <a class="dropdown-item active" href="/docs/4.1/">Cargando ...</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="https://v4-alpha.google.com/">Mas información</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="javascript:;" id="dropdown-item-u1">Cargando ...</a>
                        <a class="dropdown-item" href="javascript:;" id="dropdown-item-u2">Cambiar contraseña</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:;" id="dropdown-item-u3">Cerrar Sesion</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Cargando ...</div>
                            <a class="nav-link active" href="javascript:;">
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>
                                Cargando ...
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Supported by</div>
                        &reg;Arix Corporation
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="navbar navbar-expand-sm navbar-light" style="background-color: #e9ecef; margin: 0 0 11px 0">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-idont-know" aria-controls="nav-idont-know" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="nav-idont-know">
                                <ul class="navbar-nav mr-auto mt-0 mt-lg-0" style="font-size: 1.1rem;" id="user-title-breadcrumb">
                                    <li class="breadcrumb-item active">Cargando ... </li>
                                </ul>
                                <ul class="navbar-nav mt-0 mt-lg-0">                           
                                    <li class="nav-item" id="nav-item-input-buscar">                                        
                                    </li>
                                    <li class="nav-item" id="nav-item-input-botones">
                                        <div class="btn-group btn-group-sm" id="xxx"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="use-container-secondary"></div>                           
                        <div id="use-container-primary"></div>                            
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Arix MEE (shell-v1.1, api-v2.0)</div>
                            <div>
                                <a href="#">Desarrolladores</a>
                                &middot;
                                <a href="#">Soporte técnico</a>
                                &middot;
                                <a href="#">Política de seguridad</a>
                                &middot;
                                <a href="#">Términos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div class="modal" id="arixgeneralmodal2"  tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5> <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer"></div>
                </div>
            </div>
        </div>
          <div class="modal" id="arixgeneralmodal"  tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="public/resources/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="public/resources/js/all.min.js"></script>
        <script type="text/javascript" src="public/resources/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="public/resources/js/scripts.js"></script>
        <script type="text/javascript" src="public/resources/js/dist/sweetalert2.min.js"></script>
        <script type="text/javascript" src="public/resources/js/arixshell.js"></script>

        <script type="text/javascript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
        <?php if(!empty($js[0])){for($i=0;$i<count($js[0]);$i++){echo '<script type="text/javascript" src="'.$js[0][$i].'" ></script>'."\n";}}else{return;} ?>
    </body>
</html>