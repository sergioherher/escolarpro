<!-- <php  
function timez() {
		$timezone = $this->input->post('timezone');

			$file = $this->config->index_path;
			$filecontent = "date_default_timezone_set('". $timezone ."');";
			$fileArray = array(2 => $filecontent);
			$this->replace_lines($file, $fileArray);
			@chmod($this->config->index_path, 0644);
	}
?> -->