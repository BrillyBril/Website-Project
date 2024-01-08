<?php include'include/header.html'?>

    <h2>LOOKUP</h2>
    <br>
    <h1 style="text-align: left;">IP:</h1>
    <input class="form-control" placeholder="Enter IP Address" />
    <br>
    <a href="/" style="float: left;">
        <div class="button">Back</div>
    </a>
    <input type="submit" value="Look Up IP" name="lookupipbtn"/>
    </form>
<?php
if (isset($_POST['lookupipbtn'])) {
    $ip = $_POST['lookupip'];
    if (empty($ip)) {
        die('<center><h2>Error: No IP Specified.</h2></center></body></html>');
    }
    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        die('<center><h2>Error: Invalid IP.</h2></center></body></html>');
    }
} else {
    if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
}
$long = ip2long($ip);
if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
    echo '<center><h2>IP resides in a private range.</h2></center>';
} else {
    $ipinfo = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    /*
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, ("http://ipinfo.io/{$ip}/json"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ipinfo = json_decode(curl_exec($ch));
    curl_close($ch);
    */
}
if (empty($ip)) $ip = "Not Found";
if (empty($long)) $long = "Not Found";
if (empty($ipinfo->org)) $ipinfo->org = "Not Found";
if (empty($ipinfo->hostname)) $ipinfo->hostname = "Not Found";
if (empty($ipinfo->country)) $ipinfo->country = "Not Found";
if (empty($ipinfo->city)) $ipinfo->city = "Not Found";
if (empty($ipinfo->region)) $ipinfo->region = "Not Found";
if (empty($ipinfo->postal)) $ipinfo->postal = "Not Found";
if (empty($ipinfo->loc)) $ipinfo->loc = "Not Found";
 

echo (' <center><h1>IP Information:</h1></center>
    <table align="center">
    <tr><td><b>IP : </b></td><td><b>'.$ipinfo->ip.'</b></td></tr>
    <tr><td><b>Decimal : </b></td><td><b>'.$long.'</b></td></tr>
    <tr><td><b>Organization : </b></td><td><b>'.$ipinfo->org.'</b></td></tr>
    <tr><td><b>Host Name : </b></td><td><b>'.$ipinfo->hostname.'</b></td></tr>
    <tr><td><b>Country : </b></td><td><b>'.$ipinfo->country.'</b></td></tr>
    <tr><td><b>State : </b></td><td><b>'.$ipinfo->region.'</b></td></tr>
    <tr><td><b>City : </b></td><td><b>'.$ipinfo->city.'</b></td></tr>
    <tr><td><b>Postal : </b></td><td><b>'.$ipinfo->postal.'</b></td></tr>
    <tr><td><b>Latitude/Longitude:</b></td><td><b>'.$ipinfo->loc.'</b></td></tr>
    </table>
');
?>
</body>
</html>
    <?php include'include/footer.html'?>