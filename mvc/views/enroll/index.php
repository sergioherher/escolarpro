<div class="row">

	<div class="col-12">
	
		<div class="container">

			<div class="row">

				<div class="col-12">

					<div class="box">

					  	<div class="box-header">

					  	  <h4 class="box-title">Formulario de inscripción</h4>

					  	</div>

					  	<div class="box-body">

					  		 <?php if(isset($_SESSION['message_error'])) { 

					  		 	echo $_SESSION['message_error'];

					  		 }?>

					  		<form id="formRegistrarAspirante" method="POST" action="<?php echo base_url('enroll/index') ?>">

					  			<div class="row">

					  				<div class="col-md-4">

							  			<h5>1.- Datos de identificación</h5>

						  			</div>

						  		</div>

						  		<hr>

					  			<div class="row">

					  				<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="nombres">Nombres del aspirante</label>

							  				<input type="text" class="form-control" id="nombres" name="nombres"  value="<?=(array_key_exists('nombres',$old))?$old['nombres']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="apellido1">Primer Apellido</label>

							  				<input type="text" class="form-control" id="apellido1" name="apellido1"  value="<?=(array_key_exists('apellido1',$old))?$old['apellido1']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="apellido2">Segundo Apellido</label>

							  				<input type="text" class="form-control" id="apellido2" name="apellido2"  value="<?=(array_key_exists('apellido2',$old))?$old['apellido2']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

					  				<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="documento">Documento de identificación</label>

							  				<input type="text" class="form-control" id="documento" name="documento"  value="<?=(array_key_exists('documento',$old))?$old['documento']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label">Tipo de documento</label>

							  				<div class="form-check">

												<input class="form-check-input" type="radio" name="tipo_dcto" id="tipo_dcto_1" value="Cédula Ciudadanía" checked>

												<label class="form-check-label" for="tipo_dcto_1">

													Tarjeta de Identidad

												</label>

											</div>

											<div class="form-check">

												<input class="form-check-input" type="radio" name="tipo_dcto" id="tipo_dcto_2" value="Registro Civil">

												<label class="form-check-label" for="tipo_dcto_2">

													Registro Civil

												</label>

											</div>

											<div class="form-check">

												<input class="form-check-input" type="radio" name="tipo_dcto" id="tipo_dcto_3" value="Cédula Ciudadanía">
												<label class="form-check-label" for="tipo_dcto_3">Cédula Ciudadanía</label>
											</div>

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label">Sexo</label>

							  				<div class="form-check">

												<input class="form-check-input" type="radio" name="sexo" id="sexo_1" value="Masculino" checked>

												<label class="form-check-label" for="sexo_1">

													Masculino

												</label>

											</div>

											<div class="form-check">

												<input class="form-check-input" type="radio" name="sexo" id="sexo_2" value="Femenino">

												<label class="form-check-label" for="sexo_2">

													Femenino

												</label>

											</div>

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

					  				<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="fecha_nac">Fecha de nacimiento</label>

							  				<input readonly type="text" class="form-control" id="fecha_nac" name="fecha_nac"  value="<?=(array_key_exists('fecha_nac',$old))?$old['fecha_nac']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="pais_nac">País de nacimiento</label>

							  				<input type="text" class="form-control" id="pais_nac" name="pais_nac"  value="<?=(array_key_exists('pais_nac',$old))?$old['pais_nac']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="dpto_nac">Departamento de nacimiento</label>

							  				<input type="text" class="form-control" id="depto_nac" name="depto_nac"  value="<?=(array_key_exists('depto_nac',$old))?$old['depto_nac']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

					  				<div class="col-md-3">

							  			<div class="form-group">

							  				<label class="form-label" for="ciudad_nac">Ciudad de nacimiento</label>

							  				<input type="text" class="form-control" id="ciudad_nac" name="ciudad_nac"  value="<?=(array_key_exists('ciudad_nac',$old))?$old['ciudad_nac']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-6">

							  			<div class="form-group">

							  				<label class="form-label" for="direccion">Dirección</label>

							  				<textarea rows="2" class="form-control" id="direccion" name="direccion"><?=(array_key_exists('direccion',$old))?$old['direccion']:''?></textarea>

							  			</div>

						  			</div>

						  			<div class="col-md-3">

							  			<div class="form-group">

							  				<label class="form-label" for="barrio">Barrio</label>

							  				<input type="text" class="form-control" id="barrio" name="barrio"  value="<?=(array_key_exists('barrio',$old))?$old['barrio']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="telefono1">Teléfono 1</label>

							  				<input type="text" class="form-control" id="telefono1" name="telefono1"  value="<?=(array_key_exists('telefono1',$old))?$old['telefono1']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="telefono2">Teléfono 2</label>

							  				<input type="text" class="form-control" id="telefono2" name="telefono2"  value="<?=(array_key_exists('telefono2',$old))?$old['telefono2']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

										    <label for="grado_aspira">Grado al que aspira</label>

										    <select class="form-control" id="grado_aspira" name="grado_aspira">

										    		<option value="">Seleccione</option>

										      	<?php foreach ($classes as $key => $class) { ?>

													<option <?php if(array_key_exists('grado_aspira',$old) && $old['grado_aspira'] == $class->classesID) echo 'selected'; else echo ''; ?> value="<?=$class->classesID?>"><?=$class->classes?></option>

										      	<?php } ?>

										    </select>

										 </div>

						  			</div>

						  		</div>

						  		<hr>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<h6>2.- Datos Escolares</h6>

						  			</div>

						  		</div>

						  		<hr>

						  		<div class="row">

						  			<div class="col-md-6">

							  			<div class="form-group">

							  				<label class="form-label" for="ante_instit">Institución anterior</label>

							  				<input type="text" class="form-control" id="ante_instit" name="ante_instit"  value="<?=(array_key_exists('ante_instit',$old))?$old['ante_instit']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-6">

							  			<div class="form-group">

							  				<label class="form-label" for="ante_instit_dir">Dirección de la institución</label>

							  				<input type="text" class="form-control" id="ante_instit_dir" name="ante_instit_dir"  value="<?=(array_key_exists('ante_instit_dir',$old))?$old['ante_instit_dir']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-3">

							  			<div class="form-group">

							  				<label class="form-label" for="ante_instit_tel">Teléfono de la institución</label>

							  				<input type="text" class="form-control" id="ante_instit_tel" name="ante_instit_tel"  value="<?=(array_key_exists('ante_instit_tel',$old))?$old['ante_instit_tel']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-3">

							  			<div class="form-group">

							  				<label class="form-label" for="ante_grado">Grado cursado</label>

							  				<input type="text" class="form-control" id="ante_grado" name="ante_grado"  value="<?=(array_key_exists('ante_grado',$old))?$old['ante_grado']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-3">

							  			<div class="form-group">

							  				<label class="form-label" for="ante_fecha_ret">Fecha de retiro</label>

							  				<input type="text" readonly class="form-control" id="ante_fecha_ret" name="ante_fecha_ret"  value="<?=(array_key_exists('ante_fecha_ret',$old))?$old['ante_fecha_ret']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-3">

							  			<div class="form-group">

							  				<label class="form-label" for="tiempoinstit">Tiempo en la institución</label>

							  				<input type="text" class="form-control" id="tiempoinstit" name="tiempoinstit"  value="<?=(array_key_exists('tiempoinstit',$old))?$old['tiempoinstit']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<hr>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<h6>3.- Datos Familiares</h6>

						  			</div>

						  		</div>

						  		<hr>

						  		<div class="row" style="margin-bottom: 20px">

						  			<div class="col-md-4">

							  			<h6>3.1.- Datos de la Madre</h6>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="madre">Nombres y apellidos</label>

							  				<input type="text" class="form-control" id="madre" name="madre" value="<?=(array_key_exists('madre',$old))?$old['madre']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="madre_document">Documento de identificación</label>

							  				<input type="text" class="form-control" id="madre_document" name="madre_document" value="<?=(array_key_exists('madre_document',$old))?$old['madre_document']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="madre_edad">Edad</label>

							  				<input type="number" class="form-control" id="madre_edad" name="madre_edad" value="<?=(array_key_exists('madre_edad',$old))?$old['madre_edad']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="madre_prof">Profesión</label>

							  				<input type="text" class="form-control" id="madre_prof" name="madre_prof" value="<?=(array_key_exists('madre_prof',$old))?$old['madre_prof']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="madre_empresa">Lugar de trabajo</label>

							  				<input type="text" class="form-control" id="madre_empresa" name="madre_empresa" value="<?=(array_key_exists('madre_empresa',$old))?$old['madre_empresa']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="madre_cargo">Cargo</label>

							  				<input type="text" class="form-control" id="madre_cargo" name="madre_cargo" value="<?=(array_key_exists('madre_cargo',$old))?$old['madre_cargo']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="madre_tel_ofi">Teléfono de oficina</label>

							  				<input type="text" class="form-control" id="madre_tel_ofi" name="madre_tel_ofi" value="<?=(array_key_exists('madre_tel_ofi',$old))?$old['madre_tel_ofi']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="madre_tel_per">Teléfono personal</label>

							  				<input type="text" class="form-control" id="madre_tel_per" name="madre_tel_per" value="<?=(array_key_exists('madre_tel_per',$old))?$old['madre_tel_per']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="madre_email">Email</label>

							  				<input type="text" class="form-control" id="madre_email" name="madre_email" value="<?=(array_key_exists('madre_email',$old))?$old['madre_email']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<hr>

						  		<div class="row" style="margin-bottom: 20px">

						  			<div class="col-md-4">

							  			<h6>3.2.- Datos del Padre</h6>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="padre">Nombres y apellidos</label>

							  				<input type="text" class="form-control" id="padre" name="padre" value="<?=(array_key_exists('padre',$old))?$old['padre']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="padre_document">Documento de identificación</label>

							  				<input type="text" class="form-control" id="padre_document" name="padre_document" value="<?=(array_key_exists('padre_document',$old))?$old['padre_document']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="padre_edad">Edad</label>

							  				<input type="number" class="form-control" id="padre_edad" name="padre_edad" value="<?=(array_key_exists('padre_edad',$old))?$old['padre_edad']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="padre_prof">Profesión</label>

							  				<input type="text" class="form-control" id="padre_prof" name="padre_prof" value="<?=(array_key_exists('padre_prof',$old))?$old['padre_prof']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="padre_empresa">Lugar de trabajo</label>

							  				<input type="text" class="form-control" id="padre_empresa" name="padre_empresa" value="<?=(array_key_exists('padre_empresa',$old))?$old['padre_empresa']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="padre_cargo">Cargo</label>

							  				<input type="text" class="form-control" id="padre_cargo" name="padre_cargo" value="<?=(array_key_exists('padre_cargo',$old))?$old['padre_cargo']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="padre_tel_ofi">Teléfono de oficina</label>

							  				<input type="text" class="form-control" id="padre_tel_ofi" name="padre_tel_ofi" value="<?=(array_key_exists('padre_tel_ofi',$old))?$old['padre_tel_ofi']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="padre_tel_per">Teléfono personal</label>

							  				<input type="text" class="form-control" id="padre_tel_per" name="padre_tel_per" value="<?=(array_key_exists('padre_tel_per',$old))?$old['padre_tel_per']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="padre_email">Email</label>

							  				<input type="text" class="form-control" id="padre_email" name="padre_email" value="<?=(array_key_exists('padre_email',$old))?$old['padre_email']:''?>">

							  			</div>

						  			</div>

						  		</div><hr>

						  		<div class="row" style="margin-bottom: 20px">

						  			<div class="col-md-4">

							  			<h6>3.3.- Datos del Representante</h6>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="parent_name">Nombres y apellidos</label>

							  				<input type="text" class="form-control" id="parent_name" name="parent_name" value="<?=(array_key_exists('parent_name',$old))?$old['parent_name']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="parent_dni">Documento de identificación</label>

							  				<input type="text" class="form-control" id="parent_dni" name="parent_dni" value="<?=(array_key_exists('parent_dni',$old))?$old['parent_dni']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="parent_profession">Profesión</label>

							  				<input type="text" class="form-control" id="parent_profession" name="parent_profession" value="<?=(array_key_exists('parent_profession',$old))?$old['parent_profession']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="parent_address">Dirección</label>

							  				<input type="text" class="form-control" id="parent_address" name="parent_address" value="<?=(array_key_exists('parent_address',$old))?$old['parent_address']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="parent_phone">Teléfono</label>

							  				<input type="text" class="form-control" id="parent_phone" name="parent_phone" value="<?=(array_key_exists('parent_phone',$old))?$old['parent_phone']:''?>">

							  			</div>

						  			</div>

						  			<div class="col-md-4">

							  			<div class="form-group">

							  				<label class="form-label" for="parent_email">Email</label>

							  				<input type="text" class="form-control" id="parent_email" name="parent_email" value="<?=(array_key_exists('parent_email',$old))?$old['parent_email']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<hr>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<h6>4.- Historia Personal</h6>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="desarrollo_fisico">Desarrollo físico</label>

							  				<input type="text" class="form-control" id="desarrollo_fisico" name="desarrollo_fisico" value="<?=(array_key_exists('desarrollo_fisico',$old))?$old['desarrollo_fisico']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<hr>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<h6>5.- Desarrollo psicológico</h6>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="desarrollo_psicologico_lenguaje">Lenguaje:</label>

							  				<input type="text" class="form-control" id="desarrollo_psicologico_lenguaje" name="desarrollo_psicologico_lenguaje" value="<?=(array_key_exists('desarrollo_psicologico_lenguaje',$old))?$old['desarrollo_psicologico_lenguaje']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="desarrollo_psicologico_aprendizaje">Aprendizaje:</label>

							  				<input type="text" class="form-control" id="desarrollo_psicologico_aprendizaje" name="desarrollo_psicologico_aprendizaje" value="<?=(array_key_exists('desarrollo_psicologico_aprendizaje',$old))?$old['desarrollo_psicologico_aprendizaje']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="desarrollo_psicologico_comportamiento">Comportamiento:</label>

							  				<input type="text" class="form-control" id="desarrollo_psicologico_comportamiento" name="desarrollo_psicologico_comportamiento" value="<?=(array_key_exists('desarrollo_psicologico_comportamiento',$old))?$old['desarrollo_psicologico_comportamiento']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="desarrollo_psicologico_afecto">Afecto:</label>

							  				<input type="text" class="form-control" id="desarrollo_psicologico_afecto" name="desarrollo_psicologico_afecto" value="<?=(array_key_exists('desarrollo_psicologico_afecto',$old))?$old['desarrollo_psicologico_afecto']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="desarrollo_psicologico_autocuidado">Autocuidado:</label>

							  				<input type="text" class="form-control" id="desarrollo_psicologico_autocuidado" name="desarrollo_psicologico_autocuidado" value="<?=(array_key_exists('desarrollo_psicologico_autocuidado',$old))?$old['desarrollo_psicologico_autocuidado']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="desarrollo_psicologico_remisiones">Remisiones:</label>

							  				<input type="text" class="form-control" id="desarrollo_psicologico_remisiones" name="desarrollo_psicologico_remisiones" value="<?=(array_key_exists('desarrollo_psicologico_remisiones',$old))?$old['desarrollo_psicologico_remisiones']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<hr>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<h6>6.- Antecedentes Familiares</h6>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="ante_flia_nucleo_familiar">Nucleo familiar:</label>

							  				<input type="text" class="form-control" id="ante_flia_nucleo_familiar" name="ante_flia_nucleo_familiar" value="<?=(array_key_exists('ante_flia_nucleo_familiar',$old))?$old['ante_flia_nucleo_familiar']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

						  				<div class="form-group">

							  				<label class="form-label">Estado civil de los padres: </label>

							  				<div class="form-check form-check-inline">

												<input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_1" value="Casados" <?=(array_key_exists('ante_flia_estado_civil_padres',$old) && $old['ante_flia_estado_civil_padres'] == "Casados")?'checked':'checked'?>>

												<label class="form-check-label" for="ante_flia_estado_civil_padres_1">

													Casados

												</label>

											</div>

											<div class="form-check form-check-inline">

												<input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_2" value="Divorciados" <?=(array_key_exists('ante_flia_estado_civil_padres',$old) && $old['ante_flia_estado_civil_padres'] == "Divorciados")?'checked':''?>>

												<label class="form-check-label" for="ante_flia_estado_civil_padres_2">

													Divorciados

												</label>

											</div>

											<div class="form-check form-check-inline">

												<input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_3" value="Separados" <?=(array_key_exists('ante_flia_estado_civil_padres',$old) && $old['ante_flia_estado_civil_padres'] == "Separados")?'checked':''?>>

												<label class="form-check-label" for="ante_flia_estado_civil_padres_3">

													Separados

												</label>

											</div>

											<div class="form-check form-check-inline">

												<input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_4" value="Unión Libre" <?=(array_key_exists('ante_flia_estado_civil_padres',$old) && $old['ante_flia_estado_civil_padres'] == "Unión Libre")?'checked':''?>>

												<label class="form-check-label" for="ante_flia_estado_civil_padres_4">

													Unión Libre

												</label>

											</div>

											<div class="form-check form-check-inline">

												<input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_5" value="Otro" <?=(array_key_exists('ante_flia_estado_civil_padres',$old) && $old['ante_flia_estado_civil_padres'] == "Otro")?'checked':''?>>

												<label class="form-check-label" for="ante_flia_estado_civil_padres_5">

													Otro

												</label>

											</div>

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="ante_flia_relacion_entre_padres">Relación entre padres:</label>

							  				<input type="text" class="form-control" id="ante_flia_relacion_entre_padres" name="ante_flia_relacion_entre_padres" value="<?=(array_key_exists('ante_flia_relacion_entre_padres',$old))?$old['ante_flia_relacion_entre_padres']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="ante_flia_relacion_con_hermanos">Relación con hermanos:</label>

							  				<input type="text" class="form-control" id="ante_flia_relacion_con_hermanos" name="ante_flia_relacion_con_hermanos" value="<?=(array_key_exists('ante_flia_relacion_con_hermanos',$old))?$old['ante_flia_relacion_con_hermanos']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<hr>

						  		<div class="row">

						  			<div class="col-md-4">

							  			<h6>7.- Historia escolar</h6>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="hist_escolar_proc_academico">Proceso académico:</label>

							  				<input type="text" class="form-control" id="hist_escolar_proc_academico" name="hist_escolar_proc_academico" value="<?=(array_key_exists('hist_escolar_proc_academico',$old))?$old['hist_escolar_proc_academico']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="hist_escolar_relacion_companieros">Relación con sus compañeros:</label>

							  				<input type="text" class="form-control" id="hist_escolar_relacion_companieros" name="hist_escolar_relacion_companieros" value="<?=(array_key_exists('hist_escolar_relacion_companieros',$old))?$old['hist_escolar_relacion_companieros']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="hist_escolar_relacion_docentes">Relación con sus docentes:</label>

							  				<input type="text" class="form-control" id="hist_escolar_relacion_docentes" name="hist_escolar_relacion_docentes" value="<?=(array_key_exists('hist_escolar_relacion_docentes',$old))?$old['hist_escolar_relacion_docentes']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="hist_escolar_comportamiento_escolar">Comportamiento escolar:</label>

							  				<input type="text" class="form-control" id="hist_escolar_comportamiento_escolar" name="hist_escolar_comportamiento_escolar" value="<?=(array_key_exists('hist_escolar_comportamiento_escolar',$old))?$old['hist_escolar_comportamiento_escolar']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="hist_escolar_razones_windsor">¿Por qué Windsor?</label>

							  				<input type="text" class="form-control" id="hist_escolar_razones_windsor" name="hist_escolar_razones_windsor" value="<?=(array_key_exists('hist_escolar_razones_windsor',$old))?$old['hist_escolar_razones_windsor']:''?>">

							  			</div>

						  			</div>

						  		</div>

						  		<hr>

						  		<div class="row">

						  			<div class="col-md-12">

							  			<div class="form-group">

							  				<label class="form-label" for="observaciones">Observaciones</label>

							  				<textarea rows="5" class="form-control" id="observaciones" name="observaciones"><?=(array_key_exists('observaciones',$old))?$old['observaciones']:''?></textarea>

							  			</div>

						  			</div>

						  		</div>

						  		<div class="row">

						  			<div class="col-md-10"></div>

						  			<div class="col-md-2">

							  			<div class="form-group">

							  				<button class="form-control btn btn-success registrar_aspirante">Registrar</button>

							  			</div>

						  			</div>

						  		</div>

					  		</form>

					  	</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<script type="text/javascript" src="<?php echo base_url('assets/lesson/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datepicker/datepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datepicker/es.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/validate/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/validate/additional-methods.min.js'); ?>"></script>

