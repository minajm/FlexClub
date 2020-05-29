-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 29, 2020 at 03:47 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summery` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `title`, `summery`, `image`, `link`) VALUES
(1, 'Box Fit', 'Boxercise is an exercise class based on the training concepts boxers use to keep fit. Classes can take a variety of formats but a typical one may involve shadow-boxing, skipping, hitting pads, kicking punchbags, press-ups, shuttle-runs and sit-ups. Most boxercise classes are aimed at men and women of all ages and fitness standards. As no class involves the physical hitting of an opponent, it is a fun, challenging and safe workout.', './image/upload/1590753259BoxFit.jpg', ''),
(2, 'Yogalates', 'Yogalates is an ever-increasing popular exercise due to its positive effects on the body and the mind alike. Yogalates allows you to practice and improve your very own limits; you can push and stretch your body while opening up your mind.\r\n\r\nWorking with your own limits is at the heart of Yogalates, everyone has different strengths and needs and Yogalates can always be adapted to the individual.\r\n\r\nYogalates is superb for flexibility, muscle toning and endurance. We have complied a list of what we consider some of the top body benefits of Yogalates.', './image/upload/1590751011yog.jpg', ''),
(3, 'Street Dance', 'Street dances, are dance styles that evolved outside of dance studios in any available open space, such as streets, dance parties, block parties, parks, school yards, raves, and nightclubs. They are often improvisational and social in nature, encouraging interaction and contact with spectators and the other dancers. Some examples of street dance include breakdancing and hiphop dances.', './image/upload/1590751136streetDance.jpg', ''),
(4, 'Meditation', 'Suitable for everyone, our weekly online drop-in meditation classes in Dublin are a perfect opportunity to take a break from busy daily life, increase your inner peace, happiness and well-being, and experience the benefits of meditation for yourself.\r\n\r\nLearn how to use Buddhist meditation & mindfulness training to solve daily problems, be more present, genuinely happy and improve relationships. Includes talks, guided meditations and Q&A. Drop in online to any class, any week.', './image/upload/1590751355madison-lavern-4gcqRf3-f2I-unsplash.jpg', ''),
(5, 'Pilates', 'You may come to Pilates to lose weight. You may come to Pilates to help with a bad back. You may come to Pilates to keep up with your peers or your kids. You may come for all these reasons and more... How you leave is just as important however; you will leave looking better, moving better and feeling better. Pilates is safe, effective, and suitable for everyone, from professional athletes to office workers. Pilates is proven to increase strength, flexibility and muscle tone, alleviate or eliminate back pain, improve athletic performance, and aid in recovery from injury.', './image/upload/1590751466bruce-mars-gJtDg6WfMlQ-unsplash.jpg', ''),
(6, 'Zumba', 'Grooving to the beats of salsa, flamenco, and merengue music feels more like a dance party than a workout, which is exactly what makes Zumba so popular. The Latin-inspired dance workout is one of the most popular group exercise classes in the world.\r\n\r\nThe high-energy classes are set to upbeat music and feature choreographed dance numbers that you might see in a nightclub. You don’t need to be a great dancer to feel welcome in a Zumba class. With the tag line, “Ditch the Workout, Join the Party,” the classes emphasize moving to the music and having a good time, no rhythm required.\r\n\r\nThere are several different kinds of Zumba classes, from Aqua Zumba workouts to classes like Zumba Toning that incorporate weights for additional calorie burning and strength training. There are even Zumba classes for kids.\r\n\r\nWorking up a sweat in the 60-minute classes burns an average of 369 calories -- more than cardio kickboxing or step aerobics. You’ll get a great cardio workout that melts fat, strengthens your core, and improves flexibility.\r\n\r\n', './image/upload/1590751632geert-pieters-3RnkZpDqsEI-unsplash.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `name`, `email`, `phone_number`, `message`) VALUES
(3, NULL, 'Mina Jamshidian', 'iyanim90@gmail.com', '833106792', 'jnn '),
(4, NULL, 'asdasd', 'asd@ad.com', '1231231233', 'asdasdasdasd'),
(6, 2, 'test', 'test@test.com', '0833106792', 'helllo this is test'),
(7, 2, 'Test', 'test@user.com', '0833106792', 'this is the test.');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `name` varchar(255) NOT NULL,
  `benefits` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `amount`, `name`, `benefits`) VALUES
(1, 64.69, 'Benefit 1', '1. Semi-private room subject to €500 excess\r\n2. Day case subject to €150 excess\r\n3. Get up to €150 cash back'),
(2, 70.38, 'Benefit 2', '1. Semi-private room subject to €300 excess\r\n2. Day case subject to €150 excess\r\n3. Get up to €200 cash back'),
(3, 80.42, 'Benefit 3', '1. Semi-private room subject to €200 excess\r\n2. Day case subject to €125 excess\r\n3. Get up to €250 cash back\r\nBuy now');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `description`, `image`, `link`, `type`) VALUES
(1, 'Healthy Eating Workshop', 'This healthy eating workshop series includes four lessons that can be\r\nimplemented as a series or as stand-alone modules. Each workshop\r\nintroduces a simple nutrition message and includes a hands-on\r\nopportunity to learn how to prepare a simple recipe for a meal or snack', './image/upload/1590764503event2.jpg', '', 'event'),
(2, 'Yogalates', 'Yogalates is the perfect class if you’re looking to improve your core and we’ve got the feel good gear that’ll help you look superb doing it!', './image/upload/1590751011yog.jpg', '', 'class'),
(3, 'Student Deal', 'STUDENT DEAL 2020.\r\n\r\nGet a membership from May 2020 – July 31st 2020 with 20$ off.\r\n\r\nLIMITED TIME ONLY!', './image/upload/1590763687cathy-pham-3jAN9InapQI-unsplash.jpg', '', 'event'),
(4, 'Box Fit', 'BoxFit is a cardio workout based on the training used for boxing focusing on toning and fitness. It includes skipping, boxing drills and bodyweight exercises that incorporate footwork and abdominal movements.', './image/upload/15907671761590750428BoxFit.jpg', '', 'class'),
(5, 'Street Dance', 'A street dance is a dance style that evolved outside dance studios in any available open space such as streets, dance parties, block parties, parks, school yards, raves, and nightclubs. ... Examples of street dance include b-boying (or breakdancing), which originated in New York City.', './image/upload/1590687063streetDance.jpg', '', 'class');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `registration_date`, `class_id`, `user_id`, `fee_id`) VALUES
(1, '2020-05-27 18:38:04', 1, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `is_approved` bit(1) NOT NULL DEFAULT b'0',
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `class_name`, `first_name`, `date`, `is_approved`, `comment`) VALUES
(2, 'adsasd', 'mina', '2020-05-29 00:00:00', b'1', 'jdjdjddd'),
(3, 'adsasd', 'mina', '2020-05-29 00:00:00', b'1', 'test  tttt  testtttt'),
(4, 'dddddd', 'mina', '2020-05-29 00:00:00', b'1', 'hello\r\nworld'),
(5, 'Street Dance', 'adasdasdasd', '2020-05-29 00:00:00', b'1', 'Box fit class is amazing!!!!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `gender` char(1) NOT NULL,
  `mobile_number` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `is_admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `gender`, `mobile_number`, `address`, `email`, `password`, `status`, `is_admin`) VALUES
(1, 'Mina', 'Jamshidian', 'f', '8123786', 'Dublin', 'test@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, b'1'),
(2, 'Test User', 'Test', 'm', '123123123123', 'Dublin 8', 'test@user.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, b'0'),
(3, 'Sina', 'Abedi', 'm', '123123123345', 'Dublin1', 's.a@user.com', '4297f44b13955235245b2497399d7a93', 1, b'0'),
(4, 'Milad', 'White', 'm', '12312312312', 'Dublin 2', 'mi.laad@user.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, b'0'),
(5, 'Afra', 'Sin', 'm', '12312312312', 'Dublin7 ', 'sin.afraaa@user.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usedr_id` (`user_id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_fee_id` (`fee_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `fk_usedr_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `fk_class_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `fk_fee_id` FOREIGN KEY (`fee_id`) REFERENCES `fee` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
