<?php  
class CustomersController extends AppController
{
    public $uses = array(
        'Customer', 
        'Contact',
        'Domain',
        'ConnectionType'
    );


    public function index()
    {
        # Title.
        $title = __('Customers');
        $this->set('title_for_layout', $title);


        # Guarda a pesquisa na sessão.
        if ($this->request->is('post')) {
            $_SESSION['Search']['Customer']['name'] = $this->request->data['SearchCustomer']['name'];
        }

        # Monta condição de pesquisa.
        $conditions = array();

        if (!empty($_SESSION['Search']['Customer']['name'])) {
            $conditions['Customer.name LIKE'] = '%'.$_SESSION['Search']['Customer']['name'].'%';
        }


        # Realiza a pesquisa
        $this->paginate = array(
            'conditions' => $conditions
        );
        $this->set('customers', $this->paginate('Customer'));
    }

	public function add()
	{
        # Title
        $title = __('Register Customer');
        $this->set('title_for_layout', $title);
		$this->set('title', $title);

        # Dados do formulário já preenchidos.
        $this->set('customer', $this->request->data);

        # Label botão salvar.
		$this->set('label', __('Next'));


		if ($this->request->is('post')) {
            # Impede o cadastro de contatos em branco.
            if (!empty($this->request->data['Contact'])) {
                foreach ($this->request->data['Contact'] as $i => $contact) {
                    if (empty($contact['name']) && empty($contact['phone']) && empty($contact['email'])) {
                        unset($this->request->data['Contact'][$i]);
                    }
                }
            }
            
            # Salva as informações.
			if ($this->Customer->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Registered customer.'), 'flash_success');
				$this->redirect(array('controller' => 'domains', 'action' => 'add', $this->Customer->id));
			} else {
				$this->Error->set($this->Customer->invalidFields());
			}
		}

		$this->render('/Customers/_form');
	}

    public function edit($id = null)
	{
        # Obtem dados do cliente que esta sendo editado.
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->set('customer', $this->request->data);
        } else {
            $this->set('customer', $this->Customer->findById($id));
        }
		
        # Title
        $title = __('Edit Customer');
        $this->set('title_for_layout', $title);
		$this->set('title', $title);
        
        # Label botão salvar.
		$this->set('label', 'Save');


		if ($this->request->is('post') || $this->request->is('put')) {
            # Impede o cadastro de contatos em branco.
            if (!empty($this->request->data['Contact'])) {
                foreach ($this->request->data['Contact'] as $i => $contact) {
                    if (empty($contact['name']) && empty($contact['phone']) && empty($contact['email'])) {
                        unset($this->request->data['Contact'][$i]);
                    }
                }
            }


            # Exclui todos os contatos para ser inseridos novamente.
            $this->Contact->deleteAll(array('Contact.customer_id' => $id));


            # Salva as informações.
            $this->request->data['Customer']['id'] = $id;
			if ($this->Customer->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Registered customer.'), 'flash_success');
			} else {
				$this->Error->set($this->Customer->invalidFields());
			}
		}

		$this->render('/Customers/_form');
	}

    public function delete($id = null)
    {
        $this->Customer->id = $id;

        if (!$this->Customer->exists()) {
            $this->Session->setFlash(__('Invalid customer.'), 'flash_fail');
            $this->redirect($this->referer());
        }

        if ($this->Customer->delete()) {
            $this->Session->setFlash(__('Customer deleted.'), 'flash_success');
            $this->redirect($this->referer());
        }

        $this->Session->setFlash(__('Customer was not deleted.'), 'flash_fail');
        $this->redirect($this->referer());
    }

	public function view($id = null)
	{
        # Verifica se o clientes existe.
		$this->Customer->id = $id;
		if (!$this->Customer->exists())
		{
            $this->Session->setFlash(__('Invalid customer.'), 'flash_fail');
            $this->redirect($this->referer());
		}

        # Title
        $title = __('View Customer');
        $this->set('title_for_layout', $title);

        # Obtem informações do cliente.
		$customer        = $this->Customer->read(null);
        $connectionTypes = $this->ConnectionType->find('list');
        $domains         = $this->Domain->find('all', array(
            'conditions' => array(
                'Domain.customer_id' => $id
            )
        ));
        $this->set('customer', $customer);
        $this->set('domains', $domains);
        $this->set('connectionTypes', $connectionTypes);
	}
}
