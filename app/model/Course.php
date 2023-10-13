<?php
class Course
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Get All Courses
  public function getAllCourses()
  {
    $this->db->query('SELECT * FROM course');
    return $this->db->resultSet();
  }

  // Get Course by ID
  public function getCourseById($id)
  {
    $this->db->query('SELECT * FROM course WHERE CourseID = :id');
    $this->db->bind(':id', $id);
    return $this->db->single();
  }
}
