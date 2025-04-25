<?php 

// Ajoute un auteur à la base de donnée
function insert_auteur($pdo, $auteur)
{
  // construction et préparation de la requête
  $sql = 'insert into auteurs (nom, prenom) values (:nom, :prenom)';
  echo '<p>Requête : ' . $sql . '</p>';

  $query = $pdo->prepare($sql);

  // assignation des valeurs à partir du tableau $auteur
  $query->bindValue(':nom', $auteur['nom'], PDO::PARAM_STR);
  $query->bindValue(':prenom', $auteur['prenom'], PDO::PARAM_STR);

  // exécution de la requête
  $query->execute();

  // contrôle des erreurs
  if ($query->errorCode() == '00000') {
    // si la requête a réussi

    // récupère le numéro automatique crée (auto-incrément)
    $auid = $pdo->lastInsertId();
    echo '<p>Nouvelle clé insérée :'.$auid.'</p>';

    // recherche le nombre de lignes modifiées par la requête
    $nb_lignes = $query->rowCount();
    echo '<p>'.$nb_lignes . ' ligne(s) insérée(s)</p>';
  }
  else {
    echo '<p>Erreur : '.$query->errorInfo()[2].'</p>';
  }
};


// Ajoute un editeur à la base de donnée
function insert_editeur($pdo, $editeur)
{
  // construction et préparation de la requête
  $sql = 'insert into editeurs (nom, adresse) values (:nom, :adresse)';

  $query = $pdo->prepare($sql);

  // assignation des valeurs à partir du tableau $editeur
  $query->bindValue(':nom', $editeur['nom'], PDO::PARAM_STR);
  $query->bindValue(':adresse', $editeur['adresse'], PDO::PARAM_STR);

  // exécution de la requête
  $query->execute();
};


// Ajoute un livre à la base de donnée
function insert_livre($pdo, $livre)
{
  // construction et préparation de la requête
  $sql = 'insert into livres (isbn, titre, resume, prix, id_editeur) values (:isbn, :titre, :resume, :prix, :id_editeur)';

  $query = $pdo->prepare($sql);

  // assignation des valeurs à partir du tableau $livre
  $query->bindValue(':isbn', $livre['isbn'], PDO::PARAM_STR);
  $query->bindValue(':titre', $livre['titre'], PDO::PARAM_STR);
  $query->bindValue(':resume', $livre['resume'], PDO::PARAM_STR);
  $query->bindValue(':prix', $livre['prix'], PDO::PARAM_STR);
  $query->bindValue(':id_editeur', $livre['id_editeur'], PDO::PARAM_STR);

  // exécution de la requête
  $query->execute();
};