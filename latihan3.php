<?php
function curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    
    // Error handling for cURL
    if ($output === false) {
        return json_encode(['error' => curl_error($ch)]);
    }
    
    curl_close($ch);
    return $output;
}

// Fetch data from the endpoint
$send = curl("http://localhost/rekayasawebg211220117/prak2/getwisata.php");
$data = json_decode($send, TRUE);

// Error handling for JSON decoding
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error decoding JSON: " . json_last_error_msg();
    exit;
}

// Start the table
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>ID WISATA</th>
        <th>KOTA</th>
        <th>LANDMARK</th>
        <th>TARIF</th>
      </tr>";

// Check if data is not empty
if (!empty($data)) {
    // Display data in table
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id_wisata"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["kota"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["landmark"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["tarif"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No data available</td></tr>";
}

// Close the table
echo "</table>";
?>