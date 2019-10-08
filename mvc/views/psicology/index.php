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
                                                        <button  class="btn btn-warning btn-xs edit_psico_file-<?=$applicant->applicantsID?>" title="<?=$this->lang->line('applicant_edit_psico_file')?>"><i class="fa fa-edit"></i></button>
                                                        <button  class="btn btn-success btn-xs check_is_eval-<?=$applicant->applicantsID?>" title="<?=$this->lang->line('applicant_check_eval')?>"><i class="fa fa-check"></i></button>
                                                        <button  class="btn btn-success btn-xs check_is_entrev-<?=$applicant->applicantsID?>" title="<?=$this->lang->line('applicant_check_test')?>"><i class="fa fa-check"></i></button>
                                                        <button  class="btn btn-primary btn-xs check_transfer-<?=$applicant->applicantsID?>" title="<?=$this->lang->line('applicant_transfer')?>"><i class="fa fa-exchange"></i></button>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('applicant_test_date')?>">
                                                        <div>
                                                            <div style="display: inline; float: left">
                                                                <input size="15" class="form-control input-sm input-fecha-entrev" type="text" name="fecha_entrev">
                                                            </div>
                                                            <div>
                                                                <div style="display: inline; float: left">
                                                                   <button  class="btn btn-success btn-xs save_psico_fecha_entrev" title="<?=$this->lang->line('applicant_edit_psico_file')?>"><i class="fa fa-check"></i></button> 
                                                                </div>
                                                                <div style="display: inline; float: left">
                                                                    <button  class="btn btn-danger btn-xs clear_psico_fecha_entrev" title="<?=$this->lang->line('applicant_edit_psico_file')?>"><i class="fa fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-title="<?=$this->lang->line('applicant_eval_date')?>">
                                                        <div>
                                                            <div style="display: inline; float: left">
                                                                <input size="15" class="form-control input-sm input-fecha-eval" type="text" name="fecha_eval">
                                                            </div>
                                                            <div>
                                                                <div style="display: inline; float: left">
                                                                   <button  class="btn btn-success btn-xs save_psico_fecha_eval" title="<?=$this->lang->line('applicant_edit_psico_file')?>"><i class="fa fa-check"></i></button> 
                                                                </div>
                                                                <div style="display: inline; float: left">
                                                                    <button  class="btn btn-danger btn-xs clear_psico_fecha_eval" title="<?=$this->lang->line('applicant_edit_psico_file')?>"><i class="fa fa-times"></i></button>
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

<div class="modal">
        
</div>

<script type="text/javascript">


    $(document).ready(function(){

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

        $('.input-fecha-entrev').datetimepicker({
            format: 'YYYY-MM-DD hh:mm'
        });

        $('.input-fecha-eval').datetimepicker({
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