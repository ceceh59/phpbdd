<?php
    /* Fonctions MySQL */
    /* 1 - Fonctions scalaires */
    /* UPPER : mets les caracteres en majuscules */
    $sql = "SELECT UPPER(nom) AS nom, email FROM utilisateur" ;

    /* LOWER : mets les caracteres en minuscule */
     $sql = "SELECT LOWER(nom) AS nom, email FROM utilisateur" ;

     /* LENGTH : obtenir le nombre de caracteres du parametres*/
     $sql = "SELECT LENGTH(nom) AS nb_chars, email FROM utilisateur" ;

    // obtenir la liste des utilisateurs dont le nom fait plus de 4   // caracteres
     $sql = "SELECT * FROM utilisateur WHERE LENGTH(nom) > 4";

     // ROUND : arrondir un chiffre à virgule avec X chiffres
     // apres la virgule
      $sql = "SELECT ROUND(total, 2), email FROM utilisateur";


      /* exercice */
      /*
      * 1 - Sélectionnez tous les utilisateurs qui sont nés en 2000
      * 2 - Sélectionnez tous les utilisateurs dont le nom de        domaine de l'email est outlook
      * et dont le nom n'est pas "test"
      *
      * 3 -Sélectionnez tous les utilisateurs
      * qui sont nés en octobre en mettant leur email en majuscule,

    */

      $sql = "SELECT * FROM utilisateur WHERE date_naissance LIKE'2000%'";
      $sql = "SELECT * FROM utilisateur WHERE date_naissance BETWEEN '2000-01-01' AND '2000-12-31'";

       $sql = "SELECT * FROM utilisateur 
                WHERE YEAR(date_naissance) = 2000";



      $sql = "SELECT * FROM utilisateur WHERE email LIKE '%@outlook.%' AND nom !='test'";
      $sql = "SELECT * FROM utilisateur WHERE email LIKE '%@outlook.%' AND nom <>'test'";


      $sql ="SELECT UPPER(email), id, nom, date_naissance FROM utilisateur WHERE date_naissance LIKE '%-10-%'";

     $sql ="SELECT UPPER(email), id, nom, date_naissance FROM utilisateur WHERE MONTH(date_naissance) = 10";

      /* 2- Les fonctions d'agrégat*/
      // transférer plusieurs valeurs (tirés de plusieurs enregistrements)
      // pour obtenir une seule
      // FONCTION AVG : calcul d'une moyenne

      $sql = "SELECT AVG(age) FROM utilisateur";
      $sql = "SELECT AVG(age) FROM utilisateur WHERE age > 30";
      $sql = "SELECT AVG(age) FROM utilisateur WHERE nom = 'toto'";

      // FONCTION SUM : somme de toutes les valeurs dans un champ
      $sql = "SELECT SUM(age) FROM utilisateur";
      // FONCTION COUNT : nombre d'enregistrements dans une table
      $sql = "SELECT COUNT(*) FROM utilisateur";
      // FONCTION MAX : obtenir la plus grande valeur dans une colonne
      // ET FONCTION MIN : obtenir la plus grande valeur dans une colonne
       $sql = "SELECT MAX(*) FROM utilisateur";
       $sql = "SELECT MIN(*) FROM utilisateur";


      // GROUP BY / HAVING
// Groupe les enregistrements par nom : toutes les lignes
// qui auront la même valeur dans le champ nom
// seront regroupées en une ligne
// suivi d'une fonction scalaire, on peut par exemple
// avoir le nombre d'enregistrement au sein d'un groupement
$sql = "SELECT nom, COUNT(*) FROM utilisateur GROUP BY nom";

// grouper par nom, et avoir la somme des ages des personnes
// qui ont le même nom
$sql = "SELECT nom, SUM(age) FROM utilisateur GROUP BY nom";

// grouper par nom, et avoir la moyenne d'age des personnes
// qui ont le même nom
$sql = "SELECT nom, AVG(age) FROM utilisateur GROUP BY nom";

// grouper par nom, et avoir la moyenne d'age des personnes
// qui ont le même nom, et ne sortir que les groupements
// dont la moyenne d'age est supérieur à 10
$sql = "SELECT nom, AVG(age) FROM utilisateur
      GROUP BY nom HAVING AVG(age) > 10";
?>




   