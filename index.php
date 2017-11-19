<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tasty Recipes</title>  
    <link href="reset.css" rel ="stylesheet" type="text/css">
    <link href="main.css" rel="stylesheet" type="text/css"> 
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>   
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="calendar.php">CALENDAR</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">RECIPES</a>
            <div class="dropdown-content">
                <a href="meatballs.php">Meatballs</a>
                <a href="pancakes.php">Pancakes</a>
            </div>
        <li class = "login">
            <?php
                if($_SESSION['uname']) {
                    echo '
                        <li class="dropdownSESSION">
                            <a href="javascript:void(0)" class="dropbtn">Logged in as: '.$_SESSION['uname'].'</a>
                                <div class="dropdown-content">
                                    <a href="inlogg.php">Log out</a>
                                </div>
                        </li>
                    ';
                }
                else
                    echo '<a href="inlogg.php">LOGIN</a>';
            ?>
        </li> 
    </ul>
    
    <h1>Tasty Recipes</h1> 

    <div class="transbox">
        <h2>Welcome to Tasty Recipes!</h2> 
        <p>Thank you so much for stopping by the site! If you are new to Tasty Recipes, the one thing you should know about us is that we are obsessed with creating scratch cooking recipes that you will love.<br><br>
        There are two things we think about when deciding if a recipe is good enough to go on the site.<br>
        First, does it work? Does the dish make us smile inside and out? Do we want to eat the whole batch by ourselves?<br>
        Second, if the dish tastes great, is it worth the effort? Do we want to make it again (and again and again)?<br>
        This is what we strive for - recipes you can rely on to work every time and be worth your time, effort, and $$ to make!<br><br>
        Do you have a recipe binder or a box of recipe cards? Think of this site as us sharing our recipe box with you. Our recipes are all tested in our own kitchens, usually several times. On our calendar page <a href="calendar.html">(click here!)</a> you will find clickable images of the month's dishes. Please try the recipes and if you have a question or constructive feedback, let us know about it in the comments to the recipe.</p>     
    </div>
</body>
</html>