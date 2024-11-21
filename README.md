# Login and Show Data Application

This project is a basic PHP-based web application that allows users to log in, display stored data, and manage records in a database. The application includes functionalities such as user authentication, data insertion, retrieval, and management (edit and delete) using PHP and MySQL.

---

## Features

1. **Login Page:**
   - A user-friendly login form with email and password fields.
   - Alerts the user if any fields are left empty.

2. **Data Insertion:**
   - Submits the email and password entered by the user to the database.
   - Uses MySQL for storing user credentials in the authentication table.

3. **Show Data Page:**
   - Displays all records stored in the authentication table.
   - Records are shown in a well-formatted, responsive table using Bootstrap.

4. **Edit Functionality:**
   - Allows users to edit existing records.
   - Updates the database with the new values for email and password.

5. **Delete Functionality:**
   - Enables users to delete specific records from the database.
   - Removes the record permanently with a confirmation prompt.

6. **Bootstrap Integration:**
   - Uses Bootstrap 5 for a clean and responsive user interface.

7. **Video Walkthrough:**
   - Provides a step-by-step demonstration of the application functionality.

---

## Prerequisites

1. PHP 7.4 or later.
2. MySQL Database.
3. A web server such as Apache or Nginx.
4. Composer for dependency management (optional).

---

## Database Setup

1. Create a MySQL database named `auth`.
2. Run the following SQL script to create the `authentication` table:

   ```sql
   CREATE TABLE authentication (
       id INT AUTO_INCREMENT PRIMARY KEY,
       email VARCHAR(255) NOT NULL,
       password VARCHAR(255) NOT NULL
   );
   ```

---

## File Structure

```plaintext
root/
├── Config/
│   └── config.php         # Contains the database connection and query logic.
├── index.php              # The main login page.
├── show_data.php          # Displays stored data from the database.
├── edit_data.php          # Allows editing of records.
├── README.md              # Project documentation.
```

---

## How to Run

1. Clone or download the repository to your local server directory.
2. Import the database setup into your MySQL server.
3. Update the database credentials in `Config/config.php`:

   ```php
   private $localhost = "localhost";
   private $username = "root";
   private $password = "";
   private $database = "auth";
   ```
---

## Workflow

1. **Login:**
   - Enter an email and password on the login form.
   - On submission, the form data is sent to the `insertDatabase` method, which inserts the data into the database.

2. **Show Data:**
   - If logged in, a button redirects to the `show_data.php` page.
   - This page fetches all records from the database and displays them in a table.

3. **Edit Record:**
   - Click the edit button next to a record in the table.
   - The `edit_data.php` page loads with the current values populated in a form.
   - Update the details and save changes to update the database.

4. **Delete Record:**
   - Click the delete button next to a record in the table.
   - A confirmation prompt appears. On confirmation, the record is deleted from the database.

---

## Security Note

- **Password Handling:** The application currently stores passwords as plain text. This is insecure. It is highly recommended to hash passwords using a method like `password_hash()` before storing them.
- **SQL Injection:** User input is directly used in SQL queries. Use prepared statements to protect against SQL injection.

---

## Technologies Used

- **Backend:** PHP
- **Frontend:** HTML, CSS, Bootstrap 5
- **Database:** MySQL

---

## Screenshots

### 1. Login Page
A clean, responsive login form with validation.  
![Login Page Screenshot](https://github.com/user-attachments/assets/da5fc223-29e8-4f1f-bd0f-238f92d577a4)


### 2. Show Data Page
A table displaying all stored records in the database.  
![Show Data Page Screenshot](https://github.com/user-attachments/assets/c21b75fa-86c4-4524-a399-4ad8725833a5)


### 3. Edit Data Page
A clean, responsive edit form.
![Edit Data Page Screenshot](https://github.com/user-attachments/assets/ca0510ff-ad85-4638-81e9-4d5f82395a8e)

---


## Video Walkthrough

Here’s a video demonstration of the application:  

https://github.com/user-attachments/assets/40e8e713-faac-430d-865a-21e189853d98

---

## Future Enhancements

- Add password hashing for security.
- Implement user session handling.
- Improve UI with additional animations and styles.
- Validate email format before insertion.
- Add user registration functionality.
- **Enhance Edit/Delete Workflow:** Implement AJAX for a seamless, real-time experience without reloading the page.

---

## Author

**Aayush Patel**  
[Email](mailto:aayushpatel1411@gmail.com)  
[GitHub](https://github.com/Aayush014)

Enjoy building this project! 🎉
