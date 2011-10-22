<?php
class ClientesController extends AppController{
	
	var $paginate = array(
		'limit' => 3,
		'order' => array(
			'Cliente.nome' => 'asc'
		)
	);
	
	function beforeFilter(){
		# Cria uma variavel com os dados do usuário
		$this->set("user", $this->Auth->user());
		
		# Cria uma variavel com os ultimos 5 clientes modificados
		$this->set("clientes",$this->Cliente->ultimosClientes());
	}
	
	function index(){
		$data = $this->paginate('Cliente');
		$this->set('data',$data);
	}
	
	function add(){
		if(!empty($this->data)){
			if($this->Cliente->save($this->data)){
				$this->Session->setFlash($this->data['Cliente']['nome'].' salvo com sucesso, clique <a href="/plock/clientes/'.$this->Cliente->id.'">aqui</a> para visualizar.', 'flash_success');
			}else{
				$this->Session->setFlash('Você precisa informar o nome do cliente', 'flash_fail');
			}
		}
	}
	
	function edit($id = null){
		
	}
	
	function view($id = null){
		
	}
	
	function delete($id = null){
		
	}
	
	function search(){
		
	}
}
?>