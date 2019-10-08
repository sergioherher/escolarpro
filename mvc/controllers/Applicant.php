<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Dompdf\Dompdf;
class Applicant extends Admin_Controller {

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
				'assets/datepicker/datepicker.css',
				'assets/datetimepicker/datetimepicker.css',
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/datepicker/datepicker.js',
				'assets/datetimepicker/datetimepicker.js',
				'assets/select2/select2.js'
			)
		);

		$usertypeID = $this->session->userdata('usertypeID');
		$id = htmlentities(escapeString($this->uri->segment(3)));
		if($usertypeID == 5 || $usertypeID == 1) {
			if(permissionChecker('applicant')) {
				if((int)$id) {
					$this->data["classes"] = $this->classes_m->get_classes();
					$grado['grado_aspira'] = $id;
					$this->data["applicants"] = $this->applicant_m->get_order_by_applicant($grado);
					$this->data["set"] = $id;
					$this->data["subview"] = "applicant/index";
					$this->load->view('_layout_main', $this->data);
				} else {
					$this->data["classes"] = $this->classes_m->get_classes();
					$this->data["applicants"] = $this->applicant_m->get_applicant();
					$this->data["subview"] = "applicant/index";
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
		if((int)$classID) {
			$string = base_url("applicant/index/$classID");
			echo $string;
		} else {
			redirect(base_url("applicant/index"));
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
}

/* End of file applicant.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/applicant.php */
