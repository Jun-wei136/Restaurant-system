-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 10:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('jasper', 'jasper111');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `subject`, `message`) VALUES
(1, 'jojo@gmail.com', 'Food', 'Food are the best!'),
(2, 'su@gmail.com', '', 'Best Restaurant Ever!!!!'),
(3, 'su@gmail.com', 'Delivery', 'Delivery is so fast and very friendly!'),
(4, 'jasper@gmail.com', '', 'I got wrong order once, but chef fixed that right away and came to me to apologize which is really nice to see. Food are good. Waiters are friendly. The decoration of restaurant is aesthetic. Overall, Greatest experience so far.'),
(5, 'jojo@gmail.com', 'Website', 'Easy to use and theme is pretty'),
(6, 'jojo@gmail.com', '', 'I love all the food!!!'),
(7, 'jojo@gmail.com', 'Car parking', 'Parking spot is a bit tight. I wish there is more space.'),
(8, 'jojo@gmail.com', '', 'I need this restaurant in my city'),
(9, 'jasper@gmail.com', 'Food ', 'Burgers are the best here!');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `age` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `email`, `password`, `age`, `gender`, `phone`, `address`) VALUES
(1, 'jasper@gmail.com', 'jasper111', '18-25', 'male', '0995114619', 'Mandalay, Myanmar'),
(2, 'jojo@gmail.com', 'jojo111', '18-25', 'male', '0995844658', '106th street, between 62x63, Mandalay, Myanmar'),
(3, 'su@gmail.com', 'su111', '86 above', 'female', '0995882265', 'Yangon, Myanmar'),
(4, 'mgmg@gmail.com', 'mgmg111', '26-45', 'male', '0910101010', 'Taunggyi, Myanmar');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `category`, `price`, `pic`) VALUES
(1, 'Bruschetta with Fresh Tomato Salsa', 'Appetizers', 7.99, 0x4d656e7550686f746f2f42727573636865747461207769746820467265736820546f6d61746f2053616c73612e6a7067),
(2, 'Crispy Calamari with Spicy Aioli', 'Appetizers', 9.99, 0x4d656e7550686f746f2f4372697370792043616c616d61726920776974682053706963792041696f6c692e6a7067),
(3, 'Caprese Salad with Balsamic Glaze', 'Appetizers', 8.99, 0x4d656e7550686f746f2f436170726573652053616c616420776974682042616c73616d696320476c617a652e6a7067),
(4, 'Chicken Satay Skewers with Peanut Sauce', 'Appetizers', 6.99, 0x4d656e7550686f746f2f436869636b656e20536174617920536b65776572732077697468205065616e75742053617563652e6a7067),
(5, 'Spinach and Artichoke Dip with Tortilla Chips', 'Appetizers', 7.99, 0x4d656e7550686f746f2f5370696e61636820616e64204172746963686f6b6520446970207769746820546f7274696c6c612043686970732e6a7067),
(6, 'Creamy Tomato Basil Soup', 'Soups', 4.99, 0x4d656e7550686f746f2f437265616d7920546f6d61746f20426173696c20536f75702e6a7067),
(7, 'Chicken Noodle Soup', 'Soups', 4.99, 0x4d656e7550686f746f2f436869636b656e204e6f6f646c6520536f75702e6a7067),
(8, 'Seafood Chowder', 'Soups', 5.99, 0x4d656e7550686f746f2f536561666f6f642043686f776465722e6a7067),
(9, 'Butternut Squash Soup', 'Soups', 4.99, 0x4d656e7550686f746f2f4275747465726e75742053717561736820536f75702e6a7067),
(10, 'French Onion Soup', 'Soups', 5.99, 0x4d656e7550686f746f2f4672656e6368204f6e696f6e20536f75702e6a7067),
(11, 'Classic Caesar Salad with Grilled Chicken', 'Salads', 9.99, 0x4d656e7550686f746f2f436c6173736963204361657361722053616c61642077697468204772696c6c656420436869636b656e2e6a7067),
(12, 'Greek Salad with Feta Cheese and Kalamata Olives', 'Salads', 8.99, 0x4d656e7550686f746f2f477265656b2053616c6164207769746820466574612043686565736520616e64204b616c616d617461204f6c697665732e6a7067),
(13, 'Cobb Salad with Avocado and Bacon', 'Salads', 10.99, 0x4d656e7550686f746f2f436f62622053616c616420776974682041766f6361646f20616e64204261636f6e2e6a7067),
(14, 'Spinach Salad with Strawberries and Goat Cheese', 'Salads', 9.99, 0x4d656e7550686f746f2f5370696e6163682053616c616420776974682053747261776265727269657320616e6420476f6174204368656573652e6a7067),
(15, 'Quinoa and Roasted Vegetable Salad', 'Salads', 8.99, 0x4d656e7550686f746f2f5175696e6f6120616e6420526f617374656420566567657461626c652053616c61642e6a7067),
(16, 'Grilled Salmon with Lemon Butter Sauce', 'Main Courses', 14.99, 0x4d656e7550686f746f2f4772696c6c65642053616c6d6f6e2077697468204c656d6f6e204275747465722053617563652e6a7067),
(17, 'Beef Tenderloin with Red Wine Reduction', 'Main Courses', 18.99, 0x4d656e7550686f746f2f426565662054656e6465726c6f696e2077697468205265642057696e6520526564756374696f6e2e6a7067),
(18, 'Chicken Parmesan with Marinara and Mozzarella', 'Main Courses', 12.99, 0x4d656e7550686f746f2f436869636b656e205061726d6573616e2077697468204d6172696e61726120616e64204d6f7a7a6172656c6c612e6a7067),
(19, 'Mushroom Risotto with Parmesan Cheese', 'Main Courses', 11.99, 0x4d656e7550686f746f2f4d757368726f6f6d205269736f74746f2077697468205061726d6573616e204368656573652e6a7067),
(20, 'Eggplant Parmesan with Tomato Sauce', 'Main Courses', 10.99, 0x4d656e7550686f746f2f456767706c616e74205061726d6573616e207769746820546f6d61746f2053617563652e6a7067),
(21, 'Lasagna with Meat Sauce', 'Pasta', 13.99, 0x4d656e7550686f746f2f4c617361676e612077697468204d6561742053617563652e6a7067),
(22, 'Spaghetti Bolognese', 'Pasta', 11.99, 0x4d656e7550686f746f2f53706167686574746920426f6c6f676e6573652e6a7067),
(23, 'Fettuccine Alfredo with Grilled Shrimp', 'Pasta', 13.99, 0x4d656e7550686f746f2f46657474756363696e6520416c667265646f2077697468204772696c6c656420536872696d702e6a7067),
(24, 'Pesto Linguine with Cherry Tomatoes and Pine Nuts', 'Pasta', 12.99, 0x4d656e7550686f746f2f506573746f204c696e6775696e6520776974682043686572727920546f6d61746f657320616e642050696e65204e7574732e6a7067),
(25, 'Classic Cheeseburger with Fries', 'Burgers and Sandwiches', 9.99, 0x4d656e7550686f746f2f436c61737369632043686565736562757267657220776974682046726965732e6a7067),
(26, 'BBQ Pulled Pork Sandwich with Coleslaw', 'Burgers and Sandwiches', 10.99, 0x4d656e7550686f746f2f4242512050756c6c656420506f726b2053616e6477696368207769746820436f6c65736c61772e6a7067),
(27, 'Grilled Chicken Club Sandwich with Avocado and Bac', 'Burgers and Sandwiches', 11.99, 0x4d656e7550686f746f2f4772696c6c656420436869636b656e20436c75622053616e647769636820776974682041766f6361646f20616e64204261636f6e2e6a7067),
(28, 'Portobello Mushroom Burger with Swiss Cheese', 'Burgers and Sandwiches', 9.99, 0x4d656e7550686f746f2f506f72746f62656c6c6f204d757368726f6f6d204275726765722077697468205377697373204368656573652e6a7067),
(29, 'Turkey and Cranberry Panini with Brie Cheese', 'Burgers and Sandwiches', 10.99, 0x4d656e7550686f746f2f5475726b657920616e64204372616e62657272792050616e696e6920776974682042726965204368656573652e6a7067),
(30, 'New York Cheesecake with Berry Compote', 'Desserts', 6.99, 0x4d656e7550686f746f2f4e657720596f726b2043686565736563616b65207769746820426572727920436f6d706f74652e6a7067),
(31, 'Molten Chocolate Lava Cake with Vanilla Ice Cream', 'Desserts', 7.99, 0x4d656e7550686f746f2f4d6f6c74656e2043686f636f6c617465204c6176612043616b6520776974682056616e696c6c612049636520437265616d2e6a7067),
(32, 'Apple Pie with Caramel Sauce', 'Desserts', 5.99, 0x4d656e7550686f746f2f4170706c6520506965207769746820436172616d656c2053617563652e6a7067),
(33, 'Tiramisu with Espresso Soaked Ladyfingers', 'Desserts', 6.99, 0x4d656e7550686f746f2f546972616d697375207769746820457370726573736f20536f616b6564204c61647966696e676572732e6a7067),
(34, 'Crème Brulée with Fresh Berries', 'Desserts', 7.99, 0x4d656e7550686f746f2f4372c3a86d65204272c3bb6cc3a965207769746820467265736820426572726965732e6a7067),
(35, 'Penne Arrabbiata with Spicy Tomato Sauce', 'Pasta', 10.99, 0x4d656e7550686f746f2f50656e6e652041727261626269617461207769746820537069637920546f6d61746f2053617563652e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `order_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `date` datetime NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(80) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`order_id`, `email`, `total`, `date`, `phone`, `address`, `note`) VALUES
(1, 'jojo@gmail.com', 45.96, '2023-07-01 12:24:02', '0995844658', '106th street, between 62x63, Mandalay, Myanmar', 'Beef needs to be medium rare, extra berries, extra cheese'),
(2, 'su@gmail.com', 95.87, '2023-07-01 12:26:43', '0995882265', 'Yangon, Myanmar', 'Use yogurt ice cream instead of vanilla'),
(3, 'jasper@gmail.com', 10.99, '2023-07-01 12:27:27', '0995114619', 'Mandalay, Myanmar', ''),
(4, 'jasper@gmail.com', 18.99, '2023-07-01 17:06:43', '0995114619', 'Mandalay, Myanmar', 'Extra sauce'),
(5, 'jasper@gmail.com', 0, '2023-07-03 11:15:12', '0995114619', 'Mandalay, Myanmar', ''),
(6, 'jasper@gmail.com', 78.92, '2023-07-03 11:17:11', '0995114619', 'Mandalay, Myanmar', 'Beef needs to be fully cooked');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `order_id`, `menu_id`, `quantity`) VALUES
(1, 1, 17, 1),
(2, 1, 34, 2),
(3, 1, 20, 1),
(4, 2, 31, 5),
(5, 2, 30, 3),
(6, 2, 33, 5),
(7, 3, 29, 1),
(8, 4, 17, 1),
(9, 6, 32, 5),
(10, 6, 26, 1),
(11, 6, 17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `people` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `email`, `time`, `date`, `people`) VALUES
(1, 'jasper@gmail.com', 'dinner', '2023-07-02', 'two'),
(2, 'jasper@gmail.com', 'brunch', '2023-07-13', 'five'),
(3, 'jasper@gmail.com', 'breakfast', '2023-07-03', 'one'),
(4, 'jasper@gmail.com', 'breakfast', '2023-07-03', 'one');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
