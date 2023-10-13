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

  // More methods can be added as needed
}
