<?php
$servername = "<your server ip>";
$username = "<your server username>";
$password = "<your server password>";
$dbname = "your database name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//GET query
$index = $_GET["index"];

$sql = "SELECT business_name, logo FROM BBE_Vendors WHERE `index`  = '" . $index . "';";
// echo $sql;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $business_name = $row['business_name'];
    $logo = $row["logo"];
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
  <link rel="stylesheet" href="./css/form.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans" />

  <title>Customer Form</title>
</head>

<body>
  <?php
    if ($logo !== "") {
      echo "<img class='logos' src='" . $logo . "' alt='" . $business_name . "'/>";
    };
    ?>

  <h1 id="formTitle"><?php echo $business_name ?></h1>

  <h1>Please send us your contact info</h1>

  <form>
    <div class="inputs">
      <label>First Name:</label>
      <input require id="first" type="text" name="first_name">
    </div>

    <div class="inputs">
      <label>Last Name:</label>
      <input require id="last" type="text" name="last_name">
    </div>

    <div class="inputs">
      <label>Email:</label>
      <input require id="email" type="text" name="email">
    </div>

    <div class="inputs">
      <label>Phone Number(optional):</label>
      <input id="phoneNum" type="text" name="phone_number">
    </div>

    <p id="form-status" style="font-weight: bold;"></p>

    <div class="submit-btn">
      <input id="submit-form" type="submit">
    </div>
  </form>

  <script type="module" src="./js/postContactInfo.js"></script>
</body>

</html>