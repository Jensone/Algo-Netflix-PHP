# Algo Netflix PHP

Exercice d'implémentation d'un algorithme à la Netflix en PHP.


## Algorithme (Pseudo code)

**Variables**

filmUtilisateur = "The Matrix"

noteUtilisateur = 5

utilisateurSimilaires = []

notesUtilisateurSimilaires = []

recommendations = []


DEBUT
    Réception des données du nouvel utilisateur

    // Recherche des utilisateurs similaires

    POUR chaque membre utilisateur qui ont laisse une note
        POUR chaque film noté par le membre utilisateur
            SI le film est le même que celui du nouvel utilisateur
                ALORS Ajouter le film au tableau "utilisateurSimilaires" 
            FINSI
        FIN POUR
    FIN POUR

    // Recherche des notes des utilisateurs similaires

    POUR chaque chaque membre utilisateur dans le tableau "utilisateurSimilaires"
        POUR chaque film noté par le membre utilisateur
            SI le film à une note supérieure à 0
                ALORS Ajouter le film au tableau "notesUtilisateurSimilaires" 
            FINSI
        FIN POUR
    FIN POUR


    // Classement par films les plus regardés par les utilisateurs similaires
    POUR chaque membre utilisateur dans le tableau "notesUtilisateurSimilaires"
        SI le film existe dans le tableau recommendations
            ALORS Ajouter 1 à la note du film
        SINON
            ALORS Ajouter le film au tableau recommendations avec la note 1
        FINSI 
    FIN POUR

    // Trier les films par note
    AFFICHER les films recommandés triés par note du plus regardé au moins **regardé**
FIN
