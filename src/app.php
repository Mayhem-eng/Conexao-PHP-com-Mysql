<?php

include_once(__DIR__.'/../vendor/autoload.php');
include("Model\Pessoa.php");
include("Persistence\ConnectionFactory.php");
include("DTOS\SensorDTO.php");

echo "<p>";


use App\Model\Pessoa;
use App\Persistence\ConnectionFactory;
use App\DTOS\SensorDTO;


new Pessoa("Felipe Garcia", "980585888");

$connFactory = new ConnectionFactory();
$conn = $connFactory->getInstance(); 


$sqlUseDB = "use conexaophp; ";
$stmt = $conn->exec($sqlUseDB);


$sensorDTO11 = new SensorDTO(10, 100);
$sensorDTO22 = new SensorDTO(20, 200);
$sensorDTO23 = new SensorDTO(15, 400);
$sensorDTO24 = new SensorDTO(30, 90);
$sensorDTO25 = new SensorDTO(8, 700);
$sensorDTO26 = new SensorDTO(20, 100);

$sqlInsertData = "INSERT INTO dadosbrutos (temperatura, umidade) VALUES ";
$conn->exec($sqlInsertData."(".$sensorDTO11->_temperatura.",".$sensorDTO11->_umidade.");");
$conn->exec($sqlInsertData."(".$sensorDTO22->_temperatura.",".$sensorDTO22->_umidade.");");
$conn->exec($sqlInsertData."(".$sensorDTO23->_temperatura.",".$sensorDTO22->_umidade.");");
$conn->exec($sqlInsertData."(".$sensorDTO24->_temperatura.",".$sensorDTO22->_umidade.");");
$conn->exec($sqlInsertData."(".$sensorDTO25->_temperatura.",".$sensorDTO22->_umidade.");");
$conn->exec($sqlInsertData."(".$sensorDTO26->_temperatura.",".$sensorDTO22->_umidade.");");

$sqlSelectDadosBrutos = "select * from dadosbrutos; ";

$stmt = $conn->query($sqlSelectDadosBrutos);
$sensorDataArr = $stmt->fetchAll(\PDO::FETCH_ASSOC);


echo "<br></br>temperatura -- umidade <br></br>";

foreach ($sensorDataArr as $sensorData){
    echo "<br></br>".$sensorData['temperatura']." -- ".$sensorData['umidade'];
}


/*
echo "<table>";
while ($exibe = mysql_fetch_assoc($sqlSelectDadosBrutos)){
    echo "<tr><td>Temperatura: </td>";
    echo "<td>".$exibe['temperatura']."</td></tr>";
    echo "<tr><td>Umidade: </td>";
    echo "<td>".$exibe['umidade']."</td></tr>";
}
echo "</table>";
*/