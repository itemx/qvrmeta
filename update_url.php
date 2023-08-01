<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newURL = $_POST["url"];
    $urlFilePath = "url.txt";

    file_put_contents($urlFilePath, $newURL);
    echo "URL successfully updated.";
} else {
    echo "Invalid request.";
}
?>
