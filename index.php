<?php
include './classes/user.php';
include './classes/role.php';
session_start();
$usersInfos = $users->getUserAdmin();
if (isset($_POST['valider'])) {
    foreach ($usersInfos as $userInfo) {
        if ($_POST['name'] === $userInfo->name) {
            $userName = $_POST['name'] ;
        }
        if ($_POST['password'] === $userInfo->password) {
            $userPassword = $_POST['password'] ;
        }
    
    $_SESSION['name'] = $_POST['name'];

    }
    if (empty($_POST['name']) or $_POST['name'] != $userName) {
        header('Location: index.php?error=Veuiller Entrer un nom valide');
        exit();
    }
    else if (empty($_POST['password']) or $_POST['password'] != $userPassword) {
        header('Location: index.php?error=Veuiller Entrer un mot de passe valide');
        exit();
    }
    else if($_POST['password'] === $userPassword and $_POST['name'] === $userName and $userInfo->id_groups === $admin[0]->id_groups) {
     
        header('Location: affichage/dashboard.php?firstname=' .  $_POST['name']);
    } else {
        alert("Vous n'êtes pas admin");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class='login'>
    <header>
        <h1><span>JPC</span> VACANCES</h1>
    </header>
    <form class='container' method='post'>
        <h2>Connection</h2>
    <div class="error">
        <?php if(isset($_GET['error'])): ?>
        <p><?php echo  $_GET['error']?></p>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nom</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder='Entrer un mot de passe' name='name'>
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder='Entrer un mot de passe' name='password'>
    </div>
    
    <button type="submit" class="btn" name='valider'>Connexion</button>
    </form>
</body>
</html>