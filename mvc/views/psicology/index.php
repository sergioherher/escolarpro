<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_applicant')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-header">
                    <?php
                        $usertype = $this->session->userdata("usertype");
                        if(permissionChecker('applicant_add')) {
                    ?>
                        <a class="btn btn-success" href="<?php echo base_url('applicant/add') ?>">
                            <i class="fa fa-plus"></i>
                            <?=$this->lang->line('add_title')?>
                        </a>
                    <?php } ?>
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                        <?php
                            $array = array("0" => $this->lang->line("applicant_select_class"));
                            if(count($classes)) {
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                            }
                            $array_set = explode("_", $set);
                            if($array_set[0] == "class") $filtro = $array_set[1];
                            else $filtro = "";
                            echo form_dropdown("classesID", $array, set_value("classesID", $filtro), "id='classesID' class='form-control select2'");
                        ?>

                    </div>
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                        <?php
                            $array = array("0" => $this->lang->line("applicant_register_date"), "1" => $this->lang->line("applicant_today"), "2" => $this->lang->line("applicant_yesterday"), "3" => $this->lang->line("applicant_a_week"), "4" => $this->lang->line("applicant_a_month"), "4" => $this->lang->line("applicant_a_year"));
                            
                            $array_set = explode("_", $set);
                            if($array_set[0] == "lap") $filtro = $array_set[1];
                            else $filtro = "";
                            echo form_dropdown("lapTime", $array, set_value("lapTime", $filtro), "id='lapTime' class='form-control select2'");
                        ?>

                    </div>
                </h5>

                <?php if(count($applicants) > 0 ) { ?>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#all" aria-expanded="true"><?=$this->lang->line("applicant_all_applicants")?></a></li>
                            <?php foreach ($sections as $key => $section) {
                                echo '<li class=""><a data-toggle="tab" href="#tab'.$section->classesID.$section->sectionID .'" aria-expanded="false">'. $this->lang->line("applicant_section")." ".$section->section. " ( ". $section->category." )".'</a></li>';
                            } ?>
                        </ul>

                        <div class="tab-content">
                            <div id="all" class="tab-pane active">
                                <div id="hide-table">
                                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                                <th class="col-sm-1"><?=$this->lang->line('applicant_dni')?></th> 
                                                <th class="col-sm-1"><?=$this->lang->line('applicant_name')?></th>
                                                <th class="col-sm-1"><?=$this->lang->line('applicant_lastname')?></th>
                                                <?php if(permissionChecker('psicology_edit')) { ?>
                                                <th class="col-sm-1"><?=$this->lang->line('action')?></th>
                                                <th class="col-sm-2"><?=$this->lang->line('applicant_eval_date')?></th>
                                                <th class="col-sm-2"><?=$this->lang->line('applicant_test_date')?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($applicants)) {$i = 1; foreach($applicants as $applicant) { ?>
                                                <tr>
                                                    <td data-title="<?=$this->lang->line('slno')?>">
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('applicant_dni')?>">
                                                        <?php echo $applicant->documento; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('applicant_name')?>">
                                                        <?php echo $applicant->nombres; ?>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('applicant_lastname')?>">
                                                        <?php echo $applicant->apellido1; ?>
                                                    </td>
                                                    <?php if(permissionChecker('psicology_edit')) { ?>
                                                    <td data-title="<?=$this->lang->line('applicant_edit_psico_file')?>">
                                                        <button id="edit_psico_file-<?=$applicant->applicantsID?>" class="btn btn-warning btn-xs edit_psico_file" title="<?=$this->lang->line('applicant_edit_psico_file')?>"><i class="fa fa-edit"></i>
                                                        </button>

                                                        <button <?=($applicant->is_fecha_eval == 1)?'disabled':''?> id="check_is_eval-<?=$applicant->applicantsID?>" class="btn btn-success btn-xs check_is_eval" title="<?=$this->lang->line('applicant_check_eval')?>"><i class="fa fa-<?=($applicant->is_fecha_eval == 1)?'thumbs-up':'check'?>"></i>
                                                        </button>

                                                        <button <?=($applicant->is_fecha_entrev == 1)?'disabled':''?> id="check_is_entrev-<?=$applicant->applicantsID?>" class="btn btn-success btn-xs check_is_entrev" title="<?=$this->lang->line('applicant_check_test')?>"><i class="fa fa-<?=($applicant->is_fecha_entrev == 1)?'thumbs-up':'check'?>"></i>
                                                        </button>

                                                        <button id="check_transfer-<?=$applicant->applicantsID?>" class="btn btn-primary btn-xs check_transfer" title="<?=$this->lang->line('applicant_transfer')?>"><i class="fa fa-exchange"></i>
                                                        </button>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('applicant_eval_date')?>">
                                                        <div>
                                                            <div style="display: inline; float: left">
                                                                <input size="15" id="input_fecha_eval-<?=$applicant->applicantsID?>" class="form-control input-sm input_fecha_eval" type="text" name="fecha_eval" value="<?=$applicant->fecha_eval?>">
                                                            </div>
                                                            <div>
                                                                <div style="display: inline; float: left">
                                                                   <button  id="save_psico_fecha_eval-<?=$applicant->applicantsID?>" class="btn btn-success btn-xs save_psico_fecha_eval" title="<?=$this->lang->line('applicant_edit_psico_file')?>"><i class="fa fa-check"></i></button> 
                                                                </div>
                                                                <div style="display: inline; float: left">
                                                                    <button id="clear_psico_fecha_eval-<?=$applicant->applicantsID?>" class="btn btn-danger btn-xs clear_psico_fecha_eval" title="<?=$this->lang->line('applicant_edit_psico_file')?>"><i class="fa fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('applicant_test_date')?>">
                                                        <div>
                                                            <div style="display: inline; float: left">
                                                                <input size="15" id="input_fecha_entrev-<?=$applicant->applicantsID?>" class="form-control input-sm input_fecha_entrev" type="text" name="fecha_entrev" value="<?=$applicant->fecha_entrev?>">
                                                            </div>
                                                            <div>
                                                                <div style="display: inline; float: left">
                                                                   <button id="save_psico_fecha_entrev-<?=$applicant->applicantsID?>" class="btn btn-success btn-xs save_psico_fecha_entrev" title="<?=$this->lang->line('applicant_edit_psico_file')?>"><i class="fa fa-check"></i></button> 
                                                                </div>
                                                                <div style="display: inline; float: left">
                                                                    <button id=" clear_psico_fecha_entrev-<?=$applicant->applicantsID?>" class="btn btn-danger btn-xs clear_psico_fecha_entrev" title="<?=$this->lang->line('applicant_edit_psico_file')?>"><i class="fa fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <?php } ?>
                                               </tr>
                                            <?php $i++; }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- nav-tabs-custom -->
                <?php } ?>

            </div> <!-- col-sm-12 -->

        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<div class="modal fade" tabindex="-1" role="dialog" id="psico_file">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formPsicoFile">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h4><?=$this->lang->line("applicant_personal_history")?></h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if(form_error('desarrollo_fisico'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="desarrollo_fisico" class="control-label">
                                <?=$this->lang->line("applicant_phisical_development")?>
                            </label>
                            <textarea rows="2" class="form-control" id="desarrollo_fisico" name="desarrollo_fisico" value="<?=set_value('desarrollo_fisico')?>" ></textarea> 
                            <span class="control-label">
                                <?php echo form_error('desarrollo_fisico'); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h5><?=$this->lang->line("applicant_psicological_development")?></h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if(form_error('desarrollo_psicologico_lenguaje'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="desarrollo_psicologico_lenguaje" class="control-label">
                                <?=$this->lang->line("applicant_languaje")?>
                            </label>
                                <textarea rows="2" class="form-control" id="desarrollo_psicologico_lenguaje" name="desarrollo_psicologico_lenguaje" value="<?=set_value('desarrollo_psicologico_lenguaje')?>" ></textarea>
                            <span class="control-label">
                                <?php echo form_error('desarrollo_psicologico_lenguaje'); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if(form_error('desarrollo_psicologico_aprendizaje'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="desarrollo_psicologico_aprendizaje" class="control-label">
                                <?=$this->lang->line("applicant_learning")?>
                            </label>
                                <textarea rows="2" class="form-control" id="desarrollo_psicologico_aprendizaje" name="desarrollo_psicologico_aprendizaje" value="<?=set_value('desarrollo_psicologico_aprendizaje')?>" ></textarea>
                            <span class="control-label">
                                <?php echo form_error('desarrollo_psicologico_aprendizaje'); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if(form_error('desarrollo_psicologico_comportamiento'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="desarrollo_psicologico_comportamiento" class="control-label">
                                <?=$this->lang->line("applicant_behavior")?>
                            </label>
                                <textarea rows="2" class="form-control" id="desarrollo_psicologico_comportamiento" name="desarrollo_psicologico_comportamiento" value="<?=set_value('desarrollo_psicologico_comportamiento')?>" ></textarea>
                            <span class="control-label">
                                <?php echo form_error('desarrollo_psicologico_comportamiento'); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if(form_error('desarrollo_psicologico_afecto'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="desarrollo_psicologico_afecto" class="control-label">
                                <?=$this->lang->line("applicant_afinity")?>
                            </label>
                                <textarea rows="2" class="form-control" id="desarrollo_psicologico_afecto" name="desarrollo_psicologico_afecto" value="<?=set_value('desarrollo_psicologico_afecto')?>" ></textarea>
                            <span class="control-label">
                                <?php echo form_error('desarrollo_psicologico_afecto'); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if(form_error('desarrollo_psicologico_autocuidado'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="desarrollo_psicologico_autocuidado" class="control-label">
                                <?=$this->lang->line("applicant_selfcare")?>
                            </label>
                                <textarea rows="2" class="form-control" id="desarrollo_psicologico_autocuidado" name="desarrollo_psicologico_autocuidado" value="<?=set_value('desarrollo_psicologico_autocuidado')?>" ></textarea>
                            <span class="control-label">
                                <?php echo form_error('desarrollo_psicologico_autocuidado'); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if(form_error('desarrollo_psicologico_remisiones'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="desarrollo_psicologico_remisiones" class="control-label">
                                <?=$this->lang->line("applicant_remisions")?>
                            </label>
                                <textarea rows="2" class="form-control" id="desarrollo_psicologico_remisiones" name="desarrollo_psicologico_remisiones" value="<?=set_value('desarrollo_psicologico_remisiones')?>" ></textarea>
                            <span class="control-label">
                                <?php echo form_error('desarrollo_psicologico_remisiones'); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h5><?=$this->lang->line("applicant_family_precedent")?></h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if(form_error('ante_flia_nucleo_familiar'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="ante_flia_nucleo_familiar" class="control-label">
                                <?=$this->lang->line("applicant_family_core")?>
                            </label>
                                <textarea rows="2" class="form-control" id="ante_flia_nucleo_familiar" name="ante_flia_nucleo_familiar" value="<?=set_value('ante_flia_nucleo_familiar')?>" ></textarea>
                            <span class="control-label">
                                <?php echo form_error('ante_flia_nucleo_familiar'); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if(form_error('ante_flia_estado_civil_padres'))
                                echo "<div class='form-group has-error' >";
                            else
                                echo "<div class='form-group' >";
                        ?>
                            <label for="ante_flia_nucleo_familiar" class="control-label">
                                <?=$this->lang->line("applicant_family_parents_civil_state")?>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_1" value="CASADOS" checked>
                                <label style="padding-right: 10px" class="form-check-label" for="ante_flia_estado_civil_padres_1"><?=$this->lang->line("applicant_family_married")?></label>

                                <input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_2" value="DIVORCIADOS" >
                                <label style="padding-right: 10px"  class="form-check-label" for="ante_flia_estado_civil_padres_2"><?=$this->lang->line("applicant_family_divorcied")?></label>

                                <input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_3" value="SEPARADOS" >
                                <label style="padding-right: 10px"  class="form-check-label" for="ante_flia_estado_civil_padres_3"><?=$this->lang->line("applicant_family_split")?></label>

                                <input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_4" value="UNIÓN LIBRE" >
                                <label style="padding-right: 10px"  class="form-check-label" for="ante_flia_estado_civil_padres_4"><?=$this->lang->line("applicant_family_free_union")?></label>

                                <input class="form-check-input" type="radio" name="ante_flia_estado_civil_padres" id="ante_flia_estado_civil_padres_5" value="OTRO" >
                                <label style="padding-right: 10px"  class="form-check-label" for="ante_flia_estado_civil_padres_5"><?=$this->lang->line("applicant_family_other")?></label>
                            </div>
                            <span class="control-label">
                                <?php echo form_error('ante_flia_estado_civil_padres'); ?>
                            </span>
                        </div>
                    </div>
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
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">


    $(document).ready(function(){

        $(".edit_psico_file").click(function(e){
            e.preventDefault();
            $("#psico_file").modal('show');
        });

        $("#psico_file").modal('show');

        $(".check_is_entrev").click(function(e){
            e.preventDefault();
            var array_id = this.id.split('-');
            var id = array_id[1];
            if(confirm("<?=$this->lang->line('applicant_set_is_fecha_entrev')?>")) {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('psicology/set_is_fecha_entrev')?>",
                    data: {is_fecha_entrev:1, id:id},
                    dataType: "json",
                    success: function(data) {
                        if(data.success) {
                            toastr.success(data.message, data.title);
                            $("#check_is_entrev-"+data.id+" i").removeClass('fa-check').addClass('fa-thumbs-up');
                            $("#check_is_entrev-"+data.id).prop('disabled', true);
                        } else {
                            toastr.error(data.message, data.title);
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });

        $(".check_is_eval").click(function(e){
            e.preventDefault();
            var array_id = this.id.split('-');
            var id = array_id[1];
            if(confirm("<?=$this->lang->line('applicant_set_is_fecha_eval')?>")) {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('psicology/set_is_fecha_eval')?>",
                    data: {is_fecha_eval:1, id:id},
                    dataType: "json",
                    success: function(data) {
                        if(data.success) {
                            toastr.success(data.message, data.title);
                            $("#check_is_eval-"+data.id+" i").removeClass('fa-check').addClass('fa-thumbs-up');
                            $("#check_is_eval-"+data.id).prop('disabled', true);
                        } else {
                            toastr.error(data.message, data.title);
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });

        $(".save_psico_fecha_entrev").click(function(e){
            e.preventDefault();
            var array_id = this.id.split('-');
            var id = array_id[1];

            var fecha_entrev = $("#input_fecha_entrev-"+id).val();

            $.ajax({
                type: 'POST',
                url: "<?=base_url('psicology/set_fecha_entrev')?>",
                data: {fecha_entrev:fecha_entrev, id:id},
                dataType: "json",
                success: function(data) {
                    if(data.success) {
                        toastr.success(data.message, data.title);
                    } else {
                        toastr.error(data.message, data.title);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });

        });

        $(".save_psico_fecha_eval").click(function(e){
            e.preventDefault();
            var array_id = this.id.split('-');
            var id = array_id[1];

            var fecha_eval = $("#input_fecha_eval-"+id).val();

            $.ajax({
                type: 'POST',
                url: "<?=base_url('psicology/set_fecha_eval')?>",
                data: {fecha_eval:fecha_eval, id:id},
                dataType: "json",
                success: function(data) {
                    if(data.success) {
                        toastr.success(data.message, data.title);
                    } else {
                        toastr.error(data.message, data.title);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });

        });

        $(".clear_psico_fecha_entrev").click(function(e){
            e.preventDefault();
            var array_id = this.id.split('-');
            var id = array_id[1];

            if(confirm("<?=$this->lang->line('applicant_clear_fecha_entrev')?>")) {

                $("#input_fecha_entrev-"+id).val("");

                var fecha_entrev = "0000-00-00 00:00:00";

                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('psicology/set_fecha_entrev')?>",
                    data: {fecha_entrev:fecha_entrev, id:id},
                    dataType: "json",
                    success: function(data) {
                        if(data.success) {
                            toastr.success(data.message, data.title);
                        } else {
                            toastr.error(data.message, data.title);
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });

            }

        });

        $(".clear_psico_fecha_eval").click(function(e){
            e.preventDefault();
            var array_id = this.id.split('-');
            var id = array_id[1];

            if(confirm("<?=$this->lang->line('applicant_clear_fecha_eval')?>")) {

                $("#input_fecha_eval-"+id).val("");

                var fecha_eval = "0000-00-00 00:00:00";

                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('psicology/set_fecha_eval')?>",
                    data: {fecha_entrev:fecha_eval, id:id},
                    dataType: "json",
                    success: function(data) {
                        if(data.success) {
                            toastr.success(data.message, data.title);
                        } else {
                            toastr.error(data.message, data.title);
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });

            }

        });

        $(".select2").select2();

        $(".btn-disabled").attr('disabled', true);

        $('#classesID').change(function() {
            var classesID = $(this).val();
            if(classesID == 0) {
                $('#hide-table').hide();
                $('.nav-tabs-custom').hide();
                window.location.href = "<?=base_url('psicology/index')?>";
            } else {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('psicology/applicant_list')?>",
                    data: "id=" + classesID,
                    dataType: "html",
                    success: function(data) {
                        window.location.href = data;
                    }
                });
            }
        });

        $('#lapTime').change(function() {
            var lapTime = $(this).val();
            if(lapTime == 0) {
                $('#hide-table').hide();
                $('.nav-tabs-custom').hide();
                window.location.href = "<?=base_url('psicology/index')?>";
            } else {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('psicology/applicant_list')?>",
                    data: "lap=" + lapTime,
                    dataType: "html",
                    success: function(data) {
                        window.location.href = data;
                    }
                });
            }
        });

        $('.input_fecha_entrev').datetimepicker({
            format: 'YYYY-MM-DD hh:mm'
        });

        $('.input_fecha_eval').datetimepicker({
            format: 'YYYY-MM-DD hh:mm'
        });

        var status = '';
        var id = 0;
        $('.onoffswitch-small-checkbox').click(function() {
            if($(this).prop('checked')) {
                status = 'chacked';
                id = $(this).parent().attr("id");
            } else {
                status = 'unchacked';
                id = $(this).parent().attr("id");
            }

            if((status != '' || status != null) && (id !='')) {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('applicant/active')?>",
                    data: "id=" + id + "&status=" + status,
                    dataType: "html",
                    success: function(data) {
                        if(data == 'Success') {
                            toastr["success"]("Success")
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "500",
                                "hideDuration": "500",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        } else {
                            toastr["error"]("Error")
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "500",
                                "hideDuration": "500",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    }
                });
            }
        });

});
</script>