Symfony Blog
==

## Database 

| Admin | Post | Commentaire(optional) |
| ------| ---| -- |
| username (string 35) | title (255)| username |
| password (string 75) | content (text) |date|
| last-name (string 35) | published (date) |postId|
| first-name (string 35) | commentaires (optional)||

## Environement
Utiliser cette url comme base pour toutes les routes : 
localhost/**nomduprojet**/web/app_dev.php/...


## v0.1 
- MVP User Stories devéloppées
- Style css manquant
- Authentification basique http sans login page
- Page de validations après création/publication

## v0.2
- Login avec database et form login
- CSS Boostrap
- Ajout de /Logout path pour déconnecter une session
- Commentaire feature, ajouter + affichage + affichage du nombre de commentaires/post

## Lien de documentation

https://hackmd.io/s/BJlH1niAW#

## Résultat

### Homepage
![](https://i.imgur.com/3bPBj2T.png)

### Post
![](https://i.imgur.com/XENC2fZ.png)

### Comments
![](https://i.imgur.com/DjOnLD0.png)
