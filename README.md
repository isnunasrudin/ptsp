# Laravel SB Admin 2

SB Admin 2 for Laravel.

| Laravel Version | Branch | Support     |
|-----------------|--------|-------------|
| 8.83            | main   | PHP 7.4 compatibility; end of life |
| 11.0            | v11.0  |             |
| 10.0            | v10.0  | End of life |
| 9.0             | v9.0   | End of life |
| 8.0             | v8.0   | End of life |

## Requirements

- PHP 7.4.33 (or compatible PHP 8.x)
- Composer >= 2.9.2
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- GD PHP Extension
- Fileinfo PHP Extension
- Filter PHP Extension
- Hash PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Session PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- ZIP PHP Extension

## Installation

- Clone the repo and `cd` into it
- Run `composer install`
- Rename or copy `.env.example` file to `.env`
- Run `php artisan key:generate`
- Set your database credentials in your `.env` file

## PHP 7.4 compatibility

The project uses Laravel 8.83, Laravel UI 3, Laravel DomPDF 2, and PHPUnit 9.
Composer resolves all dependencies against PHP 7.4.33 through `config.platform.php`.
Deploy with `composer install --no-dev --optimize-autoloader` using the committed
`composer.lock`, then run `php artisan optimize:clear`. Keep the existing database
and uploaded files; downgrading the framework does not require resetting them.
Run `composer check-platform-reqs --no-dev` on the destination server to check
its actual PHP version and extensions. Excel exports also require GD and ZIP.
The dashboard currently uses SQLite-specific queries.

PHP 7.4 and Laravel 8 are no longer maintained. The required legacy Laravel,
Flysystem, and DomPDF releases have known security advisories. Composer contains
explicit exceptions only for dependency resolution (`apply: block`); these
advisories remain reported by `composer audit`. The exceptions do not fix the
vulnerabilities. Keep `APP_DEBUG=false` in production and generate PDF only from
the application's templates. Upgrading PHP and Laravel is needed to move to
maintained releases.

## Note

Recommend to install this preset on a project that you are starting from scratch, otherwise your project's design might break.

If you found this project useful, then please consider giving it a :star:

## Credits

Laravel SB Admin 2 uses some open-source third-party libraries/packages, many thanks to the web community.

- Laravel - Open source framework.
- LaravelEasyNav - Making managing navigation in Laravel easy.
- SB Admin 2 - Thanks to Start Bootstrap.

## Preview

`login`

<img src="https://imgur.com/YjGp6Sbl.png">

***

`register`

<img src="https://imgur.com/Wj09cu4l.png">

***

`dashboard`

<img src="https://imgur.com/CrmOfT5l.png">

***

`profile`

<img src="https://imgur.com/5t4eS1rl.png">

***

`logout`

<img src="https://imgur.com/d9JclOYl.png">

## License

Licensed under the [MIT](LICENSE) license.
