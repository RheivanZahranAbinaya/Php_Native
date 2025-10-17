<?php
require 'auth.php'; 
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $date = $_POST['date'] ?? '';
    $mood = $_POST['mood'] ?? '';
    $note = $_POST['note'] ?? '';
    $user_id = $_SESSION['user_id']; 

    
    if (!$date || !$mood) {
        die("Tanggal dan mood wajib diisi.");
    }

    
    $stmt = $conn->prepare("INSERT INTO mood_tracker14 (date, mood, note, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $date, $mood, $note, $user_id);

    if ($stmt->execute()) {
        echo "Mood berhasil disimpan! <a href='view.php'>Lihat Riwayat</a>";
    } else {
        echo "Gagal menyimpan mood: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    
    header("Location: index.php");
    exit;
}
