# admins table stores admin login data
CREATE TABLE admins(
	admin_id INT unsigned NOT NULL auto_increment,
	fullName varchar(255) NOT NULL,
	email varchar(255) NOT NULL UNIQUE,
	username varchar(255) NOT NULL,
	pword varchar(255) NOT NULL,
    primary key (admin_id)
);

# table with multiple different columns for creating a fan profile on M-See-You
CREATE TABLE fan_profiles (
  # profileId auto-increments as more profiles are created
  profileId INT unsigned auto_increment,
  username varchar(255) NOT NULL UNIQUE,
  fullName varchar(255) NULL,
  dateJoined DATE NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  bio varchar(500) NULL,
  favouriteFilm varchar(255) NOT NULL,
  favouriteCharacter varchar(255) NOT NULL,
  # primary key is the profileId
  primary key (profileId)
);

# inserting values for five example rows
INSERT into fan_profiles(username, fullName, dateJoined, email, bio, favouriteFilm, favouriteCharacter)
VALUES
('Dr. Gloom', 'Karl Smith', CURDATE(), 'marvel101@gmail.com', 'I am Dark Matter Omnipotent.', 'Fantastic Four: Rise of the Silver Surfer', 'Dr. Doom'),
('Marvel Momma', 'Sherri Yim', CURDATE(), 'yimyim911@gmail.com', 'I am the biggest Marvel fan this side of Texas!', 'The Avengers', 'Captain America'),
('Big Papa Pump', 'Scott Steiner', CURDATE(), 'geneticfreak@email.com', 'All you other peasant fans are below me! Get on my level!', 'The Incredible Hulk', 'The Hulk'),
('Iron Man 3000', 'Tommy Oliver', CURDATE(), 'mcuseeyou@hotmail.com', 'Love you all 3000...', 'Iron Man', 'Iron Man'),
('LokiLover99', 'Karen Jones', CURDATE(), 'lokilove@hotmail.com', 'Loki Season 2 when??', 'Thor: Ragnarok', 'Loki');

# table to hold forum posts
CREATE TABLE fan_post (
	profileId INT unsigned,
    username varchar(255) NOT NULL UNIQUE,
    post varchar(1000),
    datePosted DATE NOT NULL,
    primary key (profileId)
);

# inserting values for five forum posts
INSERT INTO fan_post(profileId, username, post, datePosted)
VALUES
(1, 'Dr. Gloom', 'Dr. Doom should have his own Disney+ series. Augue eget arcu dictum varius duis at consectetur lorem. Iaculis urna id volutpat lacus laoreet non curabitur gravida. Vitae semper quis lectus nulla at volutpat diam ut venenatis.', CURDATE()),
(2, 'Marvel Momma', 'Does anyone know of any Texan Marvel characters?? Augue eget arcu dictum varius duis at consectetur lorem. Iaculis urna id volutpat lacus laoreet non curabitur gravida. Vitae semper quis lectus nulla at volutpat diam ut venenatis.', CURDATE()),
(3, 'Big Papa Pump', 'Hulk is the strongest guy on the MCU roster. Augue eget arcu dictum varius duis at consectetur lorem. Iaculis urna id volutpat lacus laoreet non curabitur gravida. Vitae semper quis lectus nulla at volutpat diam ut venenatis.', CURDATE()),
(4, 'Iron Man 3000', 'Does anyone think an Iron Man 4 can happen? Augue eget arcu dictum varius duis at consectetur lorem. Iaculis urna id volutpat lacus laoreet non curabitur gravida. Vitae semper quis lectus nulla at volutpat diam ut venenatis.', CURDATE()),
(5, 'LokiLover99', 'What are we thinking will happen in Loki season 2? Augue eget arcu dictum varius duis at consectetur lorem. Iaculis urna id volutpat lacus laoreet non curabitur gravida. Vitae semper quis lectus nulla at volutpat diam ut venenatis.', CURDATE());
