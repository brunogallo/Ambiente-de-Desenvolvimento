#Ambiente de desenvolvimento

## Resumo e instalação

O [Vagrant](http://vagrantup.com/) é um projeto que permite virtualizar o ambiente de desenvolvimento de forma simples. 
[Documentação oficial](https://docs.vagrantup.com/v2/)


###Instalação

Atenção, os passos abaixo são feito através do terminal, caso necessite de uma interface ui recomento outro tutorial.

- Faça o download e a instalação do VirtualBox [aqui](http://virtualbox.org/wiki/Downloads).
- Faça o download e a instalação do Vagrant [aqui](https://www.vagrantup.com/downloads).

Após a instalação, navegue até a pasta "dev-environment/sistema-operacional" do repositório. No exemplo abaixo eu utilizo o ubuntu:

```
cd padrao-front-end/dev/ubuntu
```


***Hosts***

É necessário adicionar o domínio pelo projeto ao seu arquivo hosts.

**MAC**

Abra o terminal: Applications -> Utilities -> Terminal.<br>
Utilize o comando: sudo nano /private/etc/hosts<br>
Abaixo dos ips, adicione as seguintes linhas: <br>
192.168.56.101 padrao.env<br>
192.168.56.101 www.padrao.env<br>
Control-o para salvar e control-x para sair.


###Inicializando o ambiente:

```
vagrant up
```


###Comandos básicos

- ***vagrant up*** 			- Inicia o ambiente.
- ***vagrant halt***		- Força o ambiente a desligar (Não recomendado).
- ***vagrant suspend***		- Suspende o ambiente.
- ***vagrant ssh***			- Conecta via ssh.
- ***vagrant update***	- Atualiza o vagrant.
- ***vagrant list***		- Lista ambientes.
- ***vagrant provision***	- Caso faça alguma alteração no "puphpet/config.yaml" o comando atualiza.


Por padrão, o grunt publica os arquivos compilados com "grunt task:env" dentro da pasta /www/sistema-operacional/default.


###Web server

A task:env configurada no grunt envia os arquivos compilados para o ambiente de teste.
Caso seja necessário alterações de forma manual, os arquivos devem ser colocados em: "dev/sistema-operacional/www/default".

***URL*** - http://padrao.env/


###MySQL

- ***DB User:*** padrao
- ***DB PW:*** padrao
- ***DB:*** padrao

***URL*** - http://padrao.env/adminer/


## Especificações do ambiente

Todas os ambientes foram configurados com alguns valores padrões:

- ***Usuários:*** padrao
- ***Senhas:*** padrao
- ***Memória:*** 1GB
- ***Local VM CPU's***: 1
- ***IP:*** 192.168.56.101
- ***Porta box:*** 22
- ***Porta Apache:*** 80
- ***Pasta compartilhada:*** /www Apontada para: /var/www
- ***Modulos Apache:*** rewrite, mod_pagespeed.
- ***Servername:*** padrao
- ***Server Alias:*** www.padrao.env


Sistema Operacional|Modulos|Caminho|
--------|--------|--------|--------|
Ubuntu Trusty 14.04 LTS x64|PHP, Xdebug, Apache, MySQL, Nodejs, Adminer, Rsync, MailCatcher|/ubuntu|


## Possiveis erros e soluções

- ***Warning: Insecure world writable dir /usr/local in PATH*** - ***Solução:*** sudo chmod 775 /usr/local


## Quer me ajudar?

***Implementações pendentes***

- ***Vivenciando o deploy antes do deploy***	- http://www.youtube.com/watch?v=sPqbYfmo0ec
- ***APP Trafic replay*** - https://github.com/buger/gor/