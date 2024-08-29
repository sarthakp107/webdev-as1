<?php
//user input from form
$positionid = isset($_POST['positionid']) ? $_POST['positionid'] : '';
$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$closeDate = isset($_POST['closedate']) ? $_POST['closedate'] : '';
$position = isset($_POST['position']) ? $_POST['position'] : '';
$contract = isset($_POST['contract']) ? $_POST['contract'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$acceptApp = isset($_POST['acceptApplication']) ? $_POST['acceptApplication'] : array(); // Accept application is an array

//specific patterns for each input boxes
$patternForPositionId = '/^ID\d{3}$/';
$patternForTitle = '/^[A-Za-z0-9 ,.!]{1,10}$/';
$patternForCloseDate = '/^\d{2}\/\d{2}\/\d{2}$/';

//get the length of the description
$lengthOfDescription = strlen($description);


if (isset($_POST['submit'])) {

    //position id validate
    if (empty($positionid) || !preg_match($patternForPositionId, $positionid)) {
        die("Invalid Position ID! Should Start with ID followed by three digits");
    }

    //title validate
    if (empty($title) || !preg_match($patternForTitle, $title)) {
        die("Invalid Title! It should be up to 10 alphanumeric characters, spaces, commas, periods, or exclamation points.");
    }

    //description validate
    if ($lengthOfDescription > 250) {
        die("Invalid description! , 250 characters only");
    }

    //closeDate validate
    if (empty($closeDate) || !preg_match($patternForCloseDate, $closeDate)) {
        die("Invalid close date. It should be in dd/mm/yy format.");
    }

    if (empty($position)) {
        die("At least one position is required.");
    }
    if (empty($contract)) {
        die("At least one contract is required.");
    }
    if (empty($location)) {
        die("At least one location is required.");
    }
    //accept application validation atleast one checkbox ticked
    if (empty($acceptApp)) {
        die("At least one method to accept applications is required.");
    }

    //if directory doesnt exists create a new one
    umask(0007);
    $dir = "../../data/jobs";

    if (!file_exists($dir)) {
        mkdir($dir, 02770);
    }

    $filename = "../../data/jobs/positions.txt";
    $alldata = array();

    //read the file

    if(file_exists($filename)){
        $handle = fopen($filename , "r");
        $positionIdData = array();

        while(!feof($handle)){
            $dataSingleLine = fgets($handle);
            if($dataSingleLine != ""){
                $dataArray = explode("," , $dataSingleLine);
                $alldata[] = $dataArray;
                $positionIdData[] = $dataArray[0];
            }
        }
        fclose($handle);

        $newData = !in_array($positionid , $positionIdData);

    }
    else{
        $newData = true;
    }

    if($newData){
        $handle = fopen($filename , "a");

        // Join the checkbox values into a single string
        $acceptAppString = implode(' | ', $acceptApp);

        $data  = $positionid . "," . $title . "," . $description . "," . $closeDate . "," . $position. "," . $contract . "," . $location . "," . $acceptAppString . "\n"; 
        fwrite($handle,$data);
    
        fclose($handle);
    
        $alldata[] = array($positionid,$title,$description,$closeDate,$position , $contract , $location , $acceptAppString);
        echo "Form submitted";
    }
    else{
        echo "position id already exists";
    }

sort($alldata); 
echo "<h3>Submitted Job Vacancies:</h3>";
echo "<table border='1'>
        <tr>
            <th>Position ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Close Date</th>
            <th>Position</th>
            <th>Contract</th>
            <th>Location</th>
            <th>Application Methods</th>
        </tr>";

foreach ($alldata as $data) {
    echo "<tr>
            <td>{$data[0]}</td>
            <td>{$data[1]}</td>
            <td>{$data[2]}</td>
            <td>{$data[3]}</td>
            <td>{$data[4]}</td>
            <td>{$data[5]}</td>
            <td>{$data[6]}</td>
            <td>{$data[7]}</td>
          </tr>";
}

    echo "<a href='postjobform.php'>Form page</a><br>";
    echo "<a href='index.php'>Home page</a><br>";
    
}
