<?php
 if(isset($_POST["positionid"],
        $_POST["title"],
         $_POST["description"],
          $_POST["closedate"],
           $_POST["position"],
           $_POST["contract"],
           $_POST["location"],
           $_POST["acceptApplication"]
           ) 
           &&
    !empty($_POST['positionid']) &&
     !empty($_POST['title']) && 
     !empty($_POST['description']) && 
     !empty($_POST['closingDate']) &&
      !empty($_POST['position']) && 
      !empty($_POST['contract']) && 
      !empty($_POST['location']) &&
       !empty($_POST['acceptApplication'])
    ){

        if (!preg_match('/^ID\d{3}$/', $_POST['positionid'])) {
            echo ("no match");
        }
    }
?>
