<html>
 <head>
  <title>Hello...</title>

  <meta charset="utf-8"> 


</head>
<body>
    <div class="container">
    <?php echo "<h1>Hi! I'm happy</h1>"; ?>

    <?php
$url = 'http://172.17.0.1:8500/v1/catalog/service/mysql-3306';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);

$out = json_decode($result, true);

$host = $out[0]["ServiceAddress"];
$port = $out[0]["ServicePort"];

    $conn = mysqli_connect($host, 'user', 'test', 'myDb');


    $query = 'SELECT greeting From greeting';
$result = $conn->query($query);
//print_r($result);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " - Name: " . $row["greeting"]. "<br>";
    }
} else {
    echo "0 results";
}
    //$result = mysqli_query($conn, $query);

   /* while($value = $result->fetch_array(MYSQLI_ASSOC)){
        foreach($value as $element){
            echo  $element ;
        }

    }
*/
    //$result->close();

    mysqli_close($conn);

    ?>
    </div>
</body>
</html>
