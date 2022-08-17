-- MySQL
CREATE TABLE BBE_Vendors (
	`index` INT AUTO_INCREMENT PRIMARY KEY ,
	business_name VARCHAR(45) NOT NULL, 
    logo VARCHAR(255) NOT NULL, 
    business_description VARCHAR(45) NOT NULL, 
    contact_name VARCHAR(45) NOT NULL, 
    email VARCHAR(45) NOT NULL, 
    business_phone VARCHAR(45) NOT NULL, 
    address VARCHAR(45) NOT NULL
);