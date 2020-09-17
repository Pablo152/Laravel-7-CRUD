CRUD Web-App made with Laravel version 7.x, capable of downloading PDF'S via the dompdf library, and sending them with laravel's Mailable class.

![](https://i.imgur.com/HsOP8gu.gif)

## Requisitos 

- PHP >= 7.0.0
- OpenSSL PHP
- PDO PHP
- Mbstring PHP
- Tokenizer PHP
- XML PHP
- TestDB

### Pasos para instalar

Clonar el proyecto a alguna carpeta en tu computador

(git clone https://github.com/Pablo152/Laravel-7-CRUD.git)


Ejecutar el comando: ` composer install ` <br>
Luego ` npm install ` <br>
renombrar '.env.example' a '.env' <br>
En el archivo .env configurar la base de datos a utilizar y el servidor SMTP para enviar correos
y por ultimo ` php artisan migrate `, para correr en local, utiliza el comando `php artisan serve`
