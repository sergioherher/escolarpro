
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_student')?></li>
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
                        <a class="btn btn-success" href="<?php echo base_url('secretariat/add') ?>">
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
                            echo form_dropdown("classesID", $array, set_value("classesID", $set), "id='classesID' class='form-control select2'");
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
                                                <th class="col-sm-2"><?=$this->lang->line('applicant_dni')?></th> 
                                                <th class="col-sm-2"><?=$this->lang->line('applicant_name')?></th>
                                                <th class="col-sm-2"><?=$this->lang->line('applicant_email')?></th>
                                                <?php if(permissionChecker('applicant_edit')) { ?>
                                                <th class="col-sm-1"><?=$this->lang->line('applicant_status')?></th>
                                                <?php } ?>
                                                <?php if(permissionChecker('applicant_edit') || permissionChecker('applicant_delete') || permissionChecker('applicant_view')) { ?>
                                                <th class="col-sm-5"><?=$this->lang->line('action')?></th>
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
                                                    <td data-title="<?=$this->lang->line('applicant_email')?>">
                                                        <?php echo $applicant->email; ?>
                                                    </td>
                                                    <?php if(permissionChecker('applicant_edit')) { ?>
                                                    <td data-title="<?=$this->lang->line('applicant_status')?>">
                                                        <div class="onoffswitch-small" id="<?=$applicant->applicantsID?>">
                                                            <input type="checkbox" id="myonoffswitch<?=$applicant->applicantsID?>" class="onoffswitch-small-checkbox" name="paypal_demo" <?php if($applicant->active === '1') echo "checked='checked'"; ?>>
                                                            <label for="myonoffswitch<?=$applicant->applicantsID?>" class="onoffswitch-small-label">
                                                                <span class="onoffswitch-small-inner"></span>
                                                                <span class="onoffswitch-small-switch"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <?php } ?>
                                                    <?php if(permissionChecker('applicant_edit') || permissionChecker('applicant_delete') || permissionChecker('applicant_view')) { ?>
                                                    <td data-title="<?=$this->lang->line('action')?>">
                                                        <?php

                                                            echo btn_view('applicant/view/'.$applicant->applicantsID."/".$set, $this->lang->line('view'));
                                                            echo btn_edit('applicant/edit/'.$applicant->applicantsID."/".$set, $this->lang->line('edit'));
                                                            echo btn_delete('applicant/delete/'.$applicant->applicantsID."/".$set, $this->lang->line('delete'));
                                                        ?>
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

<script type="text/javascript">
    $(".select2").select2();

    $('#classesID').change(function() {
        var classesID = $(this).val();
        if(classesID == 0) {
            $('#hide-table').hide();
            $('.nav-tabs-custom').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('applicant/applicant_list')?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
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
</script>