# Event Organizer (Laravel)

GymTracker is a web application built with Laravel to record and track workouts. It allows users to create and manage exercises (with demonstration images), plan training sessions with detailed sets (set number, reps, and weight), and review their workout history. The project follows the MVC pattern and uses Tailwind CSS compiled with Vite for frontend design.

## Table of Contents

* [Key Features](#key-features)
* [Technologies Used](#technologies-used)
* [Prerequisites](#prerequisites)
* [Installation](#installation)
* [Usage](#usage)
* [Project Structure and MVC](#project-structure-and-mvc)
* [Database (Models and Relationships)](#database-models-and-relationships)
    * [ERD Design](#erd-design)
    * [Models and Migrations](#models-and-migrations)
    * [Eloquent ORM](#eloquent-orm)
* [Views (Blade and Tailwind CSS)](#views-blade-and-tailwind-css)
* [Forms and Validation](#forms-and-validation)
* [Authentication and Authorization](#authentication-and-authorization)
* [Error Handling](#error-handling)
* [Repository Management (Gitflow)](#repository-management-gitflow)
* [Contributing](#contributing)
* [License](#license)

## Key Features


* **Full Exercise Management (CRUD):**  
  Create, list, view details, edit, and delete exercises, including fields for name, muscle group, description, and demonstration photo.

* **Full Session Management (CRUD):**  
  Plan and manage training sessions with date, notes, and associated sets.

* **Series Tracking:**  
  Register unlimited sets per session, tracking set number, repetitions, and weight used.

* **Image Upload & Preview:**  
 Exercise image uploads stored in storage/app/public, with instant preview in edit forms.

* **Dynamic Series Addition:**  
  "Add Set" button that appends form blocks via GET parameters, enabling set addition/removal.

* **Pagination:**  
  Paginated listings for exercises and sessions to improve navigation with large datasets.

* **Responsive Design with Tailwind CSS + Vite:**  
  Clean, mobile-friendly UI compiled with Vite.

* **MVC Architecture & Eloquent ORM:**  
  Clear Model-View-Controller structure, with relationships between Exercise, Session, and Set models managed via Eloquent.

* **Validation & Error Handling:**  
  Form validation in controllers, inline error messages per field (@error), and null value handling using optional()

## Technologies Used

* **Backend Framework:** Laravel 12
* **Language:** PHP 8.1
* **Database:** MySQL
* **Frontend:** Blade, Tailwind CSS, 
* **Web Server:** Apache
* **Dependency Manager:** Composer
* **Build Tool:** Vite

## Prerequisites

* PHP (version required by your Laravel)
* Composer
* Node.js and NPM (for Vite and frontend dependencies)
* Database Server (the one you chose)
* Git

## Installation

Follow these steps to set up the project in your local environment:

1.  **Clone the repository:**
    ```bash
    git clone [GITHUB_REPOSITORY_URL]
    cd [DIRECTORY_NAME]
    ```
2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```
3.  **Copy the environment file:**
    ```bash
    cp .env.example .env
    ```
4.  **Generate the application key:**
    ```bash
    php artisan key:generate
    ```
5.  **Configure the database:** Edit the `.env` file with your database details (name, user, password).
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_db_name
    DB_USERNAME=your_db_user
    DB_PASSWORD=your_db_password
    ```
6.  **Run the migrations:**
    ```bash
    php artisan migrate
    ```
    *(Optional: If you have seeders for initial data)*
    ```bash
    php artisan db:seed
    ```
7.  **Install frontend dependencies:**
    ```bash
    npm install
    ```
8.  **Compile frontend assets:**
    * For development (with hot reload): `npm run dev`
    * For production: `npm run build`
9.  **Create the storage symbolic link:** (If using `storage/app/public` for images)
    ```bash
    php artisan storage:link
    ```

## Usage

1.  **Start the development server:**
    ```bash
    php artisan serve
    ```
    *(Note: If using Valet, Herd, Laragon, etc., access via your configured `.test` domain instead)*

2.  **Keep Vite running (if in development):**
    ```bash
    npm run dev
    ```
3.  Open your browser and go to `http://127.0.0.1:8000` (or the URL provided by `php artisan serve`, or your `.test` domain like `http://eventorganizerlaravel.test/`).

## Project Structure and MVC

The project follows Laravel's standard **Model-View-Controller (MVC)** architecture:

* **Models (`app/Models`):** Represent database entities (`Event`, `User`, `Category`). Interact with the database using Eloquent.
* **Views (`resources/views`):** Present the user interface using Blade templates and Tailwind CSS styles. Include layouts, partials, and page-specific views.
* **Controllers (`app/Http/Controllers`):** Handle user requests, interact with models to retrieve/modify data, and load the appropriate views (`HomeController`, `EventController`, `CategoryController`, `ProfileController`, `AuthController`, `RegisterController`).

## Database (Models and Relationships)

### ERD Design

An Entity-Relationship Diagram (ERD) was designed to define the entities, attributes, and relationships for the event management system.

### Models and Migrations

Database migrations (`database/migrations`) were created to define the table structure corresponding to the models:

* `User`: Stores registered user information.
* `Category`: Defines event categories.
* `Event`: Stores details for each event, including relationships with `User` (creator) and `Category`.
* `event_users` (Pivot Table): Manages the many-to-many relationship between `Event` and `User` (attendees), including the number of guests (`guests_count`).

### Eloquent ORM

Laravel's Eloquent ORM is used for object-oriented database interaction, defining relationships (`belongsTo`, `belongsToMany`) within the models.

## Views (Blade and Tailwind CSS)

The user interface is built with:

* **Blade:** Laravel's templating engine for creating dynamic views. Utilizes layouts (`layouts/`), partials (`partials/` or `components/`) for code reuse (e.g., `event_card`).
* **Tailwind CSS:** A utility-first CSS framework for rapid, custom UI development. Responsive design is implemented to adapt to different devices.

## Forms and Validation

* Forms have been created for registration, login, event creation/editing, and profile editing.
* Data validation is implemented on both the client-side (HTML5, potentially JS) and server-side (using Laravel Form Requests or controller validation) to ensure data integrity.

## Authentication and Authorization

* **Authentication:** Laravel's built-in authentication system (likely Fortify/Sanctum or Breeze/Jetstream/UI) is used to manage user registration, login, and logout, as evidenced by the routes grouped by `middleware('guest')` and `middleware('auth')`.
* **Authorization:** Authorization mechanisms are implemented (or planned) to control actions authenticated users can perform. For example, using Laravel Gates or Policies to allow only the event creator to edit or delete their event, or only the user themselves to edit/delete their profile.
    *(Optional: Mention if Roles/Permissions are used, e.g., with Spatie Laravel Permissions)*

## Error Handling

Laravel provides robust error handling. Custom error pages (e.g., 404, 500) can be created in `resources/views/errors`.

## Repository Management (Gitflow)

Development follows (or should follow) a Gitflow-based workflow using a GitHub repository:

* `main` (production) and `develop` branches.
* `feature/` branches for new functionalities.
* Use of Pull Requests for reviewing and merging code into `develop`.
* `release/` and `hotfix/` branches as needed.

## Contributing

Contributions are welcome. Please follow the Gitflow workflow, create a Pull Request from your feature branch to `develop`, and describe your changes.
