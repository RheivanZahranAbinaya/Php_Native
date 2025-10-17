<?php
require 'auth.php'; // sesi login
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mood Harian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Catat Mood Hari Ini</h1>
    
    
    <div class="greeting-logout">
        🌸Halo, <?= htmlspecialchars($_SESSION['username']) ?>🌸
        <a class="logout-btn" href="logout.php">Logout</a>
    </div>


    <!-- Mood form -->
    <form method="POST" action="submit.php">
        <label for="date">Tanggal:</label>
        <input type="date" id="date" name="date" required>

        <label for="mood">Mood:</label>
        <select id="mood" name="mood" required>
            <option value="">-- Pilih Mood --</option>
            <option value="Happy">😊 Happy</option>
            <option value="Sad">😢 Sad</option>
            <option value="Excited">🤩 Excited</option>
            <option value="Tired">😴 Tired</option>
            <option value="Angry">😡 Angry</option>
        </select>

        <label for="note">Catatan (opsional):</label>
        <textarea id="note" name="note" rows="4" placeholder="Tulis sesuatu..."></textarea>

        <button type="submit">💾 Simpan Mood</button>
    </form>

    <!-- Riwayat button -->
    <a href="view.php" class="gradient-btnB">💖 Lihat Riwayat</a>

</body>
</html>
