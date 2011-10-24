# Plock Manager
[plock](https://github.com/hugodias/) é um gerenciador de clientes feito em cakephp para resolver o problema que muitas fábricas de software e agências de publicidade possuem, que é guardar e gerenciar de forma fácil e prática os dados de todos seus clientes.



Demo
-----
[http://api.pitchbox.com.br](http://api.pitchbox.com.br)

#### Usuário: visitante

####senha: 123


-----



#### Ele tem:

* Estrutura feita em MVC com [CakePHP](http://cakephp.org/)
* CSS utilizando o [BOOTSTRAP](http://twitter.github.com/bootstrap/) do twitter
* Front-end construido utilizando [CoffeeScript](http://jashkenas.github.com/coffee-script/)
* Controle de usuários

#### Para utilizar você precisa ter:
* PHP 5.1 ou superior
* MySql 5.0 ou superior
* Mode Rewrite habilitado


#### Instalando

Acesse o arquivo `app/config/database.php` e coloque os dados do seu banco

``` php
var $default = array(
	'driver' => 'mysql',
	'persistent' => false,
	'host' => 'localhost',
	'login' => 'root',
	'password' => 'root',
	'database' => 'plock',
	'prefix' => '',
);
```

#### Crie as tabelas clientes e users
``` sql
CREATE  TABLE IF NOT EXISTS `clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL DEFAULT NULL ,
  `contato_1` VARCHAR(45) NULL DEFAULT NULL ,
  `contato_2` VARCHAR(45) NULL DEFAULT NULL ,
  `site_antigo` VARCHAR(255) NOT NULL ,
  `site` VARCHAR(255) NOT NULL ,
  `ftp` VARCHAR(45) NULL DEFAULT NULL ,
  `senha_ftp` VARCHAR(45) NULL DEFAULT NULL ,
  `telefone_1` VARCHAR(45) NULL DEFAULT NULL ,
  `telefone_2` VARCHAR(45) NULL DEFAULT NULL ,
  `telefone_3` VARCHAR(45) NULL DEFAULT NULL ,
  `email_1` VARCHAR(45) NULL DEFAULT NULL ,
  `senha_1` VARCHAR(45) NULL DEFAULT NULL ,
  `email_2` VARCHAR(45) NULL DEFAULT NULL ,
  `senha_2` VARCHAR(45) NULL DEFAULT NULL ,
  `email_3` VARCHAR(45) NULL DEFAULT NULL ,
  `senha_3` VARCHAR(45) NULL DEFAULT NULL ,
  `facebook_user` VARCHAR(45) NULL DEFAULT NULL ,
  `facebook_senha` VARCHAR(45) NULL DEFAULT NULL ,
  `twitter_user` VARCHAR(45) NULL DEFAULT NULL ,
  `twitter_senha` VARCHAR(45) NULL DEFAULT NULL ,
  `flickr_user` VARCHAR(45) NULL DEFAULT NULL ,
  `flickr_senha` VARCHAR(45) NULL DEFAULT NULL ,
  `observacoes` TEXT NOT NULL ,
  `created` VARCHAR(45) NULL DEFAULT NULL ,
  `modified` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = latin1
```

``` sql
CREATE  TABLE IF NOT EXISTS `mydb`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `username` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(40) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1
```

#### TODO
* Exportar clientes em CSV, XML e HTML


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

