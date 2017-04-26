# Requerimientos
- [x] PHP >= 5.5.9
- [x] OpenSSL PHP Extension
- [x] PDO PHP Extension
- [x] Mbstring PHP Extension
- [x] Tokenizer PHP Extension

- [x] XAMPP 
- [x] Mysql
- [x] Composer
- [x] Git
- [x] Editor de Texto
- [x] Github Desktop 



# Instrucciónes de Instalación

1. Clonar proyecto git clone 
  1. Entrar en la carpeta C:\xampp\htdocs\
  2. Acceder en git bash 
  3. cd C:\xampp\htdocs\
  4. git clone https://github.com/cumez1/sistaller.git

2. Composer Install
  1. Acceder a la carpeta C:\xampp\htdocs\sistaller
  2. Acceder en git bash
  3. cd C:\xampp\htdocs\sistaller
  4. composer install

3. Crear base de datos en mysql sistaller
  1. ingresar a http://localhost/phpmyadmin/
  2. crear base de datos "sistaller" con cotejamiento utf8_general_ci


4. Enviar migraciones a la base de datos
  1. Acceder en git bash
  2. cd C:\xampp\htdocs\sistaller
  3. php artisan migrate


# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
