# Adminrtia v0.1.0

<p align="center">
<a href="https://packagist.org/packages/thedevsbuddy/adminrtia"><img src="https://img.shields.io/packagist/dt/thedevsbuddy/adminrtia" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/thedevsbuddy/adminrtia"><img src="https://img.shields.io/packagist/v/thedevsbuddy/adminrtia" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/thedevsbuddy/adminrtia"><img src="https://img.shields.io/packagist/l/thedevsbuddy/adminrtia" alt="License"></a>
</p>

[comment]: <> (![AdminR]&#40;./public/screenshots/AdminR.svg&#41;)

## About AdminR

AdminR is a simple admin panel built on top of [Laravel Framework](https://laravel.com) to help developers create laravel backend and APIs with ease so they can more focus on creating actual web app or any client side apps.

AdminR help to reduce approx 90% of the work for developers which they do to build a backend or admin panel and the APIs for their apps.


## Known Issues
### I am aware of (and fixing them)
* No issue known.
* **Please report issues in issue tab if found any issue**

## Future plans
### I am preparing to add
* `uuid` field option for resource generation.
* `indexing` option for resource generation (on `SQL` level).
* DataTable option for every resource
    * You will have an option to select whether to use datatable or native table.
    * Import export options on resources.
* Search option for resources.
* Many more features.

### Support me to add more feature
<a href="https://www.buymeacoffee.com/devsbuddy" target="_blank">
    <img src="https://www.buymeacoffee.com/assets/img/guidelines/download-assets-2.svg" style="height: 45px; border-radius: 12px"/>
</a>

## Get Started

Install the project
```bash
composer create-project thedevsbuddy/adminrtia <your-app-name>
```

Generate app key
```bash
php artisan key:generate
```

Setup / update database connection
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adminrtia
DB_USERNAME=root
DB_PASSWORD=secret
```

Migrate database and seed demo data
```bash
php artisan migrate --seed
```

Link storage folder
```bash
php artisan storage:link
```

By default, you will get ```3``` users and role
```text

Super admin (super.admin)
email: super.admin@adminrtia.com
pwd: password 

Admin (admin)
email: admin@adminrtia.com
pwd: password

User (user)
email: user@adminrtia.com
pwd: password
```



That's it your project setup is completed.

Happy coding.

### Special thanks to
#### CoreUI
For the admin panel UI we have used [coreui](https://coreui.io) which is an awesome admin template out there.


## Security Vulnerabilities

If you discover a security vulnerability within AdminR, please send an e-mail to Devsbuddy via [adminrtia@devsbuddy.com](mailto:adminrtia@devsbuddy.com). All security vulnerabilities will be promptly addressed.

## License

The AdminR is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
