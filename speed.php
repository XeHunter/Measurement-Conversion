<?php

require_once('includes/functions.php');

$from_value = '';
$from_unit = '';
$to_unit = '';
$to_value = '';

if(isset($_POST['submit'])) {
  $from_value = $_POST['from_value'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];
  
  $to_value = convert_speed($from_value, $from_unit, $to_unit);
}

$speed_options = array(
  "feet per second",
  "miles per hour",
  "meters per second",
  "kilometers per hour",
  "knots"
);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Convert Speed</title>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="Styles.css" rel="stylesheet" type="text/css">
</head>
<body>
  
  <div class="container">
    <div id="main-content">

    <h1>Convert Speed</h1>

    <form action="" method="post">
  
      <div class="entry">
        <label>From:</label>&nbsp;
        <input type="text" name="from_value" value="<?php echo $from_value; ?>" />&nbsp;
        <select name="from_unit">
          <?php
          foreach($speed_options as $unit) {
            $opt = optionize($unit);
            echo "<option value=\"{$opt}\"";
            if($from_unit == $opt) { echo " selected"; }
            echo ">{$unit}</option>";
          }
          ?>
        </select>
      </div>
    
      <div class="entry">
        <label>To:</label>&nbsp;
        <input type="text" name="to_value" value="<?php echo float_to_string($to_value); ?>" />&nbsp;
        <select name="to_unit">
          <?php
          foreach($speed_options as $unit) {
            $opt = optionize($unit);
            echo "<option value=\"{$opt}\"";
            if($to_unit == $opt) { echo " selected"; }
            echo ">{$unit}</option>";
          }
          ?>
        </select>
      
      </div>
    
      <input type="submit" name="submit" value="Submit" />
    </form>
</div>

<div id="return-content">
  <button class="returnhome" onclick="location.href='index.php'"><i class="fa fa-arrow-left"></i>   Return to menu</button>
</div>

</body>
</html>
