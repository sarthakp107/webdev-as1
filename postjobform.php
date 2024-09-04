<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Post Job </title>
</head>
<body>
<div class="left-section">


<div class="shape"></div>
    <div class="shape small"></div>
    <div class="shape square"></div>
    <div class="shape small"></div>
    <div class="shape"></div>
        
    </div>
<div class="center-container">
    

<!-- Navigation Bar -->
<div class="navbar">
    
    <div class="menu">
        <a href="index.php">Home</a>
        <a href="searchjobform.php">Search Job</a>
    </div>
</div>

</div>
    <div class="form-container">
    <h2>Post Job Vacancy</h2><br>
    <form action="postjobprocess.php" method="post">
        <label for="positionid">Position ID: </label>
        <input type="text" id="positionid" name="positionid" placeholder="ID001" ><br><br>
        
       <label>Title: </label>
        <input type="text" id="title" name="title" >
        <br><br>
       
        <label>Description: </label>
        <textarea id="description" name="description" ></textarea> 
        <br><br>

        <label>Closing Date: </label>
        <input type="text" id="closedate" name="closedate" value="<?php echo date('d/m/y')?>">
        <br><br>
          
        

        <fieldset>
            <legend>Position :</legend>
            <input type="radio" id="fullTime" name="position" value="Full Time" >
            <label for="fullTime">Full Time</label><br>
            <input type="radio" id="partTime" name="position" value="Part Time" >
            <label for="partTime">Part Time</label>
        </fieldset>
        <br>
        
        <fieldset>
                <legend>Contract:</legend>
                <input type="radio" id="ongoing" name="contract" value="On-going" >
                <label for="ongoing">On going</label>
                <br>
                <input type="radio" id="Fixed Term" name="contract" value="Fixed Term" >
                <label for="Fixed Term">Fixed Term</label>
            </fieldset>
            <br>
            
            <fieldset>
                <legend>Location:</legend>
                <input type="radio" id="onSite" name="location" value="On site" >
                <label for="onSite">On site</label>
                <br>
                <input type="radio" id="remote" name="location" value="Remote" >
                <label for="remote">Remote</label>
            </fieldset>
            <br>


            <fieldset>
                <legend>Accept Applications By:</legend>
                <input type="checkbox" id="post" name="acceptApplication[]" value="Post">
                <label for="post">Post</label>
                <br>
                <input type="checkbox" id="email" name="acceptApplication[]" value="Email">
                <label for="email">Email</label>
            </fieldset> 

            <br>
            
            <input type="submit" name="submit" value="Submit">
    </form>
    

    <br>
    <a href="index.php">Return to the home page</a>
   
    </div>
    <div class="right-section">
        
    <div class="shape"></div>
    <div class="shape small"></div>
    <div class="shape small"></div>
    <div class="shape small"></div>
    <div class="shape"></div>
    </div>
</body>
</html>