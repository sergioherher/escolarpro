<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Dompdf\Dompdf;
class Psicology extends Admin_Controller {

	function __construct () {
		parent::__construct();
		$this->load->model("section_m");
		$this->load->model("classes_m");
		$this->load->model("setting_m");
		$this->load->model("idmanager_m");
		$this->load->model("applicant_m");
		$this->load->model("student_m");
		$this->load->model("parents_m");
		$this->load->model("studentrelation_m");
		
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
				'rules' => 'trim|required|max_length[50]|xss_clean'
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
				'label' => $this->lang->line("applicant_phone_1"),
				'rules' => 'trim|max_length[25]|min_length[5]|xss_clean'
			),
			array(
				'field' => 'telefono2',
				'label' => $this->lang->line("applicant_phone_1"),
				'rules' => 'trim|max_length[25]|min_length[5]|xss_clean'
			),
			array(
				'field' => 'direccion',
				'label' => $this->lang->line("applicant_address"),
				'rules' => 'trim|max_length[200]|xss_clean'
			),
			array(
				'field' => 'barrio',
				'label' => $this->lang->line("applicant_barrio"),
				'rules' => 'trim|max_length[200]|xss_clean'
			),
			array(
				'field' => 'depto_nac',
				'label' => $this->lang->line("applicant_state"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'pais_nac',
				'label' => $this->lang->line("applicant_country"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'ciudad_nac',
				'label' => $this->lang->line("applicant_city"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'classesID',
				'label' => $this->lang->line("applicant_classes"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_unique_classesID'
			),
			array(
				'field' => 'madre',
				'label' => $this->lang->line("applicant_mother_name"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'madre_document',
				'label' => $this->lang->line("applicant_mother_dni"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'madre_prof',
				'label' => $this->lang->line("applicant_mother_prof"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'madre_empresa',
				'label' => $this->lang->line("applicant_mother_employee"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'madre_cargo',
				'label' => $this->lang->line("applicant_mother_charge"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'madre_tel_ofi',
				'label' => $this->lang->line("applicant_mother_office_phone"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'madre_tel_per',
				'label' => $this->lang->line("applicant_mother_personal_phone"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'madre_email',
				'label' => $this->lang->line("applicant_mother_email"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'madre_edad',
				'label' => $this->lang->line("applicant_mother_age"),
				'rules' => 'trim|max_length[128]|xss_clean|numeric'
			),
			array(
				'field' => 'padre',
				'label' => $this->lang->line("applicant_father_name"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre_document',
				'label' => $this->lang->line("applicant_father_dni"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre_prof',
				'label' => $this->lang->line("applicant_father_prof"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre_empresa',
				'label' => $this->lang->line("applicant_father_employee"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre_cargo',
				'label' => $this->lang->line("applicant_father_charge"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),
			array(
				'field' => 'padre_tel_ofi',
				'label' => $this->lang->line("applicant_father_office_phone"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'padre_tel_per',
				'label' => $this->lang->line("applicant_father_personal_phone"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'padre_email',
				'label' => $this->lang->line("applicant_father_email"),
				'rules' => 'trim|max_length[128]|xss_clean'
			),			
			array(
				'field' => 'padre_edad',
				'label' => $this->lang->line("applicant_father_age"),
				'rules' => 'trim|max_length[128]|xss_clean|numeric'
			),
            
		);
		return $rules;
	}

	public function index() {

		$this->data['headerassets'] = array(
			'css' => array(
				'assets/datetimepicker/datetimepicker.css',
				'assets/datepicker/datepicker.css',
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/datetimepicker/moment.js',
				'assets/datetimepicker/datetimepicker.js',
				'assets/datepicker/datepicker.js',
				'assets/select2/select2.js'
			)
		);

		$usertypeID = $this->session->userdata('usertypeID');
		$id = htmlentities(escapeString($this->uri->segment(3)));
		$lap_or_class = explode("_", $id);
		if($usertypeID == 10 || $usertypeID == 1) {
			if(permissionChecker('psicology')) {
				if($lap_or_class['0'] == "class") {
					$this->data["classes"] = $this->classes_m->get_classes();
					$filter_applicant['grado_aspira'] = $lap_or_class[1];
					$filter_applicant['is_pago'] = 1;
					$filter_applicant['is_trasladado'] = 0;
					$this->data["applicants"] = $this->applicant_m->get_order_by_applicant($filter_applicant);
					$this->data["set"] = $id;
					$this->data["subview"] = "psicology/index";
					$this->load->view('_layout_main', $this->data);
				} elseif($lap_or_class['0'] == "lap") {
					$this->data["classes"] = $this->classes_m->get_classes();
					$filter_applicant['is_pago'] = 1;
					$filter_applicant['is_trasladado'] = 0;
					if($lap_or_class['1'] == 1) {
						$fecha = date('Y-m-d');
						$filter_applicant['fecha_insc'] = $fecha;
						$this->data["applicants"] = $this->applicant_m->get_order_by_applicant($filter_applicant);
					} elseif($lap_or_class['1'] == 2) {
						$time = strtotime('-1 days');
						$fecha = date('Y-m-d', $time);
						$filter_applicant['fecha_insc'] = $fecha;
						$this->data["applicants"] = $this->applicant_m->get_order_by_applicant($filter_applicant);
					} elseif($lap_or_class['1'] == 3) {
						$time = strtotime('-7 days');
						$fecha = date('Y-m-d', $time);
						$filter_applicant['fecha_insc >='] = $fecha;
						$this->data["applicants"] = $this->applicant_m->get_order_by_applicant($filter_applicant);
					} elseif($lap_or_class['1'] == 4) {
						$time = strtotime('-30 days');
						$fecha = date('Y-m-d', $time);
						$filter_applicant['fecha_insc >='] = $fecha;
						$this->data["applicants"] = $this->applicant_m->get_order_by_applicant($filter_applicant);
					} elseif($lap_or_class['1'] == 5) {
						$time = strtotime('-365 days');
						$fecha = date('Y-m-d', $time);
						$filter_applicant['fecha_insc >='] = $fecha;
						$this->data["applicants"] = $this->applicant_m->get_order_by_applicant($filter_applicant);
					}
					$this->data["set"] = $id;
					$this->data["subview"] = "psicology/index";
					$this->load->view('_layout_main', $this->data);
				} else {
					$this->data["classes"] = $this->classes_m->get_classes();
					$filter_applicant['is_pago'] = 1;
					$filter_applicant['is_trasladado'] = 0;
					$this->data["applicants"] = $this->applicant_m->get_order_by_applicant($filter_applicant);
					$this->data["subview"] = "psicology/index";
					$this->load->view('_layout_main', $this->data); 
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function add() {

		$this->data['headerassets'] = array(
			'css' => array(
				'assets/datepicker/datepicker.css',
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/datepicker/datepicker.js',
				'assets/select2/select2.js'
			)
		);

		$usertypeID = $this->session->userdata('usertypeID');
		if($usertypeID == 5 || $usertypeID == 1) {
			if(permissionChecker('applicant_add')) {

				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data["classes"] = $this->classes_m->get_classes();
						$this->data["subview"] = "applicant/add";
						$this->load->view('_layout_main', $this->data);
					} else {
						$array = array();
						$array["tipo_dcto"] = $this->input->post("tipo_dcto");
						$array["documento"] = $this->input->post("documento");
						$array["nombres"] = $this->input->post("nombres");
						$array["apellido1"] = $this->input->post("apellido1");
						$array["apellido2"] = $this->input->post("apellido2");
						$array["fecha_insc"] = date("Y-m-d");
						$array["fecha_nac"] = $this->input->post("fecha_nac");
						$array["sexo"] = $this->input->post("sexo");
						$array["grupo_sangre"] = $this->input->post("grupo_sangre");
						$array["grado_aspira"] = $this->input->post("classesID");
						$array["email"] = $this->input->post("email");
						$array["telefono1"] = $this->input->post("telefono1");
						$array["telefono2"] = $this->input->post("telefono2");
						$array["direccion"] = $this->input->post("direccion");
						$array["barrio"] = $this->input->post("barrio");
						$array["depto_nac"] = $this->input->post("depto_nac");
						$array["pais_nac"] = $this->input->post("pais_nac");
						$array['ante_instit'] = $this->input->post("ante_instit");
						$array['ante_instit_dir'] = $this->input->post("ante_instit_dir");
						$array['ante_instit_tel'] = $this->input->post('ante_instit_tel');
						$array['ante_grado'] = $this->input->post("ante_grado");
						$array['ante_fecha_ret'] = $this->input->post("ante_fecha_ret");
						$array['tiempoinstit'] = $this->input->post("tiempoinstit");
						$array['madre'] = $this->input->post("madre");
						$array['madre_document'] = $this->input->post("madre_document");
						$array['madre_prof'] = $this->input->post("madre_prof");
						$array['madre_empresa'] = $this->input->post("madre_empresa");
						$array['madre_cargo'] = $this->input->post("madre_cargo");
						$array['madre_tel_ofi'] = $this->input->post("madre_tel_ofi");
						$array['madre_tel_per'] = $this->input->post("madre_tel_per");
						$array['madre_email'] = $this->input->post("madre_email");
						$array['madre_edad'] = $this->input->post("madre_edad");
						$array['padre'] = $this->input->post("padre");
						$array['padre_document'] = $this->input->post("padre_document");
						$array['padre_prof'] = $this->input->post("padre_prof");
						$array['padre_empresa'] = $this->input->post("padre_empresa");
						$array['padre_cargo'] = $this->input->post("padre_cargo");
						$array['padre_tel_ofi'] = $this->input->post("padre_tel_ofi");
						$array['padre_tel_per'] = $this->input->post("padre_tel_per");
						$array['padre_email'] = $this->input->post("padre_email");
						$array['padre_edad'] = $this->input->post("padre_edad");
						$array['desarrollo_fisico'] = $this->input->post("desarrollo_fisico");
						$array['desarrollo_psicologico_lenguaje'] = $this->input->post("desarrollo_psicologico_lenguaje");
						$array['desarrollo_psicologico_aprendizaje'] = $this->input->post("desarrollo_psicologico_aprendizaje");
						$array['desarrollo_psicologico_comportamiento'] = $this->input->post("desarrollo_psicologico_comportamiento");
						$array['desarrollo_psicologico_afecto'] = $this->input->post("desarrollo_psicologico_afecto");
						$array['desarrollo_psicologico_autocuidado'] = $this->input->post("desarrollo_psicologico_autocuidado");
						$array['desarrollo_psicologico_remisiones'] = $this->input->post("desarrollo_psicologico_remisiones");
						$array['ante_flia_nucleo_familiar'] = $this->input->post("ante_flia_nucleo_familiar");
						$array['ante_flia_estado_civil_padres'] = $this->input->post("ante_flia_estado_civil_padres");
						$array['ante_flia_relacion_entre_padres'] = $this->input->post("ante_flia_relacion_entre_padres");
						$array['ante_flia_relacion_con_hermanos'] = $this->input->post("ante_flia_relacion_con_hermanos");
						$array['hist_escolar_proc_academico'] = $this->input->post("hist_escolar_proc_academico");
						$array['hist_escolar_relacion_companieros'] = $this->input->post("hist_escolar_relacion_companieros");
						$array['hist_escolar_relacion_docentes'] = $this->input->post("hist_escolar_relacion_docentes");
						$array['hist_escolar_comportamiento_escolar'] = $this->input->post("hist_escolar_comportamiento_escolar");
						$array['hist_escolar_razones_windsor'] = $this->input->post("hist_escolar_razones_windsor");
						$array['is_active'] = 1;
						$array['is_trasladado'] = 0;
						$array['is_fecha_entrev'] = 0;
						$array['is_fecha_eval'] = 0;
						$array['is_pago'] = 0;

						$this->applicant_m->insert_applicant($array);
						$applicantID = $this->db->insert_id();

						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("applicant/index"));
					}
				} else {
					$this->data["classes"] = $this->classes_m->get_classes();
					$this->data["subview"] = "applicant/add";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} 
	}

	public function edit() {
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/datepicker/datepicker.css',
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/datepicker/datepicker.js',
				'assets/select2/select2.js'
			)
		);
		$usertype = $this->session->userdata("usertype");
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if((int)$id) {
			$this->data['classes'] = $this->applicant_m->get_classes();
			$this->data['applicant'] = $this->applicant_m->get_single_applicant(array('applicantsID' => $id));
			if($this->data['applicant']) {
				if($_POST) {
					$rules = $this->rules();
					unset($rules[16]);
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data["subview"] = "applicant/edit";
						$this->load->view('_layout_main', $this->data);
					} else {
						$array = array();
						$array["tipo_dcto"] = $this->input->post("tipo_dcto");
						$array["documento"] = $this->input->post("documento");
						$array["nombres"] = $this->input->post("nombres");
						$array["apellido1"] = $this->input->post("apellido1");
						$array["apellido2"] = $this->input->post("apellido2");
						$array["fecha_insc"] = date("Y-m-d");
						$array["fecha_nac"] = $this->input->post("fecha_nac");
						$array["sexo"] = $this->input->post("sexo");
						$array["grupo_sangre"] = $this->input->post("grupo_sangre");
						$array["grado_aspira"] = $this->input->post("classesID");
						$array["email"] = $this->input->post("email");
						$array["telefono1"] = $this->input->post("telefono1");
						$array["telefono2"] = $this->input->post("telefono2");
						$array["direccion"] = $this->input->post("direccion");
						$array["barrio"] = $this->input->post("barrio");
						$array["depto_nac"] = $this->input->post("depto_nac");
						$array["pais_nac"] = $this->input->post("pais_nac");
						$array['ante_instit'] = $this->input->post("ante_instit");
						$array['ante_instit_dir'] = $this->input->post("ante_instit_dir");
						$array['ante_instit_tel'] = $this->input->post('ante_instit_tel');
						$array['ante_grado'] = $this->input->post("ante_grado");
						$array['ante_fecha_ret'] = $this->input->post("ante_fecha_ret");
						$array['tiempoinstit'] = $this->input->post("tiempoinstit");
						$array['madre'] = $this->input->post("madre");
						$array['madre_document'] = $this->input->post("madre_document");
						$array['madre_prof'] = $this->input->post("madre_prof");
						$array['madre_empresa'] = $this->input->post("madre_empresa");
						$array['madre_cargo'] = $this->input->post("madre_cargo");
						$array['madre_tel_ofi'] = $this->input->post("madre_tel_ofi");
						$array['madre_tel_per'] = $this->input->post("madre_tel_per");
						$array['madre_email'] = $this->input->post("madre_email");
						$array['madre_edad'] = $this->input->post("madre_edad");
						$array['padre'] = $this->input->post("padre");
						$array['padre_document'] = $this->input->post("padre_document");
						$array['padre_prof'] = $this->input->post("padre_prof");
						$array['padre_empresa'] = $this->input->post("padre_empresa");
						$array['padre_cargo'] = $this->input->post("padre_cargo");
						$array['padre_tel_ofi'] = $this->input->post("padre_tel_ofi");
						$array['padre_tel_per'] = $this->input->post("padre_tel_per");
						$array['padre_email'] = $this->input->post("padre_email");
						$array['padre_edad'] = $this->input->post("padre_edad");
						$array['desarrollo_fisico'] = $this->input->post("desarrollo_fisico");
						$array['desarrollo_psicologico_lenguaje'] = $this->input->post("desarrollo_psicologico_lenguaje");
						$array['desarrollo_psicologico_aprendizaje'] = $this->input->post("desarrollo_psicologico_aprendizaje");
						$array['desarrollo_psicologico_comportamiento'] = $this->input->post("desarrollo_psicologico_comportamiento");
						$array['desarrollo_psicologico_afecto'] = $this->input->post("desarrollo_psicologico_afecto");
						$array['desarrollo_psicologico_autocuidado'] = $this->input->post("desarrollo_psicologico_autocuidado");
						$array['desarrollo_psicologico_remisiones'] = $this->input->post("desarrollo_psicologico_remisiones");
						$array['ante_flia_nucleo_familiar'] = $this->input->post("ante_flia_nucleo_familiar");
						$array['ante_flia_estado_civil_padres'] = $this->input->post("ante_flia_estado_civil_padres");
						$array['ante_flia_relacion_entre_padres'] = $this->input->post("ante_flia_relacion_entre_padres");
						$array['ante_flia_relacion_con_hermanos'] = $this->input->post("ante_flia_relacion_con_hermanos");
						$array['hist_escolar_proc_academico'] = $this->input->post("hist_escolar_proc_academico");
						$array['hist_escolar_relacion_companieros'] = $this->input->post("hist_escolar_relacion_companieros");
						$array['hist_escolar_relacion_docentes'] = $this->input->post("hist_escolar_relacion_docentes");
						$array['hist_escolar_comportamiento_escolar'] = $this->input->post("hist_escolar_comportamiento_escolar");
						$array['hist_escolar_razones_windsor'] = $this->input->post("hist_escolar_razones_windsor");

						$this->applicant_m->update_applicant($array, $id);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("applicant/index"));
					}
				} else {
					$this->data["subview"] = "applicant/edit";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}

	}

	public function date_valid($date) {
		if($date) {
			if(strlen($date) <10) {
				$this->form_validation->set_message("date_valid", "%s no es un formato valido yyyy-mm-dd");
		     	return FALSE;
			} else {
		   		$arr = explode("-", $date);
		        $yyyy = $arr[0];
		        $mm = $arr[1];
		        $dd = $arr[2];
		      	if(checkdate($mm, $dd, $yyyy)) {
		      		return TRUE;
		      	} else {
		      		$this->form_validation->set_message("date_valid", "%s no es un formato valido yyyy-mm-dd");
		     		return FALSE;
		      	}
		    }
		}
		return TRUE;
	}

	public function unique_email() {
		if($this->input->post('email')) {
			$id = htmlentities(escapeString($this->uri->segment(3)));
			if((int)$id) {
				$applicant_info = $this->applicant_m->get_single_applicant(array('applicantsID' => $id));
				$tables = array('applicants' => 'applicants');
				$array = array();
				$i = 0;
				foreach ($tables as $table) {
					$user = $this->applicant_m->get_username($table, array("email" => $this->input->post('email'), 'applicantsID !=' => $applicant_info->applicantsID));
					if(count($user)) {
						$this->form_validation->set_message("unique_email", "%s ya existe.");
						$array['permition'][$i] = 'no';
					} else {
						$array['permition'][$i] = 'yes';
					}
					$i++;
				}
				if(in_array('no', $array['permition'])) {
					return FALSE;
				} else {
					return TRUE;
				}
			} else {
				$tables = array('applicants' => 'applicants');
				$array = array();
				$i = 0;
				foreach ($tables as $table) {
					$user = $this->applicant_m->get_username($table, array("email" => $this->input->post('email')));
					if(count($user)) {
						$this->form_validation->set_message("unique_email", "%s ya existe.");
						$array['permition'][$i] = 'no';
					} else {
						$array['permition'][$i] = 'yes';
					}
					$i++;
				}

				if(in_array('no', $array['permition'])) {
					return FALSE;
				} else {
					return TRUE;
				}
			}
		}
		return TRUE;
	}

	public function delete() {
		$usertype = $this->session->userdata("usertype");
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if ((int)$id) {
			$this->data['applicant'] = $this->applicant_m->get_single_applicant(array('applicantsID' => $id));
			if($this->data['applicant']) {
				$this->applicant_m->delete_applicant($id);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("applicant/index"));
			} else {
				redirect(base_url("applicant/index"));
			}
		} else {
			redirect(base_url("applicant/index"));
		}

	}

	public function payment() {
		$usertype = $this->session->userdata("usertype");
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if ((int)$id) {
			$this->data['applicant'] = $this->applicant_m->get_single_applicant(array('applicantsID' => $id));
			if($this->data['applicant']) {
				$this->applicant_m->update_applicant(array('is_pago' => 1), $id);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("applicant/index"));
			} else {
				redirect(base_url("applicant/index"));
			}
		} else {
			redirect(base_url("applicant/index"));
		}

	}

	public function unique_classesID() {
		if($this->input->post('classesID') == 0) {
			$this->form_validation->set_message("unique_classesID", "%s es requerido.");
	     	return FALSE;
		}
		return TRUE;
	}

	public function applicant_list() {
		$classID = $this->input->post('id');
		$lapTime = $this->input->post('lap');
		if((int)$classID) {
			$string = base_url("psicology/index/class_$classID");
			echo $string;
		} elseif((int)$lapTime) {
			$string = base_url("psicology/index/lap_$lapTime");
			echo $string;
		} else {
			redirect(base_url("psicology/index"));
		}
	}

	public function active() {
		if(permissionChecker('applicant_edit')) {
			$id = $this->input->post('id');
			$status = $this->input->post('status');
			if($id != '' && $status != '') {
				if((int)$id) {
					if($status == 'chacked') {
						$this->applicant_m->update_applicant(array('is_active' => 1), $id);
						echo 'Success';
					} elseif($status == 'unchacked') {
						$this->applicant_m->update_applicant(array('is_active' => 0), $id);
						echo 'Success';
					} else {
						echo "Error";
					}
				} else {
					echo "Error";
				}
			} else {
				echo "Error";
			}
		} else {
			echo "Error";
		}
	}

	public function set_fecha_entrev() {

		$fecha_entrev = $this->input->post('fecha_entrev');
		$id = $this->input->post('id');

		if($this->applicant_m->update_applicant(array('fecha_entrev' => $fecha_entrev), $id)) {
			echo json_encode(array("success" => true, "title" => $this->lang->line('applicant_title_fecha_entrev'), "message" => $this->lang->line('applicant_test_fecha_set'), "id" => $id));
		} else {
			echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_fecha_entrev'), "message" => $this->lang->line('applicant_test_fecha_error'), "id" => $id));
		}
	}

	public function set_fecha_eval() {

		$fecha_eval = $this->input->post('fecha_eval');
		$id = $this->input->post('id');

		if($this->applicant_m->update_applicant(array('fecha_eval' => $fecha_eval), $id)) {
			echo json_encode(array("success" => true, "title" => $this->lang->line('applicant_title_fecha_eval'), "message" => $this->lang->line('applicant_eval_fecha_set'), "id" => $id));
		} else {
			echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_fecha_eval'), "message" => $this->lang->line('applicant_eval_fecha_error'), "id" => $id));
		}
	}

	public function set_is_fecha_entrev() {

		$is_fecha_entrev = $this->input->post('is_fecha_entrev');
		$id = $this->input->post('id');

		if($this->applicant_m->update_applicant(array('is_fecha_entrev' => $is_fecha_entrev), $id)) {
			echo json_encode(array("success" => true, "title" => $this->lang->line('applicant_title_is_fecha_entrev'), "message" => $this->lang->line('applicant_is_entrev_fecha_set'), "id" => $id));
		} else {
			echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_is_fecha_entrev'), "message" => $this->lang->line('applicant_is_entrev_fecha_error'), "id" => $id));
		}
	}

	public function set_is_fecha_eval() {

		$is_fecha_eval = $this->input->post('is_fecha_eval');
		$id = $this->input->post('id');

		if($this->applicant_m->update_applicant(array('is_fecha_eval' => $is_fecha_eval), $id)) {
			echo json_encode(array("success" => true, "title" => $this->lang->line('applicant_title_is_fecha_eval'), "message" => $this->lang->line('applicant_is_eval_fecha_set'), "id" => $id));
		} else {
			echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_is_fecha_eval'), "message" => $this->lang->line('applicant_is_eval_fecha_error'), "id" => $id));
		}
	}

	public function applicant_to_modal() {
		if(permissionChecker('applicant_view')) {
			$id = $this->input->post('id');
			if($id != '') {
				if((int)$id) {
					$applicant = $this->applicant_m->get_single_applicant(array('applicantsID
						' => $id));
					echo json_encode(array("success" => true, "title" => $this->lang->line('applicant_load'), "message" => $this->lang->line('applicant_load'), "applicant" => $applicant));
				} else {
					echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_error'), "message" => $this->lang->line('applicant_error'), "id" => $id));
				}
			} else {
				echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_error'), "message" => $this->lang->line('applicant_error'), "id" => $id));
			}
		} else {
			echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_error'), "message" => $this->lang->line('applicant_permission_error'), "id" => $id));
		}
	}

	public function modal_edit_applicant() {

		if(permissionChecker('applicant_edit')) {

			$applicantsID = $this->input->post('applicantsID'); 

			$applicant = $this->applicant_m->get_single_applicant(array('applicantsID' => $applicantsID));

            $desarrollo_fisico = $this->input->post('desarrollo_fisico'); 
            $desarrollo_psicologico_lenguaje = $this->input->post('desarrollo_psicologico_lenguaje'); 
            $desarrollo_psicologico_aprendizaje = $this->input->post('desarrollo_psicologico_aprendizaje'); 
            $desarrollo_psicologico_comportamiento = $this->input->post('desarrollo_psicologico_comportamiento'); 
            $desarrollo_psicologico_afecto = $this->input->post('desarrollo_psicologico_afecto'); 
            $desarrollo_psicologico_autocuidado = $this->input->post('desarrollo_psicologico_autocuidado'); 
            $desarrollo_psicologico_remisiones = $this->input->post('desarrollo_psicologico_remisiones'); 
            $ante_flia_nucleo_familiar = $this->input->post('ante_flia_nucleo_familiar'); 
            $ante_flia_estado_civil_padres = $this->input->post('ante_flia_estado_civil_padres'); 
            $ante_flia_relacion_entre_padres = $this->input->post('ante_flia_relacion_entre_padres'); 
            $ante_flia_relacion_con_hermanos = $this->input->post('ante_flia_relacion_con_hermanos'); 
            $hist_escolar_proc_academico = $this->input->post('hist_escolar_proc_academico'); 
            $hist_escolar_relacion_companieros = $this->input->post('hist_escolar_relacion_companieros'); 
            $hist_escolar_relacion_docentes = $this->input->post('hist_escolar_relacion_docentes'); 
            $hist_escolar_comportamiento_escolar = $this->input->post('hist_escolar_comportamiento_escolar'); 
            $hist_escolar_razones_windsor = $this->input->post('hist_escolar_razones_windsor'); 

            $data = array(
	            'desarrollo_fisico' => $desarrollo_fisico, 
	            'desarrollo_psicologico_lenguaje' => $desarrollo_psicologico_lenguaje, 
	            'desarrollo_psicologico_aprendizaje' => $desarrollo_psicologico_aprendizaje, 
	            'desarrollo_psicologico_comportamiento' => $desarrollo_psicologico_comportamiento, 
	            'desarrollo_psicologico_afecto' => $desarrollo_psicologico_afecto, 
	            'desarrollo_psicologico_autocuidado' => $desarrollo_psicologico_autocuidado, 
	            'desarrollo_psicologico_remisiones' => $desarrollo_psicologico_remisiones, 
	            'ante_flia_nucleo_familiar' => $ante_flia_nucleo_familiar, 
	            'ante_flia_estado_civil_padres' => $ante_flia_estado_civil_padres, 
	            'ante_flia_relacion_entre_padres' => $ante_flia_relacion_entre_padres, 
	            'ante_flia_relacion_con_hermanos' => $ante_flia_relacion_con_hermanos, 
	            'hist_escolar_proc_academico' => $hist_escolar_proc_academico, 
	            'hist_escolar_relacion_companieros' => $hist_escolar_relacion_companieros, 
	            'hist_escolar_relacion_docentes' => $hist_escolar_relacion_docentes, 
	            'hist_escolar_comportamiento_escolar' => $hist_escolar_comportamiento_escolar, 
	            'hist_escolar_razones_windsor' => $hist_escolar_razones_windsor 
        	);

            if($this->applicant_m->update_applicant($data, $applicantsID)) {
            	echo json_encode(array("success" => true, "title" => $this->lang->line('applicant_title_psico_file_edit'), "message" => $this->lang->line('applicant_psico_file_edit').": ".$applicant->nombres." ".$applicant->apellido1, "id" => $applicantsID));
            } else {
            	echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_error'), "message" => $this->lang->line('applicant_error'), "id" => $id));
            }
			
		} else {
			echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_error'), "message" => $this->lang->line('applicant_permission_error'), "id" => $id));
		}
	}

	public function transfer_applicant() {

		$id = $this->input->post('id'); 

		$applicant = $this->applicant_m->get_single_applicant(array('applicantsID' => $id));

		if($applicant->is_trasladado == 0) {

			$parent_username = explode('@', $applicant->parent_email);
			$parent_password = $this->student_m->hash($parent_username[0]);

			$data_parent = 	array(
								'dni' => $applicant->parent_dni, 
								'name' => $applicant->parent_name, 
								'father_name' => $applicant->padre, 
								'mother_name' => $applicant->madre, 
								'father_profession' => $applicant->padre_prof,
								'mother_profession' => $applicant->madre_prof,							
								'email' => $applicant->parent_email,
								'phone' => $applicant->parent_phone,
								'address' => $applicant->parent_address,
								'photo' => 'default.png',
								'username' => $parent_username[0],
								'password' => $parent_password,
								'usertypeID' => 4,
								'create_date' => date('Y-m-d'),
								'modify_date' => date('Y-m-d'),
								'create_userID' => 1,
								'create_username' => 'admin',
								'create_usertype' => 1,
								'active' => 1,
							);

			if($parent_inserted = $this->parents_m->insert_parents($data_parent)) {
			
				$parentsID = $this->db->insert_id();

				$section = $this->section_m->get_single_section(array('classesID' => $applicant->grado_aspira));
				$classes = $this->classes_m->get_classes($applicant->grado_aspira);

				if(count($classes)) {
					$setClasses = $classes->classes;
				} else {
					$setClasses = NULL;
				}

				if(count($section)) {
					$setSection = $section->section;
				} else {
					$setSection = NULL;
				}

				$student_username = explode('@', $applicant->email);
				$student_password = $this->student_m->hash($student_username[0]);

				$data_student = array(
									    'dni' => $applicant->documento, 
									  	'name' => $applicant->nombres." ".$applicant->apellido1." ".$applicant->apellido2, 
									  	'dob' => $applicant->fecha_nac,
									  	'sex' => $applicant->sexo,
									  	'email' => $applicant->email,
									  	'phone' => $applicant->telefono1,
									  	'address' => $applicant->direccion,
									  	'classesID' => $applicant->grado_aspira,
									  	'roll' => 3,
									  	'bloodgroup' => $applicant->grupo_sangre,
									  	'country' => $applicant->pais_nac,
									  	'registerNO' => $applicant->applicantsID, 
									  	'state' => $applicant->depto_nac,
									  	'schoolyearID' => $this->data['siteinfos']->school_year,
										'parentID' => $parentsID,
									  	'sectionID' => $section->sectionID,
									  	'library' => 0,
									  	'hostel' => 0,
									  	'transport' => 0,
									  	'create_date' => date("Y-m-d"),
									  	'createschoolyearID' => $this->data['siteinfos']->school_year,
									  	'schoolyearID' => $this->data['siteinfos']->school_year,
									  	'create_date' => date("Y-m-d h:i:s"),
									  	'modify_date' => date("Y-m-d h:i:s"),
									  	'create_userID' => 1,
									  	'create_username' => 'admin',
									  	'create_usertype' => 1,
									  	'active' => 1,
									  	'username' => $student_username[0],
									  	'password' => $student_password,
									  	'usertypeID' => 3,
									  	'photo' => 'default.png'
									);

				if($student_inserted = $this->student_m->insert_student($data_student)) {

					$studentID = $this->db->insert_id();

					$arrayStudentRelation = array(
						'srstudentID' => $studentID,
						//'srdni' => $this->input->post("dni"),
						'srname' => $applicant->nombres." ".$applicant->apellido1." ".$applicant->apellido2,
						'srclassesID' => $applicant->grado_aspira,
						'srclasses' => $setClasses,
						'srroll' => 3,
						'srregisterNO' => $studentID,
						'srsectionID' => $section->sectionID,
						'srsection' => $setSection,
						'srschoolyearID' => $this->data['siteinfos']->school_year
					);
					
					$this->studentrelation_m->insert_studentrelation($arrayStudentRelation);
					
					$this->applicant_m->update_applicant(array('is_trasladado' => 1),$applicant->applicantsID);
					
					echo json_encode(array("success" => true, "title" => $this->lang->line('applicant_title_treansfer'), "message" => $this->lang->line('applicant_transfered'), 'id' => $id));
				
				} else {

					$this->parents_m->delete_parents($parentsID); 
				
					echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_treansfer'), "message" => $this->lang->line('applicant_transfer_error_student_insert_error')));
				
				}
			} else {
				echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_treansfer'), "message" => $this->lang->line('applicant_transfer_error_parent_insert_error')));
			}
		} else{
			echo json_encode(array("success" => false, "title" => $this->lang->line('applicant_title_treansfer'), "message" => $this->lang->line('applicant_transfer_error_applicant_transfered')));
		}
	}
}

/* End of file applicant.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/applicant.php */
