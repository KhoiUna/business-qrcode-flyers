<?php
require_once("config.php");

// Get query 
$index = $_GET["index"];

$sql = "SELECT business_name, logo, business_description, contact_name, email, business_phone, `address` FROM BBE_Vendors WHERE `index` = '" . $index . "';";
// echo $sql;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $count = 0;
  while ($row = $result->fetch_assoc()) {
    $business_name = $row['business_name'];
    $logo = $row['logo'];
    $business_description = $row["business_description"];
    $contact_name = $row["contact_name"];
    $email = $row["email"];
    $business_phone = $row["business_phone"];
    $address = $row["address"];
  }
} else {
  echo "<h1 style='margin: 1%;'>No results to display</h1>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/tempdesign.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans" />

  <title>Template</title>
</head>

<body>
  <header>
    <?php
    if ($logo !== "") {
      echo "<img class='logos' src='" . $logo . "' alt='" . $business_name . "'/>";
    };
    ?>

    <h1 id="pdfTitle"><?php echo $business_name ?></h1>
  </header>

  <main>
    <p id="desc"><?php echo $business_description ?></p>

    <img class="center" id="qrCode" src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $base_url . "businessForm.php?index=" . $index ?>" alt="<?php echo $business_name . " QR" ?>">    
  </main>

  <footer>
    <h2>Contact Info:</h2>
    <p>
      <b>Name:</b> <?php echo $contact_name ?> <br />
      <b>Phone Number:</b> <?php echo $business_phone ?> <br />
      <b>Email:</b> <?php echo $email ?> <br />
      <b>Business Address:</b> <?php echo $address ?>
    </p>
  </footer>
</body>

</html>