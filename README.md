#Symfony examen 
##Contexte de l’examen :
Vous allez avoir des publications, juste un titre et du contenu.
Le principe est de pouvoir créer des commentaires sur les publications. Les commentaires vont être anonyme.
Modalité de l’examen :
Vous avez 3h, au bout des 3h mettre son examen sur GIT et m’envoyer le lien.
Vous pouvez m’appeler si vous êtes bloqué, mais forcément des pénalités.
1 / Préparation des entitées
##### Entity Publication :
- createdAt (datetime)
- title (string)
- content (text) 

##### Entity Comment :
- createdAt
- -content (text)<br>
Ajouter la relation entre Comment et Publication. (1 comment ne peut avoir 1 seul publication, 1 publication peut avoir x comment)

2 / Point bonus sur des fixtures Ajouter des fixtures sur vos 2 entitées, (librairie à installer : <code>composer require --dev hautelook/alice-bundle</code>)

3 / Afficher la liste de toutes les publications sur la page d’accueil de votre site (afficher une liste avec uniquement le titre) (point bonus si l’affichage est fait avec une pagination).

4 / Gérer la route qui permet de voir (show) une publication. Dans celle-ci, affichez toutes ses informations.
Afficher le nombre de commentaires que contient la publication
Afficher aussi tous les commentaires qui lui sont relié.

5 / Créer un formulaire sur la page de show d’une publication qui permet d’ajouter un comment (uniquement le contenu à remplir dans le formulaire !!! Tout le reste doit être automatisé)

6 / Créer une Commande qui permet de supprimer TOUT les comments qui ont le mot : « pokemon » dans leur contenu (le mot peut être au début, à la fin ou dedans).