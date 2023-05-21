<?php

if (isset($_POST['code'])) {

    $qrData = $_POST['code'];
}
// connect to the database
$conn = new mysqli("localhost", "test", "12345", "sadna");

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// get the user id and qr id from the qr data
$username = $_POST['username'];
$code = $_POST['code'];
// check if the user id and qr id match to the closest reservation of the user
$sql = "SELECT *
FROM field_reservation
WHERE player_username = '$username'
  AND arrival != 1
  AND date = CURDATE()
  AND starttime BETWEEN TIME(DATE_SUB(NOW(), INTERVAL 15 MINUTE)) AND TIME(DATE_ADD(NOW(), INTERVAL 15 MINUTE))
ORDER BY date DESC
LIMIT 1;
";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['field_id'] == $code) {
        // update the database to mark the user as arrived
        $sql = "UPDATE field_reservation SET arrival = 1 WHERE reservation_Id = " . $row['reservation_Id'];
        if (mysqli_query($conn, $sql)) {
            echo "good";
        } else {
            echo "bad";
        }
    }
}
mysqli_close($conn);
