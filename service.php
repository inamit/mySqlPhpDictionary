<?php
/**
 * Created by PhpStorm.
 * User: amitinbar
 * Date: 11/05/2018
 * Time: 16:20
 */
$con = mysqli_connect("den1.mysql6.gear.host", "mydictionary", "Hl46?Op5y?ID", "mydictionary");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT * FROM words";

if ($result = mysqli_query($con, $sql))
{
    // If so, then create a results array and a temporary one
    // to hold the data
    $resultArray = array();
    $tempArray = array();

    // Loop through each row in the result set
    while($row = $result->fetch_object())
    {
        // Add each row into our results array
        $tempArray = $row;
        array_push($resultArray, $tempArray);
    }

    // Finally, encode the array to JSON and output the results
    echo json_encode($resultArray);
}
mysqli_close($con);
?>