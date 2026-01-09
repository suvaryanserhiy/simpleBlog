# SimpleBlog

A modern, PHP-based blogging platform designed for video game enthusiasts to share reviews, news, and insights about their favorite games.

## 📋 Table of Contents

- [Features](#features)
- [Technology Stack](#technology-stack)
- [Project Structure](#project-structure)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Database Schema](#database-schema)
- [API Endpoints](#api-endpoints)
- [Security Features](#security-features)
- [Contributing](#contributing)
- [License](#license)

## ✨ Features

### User Management

- **User Registration**: Create new accounts with username, email, city, and password
- **User Authentication**: Secure login system with session management
- **User Profiles**: Display username and manage user-specific content

### Blog Management

- **Create Posts**: Add new blog posts with title, content, and images
- **View Posts**: Browse all blog posts with preview and full descriptions
- **Delete Posts**: Authors can delete their own posts
- **Image Gallery**: Visual gallery showcasing featured game images
- **Post Preview**: Truncated descriptions with expandable full content

### User Experience

- **Responsive Design**: Modern, clean interface with smooth navigation
- **Dynamic Content**: Different views for logged-in and guest users
- **Interactive Elements**: Toggle descriptions, image navigation, and smooth scrolling
- **Social Integration**: Links to social media platforms

## 🛠 Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Libraries**: jQuery 3.5.1
- **Server**: Apache/Nginx with PHP support

## 📁 Project Structure

```
simpleBlog/
├── controllers/          # Business logic controllers
│   ├── addPostController.php
│   ├── AuthenticationController.php
│   ├── deletePost.php
│   ├── OperationsController.php
│   └── RegistrationController.php
├── dbHandlers/           # Database operations
│   ├── dataBase.php     # Database connection handler
│   └── Operations.php   # CRUD operations
├── views/                # Frontend templates
│   ├── addPost.php
│   ├── index_logined.php
│   ├── index_unlogined.php
│   ├── login.php
│   └── registration.php
├── style/                # CSS stylesheets
│   ├── addPostStyle.css
│   ├── indexStyle.css
│   ├── indexStyle_unlogined.css
│   ├── loginStyle.css
│   └── operation_style.css
├── script/               # JavaScript files
│   ├── script.js
│   └── script_Error_page.js
├── img/                  # Image assets
│   ├── BGs/
│   ├── logo/
│   └── Posts/
├── settings/             # Configuration files
│   └── settings.ini
└── README.md
```

## 📦 Prerequisites

Before you begin, ensure you have the following installed:

- **PHP** 7.4 or higher
- **MySQL** 5.7 or higher (or MariaDB 10.2+)
- **Apache** or **Nginx** web server
- **php-mysqli** extension enabled
- A modern web browser (Chrome, Firefox, Safari, Edge)

## 🚀 Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/yourusername/simpleBlog.git
cd simpleBlog
```

### Step 2: Configure Web Server

#### Apache Configuration

1. Copy the project to your Apache `htdocs` or `www` directory
2. Ensure `mod_rewrite` is enabled (if using URL rewriting)
3. Set proper file permissions:
   ```bash
   chmod -R 755 /path/to/simpleBlog
   chmod -R 777 /path/to/simpleBlog/img/Posts
   ```

#### Nginx Configuration

Add the following to your Nginx configuration:

```nginx
server {
    listen 80;
    server_name localhost;
    root /path/to/simpleBlog;
    index index.php index.html;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

### Step 3: Database Setup

1. Create a MySQL database:

   ```sql
   CREATE DATABASE simpleBlog;
   ```

2. The application will automatically create the required tables on first run.

### Step 4: Configure Database Connection

Edit `settings/settings.ini` with your database credentials:

```ini
server = 'localhost'
username = 'your_username'
password = 'your_password'
database = 'simpleBlog'
table = 'Users'
```

**⚠️ Security Note**: For production, ensure `settings.ini` is not publicly accessible. Consider moving it outside the web root or adding `.htaccess` protection.

## ⚙️ Configuration

### Database Settings

Modify `settings/settings.ini` to match your MySQL configuration:

- `server`: Database host (usually 'localhost')
- `username`: MySQL username
- `password`: MySQL password
- `database`: Database name
- `table`: Users table name (default: 'Users')

### File Upload Settings

- Default upload directory: `img/Posts/`
- Allowed image formats: JPG, JPEG, PNG, GIF
- Ensure the upload directory has write permissions

### Session Configuration

The application uses PHP sessions for user authentication. Ensure your PHP configuration allows session storage.

## 📖 Usage

### For End Users

1. **Access the Application**

   - Navigate to `http://localhost/simpleBlog/views/index_unlogined.php` (or your configured domain)

2. **Register a New Account**

   - Click "Registrarse" (Register)
   - Fill in username, city, email, and password
   - Submit the form

3. **Login**

   - Click "Iniciar sesión" (Login)
   - Enter your email and password
   - You'll be redirected to the logged-in dashboard

4. **Create a Blog Post**

   - Click "Añadir Post" (Add Post)
   - Fill in the title and content
   - Upload an image (JPG, PNG, GIF)
   - Submit the form

5. **View Posts**
   - Browse posts in the "Últimos Juegos" (Latest Games) section
   - Click "Mostrar descripción completa" to expand post descriptions
   - Authors can delete their own posts

### For Developers

#### Database Operations

The application uses a layered architecture:

- **dataBase.php**: Handles database connections
- **Operations.php**: Contains SQL queries and database operations
- **OperationsController.php**: Business logic layer

#### Adding New Features

1. Create database operations in `dbHandlers/Operations.php`
2. Add controller methods in `controllers/OperationsController.php`
3. Create views in `views/` directory
4. Add corresponding CSS in `style/` directory

## 🗄️ Database Schema

### Users Table

```sql
CREATE TABLE Users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    city VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(1000)
);
```

### blog_posts Table

```sql
CREATE TABLE blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    img VARCHAR(300),
    title VARCHAR(255) UNIQUE NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## 🔐 Security Features

- **SQL Injection Protection**: Uses prepared statements with parameter binding
- **XSS Prevention**: Input sanitization with `mysqli_real_escape_string()`
- **Session Management**: Secure session handling for user authentication
- **File Upload Validation**: Type checking and validation for uploaded images
- **Input Validation**: Server-side validation for all user inputs

### Security Recommendations

1. **Password Hashing**: Consider implementing password hashing (e.g., `password_hash()` and `password_verify()`)
2. **HTTPS**: Use HTTPS in production to encrypt data transmission
3. **File Permissions**: Restrict file permissions on sensitive files
4. **Error Handling**: Customize error messages to avoid information disclosure
5. **CSRF Protection**: Implement CSRF tokens for form submissions
6. **Rate Limiting**: Add rate limiting for login and registration attempts

## 🐛 Troubleshooting

### Common Issues

**Database Connection Error**

- Verify MySQL service is running
- Check credentials in `settings/settings.ini`
- Ensure database exists

**Image Upload Fails**

- Check directory permissions: `chmod 777 img/Posts/`
- Verify file size limits in `php.ini`
- Ensure allowed file types match configuration

**Session Issues**

- Check PHP session configuration
- Verify session directory is writable
- Clear browser cookies and cache

**404 Errors**

- Verify web server configuration
- Check file paths and directory structure
- Ensure `.htaccess` (if used) is configured correctly

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### Coding Standards

- Follow PSR-12 PHP coding standards
- Use meaningful variable and function names
- Add comments for complex logic
- Test your changes thoroughly

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 👥 Authors

- **Serhiy Suvaryan** - [GitHub](https://github.com/suvaryanserhiy)
- **Raul Caraballo** - [GitHub](https://github.com/RaulCaraballo)

## 🙏 Acknowledgments

- jQuery team for the excellent library
- PHP and MySQL communities for robust documentation
- All contributors who help improve this project

## 📧 Contact

For questions, suggestions, or support:

- Email: simpleBlog@gmail.com
- Phone: +34 724685432
- Address: Calle Principal 123, Collado Villalba, Madrid

---

**Note**: This is a development project. For production use, implement additional security measures, error handling, and performance optimizations.
