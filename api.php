<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "student_system";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $stmt = $conn->prepare("INSERT INTO students (student_id, firstname, middlename, lastname, course, enrolled_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss",
        $data["studentID"],
        $data["firstname"],
        $data["middlename"],
        $data["lastname"],
        $data["course"],
        $data["timestamp"]
    );

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
    $stmt->close();
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    $result = $conn->query("SELECT * FROM students ORDER BY enrolled_at DESC");
    $students = [];

    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    echo json_encode($students);
}

$conn->close();
?>