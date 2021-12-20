-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 19, 2021 at 11:06 PM
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
  `id_user_article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `date_article`, `titre_article`, `resume_article`, `image_article`, `contenu_article`, `id_user_article`) VALUES
(1, '2021-12-19 02:07:31', 'Les 12 travaux d\'Héraclès', 'Découvrez l\'histoire du demi-dieu Héraclès et de ses exploits', '1639648548.jpg', 'Fils de Zeus et d’Alcmène, Héraclès est poursuivi depuis sa naissance par la haine d\'Héra, furieuse d\'avoir été trompée par son mari. Une nuit, la déesse envoie deux serpents pour tuer l\'enfant, nommé Alcide. Celui-ci découvre alors sa force extraordinaire et se débarrasse des deux vipères. Afin d\'apaiser sa femme, Zeus décide de le renommer Héraclès, ce qui signifie « gloire d’Héra ». Dans un moment de folie inspirée par la déesse, Héraclès tue sa femme Mégara et ses fils. Revenu à la raison, il consulte la Pythie pour savoir comment expier sa faute. Elle lui ordonne de se mettre au service d\'Eurysthée, son plus vieil ennemi, et d\'accomplir les tâches qu\'il lui ordonnerait : ce seront les Douze Travaux. Au départ, il y aurait dû n\'y en avoir que dix, mais Eurysthée estima que le combat contre l\'hydre de Lerne (deuxième tâche) n\'était pas valide car Héraclès avait été aidé par Iolaos ; de même pour le nettoyage des écuries d\'Augias car il avait demandé à être payé par Augias pour accomplir cette tâche.\r\n\r\nHomère évoque déjà, dans l’Iliade et l’Odyssée, des « travaux » accomplis par Héraclès sur l\'ordre d\'Eurysthée, dont la descente aux Enfers pour aller capturer Cerbère. La Théogonie d\'Hésiode cite également la victoire contre le lion de Némée et l\'hydre de Lerne, ainsi que le vol des bœufs de Géryon. Pisandre ajoute à la liste la biche de Cérynie et les oiseaux du lac Stymphale. Outre les travaux déjà cités, la peinture sur vases à figures noires représente les épisodes du sanglier d\'Érymanthe, du taureau crétois, des juments de Diomède, du combat contre les Amazones et de la quête des pommes d\'or du jardin des Hespérides.\r\n\r\nÀ ce stade, la liste des travaux n\'en compte donc que onze. Sur ce nombre, seuls deux — la descente aux Enfers et le sanglier d\'Érymanthe — sont explicitement rattachés à Eurysthée. Il est possible qu\'à cette étape de la constitution du mythe, Héraclès ait entrepris les autres travaux de lui-même.\r\n\r\nLes travaux d\'Héraclès sont tous cités et résumés dans la Bibliothèque du Pseudo-Apollodore.\r\n\r\nDans la version de Diodore de Sicile, ces travaux doivent être accomplis pour qu\'Héraclès atteigne l\'immortalité ; en effet, promis par Zeus à posséder le royaume des Persides, Héra empêche sa naissance le jour prévu (alors que Zeus avait destiné le royaume des Persides à l\'enfant qui naîtrait un jour précis, Héra hâte la naissance d\'Eurysthée et retarde celle d\'Héraclès) et Eurysthée se trouve en possession du royaume. Sans s\'estimer parjure, Zeus demande à Héraclès d\'accomplir les douze travaux qui lui ont été prophétisés par l\'oracle de Delphes, et lui promet en échange l\'immortalité.', 1),
(6, '2021-12-19 23:04:41', 'Thésée contre le Minotaure', 'La légende du héros de l\'Attique et son combat contre le monstre du labyrinthe.', '1639664626.jpg', 'Lorsque Thésée arrive à Athènes, il ne révèle pas immédiatement sa véritable identité. Égée qui l\'accueille éprouve quelques soupçons à l\'égard de l\'étranger tandis que sa femme Médée essaie de le faire tuer en lui demandant de capturer le taureau de Marathon.\r\n\r\nSur le chemin de Marathon, Thésée s\'abrite de l\'orage dans la cabane d\'une vieille femme, Hécalé. Elle promet de faire un sacrifice à Zeus si Thésée parvient à capturer le taureau. C\'est ce qui se produit, mais à son retour, il trouve la vieille femme morte. En son honneur, Thésée donne son nom à l\'un des dèmes de l\'Attique, faisant d\'une certaine manière de ses habitants les enfants adoptifs de la défunte.\r\n\r\nDe retour de Marathon en vainqueur du taureau à Athènes, Thésée est victime d\'une tentative d\'empoisonnement par la reine, mais au dernier moment, il est reconnu à ses sandales, son bouclier et son épée par Égée qui écarte le vin empoisonné. Thésée partage dès lors avec lui le gouvernement de la cité.\r\n\r\nAthènes vit un drame : depuis la mort de son fils et sa victoire sur les Athéniens, Minos, roi de Crète, exige que la ville lui envoie tous les 9 ans un tribut de sept jeunes hommes et de sept jeunes filles qu\'il donne en pâture au Minotaure. Thésée décide de mettre fin à ce carnage et se rend en Crète avec les jeunes victimes afin de tuer le monstre. Égée fait tout pour le convaincre de rester, mais Thésée reste inébranlable.\r\n\r\nMinos se moque de ce jeune homme qui prétend entrer dans le labyrinthe de Dédale, exterminer le monstre et en ressortir sain et sauf. C\'est ne pas tenir compte de sa propre fille, Ariane qui est tombée amoureuse de Thésée et qui va lui donner une pelote de fil pour lui permettre de retrouver la sortie. Il abat le monstre avec le glaive qu\'Ariane a volé à son père — glaive offert par Héphaïstos pour son mariage avec Pasiphaé — ressort du labyrinthe et se sauve en mer avec ses compagnons et Ariane qui a trahi son père à condition qu\'il l\'épouse. Il abandonne Ariane sur une île déserte après l\'avoir endormie sur les conseils du capitaine du bateau. Il sait pourtant qu\'Ariane a trahi sa famille pour lui et que si elle revient à Knossos elle se fera exécuter par son père pour trahison. Il rentre donc sans elle à Athènes. Égée attend du haut d\'un promontoire le retour du bateau et guette la couleur des voiles : selon un accord passé avec son fils, elles seront blanches en cas de victoire. Mais Thésée oublie de les changer et les voyant noires, Égée se jette dans la mer qui, désormais, porte son nom. Après ce tragique événement, Thésée devient le roi d\'Athènes.', 1);

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
  ADD KEY `article_user_FK` (`id_user_article`);

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
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
