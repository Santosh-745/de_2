-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 10:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `de_sem_6`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Category`, `img`) VALUES
(14, 'Computer Engineer', 'img\\ce.jpg'),
(15, 'Dentist', 'img\\doctor.jpg'),
(16, 'Armed Forces', 'img\\armed_forces.jpg'),
(17, 'Doctor Homeopathi', 'img\\doctor.jpg'),
(19, 'fashion Designer', 'img\\fashio_des.jpg'),
(20, 'Data Structures', 'img\\ce.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home_data`
--

CREATE TABLE `home_data` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `Answered_by` varchar(50) NOT NULL,
  `No_of_steps` int(11) NOT NULL,
  `Step_1` text NOT NULL,
  `Step_2` text NOT NULL,
  `Step_3` text NOT NULL,
  `Step_4` text NOT NULL,
  `Step_5` text NOT NULL,
  `Reaource_1` text DEFAULT NULL,
  `Reaource_2` text DEFAULT NULL,
  `Reaource_3` text DEFAULT NULL,
  `Reaource_4` text DEFAULT NULL,
  `Reaource_5` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_data`
--

INSERT INTO `home_data` (`id`, `title`, `category`, `Answered_by`, `No_of_steps`, `Step_1`, `Step_2`, `Step_3`, `Step_4`, `Step_5`, `Reaource_1`, `Reaource_2`, `Reaource_3`, `Reaource_4`, `Reaource_5`) VALUES
(1, 'Computer Engineer', 'Computer Engineer', 'Prof. Jitendra Rathiya', 3, 'Step 1 for Computer Engineer', 'Step 2 for Computer Engineer', 'Step 3 for Computer Engineer', '', '', NULL, NULL, NULL, NULL, NULL),
(2, 'Dentist', 'Dentist', 'D1', 3, 'Step 1 for Dentist', 'Step 2 for Dentist', 'Step 3 for Dentist', '', '', NULL, NULL, NULL, NULL, NULL),
(3, 'Dentist', 'Dentist', 'D2', 2, 'Step 1 for Dentist 2', 'Step 2 for Dentist2', '', '', '', NULL, NULL, NULL, NULL, NULL),
(4, 'Armed Forces', 'Armed Forces', 'Lt. Col. Rudraraj Singh', 3, 'Class XI-XII/Junior College\r\nArts: If you’re interested in subjects like political science, history, etc., choose arts in junior college. With a background in arts, you can pursue a law specialization with the army.', 'Entrance Exams\r\nYou will need to appear for the NDA/NA exam. Once you have completed Class 12, you will be eligible for this exam. It is conducted by the Union Public Service Commission (UPSC) twice a year. This test will be conducted offline and will be followed by a Service Selection Board (SSB) interview. The exam covers English and General Knowledge.', 'Graduation\r\nNDA: After Class 12, register with the National Defence Academy, Pune. They have a three-year course you can get into. This course is certified by Jawaharlal Nehru University (JNU). Post these three years, you will undergo a one-year training programme based on the specialisation you choose.\r\n\r\nAlternatively, you can register with the NDA and pursue a graduation course of your choice. Once you graduate, you can come back and take the one-year-training programme. At the NDA, you will be given professional training and can choose from 31 extracurricular activities including golf, gliding, wind-surfing and others. ', '', '', NULL, NULL, NULL, NULL, NULL),
(5, 'Armed Forces', 'Armed Forces', 'Major Shakti singh', 3, 'Firstly you need to do graduation. and from the last year you are elligible for giving entrance exam.', ' In the final year of graduation, you will have to pass the Combined Defence Service Exam', 'Clear the Service Selection Board (SSB) interview and qualify as medically fit to join the IMA. ', '', '', NULL, NULL, NULL, NULL, NULL),
(6, 'Armed Forces', 'Armed Forces', 'Subedar Ram singh', 4, 'One way to join armed forces without nda or cds for Science stream students with thw PCM in 12th. They need to pass their 12th with more than 80% marks. Although this cut off vary every year.', 'After 12th they can apply for TES and according to their cut-off marks they sort-listed the students.', 'After sort listed in cut-offs all they have to give ssbs where they are tested for the technical knowledge. ', 'And after clearing the ssbs cadet directly appear in IMA for training. But here the cadet is only eligible for army not for navy or air forces.', '', NULL, NULL, NULL, NULL, NULL),
(7, 'Doctor Homeopathi', 'Doctor Homeopathi', 'DH', 5, 'Class XI - XII/Junior College : While in high school or junior college, select the science stream and study the core subjects of science - physics, chemistry and biology.', 'Entrance Exams : To become a homeopathic doctor, you have to finish a diploma or degree course in homeopathy. Both courses require you to take entrance exams conducted by various state and independent bodies in India. Your admission in the medical institution of your choice will depend on the rank you secure in the entrance examination.', 'Graduation : You can choose to graduate with a degree in Bachelor of Homeopathy Medicine & Surgery (BHMS), which is a four-year course, or a diploma in Homeopathy Medicine & Surgery (DHMS), which is a three-year course. Choosing a degree or diploma depends on the depth in which you want to pursue homeopathy.', 'Internship Training : You must intern for six months to one year in order to  successfully graduate in your chosen degree or diploma of homeopathy.  The internship usually takes place at the hospital attached to your college. In this period of time, you will gain practical experience like studying patient cases, evaluating their symptoms, and managing sick people, all based on principles of homoeopathy, under expert supervision.\r\n ', 'Land a Job : Through college placements, you can find a job in the public or private sector. After some years of experience, you can also choose to become self-employed by setting up your own practice.\r\n\r\nCongratulations, you are now officially a homeopathic doctor!', NULL, NULL, NULL, NULL, NULL),
(8, 'Fashion Designer', 'Fashion Designer', 'FD', 5, 'Class XI-XII/Junior College\r\n\r\nChoose arts if you’re interested in studying the humanities. Score at least 50% in your Class 12to get into a fashion college.', 'Portfolio Building\r\n\r\nDuring your college years, start building your portfolio. This will help you fare better in college and university applications. Take up art classes to better your drawing skills. This will help you bring your concepts to life through your portfolio.', 'Entrance Exam\r\n\r\nThere are several colleges that offer a Bachelors of Design course, like the National Institute of Fashion Technology (NIFT), Pearl Academy, Delhi (PAF) which requires you to have at least 50% in Class 12, Amity University which requires you to have at least 50% in Class 12, etc. These exams evaluate you on the basis of your illustration skills, your interpersonal skills, and your creativity with materials.', 'Graduation\r\n\r\nApply to the National Institute of Fashion Technology (NIFT), which offers four-year undergraduate courses in fashion designing like BDes (Bachelor of Design) in fashion design, leather design, textile design, etc.  You could also apply to Pearl Academy (Delhi), which offers a two-year diploma in Fashion Design, or Amity University for its four-year Bachelor of Design course.', 'Get a Job\r\n\r\nAfter graduation, you can work with a senior designer or set up your own business. You could also work with stores or boutiques looking for freshers. You could take up a job as a stylist or an assistant buyer; this will help you understand trends if you wish to start designing your own line of clothing.', NULL, NULL, NULL, NULL, NULL),
(11, 'Cricketer', 'Cricketer', '', 2, 'Go to the Academies ', 'And Play without any tension.', '', '', '', NULL, NULL, NULL, NULL, NULL),
(30, 'Data Structures', 'Computer Engineer', 'Prof. jignesh Vania ', 4, 'Learn Mathematics for coding\r\n\r\nhttps://youtube.com/playlist?list=PL2_aWCzGMAwLL-mEB4ef20f3iqWMGWa25', 'Practice Mathematics for coding\r\n\r\nhttps://www.geeksforgeeks.org/mathematical-algorithms/', 'Learn data Structure Array\r\n\r\nhttps://www.geeksforgeeks.org/array-data-structure/', 'Practice Array Data Structure\r\n\r\nhttps://www.geeksforgeeks.org/top-50-array-coding-problems-for-interviews/amp/#aoh=16192578209520&referrer=https%3A%2F%2Fwww.google.com&amp_tf=From%20%251%24s', '', NULL, NULL, NULL, NULL, NULL),
(35, 'Prepare DBMS', 'Computer Engineer', 'Prof. Nirbhay Ram', 3, 'Step 1 for DBMS Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero sed autem cum voluptates tempora alias rem consequuntur, illo, adipisci saepe ullam nam minima vero sequi.', 'Step 2 for DBMS Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero sed autem cum voluptates tempora alias rem consequuntur, illo, adipisci saepe ullam nam minima vero sequi.', '', '', '', NULL, NULL, NULL, NULL, NULL),
(45, 'try resource', 'Computer Engineer', 'Prof. Nirbhay Ram', 3, 'step1', 'step2', 'step3', '', '', 'r1', 'r2', 'https://www.google.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `date_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `title`, `description`, `category`, `date_time`) VALUES
(1, 'query 1', 'description of query 1', 'Computer Engineer', '0000-00-00'),
(2, 'Query 2', 'description of query 2', 'Computer Engineer', '2021-04-23'),
(8, 'c ,d c,', 'ryvijvlkl', '', '2021-04-23'),
(9, 'c ,d c,', 'ryvijvlkl', '', '2021-04-23'),
(10, 'c ,d c,', 'ryvijvlkl', '', '2021-04-23'),
(12, 'Database Management System', 'Provide a path to prepare Subject DBMS\r\n', 'Computer Engineer', '2021-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(1, 'sfre'),
(2, 'ghtu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `professionals` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `professionals`, `email`, `password`, `date_time`, `user_type`) VALUES
(3, 'Maharshi', 'Prajapati', 'MBA student', 'maharshiprajapati30@gmail.com', '$2y$12$62Nx9LuwYcpcHTIu4EUr6e3Qy..iLCGtXQsa6yGDljhxg2jOQvQ/e', '2021-03-28 14:58:35', 'Student'),
(5, 'max', 'pro', 'Computer Engineer', 'promax@gmail.com', '$2y$12$qHvx8OVcsz61IyPMpjhfJu1uxpzpHvt0KQk1XdG3YRNDp.ZM1pnsG', '2021-03-28 17:30:13', 'Faculty'),
(6, 'abc', 'def', 'BBA student', 'abc@gmail.com', '$2y$12$dLxXC9xAzfvePsDO5IwzSObxRqNaT/cs6kvZZBgVVV9BeOzvR4gPK', '2021-03-31 22:30:45', 'Student'),
(7, 'abc', 'def', 'Chemical Engineer', 'abcdef@gmail.com', '$2y$12$pNKEqgiO3jX6GZnHPfi4yO/hN7O3B/m1bA19545TH5ZdD1L1f0mgK', '2021-04-21 05:22:50', 'Student'),
(8, 'try1 f1', 'try1 l1', 'teacher', 'try@gmail.com', '$2y$12$ss4s4qvarw5LZsloi26gseBBJUALvTLVEuthAo6abmvElN.m5x6Fi', '2021-04-23 23:44:04', 'Faculty'),
(9, 'faculty', '1', 'Computer Engineer', 'faculty1@gmail.com', '$2y$12$PG1.QFfYCVOuCfC6oic8yuiIPp1Hoc1zi7lzvoi/.oTl7ab8IVzKK', '2021-04-24 02:20:45', 'Faculty'),
(10, 'faculty', '2', 'Computer Engineer', 'faculty2@gmail.com', '$2y$12$OeetJY9CCtNjofeWnK48n.0UxLtUdHk2hDF59VGXiuOVA86QIf..S', '2021-04-24 02:31:26', 'Faculty'),
(11, 'Prof. Nirbhay Ram', '3', 'Computer Engineer', 'faculty3@gmail.com', '$2y$12$CGjM0IDBgpKVzav5BKDn2eJv/kk0k8Q0zl2S2FVD.T7VzordRfCGW', '2021-04-24 02:33:51', 'Faculty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Category` (`Category`);

--
-- Indexes for table `home_data`
--
ALTER TABLE `home_data`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `home_data` ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `home_data`
--
ALTER TABLE `home_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
