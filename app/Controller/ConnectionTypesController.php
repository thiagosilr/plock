<?php  
class ConnectionTypesController extends AppController
{
    public $uses = array(
        'ConnectionType',
        'Connection'
    );


    public function index()
    {
        # Title.
        $title = __('Connection Types');
        $this->set('title_for_layout', $title);


        # Guard in the search session.
        if ($this->request->is('post')) {
            $_SESSION['Search']['ConnectionType']['name'] = $this->request->data['ConnectionType']['name'];
        }

        # Search condition.
        $conditions = array();

        if (!empty($_SESSION['Search']['ConnectionType']['name'])) {
            $conditions['ConnectionType.name LIKE'] = '%'.$_SESSION['Search']['ConnectionType']['name'].'%';
        }


        # Research
        $this->paginate = array(
            'conditions' => $conditions
        );
        $this->set('connectionTypes', $this->paginate('ConnectionType'));
    }

	public function add()
	{
        # Title
        $title = __('Register Connection Type');
        $this->set('title_for_layout', $title);
		$this->set('title', $title);

        # Dados do formulário já preenchidos.
        $this->set('connectionType', $this->request->data);

        # Label button save.
		$this->set('label', __('Save'));


		if ($this->request->is('post')) {
            # Salva as informações.
			if ($this->ConnectionType->save($this->request->data)) {
				$this->Session->setFlash(__('Registered Connection Type.'), 'flash_success');
				$this->redirect(array('controller' => 'connection_types', 'action' => 'add'));
			} else {
				$this->Error->set($this->ConnectionType->invalidFields());
			}
		}

		$this->render('/ConnectionTypes/_form');
	}

    public function edit($id = null)
	{
        # Obtem dados da tipo de conexão que esta sendo editado.
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->set('connectionType', $this->request->data);
        } else {
            $this->set('connectionType', $this->ConnectionType->findById($id));
        }

        # Title
        $title = __('Edit Connection Type');
        $this->set('title_for_layout', $title);
		$this->set('title', $title);
        
        # Label button save.
		$this->set('label', __('Save'));


		if ($this->request->is('post') || $this->request->is('put')) {
            # Salva as informações.
            $this->request->data['ConnectionType']['id'] = $id;
			if ($this->ConnectionType->save($this->request->data)) {
				$this->Session->setFlash(__('Registered Connection Type.'), 'flash_success');
			} else {
				$this->Error->set($this->ConnectionType->invalidFields());
			}
		}

		$this->render('/ConnectionTypes/_form');
	}

    public function delete($id = null)
    {
        $this->ConnectionType->id = $id;

        if (!$this->ConnectionType->exists()) {
            $this->Session->setFlash(__('Invalid connection type.'), 'flash_fail');
            $this->redirect($this->referer());
        }

        if ($this->Connection->findByConnectionTypeId($id)) {
            $this->Session->setFlash(__('Can not delete the connection type this because it linked to one or more connections.'), 'flash_fail');
            $this->redirect($this->referer());
        }
        
        if ($this->ConnectionType->delete()) {
            $this->Session->setFlash(__('Connection type deleted.'), 'flash_success');
            $this->redirect($this->referer());
        }

        $this->Session->setFlash(__('Connection type was not deleted.'), 'flash_fail');
        $this->redirect($this->referer());
    }
}
