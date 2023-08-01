<?
    $urlFilePath = "url.txt";

    if (!file_exists($urlFilePath)) {
        $url = "Not defined.";
    } else {
        $lines = file($urlFilePath);
        $url = $lines[0];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Write to QVR Metadata</title>
</head>
<body>
    <h1>Write to QVR Metadata</h1>
    <form id="serialNumberForm" action="submit.php" method="post">
        <label for="serialNumber">Enter Info:</label>
        <input type="text" id="serialNumber" name="serialNumber" required autofocus>
<?
            if(isset($_POST["last"])){
                $last = $_POST["last"];
                echo "Last value: " . $last ." was submitted.";
            }
?>
        <br>
        <button type="submit">Submit</button>
    </form>
    <br>
    Now Send to: <?=$url ?>
    <br>
    <button onclick="changeURL()">Change Metadata URL</button>
</body>
<script>
    function changeURL() {
        var newURL = prompt("Enter the new URL:");
        if (newURL !== null && newURL.trim() !== "") {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_url.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("url=" + encodeURIComponent(newURL));
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    alert(xhr.responseText);
                }
            };
        }
        window.location.reload();
    }
</script>
<p>Refer <a href="https://www.qnap.com/en/how-to/tutorial/article/how-to-record-qiot-suite-lite-data-in-qvr-pro" target="_blank">this guide</a> on how to create a Metadata URL in QVR Pro.</p>

</html>
