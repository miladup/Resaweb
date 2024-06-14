URL du site : https://resaweb.duperrier.butmmi.o2switch.site/index.php



Pour le JavaScript : voir les fichiers formulaire.php et script.js. Les précisions sont directement en commentaires. 



Lien vers les règles Opquast : https://docs.google.com/spreadsheets/d/1FeZ7iq0eGlBNdHNZmaZD9awqYW35qZGjcyeXBKyArXU/edit?hl=fr&gid=0#gid=0



Description complète de la procédure à faire pour réinstaller le site et la base de données sur un serveur local XAMPP : 

Pour réinstaller un site et sa base de données sur un serveur local XAMPP, on commence par installer XAMPP et on s'assure de démarrer les modules Apache et MySQL. Ensuite, on copie les fichiers du site dans le dossier "htdocs" qui se trouve dans le répertoire d'installation de XAMPP.

Pour la base de données, on utilise phpMyAdmin accessible via "http://localhost" ou "http://127.0.0.1", ou sur mac, http://localhost:8888/. On y crée une nouvelle base de données et on importe les données depuis un fichier SQL.

Il faut peut-être ajuster les paramètres de connexion dans le fichier de configuration du site, comme le nom de la base de données et les identifiants (généralement 'root' sans mot de passe pour XAMPP, et mdp "root" en plus pour MAMP sur mac).

Une fois tout en place, on peut accéder au site via "http://localhost/nom_du_site". Voilà, notre site est prêt à être utilisé localement !




