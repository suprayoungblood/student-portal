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
    echo "UserID: ";
    var_dump($userId);

    $this->db->query("SELECT course.CourseName, course.Semester FROM course 
                          JOIN enrollment ON course.CourseID = enrollment.CourseID
                          WHERE enrollment.UserID = :userId");
    $this->db->bind(':userId', $userId);
    $result = $this->db->resultSet();

    // Dump the result
    echo "Query Result: ";
    var_dump($result);

    return $result;
  }
}
