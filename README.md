# Sistema Desenvolvido para fins de Estudo

####O sistema voltado para a aréa de segurança do Trabalho. Permite ter o controle do historico do funcionário ver os exames, treinamentos, epis e acidentes 

##Caracteristicas

- Gerenciar funcionário
  * Funcionario por empresa
  * Funcionario por cargo

- Gerenciar estoque de EPI
  * EPI por categoria
  * EPI por funcionários
  * EPI por empresa
  * Entradas e Saidas de cada EPI
  * Unidades restantes de cada EPI
  
- Gerenciar exames medicos
  * Exames medicos de funcionários
  
- Gerenciar treinamentos
  * Treinamentos de funcionários
  
- Gerenciamento de Acidentes
  * Tipo de acidentes(doença,trajeto,...)
  * Acidentes e funcionários envolvidos
  
 --
Instalação 
```
composer update
create your .env
php artisan migrate
make coffee (:
```

--
[Demo](http://estoque.1e3.io)

User : admin@admin.com

Password : admin123

--
Pacotes utilizados : 
* [Cartalyst/Sentinel 2.0.*](https://cartalyst.com/manual/sentinel/2.0)

--
Bibliotecas/Framework utilizadas :
* Bootstrap v3.3.7
* jQuery v1.12.4
* Datepicker for Bootstrap v1.6.4
* Chart.js v2.2.2
* jQuery DataTables 1.10.12
