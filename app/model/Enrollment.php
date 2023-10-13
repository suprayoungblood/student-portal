<?php
class Enrollment
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Register student for a course
  public function register($userID, $courseID)
  {
    $this->db->query('INSERT INTO enrollment (UserID, CourseID) VALUES(:userID, :courseID)');
    $this->db->bind(':userID', $userID);
    $this->db->bind(':courseID', $courseID);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Get courses a student is registered for
  public function getCoursesByStudent($userID)
  {
    $this->db->query('SELECT course.CourseName, course.Semester FROM course JOIN enrollment ON course.CourseID = enrollment.CourseID WHERE enrollment.UserID = :userID');
    $this->db->bind(':userID', $userID);
    return $this->db->resultSet();
  }

  // Unregister student from a course
  public function unregister($userID, $courseID)
  {
    $this->db->query('DELETE FROM enrollment WHERE UserID = :userID AND CourseID = :courseID');
    $this->db->bind(':userID', $userID);
    $this->db->bind(':courseID', $courseID);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
