<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$con=new mysqli("localhost","root","","yemenit_bus_travels");
$query=mysqli_query($con,"select * from list_menu");
while($data=mysqli_fetch_assoc($query)){
 echo $data['name'].",";

}
}


?>