<?php 
include '../classes/travel.php' ;
$travels = $travel->getAllTheTravel();
foreach($travels as $trav) {
    
        if (isset($_GET['regions']) and isset($_GET['name']) and isset($_GET['themes'])) {
            
            if (($_GET['regions'] == $trav->regions) && 
                (str_contains($trav->name, $_GET['name'])) && $_GET['themes'] == $trav->name_themes) {
                include '../template/template_travel.php';
            } 
            elseif ($_GET['regions'] == $trav->regions && empty($_GET['name']) && empty($_GET['themes'] )) {
                include '../template/template_travel.php';
            } elseif ( str_contains($trav->name, $_GET['name']) && empty($_GET['regions']) && empty($_GET['themes'] )) {
                include '../template/template_travel.php';
            } elseif ( $_GET['themes'] == $trav->name_themes && empty($_GET['name']) && empty($_GET['regions'])){

                include '../template/template_travel.php';
            } else if (($_GET['regions'] == $trav->regions) &&  str_contains($trav->name, $_GET['name']) && empty($_GET['themes'] )) {
                include '../template/template_travel.php';
            } else if (($_GET['themes'] == $trav->name_themes) &&  str_contains($trav->name, $_GET['name']) && empty($_GET['regions'] )) {
                include '../template/template_travel.php';
            } else if (($_GET['themes'] == $trav->name_themes) &&  ($_GET['regions'] == $trav->regions) && empty($_GET['name'] )) {
                include '../template/template_travel.php';
            }
        } 
        else {
            include '../template/template_travel.php';
        }

   
}


?>