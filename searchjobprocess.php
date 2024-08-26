<?php

$patternForTitle = '/^[A-Za-z0-9 ,.!]{1,50}$/';

// Check if the 'jobTitle' field is set before accessing it
$userInputJobTitle = isset($_GET['jobTitle']) ? $_GET['jobTitle'] : '';
echo "<p>Received job title: '{$userInputJobTitle}'</p>";

if (isset($_GET['search'])) {

    // Validate job title
    if (empty($userInputJobTitle) || !preg_match($patternForTitle, $userInputJobTitle)) {
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

                echo "<p>Checking job title: '{$jobTitle}' against search: '{$userInputJobTitle}'</p>";

                
                // Search for the job title within the file's job titles
                if (stripos($userInputJobTitle , $jobTitle) !== false) {
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
        echo "<table border='1'>
                <tr>
                    <th>Position ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Close Date</th>
                    <th>Application Methods</th>
                </tr>";

        foreach ($matches as $match) {
            echo "<tr>
                    <td>{$match[0]}</td>
                    <td>{$match[1]}</td>
                    <td>{$match[2]}</td>
                    <td>{$match[3]}</td>
                    <td>{$match[4]}</td>
                  </tr>";
        }
        echo "</table>";
        echo "<br><a href='index.php'>Home page</a> | <a href='searchjobform.php'>Search Job Vacancy page</a>";
    } else {
        echo "No job vacancies match your search.<br><a href='index.php'>Home page</a> | <a href='searchjobform.php'>Search Job Vacancy page</a>";
    }
}
else
{
    echo "form was not submitted";
}
?>
