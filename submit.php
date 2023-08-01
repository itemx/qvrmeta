<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $serialNumber = $_POST["serialNumber"];
    $urlFilePath = "url.txt";

    if (!file_exists($urlFilePath)) {
        die("Please define URL first.");
    } else {
        $lines = file($urlFilePath);
        $url = $lines[0];
    }
    

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $serialNumber); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain')); 

    $result = curl_exec($ch);

} else {
    echo "Invalid request.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submit to QVR Meta</title>
</head>
<body>
    <form id="fr" action="index.php" method="POST">
        <input type="hidden" name="last" value="<?=$serialNumber ?>">
    </form>
    <script type="text/javascript">
        document.getElementById("fr").submit();
    </script>
</body>
</html>
