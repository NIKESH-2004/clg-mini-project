<?php 
// Sample data for districts and their soil types
$districts = [
  
        "Ariyalur" => ["Red Loamy", "Black"],
        "Chengalpet" => ["Red Sandy Loam", "Clay Loam", "Saline Coastal Alluvium"],
        "Chennai" => ["Sandy Coastal Alluvium"],
        "Coimbatore" => ["Red Loamy", "Black"],
        "Cuddalore" => ["Red Sandy Loam", "Clay Loam", "Saline Coastal Alluvium"],
        "Dharmapuri" => ["Non-Calcareous Red", "Non-Calcareous Brown", "Calcareous Black"],
        "Dindigul" => ["Red Loamy", "Black"],
        "Erode" => ["Red Loamy", "Black"],
        "Kallakurichi" => ["Red Sandy Loam", "Clay Loam", "Saline Coastal Alluvium"],
        "Kancheepuram" => ["Red Sandy Loam", "Clay Loam", "Saline Coastal Alluvium"],
        "Kanyakumari" => ["Saline Coastal Alluvium", "Deep Red Loam"],
        "Karur" => ["Red Loamy", "Black"],
        "Krishnagiri" => ["Non-Calcareous Red", "Non-Calcareous Brown", "Calcareous Black"],
        "Madurai" => ["Coastal Alluvium", "Black", "Red Sandy Soil", "Deep Red Soil"],
        "Mayiladuthurai" => ["Red Loamy", "Alluvium"],
        "Nagapattinam" => ["Red Loamy", "Alluvium"],
        "Namakkal" => ["Non-Calcareous Red", "Non-Calcareous Brown", "Calcareous Black"],
        "Nilgiris" => ["Lateritic"],
        "Perambalur" => ["Red Loamy", "Black"],
        "Pudukkottai" => ["Red Loamy", "Alluvium"],
        "Ramanathapuram" => ["Coastal Alluvium", "Black", "Red Sandy Soil", "Deep Red Soil"],
        "Ranipet" => ["Red Sandy Loam", "Clay Loam", "Saline Coastal Alluvium"],
        "Salem" => ["Non-Calcareous Red", "Non-Calcareous Brown", "Calcareous Black"],
        "Sivagangai" => ["Coastal Alluvium", "Black", "Red Sandy Soil", "Deep Red Soil"],
        "Tenkasi" => ["Coastal Alluvium", "Black", "Red Sandy Soil", "Deep Red Soil"],
        "Thanjavur" => ["Red Loamy", "Alluvium"],
        "Theni" => ["Red Loamy", "Black"],
        "Thoothukudi" => ["Coastal Alluvium", "Black", "Red Sandy Soil", "Deep Red Soil"],
        "Tiruchirappalli" => ["Red Loamy", "Alluvium"],
        "Tirunelveli" => ["Coastal Alluvium", "Black", "Red Sandy Soil", "Deep Red Soil"],
        "Tirupathur" => ["Red Sandy Loam", "Clay Loam", "Saline Coastal Alluvium"],
        "Tiruppur" => ["Red Loamy", "Black"],
        "Tiruvallur" => ["Red Sandy Loam", "Clay Loam", "Saline Coastal Alluvium"],
        "Tiruvannamalai" => ["Red Sandy Loam", "Clay Loam", "Saline Coastal Alluvium"],
        "Tiruvarur" => ["Red Loamy", "Alluvium"],
        "Vellore" => ["Red Sandy Loam", "Clay Loam", "Saline Coastal Alluvium"],
        "Viluppuram" => ["Red Sandy Loam", "Clay Loam", "Saline Coastal Alluvium"],
        "Virudhunagar" => ["Coastal Alluvium", "Black", "Red Sandy Soil", "Deep Red Soil"]
   
    
];

$selectedDistrict = '';
$soilTypes = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['district'])) {
    $selectedDistrict = $_POST['district'];
    
    // Validate input
    if (array_key_exists($selectedDistrict, $districts)) {
        $soilTypes = $districts[$selectedDistrict];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Agriculture in Tamil Nadu</title>
</head>
<body>
    <h1>Agriculture in Tamil Nadu</h1>

    <form method="post">
        <label for="district">Select District:</label>
        <select name="district" id="district">
            <option value="">--Select--</option>
            <?php foreach ($districts as $district => $types): ?>
                <option value="<?php echo htmlspecialchars($district); ?>" 
                    <?php echo ($selectedDistrict === $district) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($district); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Submit</button>
    </form>

    <?php if (!empty($soilTypes)): ?>
        <h2>Soil Types in <?php echo htmlspecialchars($selectedDistrict); ?></h2>
        <ul>
            <?php foreach ($soilTypes as $soil): ?>
                <li>
                    <a href="soil.php?soil=<?php echo urlencode($soil); ?>">
                        <?php echo htmlspecialchars($soil); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $selectedDistrict !== ''): ?>
        <p>No soil types found for the selected district.</p>
    <?php endif; ?>
</body>
</html>
