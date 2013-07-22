<?php
class Domain extends AppModel
{
	public $name = 'Domain';

	public $belongsTo = array(
        'Customer',
        'Server'
    );

    public $hasMany = 'Connection';


    public function __construct($id = false, $table = null, $ds = null)
    {
        parent::__construct($id, $table, $ds);
        
        $this->validate = array(
            'url' => array(
                'rule'    => 'notEmpty',
                'message' => __('The url field is required.')
            )
        );
    }
}
