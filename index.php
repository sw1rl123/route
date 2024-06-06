<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "routes";

$conn = new mysqli($servername, $username, $password, $dbName);

$list = mysqli_query($conn, "SELECT * FROM `saves` ORDER BY id DESC");

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
  <form class="form" action="route.php" method="post">
    <label class="form__label form__label--red" for="pointA">Откуда</label>
    <input class="form__input" type="text" placeholder=" " id="pointA" name="pointA" required><br>
    <label class="form__label" for="pointB">Куда</label>
    <input class="form__input" type="text" placeholder=" " id="pointB" name="pointB" required><br>
    <button class="form__button" type="submit">
    <svg class="form__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.91814 3.6318C9.06272 4.28446 8.06817 5.27676 6.67247 6.67247C5.27676 8.06817 4.28446 9.06272 3.6318 9.91814C2.99235 10.7562 2.75 11.3721 2.75 12C2.75 12.6279 2.99235 13.2438 3.6318 14.0819C4.28446 14.9373 5.27676 15.9318 6.67247 17.3275C8.06817 18.7232 9.06272 19.7155 9.91814 20.3682C10.7562 21.0077 11.3721 21.25 12 21.25C12.6279 21.25 13.2438 21.0077 14.0819 20.3682C14.9373 19.7155 15.9318 18.7232 17.3275 17.3275C18.7232 15.9318 19.7155 14.9373 20.3682 14.0819C21.0077 13.2438 21.25 12.6279 21.25 12C21.25 11.3721 21.0077 10.7562 20.3682 9.91814C19.7155 9.06272 18.7232 8.06817 17.3275 6.67247C15.9318 5.27676 14.9373 4.28446 14.0819 3.6318C13.2438 2.99235 12.6279 2.75 12 2.75C11.3721 2.75 10.7562 2.99235 9.91814 3.6318ZM9.00827 2.43927C9.9798 1.69801 10.9122 1.25 12 1.25C13.0878 1.25 14.0202 1.69801 14.9917 2.43927C15.9366 3.1602 17.0014 4.22502 18.3482 5.57182L18.4282 5.65179C19.775 6.99857 20.8398 8.06337 21.5607 9.00827C22.302 9.9798 22.75 10.9122 22.75 12C22.75 13.0878 22.302 14.0202 21.5607 14.9917C20.8398 15.9366 19.775 17.0014 18.4282 18.3482L18.3482 18.4282C17.0014 19.775 15.9366 20.8398 14.9917 21.5607C14.0202 22.302 13.0878 22.75 12 22.75C10.9122 22.75 9.9798 22.302 9.00827 21.5607C8.06337 20.8398 6.99857 19.775 5.65179 18.4282L5.57182 18.3482C4.22502 17.0014 3.1602 15.9366 2.43927 14.9917C1.69801 14.0202 1.25 13.0878 1.25 12C1.25 10.9122 1.69801 9.9798 2.43927 9.00827C3.16019 8.06338 4.225 6.99858 5.57179 5.65182L5.65182 5.57179C6.99858 4.225 8.06338 3.16019 9.00827 2.43927Z"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7862 8.48704C13.0695 8.18486 13.5441 8.16955 13.8463 8.45285L16.513 10.9528C16.6642 11.0946 16.75 11.2927 16.75 11.5C16.75 11.7073 16.6642 11.9054 16.513 12.0472L13.8463 14.5472C13.5441 14.8305 13.0695 14.8151 12.7862 14.513C12.5029 14.2108 12.5182 13.7361 12.8204 13.4528L14.1034 12.25H10.6667C10.3329 12.25 9.8225 12.3497 9.41961 12.6216C9.05681 12.8665 8.75 13.2655 8.75 14C8.75 14.4142 8.41421 14.75 8 14.75C7.58579 14.75 7.25 14.4142 7.25 14C7.25 12.7345 7.83208 11.8835 8.5804 11.3784C9.28861 10.9003 10.1116 10.75 10.6667 10.75H14.1034L12.8204 9.54715C12.5182 9.26386 12.5029 8.78923 12.7862 8.48704Z"/>
    </svg>
    </button>
  </form>

  <ul class="route__list">
    <?php 
      while ($points = mysqli_fetch_assoc($list)) {
    ?>
      <li class="route__item">
        <svg class="route__icon" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z"/>
        <path d="M12 5C11.4477 5 11 5.44771 11 6V12.4667C11 12.4667 11 12.7274 11.1267 12.9235C11.2115 13.0898 11.3437 13.2343 11.5174 13.3346L16.1372 16.0019C16.6155 16.278 17.2271 16.1141 17.5032 15.6358C17.7793 15.1575 17.6155 14.5459 17.1372 14.2698L13 11.8812V6C13 5.44772 12.5523 5 12 5Z"/>
        </svg>
        <div class="route__string">
          <input class="route__title route__titleA" readonly value="<?php echo $points['pointA'];?>">
          <input class="route__title route__title--right route__titleB" readonly value="<?php echo $points['pointB'];?>">
        </div>
      </li>
      <?php } $conn->close();?>
  </ul>

  <script>
    let point_a = document.getElementById("pointA");
    let point_b = document.getElementById("pointB");

    let items = document.querySelectorAll(".route__item");
    let titleA = document.querySelectorAll(".route__titleA");
    let titleB = document.querySelectorAll(".route__titleB");
    for (let i = 0; i < items.length; i++) {
      items[i].addEventListener("click", function() {
        point_a.value = titleA[i].value;
        point_b.value = titleB[i].value;
      });
    }
  </script>
</body>
</html>