<script type="text/javascript">

	"use strict";
	var valGetParentContainer = function(element) {
	    var element = $(element);

	    if ($(element).closest('.form-group-sub').length > 0) {
	        return $(element).closest('.form-group-sub')
	    } else if ($(element).closest('.bootstrap-select').length > 0) {
	        return $(element).closest('.bootstrap-select')
	    } else {
	        return $(element).closest('.form-group');
	    }
	}

	$(document).ready(function(){

		jQuery.validator.setDefaults({
		    errorElement: 'div', //default input error message container
		    focusInvalid: false, // do not focus the last invalid input
		    ignore: "",  // validate all fields including form hidden input

		    errorPlacement: function(error, element) { // render error placement for each input type
		        var element = $(element);

		        var group = valGetParentContainer(element);
		        var help = group.find('.form-text');

		        if (group.find('.valid-feedback, .invalid-feedback').length !== 0) {
		            return;
		        }

		        element.addClass('is-invalid');
		        error.addClass('invalid-feedback');

		        if (help.length > 0) {
		            help.before(error);
		        } else {
		            if (element.closest('.bootstrap-select').length > 0) {     //Bootstrap select
		                element.closest('.bootstrap-select').find('.bs-placeholder').after(error);
		            } else if (element.closest('.input-group').length > 0) {   //Bootstrap group
		                element.after(error);
		            } else {                                                   //Checkbox & radios
		                if (element.is(':checkbox')) {
		                    element.closest('.kt-checkbox').find('> span').after(error);
		                } else {
		                    element.after(error);
		                }                
		            }            
		        }
		    },

		    highlight: function(element) { // hightlight error inputs
		        var group = valGetParentContainer(element);
		        group.addClass('validate');
		        group.addClass('is-invalid');
		        $(element).removeClass('is-valid');
		    },

		    unhighlight: function(element) { // revert the change done by hightlight
		        var group = valGetParentContainer(element);
		        group.removeClass('validate'); 
		        group.removeClass('is-invalid'); 
		        $(element).removeClass('is-invalid');
		    },

		    success: function(label, element) {
		        var group = valGetParentContainer(element);
		        group.removeClass('validate');
		        group.find('.invalid-feedback').remove();
		    }
		});

		jQuery.extend(jQuery.validator.messages, {
		    required: "Este campo es requerido",
		    remote: "Please fix this field.",
		    email: "Por favor ingrese una dirección de email válida.",
		    url: "Please enter a valid URL.",
		    date: "Please enter a valid date.",
		    dateISO: "Please enter a valid date (ISO).",
		    number: "Please enter a valid number.",
		    digits: "Please enter only digits.",
		    creditcard: "Please enter a valid credit card number.",
		    equalTo: "Please enter the same value again.",
		    accept: "Please enter a value with a valid extension.",
		    maxlength: jQuery.validator.format("Por favor escriba menos de {0} caracteres incluidos espacios."),
		    minlength: jQuery.validator.format("Por favor escriba al menos {0} caracteres."),
		    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
		    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
		    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
		    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
		});

		$('#fecha_nac').datepicker({
			format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "bottom left",
            language: "es"
        });

        $('#ante_fecha_ret').datepicker({
			format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "bottom left",
            language: "es"
        });

        var form = $('#formRegistrarAspirante');
	        form.validate({
	            rules: {
	            	parent_name: {
	                    required: true,
	                    maxlength: 80
	                },
	            	parent_phone: {
	                    required: true,
	                    maxlength: 80
	                },
	            	parent_email: {
	                    required: true,
	                    maxlength: 80
	                },
	            	parent_address: {
	                    required: true,
	                    maxlength: 80
	                },
	            	parent_dni: {
	                    required: true,
	                    maxlength: 80
	                },
	            	parent_profession: {
	                    required: true,
	                    maxlength: 80
	                },
	                nombres: {
	                    required: true,
	                    maxlength: 50
	                },
	                apellido1: {
	                    required: true,
	                    maxlength: 30
	                },
	                apellido2: {
	                    required: true,
	                    maxlength: 30
	                },
	                documento: {
	                    required: true,
	                    maxlength: 20
	                },
	                tipo_dcto: {
	                    required: true
	                },
	                sexo: {
	                    required: true
	                },
	                fecha_nac: {
	                    required: true
	                },
	                pais_nac: {
	                    required: true,
	                    maxlength: 50
	                },
	                depto_nac: {
	                    required: true,
	                    maxlength: 50
	                },
	                ciudad_nac: {
	                    required: true,
	                    maxlength: 50
	                },
	                direccion: {
	                    required: true,
	                    maxlength: 150
	                },
	                barrio: {
	                    required: true,
	                    maxlength: 50
	                },
	                telefono1: {
	                    required: true,
	                    maxlength: 20
	                },
	                telefono2: {
	                    maxlength: 20
	                },
	                grado_aspira: {
	                    required: true,
	                    maxlength: 50
	                },
	                ante_instit: {
	                    maxlength: 50
	                },
	                ante_instit_dir: {
	                    maxlength: 50
	                },
	                ante_instit_tel: {
	                    maxlength: 20
	                },
	                ante_grado: {
	                    maxlength: 20
	                },
	                tiempoinstit: {
	                    maxlength: 20
	                },
	                madre: {
	                    required: true,
	                    maxlength: 100
	                },
	                madre_document: {
	                    required: true,
	                    maxlength: 50
	                },
	      		    madre_edad: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    madre_prof: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    madre_empresa: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    madre_cargo: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    madre_tel_ofi: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    madre_tel_per: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    madre_email: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    padre: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    padre_document: {
	                    required: true,
	                    maxlength: 50
	                },
	      		    padre_edad: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    padre_prof: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    padre_empresa: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    padre_cargo: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    padre_tel_ofi: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    padre_tel_per: {
	                    required: true,
	                    maxlength: 20
	                },
	      		    padre_email: {
	                    required: true,
	                    maxlength: 100
	                },
	      		    observaciones: {
	                    maxlength: 200
	                },
	      		    desarrollo_fisico: {
	                    maxlength: 200
	                },
	      		    desarrollo_psicologico_lenguaje: {
	                    maxlength: 200
	                },
	      		    desarrollo_psicologico_aprendizaje: {
	                    maxlength: 200
	                },
	      		    desarrollo_psicologico_comportamiento: {
	                    maxlength: 200
	                },
	      		    desarrollo_psicologico_afecto: {
	                    maxlength: 200
	                },
	      		    desarrollo_psicologico_autocuidado: {
	                    maxlength: 200
	                },
	      		    desarrollo_psicologico_remisiones: {
	                    maxlength: 200
	                },
	      		    ante_flia_nucleo_familiar: {
	                    maxlength: 200
	                },
	      		    ante_flia_estado_civil_padres: {
	                    maxlength: 200
	                },
	      		    ante_flia_relacion_entre_padres: {
	                    maxlength: 200
	                },
	      		    ante_flia_relacion_con_hermanos: {
	                    maxlength: 200
	                },
	      		    hist_escolar_proc_academico: {
	                    maxlength: 200
	                },
	      		    hist_escolar_relacion_companieros: {
	                    maxlength: 200
	                },
	      		    hist_escolar_relacion_docentes: {
	                    maxlength: 200
	                },
	      		    hist_escolar_comportamiento_escolar: {
	                    maxlength: 200
	                },
	      		    hist_escolar_razones_windsor: {
	                    maxlength: 200
	                }
	            }
	        });

        $('#registrar_aspirante').click(function (e) {
	        e.preventDefault();
	        var form = $('#formRegistrarAspirante');

	        if (!form.valid()) {
	        	alert("error");
	            return;
	        }

	        form.submit();
	    });


    });

    <?php if(isset($_SESSION['old'])) { ?>

	    	toastr.options = {
				  "closeButton": false,
				  "debug": false,
				  "newestOnTop": false,
				  "progressBar": false,
				  "positionClass": "toast-top-right",
				  "preventDuplicates": false,
				  "onclick": null,
				  "showDuration": "300",
				  "hideDuration": "1000",
				  "timeOut": "5000",
				  "extendedTimeOut": "1000",
				  "showEasing": "swing",
				  "hideEasing": "linear",
				  "showMethod": "fadeIn",
				  "hideMethod": "fadeOut"
			};

			toastr.error("<?=$_SESSION['message']?>", "Consulte al personal del colegio");   

		<?php } ?>
</script>