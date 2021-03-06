<p align="center"><img src="https://raw.githubusercontent.com/mralston/bootstrap-breeze/master/art/logo.svg" alt="Logo Laravel Breeze"></p>

<p align="center">
    <a href="https://packagist.org/packages/mralston/bootstrap-breeze">
        <img src="https://img.shields.io/packagist/dt/mralston/bootstrap-breeze" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/mralston/bootstrap-breeze">
        <img src="https://img.shields.io/packagist/v/mralston/bootstrap-breeze" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/mralston/bootstrap-breeze">
        <img src="https://img.shields.io/packagist/l/mralston/bootstrap-breeze" alt="License">
    </a>
</p>

## Introduction

Breeze provides a minimal and simple starting point for building a Laravel application with authentication. Breeze publishes authentication controllers and views to your application that can be easily customized based on your own application's needs.

Bootstrap Breeze is powered by Inertia, Vue and Bootstrap. If you're looking for a more robust Laravel starter kit that includes two factor authentication, Livewire / Inertia support, and more, check out [Laravel Jetstream](https://jetstream.laravel.com).

This package is based on [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze) ([laravel/breeze](https://github.com/laravel/breeze)) by Taylor Otwell.

Getting started couldn't be easier:

```bash
laravel new my-app

cd my-app

composer require mralston/bootstrap-breeze --dev

php artisan breeze:install vue-bootstrap

npm install && npm run dev
```

Configure your database connection in the `.env` file, then:

```
php artisan migrate
```

## Contributing

You can read the contribution guide for Laravel [here](https://laravel.com/docs/8.x/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

Please review [the Laravel security policy](https://github.com/laravel/breeze/security/policy) on how to report security vulnerabilities.

## License

Laravel Breeze is open-sourced software licensed under the [MIT license](LICENSE.md).
