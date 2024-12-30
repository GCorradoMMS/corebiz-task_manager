# CoreBiz Backend Developer Technical Challenge - TaskManager API

Simple Task Manager API, including some features like testing, database seeding, complete API documentation and following a Service/Repository architecture with SOLID standards.

Project developed using:
- Docker
- PHP/Laravel
-  PostgreSQL
- Nginx
- l5-swagger package
## Prerequisites 
Before running the project, make sure you have `Docker` installed; install it from [here](https://www.docker.com/get-started). You will need `docker compose` .

If you wish to run the project without docker, you will need at least:
- [PHP ^8.2](https://www.php.net/downloads.php)
- [PostgreSQL](https://www.postgresql.org/download/)
- [Composer](https://getcomposer.org/download/)

Optional
- [Nginx](https://nginx.org/en/)
- [Laravel](https://laravel.com/docs/11.x/installation#installing-php)

Regarding the environment, for the sake of convenience you can just rename the `.env.example` file to `.env` to have a working configuration.

## Steps to Build and Run the Project

To build and run the project using Docker, follow these steps:

1. Clone the repository to your local machine:
   ```bash
   git clone https://github.com/GCorradoMMS/corebiz-task_manager
   #or
   git clone git@github.com:GCorradoMMS/corebiz-task_manager.git
   cd task-manager

2.  Build and start the application using Docker Compose:
```
docker compose up --build
```
3. Run database migrations and seed the database:
```
docker compose exec corebiz-task_manager php artisan migrate:fresh --seed
```
4. Run tests:
```
docker compose exec corebiz-task_manager php artisan test
```
5. Generate the API documentation:
```
docker compose exec corebiz-task_manager php artisan l5-swagger:generate
```
If you are not setting up the project with Docker, just ignore the execution commands inside the container.
## API Documentation format
### OpenAPI Standard documentation file
Generated at:
```
storage/api-docs
```
### Web Interface
Can be accessed through:
```
http://localhost:8080/api/documentation
```
### Web JSON
Can be accessed through:
```
http://localhost:8080/docs
```
