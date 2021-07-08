<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-xl-12">
      <div class="card border-light mb-4">
         <div class="card-body">
         	<table class="table table-dark table-sm">
			  <tbody>
			    <tr>
			      <th scope="row">RUC:</th>
			      <td>49504403858695</td>
			      <th scope="row">Razon Social</th>
			      <td>Chothes and more S.A.C.</td>
			    </tr>
			    <tr>
			      <th colspan="2" scope="row">Dirección Fiscal (Notificaciones):</th>
			      <td colspan="2">Jr. Acora 123 LT 23 Puno Perú</td>
			    </tr>
			    <tr>
			      <th scope="row">Nombre:</th>
			      <td>Shopday Cede Central</td>
			      <th scope="row">Categoría:</th>
			      <td>Venta en general de productos no perecibles</td>
			    </tr>
			    <tr>
			      <th scope="row">Direccion:</th>
			      <td>Jr. Acora 123 LT 23</td>
			      <th scope="row">Ubicación:</th>
			      <td>PUNO - EL COLLAO - ILAVE</td>
			    </tr>
			    <tr>
			      <th scope="row">Licencia:</th>
			      <td>0003764-MPCI</td>
			      <th scope="row">Administrador:</th>
			      <td>Flavia Caxi Alvarado</td>
			    </tr>
			    <tr>
			      <th scope="row">Teléfono:</th>
			      <td>968991714</td>
			      <th scope="row">Sitio Web:</th>
			      <td>https://es-la.facebook.com/</td>
			    </tr>
			  </tbody>
			</table>		   
         </div>
      </div>
   </div>
   
   <div class="col-xl-6">
      <div class="card bg-light mb-4">
         <div class="card-header">VENTAS SEMANALES</div>
         <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="40"></canvas>
         </div>
      </div>
   </div>
   <div class="col-xl-6">
      <div class="card bg-light mb-4">
         <div class="card-header">VENTAS MENSUALES</div>
         <div class="card-body">
            <canvas id="myBarChart" width="100%" height="40"></canvas>
         </div>
      </div>
   </div>
   <div class="col-xl-12">
      <div class="card text-white bg-primary mb-4">
         <div class="card-header">GANACIAS ANTERIORES</div>
         <div class="card-body">
         	<table class="table table-sm text-white">
			  <thead>
			     <tr>
			      <th scope="col">Fecha</th>
			      <th scope="col">Compras</th>
			      <th scope="col">Ventas</th>
			      <th scope="col">Ganancias</th>
			      <th scope="col">Responsable</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Mark</td>
			      <td>Otto</td>
			      <td>@mdo</td>
			      <td>@mdo</td>
			    </tr>
			    <tr>
			      <th scope="row">2</th>
			      <td>Jacob</td>
			      <td>Thornton</td>
			      <td>@fat</td>
			      <td>@mdo</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td colspan="2">Larry the Bird</td>
			      <td>@twitter</td>
			      <td>@mdo</td>			      
			    </tr>
			  </tbody>
			</table>
         </div>
      </div>
   </div>
   <div class="col-xl-5">
      <div class="card mb-4">
         <div class="card-header">DEPARTAMENTOS (ÁREAS) DE LA SUCURSAL</div>
         <div class="card-body">
         	<table class="table table-sm text-white">
			  <thead>
			    <tr>
			      <th scope="col">Código</th>
			      <th scope="col">Nombre</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Mark</td>
			    </tr>
			    <tr>
			      <th scope="row">2</th>
			      <td>Jacob</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td colspan="2">Larry the Bird</td>
			      
			    </tr>
			  </tbody>
			</table>
         </div>
      </div>
   </div>
   <div class="col-xl-7">
      <div class="card text-white bg-info mb-4">
         <div class="card-header">EMPLEADOS DE LA SUCURSAL</div>
         <div class="card-body">
         	<table class="table table-sm text-white">
			  <thead>
			    <tr>
			      <th scope="col">Código</th>
			      <th scope="col">Nombres</th>
			      <th scope="col">Apellidos</th>
			      <th scope="col">Cargo</th>
			      <th scope="col">Usuario</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Mark</td>
			      <td>Otto</td>
			      <td>@mdo</td>
			      <td>@mdo</td>
			    </tr>
			    <tr>
			      <th scope="row">2</th>
			      <td>Jacob</td>
			      <td>Thornton</td>
			      <td>@fat</td>
			      <td>@mdo</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td colspan="2">Larry the Bird</td>
			      <td>@twitter</td>
			      <td>@mdo</td>
			    </tr>
			  </tbody>
			</table>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	arixshell_iniciar_llaves_locales("#btn_id_empresa_view");
    arixshell_cargar_botones_menu('btn-atras, btn-imprimir');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-atras", function() {
        arixshell_hacer_pagina_atras();
    });
}); 
</script>