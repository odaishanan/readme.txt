class Student {
    private $conn;
    private $table_name = "students";

    public $id;
    public $name;
    public $age;
    public $class;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function create() {
       
public function create() {
    $query = "INSERT INTO " . $this->table_name . " (name, age, class) VALUES (?, ?, ?)";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->name);
    $stmt->bindParam(2, $this->age);
    $stmt->bindParam(3, $this->class);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

    }

    
    public function read() {
        // الحصول على كل الطلاب
public function read() {
    $query = "SELECT * FROM " . $this->table_name;

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $stmt;
}

    }

  
    public function delete() {
        // حذف طالب
public function delete() {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}


    
    public function update() {
        // التعديل على بيانات طالب
public function update() {
    $query = "UPDATE " . $this->table_name . " SET name = ?, age = ?, class = ? WHERE id = ?";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->name);
    $stmt->bindParam(2, $this->age);
    $stmt->bindParam(3, $this->class);
    $stmt->bindParam(4, $this->id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

    }
    }
}