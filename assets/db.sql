CREATE TABLE sepatu(
	id_sepatu int AUTO_INCREMENT PRIMARY KEY,
    nama_sepatu VARCHAR(255),
    harga decimal(10,2),
    rating int,
    deskripsi varchar(255),
    cover varchar(50)
);

CREATE TABLE baju(
	id_baju int AUTO_INCREMENT PRIMARY KEY,
    nama_baju VARCHAR(255),
    harga decimal(10,2),
    rating int,
    deskripsi varchar(255),
    cover varchar(50)
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)