-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 14, 2021 at 11:07 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tp_blog_myth`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `date_article` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titre_article` varchar(50) NOT NULL,
  `resume_article` varchar(150) NOT NULL,
  `image_article` varchar(100) NOT NULL,
  `contenu_article` text NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo_user` varchar(50) NOT NULL,
  `password_user` varchar(150) NOT NULL,
  `is_admin_user` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `pseudo_user`, `password_user`, `is_admin_user`) VALUES
(1, 'admin', '$2y$10$ULNdyNVD2.h6oo/pmpnTVeUPmTVg1KYghkLuWV9SW/F2rxGgsKJJK', 1),
(2, 'user', '$2y$10$mfMuv.Ig.WbUBiaJ4IaPxuGVk7nLvzI3WKuG3CQeu1/pFdIwEZp8a', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `article_user_FK` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
