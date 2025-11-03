<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## PROJECT DESCRIPTION

The Lead Management System is a web application built with Laravel to help businesses manage their leads efficiently. Users can add, edit, import, export, and track leads, all from a clean and responsive interface. The system supports role-based access, ensuring proper permissions for admins and regular users.

## Features

1. Lead CRUD: Create Read Update Delete
2. Import Lead from excel.
3. Export leads to Excel for reporting.
4. Dashboard with summary cards:
    * Total Leads
    * New Leads
    * In progress leads
    * Closed Leads
5. Lead history tracking [status change]
6. Email notifications when lead updated
7. Role based access
    * Admin : Can perform all the add/edit actions
    * User: Can see the leads and can perform only few actions

## System Requirements

* PHP >= 8.1
* Laravel
* Mysql
* Composer
* Mailtrap account for email testing

## INSTALLATION AND SETUP

## Clone the Repository

git clone <your-repo-url>
cd lead-management

## Install Dependencies
    composer install

## Environment Setup
    Update .env with your database and email settings.


## CONFIGURATION SETUP

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=lead_management
DB_USERNAME=root
DB_PASSWORD=

# Database schema available in lead_management.sql file.
Can be added in the mysql workbench and run the code.


# Mail COnfiguration
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=from@example.com
MAIL_FROM_NAME="Lead Management"

## Running the Application 
1. php artisan serve
2. Access app at http://127.0.0.1:8000

## APPLICATION USES

# Dashboard:
View leads summary
# Lead Listing:
View all leads with actions: Edit, History, Delete
# Add Lead:
Add a new lead manually
# Import Lead:
Upload an Excel file with leads
# Export Lead:
Download current leads in Excel
# Lead History:
See all updates for a lead
# Email Notifications:
Emails are sent on lead updates

| Route Name          | URL                   | Method | Controller & Method               | Description                    |
| ------------------- | --------------------- | ------ | --------------------------------- | ------------------------------ |
| `login.form`        | `/`                   | GET    | `AuthController@showLoginForm`    | Show login page                |
| `login`             | `/login`              | POST   | `AuthController@login`            | Handle login submission        |
| `logout`            | `/logout`             | GET    | `AuthController@logout`           | Logout the user                |
| `register.form`     | `/register`           | GET    | `AuthController@showRegisterForm` | Show registration page         |
| `register`          | `/register`           | POST   | `AuthController@register`         | Handle registration submission |
| `dashboard`         | `/dashboard`          | GET    | `DashboardController@index`       | Show user dashboard            |
| `leads.index`       | `/leads`              | GET    | `LeadController@index`            | List all leads                 |
| `leads.create`      | `/leads/create`       | GET    | `LeadController@create`           | Show form to add a new lead    |
| `leads.store`       | `/leads`              | POST   | `LeadController@store`            | Store new lead in database     |
| `leads.edit`        | `/leads/{id}/edit`    | GET    | `LeadController@edit`             | Show form to edit a lead       |
| `leads.update`      | `/leads/{id}/update`  | POST   | `LeadController@update`           | Update lead in database        |
| `leads.delete`      | `/leads/{id}/delete`  | POST   | `LeadController@destroy`          | Delete a lead                  |
| `leads.history`     | `/leads/{id}/history` | GET    | `LeadController@history`          | Show lead update history       |
| `leads.import.form` | `/leads/import`       | GET    | `LeadController@showImportForm`   | Show Excel import form         |
| `leads.import`      | `/leads/import`       | POST   | `LeadController@import`           | Handle Excel import of leads   |
| `leads.export`      | `/leads/export`       | GET    | `LeadController@export`           | Export leads to Excel          |



