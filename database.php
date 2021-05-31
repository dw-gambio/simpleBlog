<?php 

$pdo = new PDO(
    "mysql:host=localhost;dbname=blog;charset=utf8",
    "blog", 
    "xj/b@zLI7!2974]8"
);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

