<!-- This is the Booking form data store Process -->

<?php
// Connect to MySQL
$host = "localhost";
$user = "root";
$password = "";
$database = "travel_itinerary_planner"; // My Database Name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get all input values
    $fname     = $_POST['fname'];
    $lname     = $_POST['lname'];
    $nic       = $_POST['nic'];
    $phone     = $_POST['phoneNumber'];
    $address   = $_POST['message']; // Address field
    $dob       = $_POST['date'];
    $city      = $_POST['city'];

    $pickup    = $_POST['pd'];
    $dropoff   = $_POST['dp'];
    $dateTime  = $_POST['dateTime'];
    $hours     = $_POST['Hours'];
    $request   = $_POST['Request'];

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO bookings (
        fname, lname, nic, phone, address, dob, city,
        pickup, dropoff, date_time, hours, special_request, created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    // The first argument ("ssssssssssss") is a string of type specifiers, one for each variable:

                    //s = string

                    //i = integer

                    //d = double (float)

                    //b = blob (binary)

    $stmt->bind_param("ssssssssssss", 
        $fname, $lname, $nic, $phone, $address, $dob, $city,
        $pickup, $dropoff, $dateTime, $hours, $request
    );

    // Submit - Success Messgage

    if ($stmt->execute()) {
        echo "<script>alert('Booking submitted successfully! We will reply as soon as!! '); window.location.href='booking.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

}


?>

<!--PHPMailer - Some time this is not Working - Beacouse I am not Use-->





