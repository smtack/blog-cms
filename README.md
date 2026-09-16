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

1. Run `git clone https://github.com/smtack/blog-cms.git` then `cd blog-cms`
2. Run `composer run setup`
3. Run `php artisan db:seed` to create the admin user.
4. Create `images` folder in `storage/app/public` then run `php artisan storage:link` to create folder for image uploads.
5. Run `composer run dev` to start the development server.

The email for the default admin user is `admin@example.com` and the password is `admin123`. Change these in the Admin settings.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
