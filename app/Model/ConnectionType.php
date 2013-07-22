<?php  
class ConnectionType extends AppModel
{
	public $name = 'ConnectionType';


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

    public function options()
    {
        return $this->find(
            'list',
            array(
				'fields' => array(
					'ConnectionType.id',
					'ConnectionType.name'
                ),
                'order' => 'ConnectionType.name'
            )
        );
	}
}
