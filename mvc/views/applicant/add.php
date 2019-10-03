
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("secretariat/index")?>"><?=$this->lang->line('menu_secretariat')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?=base_url("secretariat/add")?>">

                    <?php
                        if(form_error('documento'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="dni" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_dni")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="documento" name="documento" value="<?=set_value('documento')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('documento'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('nombres'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="nombres_id" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nombres_id" name="nombres" value="<?=set_value('nombres')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('nombres'); ?>
                        </span>
                    </div>                    

                    <?php
                        if(form_error('fecha_nac'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="fecha_nac" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_dob")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="fecha_nac" name="fecha_nac" value="<?=set_value('fecha_nac')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('fecha_nac'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('sexo'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="sexo" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_sex")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                echo form_dropdown("sexo", array($this->lang->line('student_sex_male') => $this->lang->line('student_sex_male'), $this->lang->line('student_sex_female') => $this->lang->line('student_sex_female')), set_value("sexo"), "id='sexo' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('sexo'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('grupo_sangre'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="grupo_sangre" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_bloodgroup")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $bloodArray = array(
                                    '0' => $this->lang->line('applicant_select_bloodgroup'),
                                    'A+' => 'A+',
                                    'A-' => 'A-',
                                    'B+' => 'B+',
                                    'B-' => 'B-',
                                    'O+' => 'O+',
                                    'O-' => 'O-',
                                    'AB+' => 'AB+',
                                    'AB-' => 'AB-'
                                );
                                echo form_dropdown("grupo_sangre", $bloodArray, set_value("bloodgroup"), "id='grupo_sangre' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('grupo_sangre'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('email'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="email" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_email")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('email'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('telefono1'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="telefono1" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_home_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="telefono1" name="telefono1" value="<?=set_value('telefono1')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('telefono1'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('telefono2'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="telefono2" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_personal_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="telefono2" name="telefono2" value="<?=set_value('telefono2')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('telefono2'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('direccion'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="direccion" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_address")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?=set_value('direccion')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('direccion'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('barrio'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="barrio" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_barrio")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="barrio" name="barrio" value="<?=set_value('barrio')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('barrio'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('depto_nac'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="depto_nac" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_state")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="depto_nac" name="depto_nac" value="<?=set_value('depto_nac')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('depto_nac'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('pais_nac'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="pais_nac" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_country")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $country['0'] = $this->lang->line('applicant_select_country');
                                foreach ($allcountry as $allcountryKey => $allcountryit) {
                                    $country[$allcountryKey] = $allcountryit;
                                }
                            ?>
                            <?php
                                echo form_dropdown("pais_nac", $country, set_value("country"), "id='pais_nac' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('pais_nac'); ?>
                        </span>
                    </div>

                    <hr>
                    <div class="form-group">
                    	<div class="col-sm-2">
                    		<h5><?=$this->lang->line("applicant_school_data")?></h5>
                    	</div>
					</div>

                    <?php
                        if(form_error('ante_instit'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="ante_instit" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_prev_institution")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ante_instit" name="ante_instit" value="<?=set_value('ante_instit')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ante_instit'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('ante_instit_dir'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="ante_instit_dir" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_prev_institution_address")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ante_instit_dir" name="ante_instit_dir" value="<?=set_value('ante_instit_dir')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ante_instit_dir'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('ante_instit_tel'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="ante_instit_tel" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_prev_institution_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ante_instit_tel" name="ante_instit_tel" value="<?=set_value('ante_instit_tel')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ante_instit_tel'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('ante_grado'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="ante_grado" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_prev_institution_class")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ante_grado" name="ante_grado" value="<?=set_value('ante_grado')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ante_grado'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('ante_fecha_ret'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="ante_fecha_ret" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_prev_institution_end_date")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ante_fecha_ret" name="ante_fecha_ret" value="<?=set_value('ante_fecha_ret')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ante_fecha_ret'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('tiempoinstit'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="tiempoinstit" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_prev_institution_time")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tiempoinstit" name="tiempoinstit" value="<?=set_value('tiempoinstit')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('tiempoinstit'); ?>
                        </span>
                    </div>

                    <hr>
                    <div class="form-group">
                    	<div class="col-sm-12">
                    		<h4><?=$this->lang->line("applicant_family_history")?></h4>
                    	</div>
					</div>

                    <hr>
                    <div class="form-group">
                    	<div class="col-sm-12">
                    		<h5><?=$this->lang->line("applicant_mother_data")?></h5>
                    	</div>
					</div>

                    <?php
                        if(form_error('madre'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="madre" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_name")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="madre" name="madre" value="<?=set_value('madre')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('madre'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('madre_document'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="madre_document" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_dni")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="madre_document" name="madre_document" value="<?=set_value('madre_document')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('madre_document'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('madre_prof'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="madre_prof" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_profession")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="madre_prof" name="madre_prof" value="<?=set_value('madre_prof')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('madre_prof'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('madre_empresa'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="madre_empresa" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_employee")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="madre_empresa" name="madre_empresa" value="<?=set_value('madre_empresa')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('madre_empresa'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('madre_cargo'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="madre_cargo" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_employee_roll")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="madre_cargo" name="madre_cargo" value="<?=set_value('madre_cargo')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('madre_cargo'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('madre_tel_ofi'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="madre_tel_ofi" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_employee_roll")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="madre_tel_ofi" name="madre_tel_ofi" value="<?=set_value('madre_tel_ofi')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('madre_tel_ofi'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('madre_tel_per'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="madre_tel_per" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_personal_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="madre_tel_per" name="madre_tel_per" value="<?=set_value('madre_tel_per')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('madre_tel_per'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('madre_tel_ofi'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="madre_tel_ofi" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_employee_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="madre_tel_ofi" name="madre_tel_ofi" value="<?=set_value('madre_tel_ofi')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('madre_tel_ofi'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('madre_email'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="madre_email" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_email")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="madre_email" name="madre_email" value="<?=set_value('madre_email')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('madre_email'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('madre_edad'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="madre_edad" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_age")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="madre_edad" name="madre_edad" value="<?=set_value('madre_edad')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('madre_edad'); ?>
                        </span>
                    </div>

                    <hr>
                    <div class="form-group">
                    	<div class="col-sm-12">
                    		<h5><?=$this->lang->line("applicant_father_data")?></h5>
                    	</div>
					</div>

                    <?php
                        if(form_error('padre'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="padre" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_name")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="padre" name="padre" value="<?=set_value('padre')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('padre'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('padre_document'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="padre_document" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_dni")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="padre_document" name="padre_document" value="<?=set_value('padre_document')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('padre_document'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('padre_prof'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="padre_prof" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_profession")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="padre_prof" name="padre_prof" value="<?=set_value('padre_prof')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('padre_prof'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('padre_empresa'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="padre_empresa" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_employee")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="padre_empresa" name="padre_empresa" value="<?=set_value('padre_empresa')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('padre_empresa'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('padre_cargo'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="padre_cargo" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_employee_roll")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="padre_cargo" name="padre_cargo" value="<?=set_value('padre_cargo')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('padre_cargo'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('padre_tel_ofi'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="padre_tel_ofi" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_employee_roll")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="padre_tel_ofi" name="padre_tel_ofi" value="<?=set_value('padre_tel_ofi')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('padre_tel_ofi'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('padre_tel_per'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="padre_tel_per" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_personal_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="padre_tel_per" name="padre_tel_per" value="<?=set_value('padre_tel_per')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('padre_tel_per'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('padre_tel_ofi'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="padre_tel_ofi" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_employee_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="padre_tel_ofi" name="padre_tel_ofi" value="<?=set_value('padre_tel_ofi')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('padre_tel_ofi'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('padre_email'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="padre_email" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_email")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="padre_email" name="padre_email" value="<?=set_value('padre_email')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('padre_email'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('padre_edad'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="padre_edad" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_age")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="padre_edad" name="padre_edad" value="<?=set_value('padre_edad')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('padre_edad'); ?>
                        </span>
                    </div>

                    <hr>

                    <div class="form-group">
                    	<div class="col-sm-12">
                    		<h4><?=$this->lang->line("applicant_personal_history")?></h4>
                    	</div>
					</div>

                    <?php
                        if(form_error('desarrollo_fisico'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="desarrollo_fisico" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_phisical_development")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="desarrollo_fisico" name="desarrollo_fisico" value="<?=set_value('desarrollo_fisico')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('desarrollo_fisico'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                    	<div class="col-sm-12">
                    		<h5><?=$this->lang->line("applicant_psicological_development")?></h5>
                    	</div>
					</div>

                    <?php
                        if(form_error('desarrollo_psicologico_lenguaje'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="desarrollo_psicologico_lenguaje" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_languaje")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="desarrollo_psicologico_lenguaje" name="desarrollo_psicologico_lenguaje" value="<?=set_value('desarrollo_psicologico_lenguaje')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('desarrollo_psicologico_lenguaje'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('desarrollo_psicologico_aprendizaje'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="desarrollo_psicologico_aprendizaje" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_learning")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="desarrollo_psicologico_aprendizaje" name="desarrollo_psicologico_aprendizaje" value="<?=set_value('desarrollo_psicologico_aprendizaje')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('desarrollo_psicologico_aprendizaje'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('desarrollo_psicologico_comportamiento'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="desarrollo_psicologico_comportamiento" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_behavior")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="desarrollo_psicologico_comportamiento" name="desarrollo_psicologico_comportamiento" value="<?=set_value('desarrollo_psicologico_comportamiento')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('desarrollo_psicologico_comportamiento'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('desarrollo_psicologico_afecto'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="desarrollo_psicologico_comportamiento" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_afinity")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="desarrollo_psicologico_afecto" name="desarrollo_psicologico_afecto" value="<?=set_value('desarrollo_psicologico_afecto')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('desarrollo_psicologico_afecto'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('desarrollo_psicologico_autocuidado'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="desarrollo_psicologico_autocuidado" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_selfcare")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="desarrollo_psicologico_autocuidado" name="desarrollo_psicologico_autocuidado" value="<?=set_value('desarrollo_psicologico_autocuidado')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('desarrollo_psicologico_autocuidado'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('desarrollo_psicologico_remisiones'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="desarrollo_psicologico_remisiones" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_remisions")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="desarrollo_psicologico_remisiones" name="desarrollo_psicologico_remisiones" value="<?=set_value('desarrollo_psicologico_remisiones')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('desarrollo_psicologico_remisiones'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                    	<div class="col-sm-12">
                    		<h5><?=$this->lang->line("applicant_family_precedent")?></h5>
                    	</div>
					</div>

                    <?php
                        if(form_error('ante_flia_nucleo_familiar'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="ante_flia_nucleo_familiar" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_family_core")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ante_flia_nucleo_familiar" name="ante_flia_nucleo_familiar" value="<?=set_value('ante_flia_nucleo_familiar')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ante_flia_nucleo_familiar'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('ante_flia_estado_civil_padres'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_family_civil_state")?>
                        </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_1" value="Casados" checked>
							<label style="padding-right: 10px" class="form-check-label" for="ante_flia_estado_civil_padres_1"><?=$this->lang->line("applicant_family_married")?></label>

                            <input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_2" value="Casados" >
							<label style="padding-right: 10px"  class="form-check-label" for="ante_flia_estado_civil_padres_2"><?=$this->lang->line("applicant_family_divorcied")?></label>

                            <input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_3" value="Casados" >
							<label style="padding-right: 10px"  class="form-check-label" for="ante_flia_estado_civil_padres_3"><?=$this->lang->line("applicant_family_split")?></label>

                            <input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_4" value="Casados" >
							<label style="padding-right: 10px"  class="form-check-label" for="ante_flia_estado_civil_padres_4"><?=$this->lang->line("applicant_family_free_union")?></label>

                            <input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_5" value="Casados" >
							<label style="padding-right: 10px"  class="form-check-label" for="ante_flia_estado_civil_padres_5"><?=$this->lang->line("applicant_family_other")?></label>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ante_flia_estado_civil_padres'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('ante_flia_relacion_entre_padres'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="ante_flia_relacion_entre_padres" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_parents_relationship")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ante_flia_relacion_entre_padres" name="ante_flia_relacion_entre_padres" value="<?=set_value('ante_flia_relacion_entre_padres')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ante_flia_relacion_entre_padres'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('ante_flia_relacion_con_hermanos'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="ante_flia_relacion_con_hermanos" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_brothers_relationship")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ante_flia_relacion_con_hermanos" name="ante_flia_relacion_con_hermanos" value="<?=set_value('ante_flia_relacion_con_hermanos')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ante_flia_relacion_con_hermanos'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                    	<div class="col-sm-12">
                    		<h5><?=$this->lang->line("applicant_school_history")?></h5>
                    	</div>
					</div>

                    <?php
                        if(form_error('hist_escolar_proc_academico'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="hist_escolar_proc_academico" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_academic_process")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="hist_escolar_proc_academico" name="hist_escolar_proc_academico" value="<?=set_value('hist_escolar_proc_academico')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('hist_escolar_proc_academico'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('hist_escolar_relacion_companieros'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="hist_escolar_relacion_companieros" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_school_mates_relation")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="hist_escolar_relacion_companieros" name="hist_escolar_relacion_companieros" value="<?=set_value('hist_escolar_relacion_companieros')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('hist_escolar_relacion_companieros'); ?>
                        </span>
                    </div>
                    

                    <?php
                        if(form_error('hist_escolar_relacion_docentes'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="hist_escolar_relacion_docentes" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_teacher_relation")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="hist_escolar_relacion_docentes" name="hist_escolar_relacion_docentes" value="<?=set_value('hist_escolar_relacion_docentes')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('hist_escolar_relacion_docentes'); ?>
                        </span>
                    </div>
                    

                    <?php
                        if(form_error('hist_escolar_comportamiento_escolar'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="hist_escolar_comportamiento_escolar" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_schoolar_behavior")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="hist_escolar_comportamiento_escolar" name="hist_escolar_comportamiento_escolar" value="<?=set_value('hist_escolar_comportamiento_escolar')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('hist_escolar_comportamiento_escolar'); ?>
                        </span>
                    </div>
                    

                    <?php
                        if(form_error('hist_escolar_razones_windsor'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="hist_escolar_razones_windsor" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_why_windsor")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="hist_escolar_razones_windsor" name="hist_escolar_razones_windsor" value="<?=set_value('hist_escolar_razones_windsor')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('hist_escolar_razones_windsor'); ?>
                        </span>
                    </div>
               

                    <?php
                        if(form_error('observaciones'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="observaciones" class="col-sm-2 control-label">
                            <?=$this->lang->line("applicant_observations")?>
                        </label>
                        <div class="col-sm-6">
                            <textarea rows="5" type="text" class="form-control" id="observaciones" name="observaciones" value="<?=set_value('observaciones')?>" ></textarea> 
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('observaciones'); ?>
                        </span>
                    </div>

            </div> <!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">
$( ".select2" ).select2();
$('#dob').datepicker({ startView: 2 });

$('#classesID').change(function(event) {
    var classesID = $(this).val();
    if(classesID === '0') {
        $('#sectionID').val(0);
    } else {
        $.ajax({
            async: false,
            type: 'POST',
            url: "<?=base_url('student/sectioncall')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#sectionID').html(data);
            }
        });
    }
});

$(document).on('click', '#close-preview', function(){
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
           $('.content').css('padding-bottom', '100px');
        },
         function () {
           $('.image-preview').popover('hide');
           $('.content').css('padding-bottom', '20px');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("<?=$this->lang->line('student_file_browse')?>");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200,
            overflow:'hidden'
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("<?=$this->lang->line('student_file_browse')?>");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            $('.content').css('padding-bottom', '100px');
        }
        reader.readAsDataURL(file);
    });
});


</script>
