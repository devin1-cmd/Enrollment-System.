


/* Enter your sql queries here 

-- Create the database (optional kung meron ka nang database)
CREATE DATABASE IF NOT EXISTS student_system;
USE student_system;

-- Create the students table
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(50) NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    middlename VARCHAR(100),
    lastname VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL,
    enrolled_at DATETIME NOT NULL
);
