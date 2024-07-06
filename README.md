# Task Management

## Setup

1. Clone the repository:
    ```bash
    git clone git clone https://github.com/ipshainu/task-management.git
    cd CRM-System
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Set up the environment file:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Run the migrations:
    ```bash
    php artisan migrate
    ```

5. Run the seeder
    ```bash
    php artisan db:seed
    seed will create one admin with role 'admin' and will create some sample task for this user
    ```