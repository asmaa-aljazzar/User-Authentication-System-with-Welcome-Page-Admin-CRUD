# User Authentication System

A small PHP and MySQL learning project for account registration, login, role-based pages, and admin user management. The interface is built with HTML, CSS, and JavaScript.

## Features

- Register accounts with username, email, and password validation.
- Log in with password-hash verification and PHP sessions.
- Direct users and administrators to role-specific pages.
- Manage user accounts from the admin dashboard: add, edit, and delete.
- Use PDO prepared statements for database queries.

Some page content is still placeholder text (for example, the welcome page's profile details), so this is a learning project rather than a production-ready authentication system.

## Requirements

- PHP 8.2 or newer with PDO MySQL enabled
- MySQL or MariaDB
- Apache (XAMPP is suitable)

## Setup with XAMPP

1. Place the project inside XAMPP's `htdocs` directory.
2. Start Apache and MySQL from the XAMPP Control Panel.
3. Open phpMyAdmin, create a database named `authentication`, and import [`database/authentication.sql`](database/authentication.sql).
4. Check the database username and password in [`config/dbconnect.php`](config/dbconnect.php). The defaults are `root` with an empty password.
5. If the project is not served from `/tasks/User-Authentication-System-with-Welcome-Page-Admin-CRUD/`, update `BASE_URL` in [`config/paths.php`](config/paths.php) to match its URL path.
6. Open the project in your browser. With the default XAMPP folder layout, use `http://localhost/tasks/User-Authentication-System-with-Welcome-Page-Admin-CRUD/`.

The SQL import includes demo accounts. The documented admin login is `admin@example.com` with password `admin123`; see [`database/login_example.md`](database/login_example.md). Change or remove demo credentials before sharing or deploying the project.

## Main pages

| Page | Purpose |
| --- | --- |
| `index.php` | Landing page |
| `register.php` | Create a user account |
| `login.php` | Sign in |
| `welcome.php` | User-only welcome page |
| `admin/dashboard.php` | Admin user list and management actions |
| `logout.php` | End the current session |

## Project layout

```text
admin/       Admin dashboard and user-management pages
assets/      Stylesheets and browser-side JavaScript
config/      Database connection and application URL settings
database/    Database schema, demo data, and login example
includes/    Authentication, role checks, shared layout, and CRUD helpers
```

## Security note

This project is intended for local learning and demonstration. Before using it with real users, review and add protections such as CSRF defenses, secure production database credentials, HTTPS, and suitable session-cookie settings.
