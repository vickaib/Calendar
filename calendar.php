<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles_lab2.css" type="text/css" />
    </head>
    
    <?php
    
    $result = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        $to = "victoriakaibigan@gmail.com";
        $subject = "Lab Assignment 2";
        $msg = "These are the times you chose: ";
        $headers = "From: " . $email;
        
        if (!empty($_POST['name']) || !empty($_POST['email'])) {
            mail($to, $subject, $msg, $headers);
            $result = '<div style="text-align: left; margin-left: 10px"> Email successfully sent from ' . $email . '</div>';
        } else {
            $result = '<div style="text-align: left; margin-left: 10px"> Error, please enter required details correctly.</div>';
        }
    
        } 
    }
       
    ?>

<form action="" method="post">     
<div class="heading">
    <h1>Office Hours Sign Up</h1>
    
    <div>
        
        <p>  
            Student Name: 
                <input type="text" name="name"/>
                <input type="hidden" name="studentName" value="<?php echo $POST['name'] ?>">

            Student Email: 
                <input type="text" name="email"/>
                <input type="hidden" name="studentEmail" value="<?php echo $_POST['email'] ?>">
            
            <input type="submit" name="submit" value="Submit"/>
            <input type="reset" value="Clear"/>
            
        </p>
        

    </div>
    
    <?php

    date_default_timezone_set("America/New_York");
    echo "<br /><i>Last modified: </i>" . date("H:i F d, Y T", getlastmod());
    
    
    echo '<p>Click <a href="index.html">here</a> to return to the home page.</p>';
    
    echo $result;    

    ?>

    

    <div class="datelabel">
        <?php

        echo date("F, Y");
        
        ?>
    </div>
</div>

<div class="content">
    <div class="divTable">

        <div class="divTableRow">
            <div class="divTableCell">Monday</div>
            <div class="divTableCell">Tuesday</div>
            <div class="divTableCell">Wednesday</div>
            <div class="divTableCell">Thursday</div>
            <div class="divTableCell">Friday</div>
            <div class="divTableCell">Saturday</div>
            <div class="divTableCell">Sunday</div>
        </div>

    <?php 

    $date = time();
    // Today's weekday
    $day = date('D', $date);
    $month = date('m', $date);
    $year = date('Y', $date);
    
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);

    $lastMonth = date("t", mktime(0, 0, 0, $month - 1, 1, $year));
    $lastMonthNum = $month - 1;
    $nextMonthNum = $month + 1;

    $startDate = date("N", mktime(0, 0, 0, $month, 1, $year));
    $lastStart = $startDate - 1;
 
    $counter = 1;
    $nextMonthCounter = 1;
    
        
    // Determines number of rows for calendar
    if ($startDate > 5) {	
        $rows = 6; 
    } else {$rows = 5; }
        
    // For each week in the month...
    for($i = 1; $i <= $rows; $i++){
        echo '<div class="divTableRow">';
        
        // For each day(Mon, Tue, Wed, etc)of the week...
        for ($x = 1; $x <= 7; $x++) {				

            if(($counter - $startDate) < 0) {
                $date = (($lastMonth - $lastStart) + $counter);
                $dayOfWeek = date('D', mktime(0,0,0, $lastMonthNum, $date, $year));

            } else if(($counter - $startDate) >= $daysInMonth) {
                $date = ($nextMonthCounter);
                $nextMonthCounter++;
                $dayOfWeek = date('D', mktime(0,0,0, $nextMonthNum, $date, $year));


            } else {
                $date = ($counter - $startDate + 1);
                $dayOfWeek = date('D', mktime(0,0,0, $month, $date, $year));
            }
            
            
            // Echo date and radio buttons
            switch ($dayOfWeek) {
                case "Mon":
                    echo '<div class="divTableCell">'. $date;
                    if (!empty($_POST['monSelect'])) {
                        foreach($_POST['monSelect'] as $chosenTime) {
                            echo '<br />';
                            echo '<input type="radio" value="'.$chosenTime.'">';
                            echo '<label for="'.$chosenTime.'">'.$chosenTime.'</label>'; } 
                        echo '</div>';   
                    } else {
                        echo '&nbsp </div>';
                    }
                    break;
                case "Tue":
                    echo '<div class="divTableCell">'. $date;
                    if (!empty($_POST['tueSelect'])) {
                        foreach($_POST['tueSelect'] as $chosenTime) {
                            echo '<br />';
                            echo '<input type="radio" value="'.$chosenTime.'">';
                            echo '<label for="'.$chosenTime.'">'.$chosenTime.'</label>'; }
                            
                        echo '</div>';  
                    } else {
                        echo '&nbsp </div>';
                    }
                    break;
                case "Wed":
                    echo '<div class="divTableCell">'. $date;
                    if (!empty($_POST['wedSelect'])) {
                        foreach($_POST['wedSelect'] as $chosenTime) {
                            echo '<br />';
                            echo '<input type="radio" value="'.$chosenTime.'">';
                            echo '<label for="'.$chosenTime.'">'.$chosenTime.'</label>'; }
                            
                        echo '</div>';  
                    } else {
                        echo '&nbsp </div>';
                    }
                    break;
                case "Thu":
                    echo '<div class="divTableCell">'. $date;
                   if (!empty($_POST['thuSelect'])) {
                        foreach($_POST['thuSelect'] as $chosenTime) {
                            echo '<br />';
                            echo '<input type="radio" value="'.$chosenTime.'">';
                            echo '<label for="'.$chosenTime.'">'.$chosenTime.'</label>'; }
                            
                        echo '</div>';  
                    } else {
                        echo '&nbsp </div>';
                    }
                    break;
                case "Fri":
                    echo '<div class="divTableCell">'. $date;
                    if (!empty($_POST['friSelect'])) {
                        foreach($_POST['friSelect'] as $chosenTime) {
                            echo '<br />';
                            echo '<input type="radio" value="'.$chosenTime.'">';
                            echo '<label for="'.$chosenTime.'">'.$chosenTime.'</label>'; }
                            
                        echo '</div>';  
                    } else {
                        echo '&nbsp </div>';
                    }
                    break;
                case "Sat":
                    echo '<div class="divTableCell">'. $date;
                    echo '<br />';
                    echo '&nbsp</div>';
                    break;
                case "Sun":
                    echo '<div class="divTableCell">'. $date;
                    echo '<br />';
                    echo '&nbsp</div>';
                    break;
        }

            $counter++;

        }

        echo '</div>';
    }

    ?>

    </div>
</div>
</form>

</html>