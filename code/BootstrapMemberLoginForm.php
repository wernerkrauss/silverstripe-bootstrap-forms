<?php

class BootstrapMemberLoginForm extends MemberLoginForm {


	public function __construct($controller = null, $name = null, $fields = null, $actions = null, $checkCurrentUser = true) {
		if(!$controller) $controller = Controller::curr();
		if(!$name) $name = "LoginForm";
		parent::__construct($controller, $name, $fields, $actions, $checkCurrentUser);
		$this->Fields()->bootstrapify();
		$this->Actions()->bootstrapify();
		$this->setTemplate("BootstrapForm");
                //wmk
//		$this->setTemplate("BootstrapForm_Modal");
                
                $fields = $this->Fields();
                
                $mail = $fields->fieldByName('Email');
                
                if ($mail) {
                    $mail->setIcon('user');
                    $fields->replaceField('Email', $mail);
                }
                
                $pass = $fields->fieldByName('Password');
                
                if ($pass) {
                    $pass->setIcon('lock');
                    $fields->replaceField('Password', $pass);
                }               
                
                $actions = $this->Actions();
                $loginBtn = $actions->fieldByName('action_dologin');
                if ($loginBtn) {
                    $loginBtn->setStyle('primary');
                    $actions->replaceField('action_dologin', $loginBtn);
                }
                $logoutBtn = $actions->fieldByName('action_logout');
                if ($logoutBtn) {
                    $logoutBtn->setStyle('primary');
                    $actions->replaceField('action_logout', $logoutBtn);
                }
                
                $this->setFields($fields);
                $this->setActions($actions);
	}

}