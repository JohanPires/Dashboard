<?php
session_start();
if(!isset($_SESSION['name'])){
    header('Location: ../index.php');
}
include '../classes/travel.php' ;
$travels = $travel->getAllTheTravel();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <header>
        <h1><span>JPC</span> VACANCES</h1>
        <span>Administrateur  <span class='circle'></span></span>
    </header>
    <div class="main row">

        <div class="dashboard d-flex flex-column col-2">
            <h2>Dashboard</h2>
            <a href='./formulaire.php' id="add" id='addButton'><i class="fa-solid fa-plus"></i> Ajouter</a>
            <a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion</a>
        </div>

        <div class="travel-list col-7">
       
        </div>

        <div class="filter-container col-3">
            <h2>Filtrer les Voyages</h2>
            <div class="mb-3">
                
                <input type="text" class="form-control" id="nameInput" aria-describedby="emailHelp" placeholder='Entrer un mot de passe' name='name'>      
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Choisis un thèmes</label>
                <select class="form-select" aria-label="Default select example" id='themesSelect' name='themes'>
                    <option selected value=''>Tout les thèmes</option>
                    <option value="campagne">Campagne</option>
                    <option value="mer">Mer</option>
                    <option value="montagne">Montagne</option>
                </select>   
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Choisis une région</label>
                <select class="form-select" aria-label="Default select example" id='regionsSelect'>
                <option selected value=''>Toutes les régions</option>
                <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
                <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
                <option value="Bretagne">Bretagne</option>
                <option value="Centre-Val de Loire">Centre-Val de Loire</option>
                <option value="Corse">Corse</option>
                <option value="Grand Est">Grand Est</option>
                <option value="Hauts-de-France">Hauts-de-France</option>
                <option value="Île-de-France">Île-de-France</option>
                <option value="Normandie">Normandie</option>
                <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
                <option value="Occitanie">Occitanie</option>
                <option value="Pays de la Loire">Pays de la Loire</option>
                <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
                </select>     
            </div>
        </div>
    </div>
    <script src="../ajax/index.js"></script>
</body>
</html>