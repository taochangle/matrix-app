# Matrix App

Application scaffold for the Matrix framework.

## Quick Start

```bash
git clone https://github.com/taochangle/matrix-app.git my-project
cd my-project
composer install
php -S 0.0.0.0:8000 -t public
```

Visit `http://localhost:8000/`.

## Documentation

Full documentation at [taochangle.github.io/matrix-doc](https://taochangle.github.io/matrix-doc/).

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
