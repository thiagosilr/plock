# Plock Manager v1.0
[Plock](https://github.com/Agencia-WT/plock) é um gerenciador de clientes feito em cakephp para resolver o problema que muitas fábricas de software e agências de publicidade possuem, que é guardar e gerenciar de forma fácil e prática os dados de todos seus clientes.


Ele tem: 
-----

* Estrutura feita em MVC com [CakePHP](http://cakephp.org/)
* CSS utilizando o [BOOTSTRAP](http://twitter.github.com/bootstrap/) do twitter
* Cadastro de servidores relacionado aos clientes

#### Para utilizar você precisa ter:
* PHP 5.1 ou superior
* MySql 5.0 ou superior
* Mode Rewrite habilitado

##### Para desenvolver
* DER `projectInfo/der.mwb` [MySQL Workbench](http://www.mysql.com/downloads/workbench/)

#### Instalando
* Crie uma banco de dados e importe o arquivo `projectInfo/plock_database.sql` para seu novo banco de dados.
* Acesse o arquivo `app/Config/database.php` e informe as iformações de acesso do seu banco de dados.

``` php
var $default = array(
	'driver' => 'mysql',
	'persistent' => false,
	'host' => 'localhost',
	'login' => 'root',
	'password' => '',
	'database' => 'plock',
	'prefix' => '',
);
```

#### Dados de acesso rápido

Usuário: `admin`

Senha: `admin`


Twitter Bootstrap Copyright and license
---------------------

Copyright 2011 Twitter, Inc.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this work except in compliance with the License.
You may obtain a copy of the License in the LICENSE file, or at:

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.