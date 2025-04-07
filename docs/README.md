                                                             DOCUMENTAÇÃO DA API EM PHP


1-
 Esta documentação descreve o funcionamento de uma API simples desenvolvida em PHP, que oferece três funcionalidades principais:

 . Verificar o status da API
 . Obter a hora atua 
 . Gerar um número aleatório

== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == ==
2-
 O projeto também conta com um cliente em HTML/PHP para facilitar a utilização da API via navegador.
 
    REQUISITOS PARA UTILIZAÇÃO

 . PHP versão 7.x ou superior
 . Um servidor local como XAMPP, WAMP, MAMP ou o servidor embutido do PHP
 . Navegador de internet ou ferramenta de testes como Postman ou cURL

 == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == 
3-
    ESTRUTURA DE PASTAS SUGERIDA

Raiz do projeto:

/ (pasta principal)
├── api/
│   └── index.php     ← Arquivo principal da API
└── cliente/
└── app.php       ← Cliente HTML/PHP para consumir a API

== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == ==
4-
    EXECUÇÃO LOCAL

Caso utilize o servidor embutido do PHP:

1. Abra o terminal e navegue até o diretório raiz do projeto.

2. Execute o seguinte comando:
php -S localhost:8000

3. Acesse no navegador:
http://localhost:8000/api/index.php?option=status

== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == ==
5-
    ENDPOINTS DISPONÍVEIS NA API

1. Verificar o Status da API

. URL: /api/index.php?option=status
. Método: GET
. Retorno (exemplo): {"status": "SUCCESS", "data": "API is running OK!" }

2. Obter a Hora Atual

. URL: /api/index.php?option=time
. Método: GET
. Retorno (exemplo): {"status": "SUCCESS", "data": "07.04.2025 13:22:15"}

3. Gerar um Número Aleatório

. URL: /api/index.php?option=random&min=10&max=50
. Método: GET
. Parâmetros:

. min (opcional): valor mínimo (padrão: 1)
. max (opcional): valor máximo (padrão: 100)

. Retorno (exemplo): {"status": "SUCCESS", "data":27}
. Em caso de erro (ex:min ≥ max): {"status": "ERROR", "message": "Parâmetros inválidos: min deve ser menor que max."}

== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == ==
6-
   CÓDIGOS DE ERRO COMUNS

. 400: Parâmetro ausente ou inválido
. 404: Opção inexistente ou incorreta fornecida na query string

== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == ==
7-
    EXEMPLOS DE USO COM cURL

Para testar os endpoints via terminal:

. curl "http://localhost/api/index.php?option=status"curl
. "http://localhost/api/index.php?option=time"curl
. "http://localhost/api/index.php?option=random&min=5&max=10"

== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == ==
8-
    CLIENTE HTML/PHP

Junto com a API, existe um cliente web para facilitar testes e visualização 
das respostas:

. Acesse: http://localhost/cliente/app.php

Este cliente envia requisições do tipo GET para a API e exibe as respostas 
no navegador, incluindo código de status HTTP e o JSON retornado.

== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == ==


Grupo: Deiwid, Alisson, Luan e Guilherme

