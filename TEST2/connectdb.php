<?php



// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbserver";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifie si la connexion est établie
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fonction pour insérer un commentaire dans la base de données
// function setComments($conn) {
// 	// Requête pour sélectionner tous les enregistrements de la table "users"
	

// // Parcours des résultats et récupération des attributs
	
//     if (isset($_POST['commentSubmit'])) {
// 		var_dump($_POST); // afficher les valeurs des champs soumis

//         $message = isset($_POST['message']) ? mysqli_real_escape_string($conn, $_POST['message']) : null;
        
//         // Vérifie que les variables ne sont pas vides
// 		if (empty($message)) {
// 			die("Tous les champs doivent être remplis.");
// 		}

//         // Requête d'insertion dans la base de données
//         $sql = "INSERT INTO commentaires ( content) VALUES ( '$message')";
        
//         // Exécution de la requête
//         if(mysqli_query($conn, $sql)) {
//             // Rediriger l'utilisateur vers la page d'origine
//             header('Location: chaima.php');
//             exit();
//         } else {
//             die("Erreur lors de l'insertion : " . mysqli_error($conn));
//         }
//     }
// }


// Fonction pour récupérer les commentaires depuis la base de données
function getComments($conn) {
    // Requête pour sélectionner tous les enregistrements de la table "commentaires"
    $sql = "SELECT * FROM commentaires";
    $result = mysqli_query($conn, $sql);

    // Parcours des résultats et récupération des attributs
    $comments = array();
    while($row = mysqli_fetch_assoc($result)) {
        $comments[] = $row;
    }

    return $comments;
}
// Récupération des commentaires depuis la base de données
$comments = getComments($conn);

// Affichage des commentaires



// Appel de la fonction pour insérer le commentaire dans la base de données
//setComments($conn);

// Fermeture de la connexion à la base de données
mysqli_close($conn);

?>