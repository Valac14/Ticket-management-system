INSERT INTO `categories` (`id`, `parent_id`, `category`) VALUES
(1, 0, 'Internet access'),
(2, 0, 'Open ports'),
(3, 0, 'Link issue'),
(4, 0, 'Free wifi issue'),
(5, 1, 'New access'),
(6, 1, 'Specific URL'),
(7, 2, 'Work station shifting'),
(8, 2, 'New PC/New device'),
(9, 3, 'Link is slow'),
(10, 3, 'Link is fluctuating'),
(11, 4, 'Wifi is completly down'),
(12, 4, 'Wifi is partially working');

for IT users
INSERT INTO `categories` (`id`, `parent_id`, `category`) VALUES
(1, 0, 'Access to server'),
(2, 1, 'Server internet acces'),
(3, 1, 'Port access');



extra
(9, 3, 'Link is slow'),
(10, 3, 'Link is fluctuating'),





related parent application:
eg:- Bank XP, VKYC