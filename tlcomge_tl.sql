-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: tlcomge_tl
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `about_us` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `about_us_language_unique` (`language`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_us`
--

LOCK TABLES `about_us` WRITE;
/*!40000 ALTER TABLE `about_us` DISABLE KEYS */;
INSERT INTO `about_us` VALUES (2,'ka','<p>თიელის გუნდი შედგება კვალიფიციური იურისტებისაგან, რომლებმაც თავიანთი ცოდნა და გამოცდილება გააერთიანეს, რათა სრულყოფილი იურიდიული მომსახურება შეეთავაზებინათ როგორც ქართველი, ასევე უცხოელი კლიენტებისთვის.  </p><p>თიელის გუნდისათვის საზღვრები არ არსებობს. ჩვენ მზად ვართ გადავჭრათ ნებისმიერი სირთულის სამართლებრივი პრობლემა. ვპასუხობთ ყველა გამოწვევას და ვართ ხელმისაწვდომი ყოველთვის. </p><p class=\"ql-align-justify\">აქ თქვენ მიიღებთ პასუხს ნებისმიერ სამართლებრივ კითხვაზე, დააზღვევთ ყველა შესაძლო რისკს და იპოვით გამოსავალს გამოუვალ სიტუაციაში. </p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><br></p>','2021-08-28 15:11:45','2021-11-12 10:09:14'),(3,'en','<p>TL Team consists of high qualified lawyers who have united their knowledge and experience to propose perfect legal services to Georgian as well as to foreign clients.</p><p>There are no limits for TL Team. We are ready to resolve the legal problems of any complexity. We accept any kind of challenges and we are available anytime.</p><p>Here you will receive an answer to all legal questions, you will manage all possible risks. Here you will find a solution in an unsolvable situation!</p><p class=\"ql-align-justify\"><br></p>','2021-11-12 10:14:31','2022-03-14 17:24:33'),(6,'ru','<p id=\"isPasted\">Команда TL состоит из квалифицированных юристов, объединивших свои знания и опыт, чтобы предложить безупречные юридические услуги как грузинским, так и иностранным клиентам.</p><p>Для команды TL нет ограничений. Мы готовы решить юридические проблемы любой сложности. Мы принимаем любые вызовы и всегда доступны.</p><p>Здесь вы получите ответ на все юридические вопросы, вы управляете всеми возможными рисками. Здесь вы найдете выход из безвыходной ситуации!</p>','2022-03-14 17:30:06','2022-03-14 17:30:06');
/*!40000 ALTER TABLE `about_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attachmentable`
--

DROP TABLE IF EXISTS `attachmentable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attachmentable` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `attachmentable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachmentable_id` int unsigned NOT NULL,
  `attachment_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attachmentable_attachmentable_type_attachmentable_id_index` (`attachmentable_type`,`attachmentable_id`),
  KEY `attachmentable_attachment_id_foreign` (`attachment_id`),
  CONSTRAINT `attachmentable_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachmentable`
--

LOCK TABLES `attachmentable` WRITE;
/*!40000 ALTER TABLE `attachmentable` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachmentable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attachments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '0',
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hash` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `user_id` bigint unsigned DEFAULT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
INSERT INTO `attachments` VALUES (1,'17ac9c137431ffd343b6b923da97c56dcd8d632f','1.jpg','image/jpeg','jpg',218572,0,'2021/08/27/',NULL,NULL,'06617c4e210d5080fa23fdcf456fc213e14e8cc5','public',1,NULL,'2021-08-27 10:42:13','2021-08-27 10:42:13'),(2,'239da37fb8c569143a9658cf692c3db777cff88a','2.jpg','image/jpeg','jpg',1962089,0,'2021/08/27/',NULL,NULL,'be6f33ef1ff13678c269dc6243d3cf7d3418e6c6','public',1,NULL,'2021-08-27 11:20:12','2021-08-27 11:20:12'),(3,'75ce7f8a3778a39ea07fa163bf3216926d15616f','ჩვენი გუნდი.jpg','image/jpeg','jpg',1820958,0,'2021/08/27/',NULL,NULL,'50d513ccce7d866d0fa7c4dd559307a9f21b9a51','public',1,NULL,'2021-08-27 11:20:36','2021-08-27 11:20:36'),(4,'ee9e8d3d4e57950e8da9268f2ac6234740e79a5d','ჩვენ შესახებ.jpg','image/jpeg','jpg',190283,0,'2021/08/27/',NULL,NULL,'9bfa80643703c854361aea56272f6198acd0e360','public',1,NULL,'2021-08-27 11:21:03','2021-08-27 11:21:03'),(5,'a457311418443fa085c7776846b5051687c805cf','სერვისები.jpg','image/jpeg','jpg',462548,0,'2021/08/27/',NULL,NULL,'9723e9b7fe3a5880d2bdd34e4351afd5b1476033','public',1,NULL,'2021-08-27 11:21:21','2021-08-27 11:21:21'),(6,'3fde53a63e2c3287e96e3bf4addab99fd66f14aa','ბლოგი.jpg','image/jpeg','jpg',149295,0,'2021/08/27/',NULL,NULL,'97b0e26acfe4c24e8ff521947b54a8e308ff562b','public',1,NULL,'2021-08-27 11:21:46','2021-08-27 11:21:46'),(7,'39ea9f8f033749d48c5099cdffd40e19183858a7','კონტაქტი.jpg','image/jpeg','jpg',83169,0,'2021/08/27/',NULL,NULL,'390ae0fa5ead299204b3a5d90e742088bf41d6d7','public',1,NULL,'2021-08-27 11:22:05','2021-08-27 11:22:05'),(8,'fce74ce21c8f51beda79721d0da058d45b6bd8d0','blob','image/png','png',469726,0,'2021/08/27/',NULL,NULL,'167dc04042d0b847c994298742de62f4d2bba1a2','public',1,NULL,'2021-08-27 11:32:02','2021-08-27 11:32:02'),(9,'e8e30e85af4e0fb994fcb1260c78284d7b8f7d8f','blob','image/png','png',2181,0,'2021/08/27/',NULL,NULL,'17ba6ed435eaed2040560d98e401feb4c3fba38e','public',1,NULL,'2021-08-27 17:58:13','2021-08-27 17:58:13'),(10,'eacc6786230903836461b851e0635ad0d837eee1','blob','image/png','png',170852,0,'2021/08/28/',NULL,NULL,'7f7b05850fe69543bbe482760f5a0e6b595085b6','public',1,NULL,'2021-08-28 05:28:58','2021-08-28 05:28:58'),(11,'3e7af26abbab1d888119deba30ae28adb2fd4c69','blob','image/png','png',7286483,0,'2021/11/01/',NULL,NULL,'85f91ffac529060ac96aa038dd1fea343683c03e','public',1,NULL,'2021-11-01 03:34:44','2021-11-01 03:34:44'),(12,'3e7af26abbab1d888119deba30ae28adb2fd4c69','blob','image/png','png',7286483,0,'2021/11/01/',NULL,NULL,'85f91ffac529060ac96aa038dd1fea343683c03e','public',1,NULL,'2021-11-01 03:34:54','2021-11-01 03:34:54'),(13,'f4c3db1126462905d261e2d3874788d28f8fe52b','blob','image/png','png',7346965,0,'2021/11/01/',NULL,NULL,'e4593180e5f43a3236bddc740d9eaab7fb21b56d','public',1,NULL,'2021-11-01 03:34:54','2021-11-01 03:34:54'),(14,'8a498f86cd66d89a660ade89dadbd8ea6ceb0a8a','blob','image/png','png',5985768,0,'2021/11/01/',NULL,NULL,'5954940dd5ad1db8be9fc1be27810f42083a4cd2','public',1,NULL,'2021-11-01 03:35:27','2021-11-01 03:35:27'),(15,'2ef7c33b8131ee6113fa25d0e35b30138c29cce5','blob','image/png','png',8057061,0,'2021/11/01/',NULL,NULL,'d554c8b39f751e41644ccb7012efc21531d5a11f','public',1,NULL,'2021-11-01 03:38:10','2021-11-01 03:38:10'),(16,'2d50037ae8f9576b17d6e2f1fb91598d32365213','blob','image/png','png',565742,0,'2021/11/01/',NULL,NULL,'a0ee9fb133ab2e47712d8df59e1aa8f1e3ccf60f','public',1,NULL,'2021-11-01 03:56:51','2021-11-01 03:56:51'),(17,'6060d46c90af619ddf061f746699c69fabda84bd','blob','image/png','png',473303,0,'2021/11/01/',NULL,NULL,'198aff4e49f4d9e7ac3910bdaf1803ed9b5ef114','public',1,NULL,'2021-11-01 03:57:07','2021-11-01 03:57:07'),(18,'2acd1167e0824a155e0bfdb721a1d9e136e7a3c3','blob','image/png','png',421963,0,'2021/11/01/',NULL,NULL,'77fab6065468b78f7636336b762ef9fd1a29ed8d','public',1,NULL,'2021-11-01 03:58:53','2021-11-01 03:58:53'),(19,'8cfb239f1af738c4ece9da4a7a4abf2398e0c6d3','blob','image/png','png',131584,0,'2021/11/01/',NULL,NULL,'a940250ceb1ecb779de5a05df5d3ef8f43d21b4c','public',1,NULL,'2021-11-01 04:17:53','2021-11-01 04:17:53'),(20,'572d6a5b8999d09b80f52c5ff5fb66a6e308f498','blob','image/png','png',231636,0,'2021/11/01/',NULL,NULL,'489907192c726b152399f7d7853286ac68e0ed1e','public',1,NULL,'2021-11-01 04:22:46','2021-11-01 04:22:46'),(21,'572d6a5b8999d09b80f52c5ff5fb66a6e308f498','blob','image/png','png',231636,0,'2021/11/01/',NULL,NULL,'489907192c726b152399f7d7853286ac68e0ed1e','public',1,NULL,'2021-11-01 04:22:47','2021-11-01 04:22:47'),(22,'62bf9074394543c374c77f2e175079bc2f0cde40','blob','image/png','png',269488,0,'2021/11/01/',NULL,NULL,'39ae1ff5e83f809a0c8fdd476d937480a231d6cb','public',1,NULL,'2021-11-01 04:28:41','2021-11-01 04:28:41'),(23,'e302535fbd71d99218377499be30db8c94d02bfa','blob','image/png','png',237300,0,'2021/11/01/',NULL,NULL,'683bba7c65a7b50312273590398e743752d81744','public',1,NULL,'2021-11-01 04:35:50','2021-11-01 04:35:50'),(24,'6565b9b2ceb2117e8287c05f1d0c5bf78db0e8c8','blob','image/png','png',330661,0,'2021/11/01/',NULL,NULL,'f9b9d56ff855ef9e18d075d05b32e5f7ae45a02a','public',1,NULL,'2021-11-01 04:36:55','2021-11-01 04:36:55'),(25,'df0c5e222f72d08c2ead5af4c7d21599301e58ad','blob','image/png','png',313398,0,'2021/11/01/',NULL,NULL,'c03011e41504343659a7ebfb0245ec3c219340de','public',1,NULL,'2021-11-01 04:39:08','2021-11-01 04:39:08'),(26,'ef009dfb6b9608941596630584f2f976413faba6','blob','image/png','png',325780,0,'2021/11/01/',NULL,NULL,'cc76ae6580fb9fa9873a3c21b4c446d2f3504b1a','public',1,NULL,'2021-11-01 04:43:53','2021-11-01 04:43:53'),(27,'9443c1eb87f2cfa800de60888d4819eac927b0c7','blob','image/png','png',321933,0,'2021/11/01/',NULL,NULL,'56a6339d916066b111d09851130c6e3708e432fa','public',1,NULL,'2021-11-01 04:48:05','2021-11-01 04:48:05'),(28,'bc401ef54a0eb720749b73296346b3bd0b099eda','blob','image/png','png',231122,0,'2021/11/01/',NULL,NULL,'8b5d88f291f676b66c893095fa957c3dfd232955','public',1,NULL,'2021-11-01 04:51:09','2021-11-01 04:51:09'),(29,'5b277752ca14d73e1507fe4ca6d007e1ad178ca4','blob','image/png','png',182593,0,'2021/11/01/',NULL,NULL,'83e601463c7f810266e90c7f909327d5f927a56f','public',1,NULL,'2021-11-01 04:53:20','2021-11-01 04:53:20'),(30,'df8942a1503075c31dee230858184f339a2cce39','blob','image/png','png',223227,0,'2021/11/01/',NULL,NULL,'4f6c833d955ae1ad145b76d68167035b54343a64','public',1,NULL,'2021-11-01 04:55:16','2021-11-01 04:55:16'),(31,'e40074e7fbbb53982ac7140cf655658235109039','blob','image/png','png',208411,0,'2021/11/01/',NULL,NULL,'11d81a270daf5869824c8537ee16e17bbc4e72a1','public',1,NULL,'2021-11-01 04:56:42','2021-11-01 04:56:42'),(32,'088caf50b301306d885abff37c8aedc0cbab6420','blob','image/png','png',340378,0,'2021/11/01/',NULL,NULL,'13738c6e52e6fcd2eb63f68bf8921083da04ea10','public',1,NULL,'2021-11-01 04:58:15','2021-11-01 04:58:15'),(33,'56f31acf4351b6d72e773bb25ec80c744201c599','blob','image/png','png',34331,0,'2021/11/01/',NULL,NULL,'6dc376833f001afca3c14ba504ad4ccf15304a4d','public',1,NULL,'2021-11-01 05:01:30','2021-11-01 05:01:30'),(34,'27c6adf642b8e46389cdb6fd00b5468d1b42a7fd','blob','image/png','png',214924,0,'2021/11/01/',NULL,NULL,'30f70250e85dbf191aabd0b6c9ceb02892185cc5','public',1,NULL,'2021-11-01 05:02:19','2021-11-01 05:02:19'),(35,'5b870c3f3c09ad4305419f0accc0963044fa0a63','blob','image/png','png',244018,0,'2021/11/01/',NULL,NULL,'c8452fbc8ae44096b67ee3b2cd28d744b136b90b','public',1,NULL,'2021-11-01 05:28:23','2021-11-01 05:28:23'),(36,'9e68b83dccb0d3844898ccd7ea1423a8ce1c968c','blob','image/png','png',292067,0,'2021/11/01/',NULL,NULL,'c07e062582374f2322f7b0e89a4f1259005116cb','public',1,NULL,'2021-11-01 07:22:45','2021-11-01 07:22:45'),(37,'2306ae37133b656b34e05c6328693f68ac1c6802','COVID19_HumanRights.jpg','image/jpeg','jpg',232366,0,'2021/11/01/',NULL,NULL,'8035ead5fb2f7dbe711aeb4da1387e1d97034b07','public',1,NULL,'2021-11-01 07:26:32','2021-11-01 07:26:32'),(38,'2306ae37133b656b34e05c6328693f68ac1c6802','COVID19_HumanRights.jpg','image/jpeg','jpg',232366,0,'2021/11/01/',NULL,NULL,'8035ead5fb2f7dbe711aeb4da1387e1d97034b07','public',1,NULL,'2021-11-01 07:27:31','2021-11-01 07:27:31'),(39,'e1e0970e71fe6558135a30575048f45294b51473','blob','image/png','png',249622,0,'2021/11/01/',NULL,NULL,'b07bd5c6a3656bdeceded82d2825214adcd21abb','public',1,NULL,'2021-11-01 07:29:26','2021-11-01 07:29:26'),(40,'0e974c854d52a570379174178392f443e90c6d05','blob','image/png','png',257072,0,'2021/11/01/',NULL,NULL,'649ff01c6095c1987eac70e35eb951c6e343fcfc','public',1,NULL,'2021-11-01 07:30:47','2021-11-01 07:30:47'),(42,'a834d0aba40fd5f0b508e67ed7ed2f4df029ce80','test.bat','application/x-msdownload','bat',196,0,'2021/11/27/',NULL,NULL,'6214f0df6770b0bfa135dcf0c027242951de380c','public',1,NULL,'2021-11-26 20:04:00','2021-11-26 20:04:00'),(43,'a834d0aba40fd5f0b508e67ed7ed2f4df029ce80','test.bat','application/x-msdownload','bat',196,0,'2021/11/27/',NULL,NULL,'6214f0df6770b0bfa135dcf0c027242951de380c','public',1,NULL,'2021-11-26 20:20:33','2021-11-26 20:20:33'),(44,'293647e324406e52e68f614f5360915f8983d2d0','Screenshot_4.png','image/png','png',1753876,0,'2021/11/27/',NULL,NULL,'4f7e95619f7d516a7c8f5e4b255495bd7a34ea5e','public',1,NULL,'2021-11-26 20:21:00','2021-11-26 20:21:00'),(45,'4814b46dea32143d28228cb1f2b37b8db02a03f4','დიმიტრი_გულუა.doc','application/msword','doc',113152,0,'2021/11/27/',NULL,NULL,'9cf027c555897f321da11313c6f0030e9d98f140','public',1,NULL,'2021-11-26 20:21:11','2021-11-26 20:21:11'),(46,'b938808a74ce8c2d99532fe5a7d549329940e0cf','jenkins.bat','application/x-msdownload','bat',95,0,'2021/11/28/',NULL,NULL,'073cb9da5a8419b4c844ec30cc2db84188630fb7','public',1,NULL,'2021-11-28 09:57:06','2021-11-28 09:57:06'),(47,'55912004e2f2168df0813fb1ca4e7974589f33e2','Screenshot_3.png','image/png','png',145792,0,'2021/11/28/',NULL,NULL,'762d264131768fa1dbad7b6a9cc6ca2c986d5c88','public',1,NULL,'2021-11-28 10:04:11','2021-11-28 10:04:11'),(48,'c5559c5141aa54af62a85b46bf51fe50c6afe903','tes.py','text/x-python','py',2182,0,'2021/11/28/',NULL,NULL,'180e7af3e5e33236a7f367b3f285a4d757c8b885','public',1,NULL,'2021-11-28 10:04:18','2021-11-28 10:04:18'),(49,'2840de84ff95da26b6b1614c75938dc7fac87f2c','jhjhjhjhhhhhhhhhhhhhhhhhhhhhhhhh.png','image/png','png',870675,0,'2021/11/28/',NULL,NULL,'6699987f6d26ca5daa1dfe75106edd7c986034b7','public',1,NULL,'2021-11-28 16:19:37','2021-11-28 16:19:37'),(50,'06eb5b12c862d9d12eaa60f54e6d3b919575cb49','test.groovy','text/x-groovy','groovy',3234,0,'2021/11/28/',NULL,NULL,'c1ef470b26a2c778465ad893c6a1124cf9d9475a','public',1,NULL,'2021-11-28 16:19:45','2021-11-28 16:19:45'),(51,'bdabafc1c6197f7669f5a50bad4cec55120c836b','242993605_444509236970368_2557274526649097326_n.jpg','image/jpeg','jpg',370785,0,'2021/11/28/',NULL,NULL,'0e4286d260bb42712f9b038a125ec7570644da93','public',1,'files','2021-11-28 16:58:17','2021-11-28 16:58:17'),(53,'6ee8006fc655d70e0b1cdc84872dbdde0e31a199','FirstRestProject.xml','application/xml','xml',4957,0,'2021/11/28/',NULL,NULL,'f32d261e4ebdcfcc63ecfbcbdfe6312902275a78','public',1,'files','2021-11-28 17:06:54','2021-11-28 17:06:54'),(54,'01aeb856f31e411ff8b194ca120b2fbf5f2f450f','calculator.xml','application/xml','xml',24591,0,'2021/11/28/',NULL,NULL,'9c653d9e0d0bc8aa45245b43a7e6716f77e2a99a','public',1,'files','2021-11-28 19:11:57','2021-11-28 19:11:57'),(55,'4956330bbcf54eae19ab3e93896f4fee0fab1f1a','Layer 2.png','image/png','png',5710733,0,'2021/11/29/',NULL,NULL,'c1142d8483ae2f22159b823321531674df856840','public',1,'files','2021-11-28 20:56:17','2021-11-28 20:56:17'),(56,'293647e324406e52e68f614f5360915f8983d2d0','Screenshot_4.png','image/png','png',1753876,0,'2021/11/27/',NULL,NULL,'4f7e95619f7d516a7c8f5e4b255495bd7a34ea5e','public',1,'files','2021-11-28 21:30:44','2021-11-28 21:30:44'),(57,'1d5f5e2ddfb44b820db0acf27c5d09af517465cc','Screenshot_9.png','image/png','png',841497,0,'2021/11/29/',NULL,NULL,'b2ccac5da8617ec09a8a1f328fb75f32e62af95a','public',1,'files','2021-11-28 21:30:50','2021-11-28 21:30:50'),(58,'51c27f5ee3f45e5b6726c2089504937ddf262a3b','0001-scaled.jpg','image/jpeg','jpg',648886,0,'2021/12/02/',NULL,NULL,'4854c7359c5fdde95bac4e8458a586a4e990e3d4','public',1,'files','2021-12-02 02:31:08','2021-12-02 02:31:08'),(59,'6363652f0e510bd31b2c59f72d3291083bd00686','testingh_tllaw.sql','application/sql','sql',133985,0,'2021/12/02/',NULL,NULL,'14bb8388809d5633e0ab9c6ebb4b3e39bf92de0d','public',1,'files','2021-12-02 02:59:39','2021-12-02 02:59:39'),(60,'6363652f0e510bd31b2c59f72d3291083bd00686','testingh_tllaw.sql','application/sql','sql',133985,0,'2021/12/02/',NULL,NULL,'14bb8388809d5633e0ab9c6ebb4b3e39bf92de0d','public',1,'files','2021-12-02 03:14:09','2021-12-02 03:14:09'),(61,'7963a95913189c8048b272154824b0e8a2bef577','Lecture 2 -2021 .pdf','application/pdf','pdf',1537632,0,'2022/01/02/',NULL,NULL,'12658cd82c036de7569b8b80990d68b8401be7b2','public',2,'files','2022-01-02 13:24:50','2022-01-02 13:24:50'),(62,'3d637d4165576889c7257ce7195cac8d2c204296','Developing Market Presence_Assignment_Tamar Gulua_208070182.pdf','application/pdf','pdf',534234,0,'2022/01/17/',NULL,NULL,'86acf5a555eac1083083e5ca09fabe95ba4b6ba2','public',1,'files','2022-01-17 04:49:27','2022-01-17 04:49:27'),(63,'94d0681fb3cace0acf8e78c56ab434bc3ce3743c','მედიაფაილი - Police Raids.pdf','application/pdf','pdf',1786700,0,'2022/01/17/',NULL,NULL,'0eea69205e254008f5f1112b5428d9876681f2c2','public',1,'files','2022-01-17 04:50:57','2022-01-17 04:50:57'),(64,'c2a1cf9fce1e1937ce6298dcafc6a22388c793ed','test.txt','text/plain','txt',0,0,'2022/01/18/',NULL,NULL,'da39a3ee5e6b4b0d3255bfef95601890afd80709','public',2,'files','2022-01-18 05:21:01','2022-01-18 05:21:01'),(65,'94d0681fb3cace0acf8e78c56ab434bc3ce3743c','მედიაფაილი - Police Raids.pdf','application/pdf','pdf',1786700,0,'2022/01/17/',NULL,NULL,'0eea69205e254008f5f1112b5428d9876681f2c2','public',1,'files','2022-01-23 08:23:07','2022-01-23 08:23:07'),(66,'c2a1cf9fce1e1937ce6298dcafc6a22388c793ed','test.pptx','text/plain','txt',0,0,'2022/01/18/',NULL,NULL,'da39a3ee5e6b4b0d3255bfef95601890afd80709','public',2,'files','2022-01-23 15:20:59','2022-01-23 15:20:59'),(67,'43f23da5f5cffb456be1be849ab782d1f983cf6e','blob','image/png','png',63292,0,'2022/01/23/',NULL,NULL,'892258422edfa351483fa3bda1067bdfd7db47da','public',2,NULL,'2022-01-23 15:22:27','2022-01-23 15:22:27'),(68,'c2a1cf9fce1e1937ce6298dcafc6a22388c793ed','test.pptx','text/plain','txt',0,0,'2022/01/18/',NULL,NULL,'da39a3ee5e6b4b0d3255bfef95601890afd80709','public',2,'files','2022-01-23 15:22:42','2022-01-23 15:22:42'),(69,'43f23da5f5cffb456be1be849ab782d1f983cf6e','blob','image/png','png',63292,0,'2022/01/23/',NULL,NULL,'892258422edfa351483fa3bda1067bdfd7db47da','public',2,NULL,'2022-01-23 15:23:14','2022-01-23 15:23:14'),(70,'c2a1cf9fce1e1937ce6298dcafc6a22388c793ed','test.pptx','text/plain','txt',0,0,'2022/01/18/',NULL,NULL,'da39a3ee5e6b4b0d3255bfef95601890afd80709','public',2,'files','2022-01-23 15:23:26','2022-01-23 15:23:26'),(71,'94d0681fb3cace0acf8e78c56ab434bc3ce3743c','მედიაფაილი - Police Raids.pdf','application/pdf','pdf',1786700,0,'2022/01/17/',NULL,NULL,'0eea69205e254008f5f1112b5428d9876681f2c2','public',1,'files','2022-01-23 15:30:36','2022-01-23 15:30:36'),(72,'94d0681fb3cace0acf8e78c56ab434bc3ce3743c','მედიაფაილი - Police Raids.pdf','application/pdf','pdf',1786700,0,'2022/01/17/',NULL,NULL,'0eea69205e254008f5f1112b5428d9876681f2c2','public',1,'files','2022-01-23 15:32:12','2022-01-23 15:32:12'),(73,'6b9da298482c8120b81a5a7bb56faade111e03f7','2019giz-ge-corporate-law-handbook.pdf','application/pdf','pdf',1711638,0,'2022/01/25/',NULL,NULL,'935d3c3abe2a14b84ab780399827009f9cf9ce13','public',1,'files','2022-01-25 10:06:58','2022-01-25 10:06:58'),(74,'153ab2e881fdae42cde6c48ac3981a6414dd2e01','blob','image/png','png',267919,0,'2022/01/25/',NULL,NULL,'ee6ce2f15f217dae603c7b679568af15ec69f813','public',1,NULL,'2022-01-25 10:07:16','2022-01-25 10:07:16'),(75,'3420f1b9d64ab515c53c0d9eb72d6971d8dd6089','blob','image/png','png',215290,0,'2022/02/19/',NULL,NULL,'cbaf2405207852c079774b53d6764ce730b59bbe','public',1,NULL,'2022-02-19 06:47:04','2022-02-19 06:47:04'),(76,'c2a1cf9fce1e1937ce6298dcafc6a22388c793ed','test.pptx','text/plain','txt',0,0,'2022/01/18/',NULL,NULL,'da39a3ee5e6b4b0d3255bfef95601890afd80709','public',1,'files','2022-02-19 06:47:21','2022-02-19 06:47:21'),(77,'656f11defc9e0ab195cf59fdc93b5039803fb0e4','blob','image/png','png',220315,0,'2022/02/19/',NULL,NULL,'905cddecccbac42187673b0614dee7323e4caba2','public',1,NULL,'2022-02-19 06:49:26','2022-02-19 06:49:26'),(79,'f34a529867f622a511f94d416ed2ed37837b3c35','Hooked.pdf','application/pdf','pdf',2289458,0,'2022/02/19/',NULL,NULL,'2c936ac66c6ce9ad286cae4bde9c9e5e6ea59592','public',1,'files','2022-02-19 06:50:08','2022-02-19 06:50:08'),(80,'9df3446054b66b11d63763822937a505c661eaba','blob','image/png','png',212890,0,'2022/02/19/',NULL,NULL,'b284dd53779071fdef216787b1a5db4e1adf10b1','public',1,NULL,'2022-02-19 06:51:23','2022-02-19 06:51:23'),(81,'aced72fdf294cca4ff0c578e1da2f771f6de760d','test.php','application/x-php','php',1671,0,'2022/02/19/',NULL,NULL,'392705a6fd91846001bc21da8ce95b8bfb6d68f0','public',1,'files','2022-02-19 06:51:44','2022-02-19 06:51:44'),(82,'c32d6ab9b3b91d4b1f0e4c232debd0d99a546ea7','blob','image/png','png',205817,0,'2022/02/19/',NULL,NULL,'ad3e912f68d6228cc1889fe5e54622151d5b67ce','public',1,NULL,'2022-02-19 06:55:17','2022-02-19 06:55:17'),(83,'01aeb856f31e411ff8b194ca120b2fbf5f2f450f','calculator.xml','application/xml','xml',24591,0,'2021/11/28/',NULL,NULL,'9c653d9e0d0bc8aa45245b43a7e6716f77e2a99a','public',1,'files','2022-02-19 06:55:24','2022-02-19 06:55:24'),(84,'9029d26c90046731655da3f327473c8668bed93e','blob','image/png','png',218135,0,'2022/02/19/',NULL,NULL,'c0d56f7ceaff50fe6affc81ce38a921b010802ee','public',1,NULL,'2022-02-19 07:13:49','2022-02-19 07:13:49'),(85,'240a134f27ed44f793dba6a32c832643838c41f1','blob','image/png','png',93997,0,'2022/02/19/',NULL,NULL,'9a4b43ec85f6c8a0990d717dfe181a1386e27981','public',1,NULL,'2022-02-19 07:14:01','2022-02-19 07:14:01'),(86,'5c17ca21d477f5ee720ab5928ba7d4a40c24376b','blob','image/png','png',179313,0,'2022/02/20/',NULL,NULL,'b6c7aed1183395b791209cd3f884df17f2387989','public',1,NULL,'2022-02-20 10:41:05','2022-02-20 10:41:05'),(87,'b7426e8d6d6766f09fca43a8b50934e3fc913736','blob','image/png','png',220345,0,'2022/02/20/',NULL,NULL,'fe7c90cac8ab514dd9184e404edfed52004ece7d','public',1,NULL,'2022-02-20 10:50:12','2022-02-20 10:50:12'),(88,'b7426e8d6d6766f09fca43a8b50934e3fc913736','blob','image/png','png',220345,0,'2022/02/20/',NULL,NULL,'fe7c90cac8ab514dd9184e404edfed52004ece7d','public',1,NULL,'2022-02-20 10:56:10','2022-02-20 10:56:10');
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `background_images`
--

DROP TABLE IF EXISTS `background_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `background_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `background_images_page_url_unique` (`page_url`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `background_images`
--

LOCK TABLES `background_images` WRITE;
/*!40000 ALTER TABLE `background_images` DISABLE KEYS */;
INSERT INTO `background_images` VALUES (2,'about','2021/08/27/ee9e8d3d4e57950e8da9268f2ac6234740e79a5d.jpg','2021-08-27 11:20:17','2021-08-27 11:21:08'),(3,'team','2021/08/27/75ce7f8a3778a39ea07fa163bf3216926d15616f.jpg','2021-08-27 11:20:41','2021-08-27 11:20:41'),(4,'services','2021/08/27/a457311418443fa085c7776846b5051687c805cf.jpg','2021-08-27 11:21:29','2021-08-27 11:21:29'),(5,'blog','2021/08/27/3fde53a63e2c3287e96e3bf4addab99fd66f14aa.jpg','2021-08-27 11:21:55','2021-08-27 11:21:55'),(6,'contact','2021/08/27/39ea9f8f033749d48c5099cdffd40e19183858a7.jpg','2021-08-27 11:22:07','2021-08-27 11:22:07'),(7,'/','background_images/622fbac6e7eb1_17ac9c137431ffd343b6b923da97c56dcd8d632f.jpg','2022-03-14 17:59:34','2022-03-14 17:59:34');
/*!40000 ALTER TABLE `background_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'sadasd','adskja@ajdna.com','akndsakjnd','kjasndkjanskdjna','2021-08-27 02:00:36','2021-08-27 02:00:36'),(2,'Jamesked','no-replyIncurnesace@gmail.com','A new way of advertising.','Hi!  testingheisenberg.com.ge \r\n \r\nWe suggesting \r\n \r\nSending your commercial proposal through the feedback form which can be found on the sites in the contact partition. Contact form are filled in by our program and the captcha is solved. The superiority of this method is that messages sent through feedback forms are whitelisted. This method increases the chances that your message will be open. \r\n \r\nOur database contains more than 27 million sites around the world to which we can send your message. \r\n \r\nThe cost of one million messages 49 USD \r\n \r\nFREE TEST mailing Up to 50,000 messages. \r\n \r\n \r\nThis message is created automatically.  Use our contacts for communication. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWe only use chat.','2021-10-08 23:06:35','2021-10-08 23:06:35'),(3,'Mohammed Koofee','noormohammedali966@gmail.com','Help is Needed','Hello Dear, \r\nAs-salamu alaykum \r\nFirst let me introduce myself, My name is Noor Mohammed Ali Al-Koofee from Iraq. \r\n \r\nI am married in Saudi Arabia. My Husband has been domestically abusive lately, the rate of abuse has attracted public attention since 2019 after a popular television presenter, Rania al-Baz, was severely beaten by her own husband too, I am interested in investing in your country through your personal guidelines. Before the Covid-19 Pandemic started, I saved a total of $20 Million currently deposited in the bank ready to be wire transferred to your country for possible investment & migration opportunities. \r\n \r\nIf interested, kindly contact me to send all proof of funds for your consideration. I cannot say everything here but I can be reached directly on WhatsApp only: +966592291747, or mailto:contact@noormohammedali.com or Email: noormohammedali966@gmail.com \r\n \r\nSincerely yours, \r\nNoor Mohammed Ali Al-Koofee \r\nSaudi Arabia','2021-10-20 04:09:35','2021-10-20 04:09:35'),(4,'Andrew Goldenberge','martinbr@consultant.com','Please feel free to contact us at anytime if you need loan or partnership from us.','Hello, \r\nWe provide funding through our venture capital company to both start-up and existing companies either looking for funding for expansion or to accelerate growth in their company. \r\n \r\nWe have a structured joint venture investment plan in which we are interested in an annual return on investment not more than 10% ROI. \r\n \r\nWe are also currently structuring a convertible debt and loan financing of 3% interest repayable annually with no early repayment penalties. \r\n \r\nIf you have a business plan or executive summary I can review to understand a much better idea of your business and what you are looking to do, this will assist in determining the best possible investment structure we can pursue and discuss more extensively. \r\n \r\nIf you are interested in any of the above, kindly respond to us via this email andrew.goldenberg@castleprojectservicesltd.com \r\n \r\nI wait to hear from you. \r\n \r\nSincerely, \r\n \r\nAndrew Goldenberge \r\n \r\nInvestment/Wealth Manager \r\nCastle Project Services Ltd. \r\nE-Mail: andrew.goldenberg@castleprojectservicesltd.com','2021-10-20 12:34:40','2021-10-20 12:34:40'),(5,'Mike Wallace','no-replyst@gmail.com','Strengthen your Domain Authority','Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your website? \r\nHaving a high DA score, always helps \r\n \r\nGet your testingheisenberg.com.ge to have a DA between 50 to 60 points in Moz with us today and reap the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.strictlydigital.net/product/moz-da50-seo-plan/ \r\n \r\nOn SALE: \r\nhttps://www.strictlydigital.net/product/ahrefs-dr60/ \r\n \r\n \r\nThank you \r\nMike Wallace','2021-10-22 06:15:49','2021-10-22 06:15:49'),(6,'Donald Cole','lanj7962@gmail.com','Partnership','Good day \r\n \r\nI contacted you some days back seeking your cooperation in a matter regarding funds worth $24 Million, I urge you to  get back to me through this email coledd11@cloedcolela.com if you\'re still interested. \r\n \r\nI await your response. \r\n \r\nThanks, \r\n \r\nDonald Cole','2021-10-22 17:38:45','2021-10-22 17:38:45'),(7,'Mike Babcock','no-replyst@gmail.com','Local SEO for more business','Hi there \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Babcock\r\n \r\nSpeed SEO Digital Agency','2021-10-25 15:56:15','2021-10-25 15:56:15'),(8,'Mike Baldwin','no-replyst@gmail.com','cheap monthly SEO plans','Hi there \r\n \r\nI have just verified your SEO on  testingheisenberg.com.ge for its SEO Trend and saw that your website could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\nregards \r\nMike Baldwin\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de','2021-11-03 20:08:31','2021-11-03 20:08:31'),(9,'Mike Johnson','no-replyst@gmail.com','Get more dofollow backlinks for testingheisenberg.com.ge','Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Johnson\r\n \r\nsupport@digital-x-press.com','2021-11-08 10:40:33','2021-11-08 10:40:33'),(10,'Charlesned','georgiyfrolov1999364yfi+qy@bk.ru','Test, just a test','testingheisenberg.com.ge gbuihswdiwyfuwhdiwfbujdaodhwifwjdaqidhwufwudjqvbcnxsiwdui','2021-11-11 17:18:36','2021-11-11 17:18:36'),(11,'Mike Thomson','no-replyst@gmail.com','Strengthen your Domain Authority','Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your website? \r\nHaving a high DA score, always helps \r\n \r\nGet your testingheisenberg.com.ge to have a DA between 50 to 60 points in Moz with us today and reap the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.strictlydigital.net/product/moz-da50-seo-plan/ \r\n \r\nOn SALE: \r\nhttps://www.strictlydigital.net/product/ahrefs-dr60/ \r\n \r\n \r\nThank you \r\nMike Thomson','2021-11-15 22:31:30','2021-11-15 22:31:30');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'ideebi.rtf','C:\\Users\\dimit\\Desktop\\myWebsites\\tl\\tl\\storage\\app/public/files/','2022-03-13 12:16:37','2022-03-13 12:16:37'),(2,'libraries.txt','C:\\Users\\dimit\\Desktop\\myWebsites\\tl\\tl\\storage\\app/public/files/','2022-03-13 12:16:37','2022-03-13 12:16:37'),(3,'ideebi.rtf','files/622e193f77fe1_Layer 2.png','2022-03-13 12:18:07','2022-03-13 12:18:07'),(4,'libraries.txt','files/622e193f77fe1_Layer 2.png','2022-03-13 12:18:07','2022-03-13 12:18:07'),(5,'New Text Document (2).txt','files/622e1e3d8c5f3_New Text Document (2).txt','2022-03-13 12:39:25','2022-03-13 12:39:25'),(6,'New Text Document.txt','files/622e1e3d95404_New Text Document.txt','2022-03-13 12:39:25','2022-03-13 12:39:25'),(7,'New Text Document (2).txt','files/622e1f4937b20_New Text Document (2).txt','2022-03-13 12:43:53','2022-03-13 12:43:53'),(8,'New Text Document.txt','files/622e1f49403dd_New Text Document.txt','2022-03-13 12:43:53','2022-03-13 12:43:53'),(9,'calculator.xml','files/622edd0012419_calculator.xml','2022-03-14 02:13:20','2022-03-14 02:13:20'),(19,'soapUI-homework-soapui-project.xml','files/622f77148074a_soapUI-homework-soapui-project.xml','2022-03-14 13:10:44','2022-03-14 13:10:44'),(20,'test.jmx','files/622f771488086_test.jmx','2022-03-14 13:10:44','2022-03-14 13:10:44'),(21,'test3.py','files/622f771489bd9_test3.py','2022-03-14 13:10:44','2022-03-14 13:10:44'),(22,'tmp.txt','files/622f77148b4d4_tmp.txt','2022-03-14 13:10:44','2022-03-14 13:10:44'),(23,'Untitled-1.xml','files/622f77148d566_Untitled-1.xml','2022-03-14 13:10:44','2022-03-14 13:10:44'),(24,'useful_tor_links.txt','files/622f77148edcc_useful_tor_links.txt','2022-03-14 13:10:44','2022-03-14 13:10:44'),(26,'Untitled-1.xml','files/622f98b91637d_Untitled-1.xml','2022-03-14 15:34:17','2022-03-14 15:34:17'),(27,'useful_tor_links.txt','files/622f98b917de1_useful_tor_links.txt','2022-03-14 15:34:17','2022-03-14 15:34:17');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2015_04_12_000000_create_orchid_users_table',1),(4,'2015_10_19_214424_create_orchid_roles_table',1),(5,'2015_10_19_214425_create_orchid_role_users_table',1),(6,'2016_08_07_125128_create_orchid_attachmentstable_table',1),(7,'2017_09_17_125801_create_notifications_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1),(9,'2021_05_15_203542_create_posts_table',1),(10,'2021_05_18_161757_create_services_table',1),(11,'2021_05_23_103404_create_services_content_table',1),(12,'2021_05_25_091649_create_teams_table',1),(13,'2021_06_02_040801_create_contact_table',1),(14,'2021_06_02_173507_create_background_images_table',1),(15,'2021_06_07_110033_create_about_us_table',1),(16,'2021_06_10_100040_create_feedback_table',1),(17,'2022_03_13_145557_create_files_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title_ka` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ka` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ka` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ru` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'პანდემია და ადამიანის უფლებები','პანდემიის კონტექსტში დაწესებული შეზღუდვებისა და ვალდებულებების კანონიერების სამართლებრივი შეფასება','<p class=\"ql-align-justify\"><img src=\"http://testingheisenberg.com.ge/storage/2021/11/01/2306ae37133b656b34e05c6328693f68ac1c6802.jpg\"></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">ბოლოდროინდელი ყველასათვის მოულოდნელად განვითარებული მოვლენებისა და საყოველთაო პანდემიის ფონზე, სიცოცხლისა და ჯანმრთელობის დაცვის პარალელურად, უფრო და უფრო აქტუალური ხდება პირთა სამართლებრივი დაცვის საკითხები. კერძოდ, პანდემიასთან ბრძოლა ხშირ შემთხვევაში პირდაპირ ან ირიბად ხელყოფს კონსტიტუციით დაცულ ადამიანის ფუნდამენტურ უფლებებს, როგორიცაა არჩევანის თავისუფლება, თავისუფალი გადაადგილების უფლება, პირადი ცხოვრების ხელშეუხებლობა და სხვ.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">ყველას კარგად გვახსოვს უახლოეს წარსულში არსებული და დღეისათვის ნაწილობრივ ისევ მოქმედი შეზღუდვები, რომლებიც სხვადასხვა დროს, ვირუსის გავრცელების ინტენსივობისა და არეალის გათვალისწინებით, სხვადასხვა ფორმითა და ხარისხით გვევლინებოდა. ამასთან, არსებული რთული ეპიდემიოლოგიური ვითარების გათვალისწინებით, რომლის დასასრულის პროგნოზირება როგორც საქართველოში, &nbsp;ისე დანარჩენ მსოფლიოში, ჯერ კიდევ რთულია, სულ უფრო ხშირად საუბრობენ მომავალში მოსალოდნელ შეზღუდვებზე, შეზღუდვების დიფერენცირებაზე აცრილებსა და აუცრელებს შორის თუ იძულებით ვაქცინაციაზე.&nbsp;</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">ყოველივე ზემოაღნიშნული მოსახლეობაში არსტაბილურობისა და გაურკვევლობის განცდას ბადებს, რაც კიდევ უფრო &nbsp;მწვავედ მოქმედებს იზოლაციისა და კარანტინის, მძიმე ეკონომიკური ვითარებისა და საზოგადოების პოლარიზაციის &nbsp;გამო ისედაც გადაღლილი ადამიანების მენტალურ ჯანმრთელობაზე. შესაბამისად, <strong><em>მნიშვნელოვანია, ვიცოდეთ, თუ სად მთავრდება ჩვენი, როგორც მოქალაქის, როგორც დასაქმებულის ან პირიქით, როგორც&nbsp;დამსაქმებლის უფლებები და თუმცა მკვეთრი ზღვრის გავლება და გადაჭრის უნიკალური გზების შემუშავება ყოველთვის შეუძლებელია შემთხვევათა მრავალფეროვნებისა და ინდივიდუალობის გათვალისწინებით, მოცემული სტატია დაგეხმარებათ ზოგადი წარმოდგენა შეიქმნათ არა მხოლოდ საქართველოს, არამედ საერთაშორისო სამართლებრივ გამოცდილებაზე პანდემიასთან დაკავშირებით.</em></strong> </p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">აღსანიშნავია, რომ ახალი კორონავირუსის წინააღმდეგ ბრძოლის მიზნით ადამიანის ფუნდამენტურ უფლებებში ჩარევაზე, საქართველოს მოქალაქეთა სარჩელებთან დაკავშირებით იმსჯელა საქართველოს საკონსტიტუციო სასამართლომ და <strong>დაადგინა</strong><a href=\"about:blank\" rel=\"noopener noreferrer\" target=\"_blank\"><strong>[1]</strong></a><strong>,</strong> რომ სახელმწიფოს მიერ პირთა ძირითადი უფლებების შეზღუდვა ყოველთვის ვერ იქნება მიჩნეული არალეგიტიმურად და ის შეიძლება ემსახურებოდეს სხვა, არანაკლებ მნიშვნელოვანი სამართლებრივი სიკეთეების დაცვას. შესაბამისად, პირობითად, გადაადგილების უფლების შეზღუდვის ლეგიტიმურობის შეფასებისას მხედველობაში უნდა იქნას მიღებული სხვადასხვა მნიშვნელოვანი ფაქტორი, მათ შორის, პირისთვის კონკრეტული სივრცის დატოვების აკრძალვის მიზნები, მისი სამართლებრივი სტატუსი, პირის მოქმედების თავისუფლებისა და მის ნებაზე ზემოქმედების მასშტაბი და ა.შ. </p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">ცალკე საკითხია, რამდენად სწორი იყო სასამართლოს პოზიცია იმასთან დაკავშირებით, თუ რა ფორმით უნდა გამოცემულიყო უფლებათა შემზღუდავი ნორმები და რამდენად იყო საქართველოს მთავრობა უფლებამოსილი, გრძელვადიანი პერსპექტივით შეეთავსებინა ქვეყნის საკანონმდებლო ორგანოს ექსკლუზიური უფლებამოსილებანი. <strong>სასამართლოს პოზიციით,</strong> უმაღლესი წარმომადგენლობითი ორგანოს - პარლამენტის მიერ უნდა წესრიგდებოდეს იმგვარი ფუნდამენტალური საკითხები, რომლებიც განსაზღვრავს ქვეყნის სოციალური, ეკონომიკური, კულტურული, სამართლებრივი თუ პოლიტიკური მიმართულებების ფუძემდებლურ პრინციპებს, გავლენას ახდენს ქვეყნის გრძელვადიანი განვითარების პერსპექტივებზე ან/და მძიმე ფორმით ერევა ინდივიდის ძირითად უფლებებში. აქვე აღსანიშნავია, რომ სასამართლოს მოცემული განმარტება მკაცრად იქნა გაკრიტიკებული და რიგ შემთხვევაში არსებითად უარყოფილი არაერთი ავტორიტეტული სამოქალაქო აქტორის მხრიდან<a href=\"about:blank\" rel=\"noopener noreferrer\" target=\"_blank\">[2]</a>.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">გარდა საქართველოს საკონსტიტუციო სასამართლოს მიდგომისა, არსებითად მნიშვნელოვანია ამ მიმართულებით არსებული უახლესი ევროპული გამოცდილება. გადამდები დაავადებების გავრცელების თავიდან აცილების პროცესში ვაქცინაციის ორგანიზების მნიშვნელობაზე საუბრობს ადამიანის უფლებათა ევროპული სასამართლო საქმეზე SOLOMAKHIN v. UKRAINE<a href=\"about:blank\" rel=\"noopener noreferrer\" target=\"_blank\">[3]</a>, სადაც აღნიშნავს, რომ იძულებითი ვაქცინაცია ზოგადად ეწინააღმდეგება ადამიანის უფლებათა დაცვის ევროპული კონვენციის მე-8 მუხლის შინაარსს, თუმცა, მიუხედავად ამისა, ასეთი ჩარევა შეიძლება გამართლებული იყოს ინფექციური დაავადებების კონტროლისა და გავრცელების თავიდან აცილების მიზნით (36-ე პარაგრაფი).</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">მხედველობაშია მისაღები აგრეთვე ადამიანის უფლებათა ევროპული სასამართლოს განმარტებები საქმეზე Vavřička and Others v. the Czech Republic<a href=\"about:blank\" rel=\"noopener noreferrer\" target=\"_blank\">[4]</a>. მოცემული საქმე ეხება ბავშვთა სავალდებულო ვაქცინაციასთან დაკავშირებით არსებული შიდა კანონმდებლობის რელევანტურობას. კერძოდ, იმ მშობლების მიმართ, რომლებიც უარს იტყოდნენ მათი შვილების ვაქცინაციაზე, გამოყენებული იქნებოდა ჯარიმა, ხოლო არავაქცინირებული ბავშვები გაირიცხებოდნენ სკოლამდელი აღზრდის დაწესებულებებიდან (პარაგრაფი 73, 83). საქმეზე სასამართლომ დაადგინა, რომ აღნიშნული პოლიტიკა თავსებადია ადამიანის უფლებათა ევროპულ სამართალთან. მიუხედავად იმისა, რომ ჩეხეთის სახელმწიფოს პოლიტიკა ცალსახად იჭრებოდა პირადი ცხოვრების ხელშეუხებლობის უფლებით დაცულ სფეროში, აღნიშნული ჩარევა გამართლებული იყო საზოგადოებრივი ჯანმრთელობის დაცვის აუცილებლობის მოტივით.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">აღსანიშნავია, რომ საქართველოს კანონმდებლობა ითვალისწინებს კონკრეტულ ინდივიდთა გარკვეულ ვალდებულებებს ეპიდემიის დროს. კერძოდ, კორონავირუსამდე დიდი ხნით ადრე მიღებული ,,საზოგადოებრივი ჯანმრთელობის შესახებ\" საქართველოს კანონის მე-5 მუხლის პირველი პუნქტის ,,ვ\" ქვეპუნქტის შესაბამისად, საქართველოს ტერიტორიაზე მყოფი ყველა ადამიანი ვალდებულია სამედიცინო უკუჩვენებების არარსებობის შემთხვევაში ჩაიტაროს ვაქცინაცია გადამდები დაავადებების აფეთქების ან ფართოდ გავრცელების, ანდა ეპიდემიის დაწყების საშიშროებისას. იმავდროულად, იმავე კანონის მე-6 მუხლის (,,სახელმწიფოს ვალდებულებები გადამდები დაავადებების პროფილაქტიკის სფეროში“) ,,გ“ ქვეპუნქტის თანახმად, სახელმწიფო უზრუნველყოფს ეპიდჩვენების შემთხვევაში პროფილაქტიკური აცრებისა და გადამდები დაავადებების აქტიური გამოვლენის <strong>ორგანიზებას.</strong></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">სწორედ საყოველთაო აცრების მიმართ სახელმწიფოს მიერ არჩეული პოლიტიკა იქნა გაკრიტიკებული ფართომასშტაბიანი საპროტესტო კამპანიით სოციალურ ქსელებში და არამხოლოდ. ამასთან, აუცილებლად უნდა აღინიშნოს ის გარემოება, რომ მითითებული ფორმით საპროტესტო ტალღა არსებობდა და დღესაც მიმდინარეობს არაერთ დემოკრატიულ, მათ შორის, ევროკავშირის წევრ ქვეყანაში. სახელმწიფოები მოუწოდებენ მოქალაქეებს, აიცრან და აცრის ინტენსივობის გაზრდის უზრუნველსაყოფად ხორციელდება სხვადასხვა სახის შეზღუდვების შემოღება აუცრელი პირებისთვის, ისევე, როგორც კერძო თუ საჯარო სექტორში ხშირია წახალისებები აცრილ პირთათვის და სხვ. აქვე საგულისხმოა, რომ ბოლო პერიოდში არაერთი პირი მიუთითებდა სოციალურ ქსელში დამსაქმებლის მხრიდან დასაქმებულის მიმართ დისკრიმინაციული მოპყრობის ნიშნებზე ვაქცინაციისადმი მისი დამოკიდებულების მოტივით, დამსაქმებელთა მხრიდან დასაქმებულების პირდაპირ დავალდებულებაზე, გამოცხადებულიყვნენ სამსახურში ვაქცინირებულები და ა.შ. </p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">ზოგადად, ,,დისკრიმინაციის ყველა ფორმის აღმოფხვრის შესახებ“ საქართველოს კანონის მე-2 მუხლის მე-2 პუნქტის შესაბამისად, ისეთი მოპყრობა ან პირობების შექმნა, რომელიც პირს საქართველოს კანონმდებლობით დადგენილი უფლებებით სარგებლობისას რაიმე ნიშნის გამო <em>(რომელიც შეიძლება იყოს აგრეთვე რაიმე საკითხზე მისი შეხედულება)</em> არახელსაყრელ მდგომარეობაში აყენებს ანალოგიურ პირობებში მყოფ სხვა პირებთან შედარებით ან თანაბარ მდგომარეობაში აყენებს არსებითად უთანასწორო პირობებში მყოფ პირებს, განიხილება პირდაპირ დისკრიმინაციად და აკრძალულია. გამონაკლისის სახით კანონი ითვალისწინებს ისეთ შემთხვევას, როდესაც <strong>ამგვარი მოპყრობა ან პირობების შექმნა ემსახურება საზოგადოებრივი წესრიგისა და ზნეობის დასაცავად კანონით განსაზღვრულ მიზანს, აქვს ობიექტური და გონივრული გამართლება და აუცილებელია დემოკრატიულ საზოგადოებაში, ხოლო გამოყენებული საშუალებები თანაზომიერია ასეთი მიზნის მისაღწევად.</strong>&nbsp;ამასთან აღსანიშნავია, რომ დისკრიმინაციის მსხვერპლს უფლება აქვს, განცხადებით მიმართოს საქართველოს სახალხო დამცველს.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">საგულისხმოა, რომ ზემოთ მოხსენიებულ ფაქტებზე საქართველოს სახალხო დამცველის პოზიცია არ არის კრიტიკული. პირიქით, სახალხო დამცველის ოფიციალური განცხადების<a href=\"about:blank\" rel=\"noopener noreferrer\" target=\"_blank\">[5]</a> თანახმად,&nbsp;ვაქცინირებული და არავაქცინირებული პირებისათვის შემზღუდავი თუ წამახალისებელი ღონისძიებების დაწესება დისკრიმინაციას არ წარმოადგენს.&nbsp;განცხადებაში ასევე ხაზგასმითაა აღნიშნული, რომ დამსაქმებლებს, ასევე მომსახურების გამწევს პირებს უფლება აქვთ დასაქმებულს ან მომხმარებლებს მოსთხოვონ სრული ვაქცინაციის ჩატარების დამადასტურებელი დოკუმენტის ან PCR ტესტის უარყოფითი პასუხის სისტემატურად წარმოდგენა. აღნიშნული წესები უნდა ითვალისწინებდეს გამონაკლისებს (მაგალითად, სამედიცინო ცნობა ვაქცინაციის მიზანშეუწონლობის თაობაზე), ასევე, გონივრული მისადაგების ღონისძიებებს.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">დისკრიმინაციულ პრაქტიკად არ მიიჩნევს სახალხო დამცველი რეგულაციებს, რომელთა &nbsp;თანახმადაც, განსაზღვრულ საჯარო ადგილებში შესვლა შესაძლებელია ვაქცინირებული ადამიანებისათვის, ხოლო არავაცინირებული პირებისთვის ტესტის უარყოფითი პასუხის წარმოდგენის შემთხვევაში. მისი თქმით, ზოგიერთ ქვეყანაში ამგვარ სივრცეებში უშვებენ იმ ადამიანებსაც, რომელთაც ბოლო პერიოდში კოვიდ 19 გადაიტანეს და აქვთ ამის დამადასტურებელი დოკუმენტი.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">აქვე გასათვალისწინებელია ,,პერსონალურ მონაცემთა დაცვის შესახებ\" საქართველოს კანონის მე-6 მუხლის მე-2 პუნქტის ,,გ\" ქვეპუნქტის დათქმა, რომლის თანახმად, განსაკუთრებული კატეგორიის მონაცემთა დამუშავება შესაძლებელია, როდესაც მონაცემები მუშავდება საზოგადოებრივი ჯანმრთელობის დაცვის, ჯანმრთელობის დაცვის ან დაწესებულების (მუშაკის) მიერ ფიზიკური პირის ჯანმრთელობის დაცვის მიზნით, აგრეთვე თუ ეს აუცილებელია ჯანმრთელობის დაცვის სისტემის მართვის ან ფუნქციონირებისათვის. იმავდროულად, კანონის მე-6 მუხლის მე-2 პუნქტის ,,ა\" ქვეპუნქტის მიხედვით, განსაკუთრებული კატეგორიის მონაცემთა დამუშავება აგრეთვე შესაძლებელია, როდესაც ნასამართლობასთან და ჯანმრთელობის მდგომარეობასთან დაკავშირებული მონაცემების დამუშავება აუცილებელია შრომითი ვალდებულებების და ურთიერთობის ხასიათიდან გამომდინარე, მათ შორის, დასაქმების თაობაზე გადაწყვეტილების მისაღებად.</p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">მართალია, ყოველივე ზემოაღნიშნული გარკვეულწილად კვეთს არაპირდაპირ ვაქცინაციის ვალდებულების დაწესების ლეგიტიმურობის საკითხს, თუმცა საკითხის საბოლოო სამართლებრივი შეფასებისას მხედველობიდან არ უნდა გამოგვრჩეს ის ძირითადი პრინციპი, რომელიც უფლებათა შეზღუდვის ლეგიტიმურობის ფარგლებს განსაზღვრავს. პროპორციულობის პრინციპი წარმოადგენს სწორედ იმ გადამწყვეტ რგოლს, რომელმაც სამართლებრივ სიკეთეთა გონივრული და ობიექტური აწონ-დაწონვის შედეგად უნდა გამოკვეთოს ყველაზე სწორი გადაწყვეტილების კონტურები. </p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">თუკი ერთ შემთხვევაში უფლების შეზღუდვა შეფასებული იქნება პროპორციულად მისაღწევ მიზანთან მიმართებაში, მეორე შემთხვევაში იგივე შეზღუდვა შეფასდება კანონდარღვევად. მაგალითისათვის, სამედიცინო სფეროს წარმომადგენლები, პოლიციელები, მეხანძრე-მაშველები, მომსახურების სფეროში მომუშავე ადამიანები და სხვანი, რომლებიც პირდაპირ და უშუალო შემხებლობაში იმყოფებიან საზოგადოების ფართო მასებთან, <strong>შესაძლოა განხილულ იყვნენ დაავადების გავრცელების მაღალი რისკის მატარებელ პირებად</strong> და მათი უფლებების მიმართ, პროფესიული ფაქტორიდან გამომდინარე, იარსებებს დაცვის დაბალი სტანდარტი. და პირიქით, დამსაქმებლები ფრთხილად უნდა იყვნენ იმ დასაქმებულების დავალდებულებასთან მიმართებით, რომლებიც მათი სამუშაო სპეციფიკიდან გამომდინარე პირდაპირ და უშუალო კონტაქტზე არ იმყოფებიან მოქალაქეებთან და რომელთა დისტანციურ რეჟიმში მუშაობა არსებითად არ ახერხებს სამუშაო პროცესს. </p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">თუმცა, აქვე უნდა აღინიშნოს ისიც, რომ ვაქცინასთან დაკავშირებული კვლევების სიმცირის გამო, რაც გამოწვეულია ვაქცინის სიახლითა და აღნიშნული კვლევების სირთულით, აგრეთვე ვირუსის ახალი შტამების გამოჩენით, ხშირ შემთხვევაში რთულია იმ ფაქტების იდენტიფიცირება და შეფასება, რომლებიც საფუძვლად უდევს ზემოაღნიშნული თანაზომიერების საკითხის გარკვევას. პირველ რიგში, ასეთი ფაქტია ვაქცინის ეფექტურობა კორონავირუსის გადაცემის თვალსაზრისით, რაც უაღრესად მნიშვნელოვანია იმ არგუმენტების ჩამოყალიბებისათვის, რომლებიც უნდა გამოვიყენოთ ვაქცინაციის იძულების ან არავაქცინირებულთა უფლებების შეზღუდვის თანაზომიერების დასაბუთებისათვის. ასევე, არსებობს ეჭვები ვაქცინების ეფექტურობასთან დაკავშირებით ახალ შტამებთან მიმართებით, რამაც ასევე შესაძლოა შეცვალოს სამართლებრივი მოცემულობა ამ თვალსაზრისით. </p><p class=\"ql-align-justify\">შესაბამისად, აუცილებელია ყოველი კონკრეტული შემთხვევის ყოველმხრივ გაანალიზება მოცემულ მომენტში არსებული ეპიდემიოლოგიური ვითარებისა და სამედიცინო მიღწევების გათვალისწინებით და მხოლოდ ამის შემდგომ არის შესაძლებელი სწორი სამართლებრივი შეფასებების გაკეთება. &nbsp;&nbsp;</p><p><br></p><p>  <a href=\"about:blank\" rel=\"noopener noreferrer\" target=\"_blank\">[1]</a><a href=\"https://constcourt.ge/ka/media/news/%E1%83%A1%E1%83%90%E1%83%99%E1%83%9D%E1%83%9C%E1%83%A1%E1%83%A2%E1%83%98%E1%83%A2%E1%83%A3%E1%83%AA%E1%83%98%E1%83%9D-%E1%83%A1%E1%83%90%E1%83%A1%E1%83%90%E1%83%9B%E1%83%90%E1%83%A0%E1%83%97%E1%83%9A%E1%83%9D%E1%83%9B-%E1%83%9B%E1%83%98%E1%83%98%E1%83%A6.html-2\" rel=\"noopener noreferrer\" target=\"_blank\">https://constcourt.ge/ka/media/news/%E1%83%A1%E1%83%90%E1%83%99%E1%83%9D%E1%83%9C%E1%83%A1%E1%83%A2%E1%83%98%E1%83%A2%E1%83%A3%E1%83%AA%E1%83%98%E1%83%9D-%E1%83%A1%E1%83%90%E1%83%A1%E1%83%90%E1%83%9B%E1%83%90%E1%83%A0%E1%83%97%E1%83%9A%E1%83%9D%E1%83%9B-%E1%83%9B%E1%83%98%E1%83%98%E1%83%A6.html-2</a></p><p> </p><p> </p><p><a href=\"about:blank\" rel=\"noopener noreferrer\" target=\"_blank\">[2]</a> &nbsp;<em>მაგალითისათვის:</em></p><p>Ø&nbsp;EMC - ,,პანდემია და შესუსტებული კონსტიტუციური კონტროლი - საკონსტიტუციო სასამართლოს 2021 წლის 11 თებერვლის გადაწყვეტილების კრიტიკული შეფასება“ - <a href=\"https://socialjustice.org.ge/uploads/products/covers/11_%E1%83%97%E1%83%94%E1%83%91%E1%83%94%E1%83%95%E1%83%A0%E1%83%9A%E1%83%98%E1%83%A1_%E1%83%92%E1%83%90%E1%83%93%E1%83%90%E1%83%AC%E1%83%A7%E1%83%95%E1%83%94%E1%83%A2%E1%83%98%E1%83%9A%E1%83%94%E1%83%91%E1%83%98%E1%83%A1_%E1%83%A8%E1%83%94%E1%83%A4%E1%83%90%E1%83%A1%E1%83%94%E1%83%91%E1%83%90_1615273727.pdf\" rel=\"noopener noreferrer\" target=\"_blank\">https://socialjustice.org.ge/uploads/products/covers/11_%E1%83%97%E1%83%94%E1%83%91%E1%83%94%E1%83%95%E1%83%A0%E1%83%9A%E1%83%98%E1%83%A1_%E1%83%92%E1%83%90%E1%83%93%E1%83%90%E1%83%AC%E1%83%A7%E1%83%95%E1%83%94%E1%83%A2%E1%83%98%E1%83%9A%E1%83%94%E1%83%91%E1%83%98%E1%83%A1_%E1%83%A8%E1%83%94%E1%83%A4%E1%83%90%E1%83%A1%E1%83%94%E1%83%91%E1%83%90_1615273727.pdf</a>;</p><p>Ø&nbsp;,,საერთაშორისო გამჭვირვალობა - საქართველო“ -,,პანდემიის პირობებში არსებულ შეზღუდვებთან დაკავშირებით საქართველოს საკონსტიტუციო სასამართლოს 2021 წლის 11 თებერვლის გადაწყვეტილების შეფასება“ - <a href=\"https://transparency.ge/ge/post/pandemiis-pirobebshi-arsebul-shezgudvebtan-dakavshirebit-sakartvelos-sakonstitucio-sasamartlos\" rel=\"noopener noreferrer\" target=\"_blank\">https://transparency.ge/ge/post/pandemiis-pirobebshi-arsebul-shezgudvebtan-dakavshirebit-sakartvelos-sakonstitucio-sasamartlos</a> ;</p><p> </p><p> </p><p><a href=\"about:blank\" rel=\"noopener noreferrer\" target=\"_blank\">[3]</a> &nbsp;https://hudoc.echr.coe.int/fre#{%22itemid%22:[%22001-109565%22]} ;</p><p> </p><p> </p><p><a href=\"about:blank\" rel=\"noopener noreferrer\" target=\"_blank\">[4]</a> https://hudoc.echr.coe.int/fre#{%22itemid%22:[%22001-209039%22]} .</p><p><a href=\"about:blank\" rel=\"noopener noreferrer\" target=\"_blank\">[5]</a> <a href=\"https://www.ombudsman.ge/geo/akhali-ambebi/sakhalkho-damtsvelis-gantskhadeba-kveqanashi-shekmnil-epidemiologiur-vitarebastan-dakavshirebit\" rel=\"noopener noreferrer\" target=\"_blank\">https://www.ombudsman.ge/geo/akhali-ambebi/sakhalkho-damtsvelis-gantskhadeba-kveqanashi-shekmnil-epidemiologiur-vitarebastan-dakavshirebit</a> </p>','Pandemic and human rights','Legal assessment of the legality of restrictions and obligations imposed in a pandemic','<p>English text is not available</p>','Пандемия и права человека','Правовая оценка законности ограничений и обязательств, введенных в условиях пандемии','<p>Русский перевод текста недоступен</p>','2021/11/01/0e974c854d52a570379174178392f443e90c6d05.png','[66]','2021-11-01 07:23:02','2022-01-23 15:21:02');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_users` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` int unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_users_role_id_foreign` (`role_id`),
  CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_users`
--

LOCK TABLES `role_users` WRITE;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title_ka` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (2,'საბანკო-საფინანსო სამართალი','Banking and Financial Law','Банковское и финансовое право','/storage/2021/11/01/572d6a5b8999d09b80f52c5ff5fb66a6e308f498.png','2021-11-01 04:22:52','2021-11-01 04:22:52'),(3,'ადმინისტრაციული სამართალი','Administrative Law','Административное право','/storage/2021/11/01/62bf9074394543c374c77f2e175079bc2f0cde40.png','2021-11-01 04:28:46','2021-11-01 04:28:46'),(4,'სამშენებლო სამართალი','Construction Law','Строительное право','/storage/2021/11/01/e302535fbd71d99218377499be30db8c94d02bfa.png','2021-11-01 04:35:55','2021-11-01 04:35:55'),(5,'საკორპორაციო სამართალი','Corporate Law','Корпоративное право','/storage/2021/11/01/6565b9b2ceb2117e8287c05f1d0c5bf78db0e8c8.png','2021-11-01 04:36:59','2021-11-01 04:36:59'),(6,'დაზღვევის სამართალი','Insurance Law','Страховое право','/storage/2021/11/01/df0c5e222f72d08c2ead5af4c7d21599301e58ad.png','2021-11-01 04:39:13','2021-11-01 04:39:13'),(7,'ენერგეტიკა და ბუნებრივი გაზი','Energy and natural gas','Энергия и природный газ','/storage/2021/11/01/ef009dfb6b9608941596630584f2f976413faba6.png','2021-11-01 04:43:57','2021-11-01 04:43:57'),(8,'საინვესტიციო სამართალი','Investment Law','Инвестиционное право','/storage/2021/11/01/9443c1eb87f2cfa800de60888d4819eac927b0c7.png','2021-11-01 04:48:10','2021-11-01 04:48:10'),(9,'კომპანიების აუთსორსინგი','Outsourcing of companies','Аутсорсинг компаний','/storage/2021/11/01/bc401ef54a0eb720749b73296346b3bd0b099eda.png','2021-11-01 04:51:12','2021-11-01 04:51:12'),(10,'საბანკო სამართალი','Banking Law','Банковское право','/storage/2021/11/01/5b277752ca14d73e1507fe4ca6d007e1ad178ca4.png','2021-11-01 04:53:35','2021-11-01 04:53:35'),(11,'გადახდისუუნარობის სამართალი','Insolvency law','право о несостоятельности','/storage/2021/11/01/df8942a1503075c31dee230858184f339a2cce39.png','2021-11-01 04:55:19','2021-11-01 04:55:19'),(12,'შრომის სამართალი','Labour Law','Трудовое право','/storage/2021/11/01/e40074e7fbbb53982ac7140cf655658235109039.png','2021-11-01 04:56:44','2021-11-01 04:56:44'),(13,'საკანონმდებლო ცვლილებები','Legislative changes','Законодательные изменения','/storage/2021/11/01/27c6adf642b8e46389cdb6fd00b5468d1b42a7fd.png','2021-11-01 05:01:35','2021-11-01 05:02:22'),(14,'კომპანიების საერთაშორისო და/ან ადგილობრივი სააუქციონო ან/და სატენდერო დოკუმენტაციის სამართლებრივი ნაწილის მომზადება/ანალიზი','Preparation / analysis of the legal part of international and / or local auction and / or tender documents of companies','Подготовка / анализ юридической части международной и / или местной аукционной и / или тендерной документации компаний','/storage/2021/11/01/5b870c3f3c09ad4305419f0accc0963044fa0a63.png','2021-11-01 05:28:27','2021-11-01 05:28:27');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services_content`
--

DROP TABLE IF EXISTS `services_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services_content` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `content_ka` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ru` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `services_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_content`
--

LOCK TABLES `services_content` WRITE;
/*!40000 ALTER TABLE `services_content` DISABLE KEYS */;
INSERT INTO `services_content` VALUES (2,'◉ ნებისმიერი სახის ხელშეკრულების შედგენა, მათ შორის და არა მხოლოდ, ნასყიდობის, ნარდობის, მომსახურების, სესხის (სასესხო ხაზის), იპოთეკის, გირავნობის, იჯარის, ქირავნობის, ლიზინგის, დავალების, შუამავლობის, მიბარების, შრომითი, ფრენშაიზინგის, ფინანსირების, დაზღვევის, საინვესტიციო, ტექნიკური და სამშენებლო ზედამხედველობის, EPC კონტრაქტების, მემორანდუმების, განზრახულობის წერილების (letter of intent), კონფიდენციალურობის შესახებ ხელშერკულებების (NDA), მინდობილობების და სხვა\r\n\r\n◉ უკვე გაფორმებული ან/და გასაფორმებელი ხელშეკრულების რევიზია, რისკების შეფასება\r\n\r\n◉ მოლაპარაკებების წარმოება ხელშეკრულების პირობების შეთანხმების მიზნით\r\n\r\n◉ წარმომადგენლობა სასამართლოში/არბიტრაჟში ზემოაღნიშნულ საკითხებთან დაკავშირებით','◉ Drafting of any contracts, including not only, purchase, backgammon, services, credit (mortgage line), mortgage, mortgage, rent, lease, leasing, assignment, mediation, call, labor, franchising, financing, insurance, technical, insurance and construction supervision, EPC contracts, memoranda, letters of intent, confidentiality clauses (NDA), powers of attorney and more\r\n\r\n◉ Completion of an already signed and / or concluded contract, risk assessment\r\n\r\n◉ Negotiating the terms of the contract\r\n\r\n◉ Representation in court / arbitration on the above issues','◉ Составление любых договоров, в том числе и не только, покупка, нарды, услуги, кредит (ипотечная линия), ипотека, ипотека, аренда, аренда, лизинг, уступка, посредничество, вызов, труд, франчайзинг, финансирование, страхование, технические, страхование и надзор за строительством, контракты EPC, меморандумы, письма о намерениях, положения о конфиденциальности (NDA), доверенности и многое другое\r\n\r\n◉ Доработка уже подписанного и / или заключаемого договора, оценка рисков\r\n\r\n◉ Ведение переговоров по согласованию условий контракта\r\n\r\n◉ Представительство в суде / арбитраже по вышеуказанным вопросам',1,'2021-11-01 05:06:02','2021-11-01 05:28:58'),(3,'◉ მსესხებლის ინტერესების დაცვა ბანკთან/მიკროსაფინანსო ორგანიზაციასთან/სკს-სთან ურთიერთობისას, მათ შორის, ხელშეკრულების გაფორმების, ხელშეკრულების ცვლილების თაობაზე ბანკთან მოლაპარაკების, გაპრობლემებულ სესხთან დაკავშირებით მორიგების თაობაზე\r\n\r\n◉ ეროვნული ბანკის მიერ დადგენილი რეგულაციების (მათ შორის, ფიზიკური პირის დაკრედიტების შესახებ დებულების) ახსნა-განმარტება/აღსრულების კონტროლი როგორც მომხმარებლისთვის, აგრეთვე საფინანსო ორგანიზაციისთვის\r\n\r\n◉ ვალდებულების უზრუნველყოფის საშუალებები (იპოთეკა, გირავნობა, თავდებობა, სოლიდარული თანამსესხებლობა, საბანკო გარანტია)\r\n\r\n◉ ფულის გათეთრების წინააღმდეგ არსებული საკანონმდებლო რეგულაციები\r\n\r\n◉ წარმომადგენლობა სასამართლოში/არბიტრაჟში ზემოაღნიშნულ საკითხებთან დაკავშირებით','◉ Protection of the interests of the borrower in relations with the bank / microfinance organization / RAS, including the conclusion of an agreement, approval of amendments to the agreement with the bank, settlement of a problem loan\r\n\r\n◉ Clarification / enforcement of the rules (including provisions on lending to individuals) established by the National Bank for both the client and the financial institution\r\n\r\n◉ Means of securing the obligation (mortgage, pledge, surety, joint loan, bank guarantee)\r\n\r\n◉ Anti-money laundering legislation\r\n\r\n◉ Representation in court / arbitration on the above issues','◉ Защита интересов заемщика в отношениях с банком / микрофинансовой организацией / СКС, в том числе заключение договора, согласование изменения договора с банком, урегулирование проблемной ссуды\r\n\r\n◉ Разъяснение / обеспечение соблюдения правил (в том числе положений о кредитовании физических лиц), установленных Национальным банком как для клиента, так и для финансового учреждения\r\n\r\n◉ Средства обеспечения обязательства (ипотека, залог, поручительство, совместный заем, банковская гарантия)\r\n\r\n◉ Законодательство о борьбе с отмыванием денег\r\n\r\n◉ Представительство в суде / арбитраже по вышеуказанным вопросам',2,'2021-11-01 05:08:10','2021-11-01 05:29:21'),(4,'◉ ადმინისტრაციულ ორგანოში წარსადგენი განცხადების მომზადება\r\n\r\n◉ ადმინისტრაციულ ორგანოსთან წარმომადგენლობა ადმინისტრაციული წარმოების პროცესში\r\n\r\n◉ ადმინისტრაციული საჩივრის მომზადება და წარდგენა\r\n\r\n◉ წარმომადგენლობა ადმინისტრაციული სამართალდარღვევის საქმეზე, მათ შორის საჩივრის წარდგენა სამართალდარღვევის დადგენილებასთან დაკავშირებით\r\n\r\n◉ ერთი ადმინისტრაციული სახდელის სხვა ადმინისტრაციული სახდელით შეცვლასთან დაკავშირებით შუამდგომლობის მომზადება და წარდგენა\r\n\r\n◉ წარმომადგენლობა სასამართლოში/არბიტრაჟში ზემოაღნიშნულ საკითხებთან დაკავშირებით\r\n\r\n◉ პერსონალურ მონაცემთა დაცვის სუბიექტის უფლებების დაცვა სამოქალაქო, ადმინისტრაციულ, სისხლის სამართალწარმოებაში \r\n\r\n◉ წარმომადგენლობა სახელმწიფო ინსპექტორის სამსახურთან \r\n\r\n◉ აუთსორს სერვისი - პერსონალურ მონაცემთა დაცვის ოფიცერი (ორგანიზაციის საქმიანობის შესაბამისობის უზრუნველყოფა პერსონალურ მონაცემთა დაცვის მარეგულირებელ კანონმდებლობასთან, სანქციების პრევენცია)\r\n\r\n◉ ოჯახში და ქალთა მიმართ ძალადობა; მსხვერპლთა უფლებებისა და სოციალური გარანტიების ახსნა-განმარტება\r\n\r\n◉ შემაკავებელი და დამცავი ორდერების კანონიერებასთან დაკავშირებული დავები; წარმომადგენლობა სასამართლოში','◉ Preparation of an application for submission to the administrative authority\r\n\r\n◉ Representation in an administrative body in the course of administrative proceedings\r\n\r\n◉ Prepare and file an administrative complaint\r\n\r\n◉ Representation in a case of an administrative offense, including filing a complaint against a decision on an offense\r\n\r\n◉ Prepare and submit a petition to replace one administrative penalty with another\r\n\r\n◉ Representation in court / arbitration on the above issues\r\n\r\n◉ Protection of the rights of the subject of personal data protection in civil, administrative, criminal proceedings\r\n\r\n◉ Representation in the office of the state inspector\r\n\r\n◉ Outsourcing service - an employee for the protection of personal data (ensuring the compliance of the organization\'s activities with legislation governing the protection of personal data, preventing sanctions)\r\n\r\n◉ Domestic violence and violence against women; Clarification of the rights of victims and social guarantees\r\n\r\n◉ Disputes related to the legality of restraining and protection orders; Representation in court.','◉ Подготовка заявления для подачи в административный орган\r\n\r\n◉ Представительство в административном органе в процессе административного производства\r\n\r\n◉ Подготовить и подать административную жалобу\r\n\r\n◉ Представительство в деле об административном правонарушении, в том числе подача жалобы на постановление о правонарушении\r\n\r\n◉ Подготовить и подать ходатайство о замене одного административного взыскания другим\r\n\r\n◉ Представительство в суде / арбитраже по вышеуказанным вопросам\r\n\r\n◉ Защита прав субъекта защиты персональных данных в гражданском, административном, уголовном судопроизводстве\r\n\r\n◉ Представительство в аппарате государственного инспектора\r\n\r\n◉ Аутсорсинговая служба - сотрудник по защите персональных данных (обеспечение соответствия деятельности организации законодательству, регулирующему защиту персональных данных, предотвращение санкций)\r\n\r\n◉ Бытовое насилие и насилие в отношении женщин; Разъяснение прав потерпевших и социальных гарантий\r\n\r\n◉ Споры, связанные с законностью запретительных и охранных судебных приказов; Представительство в суде',3,'2021-11-01 05:12:36','2021-11-01 05:31:15'),(5,'◉ სამშენებლო კომპანიის ინტერესების დაცვა ქ. თბილისის მერიაში, მათ შორის, არქიტექტურის სამსახურსა და ზედამხედველობის სამსახურში\r\n\r\n◉ არქიტექტურული პროექტისა შესათანხმებლად და მშენებლობის ნებართვის ასაღებად სამართლებრივი პროცედურების განხორციელება\r\n\r\n◉ ნასყიდობის/ნარდობის ხელშეკრულების გაფორმების პროცესში, აგრეთვე მშენებლობის მიმდინარეობისას როგორც სამშენებლო კომპანიის, ასევე მყიდველის ინტერესების დაცვა\r\n\r\n ◉ საჯარო რეესტრის ეროვნულ სააგენტოსთან მხარის წარმომადგენლობა უძრავი ქონების განშლისა და საკუთრების უფლების რეგისტრაციასთან დაკავშირებით\r\n\r\n◉ მშენებლობის პროცესის საკანონმდებლო რეგულაციებთან შესაბამისობის უზრუნველყოფა\r\n\r\n◉ წარმომადგენლობა სასამართლოში/არბიტრაჟში ზემოაღნიშნულ საკითხებთან დაკავშირებით','◉ Protecting the interests of a construction company in the Tbilisi City Hall, including the Architecture Service and the Supervision Service\r\n\r\n◉ Implement legal procedures to approve an architectural design and obtain a building permit\r\n\r\n◉ Protecting the interests of both the construction company and the buyer when concluding a purchase / construction agreement, as well as during construction\r\n\r\n◉ Representing a party in the National Agency for Public Registry on the registration of real estate and registration of property rights\r\n\r\n◉ Ensure that the construction process complies with legal regulations\r\n\r\n◉ Representation in court / arbitration on the above issues','◉ Защита интересов строительной компании в мэрии Тбилиси, включая Службу архитектуры и Службу надзора\r\n\r\n◉ Внедрить юридические процедуры для утверждения архитектурного проекта и получения разрешения на строительство\r\n\r\n◉ Защита интересов как строительной компании, так и покупателя при заключении договора купли / строительства, а также при строительстве\r\n\r\n◉ Представление стороны в Национальном агентстве публичного реестра по вопросам регистрации недвижимости и регистрации прав собственности\r\n\r\n◉ Обеспечить соответствие процесса строительства правовым нормам\r\n\r\n◉ Представительство в суде / арбитраже по вышеуказанным вопросам',4,'2021-11-01 05:15:01','2021-11-01 05:31:40'),(6,'◉ კომპანიის დაფუძნება კანონმდებლობით გათვალისიწინებული ნებისმიერი სამართლებრივი ფორმით. სამართლებრივი ანალიზი და შესაბამისი რეკომენდაციების გაცემა კომპანიის სამართლებრივი ფორმის შერჩევის შესახებ\r\n\r\n◉ წესდების, წესდების ცვლილების, პარტნიორთა კრების ოქმების, გადაწყვეტილებების, კომპანიის შიდა მარეგულირებელი დოკუმენტების მომზადება და რევიზია\r\n\r\n◉ კომპანიის წილის ყიდვა-გაყიდვა, კომპანიების შერწყმა, მიერთება, რესტრუქტურიზაცია/რეორგანიზაცია\r\n\r\n◉ კონსულტაციები კორპორაციული მართვის სტრუქტურასთან დაკავშირებით\r\n\r\n◉ პარტნიორის გარიცხვა კომპანიიდან\r\n\r\n◉ როგორც დირექტორის (დირექტორთა საბჭოს), აგრეთვე პარტნიორ(ებ)ის წარმომადგენლობა სასამართლო დავებში როგორც დირექტორსა და პარტნიორს,  აგრეთვე პარტნიორებს ან/და საზოგადოებას შორის დავებში','◉ Creation of a company in any legal form provided by law. Legal analysis and current recommendations for choosing the organizational and legal form of the company\r\n\r\n◉ Preparation and revision of the charter, amendments to the charter, minutes of the meeting of partners, decisions, internal regulatory documents of the company\r\n\r\n◉ Purchase and sale of company shares, mergers, acquisitions, restructuring / reorganization of companies\r\n\r\n◉ Consulting on the structure of corporate governance\r\n\r\n◉ Exclusion of a partner from the company\r\n\r\n◉ Representing both the director (board of directors) and partner (s) in litigation between the director and the partner, as well as in disputes between partners and / or the public','◉ Создание компании в любой правовой форме, предусмотренной законодательством. Правовой анализ и актуальные рекомендации по выбору организационно-правовой формы компании\r\n\r\n◉ Подготовка и доработка устава, изменений в устав, протокола собрания партнеров, решений, внутренних нормативных документов компании\r\n\r\n◉ Покупка и продажа акций компаний, слияния, поглощения, реструктуризация / реорганизация компаний\r\n\r\n◉ Консультации по структуре корпоративного управления\r\n\r\n◉ Исключение партнера из компании\r\n\r\n◉ Представление как директора (совета директоров), так и партнера (ов) в судебных спорах между директором и партнером, а также в спорах между партнерами и / или общественностью',5,'2021-11-01 05:17:17','2021-11-01 05:32:12'),(7,'◉ როგორც სადაზღვევო კომპანიების, აგრეთვე დამზღვევებისა და დაზღვეულებისათვის კონსულტაციების გაწევა დაზღვევის სამართალში როგორც სახელშეკრულებო, აგრეთვე სადაზღვევო შემთხვევის ანაზღაურების ეტაპზე\r\n\r\n◉ დაზღვევის ხელშეკრულებების შედგენა და რევიზია\r\n\r\n◉ სადაზღვევო სამართალში იურიდიული კონსულტაციები მოიცავს როგორც ჯანმრთელობის, აგრეთვე ქონებისა  და პასუხისმგებლობის დაზღვევას','◉ Advising insurance companies, as well as insurers and policyholders on insurance law issues both at the stage of concluding a contract and at the stage of reimbursing an insured event\r\n\r\n◉ Drafting and audit of insurance contracts\r\n\r\n◉ Legal advice on insurance law concerns both health insurance and property and liability insurance','◉ Консультирование страховых компаний, а также страховщиков и держателей полисов по вопросам страхового права как на стадии заключения договора, так и на стадии возмещения страхового случая\r\n\r\n◉ Составление и аудит договоров страхования\r\n\r\n◉ Юридические консультации по страховому праву касаются как страхования здоровья, так и страхования имущества и ответственности',6,'2021-11-01 05:18:56','2021-11-01 05:32:25'),(8,'◉ ელექტროენერგიის ყიდვა-გაყიდვის (მათ შორის, ტრანზიტის) ხელშეკრულებების მომზადება და რევიზია\r\n\r\n◉ ბუნებრივი გაზის ყიდვა-გაყიდვის ხელშეკრულებების მომზადება და რევიზია\r\n\r\n◉ ელექტროენერგიის გარანტირებული შესყიდვის ხელშეკრულებების (PPA) მომზადება და რევიზია\r\n\r\n◉ ელექტროსადგურების მშენებლობისა და ოპერირების, აგრეთვე ელექტროგადამცემი ხაზების მშენებლობის შესახებ ხელშეკრულებების მოზადება და რევიზია','◉ Preparation and revision of contracts for the sale and purchase of electricity (including transit)\r\n\r\n◉ Preparation and verification of natural gas purchase and sale agreements\r\n\r\n◉ Preparation and revision of contracts for guaranteed purchase of electricity (PPA)\r\n\r\n◉ Preparation and revision of contracts for the construction and operation of power plants, as well as for the construction of power transmission lines','◉ Подготовка и пересмотр договоров купли-продажи электроэнергии (в том числе транзита)\r\n\r\n◉ Подготовка и проверка договоров купли-продажи природного газа\r\n\r\n◉ Подготовка и пересмотр договоров гарантированной покупки электроэнергии (PPA)\r\n\r\n◉ Подготовка и пересмотр договоров на строительство и эксплуатацию электростанций, а также на строительство линий электропередачи',7,'2021-11-01 05:20:22','2021-11-01 05:32:44'),(9,'◉ როგორც ქართველი, აგრეთვე უცხოელი ინვესტორების წარმომადგენლობა როგორც კერძო პირებთან, აგრეთვე ადმინისტრაციულ ორგანოებთან ურთიერთობაში\r\n\r\n◉ ინვესტორთათვის კონსულტაციების გაწევა მათი პროექტების განხორციელების სამართლებრივი მექანიზმების დაგეგმვიდან და რისკების შეფასებიდან შესაბამისი ხელშეკრულებების გაფორმებითა და პროექტის იმპლემენტაციის ჩათვლით\r\n\r\n◉ შესაძლო დავის შემთხვევაში წარმომადგენლობა სასამართლოში ან/და არბიტრაჟში','◉ Representation of both Georgian and foreign investors in relations with both private individuals and administrative bodies\r\n\r\n◉ Advising investors on the planning of legal mechanisms for the implementation of their projects and risk assessment, including the conclusion of relevant agreements and implementation of projects\r\n\r\n◉ Representation in court and / or arbitration in the event of a possible dispute','◉ Представительство как грузинских, так и иностранных инвесторов в отношениях как с частными лицами, так и с административными органами\r\n\r\n◉ Консультирование инвесторов по вопросам планирования юридических механизмов реализации их проектов и оценки рисков, включая заключение соответствующих договоров и реализацию проектов\r\n\r\n◉ Представительство в суде и / или арбитраже в случае возможного спора',8,'2021-11-01 05:21:49','2021-11-01 05:33:17'),(10,'კომპანიების საქმიანობის სამართლებრივი გამართულობის უზრუნველყოფა','Ensuring the legal functioning of companies','Обеспечение легального функционирования компаний',9,'2021-11-01 05:22:51','2021-11-01 05:22:51'),(11,'◉ საბანკო ხელშეკრულებების (კრედიტი, საკრედიტო ხაზი, იპოთეკა, გირავნობა, თავდებობა, საბანკო გარანტია, სუბორდინაცია, სვოპი, ფორვარდი...) მომზადება და რევიზია\r\n\r\n◉ საბანკო კოვენანტების მართვის პროცესის დანერგვა კომპანიებისათვის, შესაბამისი ინფორმაციის პერიოდული განახლება/განახლების კონტროლით \r\n\r\n◉ ბანკებთან მოლაპარაკებების პროცესის წარმართვა, წარმომადგენლობა დავებში','◉ Preparation and revision of bank agreements (loan, line of credit, mortgage, pledge, guarantee, bank guarantee, subordination, swap, forward ...)\r\n\r\n◉ Implementation of a bank liabilities management process for companies with periodic updating / updating of relevant information\r\n\r\n◉ Negotiating with banks, representing in disputes','◉ Подготовка и пересмотр банковских договоров (кредит, кредитная линия, ипотека, залог, гарантия, банковская гарантия, субординация, своп, форвард ...)\r\n\r\n◉ Внедрение процесса управления банковскими обязательствами для компаний с периодическим обновлением / актуализацией соответствующей информации\r\n\r\n◉ Ведение переговоров с банками, представительство в спорах',10,'2021-11-01 05:24:12','2021-11-01 05:24:12'),(12,'◉ შრომითი ხელშეკრულებების, შინაგანაწესისა და სხვა შრომითსამართლებრივი დოკუმენტების მომზადება/ექსპერტიზა, მოლაპარაკებების პროცესის წარმოება დამსაქმებელსა და დასაქმებულს შორის\r\n\r\n◉ კომპანიის შრომითი ხელშეკრულებების, რეგულაციებისა და შრომითი პოლიტიკის შეფასება და ანალიზი და სამართლებრივი დასკვნის მომზადება მისი კანონმდებლობასთან შესაბამისობისა და არსებული რისკების თაობაზე (განსაკუთრებით აქტუალურია ახალი საკანონმდებლო ცვლილებებისა და შრომის ინსპექციის როლის გაზრდის პირობებში)\r\n\r\n◉ როგორც დამსაქმებლის, აგრეთვე დასაქმებულის ინტერესების დაცვა სასამართლოში','◉ Preparation / examination of labor contracts, internal regulations and other labor law documents, negotiation process between employer and employee\r\n\r\n◉ Assess and analyze the Company\'s labor contracts, regulations and labor policies and prepare a legal opinion on compliance with its legislation and existing risks (especially relevant in the context of new legislative changes and increasing the role of labor inspection)\r\n\r\n◉ Protecting the interests of both the employer and the employee in court','◉ Подготовка / экспертиза трудовых договоров, правил внутреннего распорядка и других документов трудового права, переговорный процесс между работодателем и работником\r\n\r\n◉ Оценить и проанализировать трудовые договоры, правила и политику компании в сфере труда и подготовить юридическое заключение о соответствии ее законодательству и существующим рискам (особенно актуально в контексте новых законодательных изменений и повышения роли инспекции труда)\r\n\r\n◉ Защита интересов как работодателя, так и работника в суде',12,'2021-11-01 05:25:39','2021-11-01 05:25:39'),(13,'◉ სამართლებრივი დასკვნების მომზადება განხორციელებელი ან/და დაგეგმილი საკანონმდებლო ცვლილებებისა და მათი შესაძლო გავლენის შესახებ კონკრეტულ კლიენტთან მიმართებით\r\n\r\n\r\n\r\n◉ კლიენტის დაკვეთის შესაბამისად, საკანონმდებლო ცვლილებებზე კომენტარების მომზადება\r\n\r\n\r\n\r\n◉ ურთიერთობა ბიზნეს ასოციაციასთან და წევრი კომპანიების სრული იურიდიული მხარდაჭერა','◉ Preparation of legal opinions on implemented and / or planned changes in legislation and their possible impact on a specific client.\r\n\r\n◉ We prepare comments on legislative changes at the request of the client.\r\n\r\n◉ Relations with the business association and full legal support of member companies','◉ Подготовка юридических заключений о внедренных и / или планируемых изменениях законодательства и их возможном влиянии на конкретного клиента.\r\n\r\n◉ Готовим комментарии к законодательным изменениям по запросу клиента.\r\n\r\n◉ Отношения с бизнес-ассоциацией и полное юридическое сопровождение компаний-членов',13,'2021-11-01 05:26:55','2021-11-01 05:35:29');
/*!40000 ALTER TABLE `services_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_ka` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_ka` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_ka` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_ru` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'თამარ გულუა','მმართველი პარტნიორი','<p class=\"ql-align-justify\"><strong style=\"color: rgb(34, 34, 34);\"><u>განათლება:</u></strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">თამარ გულუამ 2014 წელს წარჩინებით დაამთავრა ივანე ჯავახიშვილის სახელობის თბილისის სახელმწიფო უნივერსიტეტის იურიდიული ფაკულტეტი. 2014-2016 წლებში მან გაიარა ნიუ ვიჟენ უნივერსიტეტის ორენოვანი სამაგისტრო პროგრამა შედარებით კერძო და საერთაშორისო სამართალში და 2016 წელს მოიპოვა სამართლის მაგისტრის ხარისხი. ამჟამად თამარი სწავლობს იორკისა (დიდი ბრიტანეთი) და სტრასბურგის (საფრანგეთი) უნივერსიტეტების ერთობლივ (dual) სამაგისტრო პროგრამაზე - Executive MBA. </span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">&nbsp;</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(34, 34, 34);\"><u>სამუშაო გამოცდილება:</u></strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">თამარმა პროფესიული გამოცდილების მიღება ჯერ კიდევ 2012 წლიდან დაიწყო. იგი მუშაობდა ქ. თბილისის მერიის იურიდიული დახმარების ცენტრში, ხოლო შემდგომ თბილისის სააპელაციო სასამართლოში. </span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">2014 წლიდან 2017 წლამდე თამარი მუშაობდა საქართველოს საერთაშორისო ენერგეტიკულ კორპორაციაში უმცროსი იურისტის, შემდგომ კი იურისტისა და უფროსი იურისტის პოზიციებზე. </span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">2017 წლიდან თამარი დასაქმებულია საქართველოს უდიდეს ინდუსტრიულ ჰოლდინგში, სადაც 2019 წლიდან დღემდე იკავებს იურიდიული დეპარტამენტის უფროსის თანამდებობას. </span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">თამარს გავლილი აქვს კვალიფიკაციის ასამაღლებელი პრაქტიკული კურსები ბიზნეს სამართალში. მათ შორის, საქართველოს სამართლის ინსტიტუტის სასერტიფიკატო კურსი - „ბიზნეს სამართლის იურისტი“. იგი არის არაერთი კონკურსის, მათ შორის, დებატებისა და იმიტირებული სასამართლო პროცესების მონაწილე და პრიზიორი<span class=\"ql-cursor\">﻿﻿﻿თა﻿﻿</span>. </span></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">თამარი 2014 წლიდან არის საქართველოს ადვოკატთა ასოციაციის წევრი. </span></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(34, 34, 34);\"><u>სამუშაო ენები: </u></strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\"><span class=\"ql-cursor\">﻿﻿﻿﻿</span>ქართული, ინგლისური, ფრანგული, რუსული.</span></p><p><br></p>','Tamar Gulua','Managing Partner','<p><strong><u>Education</u></strong></p><p>Tamar Gulua graduated  from Ivane Javakhishvili Tbilisi State University, Faculty of Law in 2014 with honors. In 2014-2016, she completed a bilingual master\'s program in comparative private and international law at New Vision University and in 2016 obtained a degree in Master of Laws. Currently Tamar continues her studies on a dual program in Executive MBA of the University of York (Great Britain) and the University of Strasbourg (France).</p><p><br></p><p><br></p><p><strong><u>Work experience:</u></strong></p><p>Tamar started gaining professional experience in 2012. She worked in at  Tbilisi City Hall Legal Aid Center, and then at Tbilisi Court of Appeals.</p><p>From 2014 to 2017, Tamar worked as a junior lawyer in Georgian International Energy Corporation, and later as a lawyer and senior lawyer.</p><p>Since 2017, Tamar works for Georgia\'s largest industrial holding, where she holds a position of Head of Legal Department since 2019. </p><p>Tamar has also taken advanced practical courses in business law, among them, the certification course of the Georgian Law Institute - \"Business Law Lawyer\". She is a participant and winner of numerous competitions, including debates and mock trials.</p><p><br></p><p>Tamar is a member of Georgian Bar Association since 2014.</p><p><br></p><p><br></p><p><strong><u>Working languages:</u></strong></p><p><br></p><p>Georgian, English, French, Russian.</p>','Тамар Гулуа','Управляющий партнер','<p><strong><u>Образование:</u></strong></p><p>Тамар Гулуа окончила юридический факультет Тбилисского государственного университета имени Иване Джавахишвили в 2014 году с отличием. В 2014-2016 годах она прошла двуязычную магистерскую программу по сравнительному частному и международному праву в New Vision University, а в 2016 году получила степень магистра права. В настоящее время Тамар продолжает обучение по двойной программе Executive MBA Йоркского университета (Великобритания) и Страсбургского университета (Франция).</p><p><br></p><p><strong><u>Рабочий стаж:</u></strong></p><p>Тамар начала получать профессиональный опыт в 2012 году. Работала в Центре юридической помощи мэрии Тбилиси, а затем в Тбилисском апелляционном суде.</p><p>С 2014 по 2017 год Тамар работала младшим юристом в Грузинской международной энергетической корпорации, а затем юристом и старшим юристом.</p><p>С 2017 года Тамар работает в крупнейшем промышленном холдинге Грузии, где с 2019 года занимает должность начальника юридического отдела.</p><p>Тамар также прошла продвинутые практические курсы по предпринимательскому праву, в том числе сертификационный курс Грузинского юридического института - «Бизнес-юрист». Она участник и победитель множества конкурсов, в том числе дебатов и инсценировок.</p><p>Тамар является членом Коллегии адвокатов Грузии с 2014 года.</p><p><br></p><p><strong><u>Рабочие языки:</u></strong></p><p>Грузинский, английский, французский, русский.</p><p>С 2017 года Тамар работает в крупнейшем промышленном холдинге Грузии, где с 2019 года занимает должность начальника юридического отдела.</p><p>Тамар также прошла углубленные практические курсы по предпринимательскому праву. В их числе сертификационный курс Грузинского юридического института - «Бизнес-юрист». Она участник и победитель многочисленных конкурсов, в том числе дебатов и инсценировок.</p><p><br></p><p>Тамар является членом Коллегии адвокатов Грузии с 2014 года.</p><p><br></p><p><strong><u>Рабочие языки:</u></strong></p><p><br></p><p>Грузинский, Английский, Французский, Русский.</p>','/storage/2021/11/01/2ef7c33b8131ee6113fa25d0e35b30138c29cce5.png','2021-11-01 03:38:41','2021-11-12 10:25:18'),(2,'ლონდა თურქოშვილი','მმართველი პარტნიორი','<p class=\"ql-align-justify\"><strong style=\"color: rgb(34, 34, 34);\"><u>განათლება</u></strong><span style=\"color: rgb(34, 34, 34);\">:</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">ლონდა თურქოშვილმა 2014 წელს წარჩინებით დაამთავრა ივანე ჯავახიშვილის სახელობის თბილისის სახელმწიფო უნივერსიტეტის იურიდიული ფაკულტეტი. 2017 წელს კი დაასრულა ილიას სახელმწიფო უნივერსიტეტის სამაგისტრო პროგრამა ბიზნეს სამართლის მიმართულებით და მოიპოვა სამართლის მაგისტრის ხარისხი.</span></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(34, 34, 34);\"><u>სამუშაო გამოცდილება:</u></strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">2013 წლიდან დღემდე ლონდა წარმოადგენს სამშენებლო კომპანიის ,,ახალშენი\" მთავარ იურისტს. </span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">2014-2016 წლებში იგი მუშაობდა ადვოკატის პოზიციაზე იურიდიულ კომპანიაში.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">2016 წელს იყო ,,მისო კაპიტალ კრედიტის\'\' იურისტი. </span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">2016-2018 წლებში მუშაობდა სს ,,ლიბერთი ბანკის\" სამართალწარმოების დეპარტამენტის იურისტის პოზიციაზე. </span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">2018 წლიდან დღემდე წარმოადგენს ,,კავკასუს კრედიტის\" მთავარ იურისტს.&nbsp;</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">ლონდა თურქოშვილმა 2014 წლის დეკემბერში წარმატებით ჩააბარა ადვოკატთა საკვალიფიკაციო გამოცდა კერძო სამართლის სპეციალიზაციით და 2015 წლიდან არის საქართველოს ადვოკატთა ასოციაციის წევრი.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">&nbsp;</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(34, 34, 34);\"><u>სამუშაო ენები: </u></strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(34, 34, 34);\">ქართული, ინგლისური, რუსული. </span></p><p><br></p>','Londa Turqoshvili','Managing Partner','<p><strong><u>Education</u></strong>:</p><p>Londa Turkoshvili graduated from Ivane Javakhishvili Tbilisi State University, Faculty of Law in 2014 with honors. In 2017, she completed a master\'s program in business law at Ilia State University and earned a master\'s degree in law.</p><p><br></p><p><strong><u>Professional Experience:</u></strong></p><p><br></p><p>Since 2013, Londa has been the Chief Lawyer of the construction company Akhalsheni.</p><p>In 2014-2016 she worked as a lawyer in a law firm.</p><p>In 2016, she worked as a lawyer at Miso Capital Credit.</p><p>In 2016-2018 she worked as a lawyer in the Legal Department of JSC Liberty Bank.</p><p>From 2018 to present, she is the Chief Lawyer of Caucasus Credit.</p><p><br></p><p>Londa Turkoshvili successfully passed the Bar Qualification Exam in December 2014, specializing in private law, and has been a member of the Georgian Bar Association since 2015.</p><p><br></p><p>&nbsp;</p><p><strong><u>Working languages:</u></strong></p><p>Georgian, English, Russian.</p>','Лонда Туркошвили','Управляющий партнер','<p><strong><u>Образование:</u></strong></p><p>Лонда Туркошвили с отличием окончила юридический факультет Тбилисского государственного университета имени Иване Джавахишвили в 2014 году. В 2017 году она окончила магистратуру по предпринимательскому праву в Государственном университете Ильи и получил степень магистра права.</p><p><br></p><p><br></p><p><strong><u>Рабочий стаж:</u></strong></p><p><br></p><p>С 2013 года Лонда является главным юристом строительной компании «Ахалшени».</p><p>В 2014-2016 годах работала юристом в юридической фирме.</p><p>В 2016 году она была юристом в Miso Capital Credit.</p><p>В 2016-2018 годах работала юристом в Юридическом департаменте АО «Либерти Банк».</p><p>С 2018 года по настоящее время Лонда является главным юристом Кавказ Кредит.</p><p><br></p><p>Лонда Туркошвили успешно сдала квалификационный экзамен на адвоката в декабре 2014 года по специальности частное право и является членом Ассоциациий адвокатов Грузии с 2015 года.</p><p><br></p><p>&nbsp;</p><p><strong><u>Рабочие языки:</u></strong></p><p>Грузинский, Английский, Русский.</p>','/storage/2021/11/01/2acd1167e0824a155e0bfdb721a1d9e136e7a3c3.png','2021-11-01 03:56:01','2021-11-12 10:30:19');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@admin.com',NULL,'$2y$10$zj8Q0utelGw/SIlouMjPUuG6jlsI4zYsna6k0w7bAq6IEDrWzOn8K','1D336W976chTNTUXwJrPEFmyVFVvPfvBoOLnganNt85oZfJJFLHxGT4FWrs7','2021-08-27 01:22:01','2021-08-27 01:22:01','{\"platform.index\": true, \"platform.systems.roles\": true, \"platform.systems.users\": true, \"platform.systems.attachment\": true}'),(2,'test','test@test.com',NULL,'$2y$10$upNaVdo26Da3p3vcMws3yuG/3dAaVT6GV2Un0QD9hsZ8dU3dBJG0C','vdVjL3PMhwbJepSKosew2dQP7yNu52GBsAMPAA3ft5Ny8HXQPVfN5EdL9alm','2021-12-04 09:10:19','2021-12-04 09:10:19','{\"platform.systems.roles\":true,\"platform.systems.users\":true,\"platform.systems.attachment\":true,\"platform.index\":true}');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-15 19:05:03
