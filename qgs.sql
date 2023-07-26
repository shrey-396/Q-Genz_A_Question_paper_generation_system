SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `courseTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `courses` (`id`, `courseTitle`) VALUES
(1, 'CSE1011');

-- --------------------------------------------------------

CREATE TABLE `generatedquestion` (
  `id` int(11) NOT NULL,
  `questionBody` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `generatedquestion` (`id`, `questionBody`) VALUES
(1, '1. What is the full form IQAC?<br/><br/><br/><br/><br/><br/><br/><br/>'),
(2, '1. What is the full form IQAC?<br/><br/>Implement a Singly LinkedList without using STL<br/><br/><br/><br/><br/><br/>'),
(3, 'What is the full form IQAC?<br/><br/>Implement a Singly LinkedList without using STL<br/><br/><br/><br/><br/><br/>');

-- --------------------------------------------------------

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `difficulty` varchar(100) NOT NULL,
  `courseName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `questions` (`id`, `question`, `difficulty`, `courseName`) VALUES
(1, 'What is the full form IQAC?', '1', 'CSE1011'),
(2, 'Implement a Singly LinkedList without using STL', '1', 'CSE1011');

-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isTeacher` int(1) NOT NULL,
  `isFetcher` int(1) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `isTeacher`, `isFetcher`, `isAdmin`) VALUES
(1, 'admin', '$2y$10$iVzHt2NAmgJybISJmjgZse.79q6TbrUMRUxquEAy/./XfvqsqT4h6', '2019-04-19 00:51:52', 1, 1, 1);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generatedquestion`
--
ALTER TABLE `generatedquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `generatedquestion`
--
ALTER TABLE `generatedquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;