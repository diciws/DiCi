CREATE TABLE `mitglieder` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  `userip` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `devbewerber` (
  `devbewerberID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ipadress` varchar(255) NOT NULL,
  `referenz` varchar(255) NOT NULL,
  `devbereich` varchar(255) NOT NULL,
  `warumbewirbst` varchar(255) NOT NULL,
  `bewerbung` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `abschlswort` varchar(255) NOT NULL,
    PRIMARY KEY (`devbewerberID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `supbewerber` (
  `supbewerberID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ipadress` varchar(255) NOT NULL,
  `referenz` varchar(255) NOT NULL,
  `warumbewirbst` varchar(255) NOT NULL,
  `bewerbung` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `abschlswort` varchar(255) NOT NULL,
    PRIMARY KEY (`supbewerberID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
