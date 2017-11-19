<?php
    session_start();

    // Parse users.txt
    $commentData = file('containerPancakes.html');
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
        $handle = fopen("containerPancakes.html", "a");
        $t=time();
        fwrite($handle, "<b>". $_SESSION['uname']." ".gmdate("Y-m-d",$t)."</b>:<br>".$content."<p hidden>".time().",".$_SESSION['uname']."</p><br><br>"."\n");
        fclose($handle);
        header("Refresh:0");
    }

    if($_POST['Delete'])
    {
        file_put_contents('containerPancakes.html','');
        foreach($commentData as $line) {
            if(strpos($line, $_POST['timestamp']) === false) {
                $handle = fopen("containerPancakes.html", "a");
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
    <title>Tasty Recipes - pancakes</title>  
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
    
    <h1>Pancakes</h1> 
    
    <div class="transbox">
        <img src="images/pancakes1.png" alt="Pancakes">
        <h3>Prep: 10 min | Total: 30 min | Servings: 4</h3>
        <h3>Ingredients</h3>
        <p>1 1/2 cups all-purpose flour<br>2 tablespoons sugar<br>1 tablespoon baking powder<br>3/4 teaspoon salt<br>1 1/4 cups milk<br>1 large egg<br>4 tablespoons butter, melted<br>1 teaspoon vanilla extract</p>
        <h3>Steps</h3>
        <p>1 In large bowl, whisk flour, sugar, baking powder and salt. Add milk,<br>butter and egg; stir until flour is moistened.<br>2 Heat 12-inch nonstick skillet or griddle over medium heat until drop of water sizzles; brush lightly with oil.<br>In batches, scoop batter by scant 1/4-cupfuls into skillet, spreading to 3 1/2 inches each.<br>Cook 2 to 3 minutes or until bubbly and edges are dry.<br>With wide spatula, turn; cook 2 minutes more or until golden. <br>Transfer to platter or keep warm on a cookie sheet in 225°F oven.<br>3 Repeat with remaining batter, brushing griddle with more oil if necessary.</p>
        <?php
            if($_SESSION['uname']) {
                echo'
                    <h3>Add a public comment</h3>
                    <div class="comments">
                        <form action="" method = "POST">
                            <label>Comment</label>
                            <input type="text" id="comment" name="comment" placeholder="Type your comment here...">
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
                $commentData = file('containerPancakes.html');
                $j = 0;
                foreach ($commentData as $line) {
                    if(strpos($line, $_SESSION['uname']) !== false) {
                        echo $line;
                        $timestamp = $accessData[$j];
                        $j++;
                        echo '
                            <form method = "POST" action="/pancakes.php">
                                <input type="submit" value="Delete comment" name = "Delete">
                                <input type="hidden" value="'.$timestamp.'" name="timestamp">
                            </form>
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