class StudentsController {
    private $db;
    private $requestMethod;
    private $studentId;

    private $student;

    public function __construct($db, $requestMethod, $studentId) {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->studentId = $studentId;

        $this->student = new Student($db);
    }

    public function processRequest() {
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->studentId) {
                    $response = $this->getStudent($this->studentId);
                } else {
                    $response = $this->getAllStudents();
                }
                break;
            case 'POST':
                $response = $this->createStudent();
                break;
            case 'PUT':
                $response = $this->updateStudent($this->studentId);
                break;
            case 'DELETE':
                $response = $this->deleteStudent($this->studentId);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    // تنفيذ الوظائف المطلوبة للطلاب
}
