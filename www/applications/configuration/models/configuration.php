<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Configuration_Model extends ZP_Model {
		
	public function __construct() {
		$this->Db = $this->db();
				
		$this->table = "configuration";

		$this->Data = $this->core("Data");
	}
	
	public function cpanel($action, $limit = NULL, $order = "Language DESC", $search = NULL, $field = NULL, $trash = FALSE) {		
		if($action === "edit") {
			$validation = $this->editOrSave();
			
			if($validation) {
				return $validation;
			}
		}
		
		if($action === "all") {
			return $this->all();
		} elseif($action === "edit") {
			return $this->edit();															
		}
	}	
	
	public function editOrSave() {
		$validations = array(
			"name" 			=> "required",
			"URL" 			=> "required",
			"email_recieve" => "email?",
			"email_send"	=> "email?",
		);

		$data = array(
			"Lang" => getLang(POST("language"))
		);

		$this->data = $this->Data->proccess($data, $validations);

		if(isset($this->data["error"])) {
			return $this->data["error"];
		}
	}
	
	public function edit() {
		$this->helper("alerts");
		
		$this->Db->update($this->table, $this->data, 1);
		
		return getAlert(__("The configuration has been edited correctly"), "success");
	}
	
	public function getByID() { 				
		return $this->Db->find(1, $this->table, "Name, Slogan_English, Slogan_Spanish, Slogan_French, Slogan_Portuguese, URL, Lang, Language, Theme, Validation, Application, Editor, Message, Activation, Email_Recieve, Email_Send, Situation");
	}

	public function getConfig() {
		return $this->getByID();
	}	

	public function getCountries() {
		return $this->Db->findAll("world", "DISTINCT Country", NULL, "Country ASC");
	}
}