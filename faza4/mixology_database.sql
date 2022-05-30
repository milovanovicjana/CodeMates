-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2022 at 12:19 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mixology_database`
--
CREATE DATABASE IF NOT EXISTS `mixology_database` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mixology_database`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IdUser`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `cocktail`
--

DROP TABLE IF EXISTS `cocktail`;
CREATE TABLE IF NOT EXISTS `cocktail` (
  `IdCocktail` int(11) NOT NULL AUTO_INCREMENT,
  `CocktailName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `AvgGrade` float NOT NULL,
  `Recipes` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `Image` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float DEFAULT NULL,
  `Alcoholic` tinyint(4) NOT NULL,
  `Approved` tinyint(4) NOT NULL,
  `Description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdCocktail`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cocktail`
--

INSERT INTO `cocktail` (`IdCocktail`, `CocktailName`, `AvgGrade`, `Recipes`, `Image`, `Price`, `Alcoholic`, `Approved`, `Description`) VALUES
(1, 'Tequila Sunrise', 4.5, 'The Tequila Sunrise cocktail, with its bright striations of color, evokes a summer sunrise. This classic drink has only three ingredients—tequila, grenadine and orange juice—and is served unmixed to preserve the color of each layer.\nThe Tequila Sunrise was created in the early 1970s by Bobby Lozoff and Billy Rice at the Trident bar in Sausalito, California. The cocktail achieved notoriety after Mick Jagger tasted it at a party to kick off The Rolling Stones’ 1972 tour. The band began ordering it at stops across the country, and even dubbed the tour “the cocaine and Tequila Sunrise tour,” which helped to propel the drink’s popularity.\nThe Tequila Sunrise is very easy to make, but it must be constructed precisely in order to achieve the desired sunrise look. Tequila and then orange juice (fresh is best) are added to a highball glass filled with ice. Grenadine is applied last, but due to its density, it sinks to the bottom, creating a red layer at the base of the glass. If you want to spruce up the drink, skip the bottled bright-red grenadine available on store shelves and try making your own. It’s an easy exercise that’s worth the effort, as it imbues the cocktail with a richer flavor.', 'Tequila Sunrise_1.jpeg', 8, 1, 1, 'Master the art of a classic tequila sunrise, with grenadine, tequila, orange juice. It\'s the perfect recipe to get your party started.'),
(2, 'Hugo', 5, 'The Hugo Cocktail is a relatively new drink, said to be invented in 2005 by Roland Gruber in Northern Italy, as an alternative to the Aperol spritz. Similar to the drink that inspired it, the Hugo Cocktail is a spritz cocktail made with Prosecco, elderberry syrup or liqueur, and sparkling water. If you’re looking for something refreshing to sip during the summer, don’t miss this Hugo Cocktail! With hints of floral and citrus, this bubbly Italian spritz cocktail comes together with just 5 ingredients. \nThis Hugo Cocktail might be my new summer cocktail of choice. It’s light and refreshing, with hints of floral, citrus and mint. It’s one of those drinks you want to sip slowly but are also ready to drink another one as soon as the first is finished.\nAs all good summer cocktails should be, this Hugo Cocktail is easy to make and comes together in 3 minutes or less! You won’t have to take a long break from the pool to make one of these.', 'Hugo_2.png', 9, 1, 0, 'Refreshing, floral and herbal, the hugo cocktail is perfect for warm summer evenings. Make this simple spritz with prosecco.'),
(3, 'Paloma', 0, 'Mexico’s contribution to the cocktail canon is extensive. Just look at the Paloma, a drink that’s consumed in droves across the border, despite it playing second fiddle to the Margarita in the United States.\n\n\nThe Paloma is a refreshing, easy-to-make cooler that combines tequila, lime juice and grapefruit soda. Its origin story is nebulous, but most reports peg its creation to the 1950s. Blanco tequila is the traditional choice, but lightly aged reposado also makes a fine drink. In this case, it’s best to keep the añejo capped, as the well-aged expression’s oaky profile disrupts that clean, refreshing taste you want in a Paloma.\n\nFeatured Video\nEverything You Need to Know About Tequila in :60\nIn Mexico, Jarritos soda is a popular choice for adding the effervescent grapefruit note. This brand is relatively easy to find stateside, particularly in grocery stores that stock Mexican foods and ingredients. Squirt is another common pick in Mexico, while Ting and Fresca are also suitable options. However, as bartenders continue to embrace fresh juice in their cocktails, it has become increasingly common to use fresh grapefruit juice in place of the grapefruit soda. If you want to go that route, you can complement the juice with unflavored sparkling water to achieve the necessary bubbly effect. This combination yields a similar cocktail, so it’s worth the experiment. ', 'Paloma_3.png', 7, 1, 0, 'Tequila, grapefruit and lime juice give this cocktail a real kick. Garnish the rim of your glass with salt and a wedge of grapefruit for extra punch'),
(4, 'Limoncello', 3.5, 'Do you want to know how to make Homemade Limoncello Recipe? Then you are in the right place! Limoncello is really easy to make. You can make it at home with a few useful tools and few ingredients.\n\nLimoncello is a classic Italian liqueur with a unique unmistakable lemon flavor. In Italy they usually drink Limoncello very cold as a digestive. After a rich hearty meal, maybe after Neapolitan Lasagna, what’s better than a good cold Limoncello to digest? Making Limoncello at home is really easy. All you need is excellent organic lemons and a little patience! So let’s find out how to make Homemade Limoncello Recipe!', 'Limoncello_4.png', 9, 1, 0, 'Make up a batch of this boozy lemony drink - it\'s great as a homemade gift or poured over ice cream'),
(5, 'Wine Cooler', 0, 'This Wine Cooler is perfect for a summer\'s day, with soda, white wine, vodka, and citrus\nDuring hot seasons, people are always looking for refreshing drinks to cool down with. And the best way to achieve that is by making wine coolers and spritzers!\n', 'Wine Cooler_5.jpg', 10, 1, 1, 'Treat yourself to a wine cooler cocktail, a lighter, sparkling alternative to regular wine'),
(6, 'Mai Tai', 2, 'The Mai Tai is one of the most famous Tiki drinks in the world. Composed of rum, orange curaçao, fresh lime juice and orgeat (a nuanced almond syrup), it’s held sway over cocktail enthusiasts and Tiki aficionados for decades. It even enjoyed a star turn in the Elvis film “Blue Hawaii.”\nVictor “Trader Vic” Bergeron is often credited with inventing the drink at his Trader Vic’s bar in the 1940s, though it’s likely that Donn Beach laid the groundwork for the famous recipe during the 1930s at his Don the Beachcomber bar. The original Trader Vic’s recipe featured Jamaica’s J. Wray & Nephew rum. Once Bergeron ran out of his supply, he moved to blending rums in an attempt to create a similar flavor profile.\nOnce the drink is shaken and served over ice (crushed is best), it’s time for the garnish. Go wild, if you’re feeling creative. Some Mai Tais feature everything from pineapple wedges to cherries on top. But if you’d like to keep the presentation cool and classic, a lime wheel and mint spring are a fine choice.\nAnd as for the name: Supposedly, the first person to try the cocktail was said to cry out “Mai Tai!” which means “the best—out of this world” in Tahitian.', 'Mai Tai_6.png', 8, 1, 1, 'Treat yourself to a mai tai cocktail, with the flavours of rum and orange. This recipe serves one, but it\'s easily multiplied for a party'),
(7, 'Bahama Mama', 2.5, 'Take an instant vacation with a sip of this Bahama Mama. This beautiful cocktail combines two different types of rum, three types of juices, a splash of grenadine, and some fun garnishes to make an irresistible drink.\nThis Bahama Mama Cocktail is bursting with the tropical flavors you crave once the weather starts to warm up! The dark and coconut rum and the orange and pineapple juice combine for a delicious splash of flavor that will have you making one after another after another!', 'Bahama Mama_7.png', 7, 1, 1, 'Bahama Mama Cocktail is overflowing with tropical flavor that will have you dreaming of sunshine, summertime, and your favorite beach! Made with dark rum, coffee flavored liqueurs and pineapple juice!'),
(8, 'Cuba Libre', 4.4, 'The Cuba Libre is more complex and beguiling than its simple formula suggests. It calls for rum and Coke with lime, but within those three ingredients lies a synergy that has pleased palates for more than a century. Today, it’s one of the most popular Cuban cocktails in existence—right near the classic Daiquiri, which was created around the same time.\nAs the story goes, the Cuba Libre’s origins can be traced to 1900 and to a U.S. Army captain who was stationed in Havana during the Spanish-American War. He added Coca-Cola and a little lime juice to his Bacardí rum and toasted his Cuban comrades by exclaiming, “Por Cuba Libre!” (“To a free Cuba!”). The drink, and the name, stuck.\nA light, Spanish-style rum like Bacardí certainly works, and making your drink with this rum will approximate the typical version served in bars across the land. But you can also try a richer, fuller-flavored rum from Jamaica, Central or South America or elsewhere.\nRum and Coke is a classic combination that blends the tropical, grassy notes of the rum with the effervescent, spicy flavor of the cola. A squeeze of lime adds a zingy jolt of citrus that complements both ingredients while taming some of the sweetness. It also doesn’t hurt that the Cuba Libre contains caffeine and sugar, making it a preferred party drink, whether you’re celebrating your independence at a dive bar or a dance club.\n', 'Cuba Libre_8.jpg', 8, 1, 1, 'A classic Cuban cocktail of rum, cola, lime and ice. Pour into a tall glass for the ultimate refreshing long cocktail'),
(9, 'Bird of Paradise', 0, 'Although Anaheim tropical bar Strong Water, which is a freeway exit away from Disneyland, features a rum-heavy menu, bartender Lynette Le-Lim wanted to create a vodka drink that tasted like biting into fresh fruit on a hot day. Her Birds of Paradise cocktail not only does that, but she says it’s “approachable to anyone who wants to enjoy escapism with a libation.” \nThis bright, bittersweet riff on a classic tiki cocktail uses a rich simple syrup to add sweetness without watering things down.', 'Bird of Paradise_9.png', 8, 1, 1, 'If you are hosting a tropical party or just looking forward to enjoying cocktails while watching the sunset, this fruity rum cocktail is just what you are looking for!'),
(10, 'Long Island Ice Tea', 0, 'The Long Island Iced Tea was popularized in the 1970s and remains a beloved drink. It’s possible the cocktail was born out of Prohibition, when thirsty scofflaws wanted to disguise their booze. It’s also possible the drink sprung up in the ’70s at a bar in Long Island, or maybe at a TGI Friday’s. This much is known: You still can’t throw a lemon wedge inside the chain restaurant without knocking one over.\nOn paper, the Long Island Iced Tea is one hot mess of a drink. Four different—and disparate—spirits slugging it out in a single glass, along with triple sec, lemon juice and cola? The recipe reads more like a frat-house hazing ritual than one of the world’s most popular cocktails. And yet, somehow, it works.\nSo, it’s best not to intellectualize the Long Island Iced Tea. Instead, love it for what it is: a one-and-done cocktail that goes down quickly and gets the job done. That said, even though the drink is rarely served at establishments juicing fresh citrus, it really perks up with the addition of fresh lemon juice. If you’re making one at home, squeeze some fruit for an easy win. And if you’re looking to tame your tea a bit, pull back the boozy parts from three-quarter ounce to half-ounce, and lean in on the cola. The good people of Long Island won’t be offended.', 'Long Island Ice Tea_10.png', 10, 1, 1, 'Mix a jug of this classic cocktail for a summer party. It\'s made with equal parts of vodka, gin, tequila, rum and triple sec, plus lime, cola and plenty of ice'),
(11, 'Blue Lagoon', 0, 'Everything you need to know about the Blue Lagoon is right in the name. Tall, refreshing and bluer than the bluest Caribbean sky, the cocktail turns vodka, blue curaçao and lemonade into a drink you’ll want to dive into.\n\n\nIt’s believed that the Blue Lagoon was created by Andy MacElhone, the son of famed bartender Harry MacElhone, at Harry’s New York Bar in Paris in the 1960s or early 1970s. So, the drink predates the 1980 movie of the same name.\n\nFeatured Video\nCurbside Cocktails: Rio, Milky Way\nVodka provides a sturdy base, while the blue curaçao—a Caribbean liqueur made using the dried peel of the Laraha citrus fruit and then colored blue—adds sweet, zesty notes. The lemonade lengthens the drink, lends additional tartness and keeps the beverage quaffable.\n\n\nThis recipe involves shaking and then straining the liquid, which is the preferred method when making the drink. However, some people choose to blend the ingredients with crushed ice to whir together a frozen cocktail. The shaken route is easier, faster and delicious, so don’t hesitate to keep things simple. But if you’re craving an icy journey, try the frozen version. Either method you choose, the Blue Lagoon is a formidable antidote when the sun’s high and the temperature’s warm.', 'Blue Lagoon_11.png', 8, 1, 1, 'Try our refreshing take on the classic blue lagoon with lemonade and fresh citrus juice. This boozy retro classic cocktail is perfect for parties'),
(12, 'Cosmopolitan', 0, 'The legendary Cosmopolitan is a simple cocktail with a big history. It reached its height of popularity in the 1990s, when the HBO show “Sex and the City” was at its peak. The pink-hued, Martini-style drink was a favorite of the characters on the show. It made its debut during the second season and became a series regular after that.\nThere’s some debate about who created the original Cosmopolitan. Many believe, like Regan, that it was first mixed by Cook. Others believe that Dale DeGroff concocted it at New York City’s Rainbow Room, or that Toby Cecchini first devised a Cosmo in 1988 during his tenure at New York’s Odeon. However, all agree that Cecchini popularized the vodka-and-cranberry ’Tini. His version of the drink called for 2 ounces of Absolut Citron vodka, an ounce of Cointreau, an ounce of Ocean Spray cranberry juice cocktail and an ounce of fresh lime juice, with a lemon twist.\nThe Cosmo was a product of its time. In the late-1980s and early-’90s, vodka was king, but flavored vodka was just finding an audience. When Absolut released its first flavored vodka, the lemony Citron, bartenders had a new toy to work with. Cecchini used it in the Cosmo alongside Ocean Spray, and the vodka-and-cranberry duo is still the preferred pair at most bars today. You, of course, can use whichever citrus-flavored vodka and cranberry juice you like. Just remember: Don’t drown your drink in cranberry. ', 'Cosmopolitan_12.png', 9, 1, 1, 'Lipsmackingly sweet and sour, the Cosmopolitan cocktail of vodka, cranberry and citrus is a good-time in a glass. Perfect for a party'),
(13, 'Pina Colada', 0, 'The Piña Colada has a bit of a bad rap among cocktail connoisseurs. For years, this now-classic drink was the poster child of the blender boom, a symbol of poolside bars and booze cruises. But the tropical cocktail—a mix of rum, coconut, pineapple and lime juices—dates to the 1950s and has been satisfying vacationers and Tiki aficionados since.\nAs the story goes, the Piña Colada debuted in 1952, when it was first mixed by Ramon Marrero Perez, the head barman at the Caribe Hilton in Old San Juan, Puerto Rico. Perez had blended up a winner, and the tropical drink enjoyed its place in the sun for decades, finding its way to American shores and faraway isles. However, the quality took a nose dive around the 1970s when barkeeps began making Piña Coladas with cheap, bottled mixers and serving them in comically large glasses.\nThe new-wave Piña Colada will make you forget about the bad examples served on Bourbon Street and at all-inclusive resorts. This Colada is sweet, but balanced, with crisp rum and tart fruit complementing the rich coconut. Whether you’re on vacation or just making drinks at home, don’t neglect the Piña Colada. Put one of these in everyone’s hand, and good times are imminent.', 'Pina Colada_13.png', 9, 1, 1, 'A tropical blend of rich coconut cream, dark rum and tangy pineapple – serve with an umbrella for kitsch appeal'),
(14, 'Manhattan', 0, 'The Manhattan was the most famous cocktail in the world shortly after it was invented in New York City’s Manhattan Club, some time around 1880 (as the story goes). Over the years, the whiskey classic has dipped in and out of fashion before finding its footing as one of the cornerstones of the craft cocktail renaissance.\nAmazingly, the drink that socialites tipped to their lips in the 19th century looks and tastes pretty much the same as the one served today at any decent cocktail bar. The Manhattan’s mix of American whiskey and Italian vermouth, enlivened with a few dashes of aromatic bitters, is timeless and tasty—the very definition of what a cocktail should be.\nDespite all of the Manhattan’s unassailable qualities, bartenders and enterprising drinkers have still found ways to tweak the recipe into myriad variations. If you split the vermouth between sweet and dry, you get the Perfect Manhattan. If you switch the ratios to make vermouth the star, you’ve stirred up a Reverse Manhattan. The Rob Roy is essentially a scotch Manhattan. And then you’ve got other named-for-New York cocktails like the Red Hook and Brooklyn, which employ their own twists to take the drink in new directions.\nBut regardless of all the options, there is only one classic Manhattan: two parts whiskey, one part sweet vermouth and bitters. Mix one (stirred, never shaken), and you’ll see why this storied drink has remained a favorite since its inception.', 'Manhattan_14.png', 9, 1, 1, 'Combine vermouth and whiskey to make the perfect Manhattan cocktail. Add lemon,  and cherry to complete the classic flavour combination'),
(15, 'Tom Collins', 0, 'The Tom Collins was immortalized in Harry Johnson’s 1882 book, “New and Improved Bartender’s Manual: Or How to Mix Drinks of the Present Style.” It remained popular over the decades and is still a prominent drink today, available at bars across the world. You don’t need to visit a bar to drink one, however. As the Tom Collins requires no special tools—not even a shaker or strainer—it’s a snap to make at home. Simply build the drink in a tall glass, add ice and an optional garnish, and you’re done. Take one refreshing sip, and you’ll quickly see why this cocktail lives up to its classic status.\nThere’s some debate as to the cocktail’s origin. According to drinks historian David Wondrich, the Tom Collins is strikingly similar to the gin punches being served in London bars during the 19th century. An enterprising barkeep named John Collins named the concoction after himself, whether or not he invented it. But given that the cocktail was typically made with Old Tom gin, drinkers eventually took to requesting Tom rather than John Collinses.', 'Tom Collins_15.png', 9, 1, 1, 'Master the art of the classic Tom Collins cocktail, plus three twists. Gin, lemon, simple syrup and soda water are the ingredients for your cocktail cupboard'),
(16, 'Sex On The Beach', 0, 'Like most classic drinks, they come with a lot of stories. The origin behind this one is varied, but the most popular one is attributed to Ted Pizio, who was a Florida bartender in the 1980’s. He came up with this concoction as a way to promote peach schnapps and named it after “sex” and “the beach” which he considered to be the two main attractions of Spring Break.   This drink appeals to the masses probably because the alcohol flavor is mild, masked to a large degree by the fruit juices. But they can sneak up on you! It’s not strong like a Long Island Iced Tea, but after a few, you might be feeling a little light headed. All jokes aside, this drink isn’t what you think, people! It’s really just a fun, fruity cocktail with an all-around great flavor. Definitely a popular drink at clubs, college parties, summer get togethers, and new drinkers.    ', 'Sex On The Beach_16.png', 12, 1, 1, 'Combine vodka with peach schnapps and cranberry juice to make a classic sex on the beach cocktail. Garnish with cocktail cherries and orange slices'),
(17, 'Virgin Mojito', 0, 'A refreshing mix of lime and mint, this Virgin Mojito Recipe will be your new favorite drink! This non-alcoholic mojito recipe will be a hit with kids and adults alike. There is so much flavor from the healthy ingredients in this mojito virgin mocktail and they’re super easy to make for a crowd.\nJust a few simple ingredients come together to make this mojito mocktail an incredibly refreshing drink. Perfect for adults and kids alike, this is guaranteed to be your new favorite drink.\nFresh lime juice makes this drink bright and flavorful, but you can totally cheat if you want to make pitchers for a crowd, or just don’t feel the desire to squeeze limes.\n', 'Virgin Mojito_17.png', 9, 0, 1, 'Try a refreshing, non-alcoholic mojito cocktail recipe.  With lime juice, mint and ice , it\'s fabulously refreshing'),
(18, 'Mojito', 0, 'The Mojito is one of the most popular rum cocktails served today, with a recipe known around the world. The origins of this classic drink can be traced to Cuba and the 16th-century cocktail El Draque. Named for Sir Francis Drake, the English sea captain and explorer who visited Havana in 1586, El Draque was composed of aguardiente (a cane-spirit precursor to rum), lime, mint and sugar. It was supposedly consumed for medicinal purposes, but it’s easy to believe that drinkers enjoyed its flavor and effects.\nAppropriately, almost all of the ingredients in the Mojito are indigenous to Cuba. Rum, lime, mint and sugar (the island nation grows sugar cane) are joined together and then lengthened with thirst-quenching club soda to create a delicious, lighthearted cocktail. The drink is traditionally made with unaged white rum, which yields a light, crisp flavor. Using Cuban rum will score you points for authenticity, although many modern Cuban rums are lighter in style than their predecessors, so you might try experimenting with white rums until you find one that you like best.\nThe Mojito is slightly more labor-intensive than other cocktails because it involves muddling the mint, but the end result is worth the effort. The mint combines with the other ingredients for an extra dose of refreshment that, while often associated with summer, can be enjoyed any time of the year.\nIf you prefer your cocktails with a dash of literary history, you’re in luck. The Mojito is said to have been a favorite of Ernest Hemingway who, according to local lore, partook of them regularly at the Havana bar La Bodeguita del Medio.\n', 'Mojito_18.png', 9, 1, 1, 'Mix this classic cocktail for a party using fresh mint, white rum, zesty lime and cooling soda water. Play with the quantities to suit your taste.'),
(19, 'Virgin Pina Colada', 0, 'The piña colada is a blended or iced cocktail that originated in Puerto Rico. It\'s usually made with white rum, cream of coconut, and pineapple juice. In this easy nonalcoholic recipe, just nix the rum and use coconut milk instead of the cream.\nThe traditional piña colada is garnished with either a pineapple wedge, a maraschino cherry, or both. Feel free to garnish with what you like, including a little paper umbrella.\n', 'Virgin Pina Colada_19.jpg', 9, 0, 1, 'For an alcohol-free party option, try our spiced piña colada mocktail (or virgin piña colada), with cherry, pineapple juice and coconut milk'),
(20, 'Virgin Cucumber Gimlet Mocktail', 0, 'The gimlet is a classic cocktail that has been around for decades. In fact, it is almost centuries old! A drink that has this long lasting power has to be good. That is why we decided to take this timeless drink and give it a new twist. A non-alcoholic twist!\nA traditional gimlet is made with any favorite gin and lime juice – that’s it! In fact, gimlet aficionados say that nothing else can be added to the drink or it is not a “real” gimlet.\nA stemmed cocktail glass is a traditional glass to use for a gimlet. Any kind of martini glass will do! You can also serve our delicious cucumber gimlet in a simple highball glass. The drink is so good that any pretty glass will do. Even a simple juice glass will work.\n', 'Virgin Cucumber Gimlet Mocktail_20.jpg', 9, 0, 1, 'Make a classic gimlet, combining simple syrup and lime juice, stirred to the perfect dilution with lots of ice. A refreshing cocktail to enjoy with friends'),
(21, 'Virgin Margarita', 0, 'We love a good, fruity drink in the summer. We also love classic drinks that everyone knows and loves. Margaritas definitely fit both of these descriptions. Everyone loves a good margarita and they are the perfect, refreshing drink to sip in the hot summer heat. Actually, margaritas are delicious anytime of year! Especially when you are drinking a virgin margarita.\nA virgin margarita is a delicious, vibrant drink that has an incredible lemon lime flavor. Our virgin margarita is also a little fizzy to give the drink even more life.\nAlmost all of the ingredients you need to make a perfect virgin margarita are right in your local grocery store’s fruit aisle. Isn’t making fresh, exciting drinks the absolute best! Once you have all of the ingredients you need to make a virgin margarita, you are ready to mix! It isn’t difficult to make a fantastic virgin margarita and you can be ready to drink this refreshing beverage in about 5 minutes. Here is what you need to do:\n', 'Virgin Margarita_21.jpg', 8, 0, 1, 'This virgin margarita recipe tastes as good as the real thing! This non-alcoholic mocktail is irresistibly tasty with a secret ingredient.'),
(22, 'Amazonia Mocktail', 3.55, 'Fancy bubbles dance in the glass while the flavors of apple, mint and lime brighten each sip! Sometimes you just need a fancy drink. Luckily, this fancy drink is also quite easy to make. The whole mix comes together in about 5 minutes but gives you a mocktail that is lavish enough for a wedding, birthday or any cocktail party you may host.\nThe main ingredients are mint, apple juice, lime juice and sparkling grape juice. Those are the ingredients you will taste the most when you take your first sip. Now, mint and lime are paired together quite often. The bright flavors of the two ingredients are known to pair well. But add a little apple juice to the mix and you’re in a whole new ball game. The apple juice adds a sweetness to the drink that makes it easy to enjoy. It also takes the summery flavors of mint and lime into the fall and winter months when apples are in season. This makes the drink perfect for year round enjoyment.\nServe the mocktail in a delicate champagne glass and you have yourself the perfect, fancy drink!\n', 'Amazonia Mocktail_22.jpg', 7, 0, 1, 'Fancy bubbles dance in the glass while the flavors of apple, mint and lime brighten each sip!');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

DROP TABLE IF EXISTS `contains`;
CREATE TABLE IF NOT EXISTS `contains` (
  `IdCocktail` int(11) NOT NULL,
  `IdIngredient` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`IdCocktail`,`IdIngredient`),
  KEY `FK_ingredient_contains_idx` (`IdIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`IdCocktail`, `IdIngredient`, `Quantity`) VALUES
