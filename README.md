## php_mysql_lb
php App, apache , MariaDB, nginx

## Ikhtisar :

*   Disini kami telah menggunakan Docker untuk menyebarkan aplikasi, MySQL sebagai database dan Nginx sebagai load balancer. Dua         kontainer Docker akan berkomunikasi dengan satu kontainer MySQL dengan bantuan bantuan Nginx. Kami telah menyiapkan setup lengkap di repositori github kami https://github.com/suhindra/php_mariadb_lb.git
Silakan lihat repositori yang disebutkan di atas. Ada Dockerfile untuk aplikasi, database dan load balancer.


Teknologi dan Tools yang digunakan:
* Php-apache
* MariaDB
* Docker containerization
* Docker Compose
* Nginx sebagai Load Balancer.


## Komponen :
* Dockerfile        : Dockerfile untuk konfigurasi aplikasi php, MySQL dan Nginx dengan semua dependensinya.
                      https://hub.docker.com/r/suhindra/php_mysql/
* Dcoker-compose.yml: Digunakan untuk memulai beberapa containers sekaligus dengan satu perintah sederhana.
* Folder            : Berisi semua file aplikasi dan file konfigurasi.


