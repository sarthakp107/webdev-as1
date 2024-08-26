<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Job Vacancy Posting System</h2><br>

    <form action="searchjobprocess.php" method="GET">

        <!--job title  -->
        <label for="jobTitle">Job Title: </label>
        <input type="text" id="jobTitle" name="jobTitle" required><br><br>

        <!--position  -->

        <label for="position">Position: </label>
        <select id="position" name="position">
            <option value="">Any</option>
            <option value="Full-Time">Full-Time</option>
            <option value="Part-Time">Part-Time</option>
        </select><br><br>

         <!-- Contract -->
         <label for="contract">Contract Type: </label>
        <select id="contract" name="contract">
            <option value="">Any</option>
            <option value="ongoing">On-going</option>
            <option value="fixedTerm">Fixed term</option>
        </select><br><br>

         <!-- Application Type -->
         <label for="applicationType">Application Type: </label>
        <select id="applicationType" name="applicationType">
            <option value="">Any</option>
            <option value="Post">Post</option>
            <option value="Mail">Mail</option>
        </select><br><br>

        <!-- Location -->
        <label for="location">Location: </label>
        <select id="location" name="location">
            <option value="">Any</option>
            <option value="remote">Remote</option>
            <option value="onsite">onsite</option>
        </select><br><br>



        <!--submit buttonn -->
        <input type="submit" name="search" value="search"><br>
    </form>
    <br>

    <a href="index.php">Return to the home page</a>
    
</body>
</html>