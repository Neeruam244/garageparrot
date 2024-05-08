
//add

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $identifier = $_POST['identifier'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $lastName = $_POST['lastName'];
  $firstName = $_POST['firstName'];
  $role = $_POST['role'];

  // Appeler la fonction createUser pour créer un nouvel utilisateur
  $success = createUser($identifier, $password, $email, $lastName, $firstName, $role, $pdo);

  if ($success) {
    // Message de confirmation
    $confirmationMessage = 'Le compte a été créé avec succès.';
  } else {
    // Message d'erreur
    $confirmationMessage = 'Une erreur est survenue lors de la création du compte.';
  }

  // Redirection vers la page précédente avec le message de confirmation
  header('Location: ' . $_SERVER['HTTP_REFERER'] . '?confirmation=' . urlencode($confirmationMessage));
  exit();
} else {
  // Redirection vers la page précédente si la requête n'est pas de type POST
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit();
}

//update 

require_once('pdo.php'); // Inclure le fichier pdo.php contenant la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $userId = $_POST['userId'];
  $identifier = $_POST['identifier'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $lastName = $_POST['lastName'];
  $firstName = $_POST['firstName'];

  try {
    // Mettre à jour les informations de l'utilisateur dans la base de données
    $success = updateUser($userId, $identifier, $password, $email, $lastName, $firstName, $pdo);

    // Rediriger vers la page d'administration avec un paramètre de succès
    if ($success) {
      $currentPath = dirname($_SERVER['PHP_SELF']);
      $parentPath = dirname($currentPath);
      $redirectURL = $parentPath . '/admin_account_management.php?success=1';
      header('Location: ' . $redirectURL);
      exit(); // Assurez-vous de quitter le script après la redirection
    } else {
      $currentPath = dirname($_SERVER['PHP_SELF']);
      $parentPath = dirname($currentPath);
      $redirectURL = $parentPath . '/admin_account_management.php?error=1';
      header('Location: ' . $redirectURL);
      exit(); // Assurez-vous de quitter le script après la redirection
    }
  } catch (PDOException $e) {
    // Gestion des erreurs de la base de données
    $currentPath = dirname($_SERVER['PHP_SELF']);
    $parentPath = dirname($currentPath);
    $redirectURL = $parentPath . '/admin_account_management.php?error=1';
    header('Location: ' . $redirectURL);
    exit(); // Assurez-vous de quitter le script après la redirection
  }
} else {
  // Si le formulaire n'a pas été soumis, redirigez vers la page appropriée ou affichez un message d'erreur
  $currentPath = dirname($_SERVER['PHP_SELF']);
  $parentPath = dirname($currentPath);
  $redirectURL = $parentPath . '/admin_account_management.php?error=1';
  header('Location: ' . $redirectURL);
  exit(); // Assurez-vous de quitter le script après la redirection
}

//delete 
require_once('pdo.php'); // Inclure le fichier pdo.php contenant la connexion à la base de données

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    try {
        // Supprimer l'utilisateur de la base de données
        $success = deleteUser($pdo, $user_id);

        // Rediriger vers la page d'administration avec un paramètre de succès ou d'erreur
        if ($success) {
            $currentPath = dirname($_SERVER['PHP_SELF']);
            $parentPath = dirname($currentPath);
            $redirectURL = $parentPath . '/admin_account_management.php?success=1';
            header('Location: ' . $redirectURL);
            exit();
        } else {
            echo "Une erreur s'est produite lors de la suppression de l'utilisateur.";
        }
    } catch (PDOException $e) {
        echo "Erreur dans la requête deleteUser : " . $e->getMessage();
    }
} else {
    echo "L'ID de l'utilisateur n'est pas spécifié.";
}
?>