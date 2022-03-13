# WordPress on Docker


Il y a 3 modules : 
- WordPress sur le port 5555
- MariaDB
- PhpMyAdmin sur le port 8080

La stack expose deux volumes : 
- un pour la BDD, histoire de facilement persister les données
- un pour les fichiers de WordPress pour facilement les explorer et les modifier

### Pour run
````
docker-compose up -d
````

### Pour stop
````
docker-compose stop
````

## 1st installation of Wordpress : 
Doit correspondre au service "wp_db" du fichier docker-compose.yaml :

- data
- root
- pass
- wp_db
- wp_


## A chaque MAJ de la DB, en cas de corruption de BDD : 
### --> dans PHPmyAdmin:
- aller sur data > exporter > Méthode d'exportation : > Choisir "Personnalisée, afficher toutes les options possibles" > dans "Options de création d'objets" > Cocher une instruction CREATE DATABASE / USE > Executer > Drag and Drop le fichier SQL à la racine du projet.
