<?php
// constants are accessible all over the application

if($_SERVER['SERVER_NAME'] == 'localhost') {
    // Root for images and other asset files based in public folder
    define('ROOT', 'http://localhost/garbage/php-mvc/public'); 
}else {
    define('ROOT', 'https://www.yourdomain.com/public'); 
}
