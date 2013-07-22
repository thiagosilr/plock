<?php 
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel
{
    public $name = 'User';


    public function __construct($id = false, $table = null, $ds = null)
    {
        parent::__construct($id, $table, $ds);
        
        $this->validate = array(
            'username' => array(
                array(
                    'rule'    => array('notEmpty'),
                    'message' => __('The login field is required.')
                ),
                array(
                    'rule'    => 'isUnique',
                    'message' => __('This login already exists.')
                )
            ),
            'email' => array(
                array(
                    'rule'    => array('email'),
                    'message' => __('Invalid e-mail.')
                ),
                array(
                    'rule'    => 'isUnique',
                    'message' => __('This e-mail already exists.')
                )
            ),    
            'password' => array(
                'required' => array(
                    'rule'     => array('notEmpty'),
                    'message'  => __('The password field is required.'),
                    'on'       => 'create'
                )
            ),
            'role' => array(
                'valid' => array(
                    'rule'       => array('inList', array('admin', 'author')),
                    'message'    => __('Please enter a valid type'),
                    'allowEmpty' => false
                )
            )
        );  
    }

    public function beforeSave()
    {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }

        return true;
    }

    public function generateHashChangePassword()
    {
        $salt    = Configure::read('Security.salt');
        $salt_v2 = Configure::read('Security.cipherSeed');
        $rand    = mt_rand(1,999999999);
        $rand_v2 = mt_rand(1,999999999);

        $hash = hash('sha256',$salt.$rand.$salt_v2.$rand_v2);

        return $hash;
    }
}
