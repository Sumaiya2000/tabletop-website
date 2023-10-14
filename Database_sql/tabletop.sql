-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 08:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabletop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `phone`, `email`) VALUES
('0000admin', 'Admin', '1111111111', 'admin@tabletop.com'),
('0000c', 'Sumaiya', '1234567890', 'sumaiya@tabletop.com'),
('0000d', 'Redowan', '1234567891', 'redowan@tabletop.com');

-- --------------------------------------------------------

--
-- Table structure for table `appetizer`
--

CREATE TABLE `appetizer` (
  `img` varchar(255) NOT NULL,
  `pid` int(15) NOT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appetizer`
--

INSERT INTO `appetizer` (`img`, `pid`, `description`) VALUES
('\"image/appetizers/Chicken-Parmesan-Slider-Bake.jpg\"', 9, 'Sliders are the perfect finger food for any get-together, and this flavorful chicken Parmesan version won’t disappoint.'),
('\"image/appetizers/Fried-Prosciutto-Tortellini.jpg\"', 10, 'Our take on Italian street food, these fried tortellini are crunchy, gooey good. For the sauce, use the best quality tomatoes we can find.'),
('\"image/appetizers/Grilled-Tomato-Peach-Pizza.jpg\"', 11, 'This delicious pizza is unique, healthy and easy to make. The fresh flavors make it a perfect appetizer for a summer party.'),
('\"image/appetizers/Ham-n-Cheese-Biscuit-Stacks.jpg\"', 12, 'These finger sandwiches are filling enough to satisfy hearty appetites. I\'ve served the fun little stacks at every event, including holiday gatherings, showers and tailgate parties.'),
('\"image/appetizers/Marinated-Olive-Cheese-Ring.jpg\"', 13, 'We love to make meals into celebrations, and antipasto always kicks off the party for Italian dinners. This one is almost too pretty to eat, especially when sprinkled with pimientos, fresh basil and parsley.'),
('\"image/appetizers/Orange-Glazed-Meatballs.jpg\"', 14, 'People love the sweet orange marmalade paired with the zip of a jalapeno in this sweet-sour glaze.'),
('\"image/appetizers/Teriyaki-Meatballs.jpg\"', 15, 'These teriyaki pineapple meatballs appetizer changed so many times because of my family’s suggestions that it eventually became a main course. I think the homemade sauce sets these meatballs apart.'),
('\"image/appetizers/Turkey-Sliders-with-Sesame-Slaw.jpg\"', 16, 'we are fans of sliders, especially if they are Asian inspired. Sweet Hawaiian rolls make these especially tasty. ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `order_no` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `chef_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`chef_id`, `name`, `phone`, `email`) VALUES
('chef111', 'chef', '111111111', 'chef@tabletop.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `building` varchar(255) DEFAULT NULL,
  `road` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dessert`
--

CREATE TABLE `dessert` (
  `img` varchar(255) DEFAULT NULL,
  `pid` int(15) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dessert`
--

INSERT INTO `dessert` (`img`, `pid`, `description`) VALUES
('\"image/desserts/mixed_berry_mousse.jpg\"', 1, 'A mousse is always a great dessert option, thanks to its texture and its simplicity. Especially now that artisanal food and authentic flavors are in vogue.'),
('\"image/desserts/mango and coconut soufflé.jpg\"', 2, 'Continuing with the theme of fruits and creamy textures, here\'s an option using more exotic fruits. We suggest adding a classic French soufflé to your menu, and taking it to the next level with mango morsels and a coconut topping.'),
('\"image/desserts/homemade carrot cake.jpg\"', 3, 'Carrot cake is one of the most popular cakes around these days. This home-style cake has been re-invented with a thick, sweet frosting made from cream cheese and nuts, and the use of whole cane sugar.'),
('\"image/desserts/matcha cake.jpg\"', 4, 'Matcha is still a leader in the health trend. It is commonly found in traditional Japanese mochi, as a filling, and as a base for cookies. As we mentioned earlier though, 2019 is the year of the cake, so serving a slice of matcha cake, with its striking green color, could be a great option for your menu. You\'ll be surprised at how popular it may prove to be.'),
('\"image/desserts/vegan chocolate cake.jpg\"', 5, 'For environmentally-conscious clients, any vegan dessert is a plus. In this case, the most popular vegan cake is the chocolate cake, so offer one made with 70% cocoa or higher, for example, with raspberry jam filling, and watch your clients fall in love.'),
('\"image/desserts/praline and ganache cake.png\"', 6, 'Pralines, which are almonds or hazelnuts mixed with caramelized sugar, and ganache, which is a mix of cream and chocolate morsels, are two other very fashionable desserts right now. '),
('\"image/desserts/blondie with vanilla ice cream.jpg\"', 7, 'We\'re pleased to introduce you to another popular dessert. Her name is Blondie! Actually, it\'s a brownie with less chocolate and more whole cane sugar, making it more \"blonde\" than the traditional version.'),
('\"image/desserts/re-invented cheesecake.jpg\"', 8, 'Take the classic American cheesecake and add other ingredients to bring out the flavors. We recommend one of these 3 options: a lush coating of dulce de leche, which is made from caramelized condensed milk. Or try an oreo topping, as the classic chocolate-and-vanilla cookies are currently very on-trend in desserts, or passion fruit jam, whose tart notes are ideal for cheesecake.');

-- --------------------------------------------------------

--
-- Table structure for table `dine_in_cus`
--

CREATE TABLE `dine_in_cus` (
  `sl` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `img` varchar(255) DEFAULT NULL,
  `pid` int(15) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`img`, `pid`, `description`) VALUES
('\"image/drinks/creamyhotcocoa1.jpg\"', 25, 'It\'s old fashioned, it\'s comforting, it makes the kitchen smell wonderful and it\'s good for the soul.'),
('\"image/drinks/berrylicious2.jpg\"', 26, 'This boozy, fruity frozen sangria is an adult version of the icy slushies we slurped down as kids. So refreshing on a hot summer night. Cheers!'),
('\"image/drinks/mayanmocha3.jpg\"', 27, 'One of our signature dishes popular all around the world. We use a powdered cocoa mix with spices that was called Mexican Spiced Cocoa.'),
('\"image/drinks/peanutbutterbanana4.jpg\"', 28, 'This peanut butter banana smoothie is so refreshing, and it\'s sweet and tasty.\r\n'),
('\"image/drinks/chocolateprotein5.jpg\"', 29, 'Made with coffee ice cubes, this smoothie is packed with protein from soy milk, spinach, and protein powder. The frozen banana adds creaminess.'),
('\"image/drinks/shamrock6.jpg\"', 30, 'This has become a St. Patrick\'s Day tradition in our restaurant. The kids love it, and so do the grownups.'),
('\"image/drinks/tartapple.jpg\"', 31, 'This syrupy, apple-infused drinking vinegar is an old-fashioned recipe that\'s used as a unique flavor enhancer for cocktails or sodas. Store in the refrigerator.'),
('\"image/drinks/tiki cooler.jpg\"', 32, 'Dreaming of coladas or mojitos? Celebrating classic tiki flavors, this mocktail is bright with citrus, low on sweetness. From the first sip, imagining a beautiful beach is altogether easy.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`) VALUES
('admin@tabletop.com', '123456789'),
('chef@tabletop.com', '12345'),
('redowan@tabletop.com', '01234567'),
('sumaiya@tabletop.com', '01234567');

-- --------------------------------------------------------

--
-- Table structure for table `main_course`
--

CREATE TABLE `main_course` (
  `img` varchar(255) DEFAULT NULL,
  `pid` int(15) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_course`
--

INSERT INTO `main_course` (`img`, `pid`, `description`) VALUES
('\"image/main_course/RamenChickenSalad1.jpg\"', 17, 'Instant ramen noodles don’t turn mushy easily and can be made hours ahead of time, so this dish is perfect for a gathering. Skinless, boneless chicken thighs cook quickly on the bbq, and then you can garnish the whole thing with crispy garlic and crunchy peanuts.'),
('\"image/main_course/Should-I-Be-Using-Grilling-Planks2.jpg\"', 18, 'A big salmon fillet always feels like a festive main course, especially when it\'s cooked on a cedar grilling plank, so it picks up a whisper of smoky flavor. Kick off your seafood-themed dinner party with grilled oysters and pair the fish with a simple tomato salad.'),
('\"image/main_course/ChickenGrapesFennel3.jpg\"', 19, 'There\'s nothing wrong with defaulting to chicken when you\'re trying to think of dinner party ideas. The key is to select a truly special chicken recipe, like this easy sweet-and-spicy braise, made with ribbons of fennel and juicy table grapes. You\'ll want to have a loaf of bread on the side for sopping up the sauce.'),
('\"image/main_course/ShrimpSkewers4.jpg\"', 20, 'Marinate shrimp in a sweet-and-spicy mixture of apricot preserves, lime juice, habanero, soy sauce, garlic, and ginger—then throw them on the grill for an easy 15-minute dinner. Looking for a side dish? Perhaps this simple grilled corn recipe will do the trick.'),
('\"image/main_course/tamarind-glazed-black-bass-with-coconut-herb-salad5.jpg\"', 21, 'Dinner recipes don\'t always feel like a celebration, but this one does. Two whole fish are brushed with a tamarind and honey glaze, then roasted for just about 20 minutes. It\'s easier than roast chicken, and the presentation is truly fabulous.'),
('\"image/main_course/cauliflower-bolognese6.jpg\"', 22, 'No, you don’t have to be a vegetarian to love what’s going on here. Cauliflower and mushrooms provide richness and toothiness that do justice to the meaty original.'),
('\"image/main_course/oyster-mushrooms-bernaise-yogurt7.jpg\"', 23, 'A classic steakhouse-inspired rub and sauce turn grilled mushrooms into a showstopper of a meal. All you need is a wedge salad on the side.'),
('\"image/main_course/Sheet-Pan-Herb-Crusted-Cauliflower-Steaks-with-White-Beans-and-Green-Beans.jpg\"', 24, 'A meatless recipe you’ll want to serve with a steak knife.');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `order_no` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `pid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `noti`
--

CREATE TABLE `noti` (
  `cook` varchar(255) DEFAULT NULL,
  `done` varchar(255) NOT NULL,
  `pick` varchar(255) NOT NULL,
  `send` varchar(255) NOT NULL,
  `complete` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noti`
--

INSERT INTO `noti` (`cook`, `done`, `pick`, `send`, `complete`) VALUES
('Your order is being cooked.', 'Your order is done cooking.', 'Please pick up your food from the counter.', 'Your order is sent to your location.', 'Your order is completed. Thank you for ordering!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `total_cost` int(11) NOT NULL,
  `gives` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `type` varchar(255) DEFAULT NULL,
  `noti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pid`
--

CREATE TABLE `pid` (
  `order_no` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `order_no` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(15) NOT NULL,
  `availability` varchar(4) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stored in` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `availability`, `model`, `price`, `stored in`) VALUES
(1, '1', 'Mixed Berry Mousse', 500, 0),
(2, '1', 'Mango and coconut soufflé', 250, 0),
(3, '1', 'Homemade carrot cake', 550, 0),
(4, '1', 'Matcha cake', 600, 0),
(5, '1', 'Vegan chocolate cake', 300, 0),
(6, '1', 'Praline and ganache cake', 600, 0),
(7, '1', 'Blondie with vanilla ice cream', 570, 0),
(8, '1', 'Re-invented cheesecake', 700, 0),
(9, '1', 'Chicken Parmesan Slider Bake', 1000, 0),
(10, '1', 'Fried Prosciutto Tortellini', 500, 0),
(11, '1', 'Grilled Tomato Peach Pizza', 800, 0),
(12, '1', 'Ham-n-Cheese Biscuit Stacks', 500, 0),
(13, '1', 'Marinated Olive Cheese Ring', 500, 0),
(14, '1', 'Orange Glazed Meatballs', 500, 0),
(15, '1', 'Teriyaki Meatballs', 550, 0),
(16, '1', 'Turkey Sliders with Sesame Slaw', 400, 0),
(17, '1', 'Garlicky Instant Ramen Noodle Salad With Grilled Chicken Thighs', 560, 0),
(18, '1', 'Cedar-Plank Salmon', 700, 0),
(19, '1', 'Braised Chicken Legs With Grapes and Fennel', 740, 0),
(20, '1', 'Habanero BBQ Shrimp', 640, 0),
(21, '1', 'Tamarind-Glazed Black Bass With Coconut-Herb Salad', 480, 0),
(22, '1', 'Cauliflower Bolognese', 550, 0),
(23, '1', 'Mushrooms with Béarnaise Yogurt', 390, 0),
(24, '1', 'Herb-Crusted Cauliflower Steaks With Beans and Tomatoes', 499, 0),
(25, '1', 'Creamy Hot Cocoa', 300, 0),
(26, '1', 'Berrylicious Frozen Sangria Slush', 500, 0),
(27, '1', 'Mayan Mocha Powder', 500, 0),
(28, '1', 'Peanut Butter Banana Smoothie', 500, 0),
(29, '1', 'Chocolate Protein Iced Coffee', 500, 0),
(30, '1', 'Shamrock Shakes', 500, 0),
(31, '1', 'Tart Apple-Ginger Shrub', 500, 0),
(32, '1', 'Tiki Cooler', 500, 0),
(33, '1', 'Set menu 1', 500, 0),
(34, '1', 'Set menu 2', 500, 0),
(35, '1', 'Set menu 3', 500, 0),
(36, '1', 'Set menu 4', 500, 0),
(37, '1', 'Set menu 5', 500, 0),
(38, '1', 'Set menu 6', 500, 0),
(39, '1', 'Set menu 7', 500, 0),
(40, '1', 'Set menu 8', 500, 0),
(123, 'NO', 'sumaiya_1124', 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

CREATE TABLE `quantity` (
  `order_no` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `si` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_reserve`
--

CREATE TABLE `request_reserve` (
  `table_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `guest_amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_table`
--

CREATE TABLE `reserve_table` (
  `table_no` int(11) NOT NULL,
  `table_seat` int(11) NOT NULL,
  `reserve_status` text NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `guest_amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve_table`
--

INSERT INTO `reserve_table` (`table_no`, `table_seat`, `reserve_status`, `name`, `mail`, `phone`, `guest_amount`, `date`) VALUES
(1, 4, 'No', NULL, NULL, NULL, NULL, NULL),
(2, 5, 'No', NULL, NULL, NULL, NULL, NULL),
(3, 10, 'No', NULL, NULL, NULL, NULL, NULL),
(4, 2, 'No', NULL, NULL, NULL, NULL, NULL),
(5, 2, 'No', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `set_menu`
--

CREATE TABLE `set_menu` (
  `img` varchar(255) DEFAULT NULL,
  `pid` int(15) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `set_menu`
--

INSERT INTO `set_menu` (`img`, `pid`, `description`) VALUES
('\"image/set_menu/1.jpg\"', 33, NULL),
('\"image/set_menu/2.jpg\"', 34, NULL),
('\"image/set_menu/3.jpg\"', 35, NULL),
('\"image/set_menu/4.jpeg\"', 36, NULL),
('\"image/set_menu/5.jpg\"', 37, NULL),
('\"image/set_menu/6.jpg\"', 38, NULL),
('\"image/set_menu/7.jpg\"', 39, NULL),
('\"image/set_menu/8.jpg\"', 40, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `item` varchar(255) DEFAULT NULL,
  `bought` varchar(11) DEFAULT NULL,
  `remain` varchar(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`item`, `bought`, `remain`, `cost`) VALUES
('Chicken wings', '1kg', '400gm', 200),
('Fish', '1.5kg', '400gm', 1000),
('Vegetables', '1kg', '200gm', 100);

-- --------------------------------------------------------

--
-- Table structure for table `take_out_cus`
--

CREATE TABLE `take_out_cus` (
  `customer_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `road` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `pid` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `subprice` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `SI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_auth`
--

CREATE TABLE `temp_auth` (
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_cus`
--

CREATE TABLE `temp_cus` (
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appetizer`
--
ALTER TABLE `appetizer`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`chef_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `dine_in_cus`
--
ALTER TABLE `dine_in_cus`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `main_course`
--
ALTER TABLE `main_course`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`order_no`,`model`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `pid`
--
ALTER TABLE `pid`
  ADD PRIMARY KEY (`order_no`,`pid`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`order_no`,`price`,`pid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `quantity`
--
ALTER TABLE `quantity`
  ADD PRIMARY KEY (`si`),
  ADD KEY `quantity_ibfk_1` (`order_no`);

--
-- Indexes for table `request_reserve`
--
ALTER TABLE `request_reserve`
  ADD PRIMARY KEY (`table_no`,`name`,`email`);

--
-- Indexes for table `reserve_table`
--
ALTER TABLE `reserve_table`
  ADD PRIMARY KEY (`table_no`);

--
-- Indexes for table `set_menu`
--
ALTER TABLE `set_menu`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `take_out_cus`
--
ALTER TABLE `take_out_cus`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`SI`);

--
-- Indexes for table `temp_auth`
--
ALTER TABLE `temp_auth`
  ADD PRIMARY KEY (`email`,`type`);

--
-- Indexes for table `temp_cus`
--
ALTER TABLE `temp_cus`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quantity`
--
ALTER TABLE `quantity`
  MODIFY `si` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `take_out_cus`
--
ALTER TABLE `take_out_cus`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `SI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appetizer`
--
ALTER TABLE `appetizer`
  ADD CONSTRAINT `appetizer_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dessert`
--
ALTER TABLE `dessert`
  ADD CONSTRAINT `dessert_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drinks`
--
ALTER TABLE `drinks`
  ADD CONSTRAINT `drinks_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_course`
--
ALTER TABLE `main_course`
  ADD CONSTRAINT `main_course_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pid`
--
ALTER TABLE `pid`
  ADD CONSTRAINT `pid_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `cart` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `cart` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quantity`
--
ALTER TABLE `quantity`
  ADD CONSTRAINT `quantity_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `cart` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `set_menu`
--
ALTER TABLE `set_menu`
  ADD CONSTRAINT `set_menu_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
