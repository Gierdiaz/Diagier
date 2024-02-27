# Project Management System using Laravel

### This is a project for a Project Management System developed with the Laravel framework. The system allows users to efficiently manage projects, tasks, deadlines, and teams.

## Key Features:

- **User Authentication**: Implementation of an authentication system so users can register, log in, and log out of the application.

- **Access Permissions**: Definition of different levels of access permissions for users, such as administrator, project manager, and team member.

- **Developers**: CRUD operations for Developers, manage developers involved in the projects, including their profiles, skills, availability, and assignments to specific tasks or projects.

- **Projects**: CRUD operations for projects, allowing the creation, viewing, updating, and deletion of projects.
   
- **Tasks**: CRUD operations for tasks within each project, allowing complete management of activities related to a project.

- **Feedbacks**: CRUD operations for Feedbacks, provide a mechanism for team members to give and receive feedback on tasks, projects, or overall performance, facilitating continuous improvement and communication within the team.

- **Team Members**: CRUD operations for Team Members, allows administrators to manage team members by adding, removing, or updating information such as name, role, email, etc.

- **Clients or Stakeholders**: CRUD operations for Clients or Stakeholders, maintain a record of clients or stakeholders involved in the projects, including contact information, company details, and interaction history.

- **Documents**: CRUD operations for Documents, enable uploading, viewing, and management of documents related to projects, such as specifications, contracts, spreadsheets, etc.

- **Project Stages**: CRUD operations for Project Stages, divide projects into stages or phases and allow management of these stages, including setting deadlines, assigning responsibilities, and tracking completion status.

- **Deadline Management**: Inclusion of fields to set deadlines for projects and tasks, with automatic notifications when deadlines are approaching or overdue.

- **Team Management**: Permission to add members to a project's team and assign tasks to specific team members.

- **User-Friendly Blade Interfaces**: Development of intuitive and user-friendly user interfaces to view and interact with projects and tasks.

- **Project Progress Reports**: Generation of reports on project progress, visually presenting task status and deadline compliance.
  
- **Social Authentication with Laravel Socialite**: Integrate Laravel Socialite to allow users to authenticate using popular social media platforms such as Google, Facebook, Twitter, etc., providing a seamless login experience.
  
## Advanced Features to Consider:

- **Real-Time Notifications**: Implementation of real-time notifications using Laravel Echo and WebSockets for instant updates on new tasks, deadline changes, etc.

- **Task Scheduling**: Utilization of Laravel Scheduler to schedule recurring tasks, such as sending automatic reminders for approaching deadlines or generating reports.

- **Email Integration**: Configuration of email sending to notify users about new tasks, project changes, or invitations to join a team.

- **Commenting and Discussion System**: Addition of a commenting system to tasks and projects to allow discussions and additional updates.

- **Integration with Third-Party Tools**: Integration with other popular tools used in software development, such as GitHub, GitLab, Trello, or Slack.

- **Two-Factor Authentication (2FA)**: Strengthening application security by implementing two-factor authentication for users.

- **Logs and Monitoring**: Configuration of logging and integration with monitoring tools to diagnose issues and optimize application performance.

- **Data Backup and Restoration**: Implementation of a regular backup system to protect application data against loss or corruption.

## Usage of Livewire

This project extensively utilizes Livewire, a Laravel library that facilitates the creation of interactive user interfaces without the need to write JavaScript code. Livewire combines the simplicity of PHP with the reactivity of JavaScript, enabling the creation of dynamic user interface components efficiently.

### Benefits of Livewire in the Project

- **JavaScript-free Interactivity**: With Livewire, we can create interactive components such as dynamic forms, data filters, and pagination systems without the need to manually write JavaScript code.

- **Ease of Development**: Livewire simplifies the development of complex user interfaces by providing a familiar PHP and Blade-based approach, making it easier to create and maintain components.

- **Enhanced Testability**: Livewire components are easily testable using Livewire's integrated testing framework, ensuring code quality and stability.

- **Seamless Integration with Laravel**: As an official Laravel library, Livewire seamlessly integrates with other Laravel features such as Eloquent models, middleware, and authentication systems.

### How Livewire is Applied in the Project

In the context of this project, Livewire is used to create dynamic and interactive components in various parts of the application, including:

- Forms for creating and editing projects, tasks, and other resources.
- Data filtering and sorting systems.
- Pagination components for extensive resource listings.
- Real-time state updates to reflect changes instantly in the user interface.

These Livewire components help improve the user experience and provide a responsive and fluid user interface without the complexity of traditional JavaScript development.

For more information about Livewire and its documentation, please refer to the [official Livewire website](https://laravel-livewire.com/).

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

## How to Install and Run the Project

### 1. Install Laravel Sail:
Make sure you have Docker Desktop installed on your system. You can download it [here](https://www.docker.com/products/docker-desktop).
Then, navigate to your Laravel project directory and run the following command to install Laravel Sail:
```bash
composer require laravel/sail --dev
```

### 2. Initialize Laravel Sail:
After installing Laravel Sail, initialize it by running the following command in your project directory:
```bash
php artisan sail:install
```

### 3. Install Composer Dependencies:
Before starting the containers, install Composer dependencies by running the following Docker command:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs

```

### 4. Clone the Repository:
- Clone this repository into the directory where you want to store your project:
``` bash
    git clone <REPOSITORY_URL> project-name
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
    sail artisan key:generate
```

### 7. Run Database Migrations:
- Run the database migrations to create the necessary tables:
``` bash
    sail artisan migrate:fresh --seed
```

### 8. Start Local Server:
- Start the local server:
``` bash
    sail artisan serve
```

### 9. Access the Application:
- Access the application in your browser: `http://localhost:8000`

## Resources

- [Google2FA by Antonio Ribeiro](https://github.com/antonioribeiro/google2fa) - Package for two-factor authentication
- [Laravelia Tutorial: Laravel 9 Google Two-Factor (2FA) Authentication](https://www.laravelia.com/post/laravel-9-google-two-factor-2fa-authentication-tutorial) - Tutorial followed to implement two-factor authentication
- Mailtrap - Service for testing emails in development environments

## Contributing

Contributions are welcome! To contribute to this project, follow these steps:

1. Fork this repository
2. Create a new branch (`git checkout -b feature/new-feature`)
3. Commit your changes (`git commit -m [STATUS] [File name] Feature`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Submit a Pull Request

