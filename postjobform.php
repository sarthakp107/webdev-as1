<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Job </title>
</head>
<body>
    <form action="postjobprocess.php" method="post">
        <label for="positionid">Position ID: </label>
        <input type="text" id="positionid" name="positionid" maxlength="5" required placeholder="ID001" ><br><br>
        
       <label>Title: </label>
        <input type="text" id="title" name="title" maxlength="10" >
        <br><br>
       
        <label>Description: </label>
        <textarea id="description" name="description" ></textarea> 
        <br><br>

        <label>Closing Date: </label>
        <input type="text" id="closedate" name="closedate" value="<?php echo date('d/m/y')?>">
        <br><br>
          
        

        <fieldset>
            <legend>Position :</legend>
            <input type="radio" id="fullTime" name="position" value="Full Time" required>
            <label for="fullTime">Full Time</label><br>
            <input type="radio" id="partTime" name="position" value="Part Time" required>
            <label for="partTime">Part Time</label>
        </fieldset>
        <br>
        
        <fieldset>
                <legend>Contract:</legend>
                <input type="radio" id="ongoing" name="contract" value="On-going" required>
                <label for="ongoing">On-going</label>
                <br>
                <input type="radio" id="fixedTerm" name="contract" value="Fixed term" required>
                <label for="fixedTerm">Fixed term</label>
            </fieldset>
            <br>
            
            <fieldset>
                <legend>Location:</legend>
                <input type="radio" id="onSite" name="location" value="On site" required>
                <label for="onSite">On site</label>
                <br>
                <input type="radio" id="remote" name="location" value="Remote" required>
                <label for="remote">Remote</label>
            </fieldset>
            <br>


            <fieldset>
                <legend>Accept Applications By:</legend>
                <input type="checkbox" id="post" name="acceptApplication" value="Post" required>
                <label for="post">Post</label>
                <br>
                <input type="checkbox" id="email" name="acceptApplication" value="Email" required>
                <label for="email">Email</label>
            </fieldset> 

            <br>
            
            <input type="submit" name="submit" value="Submit">
    </form>

    <br>
    <a href="index.php">Return to the home page</a>
</body>
</html>