(1, 7, 0),
(1, 18, 60),
(1, 31, 120),
(1, 33, 10),
(2, 4, 0),
(2, 7, 0),
(2, 29, 30),
(2, 37, 120),
(2, 38, 15),
(2, 41, 0),
(3, 10, 15),
(3, 18, 60),
(3, 41, 0),
(3, 47, 100),
(4, 14, 0),
(4, 17, 70),
(4, 22, 0),
(4, 43, 70),
(5, 7, 0),
(5, 10, 15),
(5, 17, 15),
(5, 29, 100),
(5, 31, 15),
(5, 40, 60),
(6, 1, 160),
(6, 2, 15),
(6, 3, 25),
(6, 4, 0),
(6, 5, 15),
(6, 6, 20),
(6, 7, 0),
(6, 41, 0),
(7, 2, 30),
(7, 7, 0),
(7, 8, 15),
(7, 9, 30),
(7, 10, 20),
(7, 11, 315),
(7, 12, 0),
(8, 2, 30),
(8, 7, 0),
(8, 13, 90),
(8, 41, 0),
(9, 2, 30),
(9, 3, 15),
(9, 7, 0),
(9, 11, 30),
(9, 14, 0),
(9, 15, 30),
(9, 16, 0),
(10, 1, 25),
(10, 7, 0),
(10, 10, 25),
(10, 13, 100),
(10, 17, 25),
(10, 18, 25),
(10, 19, 25),
(10, 20, 25),
(10, 21, 25),
(10, 22, 0),
(11, 10, 120),
(11, 12, 0),
(11, 17, 30),
(11, 22, 0),
(11, 23, 30),
(12, 3, 25),
(12, 17, 165),
(12, 22, 0),
(12, 24, 25),
(12, 32, 15),
(13, 1, 60),
(13, 3, 15),
(13, 11, 165),
(13, 16, 0),
(13, 26, 165),
(14, 12, 0),
(14, 22, 0),
(14, 27, 60),
(14, 28, 30),
(15, 10, 30),
(15, 12, 0),
(15, 19, 60),
(15, 21, 15),
(15, 22, 0),
(15, 29, 100),
(16, 7, 0),
(16, 12, 0),
(16, 17, 165),
(16, 30, 15),
(16, 31, 165),
(16, 32, 165),
(16, 33, 15),
(16, 34, 0),
(17, 3, 15),
(17, 4, 0),
(17, 7, 0),
(17, 29, 150),
(17, 35, 15),
(18, 1, 60),
(18, 3, 30),
(18, 4, 0),
(18, 7, 0),
(18, 21, 15),
(18, 29, 100),
(18, 41, 0),
(19, 11, 165),
(19, 12, 0),
(19, 14, 0),
(19, 16, 0),
(19, 36, 25),
(20, 3, 15),
(20, 14, 0),
(20, 21, 45),
(20, 29, 90),
(20, 42, 0),
(21, 3, 15),
(21, 7, 0),
(21, 10, 40),
(21, 14, 0),
(21, 21, 15),
(21, 31, 15),
(21, 43, 180),
(22, 3, 15),
(22, 4, 0),
(22, 7, 0),
(22, 21, 15),
(22, 44, 100),
(22, 45, 100),
(22, 46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `IdUser` int(11) NOT NULL,
  `IdCocktail` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`,`IdCocktail`),
  KEY `FK_cocktail_grade_idx` (`IdCocktail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`IdUser`, `IdCocktail`, `Grade`) VALUES
