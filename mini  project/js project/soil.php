<?php
// Sample data for crops based on soil types
$cropsData = [
    "Alluvium" => ["Paddy", "Sugarcane", "Banana", "Vegetables"], // :contentReference[oaicite:0]{index=0}
    "Black" => ["Cotton", "Paddy", "Sorghum", "Millets", "Pulses"], // :contentReference[oaicite:1]{index=1}
    "Calcareous Black" => ["Cotton", "Paddy", "Sorghum", "Millets", "Pulses"], // :contentReference[oaicite:2]{index=2}
    "Clay Loam" => ["Paddy", "Sugarcane", "Banana", "Vegetables"], // :contentReference[oaicite:3]{index=3}
    "Coastal Alluvium" => ["Coconut", "Cashew", "Rice", "Millets"], // :contentReference[oaicite:4]{index=4}
    "Deep Red Loam" => ["Groundnut", "Millets", "Pulses", "Tobacco"], // :contentReference[oaicite:5]{index=5}
    "Lateritic" => ["Tea", "Coffee", "Cashew", "Coconut"], // :contentReference[oaicite:6]{index=6}
    "Non-Calcareous Brown" => ["Millets", "Pulses", "Oilseeds"], // :contentReference[oaicite:7]{index=7}
    "Non-Calcareous Red" => ["Millets", "Pulses", "Oilseeds"], // :contentReference[oaicite:8]{index=8}
    "Red Loamy" => ["Groundnut", "Millets", "Pulses", "Tobacco"], // :contentReference[oaicite:9]{index=9}
    "Red Sandy Loam" => ["Groundnut", "Millets", "Pulses", "Tobacco"], // :contentReference[oaicite:10]{index=10}
    "Red Sandy Soil" => ["Groundnut", "Millets", "Pulses", "Tobacco"], // :contentReference[oaicite:11]{index=11}
    "Saline Coastal Alluvium" => ["Coconut", "Cashew", "Rice", "Millets"], // :contentReference[oaicite:12]{index=12}
    "Sandy Coastal Alluvium" => ["Coconut", "Cashew", "Rice", "Millets"], // :contentReference[oaicite:13]{index=13}
];

$soil = isset($_GET['soil']) ? $_GET['soil'] : '';
$crops = $cropsData[$soil] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Soil Type: <?php echo $soil; ?></title>
</head>
<body>
    <h1>Soil Type: <?php echo $soil; ?></h1>
    <h2>Crops Grown in <?php echo $soil; ?></h2>
    <ul>
        <?php foreach ($crops as $crop): ?>
            <li>
                <a href="crops.php?crop=<?php echo urlencode($crop); ?>"><?php echo $crop; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Back to Districts</a>
</body>
</html>