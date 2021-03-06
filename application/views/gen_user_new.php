<div class="col-xl-12 col-md-12">
   <div class="row">
      <div class="col-lg-12">
         <div class="card text-white bg-secondary">
            <div class="card-header text-right">
               <h6 class="font-weight-light my-1">Nuevo Usuario</h6>
            </div>
            <div class="card-body">
               <form>
                  <div class="form-row">
                     <div class="col-md-3">
                        <div class="form-group">
                        	<img src="public/images/users/tu39hnri84fheg.png" alt="Victor CAxi" class="img-thumbnail mt-4">
                        </div>
                     </div>
                     <div class="col-md-9">
                     	<div class="form-group input-group-sm">
                        	<label class="small mb-0" for="in-document">Documento</label>
                        	<input class="form-control" id="in-document" name="txtdocument" type="text" placeholder="Número de documento"/>
                        </div>
                        <div class="form-group input-group-sm" style="margin-top: -0.7em">
                        	<label class="small mb-0 mt-2" for="in-names">Nombres</label>
                        	<input class="form-control" id="in-names" name="txtnames" type="text" placeholder="Nombres" />
                        </div>
                        <div class="form-row" style="margin-top: -0.7em">
							<div class="form-group input-group-sm col-md-6">
                        		<label class="small mb-0 mt-2" for="in-paterno">Apellido Paterno</label>
                        	<input class="form-control" id="in-paterno" name="txtpaterno" type="text" placeholder="Apellido Paterno"/>
                        	</div>
							<div class="form-group input-group-sm col-md-6">
	                        	<label class="small mb-0 mt-2" for="in-materno">Apellido Materno</label>
                        		<input class="form-control" id="in-materno" name="txtmaterno" type="text" placeholder="Apellido Materno"/>
							</div>
						</div>
                        <div class="form-row" style="margin-top: -0.7em">
							<div class="form-group input-group-sm col-md-6">
                        		<label class="small mb-0 mt-2" for="in-nacimiento">Fecha de Nacimiento</label>
                        		<input class="form-control" id="in-nacimiento" name="txtnacimiento" type="text" placeholder="día/mes/año"/>
                        	</div>
							<div class="form-group input-group-sm col-md-6">
	                        	<label class="small mb-0 mt-2" for="in-sexe">Sexo</label>
	                        	<select class="form-control form-control-sm" id="in-sexe" name="txtsexe">
								  <option>No definido</option>
								  <option>Masculino</option>
								  <option>Femenino</option>
								</select>
							</div>
						</div>
                        </div>
                     </div>
                     <div class="form-row" style="margin-top: -0.7em">
							<div class="form-group input-group-sm col-md-6">
                        		<label class="small mb-0 mt-2" for="in-email">Dirección de correo electrónico</label>
                        		<input class="form-control" id="in-email" name="txtcorreo" type="text" placeholder="Dirección de correo electrónico"/>
                        	</div>
                        	<div class="form-group input-group-sm col-md-6">
                        		<label class="small mb-0 mt-2" for="in-phone">Número de telefono</label>
                        		<input class="form-control" id="in-phone" type="text" placeholder="Número de telefono"/>
                        	</div>
						</div>                
                  	<div class="form-group input-group-sm" style="margin-top: -0.7em">
                       	<label class="small mb-0 mt-2" for="in-address">Dirección de domicilo</label>
                       	<input class="form-control" id="in-address" name="txtaddress" type="text" placeholder="Dirección de domicilo" />
                    </div>
                    <div class="form-row" style="margin-top: -0.7em">							
							<div class="form-group input-group-sm col-md-4">
	                        	<label class="small mb-0 mt-2" for="in-departamento">Departamento</label>
	                        	<select class="form-control form-control-sm" id="in-departamento" name="txtdepartamento">
								  <option>No definido</option>
								  <option>Masculino</option>
								  <option>Femenino</option>
								</select>
							</div>
							<div class="form-group input-group-sm col-md-4">
	                        	<label class="small mb-0 mt-2" for="in-provincia">Provincia</label>
	                        	<select class="form-control form-control-sm" id="in-provincia" name="txtprovincia">
								  <option>No definido</option>
								  <option>Masculino</option>
								  <option>Femenino</option>
								</select>
							</div>
							<div class="form-group input-group-sm col-md-4">
	                        	<label class="small mb-0 mt-2" for="in-distrito">Distrito</label>
	                        	<select class="form-control form-control-sm" id="in-distrito" name="txtdistrito">
								  <option>No definido</option>
								  <option>Masculino</option>
								  <option>Femenino</option>
								</select>
							</div>
					</div>
               </form>
            </div>
            <div class="card-footer text-center">
               <div class="small"><a href="www.google.com">Terminos de uso de éste formulario</a></div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
	$('.card-header').html(arixshell_cargar_boton_simple('btn-guardar'));
