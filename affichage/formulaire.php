<?php
session_start();
if(!isset($_SESSION['name'])){
    header('Location: ../index.php');
}
include '../classes/travel.php';

if (isset($_GET['edit'])) {
    $travelEdit = $travel->getTravelEdit($_GET['edit']);
} else {
    
}


if (isset($_POST['valider'])) {
    
        if (isset($_GET['edit'])) {
            if (empty($_POST['name'])) {
                header('Location: formulaire.php?edit=' . $_GET["edit"] . '&error=Entrer un Nom de voyage');
                exit();
            }
            if (empty($_POST['themes'])) {
                header('Location: formulaire.php?edit=' . $_GET["edit"] . '&error=Entrer un themes de voyage');
                exit();
            }
            if (empty($_POST['regions'])) {
                header('Location: formulaire.php?edit=' . $_GET["edit"] . '&error=Entrer une régions de voyage');
                exit();
            }
            if (empty($_POST['date_start'])) {
                header('Location: formulaire.php?edit=' . $_GET["edit"] . '&error=Entrer une date de début');
                exit();
            }
            if (empty($_POST['date_end'])) {
                header('Location: formulaire.php?edit=' . $_GET["edit"] . '&error=Entrer une date de fin');
                exit();
            }
            if (empty($_POST['price'])) {
                header('Location: formulaire.php?edit=' . $_GET["edit"] . '&error=Entrer un prix de voyage');
                exit();
            }
            if ( (!empty($_FILES['file']['error']) || $_FILES['file']['size'] == 0)) {
                $image = $travelEdit->picture;
            } else {
                $image = file_get_contents($_FILES["file"]["tmp_name"]);   
            }
            if (empty($_POST['description'])) {
                header('Location: formulaire.php?error=Entrer une description');
                exit();
            }else {

                $updateTravel = $travel->updateTravel($_POST['themes'], 2,  $_POST['name'], $_POST['price'], $_POST['description'], $image, $_POST['date_start'],  $_POST['date_end'],  $_POST['regions'],  $_POST['formule'], $_GET['edit']);
                header('Location: dashboard.php');
            }

        } else {
            if (empty($_POST['name'])) {
                header('Location: formulaire.php?error=Entrer un Nom de voyage');
                exit();
            }
            if (empty($_POST['themes'])) {
                header('Location: formulaire.php?error=Entrer un themes de voyage');
                exit();
            }
            if (empty($_POST['regions'])) {
                header('Location: formulaire.php?error=Entrer une régions de voyage');
                exit();
            }
            if (empty($_POST['date_start'])) {
                header('Location: formulaire.php?error=Entrer une date de début');
                exit();
            }
            if (empty($_POST['date_end'])) {
                header('Location: formulaire.php?error=Entrer une date de fin');
                exit();
            }
            if (empty($_POST['price'])) {
                header('Location: formulaire.php?error=Entrer un prix de voyage');
                exit();
            }
            if ( (!empty($_FILES['file']['error']) || $_FILES['file']['size'] == 0)) {

                header('Location: formulaire.php?error=Entrer une image');
                exit();
            } else {
                $image = file_get_contents($_FILES["file"]["tmp_name"]);   
            }
            if (empty($_POST['description'])) {
                header('Location: formulaire.php?error=Entrer une description');
                exit();
            } else {
                $postTravel = $travel->postTravel($_POST['themes'], 1, $_POST['name'], $_POST['price'],$_POST['description'], $image, $_POST['date_start'], $_POST['date_end'],$_POST['regions'],  $_POST['formule']);
                header('Location: dashboard.php');

            }
    }
    
}

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
<form class="form-container row" method='post' enctype="multipart/form-data" >
    <a href="./dashboard.php" id='closeButton' class='btn'><i class="fa-solid fa-arrow-left"></i></a>
    <h2>Formulaire</h2>
    <?php if (isset($_GET['error'])) { ?>
        <div class="error">
            <p><?php echo $_GET['error'] ?></p>
        </div>
    <?php } ?>
    <div class="mb-3">        
        <input 
            type="text" 
            class='form-control' 
            id='name' 
            placeholder='Entrer le nom du voyage' 
            name='name' 
            <?php if(isset($_GET['edit'])): ?>
                value="<?php echo $travelEdit->name ?>"
            <?php endif; ?>    
                >
    </div>
    <div class="input-container col-6">
            <div class="mb-3 ">
                <label for="" class="form-label">Choisis un thèmes</label>
                <select 
                class="form-select" 
                name='themes'
                <?php if(isset($_GET['edit'])): ?>
                    selected="<?php echo $travelEdit->id_travel_themes ?>"
                <?php endif; ?>    
                >
                    <option selected value='<?php if(isset($_GET['edit'])){ ?> <?php echo $travelEdit->id_travel_themes ?> <?php } else { ?><?php }?>'><?php if(isset($_GET['edit'])){ ?> <?php echo $travelEdit->name_themes ?> <?php } else { ?>Tout les thèmes<?php }?></option>
                    <option value="1">Campagne</option>
                    <option value="2">Mer</option>
                    <option value="3">Montagne</option>
                </select> 

            </div>
            <div class="mb-3">
                <label for="" class="form-label">Choisis une région</label>
                <select class="form-select" name='regions'>
                <option selected value='<?php if(isset($_GET['edit'])){ ?> <?php echo $travelEdit->regions ?> <?php } else { ?><?php }?>'><?php if(isset($_GET['edit'])){ ?> <?php echo $travelEdit->regions ?> <?php } else { ?>Tout les régions<?php }?></option>
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
            <div class="mb-3">
                <label for="inputDateStart" class="form-label">Choisis une date de début</label>
                <input 
                    type="date" 
                    class="form-control" 
                    id="inputDateStart"  
                    name='date_start'
                    <?php if(isset($_GET['edit'])): ?>
                        value="<?php echo $travelEdit->date_start ?>"
                    <?php endif; ?>  
                >      
            </div>
            <div class="mb-3">
                <label for="inputDateEnd" class="form-label">Choisis une date de fin</label>
                <input 
                type="date" 
                class="form-control" 
                id="inputDateEnd" 
                name='date_end'
                <?php if(isset($_GET['edit'])): ?>
                    value="<?php echo $travelEdit->date_end ?>"
                <?php endif; ?> 
                >      
            </div>
            <div class="mb-3">
                <label for="inputPrix" class="form-label">Prix</label>
                <input 
                type="text" 
                class="form-control" 
                id="inputPrix"  
                placeholder='Entrer un prix' 
                name='price'
                <?php if(isset($_GET['edit'])): ?>
                    value="<?php echo $travelEdit->price ?>"
                <?php endif; ?>    
                >  
            </div>
            <div class="mb-3 ">
                <label for="" class="form-label">Choisis une Formule</label>
                <select class="form-select" name='formule'>
                <option selected value='<?php if(isset($_GET['edit'])){ ?> <?php echo $travelEdit->pack ?> <?php } else { ?><?php }?>'><?php if(isset($_GET['edit'])){ ?> <?php echo $travelEdit->pack ?> <?php } else { ?>Toutes les formules<?php }?></option>
                    <option value="Pack 2 en 1">Pack 2 en 1</option>
                    <option value="Pack Clasique">Pack Clasique</option>
                </select>   
            </div>
            <div class="mb-3">
                <label for="inputPicture" class="form-label" >Image</label>
                <input 
                type="file" 
                class="form-control" 
                id="inputPicture" 
                name='file'     
                > 
            </div>
            </div>
            <div class="describe-container col-6">
                <label for="" class="form-label">Description</label>
                <textarea
                 class="form-control" name='description'
                 ><?php if(isset($_GET['edit'])): ?><?php echo $travelEdit->description ?><?php endif; ?>  </textarea>
            </div>
            <div class="mb-3">   
                <input type="submit" class="form-control" id='valider' name='valider'>
            </div>
</form>
</body>
</html>


