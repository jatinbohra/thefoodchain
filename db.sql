-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2026 at 09:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_foodlink`
--

CREATE TABLE `add_foodlink` (
  `id` int(11) NOT NULL,
  `linkname` varchar(225) NOT NULL,
  `Description` varchar(800) NOT NULL,
  `cuisine` varchar(225) NOT NULL,
  `img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `add_foodlink`
--

INSERT INTO `add_foodlink` (`id`, `linkname`, `Description`, `cuisine`, `img`) VALUES
(2, 'Gatte ki sabzi', 'This is an easy to digest and popular curry of Rajasthan made of gram flour balls with the gravy being prepared of buttermilk and different spices. It can be relished with both roti and rice.', 'RAJASTHANI CUISINE', 'upload slide/Rajasthani-Food2.jpg'),
(3, 'Shrikhand (Sweets)', 'When it comes to sweets, the Gujaratis have a wide variety to offer. These include shrikhand, jalebi, sukhadi, malapua, sutarfeni, keri no ras, ghughra, kansar, son papdi, laddu, kaju katli, gaajar halwa, gulab jamun and the list goes on! Milk, nuts and sugar are the three main ingredients that are used in preparing different Gujarati sweets. Items like ghooghra and magas are usually prepared during festivals and special occasions like marriage.', 'GUJRATI CUISINE', 'upload slide/Gujarati-Food.jpg'),
(4, 'Dhokla', 'Many of the farsans are also taken as nasta that includes dhokla which has remained one of the popular Gujarati snacks. Items categorised as nasta are mostly deep fried and prepared out of gram flour. Some Gujarati nasta items are Khandvi, khakhra, mathis, chakri, fafda and sev.\r\n', 'GUJRATI CUISINE', 'upload slide/dhokla.jpg'),
(5, 'Lassi (Panjabi Drink) ', 'Prehaps due to the abundance of dairy products, a punjabi meal is never considered complete without a drink like Lassi or chaas. If it is a light meal, the Lassi will help satiate your tummy, and If it is a heavy meal the chaas will help you digest it!', 'PANJABI CUISINE', 'upload slide/download (5).jpg'),
(6, 'Sarson Ka Saag and Makki Ki Roti', 'Sarson da saag te makki di roti is a quintessential Punjabi dish that is enjoyed by both Punjabis and non-Punjabis alike. The dish uses spinach-which makes it a healthier alternative.', 'PANJABI CUISINE', 'upload slide/Sarson-ka-saag-and-makki-ki-roti.jpg'),
(7, 'Masala Dosa', 'Masala Dosa is a vegetarian dish and is made primarily in Karnataka. There are two important parts of making a dosa masala – one is by making the main dish itself and the other is by making the potato and onion bhaji that goes with it. It may also be regarded as the spicier alternative of the sada or plain dosa.', 'SOUTH INDIAN CUISINE', 'upload slide/dosa-masala.jpeg'),
(8, 'Idli Sambar', 'on most weekdays, we eat the typical south indian breakfast like idli, dosa and perarthu since they are high in protein and healthy a well. sometimes i make mini idli for dinner when the kids ask for it,this samber along with the  mini idli and ghee is one of my kids favorites. there are few diffrent ways a samber is made ,one of them is the SAUTH INDIAN SAMBAR which i shared before.', 'SOUTH INDIAN CUISINE', 'upload slide/idli sambar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `add_recipes`
--

CREATE TABLE `add_recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `recipes` longtext NOT NULL,
  `cuisine` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `add_recipes`
--

INSERT INTO `add_recipes` (`id`, `title`, `image`, `recipes`, `cuisine`) VALUES
(1, 'Dal-Bati-Churma', 'upload slide/Rajasthani-Food1.jpg', 'Introduction\r\nMain Ingredients-\r\nMoong Daal\r\nChana Daal\r\nToor Daal\r\nWhole wheat flour\r\nCoarse semolina\r\nBengal gram flour\r\nGhee\r\nDaal Baati is a special vegetarian, Rajasthani dish that leaves a lingering taste in the mouth. It\'s a famous food from Rajasthan and is quite nutritious. It is in fact the staple dish for the people in Rajasthan. The roasted Baati is dipped into the Daal before being eaten.\r\n\r\nIngredients for Daal Baati\r\n\r\nMoong Daal-100 gms (Yellow lentils)\r\nChana Daal-100 gms (Bengal gram)\r\nToor Daal-100 gms (Yellow pigeon peas)\r\nRed chilli powder (½ tsp)\r\nTurmeric powder (1 tsp)\r\nAsafetida powder (¼ tsp)\r\n2 green chillies\r\nMelted ghee (3-4 tbsps)\r\nCumin seeds (1 tsp)\r\nGrated ginger (2 tsps)\r\nIngredients for Baati\r\n\r\nWhole wheat flour (300 gms)\r\nCoarse semolina (150 gms)\r\nBengal gram flour (5 tbsps)\r\nSalt (1 tsp)\r\nGhee (6 tbsps)\r\nDaal Baati Preparation\r\nHow to make the Daal\r\n\r\nMix Moong Daal, Chana Daal and Toor Daal in a bowl. Wash it thoroughly. Add 3 cups of water and put the mixture in a pressure cooker. To it add red chilli, turmeric powder, and asafetida powder. Stir the mixture and tighten the lid over the pressure cooker. Keep boiling till the Daal becomes soft. When you hear the first whistle, reduce heat from high to low. Wait for about 2 more whistles to pass before taking the pressure cooker off the heat.\r\n\r\nKeep the pressure cooker aside till all the pressure is let out. If you do not want to use a pressure cooker, you may use a normal utensil too. But it will take you a bit longer to cook the Daal.\r\n\r\nTo temper the Daal, heat ghee in a small pan. Add green chillies, grated ginger, and cumin seeds to the pan when the ghee is hot. Continue to cook the mixture for about 2-3 minutes. Remove it from heat and add boiled Daal to the pan. Add salt for taste, stir well and Daal is now ready.\r\n\r\nHow to make the Baati\r\n\r\nMix the semolina, flour, bengal gram flour, ghee, and salt in a bowl. After mixing it well, knead it for about 5 to 7 minutes to develop firm dough. Keep the dough aside for about 10-15 minutes.\r\n\r\nPre-heat the oven to about 200 C. Break the dough into equal parts so that it can be rolled into smooth balls. Flatten the balls a little bit and keep them in a baking tray. Place the balls at a mutual distance of about 1”. Bake the balls or Baatis till it develops a golden color. Remember to turn the Baatis around at every 5-7 minutes, to prevent it from being over cooked. Your Baatis are now ready to be eaten with Daal.\r\n\r\n', 'RAJASTHANI CUISINE'),
(2, 'GATTE KI SABJI', 'upload slide/Rajasthani-Food2.jpg', 'INGREDIENTS FOR GATTE KI SABJI RECIPE (1 CUP = 250 ML) for making gatte 2 cups besan or 200 grams 1 pinch asafoetida (hing) ¼ teaspoon turmeric powder ½ teaspoon carom seeds (ajwain) ½ teaspoon red chili powder 1 teaspoon coriander powder 1 teaspoon salt or add as required 3 tablespoons oil 2 tablespoons curd or 30 grams (dahi or yogurt) 4 to 5 tablespoons water or add as required for kneading 4 cups water for cooking gatte for onion paste ½ cup roughly chopped onion or 1 medium sized onion 3 to 4 small to medium garlic cloves or ½ teaspoon chopped garlic ½ inch ginger or ½ teaspoon chopped ginger 1 to 2 tablespoons water or add as required – optional for grinding for making gatte ki sabji (gravy) 2 tablespoons oil or ghee 1 teaspoon cumin seeds 3 cloves (lavang) 1 inch cinnamon (dalchini) 2 green cardamoms 1 small to medium tej patta 1 dry red chilli – seeds removed 1 cup curd or 240 to 250 grams, beaten 1 pinch asafoetida (hing) ½ teaspoon turmeric powder 2 teaspoons red chilli powder 1 tablespoon coriander powder 1 cup of the cooked gatte water or add as required salt as required 2 tablespoons chopped coriander leaves HOW TO MAKE GATTE KI SABJI RECIPE making dough for gatte in a large bowl or a plate, take 2 cups besan (200 grams). add the following ingredients – 1 pinch asafoetida, ¼ teaspoon turmeric powder, ½ teaspoon carom seeds (ajwain), ½ teaspoon red chili powder and 1 teaspoon coriander powder. also add 1 teaspoon salt or add as per taste. add 3 tablespoons oil and 2 tablespoons curd. mix everything very well. making sure that the oil is mixed evenly. then add water in parts and begin to knead. knead very well allowing the besan to absorb water. overall knead for 10 to 11 minutes. you will need 4 to 5 tablespoons water. addition of water will depend on the type of flour. also if the curd used is watery or has more whey in it, less water will be required. knead to a semi soft dough like a poori dough. it should be easy to roll and shape without applying too much of force or strength. you should not see cracks on the dough. if there are cracks, then sprinkle water and continue to knead. in case the dough becomes sticky, then sprinkle some besan and knead again. cooking gatte before making the gatte, take 4 cups water in a pan or kadai. heat the water on medium or medium-high flame. divide the besan dough in 6 equal parts. roll each part to a smooth ball. now with your fingers, roll each dough ball to a soup stick like cylindrical shape. do this with all the 6 dough pieces. slice each dough piece in two to three parts so that they can be placed easily in the kadai. increase the flame to a high or medium-high and let the water come to a boil. now gently place each gatte in the hot boiling water. do not over crowd the pan. so its better to use a medium to large kadai. after they are cooked, the gatte pieces should float on top and bubbles will be seen on them. this means that they are cooked. gently remove them with a slotted spoon draining the extra water. place them on a board or plate and let them become warm or cool at room temperature. making onion paste in a small grinder or blender jar, take ½ cup roughly chopped onion. also add ½ teaspoon chopped garlic and ½ teaspoon chopped ginger. add 1 to 2 tablespoons water or add as required and grind to a fine paste. keep aside. making gravy for gatte ki sabji meanwhile whisk 1 cup of curd (240 to 250 grams) till smooth. keep aside. reserve 1 cup of the water in which the gatte were cooked. keep aside. cut the cooked gatte in small round thick discs. heat 2 tablespoons oil or ghee in another pan. keep flame to a low or medium-low. add 1 teaspoon cumin seeds, 3 cloves, 1 inch cinnamon, 2 green cardamoms, 1 small to medium tej patta and 1 dry red chilli (seeds removed). add all the spices together. so keep them ready before you heat the oil. fry till all the spices crackle. do not burn the spices, so fry them on a low flame. now add the onion paste. take care as the onion paste splutters when you add it. mix well. stirring often sauté onion paste on a low to medium-low flame till it turns golden. making gatte ki sabzji now switch off the flame and add the whisked curd. you can also add the beaten curd in parts. quickly mix the curd very well with the sautéed onion paste. now heat the pan on a low flame and keep on stirring continuously while the curd gets cooked. let the curd come to a boil and you will see some oil specks on top. then add all the spice powders one by one – ½ teaspoon turmeric powder, 2 teaspoons red chilli powder, 1 tablespoon coriander powder and 1 pinch asafoetida (optional). mix the spice powders very well with the curd. continue to sauté for 1 to 2 minutes till you see some oil floating on top. now add 1 cup of reserved water in which the gatte were cooked. mix very well. add salt as per taste. mix again. simmer the gravy or curry on a medium-low flame. stir at intervals. let this gravy to a boil. once the gravy comes to a boil, then add all of the gatte pieces. stir gently and lightly. simmer on low to medium-low flame till curry thickens slightly. overall cook the gatte ki sabji for about 5 to 6 minutes or till the gravy thickens slightly. do note that on cooling the gravy thickens more. later switch off the flame and add 2 tablespoons chopped coriander leaves. serve gatte ki sabji with roti or parathas or jowar roti or bajra roti. you can also serve this besan ki sabji with steamed rice or jeera rice. NOTES tips for making gatte ki sabji please use full fat curd. homemade curd is the best. do not use curd made from low fat milk or toned milk. both onion and garlic can be skipped in the recipe. add water as required depending on the consistency of the gravy you want. 2 teaspoons of red chilly powder makes the gatte ki sabzi spicy. for less spicy taste, add ½ to 1 teaspoon red chilly powder. in this case also reduce the amount of coriander powder to ½ tablespoon. gatte can be made a day before also and then added to the gravy. keep the gatte in fridge if making a day before.', 'RAJASTHANI CUISINE'),
(3, 'shrikhand (sweet)', 'upload slide/Gujarati-Food.jpg', 'INGREDIENTS FOR SHRIKHAND RECIPE\r\n(1 CUP = 250 ML)\r\nfor hung curd\r\n4.5 cups fresh full fat dahi (curd or yogurt) or about 1.125 kg or 1.125 litres curd - made from 1 litre milk\r\nfor shrikhand\r\n8 to 9 tablespoon sugar or powdered sugar - add as per taste\r\n½ teaspoon cardamom powder (choti elaichi powder) Or 4 to 5 green cardamoms - crushed finely in a mortar-pestle\r\n2 pinch saffron strands (kesar)\r\n½ tablespoon warm milk\r\n7 to 8 crushed or chopped pistachios for garnish. you can use any dry fruit of your choice\r\nHOW TO MAKE SHRIKHAND RECIPE\r\nmaking hung curd for shrikhand recipe\r\nfirst line the strainer on a deep bowl. then line a muslin cheesecloth or kitchen cotton towel on the strainer.\r\npour the fresh curd. i added 4.5 cups of curd (made from 1 litre of full fat milk, about 1.125 kgs). do use fresh curd and not sour one.\r\nbring the four edges of the muslin together and tie one edge tightly around the rest.\r\ngently press and you will see the whey dripping.\r\nnow place a heavy bowl or lid or tray on the tied muslin. if you have a hook, you can also hung the muslin in your refrigerator. now keep the whole thing in the fridge for 4 to 5 hours or overnight. i kept for 24 hours. do use a deep bowl below, so that there is some distance between the curd in the strainer and the collected whey. otherwise the whey will touch the strainer as well as the curd. thus there will be some whey in the curd.\r\nnext day the whey will be drained and the hung curd will be ready. use the collected nutrient rich greenish whey in your everyday food like preparing chapatis, gravies, rice dishes, dals etc.\r\nwith a silicon spatula, collect the hung curd in a container or lidded bowl if not using it. cover with its lid and then refrigerate. with the hung curd you can now proceed to make the shrikhand.\r\nmaking shrikhand\r\ntake 1/2 tbsp warm milk in a small bowl. add 2 pinch of saffron strands. stir and keep aside.\r\nin a mortar powder 4 to 5 green cardamoms. keep aside.\r\ntake the chakka or hung curd in a bowl.\r\nadd fine sugar. lightly stir with a spatula or spoon. you can also use powdered sugar.\r\nthen add the saffron dissolved milk and powdered saffron.\r\nusing an electric beater, begin to whip the hung curd. you can also beat the hung yogurt in a blender.\r\nwhip till smooth. the sugar should also dissolve. check the taste and add more sugar if required.\r\nwith a silicon spatula scrape the beaters\' sides and edges of the hung curd and add to the bowl.\r\nyou can chill the shrikhand in fridge and later serve. while serving shrikhand, top with some sliced dry fruits. you can also top shrikhand with crushed dry fruits. i added some crushed pistachios for garnish.', 'GUJRATI CUISINE'),
(4, 'Dhokla', 'upload slide/dhokla.jpg', 'Introduction Main Ingredients- Rice Urad dal Yogurt Baking soda Oil Dhokla is an Indian snack food that has its origins in the western Indian state of Gujarat. It is completely vegetarian and utterly delicious. Dhokla can be of various tastes- Khaman Dhokla, Khatta Dhokla, Cheese Dhokla and Rasia Dhokla among others. Cooking Dhokla Ingredients Rice 1 cup Urad dal or black gram ¼ cup skinless Yogurt ¼ cup Ginger 1 one-inch piece Warm water-1 ½ cups Green chillies 4 pieces Lemon juice 1 tablespoon Coriander leaves 2 tablespoons Baking soda or soda bi-carbonate ½ tablespoon Oil 2 tablespoons Salt as per taste Method of preparation Put the pan on medium heat. Dry roast the rice and dal for a period of 4 - 5 minutes. Let it cool. Then grind the mix into a semi-coarse powder Put the powder in a bowl. Add sour yogurt and warm water Blend well so that the batter is of pouring consistency. Add salt. Let the mix ferment for a period of 8 to 10 hours Make a paste of chillies and ginger Once fermented, put the ginger-chili paste into the batter Grease the thali or dhokla platter Boil water in a boiler or steamer Pour half of the total batter into a separate vessel Put half tablespoon oil, half tablespoon lemon juice and quarter tablespoon baking soda in a small bowl Add the mix to the batter and blend well Repeat the procedure for the remaining batter before putting it into the steamer Pour into the greased platter and keep it inside the steamer for a period of 8 – 10 minutes. Check the preparation with a knife. If the knife comes out clean, cooking is complete. Sprinkle finely shredded coriander leaves. Serve hot accompanied by green chutney.		', 'GUJRATI CUISINE'),
(5, 'Lassi (Panjabi Drink)', 'upload slide/download (5).jpg', 'INGREDIENTS FOR LASSI RECIPE-\r\n\r\n(1 CUP = 250 ML)\r\n2 cups chilled fresh curd (dahi or yogurt)\r\n1.5 to 2 cups chilled water or milk or half-half of both water and milk\r\n10 to 12 tablespoons sugar or add as per taste\r\n1 teaspoon cardamom powder or 2 tsp rose water\r\na few strands of saffron (kesar), optional\r\n6 to 8 ice cubes, optional\r\n1 to 2 tablespoons chopped or sliced dry fruits, optional\r\nHOW TO MAKE LASSI RECIPE\r\nin a mortar, take 8 to 10 cardamom pods and crush them. remove the husk and crush the seeds. crush to a fine powder.\r\nin a bowl or pan, take 2 cups fresh chilled yogurt. i used homemade curd.\r\nwith a madani or blender or wired whisk just mix the curd till it become smooth.\r\nthe curd should be smooth before you add other ingredients to it.\r\nadd 10 to 12 tbsp sugar or as required.\r\nthen add 2 cups chilled water. you can also add 2 cups chilled milk, instead of water. the consistency of this lassi\r\nis neither thin nor thick. if you want a thick lassi, then add 1 to 1.5 cups water.\r\nnow churn the madani in the lassi mixture.\r\nkeep on churning till the sugar dissolves and you see a nice frothy layer on top. you can also use an immersion \r\nblender for the same. another way is to add everything in a blender jar and blend till smooth.\r\nnow add 1 tsp of the crushed cardamom powder and a few saffron strands. as a substitute for cardamom powder, you can\r\nalso add 2 tsp of rose water. you can also skip all the flavoring ingredients, if you don\'t have any.\r\njust mix with the madani again. add ice cubes and mix again.\r\npour lassi in tall glasses and serve. if you want, you can also top the lassi with 1 to 2 tbsp of malai (cream which\r\ncollect on top of milk) or 1 to 2 tbsp of unsalted white butter/makhan.\r\ngarnish sweet lassi with a pinch or two of cardamom powder, 2 to 3 saffron strands or chopped dry fruits. serve \r\nsweet punjabi lassi immediately.\r\nNOTES:-\r\nthis punjabi lassi recipe can be doubled or tripled.\r\nif you want then you can store the lassi in fridge for 1-2 days. no need to add ice cubes, if you plan to store \r\nlassi in fridge.', 'PANJABI CUISINE'),
(6, 'Sarson ka saag and makki ki roti', 'upload slide/Sarson-ka-saag-and-makki-ki-roti.jpg', 'INGREDIENTS FOR Sarson ka saag and makki ki roti  RECIPE-\r\n\r\nCooking sarson da saag\r\n\r\nIngredients\r\n\r\nFresh ginger pieces of 2 cm length\r\n2 garlic cloves finely chopped\r\nTable salt- 2 table spoons\r\nCornmeal- 2 table spoon\r\nMustard greens- 500 grams\r\nGreen chillies-2 pieces\r\nGhee or clarified butter-2 table spoons\r\n\r\nMethod of preparation\r\n\r\n1.Bring the mustard greens. Wash them. Finely shred them.\r\n2.Bring a big pot. Put the finely chopped mustard greens in them. Add 2 cups of water with salt.\r\n3.Put the cover on the pot. Cook for a period of 15-20 minutes. The chopped green must be tender.\r\n4.After the mustard greens become tender, move the pot from the heat\r\n5.Take excess water from the pot into a separate container\r\n6.Using a pestle, mash the green and stir in cornflour. Then place the pot on the stove and turn \r\non the heat. Heat for 10-12 minutes\r\n7.Put ghee in a pan. Heat a little. Introduce chillies, ginger and garlic.\r\n8.Fry in the pan. Bring out the contents and pour into another pan.\r\n9.Mix the contents well. Saag can now be served.\r\n\r\n\r\nPreparing makki di roti\r\n\r\nIngredients\r\n\r\nWheat flour-100 grams\r\nMaize flour-250 grams\r\nChopped coriander leaves- 20 grams\r\nSalt as appropriate\r\nOil for shallow frying\r\nWarm water\r\n\r\nMethod of preparation\r\n\r\n1.Mix wheat flour, maize flour and salt in bowl. After mixing, add in coriander\r\n2.Add warm water. Mix and knead to make a smooth dough\r\n3.With a damp kitchen cloth, cover the roti for 30 minutes\r\n4.Cut the dough into 8 equal parts. With your palm, flatten the dough pieces\r\n5.Slowly roll the dough to a thick and small round. A small quantity of flour can be\r\nsprinkled to stop the dough to stick to the surface.\r\n6.Griddle is now heated. Roti is placed on it. Put 1-2 teaspoonful of oil all around it and cook\r\n7.Keep the roti turning on both sides\r\n8.Roti is now ready to be served. Butter can be added for a richer taste.', 'PANJABI CUISINE');

-- --------------------------------------------------------

--
-- Table structure for table `add_slide`
--

CREATE TABLE `add_slide` (
  `id` int(11) NOT NULL,
  `slide` varchar(225) NOT NULL,
  `slide_cuisine` varchar(225) NOT NULL,
  `Description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `add_slide`
--

INSERT INTO `add_slide` (`id`, `slide`, `slide_cuisine`, `Description`) VALUES
(10, 'upload slide/Gujarati-Food.jpg', 'GUJRATI CUISINE', 'Shrikhand, indian yoghurt sweet.'),
(11, 'upload slide/Sarson-ka-saag-and-makki-ki-roti.jpg', 'PANJABI CUISINE', 'Sarson-ka-saag-and-makki-ki-roti is a popular vegetarian dish from the Punjab region of South Asia.'),
(13, 'upload slide/dosa-masala.jpeg', 'SOUTH INDIAN CUISINE', 'Masala dosa or masale dose is a variation of the popular South Indian food dosa, which has its ... The two parts are the dosa and the stuffing.'),
(14, 'upload slide/Rajasthani-Food1.jpg', 'RAJASTHANI CUISINE', 'dal - bati - churma is best of rajasthan.');

-- --------------------------------------------------------

--
-- Table structure for table `add_statemenu`
--

CREATE TABLE `add_statemenu` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `add_statemenu`
--

INSERT INTO `add_statemenu` (`id`, `title`, `image`) VALUES
(2, 'RAJASTHANI CUISINE', 'upload slide/images.jpg'),
(4, 'PANJABI CUISINE', 'upload slide/download (2).jpg'),
(5, 'SOUTH INDIAN CUISINE', 'upload slide/images (5).jpg'),
(8, 'MAHARASHTRIAN CUISINE', 'upload slide/download (6).jpg'),
(9, 'GUJARATI CUISINE', 'upload slide/Statue-of-unity.jpg'),
(14, 'BIHARI CUISINE', 'upload slide/BIHAR-CUISINE.jpg'),
(15, 'BENGALI CUISINE', 'upload slide/BANGAL-CUISINE.jpg'),
(16, 'KASHMIRI CUISINE', 'upload slide/KASHMIRI CUISINE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `pass`) VALUES
(1, 'jatin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `country`, `message`) VALUES
(1, 'jatin bohra', 'jatinbohra15@gmail.com', 'india', 'hi jatin'),
(2, 'hitesh', 'hitesh@gmail.com', 'india', 'hi sir,'),
(3, 'hitesh', 'hitesh@gmail.com', 'india', 'hi sir,'),
(4, 'hitesh', 'hitesh@gmail.com', 'india', 'hi sir,'),
(6, 'mahima bohra', 'mahima14@gmail.com', 'india', 'hi sir I am your big fan.'),
(7, 'kunal', 'kunal@gmail.com', 'india', 'hello sir'),
(8, 'pravesh', 'pravesh@gmail.com', 'india', 'hi bro');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `subscribed_at`) VALUES
(1, 'jatin', 'jatin@gmail.com', '2025-09-09 06:40:52'),
(2, 'jatin', 'jatin@gmsil.com', '2026-09-07 12:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `country` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `email`, `mobile`, `country`, `password`) VALUES
(1, 'jatin', 'jatin@gmail.com', '00000000', 'india', '00000000'),
(2, 'jitu', 'jitu@gmail.com', '987654321', 'india', '12345678'),
(3, 'pravesh', 'pravesh@gmail.com', '9581519815', 'india', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_foodlink`
--
ALTER TABLE `add_foodlink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_recipes`
--
ALTER TABLE `add_recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_slide`
--
ALTER TABLE `add_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_statemenu`
--
ALTER TABLE `add_statemenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_foodlink`
--
ALTER TABLE `add_foodlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `add_recipes`
--
ALTER TABLE `add_recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `add_slide`
--
ALTER TABLE `add_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `add_statemenu`
--
ALTER TABLE `add_statemenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
