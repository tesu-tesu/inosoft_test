

## Instalasi

### Instal Xampp dan PHP
Menginstall aplikasi Xampp sebagai server untuk database MongoDB dan menginstall PHP 
Petunjuk instalasi Xampp beserta PHP dapat dilakukan seperti contoh berikut :
https://webhostmu.com/cara-install-xampp/


### Instal Composer
Composer adalah aplikasi management untuk mengelola framework PHP (termasuk Laravel) 
untuk cara instalasi Composer dapat dilakukan seperti contoh berikut :
[https://webhostmu.com/cara-install-xampp/](https://www.niagahoster.co.id/blog/cara-install-composer/)


### Membuat Project Laravel
Kemudian dilakukan create project Laravel dengan melakukan command : 
``composer create-project laravel/laravel {NamaApp}`` 
pada cmd atau dapat mengikuti petunjuk dari dokumentasi resmi Laravel : https://laravel.com/docs/4.2/installation#:~:text=Via%20Download,all%20of%20the%20framework's%20dependencies

### Mengclone Project Laravel
Pada project ini dilakukan clone untuk menjalankan project yang terdapat di repository ini,
Langkah clone Project Laravel dari Github :
- Clone your project
- Go to the folder application using cd command on your cmd or terminal
- Run composer install on your cmd or terminal
- Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, - Ubuntu
- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
- Run php artisan key:generate
- Run php artisan migrate
- Run php artisan serve
- Go to http://localhost:8000/

### Menginstall MongoDB
Panduan cara menginstall MongoDB untuk aplikasi Desktop windows dapat dilakukan mengikuti petunjuk sebagai berikut : 
https://medium.com/@LondonAppBrewery/how-to-download-install-mongodb-on-windows-4ee4b3493514

## Konfigurasi Laravel dan MongoDB
Setelah menginstall Laravel dan MongoDB, diperlukan konfigurasi untuk dapat menghubungkan project Laravel dan MongoDB sebagai database yang digunakan
untuk petunjuk konfigurasi dapat dilakukan mengikuti contoh berikut : 
https://www.youtube.com/watch?v=EM7xsp7KCUw


## Install Postman
Setelah Project Laravel dapat dijalankan pada server, kemudian dilakukan pengujian dengan menggunakan Postman untuk menguji API yang tersedia dalam project tersebut,
Aplikasi postman dapat diunduh dari : https://www.postman.com/downloads/

## Melakukan Unit Testing
Postman adalah salah satu tools untuk melakukan unit testing pada aplikasi dengan melakukan penembakan pada API
Untuk Unit Testing dapat dilakukan dengan menjalankan dokumentasi dari Postman pada : 
https://documenter.getpostman.com/view/15588938/UzBvFiJL 
kemudian dapat dijalankan pada Postman dari Browser atau Aplikasi Desktop

``pip install markdownify``

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
