<?php
  include 'class.Address.php';
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

          echo '<h3>Empty Address</h3>';
          echo '<tt><pre>' . var_export($address, TRUE) . '</pre></tt>';

          echo '<h3>Setting Properties...</h3>';
          $address->street_address_1 = '555 Fake Street';
          $address->city_name = 'Townsville';
          $address->subdivision_name = 'State';
          $address->postal_code = '12345';
          $address->country_name = 'United States of America';
          $address->address_type_id = 1;
          echo '<tt><pre>' . var_export($address, TRUE) . '</pre></tt>';

          echo '<h3>Displaying Address...</h3>';
          echo $address->display();

          echo '<h3>Testing Magic __get and __set...</h3>';
          unset($address->postal_code);
          echo $address->display();

          echo '<h3>Testing Address __construct with an array</h3>';
          $address_2 = new Address(array(
            'street_address_1' => '123 Phony Ave',
            'city_name' => 'Villageland',
            'subdivision_name' => 'Region',
            'postal_code' => '67890',
            'country_name' => 'Canada',
          ));
          echo $address_2->display();

          echo '<h3>Address __toString</h3>';
          echo $address_2;

          echo '<h3>Displaying Address Types...</h3>';
          echo '<tt><pre>' . var_export(Address::$valid_address_types, TRUE) . '</tt></pre>';

          echo '<h3>Testing address type ID validation...</h3>';
          for($id = 0; $id <= 4; $id++) {
            echo "<div>$id: ";
            echo Address::isValidAddressTypeId($id) ? 'Valid' : 'Invalid';
            echo "</div>";
          }

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
