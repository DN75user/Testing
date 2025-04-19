<?php
ob_start();
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "contact_form");

if ($conn->connect_error) {
    ob_end_clean();
    echo json_encode(['status' => 'error', 'message' => 'Помилка підключення до бази даних']);
    exit;
}

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

if (!$name || !$email || !$message) {
    ob_end_clean();
    echo json_encode(['status' => 'error', 'message' => 'Усі поля обов’язкові']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
if (!$stmt) {
    ob_end_clean();
    echo json_encode(['status' => 'error', 'message' => 'Помилка підготовки запиту']);
    exit;
}

$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    ob_end_clean();
    echo json_encode([
        'status' => 'success',
        'message' => 'Повідомлення успішно надіслано!',
        'data' => [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s')
        ]
    ]);
} else {
    ob_end_clean();
    echo json_encode(['status' => 'error', 'message' => 'Помилка при збереженні повідомлення']);
}

$stmt->close();
$conn->close();
ob_end_flush();
?>