<?php 
if (isset($_GET["q"])) {
    $url = "https://www.google.com/search?q=".$_GET["q"];
    $url = urlencode($url);
    header("Location: index.php?q=".$url);
    exit;
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search The Web | Google Proxy</title>
</head>
<body>
    <h3>Google</h3>
    <h4>Proxied</h4>
    <form method="get">
        Kata Kunci <input type="text" name="q" >
        <input type="submit" value="Cari">
    </form>
    <br><br>
    <div>(C) 2022 - Using PHP-Proxy and Backed by Google</div>
</body>
</html>