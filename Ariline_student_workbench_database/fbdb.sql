CREATE DATABASE work_bench_database;

USE work_bench_database;


CREATE TABLE `customer_table` (
  `customer_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `customer_type` enum('individual','business') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `booking_table` (
  `reservation_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `status` enum('booked','cancelled') DEFAULT NULL,
  CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer_table` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `payment_table` (
  `payment_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `method` enum('netbanking','creditcard','debitcard','cash') DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `invoice_no` int(11) DEFAULT NULL,
  CONSTRAINT `fk_reservation_id` FOREIGN KEY (`invoice_no`) REFERENCES `booking_table` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `air_craft_type_table` (
  `air_craft_type_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `air_craft_type_name` varchar(50) DEFAULT NULL,
  `seat_capacity` int(11) DEFAULT NULL,
  `manufacturer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `air_line_table` (
  `air_line_code` varchar(50) PRIMARY KEY,
  `air_line_name` varchar(150) DEFAULT NULL,
  `customer_service_phone` varchar(15) DEFAULT NULL,
  `head_quarters_address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `airport_table` (
 `airport_code` varchar(11) PRIMARY KEY,
  `airport_name` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `faciltiy_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `flight_table` (
  `flight_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `fight_no` varchar(50) DEFAULT NULL,
  `flght_date` date DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `departure_airport_code` varchar(50) DEFAULT NULL,
  `arrival_airport_code` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `air_craft_type_id` int(11) DEFAULT NULL,
  CONSTRAINT `fk_air_craft_type_id` FOREIGN KEY (`air_craft_type_id`) REFERENCES `air_craft_type_table` (`air_craft_type_id`),
  CONSTRAINT `fk_fight_no` FOREIGN KEY (`fight_no`) REFERENCES `air_line_table` (`air_line_code`),
  CONSTRAINT `fk_departure_airport_code` FOREIGN KEY (`departure_airport_code`) REFERENCES `airport_table` (`airport_code`),
  CONSTRAINT `fk_arrival_airport_code` FOREIGN KEY (`arrival_airport_code`) REFERENCES `airport_table` (`airport_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `booking_line_table` (
  `booking_line_id` int(11) PRIMARY KEY  AUTO_INCREMENT,
  `reservation_id` int(11) DEFAULT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `flight_date` datetime DEFAULT NULL,
  `seat_no` int(11) DEFAULT NULL,
  `class` enum('First Class','Business Class','Economy Class')  DEFAULT NULL,
  CONSTRAINT `fk_flight_no_` FOREIGN KEY (`flight_id`) REFERENCES `flight_table` (`flight_id`),
  CONSTRAINT `fk_reservation_id_` FOREIGN KEY (`reservation_id`) REFERENCES `booking_table` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `customer_table` (`customer_id`, `first_name`, `last_name`, `address`, `phone`, `birth_date`, `customer_type`) VALUES
(1, 'Michael', 'Hall', '7 Faunce Crescent HILLSTON NSW 2675', '0749008877', '1970-09-16', 'individual'),
(2, 'Bailey', 'Woodruff', '44 Davis Street MOUNT COOT-THA QLD 4066', '0739221427', '1985-10-25', 'business'),
(3, 'Sim', 'ruf', '1 Shirley Street EDENS LANDING QLD 4207', '0736888965', '1984-05-27', 'individual'),
(4, 'Chloe', 'Darker', '58 Horsington Street CAMBERWELL WEST VIC 3124', '0789950698', '1985-01-21', 'business'),
(5, 'Ben', 'Sheehan', '84 Whitehaven Crescent JAFFA QLD 4855', '0740867393', '1995-11-21', 'business');

INSERT INTO `booking_table` (`reservation_id`, `customer_id`, `booking_date`, `total_price`, `status`) VALUES
(1, 1, '2020-12-01', 256, 'booked'),
(2, 1, '2020-12-03', 123, 'booked'),
(3, 2, '2020-12-04', 245, 'booked'),
(4, 2, '2020-12-07', 248, 'booked'),
(5, 3, '2020-12-08', 300, 'booked'),
(6, 3, '2020-12-11', 150, 'booked'),
(7, 4, '2020-12-12', 120, 'booked'),
(8, 4, '2020-12-15', 255, 'booked'),
(9, 5, '2020-12-16', 154, 'booked'),
(10, 5, '2020-12-19', 178, 'booked'),
(11, 1, '2020-12-20', 256, 'cancelled'),
(12, 1, '2020-12-23', 248, 'cancelled'),
(13, 2, '2020-12-24', 123, 'booked'),
(14, 2, '2020-12-27', 123, 'booked');

INSERT INTO `payment_table` (`payment_id`, `method`, `amount`, `payment_date`, `invoice_no`) VALUES
(1, 'netbanking', 256, '2021-09-01', 1),
(2, 'netbanking', 123, '2021-09-03', 2),
(3, 'creditcard', 245, '2021-09-04', 3),
(4, 'creditcard', 248, '2021-09-07', 4),
(5, 'netbanking', 300, '2021-09-08', 5),
(6, 'netbanking', 150, '2021-09-11', 6),
(7, 'creditcard', 120, '2021-09-12', 7),
(8, 'creditcard', 255, '2021-09-15', 8),
(9, 'netbanking', 154, '2021-09-16', 9),
(10, 'netbanking', 178, '2021-09-19', 10),
(11, 'creditcard', 245, '2021-09-20', 11),
(12, 'creditcard', 248, '2021-09-23', 12),
(13, 'creditcard', 124, '2021-09-24', 13),
(14, 'creditcard', 124, '2021-09-27', 14);

INSERT INTO `air_craft_type_table` (`air_craft_type_id`, `air_craft_type_name`, `seat_capacity`, `manufacturer`) VALUES
(1, 'Aerochute Dual, Aerochute HummerChute', 200, 'Aerochute Industries Pty Ltd'),
(2, 'Air Cruiser 210 CS', 210, 'AirBorne Windsports Pty Ltd'),
(3, 'Air Tourer 100', 220, 'Air Tourer Cooperative Ltd');

INSERT INTO `air_line_table` (`air_line_code`, `air_line_name`, `customer_service_phone`, `head_quarters_address`) VALUES
('1QA', 'Qantas', '61296913636', 'headquartered in the Shire of Winton in Central West Queensland, Australia '),
('2JE', 'Jetstar Airways', '131538', 'PO Box 4713, Melbourne, Victoria Australia 03001'),
('3AN', 'Air North', '89204001', 'Darwin International Airport in Marrara, Darwin, Northern Territory, Australia');

INSERT INTO `airport_table` (`airport_code`, `airport_name`, `city`, `faciltiy_description`) VALUES
('YBBN', 'Brisbane International Airport', 'Brisbane', 'Very large airport with great facility'),
('YBRK', 'Rockhampton Airport', 'Rockhampton', 'very cleaning airport with good environment. '),
('YSSY', 'Sydney Airport', 'Sydney', 'high security feature and also great faculty to help');

INSERT INTO `flight_table` (`flight_id`, `fight_no`, `flght_date`, `departure_time`, `arrival_time`, `departure_airport_code`, `arrival_airport_code`, `price`, `air_craft_type_id`) VALUES
(1, '1QA', '2021-09-01', '05:13:28', '12:00:22', 'YBBN', 'YBRK', 1256, 1),
(2, '1QA', '2021-09-03', '11:06:01', '22:06:01', 'YBRK', 'YSSY', 4521, 1),
(3, '1QA', '2021-09-04', '08:29:13', '16:29:06', 'YSSY', 'YBBN', 2351, 1),
(4, '2JE', '2021-09-07', '22:27:07', '35:10:07', 'YBBN', 'YBRK', 1234, 2),
(5, '2JE', '2021-09-08', '19:21:02', '24:10:02', 'YBRK', 'YSSY', 4568, 2),
(6, '2JE', '2021-09-11', '04:29:13', '12:29:06', 'YSSY', 'YBBN', 2351, 2),
(7, '3AN', '2021-09-14', '04:27:07', '08:10:07', 'YBBN', 'YBRK', 1234, 3),
(8, '3AN', '2021-09-15', '12:21:02', '17:10:02', 'YBRK', 'YSSY', 4568, 3),
(9, '3AN', '2021-09-16', '08:29:13', '11:29:06', 'YSSY', 'YBBN', 2351, 3),
(10, '1QA', '2021-09-19', '05:13:28', '12:00:22', 'YBBN', 'YBRK', 1256, 1),
(11, '1QA', '2021-09-24', '07:06:01', '15:28:01', 'YBRK', 'YSSY', 4521, 1),
(12, '1QA', '2021-09-27', '06:29:13', '12:29:06', 'YSSY', 'YBBN', 2351, 1);

INSERT INTO `booking_line_table` (`booking_line_id`, `reservation_id`, `flight_id`, `flight_date`, `seat_no`, `class`) VALUES
(1, 1, 1, '2021-09-01 05:13:28', 123, 'First Class'),
(2, 2, 2, '2021-09-03 22:06:01', 140, 'Business Class'),
(3, 3, 3, '2021-09-04 08:29:13', 150, 'Economy Class'),
(4, 4, 4, '2021-09-07 22:27:07', 11, 'Economy Class'),
(5, 5, 5, '2021-09-08 19:21:02', 123, 'First Class'),
(6, 6, 6, '2021-09-11 04:29:13', 65, 'Business Class'),
(7, 7, 7, '2021-09-14 04:27:07', 15, 'Economy Class'),
(8, 8, 8, '2021-09-15 12:21:02', 11, 'Economy Class'),
(9, 9, 9, '2021-09-16 08:29:13', 23, 'First Class'),
(10, 10, 10, '2021-09-19 05:13:28', 56, 'Business Class'),
(11, 13, 11, '2021-09-24 07:06:01', 70, 'Economy Class'),
(12, 14, 12, '2021-09-27 06:29:13', 85, 'Economy Class');

CREATE INDEX index_customer_last_name ON customer_table(last_name);
CREATE INDEX index_flight_no ON flight_table(fight_no);