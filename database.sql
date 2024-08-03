-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  `answer` varchar(60) DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,3,1,'1',1),(2,3,2,'2',1),(3,3,3,'3',1),(4,3,4,'4',1),(5,3,5,'3',1);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `query` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'shipra','shipra@gmail.com','1234456','demo query'),(2,'nidhi','nidhi@gmail.com','123456','have a query');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'HTML','HTML.png'),(2,'CSS','CSS.webp'),(3,'JS','JS.jpeg'),(4,'JQuery','JQuery.webp'),(5,'Bootstrap','Bootstrap.jpg'),(6,'Android','Android.png'),(7,'NodeJS','NodeJS.webp'),(8,'ReactJS','ReactJS.jpg');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `option1` text,
  `option2` text,
  `option3` text,
  `option4` text,
  `question` text NOT NULL,
  `correct_answer` varchar(45) DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_id` (`course_id`),
  CONSTRAINT `fk_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'5','1','3','6','How many sizes of headers are available in HTML by default?\n','4',1),(2,'.htmls\n','.h\n','.ht\n','None of the above','HTML files are saved by default with the extension?','4',1),(3,'Web browser','Text Editor','Both A and B','None of the above','To create HTML page, you need ____','3',1),(4,'id\n','class\n','type\n','None of the above','Which attribute is used to provide a unique name to an HTML element?\n','1',1),(5,'HTML ','EM','TITLE','HEAD','The BODY tag is usually used after ______','4',1),(6,'Object-Oriented\n','Object-Based\n','Procedural\n','None of the above','Javascript is an _______ language?\n','1',2),(7,'getElementbyId()\n','getElementsByClassName()','Both A and B\n','None of the above','Which of the following methods is used to access HTML elements using Javascript?\n','3',2),(8,'const\n','var\n','let\n','constant','How can a datatype be declared to be a constant type?\n','1',2),(9,'in','is in','exists','lies','What keyword is used to check whether a given property is valid or not?\n','1',2),(10,'boolean','undefined','object','integer','When an operator’s value is NULL, the typeof returned by the unary operator is:\n','3',2),(11,'background-color\n','color\n','Both A and B\n','None of the above','How can we change the background color of an element?\n','1',3),(12,'1','2','3','4','In how many ways can CSS be written in?\n','3',3),(13,'Inline\n','Internal\n','External\n','None of the above','What type of CSS is generally recommended for designing large web pages?\n','3',3),(14,'Yes\n','No\n','Depends on property\n','None of the above','Can negative values be allowed in padding property?','2',3),(15,'alpha-spacing\n','letter-spacing\n','character-spacing\n','None of the above','How can we specify the spacing between each letter in a text in CSS?\n','2',3),(16,'JavaScript Library','JSON Library','Java Library','JSON and CSS Library','jQuery is a ______ ?','1',4),(17,'HTML','CSS','JavaScript','All of the above','To work with jQuery, you should have the basic knowledge of these topics?','4',4),(18,'John Richard','John Resig','John Carter','John Alexander','Who developed jQuery?','2',4),(19,'2004','2005','2006','2007','In which year jQuery was initial released?','3',4),(20,'CSS manipulation','HTML event methods','Effects and animations','All of the above','Which feature(s) jQuery contains?','4',4),(21,' .dropdown','.select','.select-list','None of the above','Which of the following class in Bootstrap is used to create a dropdown menu?','1',5),(22,'4','6','12','8','The Bootstrap grid system is based on how many columns?','3',5),(23,'Carousel Plugin','Modal Plugin','Tooltip Plugin','None of the mentioned','Which plugin is used to cycle through elements, like a slideshow?','1',5),(24,'Rows','Containers','Columns','None of the mentioned','The content must be placed within ________ in Bootstrap.','3',5),(25,'Warning','Active','Success',' Danger','Which of the following class applies hover color to a specific row or a cell?','2',5),(26,'A type of robot','A mobile operating system','A web browser','A programming language','What is Android?','2',6),(27,'Microsoft','Apple','Android Inc.','Google','Who initially developed Android?','3',6),(28,'A type of permission','A configuration file','Android Package Kit','A debugging tool','What is an APK in Android?','3',6),(29,'Manages app memory','Synchronizes data','converts app bytecode into machine code','Manages the user interface','What does the Android Runtime (ART) do?','3',6),(30,'VirtualBox','Dalvik','JVM','ART','What is the name of Android\'s virtual machine?','2',6),(31,'REPL stands for \"Read Eval Print Loop.\"','REPL stands for \"Read Eval Print Loop.\"','REPL stands for \"Read Earn Point Learn.\"','REPL stands for \"Read Earn Point Learn.\"','What does the REPL stand for?','1',7),(32,'$ node','$ node start','$ node repl','$ node console','Which of the following command is used to start a REPL session?','1',7),(33,'JavaScript','C','C++','All of the above','In which language is Node.js written?','4',7),(34,'.js','.node','.java','.txt','Which of the following extension is used to save the Node.js files?','1',7),(35,'expose','module','exports','All of the above','The Node.js modules can be exposed using:','3',7),(36,'Server Side Framework','Client Side Framework','Both A & B','None of these','What describes the ReactJS?','2',8),(37,'Java','PHP','Javascript','None of these','ReactJS written in which language?','3',8),(38,'Database','User Interface','MVC','None of the above','Why react is mainly used for?','2',8),(39,'A JavaScript library','A CSS framework','A Python library','A PHP library','What is React?','1',8),(40,'To store static data','To store styles','To store dynamic data','To store function','What is the purpose of React state?','3',8);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating_reviews`
--

DROP TABLE IF EXISTS `rating_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rating_reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rating` varchar(100) DEFAULT NULL,
  `review` varchar(500) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `rating_reviews_ibfk` (`user_name`),
  CONSTRAINT `rating_reviews_ibfk` FOREIGN KEY (`user_name`) REFERENCES `users` (`name`) ON UPDATE CASCADE,
  CONSTRAINT `rating_reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating_reviews`
--

LOCK TABLES `rating_reviews` WRITE;
/*!40000 ALTER TABLE `rating_reviews` DISABLE KEYS */;
INSERT INTO `rating_reviews` VALUES (1,'4','nice platform',2,'gargi'),(2,'5','Edu Quiz Hub has been a fantastic resource for me as a beginner learner.',3,'shubhi'),(3,'3','just okay okay',4,'pranjul'),(4,'4','quiz feature makes the platform more interesting',5,'rakhee'),(5,'4','nice',12,'Gargi Singh');
/*!40000 ALTER TABLE `rating_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `score` varchar(20) DEFAULT NULL,
  `correct_ans` varchar(45) DEFAULT NULL,
  `wrong_ans` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
