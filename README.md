
# Study Abroad Lead Management System

Welcome to the Study Abroad Lead Management System. This project is designed to manage leads for students interested in studying abroad. It includes features such as data entry forms, data display tables, and data deletion functionality. The project is built using PHP, HTML, CSS, and JavaScript.

## Table of Contents

- [Setup](#setup)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Contributing](#contributing)
- [License](#license)

## Setup

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (e.g., Apache, Nginx)
- Composer (optional, for dependency management)

### Installation

1. **Clone the repository:**

   ```sh
   git clone https://github.com/rparit-stacks/StrudyAbroad.git
   cd StrudyAbroad
   ```

2. **Set up the database:**

   - Create a MySQL database named `u974036710_study`.
   - Import the `leads.sql` file to create the `leads` table and insert sample data.

3. **Update database configuration:**

   Update the database connection details in `index.php` and `fetch_data.php`:

   ```php
   $servername = "localhost";
   $username = "your_database_username";
   $password = "your_database_password";
   $dbname = "u974036710_study";
   ```

4. **Run the project:**

   Place the project files in your web server's root directory (e.g., `htdocs` for XAMPP, `www` for WAMP) and access the project via your web browser.

   ```
   http://localhost/StrudyAbroad
   ```

## Usage

1. **Authentication:**

   Access the project and enter the password to log in. The password is set to `this_is_rohit_parit_project_for_University_Insights`.

2. **Data Entry:**

   Use the form to enter lead information, including first name, last name, email, phone, and country preference.

3. **Data Display:**

   View the list of leads in the data table. The table displays lead information and provides an option to delete entries.

4. **Data Deletion:**

   Use the delete button to remove a lead from the database.

## Project Structure

- `index.php`: Main file for displaying and managing leads.
- `auth.php`: Authentication file to protect access to the project.
- `fetch_data.php`: Handles data fetching and deletion.
- `styles.css`: Contains the styling for the project.
- `scripts.js`: Contains JavaScript for handling form submission and data fetching.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes. Ensure that your code follows the project's coding standards and includes appropriate tests.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.



## Introduction

The Study Abroad Lead Management System is a web application designed to manage leads for students interested in studying abroad. The system allows users to enter, view, and delete lead information through an intuitive web interface. The project is built using PHP, HTML, CSS, and JavaScript, and is designed to be simple, responsive, and easy to use.

## Design

### User Interface

The user interface (UI) of the application is designed to be clean and modern, with a focus on usability and responsiveness. The main components of the UI include:

1. **Authentication Page:** A simple login page that requires users to enter a password to access the system.
2. **Lead Form:** A form for entering lead information, including first name, last name, email, phone, and country preference.
3. **Data Table:** A table that displays the list of leads, with options to delete entries.

### User Experience

The user experience (UX) is designed to be straightforward and efficient. Key considerations include:

- **Accessibility:** The application is designed to be accessible to users with varying levels of technical expertise.
- **Responsiveness:** The UI is responsive and adapts to different screen sizes, ensuring a seamless experience on both desktop and mobile devices.
- **Feedback:** Users receive immediate feedback on their actions, such as form submissions and deletions, through visual cues and messages.

## Development

### Technologies Used

The project is developed using the following technologies:

- **PHP:** Used for server-side logic, including data fetching, insertion, and deletion.
- **MySQL:** Used as the database to store lead information.
- **HTML:** Used to structure the web pages.
- **CSS:** Used to style the web pages and ensure a modern, responsive design.
- **JavaScript:** Used to handle form submissions and data fetching dynamically.

### Development Process

The development process involved the following steps:

1. **Requirements Gathering:** Identified the key features and requirements for the lead management system, including data entry, display, and deletion.
2. **Database Design:** Designed the database schema to store lead information. The `leads` table includes fields for ID, first name, last name, email, phone, country, and created_at timestamp.
3. **UI Design:** Created wireframes and mockups for the authentication page, lead form, and data table. Ensured that the design was responsive and user-friendly.
4. **Implementation:** Implemented the server-side logic using PHP and MySQL. Developed the front-end using HTML, CSS, and JavaScript. Integrated the front-end and back-end components to create a seamless user experience.
5. **Testing:** Conducted thorough testing to ensure that the application was functioning as expected. Tested different use cases, including form submissions, data display, and deletions. Ensured that the application was responsive and accessible on different devices.

### Challenges and Solutions

During the development process, several challenges were encountered, including:

- **Responsive Design:** Ensuring that the UI was responsive and displayed correctly on different screen sizes. This was addressed by using CSS media queries and flexible layout techniques.
- **Data Validation:** Validating user input to prevent invalid or malicious data from being entered into the system. Implemented server-side validation and sanitization to ensure data integrity.
- **Error Handling:** Handling errors gracefully and providing meaningful feedback to users. Implemented error handling mechanisms to display appropriate messages when errors occurred.

## Conclusion

The Study Abroad Lead Management System is a robust and user-friendly application that simplifies the management of leads for students interested in studying abroad. The project successfully integrates server-side and client-side technologies to provide a seamless and responsive user experience. Future enhancements may include additional features such as data filtering, sorting, and exporting capabilities.

