# Création d'un espace membre en PHP et MySQL

Vous pouvez retrouver le TP original sur OpenClassrooms via [ce lien](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/917948-tp-creez-un-espace-membres)

## Les étapes à suivre :

### 1. Sur MySQL, créer une table `membres` avec les champs suivants :
  - id (int, primary, a_t)
  - pseudo (varchar 255)
  - pass (varchar 255)
  - email (varchar 255)
  - date_inscription (date)
### 2. Penser à protéger le mot de passe de chaque utilisateur : `hachage` 
   Fonction php : `password_hash()` --> génère un mot de passe "haché" unique pour chaque mot de passe.
### 3. Création de la page d'inscription :
   4 champs :
   - pseudo
   - mot de passe (attention champ de type `password` pour cacher le mdp lors de la saisie)
   - confirmation du mot de passe
   - adresse email
  
Plusieurs vérifications :
    - Le pseudo demandé est-il disponible ? S'il est déja présent dans la BDD, il faudra alerter l'utilisateur et lui demandé de changer
    - Les deux mdp sont-ils identiques ?
    - L'adresse email est-elle valide ? (regex)

A ce stade, voici [un exemple de code](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/917948-tp-creez-un-espace-membres#/id/r-2178953) qui illustre les 3 premières étapes.

### 4. Création de la page de connexion :

Utilisation du système de session proposé par PHP

Mis en place d'un système de connexion par pseudo et mot de passe ainsi que proposition d'une connexion automatique qui évite à l'utilisateur de rentrer son pseudo et son mdp lors de la prochaine session.

- Vérifier que le mot de passe rentré est bien celui stocké dans la base : `password_verify` ([exemple d'utilisation](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/917948-tp-creez-un-espace-membres#/id/r-2178970))
- Si le membre a coché connexion automatique : créer deux cookies qui stockeront respectivement :
  - Le pseudo
  - Le mot de passe haché

### 5. Création de la page de déconnexion

Session du membre détruite au bout d'un certain temps, ce qui aura pour effet de le déconnecter.

Il pourra ensuite se reconnecter avec ses identifiants ou alors bénéficier de la connexion automatique s'il la choisit.

La déconnexion est automatique au bout d'un certain temps (`timeout`) mais il faudra aussi proposer un bouton de déconnexion qui devra :
- supprimer le conteu `$_SESSION`
- mettre fin au système de sessions en appelant `session_destroy()`
- supprimer les cookies de connexion automatique