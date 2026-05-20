# Matrix App

Application scaffold for the Matrix framework.

## Quick Start

### Docker (recommended)

```bash
git clone https://github.com/taochangle/matrix-app.git my-project
cd my-project
docker compose up -d
```

Visit `http://localhost:8000/`.

### Manual

```bash
git clone https://github.com/taochangle/matrix-app.git my-project
cd my-project
composer install
./matrix serve
```

## Documentation

Full documentation at [taochangle.github.io/matrix-doc](https://taochangle.github.io/matrix-doc/).

## CLI Commands

```bash
./matrix serve                    # Start dev server (default for Docker)
./matrix make:controller User     # Generate a controller
./matrix make:middleware Auth     # Generate a middleware
./matrix help                     # List all commands
```

## Project Structure

```
├── app/
│   ├── Controllers/      # Your controllers
│   ├── Middlewares/      # Your middleware
│   └── Services/         # Your business logic
├── public/
│   └── index.php         # Entry point
├── routes/
│   └── web.php           # Route definitions
├── vendor/               # Dependencies (auto-installed)
├── Dockerfile
├── docker-compose.yml
└── composer.json
```

## Routing

Define routes in `routes/web.php`:

```php
// Closure handler
$router->get('/', fn($req) => Response::json(['status' => 'ok']));

// Controller handler
$router->get('/api/user', [App\Controllers\UserController::class, 'index']);
$router->get('/api/user/{id}', [App\Controllers\UserController::class, 'show']);
```

## Middleware

Register global middleware in `public/index.php`:

```php
$app->addGlobalMiddleware([
    new App\Middlewares\GlobalLogger(),
]);
```

## License

MIT
