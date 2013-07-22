<?php  
class ServersController extends AppController
{
    public $uses = array(
        'Server',
        'Domain'
    );


    public function index()
    {
        # Title.
        $title = __('Servers');
        $this->set('title_for_layout', $title);


        # Guarda a pesquisa na sessão.
        if ($this->request->is('post')) {
            $_SESSION['Search']['Server']['name'] = $this->request->data['SearchServer']['name'];
        }

        # Monta condição de pesquisa.
        $conditions = array();

        if (!empty($_SESSION['Search']['Server']['name'])) {
            $conditions['Server.name LIKE'] = '%'.$_SESSION['Search']['Server']['name'].'%';
        }


        # Realiza a pesquisa
        $this->paginate = array(
            'conditions' => $conditions
        );
        $this->set('servers', $this->paginate('Server'));
    }

	public function add()
	{
        # Title
        $title = __('Register Server');
        $this->set('title_for_layout', $title);
		$this->set('title', $title);

        # Dados do formulário já preenchidos.
        $this->set('server', $this->request->data);

        # Label botão salvar.
		$this->set('label', __('Save'));


		if ($this->request->is('post')) {
            # Salva as informações.
			if ($this->Server->save($this->request->data)) {
				$this->Session->setFlash(__('Registered server.'), 'flash_success');
				$this->redirect(array('controller' => 'servers', 'action' => 'add'));
			} else {
				$this->Error->set($this->Server->invalidFields());
			}
		}

		$this->render('/Servers/_form');
	}

    public function edit($id = null)
	{
        # Obtem dados do servidor que esta sendo editado.
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->set('server', $this->request->data);
        } else {
            $this->set('server', $this->Server->findById($id));
        }

        # Title
        $title = __('Edit Server');
        $this->set('title_for_layout', $title);
		$this->set('title', $title);
        
        # Label botão salvar.
		$this->set('label', 'Save');


		if ($this->request->is('post') || $this->request->is('put')) {
            # Salva as informações.
            $this->request->data['Server']['id'] = $id;
			if ($this->Server->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Registered server.'), 'flash_success');
			} else {
				$this->Error->set($this->Server->invalidFields());
			}
		}

		$this->render('/Servers/_form');
	}

    public function delete($id = null)
    {
        $this->Server->id = $id;

        if (!$this->Server->exists()) {
            $this->Session->setFlash(__('Invalid server.'), 'flash_fail');
            $this->redirect($this->referer());
        }

        if ($this->Domain->findByServerId($id)) {
            $this->Session->setFlash(__('Can not delete the server because the same this linked to one or more domains.'), 'flash_fail');
            $this->redirect($this->referer());
        }

        if ($this->Server->delete()) {
            $this->Session->setFlash(__('Server deleted.'), 'flash_success');
            $this->redirect($this->referer());
        }

        $this->Session->setFlash(__('Server was not deleted.'), 'flash_fail');
        $this->redirect($this->referer());
    }
}
