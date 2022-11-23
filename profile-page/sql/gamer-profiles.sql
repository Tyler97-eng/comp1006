# table with multiple different columns for creating a profile on a gaming forum
CREATE TABLE gamer_profiles (
  # profileNumber auto-increments as more profiles are created
  profileNumber INT auto_increment,
  profilePicture varchar(255) NOT NULL,
  username varchar(255) NOT NULL,
  fullName varchar(255),
  dateJoined DATE NOT NULL,
  email varchar(255) NOT NULL,
  bio varchar(1000),
  favouriteGame varchar(255),
  # primary key is the profileNumber (comparable to an id)
  primary key (profileNumber)
);

# inserting values for five example rows
INSERT into gamer_profiles(profilePicture, username, fullName, dateJoined, email, bio, favouriteGame)
VALUES
('Super Mario jumping', 'BigPlumberBoi', 'Mario Mario', CURDATE(), 'nintendo@gmail.com', 'I am a big plumber boi with big plumber problems.', 'Paper Mario: The Thousand Year Door'),
('Master Chief mask', 'KingGamer007', 'Adam Joel', CURDATE(), 'hello@gmail.com', 'Hello everyone. If you are a girl, DM me!', 'Halo 2'),
('Muscular Kratos edit', 'Coolguy123', 'Kratos', CURDATE(), 'playstation@boi.com', '...', 'God of War III'),
('Fortnite character', 'Ultimat3GamerBr0', 'Tommy Smith', CURDATE(), 'parentemail@hotmail.com', 'Helo., I lik gaems!! :)', 'Fortnite'),
('Big black cat', 'GrannyGaming', 'Sharon Mewes', CURDATE(), 'sharon.mewes@hotmail.com', 'Hello, everyone! I am really excited to be here and I hope to meet as many of you as I can!', 'Candy Crush');
