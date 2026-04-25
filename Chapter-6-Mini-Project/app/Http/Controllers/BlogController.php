<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of all blog posts.
     */
    public function index()
    {
        // Mock blog posts data array
        $posts = [
            [
                'id' => 1,
                'title' => 'Getting Started with Laravel 11',
                'excerpt' => 'Learn the basics of Laravel 11 and start building modern web applications with ease.',
                'content' => 'Laravel 11 introduces several exciting new features and improvements that make web development even more enjoyable. In this comprehensive guide, we will explore the fundamentals of Laravel 11, from installation to creating your first application. Laravel continues to be the PHP framework of choice for developers worldwide, offering elegant syntax, powerful tools, and a vibrant ecosystem. Whether you are a beginner or an experienced developer, Laravel 11 has something to offer for everyone.',
                'author' => 'Alex Thompson',
                'date' => '2024-01-15',
                'category' => 'Development',
                'image' => 'laravel',
            ],
            [
                'id' => 2,
                'title' => 'Mastering Blade Templates',
                'excerpt' => 'Discover the power of Blade templating engine in Laravel for building dynamic views.',
                'content' => 'Blade is Laravel\'s powerful and intuitive templating engine that makes building views a breeze. Unlike other PHP templating engines, Blade does not restrict you from using plain PHP code in your views. In fact, all Blade views are compiled into plain PHP code and cached until they are modified. This guide will walk you through all the essential features of Blade, including template inheritance, components, slots, and more. You will learn how to create reusable layouts, sections, and components that will streamline your development workflow.',
                'author' => 'Sarah Mitchell',
                'date' => '2024-01-20',
                'category' => 'Tutorials',
                'image' => 'blade',
            ],
            [
                'id' => 3,
                'title' => 'RESTful API Development Best Practices',
                'excerpt' => 'Learn how to build robust and scalable RESTful APIs using Laravel\'s resource routing.',
                'content' => 'Building RESTful APIs requires careful planning and attention to design principles. This article covers the best practices for creating APIs that are secure, scalable, and easy to maintain. We will discuss URL design, HTTP methods, status codes, authentication strategies, and response formatting. Laravel provides excellent tools for API development, including resource controllers, API authentication, and rate limiting. By following these best practices, you will create APIs that stand the test of time.',
                'author' => 'Michael Chen',
                'date' => '2024-01-25',
                'category' => 'API',
                'image' => 'api',
            ],
            [
                'id' => 4,
                'title' => 'Database Migration Strategies',
                'excerpt' => 'Essential tips for managing database schema changes in Laravel applications.',
                'content' => 'Database migrations are a crucial part of any Laravel application, allowing you to version control your database schema. This guide covers advanced migration strategies, including rolling back, resetting, and modifying tables safely. You will learn how to handle complex schema changes, work with foreign keys, and optimize migration performance. Best practices for team collaboration and deployment pipelines will also be discussed to ensure smooth database management across environments.',
                'author' => 'Emma Rodriguez',
                'date' => '2024-02-01',
                'category' => 'Database',
                'image' => 'database',
            ],
            [
                'id' => 5,
                'title' => 'Securing Your Laravel Application',
                'excerpt' => 'Comprehensive guide to implementing security best practices in Laravel apps.',
                'content' => 'Security is paramount in web application development. Laravel provides numerous built-in security features, but understanding them is crucial for building secure applications. This comprehensive guide covers authentication, authorization, CSRF protection, XSS prevention, SQL injection prevention, and more. You will learn how to implement secure password hashing, manage user roles and permissions, and protect your application from common vulnerabilities. Stay ahead of security threats with these essential Laravel security practices.',
                'author' => 'Daniel Park',
                'date' => '2024-02-10',
                'category' => 'Security',
                'image' => 'security',
            ],
            [
                'id' => 6,
                'title' => 'Testing Laravel Applications',
                'excerpt' => 'Learn how to write comprehensive tests using PHPUnit and Laravel Dusk.',
                'content' => 'Testing is an essential part of Laravel development, ensuring your application works as expected. This guide covers unit testing, feature testing, and browser testing with Laravel Dusk. You will learn how to write effective tests, mock dependencies, test database interactions, and set up continuous integration. Laravel\'s testing facade makes it easy to simulate user interactions and verify application behavior. Master the art of testing to build reliable and maintainable applications.',
                'author' => 'Rachel Green',
                'date' => '2024-02-15',
                'category' => 'Testing',
                'image' => 'testing',
            ],
        ];

        return view('posts.index', compact('posts'));
    }

    /**
     * Display a single blog post.
     */
    public function show($id)
    {
        // Mock blog posts data array
        $posts = [
            1 => [
                'id' => 1,
                'title' => 'Getting Started with Laravel 11',
                'excerpt' => 'Learn the basics of Laravel 11 and start building modern web applications with ease.',
                'content' => 'Laravel 11 introduces several exciting new features and improvements that make web development even more enjoyable. In this comprehensive guide, we will explore the fundamentals of Laravel 11, from installation to creating your first application. Laravel continues to be the PHP framework of choice for developers worldwide, offering elegant syntax, powerful tools, and a vibrant ecosystem. Whether you are a beginner or an experienced developer, Laravel 11 has something to offer for everyone.

The new release brings simplified application structure, improved performance, and enhanced developer experience. One of the most notable changes is the reduced boilerplate code, allowing developers to focus on business logic rather than configuration. Laravel 11 also introduces native support for scalar type hints, improved error handling, and a more flexible routing system.

Getting started with Laravel 11 is straightforward. First, ensure you have PHP 8.2 or higher installed on your system. Then, use Composer to create a new Laravel project:

composer create-project laravel/laravel example-app

Once installed, you can start the development server with:

php artisan serve

This will launch a local development server at http://localhost:8000, where you can see your application in action. Laravel\'s artisan CLI provides numerous commands to speed up development, including making controllers, models, and migrations with simple commands.

Laravel 11 also brings improvements to the routing system. You can now define routes more concisely, and the framework automatically handles route caching for better performance in production. The new directory structure is more streamlined, making it easier to navigate your project.

Another exciting feature is the improved support for long-running processes and queues. Laravel 11 makes it easier to manage background jobs, process large datasets, and handle asynchronous tasks efficiently. This is particularly useful for applications that need to send emails, process images, or integrate with external APIs.

In conclusion, Laravel 11 is a significant step forward for the framework, offering improved developer experience, better performance, and more modern development patterns. Whether you are building a small website or a complex enterprise application, Laravel 11 provides the tools and conventions you need to succeed.',
                'author' => 'Alex Thompson',
                'date' => '2024-01-15',
                'category' => 'Development',
                'image' => 'laravel',
            ],
            2 => [
                'id' => 2,
                'title' => 'Mastering Blade Templates',
                'excerpt' => 'Discover the power of Blade templating engine in Laravel for building dynamic views.',
                'content' => 'Blade is Laravel\'s powerful and intuitive templating engine that makes building views a breeze. Unlike other PHP templating engines, Blade does not restrict you from using plain PHP code in your views. In fact, all Blade views are compiled into plain PHP code and cached until they are modified. This guide will walk you through all the essential features of Blade, including template inheritance, components, slots, and more. You will learn how to create reusable layouts, sections, and components that will streamline your development workflow.

Blade provides a clean, expressive syntax for common PHP operations. For example, you can output variables using double curly braces: {{ $variable }}. This automatically escapes the output, protecting your application from XSS attacks. If you need to output unescaped content, you can use {!! $variable !!}.

Template inheritance is one of Blade\'s most powerful features. By creating a master layout with common elements like header, footer, and navigation, you can extend this layout in child views and override specific sections. This promotes code reuse and maintains consistency across your application.

Components are another powerful feature introduced in recent Laravel versions. They allow you to create reusable UI elements with their own logic and styling. Components can accept props (called attributes in Blade) and slots, making them incredibly flexible for building modern user interfaces.

Blade also includes several control structures like @if, @foreach, @forelse, and @switch. These directives provide a cleaner alternative to PHP\'s native syntax while maintaining full access to PHP\'s power. The @forelse directive is particularly useful for handling empty arrays gracefully.

To maximize Blade performance, Laravel compiles views into PHP classes and caches them. In production environments, this happens automatically. However, during development, you can clear the view cache with artisan command to ensure your changes are reflected immediately.

Advanced Blade techniques include creating custom directives, using view composers to share data across multiple views, and leveraging the Stack feature for adding JavaScript and CSS to specific pages. These tools give you complete control over your application\'s presentation layer.',
                'author' => 'Sarah Mitchell',
                'date' => '2024-01-20',
                'category' => 'Tutorials',
                'image' => 'blade',
            ],
            3 => [
                'id' => 3,
                'title' => 'RESTful API Development Best Practices',
                'excerpt' => 'Learn how to build robust and scalable RESTful APIs using Laravel\'s resource routing.',
                'content' => 'Building RESTful APIs requires careful planning and attention to design principles. This article covers the best practices for creating APIs that are secure, scalable, and easy to maintain. We will discuss URL design, HTTP methods, status codes, authentication strategies, and response formatting. Laravel provides excellent tools for API development, including resource controllers, API authentication, and rate limiting. By following these best practices, you will create APIs that stand the test of time.

REST (Representational State Transfer) is an architectural style that defines a set of constraints for creating web services. A well-designed RESTful API uses HTTP methods semantically: GET for reading resources, POST for creating new resources, PUT/PATCH for updating existing resources, and DELETE for removing resources.

URL design is crucial for API usability. Use plural nouns for resource names (e.g., /users instead of /user). Organize resources hierarchically when they have parent-child relationships (e.g., /users/123/posts). Use query parameters for filtering, sorting, and pagination rather than creating separate endpoints.

Status codes communicate the outcome of API requests. Use 200 for successful requests, 201 for created resources, 204 for successful deletions with no content, 400 for bad requests, 401 for unauthorized access, 403 for forbidden actions, 404 for not found, and 500 for server errors.

Laravel\'s resource routing makes building RESTful APIs straightforward. A single command creates all necessary endpoints:

php artisan make:controller UserController --resource

This generates a controller with methods for CRUD operations. You can then register it with Route::apiResource() for API-only routes that omit the create and edit views.

Authentication is essential for protecting API endpoints. Laravel Sanctum provides a lightweight token-based authentication system perfect for SPAs and mobile applications. For more complex scenarios, OAuth2 with Laravel Passport offers full OAuth2 server implementation.

Rate limiting protects your API from abuse. Laravel includes built-in rate limiting that you can configure in your RouteServiceProvider. Set reasonable limits based on your application\'s needs and the endpoints\' sensitivity.',
                'author' => 'Michael Chen',
                'date' => '2024-01-25',
                'category' => 'API',
                'image' => 'api',
            ],
            4 => [
                'id' => 4,
                'title' => 'Database Migration Strategies',
                'excerpt' => 'Essential tips for managing database schema changes in Laravel applications.',
                'content' => 'Database migrations are a crucial part of any Laravel application, allowing you to version control your database schema. This guide covers advanced migration strategies, including rolling back, resetting, and modifying tables safely. You will learn how to handle complex schema changes, work with foreign keys, and optimize migration performance. Best practices for team collaboration and deployment pipelines will also be discussed to ensure smooth database management across environments.

Migrations are Laravel\'s version control system for your database. They allow your team to modify and share the application\'s database schema definition. Each migration file describes a specific database change, such as creating a table, adding a column, or modifying an existing schema.

Creating migrations is simple with Artisan. To create a new migration for a users table:

php artisan make:migration create_users_table

Laravel automatically timestamps migration files, ensuring they run in the correct order. You can also specify the table name and whether the migration should create the table using the --create and --table options.

Running migrations is equally straightforward. The migrate command applies all pending migrations:

php artisan migrate

For rolling back the most recent migration operation, use:

php artisan migrate:rollback

The step option allows rolling back a specific number of migrations. For a complete reset and re-application of all migrations, use migrate:fresh, which drops all tables and runs migrations from scratch.

When working with foreign keys, always create the referenced table first. Use the foreignId method for creating foreign key columns efficiently. Remember to define what happens when the parent record is deleted using the onDelete method.

For team environments, ensure migrations are included in your version control system. Each developer should run migrations locally and in CI/CD pipelines. Avoid modifying existing migrations after they have been shared with your team; instead, create new migrations for schema changes.',
                'author' => 'Emma Rodriguez',
                'date' => '2024-02-01',
                'category' => 'Database',
                'image' => 'database',
            ],
            5 => [
                'id' => 5,
                'title' => 'Securing Your Laravel Application',
                'excerpt' => 'Comprehensive guide to implementing security best practices in Laravel apps.',
                'content' => 'Security is paramount in web application development. Laravel provides numerous built-in security features, but understanding them is crucial for building secure applications. This comprehensive guide covers authentication, authorization, CSRF protection, XSS prevention, SQL injection prevention, and more. You will learn how to implement secure password hashing, manage user roles and permissions, and protect your application from common vulnerabilities. Stay ahead of security threats with these essential Laravel security practices.

Laravel handles password security using bcrypt hashing by default through the Hash facade. Never store passwords in plain text. Laravel\'s Hash::make() creates secure hashes, and Hash::check() verifies passwords:

if (Hash::check($request->password, $user->password)) {
    // Password matches
}

CSRF (Cross-Site Request Forgery) protection is automatically included in Laravel. Every form should include the CSRF token field. Blade provides the @csrf directive that generates the hidden token input. This prevents malicious sites from making authenticated requests on behalf of your users.

XSS (Cross-Site Scripting) prevention is handled by Blade\'s automatic escaping. Always use {{ $variable }} instead of {!! $variable !!} when outputting user input. For cases where you need unescaped output, carefully validate and sanitize the content first.

SQL injection prevention is built into Laravel\'s query builder and Eloquent ORM. Always use parameter binding instead of concatenating user input into queries. Eloquent automatically handles escaping, and the query builder\'s where methods use prepared statements.

Authentication in Laravel is handled by the Auth scaffold. Run php artisan ui:auth to generate login, registration, and password reset views and routes. Laravel Fortify provides a headless authentication implementation for more customization.

Authorization uses Gates and Policies. Gates define simple closures for authorization checks, while Policies organize authorization logic around models. Always verify user permissions before performing actions, especially for administrative functions.',
                'author' => 'Daniel Park',
                'date' => '2024-02-10',
                'category' => 'Security',
                'image' => 'security',
            ],
            6 => [
                'id' => 6,
                'title' => 'Testing Laravel Applications',
                'excerpt' => 'Learn how to write comprehensive tests using PHPUnit and Laravel Dusk.',
                'content' => 'Testing is an essential part of Laravel development, ensuring your application works as expected. This guide covers unit testing, feature testing, and browser testing with Laravel Dusk. You will learn how to write effective tests, mock dependencies, test database interactions, and set up continuous integration. Laravel\'s testing facade makes it easy to simulate user interactions and verify application behavior. Master the art of testing to build reliable and maintainable applications.

Laravel is built with testing in mind. The framework includes support for PHPUnit out of the box, with a phpunit.xml configuration file and helpful testing traits. By convention, tests are placed in the tests directory, with Feature tests for HTTP-level tests and Unit tests for testing small, isolated pieces of code.

Creating tests is easy with Artisan:

php artisan make:test UserTest

php artisan make:test UserTest --unit

Feature tests allow you to test complete request-response cycles. You can make GET and POST requests, click links, fill forms, and assert specific responses. Laravel\'s assertion methods make it easy to verify status codes, redirected URLs, session values, and view data.

Database testing is simplified with Laravel\'s RefreshDatabase trait, which migrates the database for each test and rolls back changes afterward. The factories trait lets you generate model instances for testing:

$user = User::factory()->create();

For isolating tests from external services, use mocking. Laravel\'s Mockery wrapper provides convenient methods for mocking facades and services. This ensures tests run quickly and reliably without depending on external systems.

Laravel Dusk provides an expressive API for browser automation testing. Dusk can test JavaScript interactions, take screenshots, and execute ChromeDriver tests. Install Dusk and start testing:

php artisan dusk

Continuous integration is essential for maintaining test coverage. Configure your CI pipeline to run tests on every commit. Tools like GitHub Actions, GitLab CI, and CircleCI integrate easily with Laravel\'s testing setup.',
                'author' => 'Rachel Green',
                'date' => '2024-02-15',
                'category' => 'Testing',
                'image' => 'testing',
            ],
        ];

        // Check if the post exists
        if (!isset($posts[$id])) {
            abort(404);
        }

        $post = $posts[$id];

        return view('posts.show', compact('post'));
    }
}

