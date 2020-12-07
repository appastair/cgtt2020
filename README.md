:oncoming_automobile: Technical Test 2020
---

__Technology Stack:__
* Lumen
* MySQL
* PHPUnit

:rocket: [API Docs](https://documenter.getpostman.com/view/2781316/TVmQdazP)

__Installation:__

> Add MySQL connection details into _.env_

```
git clone https://github.com/appastair/cgtt2020.git .
cd cgtt2020
composer install
php artisan migrate
php -S localhost:8000 -t test/public/
```
