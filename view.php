<?php
require 'auth.php'; 
require 'db.php';

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM mood_tracker14 WHERE user_id = ? ORDER BY date DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$data = $stmt->get_result();
?>

<?php
require 'db.php';

$result = $conn->query("SELECT * FROM mood_tracker14 ORDER BY date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Mood</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Riwayat Mood Harian</h1>
    <a href="index.php">Kembali</a>
    <table border="1" cellpadding="10">
        <?php while ($row = $data->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['date']) ?></td>
            <td><?= htmlspecialchars($row['mood']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['note'])) ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
        <?php endwhile; ?>

        <tr>
            <th>Tanggal</th>
            <th>Mood</th>
            <th>Catatan</th>
            <th>Waktu Input</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['date']) ?></td>
            <td><?= htmlspecialchars($row['mood']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['note'])) ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
