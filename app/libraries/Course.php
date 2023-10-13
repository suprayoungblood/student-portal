<?php
class Course
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getCoursesByStudent($userId)
  {
    $this->db->query('SELECT * FROM course INNER JOIN enrollment ON course.CourseID = enrollment.CourseID WHERE enrollment.UserID = :userId');
    $this->db->bind(':userId', $userId);
    return $this->db->resultSet();
  }
}
