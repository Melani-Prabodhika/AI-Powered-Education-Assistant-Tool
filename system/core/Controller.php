<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2019 - 2022, CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/userguide3/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * CI_Loader
	 *
	 * @var	CI_Loader
	 */
	public $load;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

	// Permissions
	public function _remap($m){
		$nm = strtolower($this->uri->segment(1));
		
		if( $nm=='login' || $nm=='web_controll' || $nm=='block' || $nm=='sms_crone_job'){
			$this->$m();
			return;
		}
		
		if($this->session->userdata('login') == true){
			// for postaman requests
			$headers = apache_request_headers();
			if (isset($headers['Token'])) {
				$authHeader = $headers['Token'];
				if($authHeader == "9fc453e6-23a5-4a58-aadc-e39af4069ed3"){
					$this->$m();
					return;
				}
			}
			
			if(empty($this->uri->uri_string())){
				$filteredPermissions = array_values(array_filter($_SESSION['permissions'][0]->sub_permissions, function ($subPermission) {
					return $subPermission->skip_menu == 0;
				}));
				$def_url = (empty($_SESSION["def_url"]) ? $filteredPermissions[0]->ps_url : $_SESSION["def_url"]);
				header('Location: '.$def_url);
			}else if($nm == 'login' || $nm == 'common'){
				$this->$m();
			}else{
				$curr_url = "/".$this->uri->uri_string();
				$permission = $this->Autoload_m->search_permission_array($curr_url);
				$ref_url = isset($_SERVER['HTTP_REFERER']) ? parse_url($_SERVER['HTTP_REFERER'])['path'] : "no";
				$hiddenPermission = false;
				if($ref_url != "no"){					
					$hiddenPermission = $this->Autoload_m->search_permission_array($ref_url);
					$refSegments = explode('/', trim($ref_url, '/'));
					$refFirstSegment = $refSegments[0]; 
				}
				
				if($permission){
					$this->$m();
				}else{
					if($hiddenPermission){
						if($refFirstSegment == $this->uri->segment(1)){
							$this->$m();
						}else{
							die("unauthorized");
						}
					}else{						
						die("unauthorized");
					}
				}
			}
		}elseif($m == "auth"){
			$tx['a']="";
			$this->load->helper('url');
		 
			$this->load->model('Login_m');
			$resp = $this->Login_m->auth();
			$ut_id = $this->session->userdata('ut_id');
			if( $resp == "1" ){
				redirect('/Dashboard');
			}else{
				$this->load->view('login',$tx);
			}
		}elseif($nm=="Api_calls" || $nm=='api_calls'){
			$this->$m();		
		}else{
			$tx['a']="";
			$this->load->view('login',$tx);
		}
	}

}
