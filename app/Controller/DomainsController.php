<?php  
class DomainsController extends AppController
{
    public $uses = array(
        'Customer', 
        'Domain',
        'Server',
        'Connection',
        'ConnectionType'
    );


    public function add($customerId = null)
	{
        # Title
        $title = __('Register Domain');
        $this->set('title_for_layout', $title);
		$this->set('title', $title);
        
        # Dados do formulário já preenchidos.
        $this->set('domain', $this->request->data);
        
        # Label botão salvar.
		$this->set('label', __('Save'));
        
        # Options select/Customer name.
        $this->set('serverOptions', $this->Server->options());
        $this->set('connectionTypeOptions', $this->ConnectionType->options());
        $this->set('customer', $this->Customer->findById($customerId, 'name'));


		if ($this->request->is('post')) {
            # Impede o cadastro de conexões em branco.
            if (!empty($this->request->data['Connection'])) {
                foreach ($this->request->data['Connection'] as $i => $connection) {
                    if (empty($connection['connection_type_id']) && empty($connection['host']) && empty($connection['user']) && empty($connection['password'])) {
                        unset($this->request->data['Connection'][$i]);
                    }
                }
            }

            # Salva as informações.
            $this->request->data['Domain']['customer_id'] = $customerId;
			if ($this->Domain->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Registered domain.'), 'flash_success');
                $this->redirect(array('controller' => 'domains', 'action' => 'add', $customerId));
			} else {
				$this->Error->set($this->Domain->invalidFields());
			}
		}

		$this->render('/Domains/_form');
	}
    
    public function edit($customerId = null, $id = null)
	{
        # Obtem dados do domínio que esta sendo editado.
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->set('domain', $this->request->data);
        } else {
            $this->set('domain', $this->Domain->findById($id));
        }

        # Title
        $title = __('Edit Domain');
        $this->set('title_for_layout', $title);
		$this->set('title', $title);

        # Label botão salvar.
		$this->set('label', __('Save'));
        
        # Options select/Customer name.
        $this->set('serverOptions', $this->Server->options());
        $this->set('connectionTypeOptions', $this->ConnectionType->options());
        $this->set('customer', $this->Customer->findById($customerId, 'name'));


		if ($this->request->is('post') || $this->request->is('put')) {
            # Impede o cadastro de conexões em branco.
            if (!empty($this->request->data['Connection'])) {
                foreach ($this->request->data['Connection'] as $i => $connection) {
                    if (empty($connection['connection_type_id']) && empty($connection['host']) && empty($connection['user']) && empty($connection['password'])) {
                        unset($this->request->data['Connection'][$i]);
                    }
                }
            }


            # Exclui todos as conexões para ser inseridos novamente.
            $this->Connection->deleteAll(array('Connection.domain_id' => $id));


            # Salva as informações.
            $this->request->data['Domain']['customer_id'] = $customerId;
            $this->request->data['Domain']['id'] = $id;
			if ($this->Domain->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Registered domain.'), 'flash_success');
			} else {
				$this->Error->set($this->Domain->invalidFields());
			}
		}

		$this->render('/Domains/_form');
	}

    public function delete($id = null)
    {
        $this->Domain->id = $id;

        if (!$this->Domain->exists()) {
            $this->Session->setFlash(__('Invalid domain.'), 'flash_fail');
            $this->redirect($this->referer());
        }

        if ($this->Domain->delete()) {
            $this->Session->setFlash(__('Domain deleted.'), 'flash_success');
            $this->redirect($this->referer());
        }

        $this->Session->setFlash(__('Domain was not deleted.'), 'flash_fail');
        $this->redirect($this->referer());
    }    
}
