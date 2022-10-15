CREATE TABLE newEmployee (
  idnum varchar(255) NOT NULL,
  fname varchar(255) NOT NULL,
  lname varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  phone varchar(30) NOT NULL,
  job varchar(255) NOT NULL,
  salary varchar(255) NOT NULL,
  primary key (idnum)
);

INSERT into newEmployee(idnum, fname, lname, email, phone, job, salary)
VALUES
(1967, 'Super', 'Mario', 'nintendo@gmail.com', '7055551967', 'Plumber', 1000000),
(0033, 'Tyler', 'Elliott', 'yo@email.com', '7055552022', 'Student', 1000),
(20102, 'Mike', 'Tyson', 'box@hotmail.com', '7055551092', 'Professional Boxer', 5000000),
(93827, 'Steve', 'Austin', 'stonecold@gmail.com', '7055554484', 'Professional Wrestler', 4000000),
(37816, 'Bob', 'Builder', 'bob@email.ca', '7055554444', 'Construction Worker', 10000000);
