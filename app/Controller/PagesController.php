<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function beforeFilter()
	{
		parent::beforeFilter();

		$this->Auth->allow('about');
	}
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() 
    {
	}
    
    public function about() 
    {
        # Title
        $this->set('title_for_layout', __('About'));
	}
    
    public function preferences() 
    {
        # Title
        $this->set('title_for_layout', __('Preferences'));
        
        if ($this->request->is('post') || $this->request->is('put')) {
            Configure::write('Config.language', $this->request->data['Preference']['language']);
            Configure::write('Layout.theme', $this->request->data['Preference']['theme']); 
            Configure::dump('preferences.php', 'default', array('Config', 'Layout'));
            
            $this->Session->setFlash(__('Registered preferences.'), 'flash_success');
		}
	}
}
