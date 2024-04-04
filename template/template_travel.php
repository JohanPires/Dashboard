<div class="travel">
    <div class="img">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($trav->picture);?>" alt="">
    </div>
    <div class="text">
        <h4><?php echo $trav->name; ?></h4>
        <p><?php echo $trav->description; ?></p>
        <div class="button-container">
            <a href='./formulaire.php?edit=<?php echo $trav->id_travel ?>' class='edit'><i class="fa-regular fa-pen-to-square"></i> Modifier</a>
            <a class='delete' href="./delete.php?delete=<?php echo $trav->id_travel ?>"><i class="fa-solid fa-minus"></i> Supprimer</a>
        </div>
    </div>
</div>

