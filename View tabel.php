<style>
    
.table1 {
    font-family: sans-serif;
    color: #232323;
    border-collapse: collapse;
}
 
.table1, th, td {
    border: 1px solid #999;
    padding: 8px 20px;
}
</style>


<table border= "1px solid black">

<tr>
    <td>id</td>
    <td>username</td>
    <td>password</td>
    <td>role</td>
<tr>



<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "Jasa_design_grafis";

$db = mysqli_connect($hostname, $username, $password, $database);

$input = mysqli_query($db, "SELECT * FROM user");
if ($input) {

    while ($data = mysqli_fetch_assoc($input)) {

        $id = $data['id'];
        $username = $data['username'];
        $password = $data['password'];
        $role= $data['Role'];


        echo "
        
    <tr>
    <td>$id</td>
    <td>$username</td>
    <td>$password</td>
    <td>$role</td>
    </tr>
        
        ";
    }


}


?>

</table>
