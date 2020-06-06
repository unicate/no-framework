# No-Framework

Packages YES, Framework NO! 

## What is it?

> Call it **"Glue"** or call it **"Boilerplate"**. "No-Framework" aims to give you a head start for development with a simple and understandable foundation. 

> "No-framework" is based on **popular an proven packages** which are easily exchangeable with others you like or already know. 

Mainly the following packages are used: For dependency injection
[PHP-DI](https://php-di.org),
for Database access and queries [Medoo](https://medoo.in),
for Templating [Plates](https://thephpleague.com/plates)
and a few others... And also little self written code as "glue" in between.
        
        
## Why No-Framework

- I want to have **control** and I want to **understand** what I'm doing.<br>
- I want to **start small** and **extend** if necessary.<br>
- I want to **focus** on the **solution**, not the framework.<br>
- I want to **develop fast** without reinventing the wheel.<br>
- I want to use **interchangeable components**.<br>    

The basic answer to satisfy all these needs are packages. Packages as extendable, exchangeable components. With Composer and Packagist the PHP ecosystem offers a perfect solution for this.             


## What it's not!

It's not another PHP framework. There are already great frameworks out there.
Full-fledged like
[Laravel](https://laravel.com/) or
[Synfony](https://symfony.com/) and also Micro-Frameworks like
[Slim](http://www.slimframework.com/) and others.

Using a framework offers some great advantages but has also a few drawbacks. In short that's the following:

- **PROs:** Fast Development, Security, Documentation, Maintenance and Community.
- **CONs:** Generic solution that might not suit your needs, limited control,
time to learn and understand, overhead and slower execution.

## Getting Started

Use Git or Composer:

```
git clone https://github.com/unicate/no-framework.git my-project-name
composer install
```

```
composer create-project unicate/no-framework my-project-name
```

The "Task List" Demo is a simple example application. Download the code and see what happens.
To help you understand, a view hints and principles:

- **Important:** Setup a local Test-Database with the code in `db/`.
- **Important:** Copy the .env-default to .env in `app/config` and enter DB connection details.
- **Important:** To start the local PHP server, just execute  `serve.sh`.
- The architecture is based on the [MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) pattern.
- Objects are only created by the Dependency Injection container and configured in `app/config/dependencies.php`
- All environment dependent configuration is done in `app/config/.env`.
- Routes are defined in `app/config/routes.php`.
- If you want to change file paths, use `app/core/constants.php`.
- Your controller should extend `AbstractController` class.
- Only CSS and JS files should be located in the public directory.
- If you like to exchange a basic package, have a look at `app/config/dependencies.php` and the service classes in
`app/services`.

Folder structure is pretty self explaining:
```
-- app
|  |-- core
|  |-- config
|  |-- middlewares
|  |-- utils
|  |-- models
|  |-- logs
|  |-- controllers
|  |-- views
|  |  |-- templates
|  |-- services
|-- public
|  |-- css
|  |-- js
|-- db
|-- vendor
```

## Disclaimer & Licence
> This code should help you build your own solution. It's not mature and fully tested software. You use anything at your own risk. Have fun with it. 

No-Framework is released under the [MIT](https://raw.githubusercontent.com/unicate/licenses/master/MIT/MIT-Licence.txt) licence.


## Finally            
> Now go and build something and **make people happy**!


