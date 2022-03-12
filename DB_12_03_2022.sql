-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: sql5c38c.carrierzone.com
-- Timp de generare: mart. 12, 2022 la 01:43 AM
-- Versiune server: 5.7.31-log
-- Versiune PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `geometrik_gdarchtcom166742`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bg_image_folder` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'architecture',
  `bg_image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id`, `title`, `link_to`, `bg_image_folder`, `bg_image`) VALUES
(1, 'Synevo Medical Lab', 'architecture?category=synevo-medical-lab', 'architecture', '61d9acd4c2a831523182001.jpg'),
(2, 'Commercial  Center', 'architecture?category=commercial-center', 'architecture', 'commercial_3.jpg'),
(3, 'Extensa Office Tower', 'architecture?category=extensa-office-tower', 'architecture', '61d9b79303f4889387324.jpg'),
(4, 'Competitions', 'architecture?category=competitions', 'architecture', 'm_museum_1.jpg'),
(5, 'Prefab House', 'architecture?category=prefab-house', 'architecture', '61eb3021d0870873835190.jpg'),
(6, 'Lake House', 'architecture?category=lake-house', 'architecture', '61d9c6c07e4ef1700124572.jpg'),
(7, 'Nomad Gardens', 'architecture?category=nomad-gardens', 'architecture', '61da15f53c28e1173672520.jpg'),
(8, 'Masterplan', 'architecture?category=masterplan', 'architecture', '61da2a6e74dd4456541496.jpg'),
(9, 'Primary School', 'architecture?category=primary-school', 'architecture', '61eb5249055442048995836.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `links_containers_bg`
--

CREATE TABLE `links_containers_bg` (
  `id` int(11) NOT NULL,
  `container_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `bg_image_folder` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bg_image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `links_containers_bg`
--

