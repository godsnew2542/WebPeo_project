-- database name airplane
CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  Email varchar(100) NOT NULL,
  password varchar(50) NOT NULL,
  Phone varchar(20) NOT NULL,
  id_card varchar(13) NOT NULL,
  PRIMARY key (id) 
)