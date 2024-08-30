<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="center-container">

        <!-- Navigation Bar -->
        <div class="navbar">

            <div class="menu">
                <a href="index.php">Home</a>
                <a href="postjobform.php">Post Job</a>
                <a href="searchjobform.php">Search Job</a>
            </div>
        </div>

    </div>
    <div class="searchform-container">

   
    

    <?php

    //pattern validation for title
    $patternForTitle = '/^[A-Za-z0-9 ,.!]{1,50}$/';

    //user inputs
    // Check if the 'jobTitle' field is set before accessing it
    $userInputJobTitle = isset($_GET['jobTitle']) ? $_GET['jobTitle'] : '';
    $searchByPosition = isset($_GET['position']) ? $_GET['position'] : 'Any';
    $searchByContract = isset($_GET['contract']) ? $_GET['contract'] : 'Any';
    $searchByLocation = isset($_GET['location']) ? $_GET['location'] : 'Any';
    $searchByApplicationType = isset($_GET['applicationType']) ? $_GET['applicationType'] : 'Any';


    //closing date and actual date
    $todayDate = new DateTime();



    if (isset($_GET['search'])) {

        // Validate job title
        if (!empty($userInputJobTitle) && !preg_match($patternForTitle, $userInputJobTitle)) {
            die("Invalid Title! It should be up to 10 alphanumeric characters, spaces, commas, periods, or exclamation points.");
        }

        $filename = "../../data/jobs/positions.txt";
        $matches = array();

        if (file_exists($filename)) {
            $handle = fopen($filename, "r");
            while (!feof($handle)) {
                $dataSingleLine = fgets($handle);

                if ($dataSingleLine != "") {
                    $dataArray = explode(",", $dataSingleLine);

                    $jobTitle = trim($dataArray[1]);
                    $closingDateStr = trim($dataArray[3]);
                    $position = trim($dataArray[4]);
                    $contract = trim($dataArray[5]);
                    $location = trim($dataArray[6]);
                    $applicationMethods = trim($dataArray[7]);

                    // Convert closing date to DateTime object for comparison
                    $closingDate = DateTime::createFromFormat('d/m/y', $closingDateStr);
                    //set the match to be true by default
                    $isMatch = true;


                    //checks
                    // Search for the job title within the file's job titles
                    if (!empty($userInputJobTitle) && stripos($userInputJobTitle , $jobTitle) === false) { //stripos(sentence , word)  (array , word)
                        $isMatch = false;
                    }

                    // position

                    if ($searchByPosition != "Any" && strcasecmp($position, $searchByPosition) != 0) {
                        $isMatch = false;
                    }

                    // contract

                    if ($searchByContract != "Any" && strcasecmp($contract, $searchByContract) != 0) {
                        $isMatch = false;
                        
                    }


                    // location
                    if ($searchByLocation != "Any" && $location != $searchByLocation) {
                        $isMatch = false;
                        
                    }

                    // application method
                    if ($searchByApplicationType != "Any" && stripos($searchByApplicationType, $applicationMethods) === false) {
                        $isMatch = false;
                        
                    }

                    if ($closingDate && $closingDate < $todayDate) {
                        $isMatch = false;
                        
                    }

                    //if all criteria matches add job to the result
                    if ($isMatch) {
                        $matches[] = $dataArray;
                    }
                }
            }
            fclose($handle);
        } else {
            die("Error: The job vacancy file does not exist.<br><a href='index.php'>Home page</a> | <a href='searchjobform.php'>Search Job Vacancy page</a>");
        }

        // Display results if matches are found
        if (count($matches) > 0) {
            echo "<h3>Job Vacancy Search Results:</h3>";
            echo "<table class='table-container'>
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

            foreach ($matches as $match) {
                echo "<tr>
                    <td>{$match[0]}</td>
                    <td>{$match[1]}</td>
                    <td>{$match[2]}</td>
                    <td>{$match[3]}</td>
                    <td>{$match[4]}</td>
                    <td>{$match[5]}</td>
                    <td>{$match[6]}</td>
                    <td>{$match[7]}</td>
                  </tr>";
            }
            echo "</table>";
            echo "<br><a href='index.php'>Home page</a>  <a href='searchjobform.php'>Search Job Vacancy page</a>";
        } else {
            echo "<div class='error-container'>No job vacancies match your search.</div><br><a href='index.php'>Home page</a>  <a href='searchjobform.php'>Search Job Vacancy page</a>";
        }
    } else {
        echo "form was not submitted";
    }
    ?>
</div>

</body>

</html>