<?php
    session_start();

    // Parse users.txt
    $commentData = file('container.html');
    $i = 0;
    $accessData = array();
    foreach ($commentData as $line) {
        if(strpos($line, $_SESSION['uname']) !== false) {
            list($comment, $user) = explode('hidden>', $line);
            $accessData[$i++] = trim($user);
        }
    }

    if($_POST && !empty($_POST['comment'])){
        $content = $_POST['comment'];
        $handle = fopen("container.html", "a");
        $t=time();
        fwrite($handle, "<b>". $_SESSION['uname']." ".gmdate("Y-m-d",$t)."</b>:<br>".$content."<p hidden>".time().",".$_SESSION['uname']."</p><br><br>"."\n");
        fclose($handle);
        header("Refresh:0");
    }

    if($_POST['Delete'])
    {
        file_put_contents('container.html','');
        foreach($commentData as $line) {
            if(strpos($line, $_POST['timestamp']) === false) {
                $handle = fopen("container.html", "a");
                fwrite($handle, $line);
                fclose($handle);
            }
        }
        header("Refresh:0");
    }
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Tasty Recipes - meatballs</title>  
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
        </li>
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
    <h1>Meatballs</h1> 
    <div class="transbox">
        <img src="images/meatballs.jpg" alt="Meatballs">
        <h3>Prep: 15 min | Total: 40 min | Servings: 4</h3>
        <h3>Ingredients</h3>
        <p>1 lb lean (at least 80%) ground beef<br>
        1/2 cup Progresso™ Italian-style bread crumbs<br>
        1/4 cup milk<br>
        1/2 teaspoon salt<br>
        1/2 teaspoon Worcestershire sauce<br>
        1/4 teaspoon pepper<br>
        1 small onion, finely chopped (1/4 cup)<br>
        1 egg</p>
        <h3>Steps</h3>
        <p>1 Heat oven to 400°F. Line 13x9-inch pan with foil; spray with cooking spray.<br>
        2 In large bowl, mix all ingredients. Shape mixture into 20 to 24 (1 1/2-inch)<br>
        meatballs. Place 1 inch apart in pan.<br>
        3 Bake uncovered 18 to 22 minutes or until no longer pink in center.</p>
        <?php
            if($_SESSION['uname']) {
                echo'
                    <h3>Add a public comment</h3>
                    <div class="comments">
                        <form action="/meatballs.php" method = "POST">
                            <label>Comment</label>
                            <input type="text" id="comment" name="comment" placeholder="Type your comment here..">
                            <input type="submit" value="Post comment">
                        </form>
                    </div>';
            }
        
            else {
                echo '<h4>Log in to add a public comment</h4><br>';
            }
        ?>
        <h4>What others are saying...</h4>
        <hr>
        <div id = "commentbox">
                <?php
                    $commentData = file('container.html');
                    $j = 0;
                    foreach ($commentData as $line) {
                        if(strpos($line, $_SESSION['uname']) !== false) {
                            echo $line;
                            $timestamp = $accessData[$j];
                            $j++;
                            echo '
                                <div id = "comments">
                                <form method = "POST" action="/meatballs.php">
                                    <input type="submit" value="Delete comment" name = "Delete">
                                    <input type="hidden" value="'.$timestamp.'" name="timestamp">
                                </form>
                                </div>  
                            ';
                        }
                    
                        else
                            echo $line;
                    }
                ?>   
        </div>
    </div>
</body>
</html>