INSERT INTO `links_containers_bg` (`id`, `container_name`, `category_id`, `bg_image_folder`, `bg_image`) VALUES
(1, 'nav_links', 0, 'nav_links', 'main.jpg'),
(2, 'architecture', 0, 'architecture', 'portofolio.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `nav_links`
--

CREATE TABLE `nav_links` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bg_image_folder` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bg_image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `nav_links`
--

INSERT INTO `nav_links` (`id`, `name`, `link_to`, `bg_image_folder`, `bg_image`) VALUES
(1, 'Home', 'index', 'nav_links', 'home.jpg'),
(2, 'About Us', 'about', 'nav_links', 'about_us.jpg'),
(3, 'Collaborations', 'collaborations', 'nav_links', 'collaborations.jpg'),
(4, 'Architecture', 'architecture', 'nav_links', 'architecture.jpg'),
(5, 'Interiors', 'interiors', 'nav_links', 'art.jpg'),
(6, 'Art', 'art', 'nav_links', 'art.jpg'),
(7, 'Contact Us', 'contact', 'nav_links', 'contact.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `title`, `link_to`, `subtitle`, `description`) VALUES
(31, 1, 'Synevo Medical Lab', 'synevo-medical-lab', '', '<p><span class=\"text-small\">Synevo Medical Facility and Laboratory for Special Research is a complex building with striking and vibrant looks. Industrial design comes into dialog with new green concepts. Innovation and high-tech environment placed just to the outskirts of Bucharest, in close proximity with public transportation and shopping area. The building is a 5000 sqm on 3 floors with galleries, auditorium, large loggias and strong connection to the outdoor space. Ribbed metal structure and green zinc metal roofing accentuates the space capsule design. Built for research and special medical training with innovative materials, self sustainable on a high degree and the latest management systems present on the market today.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Completed</span><br><span class=\"text-small\"><strong>CLIENT</strong></span><br><span class=\"text-small\">Anfora Investments - Romania</span><br><span class=\"text-small\"><strong>CREDITS</strong></span><br><span class=\"text-small\">Consultants: KUB Architects</span><br><span class=\"text-small\">Structural Engineer: Prodesign Engineering</span><br><span class=\"text-small\">MEP Engineer: Relan Design</span></p>'),
(32, 2, 'Radius Center', 'radius-center', '', '<p><span class=\"text-small\">Radius Commercial Center, Baia Mare - Romania</span><br><span class=\"text-small\">150,000 sqm of shopping, office and boutique hotel along the Sasar river on the main boulevard cutting across the city. Based on the classic department store typology the design is a play of light, levels and different experiences. The storefront is composed of a luminous band of clear and backlit glass at the ground level having a metal spine top of corrugated steel with a continuous band of lighting in the reveals. There is a grand plaza along the main Boulevard where events shall be organized and an Art Center is to be build to sustain and bring activities and people together. Two office buildings and a hotel are integral part of the assembly. The complex is to be erected in two phases.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Approval</span><br><span class=\"text-small\"><strong>CLIENT</strong></span><br><span class=\"text-small\">Red Capital Investments</span><br><span class=\"text-small\"><strong>CREDITS</strong></span><br><span class=\"text-small\">Structural Engineer: Prodesign Engineering</span><br><span class=\"text-small\">MEP Engineer: Air Control Systems</span><br><span class=\"text-small\">Special Consultant: Relan Design</span></p>'),
(34, 3, 'Extensa Office Tower', 'extensa-office-tower', '', '<p><span class=\"text-small\">Extensa Office Tower, Bucharest - Romania</span><br><span class=\"text-small\">Located in the new business district of Bucharest this 14 storey tower of 36,000 sqm office spaces will be a landmark in the new city grid. An unique glass-stone interlocking facade and large cantilevers with original cuts in the mass of the tower are addressing the geometry in a dynamic way. The new building is conveniently located near a public transportation hub and has all the characteristics to be one of the most advanced proposals in green design.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Approval</span><br><span class=\"text-small\"><strong>CLIENT</strong></span><br><span class=\"text-small\">AXOR Development</span><br><span class=\"text-small\"><strong>CREDITS</strong></span><br><span class=\"text-small\">Structural Engineer: CIC Engineering</span><br><span class=\"text-small\">MEP Engineer: Air Control Systems</span><br><span class=\"text-small\">Special Consultant: Relan Design</span><br><span class=\"text-small\">Structural Consultant: Pieter Hendrix</span></p>'),
(35, 4, 'Museum in a bubble', 'museum-in-a-bubble', '', '<p><span class=\"text-small\">The innovative design is inspired from the Eden Project in Cornwall-UK. On a mountain side, above one of the most beautiful cities of Romania - Cluj, a famous university city with strong tradition and challenging history, we are proposing a high tech Teflon covered structure, a reminiscent look of the UFOs that are reported here every now and then. The roof bubbles are covered with ETFE Teflon material, a transparent material filled with air, 10 times lighter then glass and having great constructive qualities. Inside the structure an array of events are scheduled to take place every day and at night a shower of light will compete with the rising moon.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Competition</span></p>'),
(37, 6, 'Lake House', 'lake-house', '', '<p><span class=\"text-small\">The residence is located on the shores of Buftea Lake, near Bucharest. The house is arranged around spatial voids in its boxy concrete frame. Living spaces are open plan,&nbsp;each space&nbsp; joined to another&nbsp;by voids, created to bring the light in at every junction. The volume is interwoven with the outdoor,&nbsp;choosing harmony over maximum volume.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Completed</span><br><span class=\"text-small\"><strong>CLIENT</strong></span><br><span class=\"text-small\">Confidential</span><br><span class=\"text-small\"><strong>CREDITS</strong></span><br><span class=\"text-small\">LLOX</span></p>'),
(38, 4, 'IT Campus', 'it-campus', '', '<p><strong><u>Innovation and Technology Campus</u></strong><br><br><span class=\"text-small\">Bucharest is becoming an important travel hub for the European and International traveler. It rates highly as a fine destination for tourism and special events. Its new array of shopping precincts deliver retail experiences of all styles to an ever more discerning public. Its mouth-watering food scene has a wide range of offerings suiting every pocket, from bustling hawker centers to innovative fine restaurants. It has a range of top class hotels luxury. It should not also be underestimated that in this uncertain world its reputation for hospitality and safety is unmatched. It is evident that Bucharest is much more than shopping and dining. It also has a unique history, with a deep sense of cultural symbolism and heritage. This history is increasingly recognized in the development of its cultural and educational institutions. It has a unique soul but it is also a place of growing creativity and innovation. The Innovation and Technology Campus is a major investment that can assist in realizing this vision. It must assist the city desire to capitalize on its current infrastructure investment to create a platform for the future. Its concept must be driven by and through the community in which it lies. In a global environment in which there is much homogeneity this Centre will distinguish itself as world class.&nbsp;</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Competition</span><br>&nbsp;</p>'),
(39, 7, 'Les Jardines Nomades', 'les-jardines-nomades', '', '<p><span class=\"text-small\">Les Jardines Nomades mise en place par Le Institut FranÃ§ais&nbsp;de&nbsp;Roumanie. Installations, projections, jardins en lumieres ephemeres. Sur chaque site nous proposons dâ€™installerun double panneau de plessis de noiseti er sur lequel seront affi chÃ© des banners plastifiÃ©s expliquant le concept general Art et Paysage mais Ã©galement lâ€™installati on du site luimÃªme. Ces panneaux ont une texture naturelle plaisante, sont Ã©phemeres, solides...et marqueront le passant de maniÃ¨re unitaire Ã  travers la ville. Ils sont nombreux et mobiles. La terre est contenue dans de simples grillages, elle coule et disparait au cours de lâ€™automne. Ces â€˜â€˜jardins-cellulesâ€™â€™ mettent en valeur le substrat des jardins, la maniÃ¨re ou le substrat lui meme devient nomade, fugitif. Chaque jardin est posÃ© sur un suport bois type palette.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Completed</span></p><p>&nbsp;</p>'),
(40, 8, 'University Campus', 'university-campus', '', '<p><span class=\"text-small\">University Campus Masterplan Feasibility Study. The site is located in close proximity to Suceava, to the north of Romania, where a major University Campus is proposed the close proximity to the existing old University. There are strong infrastructure connections off the main road surrounding the city. On 30 hectares of greenfield, a joint venture design team is designing a hyper modern campus for the future, sized at 70,000 sqm of school facilities. Our assignment is the Nanotechnology Center, Information Center and the Dendrological Park with a large Green House for public and special studies, home to a whole variety of plants from all over the world. We are also setting out as main goal to attract pedestrian activity by providing a leisure area right in the core of the whole development, engaging residents and bringing outsiders to experience the new built environment.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Masterplan Approval</span><br><span class=\"text-small\"><strong>CLIENT</strong></span><br><span class=\"text-small\">USV - Suceava</span></p>'),
(41, 9, 'Primary School NY', 'primary-school-ny', '', '<p><span class=\"text-small\">Primary School 253 Q in New York is a clearly articulated expression of its functions. Its building systems respond to NY School Authority requirements for a teaching laboratory. The constraints imposed by a very tight plot and an even smaller budget, coupled with the decision to retain the building systems in plain view and to connect, both physically and visually , to the existing science building, resulted in a honest, articulate building that expresses a teaching institution building type in the best modernist tradition. The design approach was to develop a chain of lab modules and support spaces on both sides of a long corridor, running the entire length of the building.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Completed</span><br><span class=\"text-small\"><strong>CLIENT</strong></span><br><span class=\"text-small\">New York City School Construction Authority</span><br><span class=\"text-small\"><strong>CREDITS</strong></span><br><span class=\"text-small\">Don Cucinotta AIA</span><br><span class=\"text-small\">J. Lorring Associates MEP</span><br><span class=\"text-small\">C. Wing Associates Structures</span></p>'),
(42, 4, 'S House Bucharest', 's-house-bucharest', '', '<p><span class=\"text-small\">In contrast with the anonymous uniformity of much of the newly built townhouses in Bucharest, the S house favors heterogeneous expression over relentless repetition. The conjoined units are fit together to create&nbsp; a vibrant faÃ§ade. This faÃ§ade is then broken into two masses, a boutique hotel with a duplex apartment above, further divided to create a unique space on the roof terrace, overlooking the city.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Design</span><br><span class=\"text-small\"><strong>CLIENT</strong></span><br><span class=\"text-small\">Confidential</span><br><span class=\"text-small\"><strong>CREDITS</strong></span><br><span class=\"text-small\">Adrian Timaru arch.</span><br><span class=\"text-small\">Relan Design MEP</span></p><p>&nbsp;</p>'),
(43, 4, 'Oslo Museum', 'oslo-museum', '', '<p><span class=\"text-small\">Located adjacent to the City Hall Square and Pipervika Marina harvesting The Main Line Station (Nobel Peace Center at the moment) and Local Station Building the Proposal connects a pedestrian route leading from The National Theatre to the Aker Brygge seafront development, to the City Hall and the Marina.&nbsp;Our proposal brings pedestrians together under an immense roof, trying to give them the option to either experience the New Museum and enjoy its facilities, or to pass by/through the complex having the outdoor visual experience and possible the outdoor temporary exhibitions in place.&nbsp;We have implemented the idea of a Maelstrom (Malstrom) â€“ our motto â€“ like in all Norwegian stories, of a large, powerful whirlpool that is absorbing you inside from all sides, ejecting you out in a different world of fantasy and unknown.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Competition</span></p><p>&nbsp;</p>'),
(45, 5, 'Prefab House', 'prefab-house', '', '<p><span class=\"text-small\">Located in Sag Harbor, Long Island in the New York State, the prefabricated house&nbsp;retains the relation between materiality and the imaginative process, where context plays a major role in driving the architectural concept and materiality. The design process takes into consideration and responds to the Clients brief managing planning restrictions and regulations typical for a Hampton Town. The way materially manifests itself in its simplicity illustrates the everyday domestic tasks, in relation to the spatial imaginary of the house and its green surroundings.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Completed</span><br><span class=\"text-small\"><strong>CLIENT</strong></span><br><span class=\"text-small\">Confidential</span></p>'),
(46, 4, 'Aviators Square', 'aviators-square', '', '<p><span class=\"text-small\">Our vision was proposing organizing the new pedestrian area on a central axis focusing on the existing statuary ensemble, reminiscing an airport runway. Thus, organizing the space in a unitary way, we give it aesthetic and intrinsic symbolic value to the existing monument.&nbsp;The visual perception and the use of space for various commemorative events become sufficient and functional. Visually, the framing on either side of the existing statue with repetitive, symmetrical, slightly elevated elements gives it a welcome frame in the street context. The intervention in the current framework is minimal; we propose to preserve most of the existing landscape elements. The element-module, reminiscent of an airplane wing, repetitive, changing only the angle of relaxation from the vertical to almost horizontal on the opposite side. This change of angle sequentially reflects the idea of â€‹â€‹flight, movement and evolution.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Competition</span></p><p>&nbsp;</p>'),
(47, 4, 'Transmission Tower', 'transmission-tower', 'New York', '<p><strong><u>Metropolitan Television Association</u></strong><br><span class=\"text-small\"><strong>Tower Facts</strong></span><br><span class=\"text-small\">- Overall antenna height: 2000 feet.</span><br><span class=\"text-small\">- Diameters: Base 250 ft, top 230 ft, core 80/60/40 ft.</span><br><span class=\"text-small\">- 50,000 square feet enclosed area at 1350 foot level.</span><br><span class=\"text-small\">- 50,000 square feet enclosed area at base.-</span><br><span class=\"text-small\">- 2 elevators and 4 egress stairs.~</span><br><span class=\"text-small\">- Structural cables heat traced to prevent ice buildup.</span><br><span class=\"text-small\">- Site 1A Dimensions: 360â€™ x 610â€™._</span><br><span class=\"text-small\">- Site 2 Dimensions: 300â€™ x 500â€™.</span><br><span class=\"text-small\"><strong>Critical Facts</strong></span><br><span class=\"text-small\">Interference with flight patterns for La Guardia Airport. Adoption of project by the Empire State Development Corporation or the Port Authority of New York &amp; New Jersey to expedite zoning and environmental review processes.&nbsp;</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Competition</span></p><p>&nbsp;</p>'),
(48, 4, 'Helsinki Central Library', 'helsinki-central-library', '', '<p><span class=\"text-small\">The Library will be the focus of attention of the entire site, located on a prominent spot and very visible from the neighboring streets. As a public amenity, it needs to be inviting and barrier free. The green roof would be a welcoming extension and a major events space, for education,&nbsp;meeting&nbsp;and&nbsp;reading. Lobby public spaces feature viewing of exhibitions and films, intertwining cultural and communication with learning.&nbsp;These&nbsp;features&nbsp;will&nbsp;be&nbsp;presented&nbsp;within&nbsp;the context of promoting context&nbsp;of&nbsp;promoting&nbsp;public&nbsp;awareness and&nbsp;familiarity with the&nbsp;most&nbsp;up&nbsp;to&nbsp;date&nbsp;digital&nbsp;communication&nbsp;technology. Cinema in the basement, connected to a public sauna and restaurant. Operation of all these functions is designed to be completely independent of the Library hours of operation.&nbsp;Massing is formed by a gentle scissor slope, home to a greenspace as a natural extension of the surrounding park. From the standpoint of its three dimensional manifestation, the proposal has two intertwined central elements: one symbolic and the other one programmatic.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Competition</span></p><p>&nbsp;</p><p>&nbsp;</p>'),
(49, 4, 'Murphy House', 'murphy-house', 'New York', '<p><span class=\"text-small\">New York City households reflect increasingly diverse living arrangements.&nbsp; Viable urban housing must be designed to reflect this diversity in such a way that promotes a sense of ownership and pride in its residents. Like the bed from which the building takes its name, the essence of the Murphy House is convertibility.&nbsp; The building is based on four unit types.&nbsp; Each unit is joined to an adjacent, dissimilar, unit by an internally-pivoting, lifting wall, creating new unit types designed to accommodate non-traditional families. In contrast to the anonymous uniformity of much of New Yorkâ€™s affordable housing, the Murphy House favors heterogeneous expression over relentless repetition.&nbsp; The conjoined units are fit together to create a vibrant faÃ§ade.&nbsp; This faÃ§ade expresses the diversity of the units within, promoting a residentâ€™s sense of ownership of a â€œpieceâ€ of the building. The Murphy House employs sustainable practices, such providing dedicated bicycle storage closets, as well as the use of high-albedo concrete with recycled content.&nbsp; In addition, the Murphy House dedicates the western thirty feet of the site to a common green space reserved for resident use, combining sustainable practices with increased pride-of-place.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Competition</span></p><p>&nbsp;</p>'),
(50, 4, 'Copenhagen Theatre', 'copenhagen-theatre', '', '<p><strong><u>Copenhagen Royal Theatre Competition</u></strong><br><br><span class=\"text-small\">Our competition proposals on Copenhagen\'s waterfront for the new Royal Theatre includes an auditorium, studio theatre and rehearsal rooms, along with public restaurants, shops and cafÃ© and backstage accommodation. The form of the building responds to the two fundamental mandates of the competition brief: to develop an open cultural institution and a pragmatic well-functioning venue for cultural events. The proposed solution suspends the Auditorium in a colorful glass encasement, reversing the tradition of the theatre as a dark, monolithic structure. The building responds to the surrounding landscape of the quay, adopting an undulating, planted rooftop, implanted on the edge of the waterfront.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Competition</span></p>');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `projects_fotos`
--

CREATE TABLE `projects_fotos` (
  `id` int(11) NOT NULL,
  `project_id` int(20) NOT NULL,
  `folder_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `projects_fotos`
--

INSERT INTO `projects_fotos` (`id`, `project_id`, `folder_name`, `image`) VALUES
(64, 1, 'about', '61d6eea937734136717385.jpg'),
(65, 32, 'projects/32', '61d73ff0e28e7976282074.jpg'),
(66, 32, 'projects/32', '61d73ff3545831617110007.jpg'),
(72, 31, 'projects/31', '61d741f5761081490297098.jpg'),
(73, 31, 'projects/31', '61d741f6b03b8873034000.jpg'),
(84, 35, 'projects/35', '61d74377671492006938483.jpg'),
(85, 35, 'projects/35', '61d7437f6031b729957385.jpg'),
(87, 35, 'projects/35', '61d74382a37d038757357.jpg'),
(112, 31, 'projects/31', '61d9a80a3ebd41714568783.jpg'),
(113, 31, 'projects/31', '61d9ad7891172253831579.jpg'),
(115, 31, 'projects/31', '61d9af73b0e2a56393787.jpg'),
(116, 31, 'projects/31', '61d9af7e90e3f1779172560.jpg'),
(121, 32, 'projects/32', '61d9b1a1d34d31047458891.jpg'),
(123, 32, 'projects/32', '61d9b1acca07a1614119337.jpg'),
(124, 34, 'projects/34', '61d9b7245f3c71439633053.jpg'),
(125, 34, 'projects/34', '61d9b7281b05d498128206.jpg'),
(126, 34, 'projects/34', '61d9b72c8b84b186581960.jpg'),
(130, 35, 'projects/35', '61d9c29d9fd631969680661.jpg'),
(131, 37, 'projects/37', '61d9ca45d38da124669131.jpg'),
(132, 37, 'projects/37', '61d9ca4ce8760112947244.jpg'),
(133, 37, 'projects/37', '61d9ca5374216620310225.jpg'),
(134, 37, 'projects/37', '61d9ca5a40b2d1312828162.jpg'),
(135, 37, 'projects/37', '61d9ca65462181616247899.jpg'),
(136, 37, 'projects/37', '61d9ca6b17a6d626118853.jpg'),
(137, 37, 'projects/37', '61d9caa06746d134772992.jpg'),
(138, 37, 'projects/37', '61d9caa88a4ef21779802.jpg'),
(139, 42, 'projects/42', '61d9ce5453bc2684350344.jpg'),
(140, 42, 'projects/42', '61d9ce84004e436785646.jpg'),
(141, 42, 'projects/42', '61d9ce8b580621370616226.jpg'),
(142, 42, 'projects/42', '61d9ce92c586e923736774.jpg'),
(143, 42, 'projects/42', '61d9ce995c1f2821160200.jpg'),
(144, 42, 'projects/42', '61d9cec1b5bd4747294671.jpg'),
(145, 42, 'projects/42', '61d9cf6dd28e61633834861.jpg'),
(150, 43, 'projects/43', '61d9dae331bf826307801.jpg'),
(151, 43, 'projects/43', '61d9dae4a82801528930498.jpg'),
(152, 43, 'projects/43', '61d9dae6abe8d658927828.jpg'),
(153, 43, 'projects/43', '61d9dae74d44c1894354211.jpg'),
(154, 43, 'projects/43', '61d9daec41f75864578218.jpg'),
(155, 43, 'projects/43', '61d9daf166e6b533815631.jpg'),
(159, 32, 'projects/32', '61d9e23cf138e297130013.jpg'),
(160, 32, 'projects/32', '61d9e2af3f1c21236249020.jpg'),
(161, 32, 'projects/32', '61d9e52491c21811483322.jpg'),
(175, 39, 'projects/39', '61da1bfc8333b978029986.jpg'),
(176, 39, 'projects/39', '61da1c1aeb40f1975087400.jpg'),
(177, 39, 'projects/39', '61da1c6cba9961973845060.jpg'),
(178, 39, 'projects/39', '61da1c766f04c1366900161.jpg'),
(179, 39, 'projects/39', '61da1c7dec5bd428202235.jpg'),
(180, 39, 'projects/39', '61da1c899618d617915514.jpg'),
(181, 39, 'projects/39', '61da1c9526b971376770405.jpg'),
(183, 39, 'projects/39', '61da1cb39733a784026199.jpg'),
(184, 39, 'projects/39', '61da1cbc4f41e162199313.jpg'),
(185, 39, 'projects/39', '61da1cf8ad2021697470276.jpg'),
(186, 39, 'projects/39', '61da1d0278b75877176989.jpg'),
(188, 40, 'projects/40', '61da27e4be243608755883.jpg'),
(189, 40, 'projects/40', '61da27ef3f7c3782130496.jpg'),
(190, 40, 'projects/40', '61da27fc43a48244140894.jpg'),
(191, 40, 'projects/40', '61da2801c9f611795349707.jpg'),
(192, 40, 'projects/40', '61da280640c34546000405.jpg'),
(193, 46, 'projects/46', '61da2f291128f10524971.jpg'),
(194, 46, 'projects/46', '61da2f2fb7bb01397304046.jpg'),
(195, 46, 'projects/46', '61da2f3578c3c513525550.jpg'),
(196, 46, 'projects/46', '61da2f3999ffb1400706811.jpg'),
(197, 45, 'projects/45', '61e291ff2603d215016237.jpg'),
(198, 45, 'projects/45', '61e29214105d0395732118.jpg'),
(199, 45, 'projects/45', '61e2921b8f6ea573563017.jpg'),
(200, 45, 'projects/45', '61e29221739251597800485.jpg'),
(201, 45, 'projects/45', '61e29227671151622646176.jpg'),
(202, 31, 'projects/31', '61eb25eda8dba755153482.jpg'),
(203, 31, 'projects/31', '61eb25f576f781680446734.jpg'),
(204, 31, 'projects/31', '61eb25f83a34373017757.jpg'),
(205, 34, 'projects/34', '61eb2e04cdd871925778501.jpg'),
(206, 34, 'projects/34', '61eb2e11185901055228611.jpg'),
(207, 34, 'projects/34', '61eb2e156242b1082287945.jpg'),
(208, 34, 'projects/34', '61eb2e19af9991308295911.jpg'),
(209, 46, 'projects/46', '61eb48f7434551618161635.jpg'),
(210, 46, 'projects/46', '61eb49d49d7ba1280080466.jpg'),
(211, 41, 'projects/41', '61eb5635d0a56416101115.jpg'),
(212, 41, 'projects/41', '61eb5639673b2770210282.jpg'),
(213, 41, 'projects/41', '61eb563da87671063389918.jpg'),
(214, 41, 'projects/41', '61eb564091441254727285.jpg'),
(215, 41, 'projects/41', '61eb564425777996950766.jpg'),
(216, 41, 'projects/41', '61eb5647a90ed104803071.jpg'),
(217, 41, 'projects/41', '61eb566530d90160557189.jpg'),
(218, 47, 'projects/47', '61eca111cf4611241780335.jpg'),
(219, 47, 'projects/47', '61eca142036811225599162.jpg'),
(220, 47, 'projects/47', '61eca14428855955984417.jpg'),
(221, 47, 'projects/47', '61eca14688d1c70422294.jpg'),
(222, 47, 'projects/47', '61eca1e997c0c180998378.jpg'),
(223, 48, 'projects/48', '61eca339de9631271844314.jpg'),
(224, 48, 'projects/48', '61eca34226d60908599480.jpg'),
(225, 48, 'projects/48', '61eca348390731982880712.jpg'),
(226, 48, 'projects/48', '61eca34f181651391508883.jpg'),
(227, 48, 'projects/48', '61eca357277201974056763.jpg'),
(228, 48, 'projects/48', '61eca35c3caf41971398989.jpg'),
(229, 49, 'projects/49', '61eca93639e3e2125635381.jpg'),
(230, 38, 'projects/38', '61ecae3906080932342769.jpg'),
(231, 38, 'projects/38', '61ecae3d2f5ca57003945.jpg'),
(232, 38, 'projects/38', '61ecae41077b51603712308.jpg'),
(233, 38, 'projects/38', '61ecae4459889575090664.jpg'),
(234, 50, 'projects/50', '61ecb3652bde9669916181.jpg'),
(235, 50, 'projects/50', '61ecb36907b751066717223.jpg'),
(236, 50, 'projects/50', '61ecb36cc4d7b1447588070.jpg'),
(237, 50, 'projects/50', '61ecb36fa5b42567925904.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pwdreset`
--

CREATE TABLE `pwdreset` (
  `id` int(11) NOT NULL,
  `pwdResetEmail` text COLLATE utf8_unicode_ci NOT NULL,
  `pwdResetSelector` text COLLATE utf8_unicode_ci NOT NULL,
  `pwdResetToken` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pwdResetExpires` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `simple_pages_fotos`
--

CREATE TABLE `simple_pages_fotos` (
  `id` int(11) NOT NULL,
  `page_id` int(20) NOT NULL,
  `folder_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `simple_pages_fotos`
--

INSERT INTO `simple_pages_fotos` (`id`, `page_id`, `folder_name`, `image`) VALUES
(19, 4, 'pages/contact', '61d73de10ea21446609.jpg'),
(35, 5, 'pages/interiors', '61eb4a09078f22135077082.jpg'),
(36, 5, 'pages/interiors', '61ebe3773a586254038400.jpg'),
(37, 5, 'pages/interiors', '61ebe37cd333c1024710117.jpg'),
(38, 5, 'pages/interiors', '61ebe3809c10f718642202.jpg'),
(39, 5, 'pages/interiors', '61ebe3839abf91504346429.jpg'),
(40, 5, 'pages/interiors', '61ebe386a3cf51103048410.jpg'),
(41, 5, 'pages/interiors', '61ebe38a37e41950935056.jpg'),
(42, 5, 'pages/interiors', '61ebe3928482c1682838218.jpg'),
(43, 5, 'pages/interiors', '61ebe3976d095903014280.jpg'),
(44, 5, 'pages/interiors', '61ebe39ca518d243549261.jpg'),
(45, 5, 'pages/interiors', '61ebe3a03063b767557829.jpg'),
(46, 5, 'pages/interiors', '61ebe3a40fa731010128210.jpg'),
(47, 5, 'pages/interiors', '61ebe3a782a451320610858.jpg'),
(48, 5, 'pages/interiors', '61ebe3aa5afbf714432239.jpg'),
(49, 5, 'pages/interiors', '61ebe3ad95d4f1218992858.jpg'),
(50, 5, 'pages/interiors', '61ebe3b13135e430260305.jpg'),
(51, 5, 'pages/interiors', '61ebe3b4121011986464281.jpg'),
(52, 5, 'pages/interiors', '61ebe3dfe3d7e1977505293.jpg'),
(53, 5, 'pages/interiors', '61ebe3e4687181963686027.jpg'),
(54, 5, 'pages/interiors', '61ebe3e7d8f05326774354.jpg'),
(55, 3, 'pages/art', '61ebe74b80d411052804040.jpg'),
(56, 3, 'pages/art', '61ebebeaa4ab91335523889.jpg'),
(57, 3, 'pages/art', '61ebebeea1293759956029.jpg'),
(58, 3, 'pages/art', '61ebebf267e60120748322.jpg'),
(59, 3, 'pages/art', '61ebebf88d6f4708424493.jpg'),
(60, 3, 'pages/art', '61ebebfe556dc1400911892.jpg'),
(61, 3, 'pages/art', '61ebec038813f1409259786.jpg'),
(62, 3, 'pages/art', '61ec5180ecb341281846555.jpg'),
(63, 3, 'pages/art', '61ec51842e116107225759.jpg'),
(64, 3, 'pages/art', '61ec5490e2ce22054291496.jpg'),
(65, 3, 'pages/art', '61ec5494e2f6b238091070.jpg'),
(66, 3, 'pages/art', '61ec549870ecb1254758452.jpg'),
(67, 3, 'pages/art', '61ec549dcd0901970020161.jpg'),
(68, 3, 'pages/art', '61ec54a0f386f16278279.jpg'),
(69, 3, 'pages/art', '61ec54a55a8311265051274.jpg'),
(70, 3, 'pages/art', '61ec565f814fd194137436.jpg'),
(71, 3, 'pages/art', '61ec5663821ca1364213315.jpg'),
(72, 3, 'pages/art', '61ec5666e1fe01368574346.jpg'),
(73, 3, 'pages/art', '61ec566c5f037718430703.jpg'),
(74, 3, 'pages/art', '61ec7119f17661793752115.jpg'),
(75, 3, 'pages/art', '61ec711e4bd4150089387.jpg'),
(76, 3, 'pages/art', '61ec7121c05f4892781157.jpg'),
(77, 3, 'pages/art', '61ec7124c4fdf1008584414.jpg'),
(78, 3, 'pages/art', '61ec712797649631165908.jpg'),
(79, 3, 'pages/art', '61ec712a80ee41895841918.jpg'),
(80, 3, 'pages/art', '61ec7133501872051143201.jpg'),
(81, 3, 'pages/art', '61ec7135af5801002027117.jpg'),
(82, 3, 'pages/art', '61ec7138e72c3651757202.jpg'),
(83, 3, 'pages/art', '61ec713c76f8e556775399.jpg'),
(84, 3, 'pages/art', '61ec71401e9b61378013015.jpg'),
(85, 3, 'pages/art', '61ec71430adb9101335568.jpg'),
(86, 3, 'pages/art', '61ec714751a621333950695.jpg'),
(87, 3, 'pages/art', '61ec714aca6a1281572151.jpg'),
(88, 3, 'pages/art', '61ec714d86e311788124845.jpg'),
(89, 3, 'pages/art', '61ec71508d33b2019060422.jpg'),
(90, 3, 'pages/art', '61ec71535f390269198730.jpg'),
(105, 2, 'pages/collaborations', '61ec9aaa423e91007437863.jpg'),
(106, 2, 'pages/collaborations', '61ec9ab40e21c1664606379.jpg'),
(107, 2, 'pages/collaborations', '61ec9ab9a7282248239321.jpg'),
(108, 2, 'pages/collaborations', '61ec9ac2bb0821843458956.jpg'),
(109, 2, 'pages/collaborations', '61ec9acc418b52135204656.jpg'),
(110, 2, 'pages/collaborations', '61ec9ad46ffd31850701900.jpg'),
(111, 2, 'pages/collaborations', '61ec9adbcaa701304861891.jpg'),
(112, 2, 'pages/collaborations', '61ec9ae25803c726620835.jpg'),
(113, 2, 'pages/collaborations', '61ec9ae8ace131171293562.jpg'),
(116, 5, 'pages/interiors', '61ecc79905c641869254558.jpg'),
(117, 5, 'pages/interiors', '61ecc79da8c84293365841.jpg'),
(118, 5, 'pages/interiors', '61ecc7a106e68241052106.jpg'),
(119, 5, 'pages/interiors', '61ecc7a4593c5668149763.jpg'),
(120, 5, 'pages/interiors', '61ecc7a7464971595083514.jpg'),
(121, 5, 'pages/interiors', '61ecc7aa1c67f2025389035.jpg'),
(122, 5, 'pages/interiors', '61ecc7ad8bc031741107047.jpg'),
(125, 5, 'pages/interiors', '61ed30e3b939f750974309.jpg'),
(126, 5, 'pages/interiors', '61ed30e675e75363792367.jpg'),
(127, 1, 'pages/about', '61ed3147e16b0620373671.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `simple_pages_text`
--

CREATE TABLE `simple_pages_text` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `folder_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `simple_pages_text`
--

INSERT INTO `simple_pages_text` (`id`, `title`, `subtitle`, `description`, `folder_name`) VALUES
(1, 'About us', '', '<p style=\"text-align:justify;\"><span class=\"text-small\">Architectural and Interior Design work with a small team of highly qualified individuals with a diverse and extensive international project portfolio. We offer a full range of architectural services from inception through to completion and beyond, delivering the highest quality of service and working with clients to meet their aspirations whilst paying attention to the finest detail.&nbsp;We aim to closely manage each scheme on an individual basis to ensure the Clientâ€™s brief is met with the highest standards of performance.</span></p>', 'pages/about'),
(2, 'Collaborations', 'Working with International Practices', '<p><span class=\"text-small\">In the past 25 years, working with well-known property developers and architectural&nbsp;companies in Europe, Middle East, China and United States, we have gathered invaluable experience and have been engaged&nbsp;in large scale property development projects. We have provided quality Design and Project Management services, successfully&nbsp;delivering projects such primary schools in the US with Max Urbahn Architects, residential and mixed-used developments in US and Middle East, a Science Center in Macao, China with Pei Architects, Macao Science Center in China&nbsp;with Pei Architects, Burjuman Multifunctional Center in Dubai with KPF and various residential and commercial projects with LLOX-Belgium and YRM London UK. We have delivered an array of building types: single and multi-family residential buildings, institutional, educational and commercial developments, medical facilities as well as urban interventions, installation art and landscape projects from concept through planning, design and construction. We have collaborated with world best engineers like Arup Group, WSP, Thornton Tomasetti or Buro Happold.</span></p>', 'pages/collaborations'),
(3, 'Art', '', '<p><strong><u>Installation Art</u></strong><br><span class=\"text-small\">Our installation art is situated at the border between art and architecture, part physical experiment - part personal expression, joined together in defining a space. Our works of installation art are maximizing the potential of the given spatial experience in relation to objects and colours,&nbsp;focusing on ever-changing human emotions. Our landscape projects utilize functional and practical spaces integrated in nature. We are concentrating on translating humans\' fundamental emotions towards a stronger connection with the ambient, with an emphasis on extending and overlapping the seasons with our planting approach. We\'ve started to explore and implement the principles of biophilia, re-establishing the missing links with our surroundings and re-discovering the simplicity and balance of well-being.</span><br><strong><u>Film Set Design</u></strong><br><span class=\"text-small\">In 2004 by teaming up with a group of experienced artists, we\'ve created set designs for award winning films, â€œLes Rois Maudits ( The Cursed Kings ) directed by Josee Dayan with Gerard Depardieu, produced by France 2TV and the 2005 production of â€The Cave\" by Bruce Hunt, with sets created under the umbrella of Castel Film Romania.</span><br><strong><u>Visual Art</u></strong><br><span class=\"text-small\">Raluca Gavrilescu (b.1975 - Ungureanu) is a Multimedia Artist and Interior Designer.&nbsp;Following completion of PhD studies in Visual Arts, Raluca deepened her mastering of shape and colour, her interest in experimenting various techniques to the avant-garde of the artistic expression. She also completed her studies in Landscape Architecture, delivering successful projects and masterplans. Raluca is the recipient of a number of important fellowships: The Instituto Nacional de Bellas Artes de Lisbon (Portugal), Research at The Royal Danish, Copenhagen (Denmark) and Akademie der Bildenden Kunste Wien, Vienna (Austria), extension fellowship in Berlin, 1st place at the Young Artist Award UAPR. Raluca is currently investigating various new themes within the wider topic of personal identity: &nbsp;existentialism, dichotomy and clashes amongst multiple identities, borders, limits, displacement, memory and reality.</span></p><p>&nbsp;</p>', 'pages/art'),
(4, 'Contact Us', 'Geometrik Architects', '<p><strong>New Yor</strong>k<br><span class=\"text-small\">| 119 E 101 Street | New YorkCity | 10029 |</span><br><span class=\"text-small\">| M +1 240 462 7878 |</span><br><br><strong>London</strong><br><span class=\"text-small\">| 60 Westferry Rd | London | E14 8LN |</span><br><span class=\"text-small\">| T +44 207 981 9778 | M +44 797 262 2789 |</span><br><br><strong>Bucharest</strong><br><span class=\"text-small\">| 16 Dorneasca St. |&nbsp; Bucharest | 051717 |</span><br><span class=\"text-small\">| T +40 21 4119098 | M +44 730 777766&nbsp;|&nbsp;</span><br><br><span class=\"text-small\">office@gdarcht.com | www.gdarcht.com</span><br>&nbsp;</p>', 'pages/contact'),
(5, 'Interiors', 'LAC Residence', '<p><span class=\"text-small\">LAC residence is located in Princeton, New&nbsp;Jersey.&nbsp;The house spaciousness was our main objective right from the concept stage. Therefore, the way weâ€™ve designed the interiors of the historical house made us reconsider our own perception of space. The integration of design details, the shape, size, color and light allowed us to make use of innovative tools in order to re-create physical qualities of the given space, to suggest illusions that transformed the way people look at space and spaciousness. We have spent time to understand how those who inhabit the house see it, then used specific design instruments to create a space&nbsp;that appears the way it is intended to be seen by the designer in perfect synergy with the Clients.</span><br><br><span class=\"text-small\"><strong>STATUS</strong></span><br><span class=\"text-small\">Completed</span><br><span class=\"text-small\"><strong>CLIENT</strong></span><br><span class=\"text-small\">Confidential</span><br>&nbsp;</p>', 'pages/interiors');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_image` text COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `phone`, `user_image`, `user_password`, `timestamp`) VALUES
(27, 'Razvan', 'Crisan', 'razvan', 'crsn_razvan@yahoo.com', '0755962057', '', '$2y$10$CBusexYtUvZOLkyl/hE6QObbh3IT2lhpviRiYf5cAEjP1Thf2IE1O', '2021-09-02 18:04:41'),
(30, 'Flavian', 'Pah', 'flavian', 'flavian.pah@ctotech.io', '0741079704', '', '$2y$10$FSXuZDtlTQeyj7L1Ipa9h.q7JFF7ag71SBEZXXvhVDHPRt5/ZPbWS', '2022-01-07 08:00:45'),
(31, 'Cristian', 'Gavrilescu', 'CristianG', '', '', '', '$2y$10$JUyNKLYFciYx1ksjPWoWFOSfclVZhNNArGXCheZze6P.MPg96GbNS', '2022-01-07 08:44:46');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `links_containers_bg`
--
ALTER TABLE `links_containers_bg`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `nav_links`
--
ALTER TABLE `nav_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `projects_fotos`
--
ALTER TABLE `projects_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `simple_pages_fotos`
--
ALTER TABLE `simple_pages_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `simple_pages_text`
--
ALTER TABLE `simple_pages_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pentru tabele `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `links_containers_bg`
--
ALTER TABLE `links_containers_bg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `nav_links`
--
ALTER TABLE `nav_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pentru tabele `projects_fotos`
--
ALTER TABLE `projects_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT pentru tabele `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pentru tabele `simple_pages_fotos`
--
ALTER TABLE `simple_pages_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pentru tabele `simple_pages_text`
--
ALTER TABLE `simple_pages_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
