# PHP Human Interview Challenge API

REST API for animal facts (Cat Facts and Dog Facts).

## Setup

1. Clone **your** public fork of this repository.
2. `cp .env.example .env`
3. Install dependencies (use Docker so the host PHP version does not matter):

```bash
docker run --rm -v "$(pwd)":/opt -w /opt composer:2 bash -c "composer install --ignore-platform-reqs"
```

4. Start the app: `vendor/bin/sail up -d`
5. `vendor/bin/sail artisan key:generate`
6. `vendor/bin/sail artisan migrate --seed`
7. Open http://localhost:8042/api/v1 — you should see the API name and version.

## Tests

```bash
vendor/bin/sail test
```

All feature tests must pass.

## Endpoints

Base URL: `http://localhost:8042/api/v1`

### Cat Facts

| Method | Path | Body |
|--------|------|------|
| GET | `/cat-facts` | — (`page`, `pageSize`; default 25) |
| GET | `/cat-facts/{id}` | — |
| POST | `/cat-facts` | `{"fact":"..."}` |
| PUT | `/cat-facts/{id}` | `{"fact":"..."}` |
| DELETE | `/cat-facts/{id}` | — |

### Dog Facts

| Method | Path | Body |
|--------|------|------|
| GET | `/dog-facts` | — (`page`, `pageSize`; default 25) |
| GET | `/dog-facts/{id}` | — |
| POST | `/dog-facts` | `{"fact":"..."}` |
| PUT | `/dog-facts/{id}` | `{"fact":"..."}` |
| DELETE | `/dog-facts/{id}` | — |

Send `Content-Type: application/json` and `Accept: application/json` on requests with a body. `fact` is required on store and update.
