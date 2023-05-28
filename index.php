require 'config/Database.php';
require 'models/Student.php';
require 'controllers/StudentsController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ($uri[1] !== 'students') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$studentId = null;
if (isset($uri[2])) {
    $studentId = (int) $uri[2];
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

// إعداد قاعدة البيانات
$database = new Database();
$db = $database->getConnection();

// إعداد متحكم الطلاب
$controller = new StudentsController($db, $requestMethod, $studentId);
$controller->processRequest();
