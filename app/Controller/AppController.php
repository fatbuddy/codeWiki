<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
        'Paginator',
	);

    public $helpers = array(
        'Html',
        'Form',
        'Time',
        'Number',
        'Session',
        'Paginator',
        'Js',
    );

    public $viewClass = 'Theme';
	public $theme = 'bootstrap';

	function beforeFilter() {
		//Configure AuthComponent
		//$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);
		//$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => true);
		//$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard', 'admin' => true);
		//$this->Auth->flash = array('element'=>'Flash/error','key'=>'auth','params'=>array());
		//$this->Auth->allow('*'); // @todo: for development purposes

        // For default settings name must be menu
        //$currentUser = $this->Session->read('Auth');
        $this->set(compact('menu','currentUser'));

        parent::beforeFilter();
	}

	function __tableizeKeys($array) {
		$result = array();
		foreach ($array as $key=>$item) {
			//debug($key);debug($item);die();
			if (is_array($item)) {
				$result[ucfirst($key)] = $this->__tableizeKeys($item);
			} else {
				$new_key = str_replace('@','',Inflector::singularize(Inflector::tableize($key)));
				//$new_key = substr($new_key,strlen($new_key)-3,3)=='i_d'?substr($new_key,0,strlen($new_key)-3).'_id':$new_key;
				$new_key = $new_key=='tournament_player_i_d'?'p_i_d':$new_key;
				$result[$new_key] = $item;
			}
		}
		return $result;
	}

	function __prefixKeys($array) {
		$result = array();
		foreach ($array as $key=>$item) {
			if (is_array($item)) {
				$prefix = str_replace('@','',Inflector::singularize(Inflector::tableize($key)));
				foreach ($item as $k=>$i) {
					if (is_array($i)) {
						$k = Inflector::singularize(Inflector::tableize($k));
						$result[$prefix.'_'.$k] = $this->__prefixKeys($i);
					} else {
						$result[$prefix.'_'.$k] = $i;
					}
				}
			} else {
				$result[$key] = $item;
			}
		}
		return $result;
	}

	public function __escapeAndQuoteArray($array) {
		$escaped_array = array();
		App::uses('Sanitize', 'Utility');
		foreach ($array as $key=>$item) {
			$escaped_array[$key] = '\''.Sanitize::escape($item).'\'';
		}
		return $escaped_array;
	}
}