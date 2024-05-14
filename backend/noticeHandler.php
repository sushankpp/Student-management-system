<?php
include 'dbConnect.php';

class NoticeHandler
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function handleRequest()
    {
        header('Content-Type: application/json', true, 200);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                $action = $_POST['action'];
                switch ($action) {
                    case 'sendDataToDb':
                        $this->sendDataToDb();
                        break;
                    case 'getNotice':
                        $this->getNotice();
                        break;
                }
            }
        }
    }

    private function sendDataToDb()
    {
        $title = trim($_POST['title']);
        $content = $_POST['body'];

        $sql = "INSERT INTO notice (BodyText, Title) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);

        $stmt->bind_param('ss', $content, $title);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Notice posted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($this->db)]);
        }
    }

    private function getNotice()
    {
        $sql = "SELECT * FROM notice ORDER BY DateTime desc";
        $res = $this->db->query($sql);

        $notices = [];
        while ($row = $res->fetch_assoc()) {
            $notices[] = $row;
        }

        echo json_encode([
            'success' => true,
            'message' => 'Notices retrieved successfully',
            'notices' => $notices,
        ]);
    }
}

$db = db_connect();

// Instantiate NoticeHandler
$noticeHandler = new NoticeHandler($db);

// Handle request
$noticeHandler->handleRequest();

?>