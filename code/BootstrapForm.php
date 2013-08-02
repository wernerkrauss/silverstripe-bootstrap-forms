<?php

/**
 * Builds a form that renders {@link FormField} objects
 * using templates that are compatible with Twitter Bootstrap.
 * Extra methods are decorated on to the {@link BootstrapFormField}
 * objects and their subclasses to support special features
 * of the framework.
 *
 * @author Uncle Cheese <unclecheese@leftandmain.com>
 * @package boostrap_forms
 */
class BootstrapForm extends Form {
	



	/**
	 * @var string The template that will render this form
	 */
	protected $template = "BootstrapForm";



	/**
	 * @var string The layout of the form.
	 * @see BootstrapForm::setLayout()
	 */
	protected $formLayout = "vertical";

	/**
	 * @var bool Switch for marking required fields with class .required and attribute required="required"
	 */
	private static $markRequiredFields = true;


	public function __construct($controller, $name, FieldList $fields, FieldList $actions, $validator = null) {
		if (self::$markRequiredFields && is_a($validator,'RequiredFields')) {
			foreach($fields as $field) {
				if ($validator->fieldIsRequired($field->getName())) {
					$field->addExtraClass('required');
					$field->addHolderClass('required');
					$field->setAttribute('required','required');
				}
			}
		}

		parent::__construct($controller, $name, $fields,  $actions, $validator);
	}


	/**
	 * Sets form to disable/enable inclusion of Bootstrap CSS
	 *
	 * @deprecated In 3.1
	 * @param bool $bool
	 */
	public static function set_bootstrap_included($bool = true) {
		Config::inst()->set("BootstrapForm","bootstrap_included",$bool);
	}




	/**
	 * Sets form to disable/enable inclusion of jQuery
	 *
	 * @deprecated In 3.1
	 * @param bool $bool
	 */
	public static function set_jquery_included($bool = true) {
		Config::inst()->set("BootstrapForm","jquery_included",$bool);
	}


	/**
	 * Changes the templates of all the {@link FormField}
	 * objects in a given {@link FieldList} object to those
	 * that work the Bootstrap framework
	 *
	 * @param FieldList $fields
	 */
	public static function apply_bootstrap_to_fieldlist($fields) {
		$fields->bootstrapify();
	}




	/**
	 * Applies the Bootstrap transformation to the fields and actiosn
	 * of the form
	 *
	 * @return BootstrapForm
	 */
	public function applyBootstrap() {
		$this->applyBootstrapToFieldList($this->Fields());
		$this->applyBootstrapToFieldList($this->Actions());
		return $this;
	}



	/**
	 * Changes the templates of all the {@link FormField}
	 * objects in a given {@link FieldList} object to those
	 * that work the Bootstrap framework
	 *
	 * @param FieldList $fields
	 * @return BootstrapForm
	 */
	protected function applyBootstrapToFieldList($fields) {
		self::apply_bootstrap_to_fieldlist($fields);
		return $this;
	}



	/**
	 * Sets the desired layout of the form. Options include:
	 *		- "vertical" (default)
	 *		- "horizontal"
	 *		- "inline"
	 *		- "search"
	 *
	 * @todo Add template support for "inline"
	 * @param string $layout The desired layout to use
	 * @return BootstrapForm
	 */
	public function setLayout($layout) {
		$this->formLayout = trim(strtolower($layout));
		return $this;
	}



	/**
	 * Adds a "well," or sunken background and border, to the form
	 *
	 * @return BootstrapForm
	 */
	public function addWell() {
		return $this->addExtraClass("well");
	}



	/**
	 * Includes the dependency if necessary, applies the Bootstrap templates,
	 * and renders the form HTML output
	 *
	 * @return string
	 */
	public function forTemplate() {
		if(!$this->stat('bootstrap_included')) {
			Requirements::css('bootstrap_forms/css/bootstrap.css');
		}
		if(!$this->stat('jquery_included')) {
			Requirements::javascript(THIRDPARTY_DIR."/jquery/jquery.js");
		}
		Requirements::javascript("bootstrap_forms/javascript/bootstrap_forms.js");
		$this->addExtraClass("form-{$this->formLayout}");
		$this->applyBootstrap();
		return parent::forTemplate();
	}

        /**
         * uses a template for rendering the form in a modal box
         * @return \BootstrapForm
         */
        
        public function setModal() {
            $this->template = 'BootstrapForm_Modal';
            return $this;
        }


}
