# DOCUMENTASI PLATFORM-IOT-OCC.MY.ID

## 1. Teknologi Yang Digunakan

- Framework : Codeignter 3

## 2. Desain Arsitektur

Desain arsitektur menggunakan konsep MVC (Model - View - Controller)

## 3. Requirement System

- PHP 8.0
- Composer
- XAMPP
- Text Editor
- Web Browser

## 4. Struktur Folder

````
Application
├── Controller/
│   ├── Backend/
│   │   ├── Chanel.php
│   │   ├── Dashboard.php
│   │   └── Token.php
│   └── User/
│       ├── Dashboard.php
│       ├── Auth.php
│       └── Home.php
├── Model/
│   ├── Auth_model.php
│   ├── Chanel_model.php
│   ├── Feeds_model.php
│   ├── Listing_model.php
│   └── Token_model.php
└── View/
    ├── Auth/
    │   └── login.php
    ├── back/
    │   ├── admin.php
    │   └── user.php
    ├── errors/
    ├── front/
    │   └── home.php
    └── partials/
        ├── header.php
        ├── navbar.php
        ├── sidebar.php
        └── footer.php
````

## Instalasi

- Masuk Kedalam folder xampp/htdocs/ (untuk pengguna xampp)
- Masuk kedalam folder lampp/htdoct/ (untuk pengguna LAMPP)

````
git clone https://github.com/rizkyadiryanto14/control-iot.git
````

````
cd control-iot
````

````
composer install
````

````
http://localhost/control-iot
````
