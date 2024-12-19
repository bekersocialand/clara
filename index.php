<?php
require_once 'data.php'; 

$selected = $_GET['destination'] ?? 'moon';
$selected = array_key_exists($selected, $destinations) ? $selected : 'moon';
$destination = $destinations[$selected];
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
            <h1>01 - PICK YOUR DESTINATION</h1>
            <div class="content">
                <div class="image-container">
                    <img src="<?php echo $destination['image']; ?>" alt="<?php echo htmlspecialchars($destination['name']); ?>">
                </div>
                <div class="info-container">
                    <div class="tabs">
                        <?php foreach ($destinations as $key => $data): ?>
                            <a href="?destination=<?php echo $key; ?>">
                                <button class="tab <?php echo $key === $selected ? 'active' : ''; ?>" data-destination="<?php echo $key; ?>">
                                    <?php echo htmlspecialchars($data['name']); ?>
                                </button>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <h2><?php echo htmlspecialchars($destination['name']); ?></h2>
                    <p><?php echo htmlspecialchars($destination['description']); ?></p>
                    <div class="details">
                        <div>
                            <p>AVG. DISTANCE</p>
                            <h3><?php echo htmlspecialchars($destination['avg_distance']); ?></h3>
                        </div>
                        <div>
                            <p>EST. TRAVEL TIME</p>
                            <h3><?php echo htmlspecialchars($destination['travel_time']); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
