# Facil Consulta Avaliação

## Sobre

Facil Consulta Avaliação é processo seletivo para a vaga de Desenvolvedor Back-end na [Facil Consulta](https://facilconsulta.com.br/).

## Tecnologias e versões utilizadas

  Ferramenta                  |  Versão
----------------------------- | --------
PHP                           | 8.2
Laravel                       | 10
MySQL                         | 8.0
Swagger                       | 3.0
PHPUnit                       | 10.2

## Documentação da API
A documentação da API foi criada utilizando o Swagger (OpenAPI) e pode ser acessada através da rota http://localhost/api/documentation após o servidor estar em execução.

Na documentação, você encontrará informações detalhadas sobre todos os endpoints da API, incluindo os métodos HTTP, parâmetros de entrada, respostas e exemplos de uso.
## Como executar

### Antes de executar

1. Clone o repositório:

```bash
git clone https://github.com/pedrogab96/facil-consulta-avaliation.git
```

2. Acesse a pasta do projeto:

```bash
cd facil-consulta-avaliacao
```

3. Crie o arquivo .env:

```bash
cp .env.example .env
```

### Instale o Sail e suas dependências

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

### Próximos passos

1. Execute o seguinte comando para subir os containers:

```bash
./vendor/bin/sail up -d
```

2. Acesse o container da aplicação:

```bash
./vendor/bin/sail exec laravel.test bash
```

3. Dentro do container, instale as dependências:

```bash
composer install
```

4. Gere a APP_KEY:

```bash
php artisan key:generate
```

5. Gere a JWT_SECRET:

```bash
php artisan jwt:secret
```

6. Gere as tabelas com as migrations, seeders e factories:

```bash
php artisan migrate --seed
```

Após executar os comandos acima, serão criados dados para cada tabela e dois usuários para autenticação da API, com as seguintes credenciais:

- Usuário 1:
  - Email: christian.ramires@example.com
  - Senha: password

- Usuário 2:
  - Email: pedrogab96@gmail.com
  - Senha: pedro@dev

# Extras

Para rodar os testes automatizados:

```bash
php artisan test
```
ou se estiver fora do container da aplicação:

```bash
./vendor/bin/sail php artisan test
```
