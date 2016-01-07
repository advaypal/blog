-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2016 at 06:46 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `content` text NOT NULL,
  `postid` int(11) NOT NULL,
  `author` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `content`, `postid`, `author`, `datetime`) VALUES
(13, 1, 'Luke, I am your father.', 17, 'darth', '2016-01-07 10:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Content` text NOT NULL,
  `userid` int(11) NOT NULL,
  `author` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `Title`, `Content`, `userid`, `author`, `datetime`) VALUES
(13, 'The Boy Who Lived', ' Mr. and Mrs. Dursley, of number four, Privet Drive, were proud to say that they were perfectly normal, thank you very much. They were the last people you''d expect to be involved in anything strange or mysterious, because they just didn''t hold with such nonsense.', 1, 'darth', '2016-01-07 08:49:24'),
(17, 'The Godfather', ' Amerigo Bonasera sat in New York Criminal Court Number 3 and waited for justice; vengeance on the men who had so cruelly hurt his daughter, who had tried to dishonor her.\r\nThe judge, a formidably heavy-featured man, rolled up the sleeves of his black robe as if to physically chastise the two young men standing before the bench. His face was cold with majestic contempt. But there was something false in all this that Amerigo Bonasera sensed but did not yet understand.\r\n\r\nâ€œYou acted like the worst kind of degenerates,â€ the judge said harshly. Yes, yes, thought Amerigo Bonasera. Animals. Animals. The two young men, glossy hair crew cut, scrubbed clean-cut faces composed into humble contrition, bowed their heads in submission.\r\n\r\nThe judge went on. â€œYou acted like wild beasts in a jungle and you are fortunate you did not sexually molest that poor girl or Iâ€™d put you behind bars for twenty years.â€ The judge paused, his eyes beneath impressively thick brows flickered slyly toward the sallow-faced Amerigo Bonasera, then lowered to a stack of probation reports before him. He frowned and shrugged as if convinced against his own natural desire. He spoke again.\r\n\r\nâ€œBut because of your youth, your clean records, because of your fine families, and because the law in its majesty does not seek vengeance, I hereby sentence you to three yearsâ€™ confinement to the penitentiary. Sentence to be suspended.â€\r\nOnly forty years of professional mourning kept the overwhelming frustration and hatred from showing on Amerigo Bonaseraâ€™s face. His beautiful young daughter was still in the hospital with her broken jaw wired together; and now these two animales went free? It had all been a farce. He watched the happy parents cluster around their darling sons. Oh, they were all happy now, they were smiling now.\r\n\r\nThe black bile, sourly bitter, rose in Bonaseraâ€™s throat, overflowed through tightly clenched teeth. He used his white linen pocket handkerchief and held it against his lips. He was standing so when the two young men strode freely up the aisle, confident and cool-eyed, smiling, not giving him so much as a glance. He let them pass without saying a word, pressing the fresh linen against his mouth.\r\n\r\nThe parents of the animales were coming by now, two men and two women his age but more American in their dress. They glanced at him, shamefaced, yet in their eyes was an odd, triumphant defiance.\r\n\r\nOut of control, Bonasera leaned forward toward the aisle and shouted hoarsely, â€œYou will weep as I have weptâ€“ I will make you weep as your children make me weepâ€â€“ the linen at his eyes now. The defense attorneys bringing up the rear swept their clients forward in a tight little band, enveloping the two young men, who had started back down the aisle as if to protect their parents. A huge bailiff moved quickly to block the row in which Bonasera stood. But it was not necessary.\r\n\r\nAll his years in America, Amerigo Bonasera had trusted in law and order. And he had prospered thereby. Now, though his brain smoked with hatred, though wild visions of buying a gun and killing the two young men jangled the very bones of his skull, Bonasera turned to his still uncomprehending wife and explained to her, â€œThey have made fools of us.â€ He paused and then made his decision, no longer fearing the cost. â€œFor justice we must go on our knees to Don Corleone.â€', 2, 'luke', '2016-01-07 10:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'darth', 'vader'),
(2, 'luke', 'skywalker'),
(3, 'yoda', 'yoda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `postid` (`postid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postid`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
