<?php
// array holding allowed Origin domains
$allowedOrigins = array(
    '(http(s)://)?(www\.)?my\-domain\.com'
  );
   
  if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] != '') {
    foreach ($allowedOrigins as $allowedOrigin) {
      if (preg_match('#' . $allowedOrigin . '#', $_SERVER['HTTP_ORIGIN'])) {
        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        break;
      }
    }
  }

$dbhost = "sql12.freemysqlhosting.net";
$dbuser = "sql12287869";
$dbpass = "Q6Qsi4rmcl";
$db = "sql12287869";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo $conn;
echo "Connected successfully";
// $sql = "SELECT * FROM reviews";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "email: " . $row["email"]. " - Name: " . $row["name"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }
// $sql="INSERT INTO reviews ('name', 'email', 'subject', 'comment') VALUES 
// ('$_POST[fname]','$_POST[email]', '$_POST[subject]', '$_POST[message]')";

$sql = "INSERT INTO reviews(name)VALUES ('opopoop')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>