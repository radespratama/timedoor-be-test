# Bookstore Application

## Introduction

The **Bookstore Application** is a Laravel-based project for managing books, authors, and ratings. This application allows users to view a list of books, add ratings, and see top-rated authors dynamically.

## Requirements

Before you begin, ensure that your system meets the following requirements:

-   PHP `^8.1`
-   Composer `^2.x`
-   Laravel `^10.x`
-   Database (MySQL)

## Installation

Follow these steps to set up the project:

### 1. Clone the Repository

Clone the project repository to your local machine:

```bash
git clone https://github.com/radespratama/timedoor-be-test.git
```

### 2. Install depedencies

Install the depedencies laravel using composer:

```bash
composer install
```

### 3. Configuration the .env

Duplicate the .env.example to .env:

```bash
cp .env.example .env
```

### 4. Running the migration

Running script artisan migrate for auto insert to your database:

```bash
php artisan migrate --seed
```

### 5. Run your app

After that, you can run the app using running script:

```bash
php artisan serve
```
