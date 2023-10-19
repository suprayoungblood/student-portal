<?php
class Course
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Get all courses
  public function getAllCourses()
  {
    $this->db->query("SELECT * FROM course");
    return $this->db->resultSet();
  } 

  public function isUserRegistered($userId, $courseId)
  {
    $this->db->query("SELECT * FROM enrollment WHERE UserID = :userId AND CourseID = :courseId");
    $this->db->bind(':userId', $userId);
    $this->db->bind(':courseId', $courseId);
    $row = $this->db->single();
    return $row ? true : false;
  }

  public function hasAvailableSeats($courseId)
  {
    $this->db->query("SELECT * FROM course WHERE CourseID = :courseId AND EnrollmentCount < EnrollmentLimit");
    $this->db->bind(':courseId', $courseId);
    $row = $this->db->single();
    return $row ? true : false;
  }

  public function registerUser($userId, $courseId)
  {
    $this->db->query("INSERT INTO enrollment (UserID, CourseID) VALUES (:userId, :courseId)");
    $this->db->bind(':userId', $userId);
    $this->db->bind(':courseId', $courseId);
    return $this->db->execute();
  }

  public function incrementEnrollmentCount($courseId)
  {
    $this->db->query("UPDATE course SET EnrollmentCount = EnrollmentCount + 1 WHERE CourseID = :courseId");
    $this->db->bind(':courseId', $courseId);
    return $this->db->execute();
  }

  public function getEnrolledCoursesByUserId($userId)
  {
    // Dump userId value
    //echo "UserID: ";
    //var_dump($userId);

    try {
      $sql = "SELECT course.CourseName, course.Semester FROM course 
                  JOIN enrollment ON course.CourseID = enrollment.CourseID
                  WHERE enrollment.UserID = :userId";
      $this->db->query($sql);
      $this->db->bind(':userId', $userId);
      $result = $this->db->resultSet();

      // Dump the result
      //echo "Query Result: ";
      //var_dump($result);

      return $result;
    } catch (Exception $e) {
      die("Database Error: " . $e->getMessage());
    }
  }

  public function getUserCourses($userId)
  {
    $this->db->query("SELECT * FROM user_course WHERE user_id= :userId");
    $this->db->bind(':userId', $userId);
    return $this->db->resultSet();
  }

  public function usercourseSave($data)
  {
    $this->db->query("INSERT INTO user_course (user_id,course_name, description) VALUES (:user_id, :course_name, :description)");
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':course_name', $data['course_name']);
    $this->db->bind(':description', $data['description']); 
    return $this->db->execute();
  }

  public function deleteCourse($id)
  {
      $this->db->query('DELETE FROM user_course WHERE id = :id');
      $this->db->bind(':id', $id);

      if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
  }





  
  public function getClassCourses($userId)
  {
    $this->db->query("SELECT * FROM class_register WHERE user_id= :userId");
    $this->db->bind(':userId', $userId);
    return $this->db->resultSet();
  }

  public function userclassSave($data)
  {
    $this->db->query("INSERT INTO class_register (user_id,course_name, date) VALUES (:user_id, :course_name, :date)");
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':course_name', $data['course_name']);
    $this->db->bind(':date', $data['date']); 
    return $this->db->execute();
  }

  public function deleteClass($id)
  {
      $this->db->query('DELETE FROM class_register WHERE id = :id');
      $this->db->bind(':id', $id);

      if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
  }




}