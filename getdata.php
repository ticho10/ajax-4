<?php
include "dbvars.php";

$resultArray = array();

$search = $_GET['q'];
$type = $_GET['type'];
$con = mysqli_connect($servername,$uid,$pwd,$database);
if (!$con) {

}
mysqli_select_db($con,'25030_ik');
$sql = "SELECT * FROM country WHERE name LIKE '$search%' ";
if ($type == 'list') {
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)) {
        $resultArray[] = $row['Name'];
    }
    echo json_encode($resultArray);
}
if ($type == 'answer') {
    $result = mysqli_query($con,$sql);

    echo "<table>
            <tr>
                <th>Name</th>
                <th>Continent</th>
                <th>Region</th>
                <th>SurfaceArea</th>
                <th>IndepYear</th>
                <th>Population</th>
            </tr>
           </table>";
    while($row = mysqli_fetch_array($result)) {
        echo "<table>";
        echo "<tr>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Continent'] . "</td>";
        echo "<td>" . $row['Region'] . "</td>";
        echo "<td>" . $row['SurfaceArea'] . "</td>";
        echo "<td>" . $row['IndepYear'] . "</td>";
        echo "<td>" . $row['Population'] . "</td>";
        echo "</tr>";
        echo "</table>";
    }
    echo "</table>";
}
mysqli_close($con);
?>