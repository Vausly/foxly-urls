# Foxly - The Simple URL Management

A free and user friendly simple URL management like url shortener built with Laravel. This is an alpha version and may contain bugs.
Since this is my first project, it's not perfect yet.

## Features

- User registration and login
- Shorten long URLs
- Dashboard to manage links
- Custom slugs
- Click tracking
- Stats

## Requirements

- PHP >= 8.1
- [Composer](https://getcomposer.org/)
- Laravel 10+
- [NodeJS](https://nodejs.org/en/download/)
- Web server like [XAMPP](https://www.apachefriends.org/download.html), [Laragon](https://www.laragon.org/download/), [etc](https://www.google.com/search?q=Open+Source+PHP+Servers).
- MySQL / MariaDB (included in XAMPP, Laragon, etc)

## Installation

```bash
git clone https://github.com/Vausly/foxly-urls.git
cd foxly-urls
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

## Support
You can [support this project by donate](https://vausly.ch/tip)
