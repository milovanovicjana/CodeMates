-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2022 at 09:42 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mixology_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IdUser`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `cocktail`
--

DROP TABLE IF EXISTS `cocktail`;
CREATE TABLE IF NOT EXISTS `cocktail` (
  `IdCocktail` int(11) NOT NULL AUTO_INCREMENT,
  `CocktailName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `AvgGrade` float NOT NULL,
  `Recipes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Image` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float DEFAULT NULL,
  `Alcoholic` tinyint(4) NOT NULL,
  `Approved` tinyint(4) NOT NULL,
  `Description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdCocktail`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cocktail`
--

INSERT INTO `cocktail` (`IdCocktail`, `CocktailName`, `AvgGrade`, `Recipes`, `Image`, `Price`, `Alcoholic`, `Approved`, `Description`) VALUES
(1, 'Tequila Sunrise', 4.5, '0', 'Tequila Sunrise_1.jpeg', 8, 1, 1, 'Master the art of a classic tequila sunrise, with grenadine, tequila, orange juice. It\'s the perfect recipe to get your party started.'),
(2, 'Hugo', 5, '0', 'Hugo_2.png', 9, 1, 0, 'Refreshing, floral and herbal, the hugo cocktail is perfect for warm summer evenings. Make this simple spritz with prosecco.'),
(3, 'Paloma', 0, '0', 'Paloma_3.png', 7, 1, 0, 'Tequila, grapefruit and lime juice give this cocktail a real kick. Garnish the rim of your glass with salt and a wedge of grapefruit for extra punch'),
(4, 'Limoncello', 3.5, '0', 'Limoncello_4.png', 9, 1, 0, 'Make up a batch of this boozy lemony drink - it\'s great as a homemade gift or poured over ice cream'),
(5, 'Wine Cooler', 0, '0', 'Wine Cooler_5.jpg', 10, 1, 1, 'Treat yourself to a wine cooler cocktail, a lighter, sparkling alternative to regular wine'),
(6, 'Mai Tai', 5, '0', 'Mai Tai_6.png', 8, 1, 1, 'Treat yourself to a mai tai cocktail, with the flavours of rum and orange. This recipe serves one, but it\'s easily multiplied for a party'),
(7, 'Bahama Mama', 2.5, '0', 'Bahama Mama_7.png', 7, 1, 1, 'Bahama Mama Cocktail is overflowing with tropical flavor that will have you dreaming of sunshine, summertime, and your favorite beach! Made with dark rum, coffee flavored liqueurs and pineapple juice!'),
(8, 'Cuba Libre', 4.4, '0', 'Cuba Libre_8.jpg', 8, 1, 1, 'A classic Cuban cocktail of rum, cola, lime and ice. Pour into a tall glass for the ultimate refreshing long cocktail'),
(9, 'Bird of Paradise', 0, '0', 'Bird of Paradise_9.png', 8, 1, 1, 'If you are hosting a tropical party or just looking forward to enjoying cocktails while watching the sunset, this fruity rum cocktail is just what you are looking for!'),
(10, 'Long Island Ice Tea', 0, '0', 'Long Island Ice Tea_10.png', 10, 1, 1, 'Mix a jug of this classic cocktail for a summer party. It\'s made with equal parts of vodka, gin, tequila, rum and triple sec, plus lime, cola and plenty of ice'),
(11, 'Blue Lagoon', 0, '0', 'Blue Lagoon_11.png', 8, 1, 1, 'Try our refreshing take on the classic blue lagoon with lemonade and fresh citrus juice. This boozy retro classic cocktail is perfect for parties'),
(12, 'Cosmopolitan', 0, '0', 'Cosmopolitan_12.png', 9, 1, 1, 'Lipsmackingly sweet and sour, the Cosmopolitan cocktail of vodka, cranberry and citrus is a good-time in a glass. Perfect for a party'),
(13, 'Pina Colada', 0, '0', 'Pina Colada_13.png', 9, 1, 1, 'A tropical blend of rich coconut cream, dark rum and tangy pineapple – serve with an umbrella for kitsch appeal'),
(14, 'Manhattan', 0, '0', 'Manhattan_14.png', 9, 1, 1, 'Combine vermouth and whiskey to make the perfect Manhattan cocktail. Add lemon,  and cherry to complete the classic flavour combination'),
(15, 'Tom Collins', 0, '0', 'Tom Collins_15.png', 9, 1, 1, 'Master the art of the classic Tom Collins cocktail, plus three twists. Gin, lemon, simple syrup and soda water are the ingredients for your cocktail cupboard'),
(16, 'Sex On The Beach', 0, '', 'Sex On The Beach_16.png', 12, 1, 1, 'Combine vodka with peach schnapps and cranberry juice to make a classic sex on the beach cocktail. Garnish with cocktail cherries and orange slices'),
(17, 'Virgin Mojito', 0, '0', 'Virgin Mojito_17.png', 9, 0, 1, 'Try a refreshing, non-alcoholic mojito cocktail recipe.  With lime juice, mint and ice , it\'s fabulously refreshing'),
(18, 'Mojito', 0, '0', 'Mojito_18.png', 9, 1, 1, 'Mix this classic cocktail for a party using fresh mint, white rum, zesty lime and cooling soda water. Play with the quantities to suit your taste.'),
(19, 'Virgin Pina Colada', 0, '0', 'Virgin Pina Colada_19.jpg', 9, 0, 1, 'For an alcohol-free party option, try our spiced piña colada mocktail (or virgin piña colada), with cherry, pineapple juice and coconut milk'),
(20, 'Virgin Cucumber Gimlet Mocktail', 0, '0', 'Virgin Cucumber Gimlet Mocktail_20.jpg', 9, 0, 1, 'Make a classic gimlet, combining simple syrup and lime juice, stirred to the perfect dilution with lots of ice. A refreshing cocktail to enjoy with friends'),
(21, 'Virgin Margarita', 0, '0', 'Virgin Margarita_21.jpg', 8, 0, 1, 'This virgin margarita recipe tastes as good as the real thing! This non-alcoholic mocktail is irresistibly tasty with a secret ingredient.'),
(22, 'Amazonia Mocktail', 3.55, '0', 'Amazonia Mocktail_22.jpg', 7, 0, 1, 'Fancy bubbles dance in the glass while the flavors of apple, mint and lime brighten each sip!');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

DROP TABLE IF EXISTS `contains`;
CREATE TABLE IF NOT EXISTS `contains` (
  `IdCocktail` int(11) NOT NULL,
  `IdIngredient` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`IdCocktail`,`IdIngredient`),
  KEY `FK_ingredient_contains_idx` (`IdIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`IdCocktail`, `IdIngredient`, `Quantity`) VALUES
