<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Applicant_m extends MY_Model {

	protected $_table_name = 'applicants';
	protected $_primary_key = 'applicantsID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "nombres asc";

	function __construct() {
		parent::__construct();
	}

	function get_classes() {
		$this->db->select('*')->from('classes')->order_by('classes_numeric asc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_applicant($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function insert_applicant($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_applicant($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	function delete_applicant($id){
		parent::delete($id);
	}

	function get_single_applicant($array) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_username($table, $data=NULL) {
		$query = $this->db->get_where($table, $data);
		return $query->result();
	}
}