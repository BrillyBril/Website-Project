<?php include'include/header.html'?>
    
    <h2>REPLAYS</h2>
    <br>
    <script src= 
    "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 
    </script> 
  
    <script> 
        $.getJSON("https://api.ipify.org?format=json", 
                                          function(data) { 
            $("#gfg").html(data.ip); 
        }) 
    </script> 
</head> 
  
<body> 
    <center>
    <font color="white"
        <i><h1>Public IP Address</h1></i>
        <h3></h3> 
  
        <p id="gfg"></p>
    </font>
    </center> 
</body>
    <br>
    <h1>Discord</h1>
    <a href="https://discord.gg/4hZ4SZA" target="_blank">
        <p>Click here</p>
    <h3>Instagram</h3>
    <a href="https://instagram.com/Cuii" target="_blank">
        <p>Click here</p>
    </a>
    <br>
    <br>
    </a>
    </a>
    <a href="https://stats.replays.us/" target="_blank">
        <button class="button">Uptime Status</button>
    </a>
    <a href="https://courvix.com/vpn.php" target="_blank">
        <button class="button">VPNs</button>
    </a>
    <a href="https://replays.us/captures.php" target="_blank"
        <button class="button">Attack Captures</button>
    </a>

    <?php include'include/footer.html'?>