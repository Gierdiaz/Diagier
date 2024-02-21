# Project Management System using Laravel

This is a project for a Project Management System developed with the Laravel framework. The system allows users to efficiently manage projects, tasks, deadlines, and teams.

## Key Features:

- **User Authentication**: Implementation of an authentication system so users can register, log in, and log out of the application.

- **Access Permissions**: Definition of different levels of access permissions for users, such as administrator, project manager, and team member.

- **CRUD for Projects**: CRUD (Create, Read, Update, Delete) operations for projects, allowing the creation, viewing, updating, and deletion of projects.

- **CRUD for Tasks**: CRUD operations for tasks within each project, allowing complete management of activities related to a project.

- **Deadline Management**: Inclusion of fields to set deadlines for projects and tasks, with automatic notifications when deadlines are approaching or overdue.

- **Team Management**: Permission to add members to a project's team and assign tasks to specific team members.

- **User-Friendly Blade Interfaces**: Development of intuitive and user-friendly user interfaces to view and interact with projects and tasks.

- **Project Progress Reports**: Generation of reports on project progress, visually presenting task status and deadline compliance.

## Advanced Features to Consider:

- **Real-Time Notifications**: Implementation of real-time notifications using Laravel Echo and WebSockets for instant updates on new tasks, deadline changes, etc.

- **Task Scheduling**: Utilization of Laravel Scheduler to schedule recurring tasks, such as sending automatic reminders for approaching deadlines or generating reports.

- **Email Integration**: Configuration of email sending to notify users about new tasks, project changes, or invitations to join a team.

- **Commenting and Discussion System**: Addition of a commenting system to tasks and projects to allow discussions and additional updates.

- **Integration with Third-Party Tools**: Integration with other popular tools used in software development, such as GitHub, GitLab, Trello, or Slack.

- **Two-Factor Authentication (2FA)**: Strengthening application security by implementing two-factor authentication for users.

- **Logs and Monitoring**: Configuration of logging and integration with monitoring tools to diagnose issues and optimize application performance.

- **Data Backup and Restoration**: Implementation of a regular backup system to protect application data against loss or corruption.

## Additional Development Tools:

- **Pint**: Tool for static code analysis that helps identify potential issues and improvements in PHP code.
``` bash
    ./vendor/bin/pint
```
- **Larastan**: Static analyzer for Laravel that checks the code for typing errors and other issues.
``` bash
    ./vendor/bin/phpstan
```
- **PEST**: PHP testing framework that allows writing tests more clearly and concisely.
``` bash
    ./vendor/bin/pest
```

## Installation Requirements:

- [XAMPP](https://www.apachefriends.org/index.html): Development environment that includes Apache, MySQL, PHP, and phpMyAdmin.
- [Composer](https://getcomposer.org/): PHP dependency manager.
- [Node.js e NPM](https://nodejs.org/): To compile front-end assets (optional).

## How to Install and Run the Project:

### 1. Install XAMPP:
- Download [XAMPP](https://www.apachefriends.org/index.html) and follow the installation instructions for your operating system.
Start the Apache and MySQL services in the XAMPP control panel.

### 2. Install Composer:
- Download and install [Composer](https://getcomposer.org/) ccording to the instructions for your operating system.

### 3. Clone the Repository:
- Clone this repository to the `htdocs` directory within the XAMPP folder:
``` bash
    git clone <REPOSITORY_URL> project-name
```


### 4. Install PHP Dependencies:
- Navigate to the project directory:

- Install PHP dependencies with Composer:
``` bash
    composer install
```


### 5. Set Up Environment:
- Copy the `.env.example` file to `.env`:
``` bash
    cp .env.example .env
```

- Open the `.env` file in a text editor and configure the environment variables, such as database connection and email settings.

### 6. Generate Application Key:
- Generate a new application key:
``` bash
    php artisan key:generate
```


### 7. Run Database Migrations:
- Run the database migrations to create the necessary tables:
``` bash
    php artisan migrate
```

### 8. Start Local Server:
- Start the local server:
``` bash
    php artisan serve
```

### 9. Access the Application:
- Access the application in your browser: `http://localhost:8000`

## Contributing

Contributions are welcome! To contribute to this project, follow these steps:

1. Fork this repository
2. Create a new branch (`git checkout -b feature/new-feature`)
3. Commit your changes (`git commit -am 'Add new feature'`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Submit a Pull Request

