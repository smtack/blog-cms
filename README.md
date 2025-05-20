# Blog CMS

<p align="center">
    <img src="screenshots/blog1.png" alt="Homepage">
</p>


## About

A simple CMS for a personal blog. Blog features include search, categories and a contact form. Admin panel features include creating, editing and deleting categories, creating, editing and deleting posts, and making a post/posts featured.

<p>
    <img src="screenshots/blog2.png" alt="Admin Panel">
</p>


## Installation

1. Run `composer install`
2. Run `npm install`
3. Copy `.env.example`, rename to `.env`, and run `php artisan key:generate`
4. Run `php artisan migrate --seed` to migrate and create the admin user.
5. Create `images` folder in `storage/app/public` then run `php artisan storage:link` to create folder for image uploads.
6. Run `npm run dev` or `npm run build`


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
