<?php

$mysqli = new mysqli('localhost', 'admin', 'admin', 'test');


echo 'Выведите имена пользователей и названия офисов, в которых они сидят <br><br>';

$sql = "SELECT users.*, offices.* FROM users LEFT JOIN offices ON users.office_id = offices.id";

$result = $mysqli->query($sql);

while($user = $result->fetch_array()){
    echo $user[1]." - ".$user['name']."<br>";
};

echo '<br><br><br><br>';



echo 'Выведите названия офисов, в котором сидят больше, чем один пользователь <br><br>';


$id_offices = "SELECT office_id, COUNT(office_id) as idd FROM users GROUP BY office_id HAVING COUNT(office_id) > 1";

$offices = $mysqli->query($id_offices);

while($office = $offices->fetch_array()){
    
    $offices_name = "SELECT * FROM offices WHERE id = $office[office_id]";
    $names = $mysqli->query($offices_name);
    $name = $names->fetch_array();

        echo $name['name'] ." - ". $office['idd'] ." пользователя<br>";

};

// в третей задаче я долго пытался вывернуть мозги, как это сделать 
// одним запросом, но устал и сделал вложенным цыклом