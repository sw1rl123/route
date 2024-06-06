<?php
  $point_A = $_POST['pointA'];
  $point_B = $_POST['pointB'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "routes";

  $conn = new mysqli($servername, $username, $password, $dbName);

  $sql = "INSERT INTO `saves` (`id`, `pointA`, `pointB`) VALUES (NULL, '".$point_A."', '".$point_B."')";

  $conn->query($sql);


  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Логистик</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <div id="map-test" class="map"></div>
  <script src="https://api-maps.yandex.ru/2.1/?apikey=f00964b7-46c4-4633-9a4e-aeba4cb7a3b2&lang=ru_RU">
  </script>
  <script>
    ymaps.ready(function () {

      let myMap = new ymaps.Map('map-test', {
        center: [55.75265775108605, 37.62312338085712],
        zoom: 12,
        controls: ['routePanelControl']
      });

      let control = myMap.controls.get('routePanelControl');
      let city = 'Москва';

      control.routePanel.state.set({
            type: 'masstransit',
            fromEnabled: false,
            from: `${city}, <?php echo $point_A?>`,
            toEnabled: true,
            to: `${city}, <?php echo $point_B?>`,
          });

      });
  </script>
</body>
</html>