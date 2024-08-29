
# Laravel Posts Management System

## Project Overview
This is a **Laravel-based Posts Management System** that allows users to manage blog posts. Users can create, edit, view, and delete posts with a search and pagination functionality. The project is built using **Laravel**, **Tailwind CSS**, and **Vite** for asset management.

## Features
- **Create, Edit, View, and Delete Posts**
- **Search for Posts by Title and Content**
- **Pagination without Page Reloads**
- **Responsive Design using Tailwind CSS**
- **Real-time Data Interaction with AJAX**

## Prerequisites
Before you begin, ensure you have met the following requirements:
- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL or any supported database

## Installation

Follow these steps to get the project up and running locally:

1. Clone the repository:

   ```bash
   git clone https://github.com/eyad-alaghbari/post_content_system.git
   cd post_content_system
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Install Node.js dependencies:

   ```bash
   npm install
   ```

4. Set up the environment file:

   ```bash
   cp .env.example .env
   ```

   Configure the `.env` file with your database credentials.

5. Generate an application key:

   ```bash
   php artisan key:generate
   ```

6. Run migrations to set up the database:

   ```bash
   php artisan migrate
   ```

7. Build the frontend assets:

   ```bash
   npm run dev
   ```

   For production, you can use:

   ```bash
   npm run build
   ```

8. Start the development server:

   ```bash
   php artisan serve
   ```

   The application will be available at `http://127.0.0.1:8000`.

## Usage

- **Adding Posts**: Navigate to `/posts/create` to add a new post.
- **Editing Posts**: Visit `/posts/{id}/edit` to edit an existing post.
- **Searching**: Use the search bar on the posts index page to search by title or content.
- **Pagination**: Use the pagination controls to navigate through posts without reloading the page.

## Folder Structure

- `app/`: Contains the core application files (controllers, models, etc.)
- `resources/views/`: Blade templates for the UI
- `resources/js/`: JavaScript files managed by Vite
- `public/`: Public assets like CSS, JS, and images
- `routes/web.php`: Web routes definition

## Technologies Used
- **Laravel 11** - The PHP Framework for Web Artisans
- **MySQL** - Database for data storage
- **Vite** - Next Generation Frontend Tooling
- **Tailwind CSS** - Utility-first CSS framework for styling

## API Endpoints

- **GET /api/posts/search**: Search posts by query and paginate results.

Example:

```bash
GET /api/posts/search?query=keyword&page=1
```

## Deployment

For deploying this project to a live server, follow these steps:

1. Ensure you run `npm run build` to generate the production assets.
2. Use a web server like Apache or Nginx with PHP to serve the project.
3. Set up the environment and database as in the local setup.
4. Run `php artisan migrate --force` to migrate your database in production.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact
For any issues, questions, or suggestions, feel free to reach out at [eyadalaghbari1010@gmail.com](mailto:eyadalaghbari1010@gmail.com).
