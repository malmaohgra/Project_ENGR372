-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 May 2024, 16:03:52
-- Sunucu sürümü: 8.0.37
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `group2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(50) COLLATE utf16_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Hobbies'),
(2, 'IT'),
(3, 'Science');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `customer_id` int NOT NULL,
  `name` varchar(50) COLLATE utf16_turkish_ci NOT NULL,
  `surname` varchar(50) COLLATE utf16_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf16_turkish_ci NOT NULL,
  `password` varchar(20) COLLATE utf16_turkish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf16_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `surname`, `email`, `password`, `phone`) VALUES
(2, 'maram', 'mohammed', 'maram@hotmail.com', '123', '5555555555'),
(3, 'Mohammed', 'Ahmed', 'Mohammed@gmail.com', '1234', '5555555534'),
(4, 'Alaa', 'Ali', 'Alaa@gmail.com', '34', '5555555578'),
(5, 'Abdullah', 'Ali', 'AA@gmail.com', '0000', '5553335550'),
(6, 'Abdullah', 'Mahmoud', 'Abd@gmail.com', '0000', '5553335550'),
(7, 'Halah', 'Sales', 'HHSales@gmail.com', '22', '123456789'),
(8, 'Halah', 'Sales', 'HH@gmail.com', '123', '123456789'),
(9, 'Melike', 'Tapcı', 'mtapci@gmail.com', '123', '1234567890');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `email` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `subject` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `message` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fullname` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`email`, `subject`, `message`, `fullname`) VALUES
('mtapci@hotmail.com', 'Complaint', 'I have the wrong course in my courses page', 'Melike Tapcı'),
('ayimaz@gmail.com', 'question', 'Test', 'Ali Yılmaz'),
('aliveli@hotmail.com', 'feedback', 'testestest', 'Ali Veli'),
('zcan@gmail.com', 'question', '\0Soru ', 'zeynep can '),
('mztapci@gmail.com', 'feedback', '\0Abcabdc', 'melike'),
('eylul@gmail.com', 'question', '\0Testing', 'eylül '),
('ahmety@hotmail.com', 'feedback', '\0My testing ', 'ahmet yılmaz'),
('eturk@gmail.com', 'question', '\0I\0 \0c\0a\0n\0t\0 \0a\0c\0c\0e\0s\0s\0 \0m\0y\0 \0o\0r\0d\0e\0r\0s\0 \0f\0r\0o\0m\0 \0a\0n\0y\0w\0h\0e\0r\0e\0 \0i\0n\0 \0w\0e\0b\0s\0i\0t\0e\0?', 'Elif Turk'),
('sedayildirim@hotmail.com', 'question', 'When will my course expire?', 'Seda Yıldırım'),
('jblack@gmail.com', 'complaint', 'I want to return my course and get my fee back!', 'John Black'),
('mtapci@hotmail.com', 'feedback', 'Testing the contact form', 'Melike Tapcı'),
('mztapci@gmail.com', 'feedback', '....', 'Melike');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `product_id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(120) COLLATE utf16_turkish_ci NOT NULL,
  `price` varchar(20) COLLATE utf16_turkish_ci NOT NULL,
  `image` varchar(50) COLLATE utf16_turkish_ci NOT NULL,
  `description` varchar(500) COLLATE utf16_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `name`, `price`, `image`, `description`) VALUES
(1, 1, 'Photography Basics', '1500₺', 'img/img_01.jpg', 'Learn the fundamentals of photography, including camera settings, composition, lighting, and post-processing techniques. Perfect for beginners who want to capture stunning images and improve their photography skills.'),
(3, 1, 'Gardening for Beginners', '1800₺', 'img/img_07.jpg', 'Learn how to create and maintain a beautiful garden. This course covers everything from soil preparation and plant selection to pest control and composting. Whether you have a small balcony or a large backyard, you’ll gain the knowledge and confidence to grow your own plants, flowers, and vegetables.'),
(4, 1, 'Cooking Fundamentals', '2500₺', 'img/img_02.jpg', 'Join our cooking fundamentals course and elevate your culinary skills. You’ll learn essential cooking techniques, knife skills, and how to create delicious meals from scratch. The course includes hands-on practice with a variety of recipes, helping you become more confident in the kitchen.'),
(5, 1, 'Creative Writing', '2100₺', 'img/img_03.jpg', 'Unleash your imagination and develop your writing skills in our creative writing course. Whether you’re interested in fiction, poetry, or memoirs, this class offers techniques and prompts to help you craft compelling stories and express your unique voice.'),
(6, 1, 'Music for Beginners', '3200₺', 'img/img_06.jpg', 'Learn to play an instrument or improve your singing in our music for beginners course. This course provides foundational knowledge in music theory, rhythm, and practice techniques. Choose from guitar, piano, violin, or voice lessons to start your musical journey.'),
(7, 1, 'Fitness and Wellness', '1500₺', 'img/img_08.jpg', 'Explore various fitness routines and wellness practices, including yoga, pilates, and meditation. This course aims to promote physical health and mental well-being.'),
(8, 1, 'Knitting and Crochet', '1300₺', 'img/img_04.jpg', ' Master the art of knitting and crochet with lessons on different stitches, patterns, and techniques. Ideal for beginners and those looking to improve their fiber arts skills.\r\n'),
(9, 1, 'Painting Techniques', '1500₺', 'img/img_05.jpg', 'Delve into various painting styles and techniques, including watercolor, acrylic, and oil painting. Suitable for artists of all levels looking to enhance their painting skills.'),
(10, 2, 'Computer Networking', '3200₺', 'img/img_09.jpg', 'This course covers the principles and practices of computer networking. Topics include network architectures, protocols, hardware components, network security, and troubleshooting. Students gain hands-on experience with configuring and managing networks.'),
(11, 2, 'Web Development', '3800₺', 'img/img_10.jpg', 'This course teaches students how to create websites and web applications. Topics include HTML, CSS, JavaScript, web frameworks, and responsive design. Students also learn about server-side programming, database integration, and web security.'),
(12, 2, 'Cybersecurity', '2800₺', 'img/img_11.jpg', 'This course introduces students to the field of cybersecurity. Topics include security principles, threat assessment, risk management, cryptography, network security, and incident response. Students learn how to protect systems and data from cyber threats.'),
(13, 2, 'Mobile App Development', '3000₺', 'img/img_12.jpg', 'This course teaches students how to develop applications for mobile devices. Topics include mobile UI/UX design, platform-specific development (iOS, Android), cross-platform development, and app deployment. Students work on projects using languages and frameworks like Swift, Kotlin, React Native, and Flutter.'),
(14, 2, 'Ethical Hacking', '2500₺', 'img/img_13.jpg', 'This course provides an introduction to ethical hacking and penetration testing. Topics include vulnerability assessment, exploitation techniques, network scanning, password cracking, and social engineering. Students learn how to use tools like Metasploit, Nmap, and Wireshark to identify and mitigate security threats.'),
(15, 2, 'Artificial Intelligence and Machine Learning', '3200₺', 'img/img_14.jpg', 'This course introduces students to the concepts and applications of artificial intelligence and machine learning. Topics include supervised and unsupervised learning, neural networks, natural language processing, and computer vision. Students gain hands-on experience with machine learning frameworks such as TensorFlow and scikit-learn.'),
(16, 3, 'Introduction to Biology', '1500₺', 'img/img_15.jpg', 'This course covers the fundamental principles of biology, including the structure and function of cells, genetics, evolution, and ecology. It provides a foundational understanding of living organisms and their interactions with the environment.'),
(17, 3, 'Human Anatomy and Physiology', '1800₺', 'img/img_16.jpg', 'This course explores the structure and function of the human body. Topics include the major organ systems, such as the skeletal, muscular, nervous, and cardiovascular systems, and how they work together to maintain homeostasis.'),
(18, 3, 'General Chemistry', '1800₺', 'img/img_17.jpg', 'An introductory course in chemistry that covers basic concepts such as atomic structure, chemical bonding, stoichiometry, thermodynamics, and the properties of gases, liquids, and solids. Laboratory work is often included to reinforce theoretical concepts.'),
(19, 3, 'Introduction to Physics\r\n', '1300₺', 'img/img_18.jpg', 'A foundational course in physics that covers topics such as mechanics, heat, light, sound, electricity, and magnetism. Emphasis is placed on understanding the laws of physics and applying them to solve problems.'),
(20, 3, 'Introduction to Earth Science', '1700₺', 'img/img_19.jpg', 'This course covers the study of the Earth, including its composition, structure, processes, and history. Topics include geology, meteorology, oceanography, and astronomy, providing a broad overview of the Earth and its place in the universe.'),
(21, 3, 'Introduction to Astronomy', '1500₺', 'img/img_20.jpg', 'This course explores the universe beyond Earth, including the solar system, stars, galaxies, and cosmology. Topics include the life cycle of stars, black holes, and the Big Bang theory. It provides a comprehensive understanding of the cosmos.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_ category_id` (`category_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_ category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