INSERT INTO `scores` VALUES (1,3,1,'1','1','4'),(2,5,3,'2','2','3'),(3,5,3,'3','3','7'),(4,5,3,'3','3','2'),(5,5,3,'1','1','4'),(6,5,4,'0','0','5'),(7,5,4,'3','3','2'),(8,13,1,'1','1','4'),(9,12,1,'4','4','1'),(10,14,1,'2','2','3'),(11,12,1,'1','1','4'),(12,15,1,'2','2','1');
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rating_reviews_ibfk_2` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'demouser','demouser@gmail.com','demo123'),(2,'gargi','gargi@gmail.com','gargi000'),(3,'shubhi','shubhi@gmail.com','shubhi000'),(4,'pranjul','pranjul@gmail.com','pranjul000'),(5,'rakhee','rakhi@gmail.com','rakhi123'),(6,'arun','arun@gmail.com','arun000'),(7,'sunain','sunaina@gmail.com','sunaina000'),(8,'shipra','shipra@gmail.com','shipra000'),(9,'shipras','shipra@gmail.com','shipra000'),(10,'user','user@gmail.com','demo123'),(11,'user1','user1@gmail.com','123456'),(12,'Gargi Singh','gargisingh170805@gmail.com','123456'),(13,'gargi','gargisingh@gmail.com','gargi123'),(14,'ashutoshcmp','ashutosh.mishra1980@gmail.com','ashu'),(15,'gargi10','gargisingh1508@gmail.com','4512'),(16,'aksha','aksha@gmail.com','1234');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int DEFAULT NULL,
  `name` varchar(65) DEFAULT NULL,
  `thumbnail` varchar(100) DEFAULT NULL,
  `youtube_link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,1,'Introduction','HTML thumb-1.jpg','XmLOwJHFHf0&list'),(2,1,'Basic Structure','HTML thumb-2.jpg','XmLOwJHFHf0&list'),(3,1,'Html Elements','HTML thumb-3.jpg','-wMbf3qVNsc'),(4,1,'Advanced Concepts','HTML thumb-4.jpg','HcOc7P5BMi4'),(5,2,'Introduction','CSS thumb-1.jpg','PVBqZRAOZL8'),(6,2,'Basic Styling','CSS thumb-2.jpg','ZT9zKm0_vDU'),(7,2,'Responsive Design','CSS thumb-3.jpg','dCz9OdZWtIQ'),(8,2,'Advanced Styling','CSS thumb-4.jpg','ESnrn1kAD4E'),(9,3,'Introduction','JS thumb-1.jpg','cyZ7kphJImQ'),(10,3,'Basic Syntax','JS thumb-2.jpg','H--s95eDRLw'),(11,3,'DOM Manipulation and Events','JS thumb-3.jpg','b5p3IzrL-lQ'),(12,3,'Advanced Concepts','JS thumb-4.jpg','R9I85RhI7Cg'),(13,4,'Introduction','JQuery thumb-1.jpg','wUJHjbN-hfQ'),(14,4,'Basic Syntax','JQuery thumb-2.jpg','QhQ4m5g2fhA'),(15,4,'Event Handling and Animation','JQuery thumb-3.jpg','qoTLWZRgD7w'),(16,4,'Advanced Concepts','JQuery thumb-4.jpg','YFlx1C8XwR0'),(17,5,'Introduction','Bootstrap thumb-1.jpg','wkSA9bfCmKU'),(18,5,'Basic Structure','Bootstrap thumb-2.jpg','sUov85SgkPY'),(19,5,'Components and Utilities:','Bootstrap thumb-3.jpg','IwlAhfeSnp8'),(20,5,'Advanced Features','Bootstrap thumb-4.jpg','vpAJ0s5S2t0'),(21,6,'Introduction','Android thumb-1.jpg ','iqI6MAsi1Xg'),(22,6,'Basic Concepts','Android thumb-2.jpg ','qK0QNA0sMGc'),(23,6,'Data Management and Storage','Android thumb-3.jpg ','hJPk50p7xwA'),(24,6,'Advanced Topics','Android thumb-4.jpg ','BxM2DayeOBE'),(25,7,'Introduction','NodeJS thumb-1.jpg','ohIAiuHMKMI'),(26,7,'Basic Concepts ','NodeJS thumb-2.jpg','_RSL3S3Anxg'),(27,7,'Core Modules','NodeJS thumb-3.jpg','FSRo41TaHFU'),(28,7,'Database Integration','NodeJS thumb-4.jpg','BLl32FvcdVM'),(29,8,'Introduction','ReactJS thumb-1.jpg','QFaFIcGhPoM'),(30,8,'Basic Concepts ','ReactJS thumb-2.jpg','SqcY0GlETPk'),(31,8,'Component Composition','ReactJS thumb-3.jpg','Y2hgEGPzTZY'),(32,8,'Advanced Topics','ReactJS thumb-4.jpg','6l8RWV8D-Yo');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-03 21:30:39
