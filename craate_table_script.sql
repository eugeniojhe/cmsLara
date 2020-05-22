create table users(
    id int not null auto_increment, 
    name varchar(100),
    email varchar(100),
    password varchar(100),
    country varchar(30),
    city varchar(30),
    neighborhood varchar(30),
    street varchar(40),
    complement varchar(30),
    created_at datetime, 
    updated_at datetime, 
    remember_token varchar(100),
    primary key(id),
     UNIQUE KEY `users_email_unique` (`email`)); 


    DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `db_cms_laravel`.`users`   
  ADD  UNIQUE INDEX `users_email_unique` (`email`);


CREATE table settings (
    id int not null auto_increment,
    name varchar(20),
    content text,
    primary key(id)
)

/*
  insert columns title,
  subtitle, email, bgcolor"#000000",
  textcolor"#ffffff", 

*/