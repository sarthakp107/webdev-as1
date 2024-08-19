<?php
//user input from form
$positionid = $_POST['positionid'];
$title = $_POST['title'];
$description = $_POST['description'];
$closeDate = $_POST['closedate'];
$position = $_POST['position'];

//specific patterns for each input boxes
$patternForPositionId = '/^ID\d{3}$/';
$patternForTitle = '/^[A-Za-z0-9 ,.!]{1,10}$/';
$patternForCloseDate = '/^\d{2}\/\d{2}\/\d{2}$/';

//get the length of the description
$lengthOfDescription = strlen($description);


if(isset($_POST['submit'])){

    //position id validate
    if(empty($positionid) || !preg_match($patternForPositionId , $positionid)){
        die("Invalid Position ID! Should Start with ID followed by three digits");
    }

    //title validate
    if(empty($title) || !preg_match($patternForTitle , $title)){
        die("Invalid Title! It should be up to 10 alphanumeric characters, spaces, commas, periods, or exclamation points.");
    }

    //description validate
    if($lengthOfDescription > 250){
        die("Invalid description! , 250 characters only");
    }

    //closeDate validate
    if(empty($closeDate) || !preg_match($patternForCloseDate , $closeDate)){
        die("Invalid close date. It should be in dd/mm/yy format.");
    }

    

}
?>