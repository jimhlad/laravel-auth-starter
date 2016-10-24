# laravel-admin-starter

This is a very simple Laravel app which provides some starter code for creating an authentication-based web admin portal (or any SaaS web application really). Basically its purpose is to add some flavouring on top of the default "php artisan make:auth" functionality and to incorporate some commonly needed features.

Please note that this is *very very* much a work in progress and is something I am just messing around with in my spare time :)

## Installation

These instructions assume that you have an environment setup and ready to go (e.g. using Vagrant and Homestead) with Composer and other Laravel-related requirements already installed and configured.

1. Clone the git repo
2. "composer update" to grab the required packages
3. Re-name the .env.example file to .env and add in your DB & Mailgun settings
4. "php artisan key:generate" to update the APP_KEY in the .env file
5. "php artisan migrate" to create the database structure
6. Visit http://your.app

## Features

Some features that are made available out of the box include:

#### AdminLTE Theme

The popular AdminLTE theme with some minor customizations as described below.

#### Login, Register & Forgot Password Forms

The standard pages that come with the "php artisan make:auth" command. Some tweaking was done to substitute the default HTML form boilerplate with Laravel Collective form builder code.

#### Strong Passwords

The registration and reset password forms enforces a strong password which requires at least one capital letter and one number.

#### Inline Real-time JS Validation

As the user types they receive friendly visual feedback in real-time indicating any input issues.

#### Email Verification

Users are prompted to verify their email address upon successful registration. A warning message is then displayed on all pages until the email verification link is clicked.

#### Custom Email Routing

This nice little feature allows you to turn APP_DEBUG on in your .env file and specify an APP_DEBUG_EMAIL=your@email.com. This will cause all outgoing emails to be funnelled to this address regardless of the user's actual email address. This is useful for testing outgoing emails within a Dev/QA/Staging type environment.

#### Login Logging

When a user successfully signs in to the application, their last login date is automatically captured and updated in the database. This can be easily extended to capture other commonly required information like IP address, etc.

#### Welcome Page

The user is taken to a welcome page after a successful registration. This page is accessible only once. The user is brought to the standard home page upon all subsequent logins.

#### Log Viewer

The rap2hpoutre Laravel Log Viewer is included for easily viewing of log files by visiting http://your.app/logs.

## Future

I am hoping to add more features soon, such as built-in Javascript validation of all forms using Laravel FormRequest objects.

Here is a current list of my ideas so that I don't forget:

1. ~~Re-factor the default Auth validation logic using Laravel FormRequest objects~~
2. Incorporate existing plugin to automatically build JS/AJAX validation rules from FormRequest objects
3. ~~Enforce strong passwords when users are registering or resetting their password~~
4. Add profile page allowing the user to update their basic information and choose an avatar
5. Create a generic FileService which can be used to upload images (e.g. the avatar) to Amazon's S3 service
6. Support for SMS notifications
7. Support for two-factor authentication via text/email
8. Add support for basic user roles using custom Middelware

Feel free to send me a message if there is something in particular that you think should be added!
