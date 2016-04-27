<?php
  include 'class.Address.php';
  include 'class.Database.php';
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
  </head>
  <body>

    <div class="row">
      <div class="large-12 columns">
        <h1>Object Oriented Programming</h1>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">
        
        <?php
          echo "<hr>";
          
          echo '<h2>Instantiating Address</h2>';
          $address = new Address;

          echo '<h3>Setting Properties...</h3>';
          $address->street_address_1 = '555 Fake Street';
          $address->city_name = 'Townsville';
          $address->subdivision_name = 'State';
          $address->country_name = 'United States of America';
          $address->address_type_id = 1;
          echo $address;

          echo '<h3>Testing Address __construct with an array</h3>';
          $address_2 = new Address(array(
            'street_address_1' => '123 Phony Ave',
            'city_name' => 'Villageland',
            'subdivision_name' => 'Region',
            'country_name' => 'Canada',
          ));
          echo $address_2;

          echo '<h3>Address __toString</h3>';
          echo $address_2;

          echo "<hr>";
        ?>

      </div>
    </div>

    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/what-input.min.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
