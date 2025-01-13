-- Create the users table
CREATE TABLE users (
                       userID int AUTO_INCREMENT PRIMARY KEY,
                       firstName varchar(255) NOT NULL,
                       lastName varchar(255) NOT NULL,
                       email varchar(255) NOT NULL,
                       password varchar(255) NOT NULL,
                       phoneNumber varchar(255) NOT NULL,
                       role varchar(50) NOT NULL,
                       status ENUM('active', 'On hold', 'deactivate') NOT NULL
);

-- Create the categorys table
CREATE TABLE categorys (
                           categoryID int AUTO_INCREMENT PRIMARY KEY,
                           categoryName varchar(255) NOT NULL,
                           status ENUM('active', 'deactivate') NOT NULL
);

-- Create the courses table
CREATE TABLE courses (
                         courseID int AUTO_INCREMENT PRIMARY KEY,
                         title varchar(255) NOT NULL,
                         description varchar(255) NOT NULL,
                         content varchar(255) NOT NULL,
                         currentDate date NOT NULL,
                         status ENUM('active', 'On hold', 'deactivate') NOT NULL,
                         categoryID int,
                         FOREIGN KEY (categoryID) REFERENCES categorys(categoryID)
);

-- Create the tags table
CREATE TABLE tags (
                      tagID int AUTO_INCREMENT PRIMARY KEY,
                      tagName varchar(255) NOT NULL,
                      status ENUM('active', 'deactivate') NOT NULL
);

-- Create the course_tags junction table
CREATE TABLE course_tags (
                             tagID int,
                             courseID int,
                             PRIMARY KEY (tagID, courseID),
                             FOREIGN KEY (tagID) REFERENCES tags(tagID),
                             FOREIGN KEY (courseID) REFERENCES courses(courseID)
);

-- Create the enrollment table
CREATE TABLE enrollment (
                            enrollmentID int AUTO_INCREMENT PRIMARY KEY,
                            enrollmentDate date NOT NULL,
                            userID int,
                            courseID int,
                            FOREIGN KEY (userID) REFERENCES users(userID),
                            FOREIGN KEY (courseID) REFERENCES courses(courseID)
);
