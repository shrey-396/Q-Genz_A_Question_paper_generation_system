CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isTeacher` int(1) NOT NULL,
  `isFetcher` int(1) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `isTeacher`, `isFetcher`, `isAdmin`) VALUES (1, 'admin', 'admin', '2023-07-15 00:51:52', 1, 1, 1);