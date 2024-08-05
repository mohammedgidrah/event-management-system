##Event Management System
Overview
The Event Management System is a web-based platform designed to help users manage and organize events efficiently. It allows administrators to create, update, and delete events, while users can browse, search, and register for events. The system also supports user authentication, role-based access control, and various other features to streamline the event management process.

Features
User Authentication: Secure login and registration system 
Role-Based Access Control: Admin and user roles with different levels of access.
Event Management: Create, edit, and delete events.
Event Categories: Categorize events for easier browsing.
Event Registration: Users can register for events and view their registrations.
Responsive Design: Mobile-friendly interface for managing events on the go.

##Technologies Used
Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: MySQL
Libraries/Frameworks: Bootstrap (for UI), jQuery (for DOM manipulation)
Version Control: Git

##Installation
To run this project locally, follow these steps:

Clone the repository:

bash

git clone https://github.com/your-username/event-management-system.git
Navigate to the project directory:

bash

cd event-management-system

##Set up the database:

Import the provided SQL file (database.sql) located in the db folder into your MySQL database.
Update the database configuration in connection.php to match your local environment.
Configure your web server:

Place the project folder in your web server's root directory (e.g., htdocs for XAMPP).
Start your web server (e.g., Apache) and ensure the MySQL service is running.
Access the application:

Open your web browser and navigate to http://localhost/event-management-system.
Usage
Admin:

Log in with admin credentials.
Manage events, users, and categories.
Access the admin dashboard to view statistics and reports.
User:

Register for an account.
Log in to browse and register for events.
View and manage your event registrations.
