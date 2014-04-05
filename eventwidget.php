<?php
//we have to set timezone to California
date_default_timezone_set('Poland/Warsaw');
 
//requiring FB PHP SDK
require 'fb-sdk/src/facebook.php';
 
//initializing keys
$facebook = new Facebook(array(
    'appId'  => '723692490987050',
    'secret' => 'b835b91df3e9d7a21245813c2bcd3238',


$fql = "SELECT 
            name, pic, start_time, end_time, location, description 
        FROM 
            event 
        WHERE 
            eid IN ( SELECT eid FROM event_member WHERE uid = 221167777906963 ) 
        AND 
            start_time >= now()
        ORDER BY 
            start_time desc";
 
$param  =   array(
    'method'    => 'fql.query',
    'query'     => $fql,
    'callback'  => ''
);
    
//looping through retrieved data
foreach( $fqlResult as $keys => $values ){
    /*
     * see here http://php.net/manual/en/function.date.php 
     * for the date format I used.
     * The pattern string I used 'l, F d, Y g:i a'
     * will output something like this: July 30, 2015 6:30 pm
     */
 
    /*   
     * getting start date,
     * 'l, F d, Y' pattern string will give us
     * something like: Thursday, July 30, 2015
     */
    $start_date = date( 'l, F d, Y', strtotime($values['start_time']) );
 
    /*
     * getting 'start' time
     * 'g:i a' will give us something
     * like 6:30 pm
     */
    $start_time = date( 'g:i a', $values['start_time'] );


        //printing the data
    echo "<div class='event'>";
 
        echo "<div class='floatLeft eventImage'>";
            echo "<img src={$values['pic']} width='150px' />";
        echo "</div>";
 
        echo "<div class='floatLeft'>";
            echo "<div class='eventName'>{$values['name']}</div>";
 
            /*
             * -the date is displaying correctly, but the time? uh, sometimes it is late by an hour.
             * -it might also depend on what country you are in
             * -the best solution i can give is to include the date only and not the time
             * -you should put the time of your event in the description.
             */
            echo "<div class='eventInfo'>{$start_date} at {$start_time}</div>";
            echo "<div class='eventInfo'>{$values['location']}</div>";
            echo "<div class='eventInfo'>{$values['description']}</div>";
        echo "</div>";
 
        echo "<div class='clearBoth'></div>";
    echo "</div>";
 
}
 
?>