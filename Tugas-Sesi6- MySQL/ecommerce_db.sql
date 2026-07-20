-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.46 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ecommerce_db
CREATE DATABASE IF NOT EXISTS `ecommerce_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ecommerce_db`;

-- Dumping structure for table ecommerce_db.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ecommerce_db.orders: ~2 rows (approximately)
INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `total`) VALUES
	(1, 1, 1, 1, 9000000.00),
	(2, 2, 2, 2, 500000.00);

   -- READ
SELECT * FROM orders;

-- UPDATE
UPDATE orders
SET product_id = 1
WHERE id = 1;

-- DELETE
DELETE FROM orders
WHERE id = 1;


-- Dumping structure for table ecommerce_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text,
  `stok` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ecommerce_db.products: ~2 rows (approximately)
INSERT INTO `products` (`id`, `nama_produk`, `harga`, `deskripsi`, `stok`) VALUES
	(1, 'Laptop ASUS', 9000000.00, 'Laptop ASUS Core i5', 10),
	(2, 'Mouse Logitech', 250000.00, 'Mouse Wireless', 30);

  -- READ
SELECT * FROM products;

-- UPDATE
UPDATE products
SET harga = 9000000
WHERE id = 1;

-- DELETE
DELETE FROM products
WHERE id = 3;
-- Dumping structure for table ecommerce_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ecommerce_db.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
	(1, 'Angga', 'angga@gmail.com', '123456'),
	(2, 'Budi', 'budi@gmail.com', 'abcdef');


 -- READ
SELECT * FROM users;

-- UPDATE
UPDATE users
SET nama = Angga Hermawan
WHERE id = 1;

-- DELETE
DELETE FROM users
WHERE id = 2;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