</script>

<div class="row gutters-sm">
    <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>John Doe</h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">https://bootdey.com</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">@bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Kenneth Valdez
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      fip@jukmuh.al
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (239) 816-9029
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (320) 380-4539
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Bay Area, San Francisco, CA
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-5 col-md-12">
                <div class="card user-activity-card">
                    <div class="card-header">
                        <h5>User Activity</h5>
                    </div>
                    <div class="card-block">
                        <div class="row m-b-25">
                            <div class="col-auto p-r-0">
                                <div class="u-img"> <img src=" https://i.imgur.com/UIhwGhr.jpg" alt="user image" class="img-radius cover-img"> <img src="https://img.icons8.com/ultraviolet/40/000000/active-state.png" alt="user image" class="img-radius profile-img"> </div>
                            </div>
                            <div class="col">
                                <h6 class="m-b-5">Timothy Husai</h6>
                                <p class="text-muted m-b-0">For what reason would it be advisable.</p>
                                <p class="text-muted m-b-0"><i class="mdi mdi-timer feather icon-clock m-r-10"></i>24 min ago</p>
                            </div>
                        </div>
                        <div class="row m-b-25">
                            <div class="col-auto p-r-0">
                                <div class="u-img"> <img src="https://i.imgur.com/rAInTHU.jpg" alt="user image" class="img-radius cover-img"> <img src="https://img.icons8.com/office/16/000000/active-state.png" alt="user image" class="img-radius profile-img"> </div>
                            </div>
                            <div class="col">
                                <h6 class="m-b-5">Simkil Ahleu</h6>
                                <p class="text-muted m-b-0">That might be little bit risky to have crew</p>
                                <p class="text-muted m-b-0"><i class="mdi mdi-timer feather icon-clock m-r-10"></i>12 hours ago</p>
                            </div>
                        </div>
                        <div class="row m-b-25">
                            <div class="col-auto p-r-0">
                                <div class="u-img"> <img src="https://i.imgur.com/rAInTHU.jpg" alt="user image" class="img-radius cover-img"> <img src="https://img.icons8.com/office/16/000000/active-state.png" alt="user image" class="img-radius profile-img"> </div>
                            </div>
                            <div class="col">
                                <h6 class="m-b-5">John Deo</h6>
                                <p class="text-muted m-b-0">For what reason would it be advisable</p>
                                <p class="text-muted m-b-0"><i class="mdi mdi-timer feather icon-clock m-r-10"></i>2 min ago</p>
                            </div>
                        </div>
                        <div class="row m-b-25">
                            <div class="col-auto p-r-0">
                                <div class="u-img"> <img src=" https://i.imgur.com/UIhwGhr.jpg" alt="user image" class="img-radius cover-img"> <img src="https://img.icons8.com/ultraviolet/40/000000/active-state.png" alt="user image" class="img-radius profile-img"> </div>
                            </div>
                            <div class="col">
                                <h6 class="m-b-5">John Deo</h6>
                                <p class="text-muted m-b-0">member like them. For what reason.</p>
                                <p class="text-muted m-b-0"><i class="mdi mdi-timer feather icon-clock m-r-10"></i>12 min ago</p>
                            </div>
                        </div>
                        <div class="text-center"> <a href="#!" class="b-b-primary text-primary" data-abc="true">View all Projects</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>