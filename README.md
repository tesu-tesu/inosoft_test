

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

