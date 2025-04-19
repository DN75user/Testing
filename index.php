<?php
$conn = new mysqli("localhost", "root", "root", "contact_form");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name, email, message, created_at FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма зв’язку</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Форма зв’язку</h1>
        <form id="contactForm" class="mb-4">
            <div class="mb-3">
                <label for="name" class="form-label">Ім’я</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Повідомлення</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Надіслати</button>
        </form>
        <div id="response" class="alert d-none"></div>
        
        <h2>Повідомлення</h2>
        <table class="table table-bordered" id="messagesTable">
            <thead>
                <tr>
                    <th>Ім'я</th>
                    <th>Email</th>
                    <th>Повідомлення</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["message"]) . "</td>";
                        echo "<td>" . $row["created_at"] . "</td>";
                        echo "</tr>";
                    }
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>