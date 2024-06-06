-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 06, 2024 at 12:45 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contracts`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `account_no` varchar(26) DEFAULT NULL,
  `nip` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `account_no`, `nip`) VALUES
(1, 'Firma ABC', '55109024021873189817157315', '1112485256'),
(2, 'Z recyckling', '17109024027564438166178895', '3413266254'),
(3, 'XYZ ', '84109024028135722648925943', '5329155435'),
(4, 'Nowa Ziemia', '05109024022985772199193763', '3791673121'),
(5, 'Anna Kowalska', '07109024028327868932645331', '8237725286');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nip` varchar(40) DEFAULT NULL,
  `amount` decimal(6,1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `name`, `nip`, `amount`) VALUES
(1, 'Firma ABC', '1112485256', 6.0),
(2, 'Z recyckling', '3413266254', 5.0),
(3, 'XYZ ', '5329155435', 2.0),
(4, 'Nowa Ziemia', '3791673121', 5000.0),
(5, 'Anna Kowalska', '8237725286', 1000.0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` int(6) DEFAULT NULL,
  `number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `issue_date` datetime DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `gross_sum` decimal(7,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `payment_id`, `number`, `issue_date`, `payment_date`, `gross_sum`) VALUES
(1, 1, '90850394809', '2024-05-02 10:55:00', '2024-06-02 10:55:00', 12000.00),
(2, 2, '90850394809', '2024-05-02 10:55:00', '2024-06-02 10:55:00', 9000.00),
(3, 3, '90850394809', '2024-06-02 10:55:00', '2024-07-02 10:55:00', 16000.00),
(4, 4, '90850394809', '2024-06-02 10:55:00', '2024-07-02 10:55:00', 800.00),
(5, 5, '90850394809', '2024-05-25 10:55:00', '2024-06-25 10:55:00', 1000.00),
(6, 6, '90850394809', '2024-05-20 10:55:00', '2024-06-20 10:55:00', 3200.00),
(7, 7, '90850394809', '2024-06-03 10:55:00', '2024-07-02 10:55:00', 2000.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invoices_details`
--

CREATE TABLE `invoices_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(6) DEFAULT NULL,
  `product` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `quantity` decimal(6,1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci;

--
-- Dumping data for table `invoices_details`
--

INSERT INTO `invoices_details` (`id`, `invoice_id`, `product`, `price`, `payment_date`, `quantity`) VALUES
(1, 1, 'zeszyt', 8.00, NULL, 5.0),
(2, 1, 'ołówek', 12.00, NULL, 10.0),
(3, 1, 'dlugopis', 15.00, NULL, 19.0),
(4, 2, 'notanik', 25.00, NULL, 1.0),
(5, 3, 'kalendarz', 47.00, NULL, 2.0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(6) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `paid` decimal(7,2) DEFAULT NULL,
  `payment_date` varchar(15) DEFAULT NULL,
  `account_no` varchar(26) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `client_id`, `title`, `paid`, `payment_date`, `account_no`) VALUES
(1, 1, 'wpłata A', 15000.00, '2024-06-02', '26109024027961426972496235'),
(2, 1, 'wpłata Z', 2300.00, '2024-06-04', '05109024021456613743237942'),
(3, 2, 'wpłata A', 100.00, '2024-06-05', '24109024027652284356459849'),
(4, 3, 'wpłata X', 1300.00, '2024-06-05', NULL),
(5, 3, 'wpłata Z', 2500.00, '2024-06-05', NULL),
(6, 4, 'wpłata Z', 2300.00, '2024-06-04', NULL),
(7, 4, 'wpłata A', 80.00, '2024-06-05', NULL),
(8, 5, 'wpłata X', 1300.00, '2024-06-05', NULL),
(9, 5, 'wpłata Z', 2500.00, '2024-06-05', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `invoices_details`
--
ALTER TABLE `invoices_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices_details`
--
ALTER TABLE `invoices_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
