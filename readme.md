
## Table of contents

 - [Requirements](#requirements)
 - [Quick Start and Installation](#quick-start-and-installation)

 - [Authors](#authors)

## Purpose and Features

The purpose of this repository is to provide a source of a real website that's using the Laravel PHP Framework and implements good design patterns for its architecture.

## Requirements

The Laravel requires a server with PHP 7.0+ that has the MCrypt extension installed.

The database engine that is used to store data for this application could be any of the engines supported by Laravel: MySQL, Postgres, SQLite and SQL Server.

## Quick Start and Installation

To get started download this repository, create an empty database that this application will use, configure a few settings in env file!

### Configuration

- Open up `app/.env` and configure connection settings for your database.
 

After this simple configuration you can populate the database by running a couple commands shown below.

### Installation

CD into the directory of this project and run the following three commands:

1. `composer install`
2. `php artisan migrate`
3. `php artisan db:seed`
4. `npm install`
5. `npm run watch`

This will install all Composer dependencies, create the database structure and populate the database with some sample data so that you could see this project in action.

## Documentation

While the code of the application is heavily documented it helps to know how the code is structured and what standards it follows.

### Project structure

1. `All logic is placed under app\Http\Controllers`
2. `All models are placed in app\ dir`
3. `Database schema can be found app\database\migrations`
4. `Frontend Part is mostly in app\views dir`

## Authors

**Deepanshu Gandhi**

- <https://github.com/nine-tails9>

## Project Link

- <https://www.cataliist.in>
Some features doesn't work on hosting due to server issues.

