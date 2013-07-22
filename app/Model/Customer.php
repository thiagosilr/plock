<?php  
class Customer extends AppModel
{
    public $name = 'Customer';

    public $hasMany = 'Contact';

    public $validationDomain = 'validation';


    public function __construct($id = false, $table = null, $ds = null)
    {
        parent::__construct($id, $table, $ds);
        
        $this->validate = array(
            'name' => array(
                'rule'    => 'notEmpty',
                'message' => __('The name field is required.')
            )
        );
    }
}
