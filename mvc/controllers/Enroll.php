<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enroll extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model("site_m");
        $this->load->model("classes_m");
		$this->data["siteinfos"] = $this->site_m->get_site(1);
        $this->load->model("applicant_m");
        $this->load->library("session");
    }

    function index() {

        if($_POST) {

            $applicant = array();

            $applicant['nombres'] = mb_strtoupper($_POST['nombres']);
            $applicant['apellido1'] = mb_strtoupper($_POST['apellido1']);
            $applicant['apellido2'] = mb_strtoupper($_POST['apellido2']);
            $applicant['documento'] = mb_strtoupper($_POST['documento']);
            $applicant['tipo_dcto'] = mb_strtoupper($_POST['tipo_dcto']);
            $applicant['sexo'] = mb_strtoupper($_POST['sexo']);
            $applicant['fecha_nac'] = mb_strtoupper($_POST['fecha_nac']);
            $applicant['pais_nac'] = mb_strtoupper($_POST['pais_nac']);
            $applicant['depto_nac'] = mb_strtoupper($_POST['depto_nac']);
            $applicant['ciudad_nac'] = mb_strtoupper($_POST['ciudad_nac']);
            $applicant['direccion'] = mb_strtoupper($_POST['direccion']);    
            $applicant['barrio'] = mb_strtoupper($_POST['barrio']);
            $applicant['telefono1'] = mb_strtoupper($_POST['telefono1']);
            $applicant['telefono2'] = mb_strtoupper($_POST['telefono2']);
            $applicant['grado_aspira'] = mb_strtoupper($_POST['grado_aspira']);
            $applicant['ante_instit'] = mb_strtoupper($_POST['ante_instit']);
            $applicant['ante_instit_dir'] = mb_strtoupper($_POST['ante_instit_dir']);
            $applicant['ante_instit_tel'] = mb_strtoupper($_POST['ante_instit_tel']);
            $applicant['ante_fecha_ret'] = mb_strtoupper($_POST['ante_fecha_ret']);
            $applicant['tiempoinstit'] = mb_strtoupper($_POST['tiempoinstit']);
            $applicant['madre'] = mb_strtoupper($_POST['madre']);
            $applicant['madre_document'] = mb_strtoupper($_POST['madre_document']);
            $applicant['madre_edad'] = mb_strtoupper($_POST['madre_edad']);
            $applicant['madre_prof'] = mb_strtoupper($_POST['madre_prof']);
            $applicant['madre_empresa'] = mb_strtoupper($_POST['madre_empresa']);
            $applicant['madre_cargo'] = mb_strtoupper($_POST['madre_cargo']);
            $applicant['madre_tel_ofi'] = mb_strtoupper($_POST['madre_tel_ofi']);
            $applicant['madre_tel_per'] = mb_strtoupper($_POST['madre_tel_per']);
            $applicant['madre_email'] = mb_strtoupper($_POST['madre_email']);
            $applicant['padre'] = mb_strtoupper($_POST['padre']);
            $applicant['padre_document'] = mb_strtoupper($_POST['padre_document']);
            $applicant['padre_edad'] = mb_strtoupper($_POST['padre_edad']);
            $applicant['padre_prof'] = mb_strtoupper($_POST['padre_prof']);
            $applicant['padre_empresa'] = mb_strtoupper($_POST['padre_empresa']);
            $applicant['padre_cargo'] = mb_strtoupper($_POST['padre_cargo']);
            $applicant['padre_tel_ofi'] = mb_strtoupper($_POST['padre_tel_ofi']);
            $applicant['padre_tel_per'] = mb_strtoupper($_POST['padre_tel_per']);
            $applicant['padre_email'] = mb_strtoupper($_POST['padre_email']);

            $applicant['parent_name'] = mb_strtoupper($_POST['parent_name']);
            $applicant['parent_phone'] = mb_strtoupper($_POST['parent_phone']);
            $applicant['parent_email'] = mb_strtoupper($_POST['parent_email']);
            $applicant['parent_address'] = mb_strtoupper($_POST['parent_address']);
            $applicant['parent_dni'] = mb_strtoupper($_POST['parent_dni']);
            $applicant['parent_profession'] = mb_strtoupper($_POST['parent_profession']);

            $applicant['observaciones'] = mb_strtoupper($_POST['observaciones']);
            $applicant['desarrollo_fisico'] = mb_strtoupper($_POST['desarrollo_fisico']);
            $applicant['desarrollo_psicologico_lenguaje'] = mb_strtoupper($_POST['desarrollo_psicologico_lenguaje']);
            $applicant['desarrollo_psicologico_aprendizaje'] = mb_strtoupper($_POST['desarrollo_psicologico_aprendizaje']);
            $applicant['desarrollo_psicologico_comportamiento'] = mb_strtoupper($_POST['desarrollo_psicologico_comportamiento']);
            $applicant['desarrollo_psicologico_afecto'] = mb_strtoupper($_POST['desarrollo_psicologico_afecto']);
            $applicant['desarrollo_psicologico_autocuidado'] = mb_strtoupper($_POST['desarrollo_psicologico_autocuidado']);
            $applicant['desarrollo_psicologico_remisiones'] = mb_strtoupper($_POST['desarrollo_psicologico_remisiones']);
            $applicant['ante_flia_nucleo_familiar'] = mb_strtoupper($_POST['ante_flia_nucleo_familiar']);
            $applicant['ante_flia_estado_civil_padres'] = mb_strtoupper($_POST['ante_flia_estado_civil_padres']);
            $applicant['ante_flia_relacion_entre_padres'] = mb_strtoupper($_POST['ante_flia_relacion_entre_padres']);
            $applicant['ante_flia_relacion_con_hermanos'] = mb_strtoupper($_POST['ante_flia_relacion_con_hermanos']);
            $applicant['hist_escolar_proc_academico'] = mb_strtoupper($_POST['hist_escolar_proc_academico']);
            $applicant['hist_escolar_relacion_companieros'] = mb_strtoupper($_POST['hist_escolar_relacion_companieros']);
            $applicant['hist_escolar_relacion_docentes'] = mb_strtoupper($_POST['hist_escolar_relacion_docentes']);
            $applicant['hist_escolar_comportamiento_escolar'] = mb_strtoupper($_POST['hist_escolar_comportamiento_escolar']);
            $applicant['hist_escolar_razones_windsor'] = mb_strtoupper($_POST['hist_escolar_razones_windsor']);

            $applicant['fecha_insc'] = date('Y-m-d');
            if($applicant['ante_fecha_ret'] == "") {
                $applicant['ante_fecha_ret'] = "1970-01-01";
            }

            if($this->applicant_m->insert_applicant($applicant)) {

                $applicantsID = $this->db->insert_id();
                $this->session->set_flashdata('success', $applicantsID);
                redirect(base_url("enroll/registered"));

            } else {

                $this->data["applicantsID"] = "";
                $this->data["classes"] = $this->classes_m->get_order_by_numeric_classes();
                $this->data["old"] = $applicant;
                $this->data["subview"] = "enroll/index";
                $this->load->view('_layout_enroll', $this->data);

            }

        } else {

            $this->data["applicantsID"] = "";
            $this->data["classes"] = $this->classes_m->get_order_by_numeric_classes();
            $this->data["old"] = array();
            $this->data["subview"] = "enroll/index";
            $this->load->view('_layout_enroll', $this->data);
        }

    }

    function registered() {
        if($this->session->flashdata('success')) {
            $this->data["subview"] = "enroll/registered";
            $this->load->view('_layout_enroll', $this->data);
        } else {
            redirect(base_url("enroll/index"));
        }
    }

}