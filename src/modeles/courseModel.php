<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\course;


class courseModel {
    private $db;
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function courseAdd(course $obj, $id){
    }
    public function course_tags($tagID, $courseID){
        try{
            $query = "INSERT INTO course_tags (tagID , courseID) values (?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$tagID, $courseID]);
        return true;
        }catch(exeption $e){
            return false;
        }
    }

    public function courseDelete($id){
        $query = "UPDATE courses set status = 'deactivate' where courseID =$id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }


    public function courseUpdate($id, $title, $desc){
        $query = "UPDATE courses SET title = :title, description = :desc WHERE courseID = :courseID";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':courseID', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


    public function courseListTeacher($id){
        $query = "SELECT * FROM courses where status = 'active' and teacherID = $id";
        $stmt = $this->db->query($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function courseList($id){
        $sql = "SELECT 
            c.courseID, 
            c.title, 
            c.description, 
            c.status, 
            c.categoryID, 
            c.content, 
            c.contentType, 
            c.teacherID, 
            GROUP_CONCAT(DISTINCT t.tagName) AS tags, 
            ca.categoryName, 
            u.firstName, 
            u.lastName
        FROM 
            courses c
        INNER JOIN 
            course_tags ct ON c.courseID = ct.courseID
        INNER JOIN 
            tags t ON ct.tagID = t.tagID
        INNER JOIN 
            categorys ca ON c.categoryID = ca.categoryID
        INNER JOIN 
            users u ON c.teacherID = u.userID
        WHERE 
            c.status = 'active' 
            AND ca.status = 'active' 
            AND c.teacherID = :id
        GROUP BY 
            c.courseID;
    ";
     $stmt = $this->db->prepare($sql);

     $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();


     return $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    }

public function allCourseList(){
    $sql = "SELECT 
        c.courseID, 
        c.title, 
        c.description, 
        c.status, 
        c.categoryID, 
        c.content, 
        c.contentType, 
        c.teacherID, 
        GROUP_CONCAT(DISTINCT t.tagName) AS tags, 
        ca.categoryName, 
        u.firstName, 
        u.lastName
    FROM 
        courses c
    INNER JOIN 
        course_tags ct ON c.courseID = ct.courseID
    INNER JOIN 
        tags t ON ct.tagID = t.tagID
    INNER JOIN 
        categorys ca ON c.categoryID = ca.categoryID
    INNER JOIN 
        users u ON c.teacherID = u.userID
    WHERE 
        c.status = 'active' 
        AND ca.status = 'active' 
    GROUP BY 
        c.courseID;
";

    $stmt = $this->db->prepare($sql);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
    }

    public function totalCourses(){
        $query = "SELECT count(*) from courses where status = 'active'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function myCourses($userId){
        $query = "SELECT 
    *
    FROM
        enrollment
    INNER JOIN
        courses ON enrollment.courseID = courses.courseID
    INNER JOIN
        users ON enrollment.userID = users.userID
    WHERE
    courses.status = 'active' 
    AND users.userID = $userId;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSlice($limit ,$offset){
        $sql = "
        SELECT 
            c.courseID, 
            c.title, 
            c.description, 
            c.status, 
            c.categoryID, 
            c.content, 
            c.contentType, 
            c.teacherID, 
            GROUP_CONCAT(DISTINCT t.tagName) AS tags, 
            ca.categoryName, 
            u.firstName, 
            u.lastName
        FROM 
            courses c
        INNER JOIN 
            course_tags ct ON c.courseID = ct.courseID
        INNER JOIN 
            tags t ON ct.tagID = t.tagID
        INNER JOIN 
            categorys ca ON c.categoryID = ca.categoryID
        INNER JOIN 
            users u ON c.teacherID = u.userID
        WHERE 
            c.status = 'active' 
            AND ca.status = 'active'
        GROUP BY 
            c.courseID
        LIMIT :limit OFFSET :offset;
    ";
    
    $stmt = $this->db->prepare($sql);
    
    // Bind parameters
    $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue('offset', $offset, PDO::PARAM_INT);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch results
    return  $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    public function recherche($motCle ,$limit ,$offset)
    {
        $sql =  "
        SELECT 
            c.courseID, 
            c.title, 
            c.description, 
            c.status, 
            c.categoryID, 
            c.content, 
            c.contentType, 
            c.teacherID, 
            GROUP_CONCAT(DISTINCT t.tagName) AS tags, 
            ca.categoryName, 
            u.firstName, 
            u.lastName
        FROM 
            courses c
        INNER JOIN 
            course_tags ct ON c.courseID = ct.courseID
        INNER JOIN 
            tags t ON ct.tagID = t.tagID
        INNER JOIN 
            categorys ca ON c.categoryID = ca.categoryID
        INNER JOIN 
            users u ON c.teacherID = u.userID
        WHERE 
            c.status = 'active' 
            AND ca.status = 'active'
            and title  
            LIKE :mot_cle OR description LIKE :mot_cle 
        GROUP BY 
            c.courseID
        ORDER BY title DESC limit $limit offset $offset  ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('offset',$offset,PDO::PARAM_INT);

        $stmt->execute(['mot_cle' => '%' . $motCle . '%']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function topCourse(){
        $query ="SELECT 
    c.courseID, 
    c.title, 
    COUNT(e.enrollmentID) AS enrollment_count
FROM 
    courses c
JOIN 
    enrollment e ON c.courseID = e.courseID
GROUP BY 
    c.courseID
ORDER BY 
    enrollment_count DESC
LIMIT 1        dd($courses);
;";
$stmt = $this->db->prepare($query);
$stmt->execute();
return $stmt->fetch();
    }
}
