-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 mars 2024 à 17:19
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titre_film` varchar(150) NOT NULL,
  `duree_film` int(11) NOT NULL,
  `resume_film` varchar(1000) NOT NULL,
  `date_sortie_film` date NOT NULL,
  `pays_film` text NOT NULL,
  `image_film` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre_film`, `duree_film`, `resume_film`, `date_sortie_film`, `pays_film`, `image_film`) VALUES
(1, 'Fast and Furious', 107, 'La nuit tombée, Dominic Toretto règne sur les rues de Los Angeles à la tête d\'une équipe de fidèles qui partagent son goût du risque, sa passion de la vitesse et son culte des voitures de sport lancées à plus de 250 km/h dans des rodéos urbains d\'une rare violence. Ses journées sont consacrées à bricoler et à relooker des modèles haut de gamme, à les rendre toujours plus performants et plus voyants, et à organiser des joutes illicites.', '2001-09-26', 'américano-allemand', 'https://placehold.co/600x400/orange/white?text=Fast And Furious 1'),
(2, '\r\n2 Fast 2 Furious', 107, 'Le FBI et les douanes locales surveillent depuis plusieurs mois le puissant homme d\'affaires Carter Verone, qu\'ils soupçonnent de se livrer à des opérations de blanchiment d\'argent. Leurs efforts restent vains, car le seul indice dont ils disposent pour appâter et démasquer l\'énigmatique criminel est sa passion pour les rodéos.', '2003-06-18', 'américano-allemand', 'https://placehold.co/600x400/blue/white?text=Fast And Furious 2'),
(3, 'Fast and Furious: Tokyo Drift\r\n', 104, 'Se sentant étranger dans son environnement, un jeune homme (Lucas Black) se définit par ses victoires à la course de rue. Cette activité le rendant impopulaire auprès des autorités, il part vivre au Japon avec son père. Il apprend que ce genre de course y existe, mais dans un style très différent. Les enjeux sont grands lorsqu\'il décide d\'affronter le champion local et qu\'il s\'éprend de la petite amie de ce dernier.', '2006-06-04', 'américano-allemand', 'https://placehold.co/600x400/red/white?text=Fast And Furious 3'),
(4, 'Fast and Furious 4\r\n', 100, 'Un meurtre oblige Don Toretto, un ancien taulard et l\'agent Brian O\'Conner à revenir à L.A. où leur querelle se rallume. Mais confrontés à un ennemi commun, ils sont contraints à former une alliance incertaine s\'ils espèrent parvenir à déjouer ses plans. De l\'attaque de convoi aux glissades de précision qui les mèneront hors de leurs propres frontières, les deux hommes trouveront le meilleur moyen de prendre leur revanche: en poussant les limites de ce qui est faisable au volant d\'un bolide.', '2011-05-04', 'américano-allemand', 'https://placehold.co/600x400/black/white?text=Fast And Furious 4'),
(5, 'Fast and Furious 5', 130, 'L\'ancien policier Brian O\'Conner et son ami l\'ex-prisonnier Dom Toretto sont maintenant tous deux considérés comme des ennemis de l\'État. Après que Brian et Mia ont aidé Dom à s\'évader de prison, ils ont traversé assez de frontières et brisé assez de lois pour attirer l\'attention des autorités. Maintenant reclus à Rio de Janeiro, ils doivent accomplir un dernier travail pour retrouver enfin leur liberté.\r\n', '2011-04-29', 'américano-allemand', 'https://placehold.co/600x400/green/white?text=Fast And Furious 5'),
(6, 'Fast and Furious 6', 130, 'Après avoir dérobé une large somme d\'argent, Dom et sa bande ont disparu dans la nature, vivant une retraite dorée. Brian est maintenant père et ses comparses se la coulent douce un peu partout sur la planète.', '2013-05-22', 'américano-allemand', 'https://placehold.co/600x400/grey/white?text=Fast And Furious 6'),
(7, 'Fast and Furious 7', 140, 'Cette fois la menace prend les traits d\'un tueur à gages des opérations spéciales britanniques aussi insaisissable qu\'impitoyable, qui n\'a d\'obsession que la vengeance.', '2015-04-01', 'américano-allemand', 'https://placehold.co/600x400'),
(8, 'Fast and Furious 8', 136, 'Des rivages de Cuba aux rues de New York en passant par les plaines gelées de la mer arctique de Barrents, l\'équipe va sillonner le globe pour tenter d\'empêcher une anarchiste de déchaîner un chaos mondial et de ramener à la maison l\'homme qui a fait d\'eux une famille.', '2017-04-12', 'américano-allemand', 'https://placehold.co/600x400'),
(9, 'Fast & Furious 9', 143, 'Dom Toretto mène une vie tranquille avec Letty et son fils, mais ils savent que le danger est toujours présent. Son équipe et lui tentent de mettre fin à un complot mondial ourdi par l\'assassin le plus doué et le pilote le plus performant qu\'ils aient jamais rencontré: le frère délaissé de Dom.', '2021-06-25', 'américano-allemand', 'https://placehold.co/600x400'),
(10, 'Fast & Furious X', 141, 'Au cours de nombreuses missions et contre toute attente, Dom Toretto et sa famille ont déjoué et dépassé tous les ennemis sur leur chemin. Maintenant, ils doivent affronter l\'adversaire le plus mortel qu\'ils aient jamais affronté. Alimentée par la vengeance, une menace terrifiante émerge des ombres du passé pour briser le monde de Dom et détruire tout et tout le monde qu\'il aime.', '2023-05-19', 'américano-allemand', 'https://placehold.co/600x400'),
(11, 'Fast & Furious : Hobbs & Shaw', 136, 'Depuis le premier affrontement entre Hobbs, loyal agent des services de sécurité de la diplomatie américaine, et Shaw, ancien membre de l\'élite de l\'armée britannique, ils n\'ont cessé de s\'attaquer.', '2019-08-07', 'américano-japonais', 'https://placehold.co/600x400'),
(12, 'Baby Driver', 115, 'Chauffeur pour des braqueurs de banque, Baby a un truc pour être le meilleur dans sa partie : il roule au rythme de sa propre playlist. Lorsqu\'il rencontre la fille de ses rêves, Baby cherche à mettre fin à ses activités criminelles pour revenir dans le droit chemin. Il est forcé de travailler pour un grand patron du crime et le braquage tourne mal. Désormais, sa liberté, son avenir avec la fille qu\'il aime et sa vie sont en jeu.', '2017-07-19', 'américain', 'https://placehold.co/600x400'),
(13, 'Le Mans 66', 152, 'Dans les années 60, les constructeurs Ford et Ferrari se livraient une guerre sans merci. À cette époque, Henry Ford II reprenait l\'entreprise familiale de son grand-père avec pour objectif d\'imposer les voitures américaines sur le marché européen. Il a été assisté par Lee Iacocca. La rivalité entre les deux constructeurs connue sont apogée lors de la Course du Mans de 1966.', '2019-09-30', 'américain', 'https://placehold.co/600x400'),
(14, 'Le Mans', 106, 'Michael Delaney, coureur automobile, revient sur le circuit des 24 Heures du Mans un an après son grave accident dans lequel Pierre Belgetti, un autre pilote, a perdu la vie. Delaney dispute la course au volant d\'une Porsche 917 aux couleurs du pétrolier américain Gulf, il est l\'un des deux favoris avec l\'Allemand Erich Stahler. La course se déroule sous les yeux de la veuve de Belgetti.', '1971-09-24', 'américain', 'https://placehold.co/600x400'),
(15, 'Gran Turismo', 135, 'La jeune Jann Mardenborough meurt d\'envie d\'être pilote de course, mais n\'a pas les moyens financiers de faire partie du sport d\'élite. C\'est pourquoi il n\'a appuyé sur l\'accélérateur que dans le jeu vidéo Gran Turismo et a connu un énorme succès.', '2023-08-25', 'américain', 'https://placehold.co/600x400'),
(16, 'Taxi', 90, 'Daniel est un fou du volant. Cet ex-livreur de pizzas est aujourd\'hui chauffeur de taxi et sait échapper aux radars les plus perfectionnés. Pourtant, un jour, il croise la route d\'Emilien, policier recalé pour la huitième fois à son permis de conduire. Pour conserver son taxi, il accepte le marché que lui propose Emilien : l\'aider à démanteler un gang de braqueurs de banques qui écume les succursales de la ville à bord de puissants véhicules.', '1998-06-08', 'français', 'https://placehold.co/600x400'),
(17, 'Taxi 2', 88, 'Daniel, le chauffeur de taxi dingue de vitesse, et Emilien, l\'inspecteur de police inexpérimenté, se retrouvent à Paris. Le ministre de la Défense japonais vient tester le savoir-faire hexagonal en matière de lutte antiterroriste et signer le contrat du siècle avec l\'État français. Il est alors enlevé par des Yakusas.', '2000-03-25', 'français', 'https://placehold.co/600x400'),
(18, 'Taxi 3', 90, 'C\'est décembre à Marseille. Daniel rajoute des options à son taxi et Lili voit rouge. Le commissaire Gilbert est aveuglé par Qiu, sa stagiaire japonaise, et son enquête piétine. Emilien voit des pères Noël partout et Petra s\'impatiente. De Marseille à Tignes, de la Canebière aux pistes de ski, l\'aventure peut commencer.', '2003-01-29', 'français', 'https://placehold.co/600x400'),
(19, 'Taxi 4 ', 91, 'De l\'eau a coulé sous les ponts depuis la dernière aventure de Daniel et Emilien : les deux hommes sont désormais pères de famille et ont du mal à s\'occuper de leurs fils, deux sacrés canailles. Une chose n\'a pas changé cependant : Emilien est toujours le policier le plus maladroit et malchanceux de Marseille et Daniel le conducteur de taxi le plus rapide. Les deux hommes vont devoir faire équipe afin d\'arrêter un terrifiant braqueur de banque surnommé `Le Belge\'.', '2007-02-14', 'français', 'https://placehold.co/600x400'),
(20, 'Taxi 5', 103, 'Sylvain Marot, super flic parisien et pilote d\'exception, est muté contre son gré à la Police Municipale de Marseille. L\'ex-commissaire Gibert, devenu maire de la ville et au plus bas dans les sondages, va alors lui confier la mission de stopper le redoutable \"Gang des Italiens\", qui écume des bijouteries à l\'aide de puissantes Ferrari. Pour y parvenir, Marot n\'aura pas d\'autre choix que de collaborer avec le petit-neveu du célèbre Daniel, Eddy Maklouf, le pire chauffeur VTC de Marseille.', '2018-06-08', 'français', 'https://placehold.co/600x400');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo_utilisateur` varchar(50) NOT NULL,
  `email_utilisateur` varchar(100) NOT NULL,
  `mdp_utilisateur` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo_utilisateur`, `email_utilisateur`, `mdp_utilisateur`) VALUES
(20, 'TEST123456789', 'emaildetest@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$a01UL3EzVnFEU2VrRG13Vw$oOk2yQXQZAIwT3z6js0JvFzX88uMmpNZ5R97zW0vF80'),
(21, 'kakou', 'k@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Y29GMWdoU05VbUsxblN4bQ$R8uSFaW+IUPhfSfSVBEs9wkQcuAqwRAddTaFye8vQwQ'),
(22, 'TestDemdp', 'mdp@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$OTFVcTF5blhKZHdBVEZ2Uw$oUwXQFS2VF3PuE4x2tyw3mDf7tNupKsbnmDFLe+FDWY');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
