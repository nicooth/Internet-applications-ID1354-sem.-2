<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tasty Recipes - calendar</title>  
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
    
        <h1>Calendar</h1> 
        
        <div class = "transbox-calendar">
            <div class = "infotext">
                <div id = "text">
                    <p>November 2017 (click on an image to go to its recipe-page)</p>
                </div>
            </div>
        
            <div class = "calendarcolumn"> 
                <div id = "monday">
                    <p>Mon</p>
                </div>
        
                <div id = "tuesday">
                    <p>Tue</p>
                </div>
        
                <div id = "wednesday">
                    <p>Wed</p>
                </div>
        
                <div id = "thursday">
                    <p>Thu</p>
                </div>
        
                <div id = "friday">
                    <p>Fri</p>
                </div>
        
                <div id = "saturday">
                    <p>Sat</p>
                </div>
        
                <div id = "sunday">
                    <p>Sun</p>
                </div>
            </div>

            <div class = "oct30">
                <p>30</p>
            </div>
    
            <div class = "anothermonth">
                <p>31</p>
            </div>
    
            <div class = "days">
                <p>1</p>
            </div>
    
            <div class = "days">
                <p>2</p>
            </div>
    
            <div class = "days">
                <p>3</p>
            </div>
    
            <div class = "days">
                <p>4</p>
            </div>
    
            <div class = "days">
                <p>5</p>
            </div>
    
            <div class = "nextrow">
                <p>6</p>
            </div>
    
            <a href = "meatballs.php">
                <div class = "meatballs">
                    <p>7</p>
                </div>
            </a>
    
            <div class = "days">
                <p>8</p>
            </div>

            <div class = "days">
                <p>9</p>
            </div>
    
            <div class = "days">
                <p>10</p>
            </div>
    
            <div class = "days">
                <p>11</p>
            </div>
    
            <div class = "days">
                <p>12</p>
            </div>
    
            <div class = "nextrow">
                <p>13</p>
            </div>
  
            <div class = "days">
                <p>14</p>
            </div>
    
            <div class = "days">
                <p>15</p>
            </div>
    
            <div class = "days">
                <p>16</p>
            </div>
    
            <div class = "days">
                <p>17</p>
            </div>
    
            <div class = "days">
                <p>18</p>
            </div>
    
            <div class = "days">
                <p>19</p>
            </div>
    
            <div class = "nextrow">
                <p>20</p>
            </div>
    
            <div class = "days">
                <p>21</p>
            </div>
    
            <div class = "days">
                <p>22</p>
            </div>
    
            <div class = "days">
                <p>23</p>
            </div>
    
            <div class = "days">
                <p>24</p>
            </div>
    
            <a href = "pancakes.php">
                <div class = "pancakes">
                    <p>25</p>
                </div>
            </a>
    
            <div class = "days">
                <p>26</p>
            </div>
    
            <div class = "nextrow">
                <p>27</p>
            </div>
    
            <div class = "lastrow">
                <p>28</p>
            </div>
    
            <div class = "lastrow">
                <p>29</p>
            </div>
    
            <div class = "lastrow">
                <p>30</p>
            </div>
    
            <div class = "anothermonth">
                <p>1</p>
            </div>
    
            <div class = "anothermonth">
                <p>2</p>
            </div>
    
            <div class = "anothermonth">
                <p>3</p>
            </div>
        </div>
    </body>
</html>