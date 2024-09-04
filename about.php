<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP Version and Task Overview</title>
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

<div class="form-container">
<div class="myinfo">
    <h1>Project Overview</h1>
    <ul>
        <li><strong>PHP Version Installed on Mercury:</strong> 
            <?php echo phpversion(); ?>
        </li>
        <li><strong>Tasks Not Attempted or Not Completed:</strong>
            <ul>
                All completed till task 8
               
            </ul>
        </li><br>
        <li><strong>Special Features Implemented or Attempted:</strong>
            <ul>
                I tried to implement a special feature where the user could also searches for the jobs in which the deadline is already passed
                
            </ul>
        </li><br>
        <li><strong>What discussion points did you participated on in the unit’s discussion board for
        Assignment 1? If you did not participate, state your reason.</strong>
            <ul>
                I did not use the discussion board because I had no problem with anything. However i used other platforms like w3school and yt for clearing my doubts.
                
            </ul>
        </li>
    </ul>
    
    <br><a href='index.php'>Home page</a> | <a href='searchjobform.php'>Search Job Vacancy page</a>
    </div>
    <footer class="footer">
    <p>&copy; 2024 Sarthak Pradhan . All Rights Reserved .</p>
</footer>
</div>
</body>
</html>