(2, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `IdIngredient` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdIngredient`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`IdIngredient`, `Name`, `Type`) VALUES
(1, 'White rum', 'ALCOHOL'),
(2, 'Dark rum', 'ALCOHOL'),
(3, 'Lime juice', 'JUICE'),
(4, 'Mint', 'OTHER'),
(5, 'Orgeat syrup', 'SYRUP'),
(6, 'Orange liqueur', 'ALCOHOL'),
(7, 'Ice', 'OTHER'),
(8, 'Coffee flavored liqueur', 'ALCOHOL'),
(9, 'Coconut liqueur', 'ALCOHOL'),
(10, 'Lemon juice', 'JUICE'),
(11, 'Pineapple juice', 'JUICE'),
(12, 'Cherry', 'FRUIT'),
(13, 'Coca cola', 'JUICE'),
(14, 'Sugar', 'OTHER'),
(15, 'Aperol', 'ALCOHOL'),
(16, 'Pineapple', 'FRUIT'),
(17, 'Vodka', 'ALCOHOL'),
(18, 'Tequila', 'ALCOHOL'),
(19, 'Gin', 'ALCOHOL'),
(20, 'Tripple sec liqueur ', 'ALCOHOL'),
(21, 'Simple syrup', 'SYRUP'),
(22, 'Lemon', 'FRUIT'),
(23, 'Blue curacao', 'ALCOHOL'),
(24, 'Cointreau', 'ALCOHOL'),
(25, 'Cranberry', 'FRUIT'),
(26, 'Coconut cream', 'OTHER'),
(27, 'Rye Whiskey', 'ALCOHOL'),
(28, 'Vermouth', 'ALCOHOL'),
(29, 'Soda', 'JUICE'),
(30, 'Peach schnapps', 'ALCOHOL'),
(31, 'Orange juice', 'JUICE'),
(32, 'Cranberry juice', 'JUICE'),
(33, 'Grenadine syrup', 'SYRUP'),
(34, 'Orange', 'FRUIT'),
(35, 'Honey syrup', 'SYRUP'),
(36, 'Coconut milk', 'JUICE'),
(37, 'Prosecco', 'ALCOHOL'),
(38, 'Elderflower syrup', 'SYRUP'),
(39, 'Grapefruit juice', 'JUICE'),
(40, 'White wine ', 'ALCOHOL'),
(41, 'Lime', 'FRUIT'),
(42, 'Cucumber', 'OTHER'),
(43, 'Lemon soda', 'JUICE'),
(44, 'Apple juice', 'JUICE'),
(45, 'Grape juice', 'JUICE'),
(46, 'Apple ', 'FRUIT'),
(47, 'Grapefruit soda', 'JUICE');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
CREATE TABLE IF NOT EXISTS `preferences` (
  `IdUser` int(11) NOT NULL,
  `IdIngredient` int(11) NOT NULL,
  `Value` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`,`IdIngredient`),
  KEY `FK_ingredient_preferences_idx` (`IdIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`IdUser`, `IdIngredient`, `Value`) VALUES
(2, 1, 2),
(2, 2, 2),
(2, 6, 6),
(2, 8, 7),
(2, 9, 7),
(2, 15, 9),
(2, 17, 2),
(2, 18, 2),
(2, 19, 2),
(2, 20, 4),
(2, 23, 7),
(2, 24, 6),
(2, 27, 8),
(2, 28, 8),
(2, 30, 4),
(2, 37, 9),
(2, 40, 10),
(3, 1, 6),
(3, 2, 6),
(3, 6, 2),
(3, 8, 3),
(3, 9, 3),
(3, 15, 4),
(3, 17, 8),
(3, 18, 10),
(3, 19, 10),
(3, 20, 4),
(3, 23, 3),
(3, 24, 6),
(3, 27, 9),
(3, 28, 6),
(3, 30, 4),
(3, 37, 8),
(3, 40, 7);

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

DROP TABLE IF EXISTS `registered`;
CREATE TABLE IF NOT EXISTS `registered` (
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`IdUser`) VALUES
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

DROP TABLE IF EXISTS `saved`;
CREATE TABLE IF NOT EXISTS `saved` (
  `IdUser` int(11) NOT NULL,
  `IdCocktail` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`,`IdCocktail`),
  KEY `FK_cocktail_saved_idx` (`IdCocktail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`IdUser`, `IdCocktail`) VALUES
(3, 2),
(2, 7),
(2, 9),
(3, 12),
(3, 16),
(2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

DROP TABLE IF EXISTS `steps`;
CREATE TABLE IF NOT EXISTS `steps` (
  `IdCocktail` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `Step` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdCocktail`,`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`IdCocktail`, `Id`, `Step`) VALUES
(1, 1, 'Add the tequila and then the orange juice to a chilled highball glass filled with ice.'),
(1, 2, 'Top with the grenadine, which will sink to the bottom of the glass, creating a layered effect.'),
(1, 3, 'Garnish with an orange slice and a cherry.'),
(2, 1, 'To a large wine glass add ice, lime slices and mint. Muddle a little bit to release the aroma from the mint.'),
(2, 2, 'Add elderflower liquor, Prosecco and top with sparkling water.'),
(2, 3, 'Gently stir and serve.'),
(3, 1, 'Rub a lime wedge around the edge of a highball glass, and dip the rim in salt (optional).'),
(3, 2, 'Add the tequila and lime juice to the glass, and fill with ice.'),
(3, 3, 'Top with grapefruit soda, and stir briefly and gently to combine.'),
(3, 4, 'Garnish with a lime wheel.'),
(4, 1, 'Wash the lemons then dry them with kitchen paper. Do not rub them too much so as not to disperse oils and perfume.'),
(4, 2, 'Peel the lemons with a ceramic potato peeler. The ceramic blade will never brown your lemons or alter taste or their scent. Take care to remove ONLY the zest (yellow part), leaving the white spongy one on the lemon, as it could give a bitter taste to the liqueur.'),
(4, 3, 'Place the lemon zest in a large airtight glass jar then pour the alcohol (or the Everclear or the Vodka). Let them infuse for 2 weeks in a cool place out of direct sunlight. Better cover the jar with a cloth to be sure that it remains in the dark.'),
(4, 4, 'After the required infusion time, you need to make the syrup. So put the water and sugar in a saucepan and, over low heat, bring to a boil. Stir constantly until the sugar is completely dissolved. '),
(4, 5, 'Now filter the liquid with a sieve and remove the lemon zest.\r\n\r\n'),
(5, 1, 'Add white wine, vodka, orange juice, and lemon juice to an ice-filled wine glass.'),
(5, 2, 'Top with soda water.'),
(6, 1, 'Add the white rum, curaçao, lime juice and orgeat into a shaker with crushed ice and shake lightly (about 3 seconds).'),
(6, 2, 'Pour into a double rocks glass.'),
(6, 3, 'Float the dark rum over the top.'),
(6, 4, 'Garnish with a lime wheel and mint sprig.'),
(7, 1, 'In a mixing glass combine coffee liqueur, dark rum, coconut liqueur, 151 rum, lemon juice and pineapple juice. Pour over ice into a tall glass and garnish with a cherry.'),
(8, 1, 'Fill a highball glass with ice, then add rum and Coca-Cola.'),
(8, 2, 'Garnish with a lime wedge. Squeeze the lime into your drink, if desired.'),
(9, 1, 'Combine sugar and 1/4 cup water in a jar, cover, and shake until sugar is dissolved.'),
(9, 2, 'Combine Aperol, rum, pineapple juice, lime juice, and 1/4 oz. syrup in a cocktail shaker filled with ice. Cover and shake vigorously 30 seconds. Strain into a glass filled to the brim with crushed ice and garnish with a pineapple leaf, if desired.'),
(10, 1, 'Add the vodka, rum, tequila, gin, triple sec, simple syrup and lemon juice to a Collins glass filled with ice.'),
(10, 2, 'Top with a splash of the cola and stir briefly.'),
(10, 3, 'Garnish with a lemon wedge.'),
(10, 4, 'Serve with a straw.'),
(11, 1, 'Add the vodka, blue curaçao and lemonade to a shaker with ice and shake until well-chilled.'),
(11, 2, 'Strain into a hurricane glass over crushed ice.'),
(11, 3, 'Garnish with a lemon wheel and maraschino cherry.'),
(12, 1, 'Add the vodka, Cointreau, lime juice, and cranberry juice cocktail into a shaker with ice and shake until well-chilled.'),
(12, 2, 'Strain into a chilled cocktail glass.'),
(12, 3, 'Garnish with a lime wedge.'),
(13, 1, 'Add the rum, cream of coconut and pineapple and lime juices to a shaker with ice and shake vigorously for 20 to 30 seconds.'),
(13, 2, 'Strain into a chilled Hurricane glass over pebble ice.'),
(13, 3, 'Garnish with a pineapple wedge and pineapple leaf.'),
(14, 1, 'Add the bourbon (or rye), sweet vermouth and both bitters to a mixing glass with ice, and stir until well-chilled.'),
(14, 2, 'Strain into a chilled coupe.'),
(14, 3, 'Garnish with a brandied cherry or a lemon twist.'),
(15, 1, 'Add the gin, lemon juice and simple syrup to a Collins glass.'),
(15, 2, 'Fill with ice, top with club soda and stir.'),
(15, 3, 'Garnish with a lemon wheel and maraschino cherry (optional).'),
(16, 1, 'Fill a Hurricane Glass with ice.'),
(16, 2, 'Pour vodka and schnapps over top of the ice.'),
(16, 3, 'Add cranberry juice, followed by orange juice.'),
(16, 4, 'We also like to add in a splash of grenadine.'),
(16, 5, 'For Garnish: Fresh fruit is always a win! We like to thread a maraschino cherry and small orange triangle wedge (about the same size as the cherry) onto a toothpick.'),
(16, 6, 'Serve with a straw and enjoy!'),
(17, 1, 'Place mint leaves and lime juice in a glass and muddle them together. Muddling = mushing them up and crushing the leaves to release the flavor and oils the mint. Use a muddler or the handle of a wooden spoon. Or a set of brass knuckles. To each their own.'),
(17, 2, 'Add the honey simple syrup.'),
(17, 3, 'Garnish with lime slices, a sprig of mint, and/or fresh fruit.'),
(18, 1, 'Lightly muddle the mint with the simple syrup in a shaker.'),
(18, 2, 'Add the rum, lime juice and ice, and give it a brief shake.'),
(18, 3, 'Strain into a highball glass over fresh ice.'),
(18, 4, 'Top with the club soda.'),
(18, 5, 'Garnish with a mint sprig and lime wheel.'),
(19, 1, 'Gather the ingredients.'),
(19, 2, 'Place frozen pineapple chunks and ice in a blender.'),
(19, 3, 'Pour pineapple juice and coconut milk over top. Add brown sugar, if using. Puree until smooth. Taste to test the sweetness and add more sugar, if needed.'),
(19, 4, 'Pour into glasses and garnish with fresh pineapple wedges or a maraschino cherry.'),
(19, 5, 'Garnish with a mint sprig and lime wheel.'),
(20, 1, 'Start by adding the cucumber slices and sugar into a cocktail shaker. Muddle the two ingredients together to smash the cucumber. This will help get out a lot of the juice inside the veggie.'),
(20, 2, 'Add the lime juice and simple syrup to the shaker, cover and shake vigorously. Mix those ingredient up and get them nice and frothy!'),
(20, 3, 'Pour the powerful drink over ice.'),
(20, 4, 'Top with some fizzy club soda and you are ready to enjoy!'),
(21, 1, 'Rim your glasses in salt or sugar if you choose this option.'),
(21, 2, 'Add the lime juice, lemon juice, orange juice and simple syrup to a cocktail shaker with ice, cover and shake for about ten seconds.'),
(21, 3, 'Strain the mix into your prepared glasses then top the fruit blend with lemon club soda.'),
(22, 1, 'Place the mint leaves and simple syrup in the bottom of a cocktail shaker and muddle the mint to release the juices and break the leaves apart slightly.'),
(22, 2, 'Add the ice, apple juice, and lime juice to the cocktail shaker, cover and shake vigorously for about 30 seconds.'),
(22, 3, 'Strain the mix into a champagne glass and top with the sparkling grape juice.'),
(22, 4, 'Garnish with an apple slice and serve while cold.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Surname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdUser`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `Name`, `Surname`, `Mail`, `Password`, `Username`, `DateOfBirth`, `Gender`) VALUES
(1, 'Mark', 'Smith', 'mark@gmail.com', 'admin123', 'admin', '1999-05-10', 'M'),
(2, 'Tom', 'Jones', 'tom99@gmail.com', 'tom123', 'tom99', '1999-05-10', 'M'),
(3, 'Monika', 'Taylor', 'monika@hotmail.com', 'monikaaa123', 'monika123', '2000-05-03', 'F');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_user_admin` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `FK_cocktail_contains` FOREIGN KEY (`IdCocktail`) REFERENCES `cocktail` (`IdCocktail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ingredient_contains` FOREIGN KEY (`IdIngredient`) REFERENCES `ingredient` (`IdIngredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `FK_cocktail_grade` FOREIGN KEY (`IdCocktail`) REFERENCES `cocktail` (`IdCocktail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_registered_grade` FOREIGN KEY (`IdUser`) REFERENCES `registered` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `FK_ingredient_preferences` FOREIGN KEY (`IdIngredient`) REFERENCES `ingredient` (`IdIngredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_registered_preferences` FOREIGN KEY (`IdUser`) REFERENCES `registered` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registered`
--
ALTER TABLE `registered`
  ADD CONSTRAINT `FK_user_registered` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saved`
--
ALTER TABLE `saved`
  ADD CONSTRAINT `FK_cocktail_saved` FOREIGN KEY (`IdCocktail`) REFERENCES `cocktail` (`IdCocktail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_registered_saved` FOREIGN KEY (`IdUser`) REFERENCES `registered` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `fk_Steps_Cocktail` FOREIGN KEY (`IdCocktail`) REFERENCES `cocktail` (`IdCocktail`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
