# BandManager

Aplicação web desenvolvida em Laravel para gestão de bandas musicais e dos seus álbuns.

Projeto desenvolvido no âmbito da formação **Software Developer — CESAE Digital**.

## Tecnologias utilizadas

- PHP
- Laravel
- MySQL
- Blade
- Bootstrap
- Laravel Fortify
- Eloquent ORM
- Git e GitHub

## Funcionalidades

A aplicação permite:

- Listar bandas musicais e visualizar as respetivas fotografias.
- Consultar os álbuns associados a cada banda.
- Visualizar capas e datas de lançamento dos álbuns.
- Criar, editar e eliminar bandas.
- Criar, editar e eliminar álbuns.
- Carregar fotografias das bandas e capas dos álbuns.
- Registar utilizadores e iniciar ou terminar sessão.
- Controlar o acesso às funcionalidades de acordo com o perfil do utilizador.
- Consultar um Dashboard protegido por autenticação.

## Funcionalidades adicionais

Além das funcionalidades obrigatórias solicitadas no enunciado,
foram implementadas duas funcionalidades extra:

### 1. Pesquisa de Bandas

Foi desenvolvido um sistema de pesquisa que permite:

- Pesquisar bandas pelo nome.
- Apresentar apenas os resultados correspondentes.
- Informar o utilizador quando não existem resultados.
- Limpar a pesquisa e voltar a visualizar todas as bandas.

A pesquisa utiliza o Eloquent ORM e consultas à base de dados MySQL.

### 2. Recuperação de Palavra-passe

Foi implementado um sistema de recuperação de palavra-passe
através do Laravel Fortify.

Esta funcionalidade permite:

- Solicitar a recuperação através do e-mail registado.
- Gerar um link de recuperação com token de segurança.
- Definir e confirmar uma nova palavra-passe.
- Iniciar sessão com a nova palavra-passe.

Em ambiente de desenvolvimento, foi utilizado o MAIL_MAILER=log,
permitindo testar a recuperação sem um serviço de e-mail externo.

### Outras melhorias

- Dashboard com estatísticas dinâmicas do total de bandas e álbuns.
- Mensagem de erro quando as credenciais de login são inválidas.
- Interface inicial reorganizada com componentes Bootstrap.

## Perfis e permissões

| Funcionalidade | Admin | User | Visitante |
|---|---|---|---|
| Consultar bandas e álbuns | Sim | Sim | Sim |
| Criar bandas e álbuns | Sim | Não | Não |
| Editar bandas e álbuns | Sim | Sim | Não |
| Eliminar bandas e álbuns | Sim | Não | Não |
| Aceder ao Dashboard | Sim | Sim | Não |

Os novos utilizadores registados através da aplicação recebem o perfil `user` por predefinição.

O perfil `admin` é atribuído através da base de dados.

## Estrutura da base de dados

A aplicação utiliza três tabelas principais:

### users
- Dados dos utilizadores.
- Campo `role` para identificação do perfil.

### bands
- `id`
- `name`
- `photo`

### albums
- `id`
- `name`
- `image`
- `release_date`
- `band_id`

Uma banda pode ter vários álbuns, enquanto cada álbum pertence a uma banda.

Esta relação é implementada através dos métodos `hasMany()` e `belongsTo()` do Eloquent.

## Instalação e execução

### 1. Clonar o repositório

```bash
git clone https://github.com/robertatramontina/bandmanager.git
cd bandmanager
```

### 2. Instalar as dependências

```bash
composer install
```

### 3. Configurar o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

No PowerShell, o ficheiro `.env` também pode ser criado com:

```powershell
Copy-Item .env.example .env
```

Configurar no ficheiro `.env` a ligação à base de dados MySQL:

```env
DB_CONNECTION=mysql
DB_DATABASE=bandmanager
DB_USERNAME=root
DB_PASSWORD=
```

Os valores de utilizador e palavra-passe devem ser ajustados de acordo com a instalação local do MySQL.

### 4. Criar a base de dados

Criar uma base de dados MySQL chamada `bandmanager`.

Executar as migrations:

```bash
php artisan migrate
```

### 5. Configurar o armazenamento das imagens

```bash
php artisan storage:link
```

As fotografias são armazenadas no disco público do Laravel. Os respetivos caminhos são guardados na base de dados.

### 6. Iniciar a aplicação

```bash
php artisan serve
```

Aceder através do navegador:

http://127.0.0.1:8000

## Autenticação e autorização

A autenticação é implementada com Laravel Fortify.

As rotas protegidas utilizam o middleware `auth`.

As permissões são verificadas nos Controllers e a apresentação dos botões é condicionada pelo perfil do utilizador nas views Blade.

Para testar as funcionalidades administrativas, é necessário atribuir o perfil `admin` a um utilizador na base de dados.

## Organização do projeto

O desenvolvimento foi realizado com Git, utilizando branches para separar funcionalidades:

- `feature/database`
- `feature/layout`
- `feature/band-controller`
- `feature/album-controller`
- `feature/auth`
- `feature/photos`

As funcionalidades concluídas foram integradas na branch `main`.

## Autoria

**Roberta Tramontina**

Formação Software Developer — CESAE Digital

2026
