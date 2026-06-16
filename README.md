# IS KENDA API

API REST do site institucional da **IS KENDA Consultoria & Academia** — gestão de conteúdos como serviços, clientes, equipa, galeria, cursos, valores da empresa e contactos.

Construída com [Laravel](https://laravel.com), o framework PHP mais robusto e elegante para aplicações web modernas.

## Stack

- **PHP** 8.4
- **Laravel** 13
- **MySQL**
- **Sanctum** — autenticação por token Bearer
- **Scramble** — documentação OpenAPI 3.1.0 automática

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

## Documentação

A documentação interativa da API é gerada automaticamente pelo Scramble:

| Recurso | URL |
|---------|-----|
| UI | `/docs/api` |
| OpenAPI JSON | `/docs/api.json` |

## Autenticação

A maioria dos endpoints exige um token **Sanctum (Bearer Token)**.

```bash
# Obter token
curl -X POST http://localhost/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email": "admin@iskenda.com", "password": "password"}'

# Usar token nas requisições autenticadas
curl -X GET http://localhost/api/admin/dashboard \
  -H "Authorization: Bearer {seu-token}"
```

## Endpoints

### Públicos

| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/api/site-data` | Dados públicos do site |
| POST | `/api/contacts` | Enviar mensagem de contacto |
| POST | `/api/auth/login` | Login do administrador |

### Administrativos (requer `auth:sanctum`)

| Método | Rota | Descrição |
|--------|------|-----------|
| POST | `/api/auth/logout` | Terminar sessão |
| GET | `/api/auth/me` | Dados do utilizador autenticado |
| GET | `/api/admin/dashboard` | Resumo do painel |
| CRUD | `/api/admin/services` | Gestão de serviços |
| CRUD | `/api/admin/clients` | Gestão de clientes |
| CRUD | `/api/admin/team-members` | Gestão de membros da equipa |
| CRUD | `/api/admin/gallery-items` | Gestão da galeria |
| CRUD | `/api/admin/courses` | Gestão de cursos |
| CRUD | `/api/admin/company-values` | Gestão de valores corporativos |
| GET/DELETE | `/api/admin/contacts` | Gestão de contactos recebidos |
| GET/PUT | `/api/admin/company-info` | Gestão de informações da empresa |

## Autoria

Criado por [**Abraão Sala**](mailto:abraao.sala@salasolucoes.com) — **Sala Soluções**

## License

MIT
