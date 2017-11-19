<?php

// Handle Post
if (count($_POST))
{
    // Parse users.txt
    $loginData = file('users.txt');
    $accessData = array();
    foreach ($loginData as $line) {
        list($username, $password) = explode(',', $line);
        $accessData[trim($username)] = trim($password);
    }

    // Parse form input
    $uname = isset($_POST['uname']) ? $_POST['uname'] : '';
    $psw = isset($_POST['psw']) ? $_POST['psw'] : '';

    // Check input versus login.txt data
    if (array_key_exists($uname, $accessData) && $psw == $accessData[$uname]) {
        //header('Location: http://localhost/index.html');
        session_start();
        $_SESSION['uname'] = $uname;
    } 
    
    else {
        header('Location: http://localhost/felinlogg.html');
    }
}

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
    <div class = "loggedintransbox">
        <h2><br>Welcome <?php echo $_SESSION['uname'] ?>!</h2> 
    </div>     
</body>
</html>