(1, 7, 0),
(1, 18, 0),
(1, 31, 0),
(1, 33, 0),
(2, 4, 0),
(2, 7, 0),
(2, 29, 0),
(2, 37, 0),
(2, 38, 0),
(2, 41, 0),
(3, 10, 0),
(3, 18, 0),
(3, 39, 0),
(3, 41, 0),
(4, 14, 0),
(4, 17, 0),
(4, 22, 0),
(5, 7, 0),
(5, 10, 0),
(5, 17, 0),
(5, 29, 0),
(5, 31, 0),
(5, 40, 0),
(6, 1, 0),
(6, 2, 0),
(6, 3, 0),
(6, 4, 0),
(6, 5, 0),
(6, 6, 0),
(6, 7, 0),
(6, 41, 0),
(7, 2, 0),
(7, 7, 0),
(7, 8, 0),
(7, 9, 0),
(7, 10, 0),
(7, 11, 0),
(7, 12, 0),
(8, 2, 0),
(8, 7, 0),
(8, 13, 0),
(8, 41, 0),
(9, 2, 0),
(9, 3, 0),
(9, 7, 0),
(9, 11, 0),
(9, 14, 0),
(9, 15, 0),
(9, 16, 0),
(10, 1, 0),
(10, 7, 0),
(10, 10, 0),
(10, 13, 0),
(10, 17, 0),
(10, 18, 0),
(10, 19, 0),
(10, 20, 0),
(10, 21, 0),
(10, 22, 0),
(11, 10, 0),
(11, 12, 0),
(11, 17, 0),
(11, 22, 0),
(11, 23, 0),
(12, 3, 0),
(12, 17, 0),
(12, 22, 0),
(12, 24, 0),
(12, 32, 0),
(13, 2, 0),
(13, 3, 0),
(13, 11, 0),
(13, 16, 0),
(13, 26, 0),
(14, 12, 0),
(14, 22, 0),
(14, 27, 0),
(14, 28, 0),
(15, 10, 0),
(15, 12, 0),
(15, 19, 0),
(15, 21, 0),
(15, 22, 0),
(15, 29, 0),
(16, 7, 0),
(16, 12, 0),
(16, 17, 0),
(16, 30, 0),
(16, 31, 0),
(16, 32, 0),
(16, 33, 0),
(16, 34, 0),
(17, 3, 0),
(17, 4, 0),
(17, 7, 0),
(17, 35, 0),
(18, 1, 0),
(18, 3, 0),
(18, 4, 0),
(18, 7, 0),
(18, 29, 0),
(18, 41, 0),
(19, 11, 0),
(19, 12, 0),
(19, 14, 0),
(19, 16, 0),
(19, 36, 0),
(20, 3, 0),
(20, 14, 0),
(20, 21, 0),
(20, 29, 0),
(20, 42, 0),
(21, 3, 0),
(21, 7, 0),
(21, 10, 0),
(21, 14, 0),
(21, 21, 0),
(21, 31, 0),
(21, 43, 0),
(22, 3, 0),
(22, 4, 0),
(22, 7, 0),
(22, 21, 0),
(22, 45, 0),
(22, 46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `IdUser` int(11) NOT NULL,
  `IdCocktail` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`,`IdCocktail`),
  KEY `FK_cocktail_grade_idx` (`IdCocktail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `IdIngredient` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdIngredient`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`IdIngredient`, `Name`, `Type`) VALUES
(1, 'White rum', 'ALCOHOL'),
(2, 'Dark rum', 'ALCOHOL'),
(3, 'Lime juice', 'JUICE'),
(4, 'Mint', 'OTHER'),
(5, 'Orgeat syrup', 'SYRUP'),
(6, 'Orange liqueur', 'ALCOHOL'),
(7, 'Ice', 'OTHER'),
(8, 'Coffee flavored liqueur', 'ALCOHOL'),
(9, 'Coconut liqueur', 'ALCOHOL'),
(10, 'Lemon juice', 'JUICE'),
(11, 'Pineapple juice', 'JUICE'),
(12, 'Cherry', 'FRUIT'),
(13, 'Coca cola', 'JUICE'),
(14, 'Sugar', 'OTHER'),
(15, 'Aperol', 'ALCOHOL'),
(16, 'Pineapple', 'FRUIT'),
(17, 'Vodka', 'ALCOHOL'),
(18, 'Tequila', 'ALCOHOL'),
(19, 'Gin', 'ALCOHOL'),
(20, 'Tripple sec liqueur ', 'ALCOHOL'),
(21, 'Simple syrup', 'SYRUP'),
(22, 'Lemon', 'FRUITE'),
(23, 'Blue curacao', 'ALCOHOL'),
(24, 'Cointreau', 'ALCOHOL'),
(25, 'Cranberry', 'FRUIT'),
(26, 'Coconut cream', 'OTHER'),
(27, 'Rye Whiskey', 'ALCOHOL'),
(28, 'Vermouth', 'ALCOHOL'),
(29, 'Soda', 'JUICE'),
(30, 'Peach schnapps', 'ALCOHOL'),
(31, 'Orange juice', 'JUICE'),
(32, 'Cranberry juice', 'JUICE'),
(33, 'Grenadine syrup', 'SYRUP'),
(34, 'Orange', 'FRUIT'),
(35, 'Honey syrup', 'SYRUP'),
(36, 'Coconut milk', 'JUICE'),
(37, 'Prosecco', 'ALCOHOL'),
(38, 'Elderflower syrup', 'SYRUP'),
(39, 'Grapefruit juice', 'JUICE'),
(40, 'White wine ', 'ALCOHOL'),
(41, 'Lime', 'FRUIT'),
(42, 'Cucumber', 'OTHER'),
(43, 'Lemon soda', 'JUICE'),
(44, 'Apple juice', 'JUICE'),
(45, 'Grape juice', 'JUICE'),
(46, 'Apple ', 'FRUIT');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
CREATE TABLE IF NOT EXISTS `preferences` (
  `IdUser` int(11) NOT NULL,
  `IdIngredient` int(11) NOT NULL,
  `Value` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`,`IdIngredient`),
  KEY `FK_ingredient_preferences_idx` (`IdIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

DROP TABLE IF EXISTS `registered`;
CREATE TABLE IF NOT EXISTS `registered` (
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`IdUser`) VALUES
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

DROP TABLE IF EXISTS `saved`;
CREATE TABLE IF NOT EXISTS `saved` (
  `IdUser` int(11) NOT NULL,
  `IdCocktail` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`,`IdCocktail`),
  KEY `FK_cocktail_saved_idx` (`IdCocktail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`IdUser`, `IdCocktail`) VALUES
(3, 2),
(2, 7),
(2, 9),
(3, 12),
(3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Surname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdUser`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `Name`, `Surname`, `Mail`, `Password`, `Username`, `DateOfBirth`, `Gender`) VALUES
(1, 'Mark', 'Smith', 'mark@gmail.com', 'admin123', 'admin', '1999-05-10', 'M'),
(2, 'Tom', 'Jones', 'tom99@gmail.com', 'tom123', 'tom99', '1999-05-10', 'M'),
(3, 'Monika', 'Taylor', 'monika@hotmail.com', 'monikaaa123', 'monika123', '2000-05-03', 'F');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_user_admin` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `FK_cocktail_contains` FOREIGN KEY (`IdCocktail`) REFERENCES `cocktail` (`IdCocktail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ingredient_contains` FOREIGN KEY (`IdIngredient`) REFERENCES `ingredient` (`IdIngredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `FK_cocktail_grade` FOREIGN KEY (`IdCocktail`) REFERENCES `cocktail` (`IdCocktail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_registered_grade` FOREIGN KEY (`IdUser`) REFERENCES `registered` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `FK_ingredient_preferences` FOREIGN KEY (`IdIngredient`) REFERENCES `ingredient` (`IdIngredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_registered_preferences` FOREIGN KEY (`IdUser`) REFERENCES `registered` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registered`
--
ALTER TABLE `registered`
  ADD CONSTRAINT `FK_user_registered` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saved`
--
ALTER TABLE `saved`
  ADD CONSTRAINT `FK_cocktail_saved` FOREIGN KEY (`IdCocktail`) REFERENCES `cocktail` (`IdCocktail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_registered_saved` FOREIGN KEY (`IdUser`) REFERENCES `registered` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
