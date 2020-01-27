<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends MX_Controller {

	public function __construct()
	{
		parent::__construct();

		
		$this->load->helper('url');
		$this->load->library('grocery_crud');
		$this->load->model('Grocery_crud_model');
	}
	
	//********** Contoh CRUD table office
	
	public function organization()
	{
		// $coba1 = $this->session->userdata('nik');
		// var_dump($coba1);

		$this->load->database('db1');
		try{
			$crud = new grocery_CRUD();
			//$crud->set_theme('datatables');

			//$crud->set_theme('datatables');
			$crud->set_table('OrganizationTable');
			$crud->set_primary_key('ID','OrganizationTable');
			//$crud->set_subject('Office');
			$crud->required_fields('ID','Code','Name');
			$crud->columns('ID',
							'Code',
							'Name',
							'Description'
						);
			
			$crud->fields('ID',
						'Code',
						'Name',
						'Description'
					);
			$output = $crud->render();
			
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			
			$this->load->view('v_master',$data);			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
	}

	public function personnel()
	{
		$this->load->database('db1');
		try{
			$crud = new grocery_CRUD();
			//$crud->set_theme('datatables');

			//$crud->set_theme('datatables');
			$crud->set_table('PersonnelTable');
			$crud->set_primary_key('ID','PersonnelTable');
			//$crud->set_subject('Office');
			$crud->required_fields('Code', 'FullName', 'PersonnelNumber');
			$crud->columns('ID','Code','FullName','Description','PersonnelNumber');
			$crud->fields('Code','FullName','Description','PersonnelNumber');
			$output = $crud->render();
			
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			
			$this->load->view('v_master',$data);			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
	}

	public function costcenter()
	{
		$this->load->database('db1');
		try{
			$crud = new grocery_CRUD();
			//$crud->set_theme('datatables');

			//$crud->set_theme('datatables');
			$crud->set_table('CostCenterTable');
			$crud->set_primary_key('ID','CostCenterTable');
			//$crud->set_subject('Office');
			$crud->required_fields('Code','Name');
			$crud->columns('ID','Code','Name','Description');
			$crud->fields('Code','Name','Description');

			$output = $crud->render();
			
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			
			$this->load->view('v_master',$data);			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
	}

	public function position()
	{
		 /**
     * 
     * Created by Geraldine Agusta
     * 9 Januari 2020
     * 
     */
		$this->load->database('db1');
		// $list = $this->Grocery_crud_model->get_company_list();
		$DB1 = $this->load->database('db1', TRUE);

        $query=$DB1->query("SELECT ID, CONCAT (ID,' - ',Name) as fullname FROM CompanyTable ORDER BY Name ASC;");

        $arr_ids = array();

        foreach ($query->result() as $row)
        {
            $arr_ids[$row->ID]=$row->fullname;
        }

		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('PositionTable');
			$crud->set_primary_key('ID','PositionTable');
			//$crud->set_subject('Office');
			$crud->required_fields('Code','Name','AsHead','Level','AsDirector', 'HeadAssignmentCompanyID');
			$crud->columns('ID','Code','Name','Description','CostCenterID');
			$crud->fields('Code','Name','Description','AsHead','Level','AsDirector', 'HeadAssignmentCompanyID');
			$crud->field_type('HeadAssignmentCompanyID', 'dropdown', $arr_ids);
			$crud->field_type('AsHead', 'dropdown', array('1' => 'Ya', '0' => 'Tidak'));
			$crud->field_type('AsDirector', 'dropdown', array('1' => 'Ya', '0' => 'Tidak'));
			//$crud->set_relation_n_n('HeadAssignmentCompanyID','ID','Name','id_staf','id_unit','name','');
			

			$output = $crud->render();
			
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			
			$this->load->view('v_master',$data);			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
	}

	public function company()
	{
		$this->load->database('db1');
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('CompanyTable');
			$crud->set_primary_key('ID','CompanyTable');
			//$crud->set_subject('Office');
			$crud->required_fields('Code','Name');
			$crud->columns('ID','Code','Name','Description','CreatedDate');
			$crud->fields('Code','Name','Description');

			$output = $crud->render();
			
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			
			$this->load->view('v_master',$data);			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
	}
	
	public function employee()
	{
		$this->load->database('db2');
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->unset_columns('photo','create_by','create_date','update_date','update_by');
			$crud->unset_fields('photo','create_by','create_date','update_date','update_by');
			$crud->where('active','Y');
			$crud->set_table('master_employeex');
			//$crud->set_relation('id_unit','master_unit','name');
			$crud->set_relation_n_n('boss','staf_boss','master_employeex','id_staf','id_boss','name','priority');
			$crud->set_relation_n_n('id_unit','staf_unit','master_unit','id_staf','id_unit','name','');
			//$crud->set_primary_key('ID','OrganizationUnit');
			//$crud->set_subject('Office');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();
			
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			
			$this->load->view('v_master',$data);			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
	}	

	public function unit()
	{
		$this->load->database('db2');
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('master_unit');
			$crud->set_relation('parent_id','master_unit','name');
			//$crud->set_primary_key('ID','OrganizationUnit');
			//$crud->set_subject('Office');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();
			
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			
			$this->load->view('v_master',$data);			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
	}	
	public function permission()
	{
		$this->load->database('db2');
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('aauth_perms');
			//$crud->set_primary_key('ID','OrganizationUnit');
			//$crud->set_subject('Office');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();
			
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			
			$this->load->view('v_master',$data);			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
	}
	
	public function group()
	{
		$this->load->database('db2');
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('aauth_groups');
			//$crud->set_primary_key('ID','OrganizationUnit');
			//$crud->set_subject('Office');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();
			
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			
			$this->load->view('v_master',$data);			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
	}	
	/*
	public function officesx()
	{
		$this->load->database('db2');
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('offices');
			//$crud->set_primary_key('ID','OrganizationUnit');
			//$crud->set_subject('Office');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();
			
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			
			$this->load->view('v_master',$data);			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
	}
	*/
//***********************************************************//
	public function _example_output($output = null)
	{
			$data["output"] = (array)$output;
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);

			$this->load->view('v_master',$data);			
		//$this->load->view('example.php',(array)$output);
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	// public function offices_management()
	// {
	// 	try{
	// 		$crud = new grocery_CRUD();

	// 		$crud->set_theme('datatables');
	// 		$crud->set_table('offices');
	// 		$crud->set_subject('Office');
	// 		$crud->required_fields('city');
	// 		$crud->columns('city','country','phone','addressLine1','postalCode');

	// 		$output = $crud->render();

	// 		$this->_example_output($output);

	// 	}catch(Exception $e){
	// 		show_error($e->getMessage().' --- '.$e->getTraceAsString());
	// 	}
	// }

	// public function employees_management()
	// {
	// 		$crud = new grocery_CRUD();

	// 		$crud->set_theme('datatables');
	// 		$crud->set_table('employees');
	// 		$crud->set_relation('officeCode','offices','city');
	// 		$crud->display_as('officeCode','Office City');
	// 		$crud->set_subject('Employee');

	// 		$crud->required_fields('lastName');

	// 		$crud->set_field_upload('file_url','assets/uploads/files');

	// 		$output = $crud->render();

	// 		$this->_example_output($output);
	// }

	// public function customers_management()
	// {
	// 		$crud = new grocery_CRUD();

	// 		$crud->set_table('customers');
	// 		$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
	// 		$crud->display_as('salesRepEmployeeNumber','from Employeer')
	// 			 ->display_as('customerName','Name')
	// 			 ->display_as('contactLastName','Last Name');
	// 		$crud->set_subject('Customer');
	// 		$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

	// 		$output = $crud->render();

	// 		$this->_example_output($output);
	// }

	// public function orders_management()
	// {
	// 		$crud = new grocery_CRUD();

	// 		$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
	// 		$crud->display_as('customerNumber','Customer');
	// 		$crud->set_table('orders');
	// 		$crud->set_subject('Order');
	// 		$crud->unset_add();
	// 		$crud->unset_delete();

	// 		$output = $crud->render();

	// 		$this->_example_output($output);
	// }

	// public function products_management()
	// {
	// 		$crud = new grocery_CRUD();

	// 		$crud->set_table('products');
	// 		$crud->set_subject('Product');
	// 		$crud->unset_columns('productDescription');
	// 		$crud->callback_column('buyPrice',array($this,'valueToEuro'));

	// 		$output = $crud->render();

	// 		$this->_example_output($output);
	// }

	// public function valueToEuro($value, $row)
	// {
	// 	return $value.' &euro;';
	// }

	public function film_management()
	{
		$this->load->database('db2');
	 	$crud = new grocery_CRUD();

	 	$crud->set_table('film');
	 	$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
	 	$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
	 	$crud->unset_columns('special_features','description','actors');

	 	$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

	 	$output = $crud->render();

	 	$this->_example_output($output);
	}

	// public function film_management_twitter_bootstrap()
	// {
	// 	try{
	// 		$crud = new grocery_CRUD();

	// 		$crud->set_theme('twitter-bootstrap');
	// 		$crud->set_table('film');
	// 		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
	// 		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
	// 		$crud->unset_columns('special_features','description','actors');

	// 		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

	// 		$output = $crud->render();
	// 		$this->_example_output($output);

	// 	}catch(Exception $e){
	// 		show_error($e->getMessage().' --- '.$e->getTraceAsString());
	// 	}
	// }

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->offices_management2();

		$output2 = $this->employees_management2();

		$output3 = $this->customers_management2();

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
		$output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output."<h1>List 3</h1>".$output3->output;

		$this->_example_output((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}



}
