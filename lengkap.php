<!DOCTYPE html>
<html>
<head>
    <title>Cuaca Hari Ini</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #weather {
            margin: 0 auto;
            text-align: center;
            padding-top: 50px;
        }
        h1 {
            font-size: 36px;
            font-weight: bold;
        }
        h2 {
            font-size: 24px;
            font-weight: bold;
        }
        p {
            font-size: 18px;
            margin: 10px;
        }
        .location {
            font-style: italic;
            font-size: 14px;
            margin-top: -10px;
        }
    </style>
</head>
<body>
    <div id="weather">
        <h1>Cuaca Hari Ini</h1>
        <form action="" method="post">
            <input type="text" name="city" placeholder="Masukkan nama kota" required>
            <button type="submit" name="submit">Cari</button>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $city = $_POST['city'];
            $apiKey = 'd54f78a6f1a6a4bf0cd21b3e0f781040';
            $url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . $apiKey;
            $weatherData = json_decode(file_get_contents($url), true);
            $currentTime = time();
            ?>
            <h2><?php echo $city; ?></h2>
            <p><?php echo date("l g:i a", $currentTime); ?></p>
            <p><?php echo date("jS F, Y", $currentTime); ?></p>
            <p>Temperatur: <?php echo round($weatherData['main']['temp'] - 273.15); ?> &deg;C</p>
            <p>Kelembaban: <?php echo $weatherData['main']['humidity']; ?>%</p>
            <p>Deskripsi: <?php echo ucwords($weatherData['weather'][0]['description']); ?></p>
            <div class="location">
                <p>Koordinat: <?php echo $weatherData['coord']['lat']; ?>, <?php echo $weatherData['coord']['lon']; ?></p>
            </div>
        <?php } ?>
    </div>
</body>
</html>
