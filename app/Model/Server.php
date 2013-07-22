<?php  
class Server extends AppModel
{
	public $name = 'Server';


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
					'Server.id',
					'Server.name'
                ),
                'order' => 'Server.name'
            )
        );
	}
}
