<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components =array(
		'Session',
		'Auth'=>array(
			'loginRedirect'=>array(
				'controller'=>'users',
				'action'=>'index'),

			'logoutRedirect'=>array(
				'controller'=>'users',
				'action'=>'login'),

			'authenticate'=>array(
				'Form'=>array(
					'fields'=>array('username'=>'email'),
					'passwordHasher'=>'Blowfish'
					)
					),
			'authorize'=>array('Controller')
			)
		);


// public $iniciocuatri,$fincuatri,$cuatri;

	public function beforeFilter(){
      
		$this->Auth->allow('login','logout','editStudent','editTeacher');
		$this->set('current_user',$this->Auth->user());
	
		// aqui se ponen las siguientes redirecciones para cada usuario

	}

	// funcion que sirve para asignar permisos al director y a los demas denegarles el accseso

	public function isAuthorized($user) {
    // Admin can access every action
    if (isset($user['group_id']) && $user['group_id'] === '5') {
        return true;
    }

    // Default deny
    return false;
}
}
