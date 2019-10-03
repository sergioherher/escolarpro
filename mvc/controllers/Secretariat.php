<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Dompdf\Dompdf;
class Secretariat extends Admin_Controller {

	function __construct () {
		parent::__construct();
		$this->load->model("section_m");
		$this->load->model("classes_m");
		$this->load->model("setting_m");
		$this->load->model("idmanager_m");
		$this->load->model("applicant_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('applicant', $language);
	}

	protected function rules() {
		$rules = array(
			array(
				'field' => 'nombres',
				'label' => $this->lang->line("applicant_name"),
				'rules' => 'trim|required|xss_clean|max_length[60]'
			),
			array(
				'field' => 'apellido1',
				'label' => $this->lang->line("applicant_last_name"),
				'rules' => 'trim|max_length[10]|xss_clean'
			),
			array(
				'field' => 'apellido2',
				'label' => $this->lang->line("applicant_last_name"),
				'rules' => 'trim|max_length[10]|xss_clean'
			),
			array(
				'field' => 'fecha_insc',
				'label' => $this->lang->line("applicant_birth_date"),
				'rules' => 'trim|max_length[10]|callback_date_valid|xss_clean'
			),
			array(
				'field' => 'documento',
				'label' => $this->lang->line("applicant_document"),
				'rules' => 'trim|max_length[10]|xss_clean'
			),
			array(
				'field' => 'tipo_dcto',
				'label' => $this->lang->line("applicant_dni_type"),
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'sexo',
				'label' => $this->lang->line("applicant_sex"),
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'fecha_nac',
				'label' => $this->lang->line("applicant_birth_date"),
				'rules' => 'trim|max_length[10]|callback_date_valid|xss_clean'
			),
			array(
				'field' => 'grupo_sangre',
				'label' => $this->lang->line("applicant_bloodgroup"),
				'rules' => 'trim|max_length[5]|xss_clean'
			),
			array(
				'field' => 'email',
				'label' => $this->lang->line("applicant_email"),
				'rules' => 'trim|max_length[40]|valid_email|xss_clean|callback_unique_email'
			),
			array(
				'field' => 'telefono1',
				'label' => $this->lang->line("student_phone_1"),
				'rules' => 'trim|max_length[25]|min_length[5]|xss_clean'
			),
			array(
				'field' => 'telefono2',
				'label' => $this->lang->line("student_phone_1"),
				'rules' => 'trim|max_length[25]|min_length[5]|xss_clean'
			),
			array(
				'field' => 'direccion',
				'label' => $this->lang->line("student_address"),
				'rules' => 'trim|max_length[200]|xss_clean'
			),
			array(
				'field' => 'barrio',
				'label' => $this->lang->line("student_barrio"),
				'rules' => 'trim|max_length[200]|xss_clean'
			),
			array(
				'field' => 'depto_nac',
				'label' => $this->lang->line("student_state"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'pais_nac',
				'label' => $this->lang->line("student_country"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'ciudad_nac',
				'label' => $this->lang->line("student_city"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'classesID',
				'label' => $this->lang->line("student_classes"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_unique_classesID'
			),
			array(
				'field' => 'madre',
				'label' => $this->lang->line("student_mother_name"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'madre_document',
				'label' => $this->lang->line("student_mother_dni"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'madre_prof',
				'label' => $this->lang->line("student_mother_prof"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'madre_empresa',
				'label' => $this->lang->line("student_mother_employee"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'madre_cargo',
				'label' => $this->lang->line("student_mother_charge"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'madre_tel_ofi',
				'label' => $this->lang->line("student_mother_office_phone"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'madre_tel_per',
				'label' => $this->lang->line("student_mother_personal_phone"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'madre_email',
				'label' => $this->lang->line("student_mother_email"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'madre_edad',
				'label' => $this->lang->line("student_mother_age"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre',
				'label' => $this->lang->line("student_father_name"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre_document',
				'label' => $this->lang->line("student_father_dni"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre_prof',
				'label' => $this->lang->line("student_father_prof"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre_empresa',
				'label' => $this->lang->line("student_father_employee"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre_cargo',
				'label' => $this->lang->line("student_father_charge"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre_tel_ofi',
				'label' => $this->lang->line("student_father_office_phone"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'padre_tel_per',
				'label' => $this->lang->line("student_father_personal_phone"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'padre_email',
				'label' => $this->lang->line("student_father_email"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'padre_edad',
				'label' => $this->lang->line("student_father_age"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
            
		);
		return $rules;
	}

	public function index() {
		$usertypeID = $this->session->userdata('usertypeID');
		if($usertypeID == 3 || $usertypeID == 1) {
			if(permissionChecker('secretariat')) {
				$this->data["applicants"] = $this->applicant_m->get_applicant();
				$this->data["subview"] = "secretariat/index";
				$this->load->view('_layout_main', $this->data);
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} 
	}
}

/* End of file student.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/student.php */
