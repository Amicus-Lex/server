Pour utilise l'API installer php7.2 avec les tension suivantes : mbstring xml mysql (php-EXTENSION)
exemple :  `sudo apt install php-mbstring`


ensuite installer composer   [https://getcomposer.org/download/]

dans le repository /server/amicus-lex-back : `composer install`

ensuite pour lancer le serveur : `php artisan serve`


IMPORTANT : le fichier env et un environnement mysql doivent etre present 