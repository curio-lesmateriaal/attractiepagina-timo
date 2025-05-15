<?php
session_start();
require_once 'admin/backend/config.php';
require_once "admin/backend/conn.php";

$query = "SELECT * FROM rides";
$statement = $conn->prepare($query);
$statement->execute();
$rides = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="nl">
<head>
    <title>Attractiepagina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php require_once 'header.php'; ?>
    <div class="container content">
        <aside class="filter-sidebar">

            <form action="">

            </form>
        </aside>
        <main>
             <div class="attractiepagina__achtbanen">
                <?php foreach ($rides as $ride) : ?>
                    <?php if ($ride["fast_pass"] == 0) { ?>
                        <div class="attractiepagina__achtbanen_grid">
                            <img src="<?php echo $base_url; ?>/img/attracties/<?php echo $ride['img_file']; ?>" alt="" class="attractiepagina__achtbanen_grid__img">
                            <div>
                                <p><?php echo ucfirst($ride['themeland']); ?></p>
                                <h1><?php echo $ride['title']; ?></h1>
                                <p><?php echo $ride['description']; ?></p>
                                <p style="margin-top: 1rem;"><b><?php echo $ride["min_length"] == null ? "Geen minimale lengte" : $ride["min_length"] . "cm"; ?></b> <?php echo $ride["min_length"] != null ? "minimale lengte" : ""; ?></p>
                            </div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="attractiepagina__achtbanen_grid element-l">
                            <img src="<?php echo $base_url; ?>/img/attracties/<?php echo $ride['img_file']; ?>" alt="" class="attractiepagina__achtbanen_grid__img">
                            <div class="element-l__div">
                                <div class="element-l__1">
                                    <p><?php echo ucfirst($ride['themeland']); ?></p>
                                    <h1><?php echo $ride['title']; ?></h1>
                                    <p><?php echo $ride['description']; ?></p>
                                    <p style="margin-top: 1rem;"><b><?php echo $ride["min_length"] == null ? "Geen minimale lengte" : $ride["min_length"] . "cm"; ?></b> <?php echo $ride["min_length"] != null ? "minimale lengte" : ""; ?></p>
                                </div>
                                <div class="element-l__2">
                                    <h6 style="text-align: center;">Deze attractie is alleen te bezoeken met een fastpass.</h6>
                                    <div class="element-l__2__fastpass">
                                        <h5>Boek nu en sla de wachtrij over.</h5>   
                                        <a href="_"><img src="img/Ticket.png" alt="img"> FAST PASS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</body>
</html>