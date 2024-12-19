<?php
// Datos de destinos cargados dinámicamente
destinations = [
    'moon' => [
        'name' => 'MOON',
        'description' => 'See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.',
        'avg_distance' => '384,400 KM',
        'travel_time' => '3 DAYS',
        'image' => 'media/moon.png',
    ],
    'mars' => [
        'name' => 'MARS',
        'description' => 'Don’t forget to pack your hiking boots. You’ll need them to tackle Olympus Mons, the tallest planetary mountain in our solar system. There’s also Valles Marineris, one of the largest canyons.',
        'avg_distance' => '225 MIL. KM',
        'travel_time' => '9 MONTHS',
        'image' => 'media/mars.png',
    ],
    'europa' => [
        'name' => 'EUROPA',
        'description' => 'The smallest of the four Galilean moons orbiting Jupiter, Europa is a winter lover’s dream. With an icy surface, it’s perfect for skating or ice cave exploration.',
        'avg_distance' => '628 MIL. KM',
        'travel_time' => '6 YEARS',
        'image' => 'media/europa.png',
    ],
    'titan' => [
        'name' => 'TITAN',
        'description' => 'The only moon known to have a dense atmosphere other than Earth, Titan is a home away from home (just a few million kilometers away!).',
        'avg_distance' => '1.4 BIL. KM',
        'travel_time' => '7 YEARS',
        'image' => 'media/titan.png',
    ]
];

$selected = $_GET['destination'] ?? 'moon'; // Selección por defecto si no se pasa por GET
$destination = $destinations[$selected] ?? $destinations['moon'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space LLYC</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="main-header">
        <div class="logo"> 
            <img src="media/llyc.png" alt="Logo">
        </div>
        <nav class="nav-menu">
            <ul>
                <li><a href="#">00 HOME</a></li>
                <li><a href="#" class="active">01 DESTINATION</a></li>
                <li><a href="#">02 CREW</a></li>
                <li><a href="#">03 TECHNOLOGY</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="destination-section">
            <h1>01 PICK YOUR DESTINATION</h1>
            <div class="content">
                <div class="image-container">
                    <img src="<?php echo $destination['image']; ?>" alt="<?php echo $destination['name']; ?>">
                </div>
                <div class="info-container">
                    <div class="tabs">
                        <?php foreach ($destinations as $key => $data): ?>
                            <a href="?destination=<?php echo $key; ?>">
                                <button class="tab <?php echo $key === $selected ? 'active' : ''; ?>" data-destination="<?php echo $key; ?>">
                                    <?php echo $data['name']; ?>
                                </button>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <h2><?php echo $destination['name']; ?></h2>
                    <p><?php echo $destination['description']; ?></p>
                    <div class="details">
                        <div>
                            <p>AVG. DISTANCE</p>
                            <h3><?php echo $destination['avg_distance']; ?></h3>
                        </div>
                        <div>
                            <p>EST. TRAVEL TIME</p>
                            <h3><?php echo $destination['travel_time']; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
