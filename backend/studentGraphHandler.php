<?php
include 'dbConnect.php';



class StudentGraphHandler
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
                    case 'showResult':
                        $this->showResult();
                        break;
                }
            }
        }
    }

    private function showResult()
    {
        $sql = "SELECT * FROM student";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(['success' => true, 'data' => $data]);
    }
}

$db = db_connect();

// Instantiate StudentGraphHandler
$studentGraphHandler = new StudentGraphHandler($db);

// Handle request
$studentGraphHandler->handleRequest();

?>