# 🍴 THE FOOD CHAIN WEBSITE

A web-based **Food Recipe Management System** developed using **PHP and MySQL**. The project allows recipes to be stored in a database and retrieved dynamically through PHP backend functionality.

The system is designed to provide an easy way to manage and display food recipes, making it suitable for a recipe-sharing or food-blogging website.

## 📌 Project Description

This project provides functionality for managing food recipe information using a PHP and MySQL backend.

The application communicates with the database to retrieve recipe information based on a unique recipe ID. The `fetch_recipe.php` endpoint receives an ID through a POST request, searches the `add_recipes` table, and returns the matching recipe information in **JSON format**.

## 🚀 Features

- 🍲 Recipe management
- 🔍 Retrieve recipe details by ID
- 🗄️ MySQL database integration
- ⚡ PHP backend processing
- 📡 JSON response for recipe data
- 🖥️ Dynamic recipe loading
- 📱 Suitable for responsive food/recipe websites
- 🎨 Font Awesome icons for user-interface elements

## 🛠️ Technologies Used

- **PHP**
- **MySQL**
- **HTML5**
- **CSS3**
- **JavaScript**
- **AJAX / JSON**
- **Font Awesome**

The project uses Font Awesome Free for icons. The uploaded stylesheet identifies it as Font Awesome Free 5.11.2.

## 📂 Project Structure

```text
Food-Recipe-Management-System/
│
├── admin/
│   ├── ...
│
├── css/
│   ├── ...
│
├── js/
│   ├── ...
│
├── images/
│   ├── ...
│
├── database/
│   ├── ...
│
├── db.php
├── fetch_recipe.php
├── index.php
├── login.php
├── profile.php
└── README.md
```

> The exact folder structure may vary depending on your complete project files.

## 🔄 How Recipe Fetching Works

The recipe-fetching functionality follows these steps:

1. The frontend sends a recipe `id` using a POST request.
2. `fetch_recipe.php` receives the ID.
3. PHP executes a MySQL query against the `add_recipes` table.
4. If a matching recipe is found, the database row is converted into JSON.
5. If no recipe is found, an empty JSON array is returned.

### Example Request

```javascript
$.ajax({
    url: "fetch_recipe.php",
    type: "POST",
    data: {
        id: recipeId
    },
    success: function(response) {
        console.log(response);
    }
});
```

### Example Response

```json
{
    "id": "1",
    "title": "Vegetable Pasta",
    "cuisine": "Italian",
    "recipes": "Boil pasta and prepare the vegetables..."
}
```

*The exact JSON fields depend on the columns available in your `add_recipes` database table.*

## 🗄️ Database

The project uses **MySQL** for storing recipe information.

The recipe data is retrieved from:

```text
Table: add_recipes
```

The database connection is included through:

```php
include("db.php");
```

## ⚙️ Installation & Setup

### 1. Install XAMPP

Download and install XAMPP, then start:

- Apache
- MySQL

### 2. Clone the Repository

```bash
git clone https://github.com/your-username/your-repository-name.git
```

### 3. Move the Project

Place the project inside:

```text
C:\xampp\htdocs\
```

### 4. Create the Database

Open:

```text
http://localhost/phpmyadmin
```

Create your MySQL database and import the project's SQL file if available.

### 5. Configure Database Connection

Update `db.php` with your MySQL database credentials.

Example:

```php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "your_database_name"
);
```

### 6. Run the Project

Open your browser and visit:

```text
http://localhost/your-project-folder/
```

## 🔐 Security Note

For a production application, database queries should use **prepared statements** instead of directly inserting POST values into SQL queries.

For example:

```php
$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM add_recipes WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
```

This helps reduce the risk of SQL injection.

## 🎯 Future Improvements

Possible improvements include:

- User authentication
- Individual user profiles
- User-created recipes
- Recipe approval by administrators
- Recipe categories and filtering
- Search functionality
- Recipe ratings and reviews
- Comments
- Favorite recipes
- Image uploading
- Pagination
- Admin dashboard
- Password reset functionality
- Improved security using prepared statements
- API-based recipe access

## 📸 Project Screenshots

Add screenshots of your project here:

```text
screenshots/
├── homepage.png
├── recipes.png
├── recipe-details.png
├── login.png
├── profile.png
└── admin-dashboard.png
```

Example:

```markdown
![Homepage](screenshots/homepage.png)
```

## 👨‍💻 Developer

**Jatin Bohra**

MCA | Web Developer

### Skills

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- Bootstrap
- AJAX
- Git & GitHub

## 📄 License

This project is developed for educational and portfolio purposes.
