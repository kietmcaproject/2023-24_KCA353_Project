-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2024 at 04:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antipesto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` bigint(25) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `address`, `number`, `email`) VALUES
(1, 'NAVNEET CHAUDHARY', 'Navneet@1104', 'Saharanpur', 9759000083, 'chaudharynavneet1234@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `clientlogin`
--

CREATE TABLE `clientlogin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(22) NOT NULL,
  `number` bigint(255) NOT NULL,
  `ranpass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientlogin`
--

INSERT INTO `clientlogin` (`id`, `name`, `email`, `password`, `address`, `age`, `number`, `ranpass`) VALUES
(1, 'NAVNEET CHAUDHARY', 'chaudharynavneet1234@gmail.com', 'Navneet@1104', 'greater noida', 22, 9759000083, NULL),
(2, 'Madhav sharma', 'madhav@gmail.com', 'Madhav@11', 'muradnagar', 22, 9759000083, NULL),
(3, 'Madhav Sharma', 'madhav0192@gmail.com', 'Madhav@11', 'muradnagar', 20, 8279523223, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foundpest`
--

CREATE TABLE `foundpest` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `crop` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foundpest`
--

INSERT INTO `foundpest` (`id`, `email`, `name`, `image`, `crop`, `location`, `message`) VALUES
(15, 'chaudharynavneet1234@gmail.com', 'NAVNEET CHAUDHARY', '002_clip_image003-2.png', 'wheat', 'sbdhc', 'hahjajhahjba'),
(17, 'chaudharynavneet1234@gmail.com', 'NAVNEET CHAUDHARY', 'Screenshot at Apr 01 16-40-22.png', 'canola', 'ghh', ' bob'),
(18, 'chaudharynavneet1234@gmail.com', 'NAVNEET CHAUDHARY', 'WhatsApp Image 2023-12-01 at 10.52.59 AM.jpeg', 'barley', 'bdbca', 'xchcbjbs');

-- --------------------------------------------------------

--
-- Table structure for table `pests`
--

CREATE TABLE `pests` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symptoms` longtext NOT NULL,
  `Bionomics` longtext NOT NULL,
  `solution` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('wheat','barley','canola','lupins','oats','cotton','sugarcane','rice') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pests`
--

INSERT INTO `pests` (`id`, `name`, `symptoms`, `Bionomics`, `solution`, `image`, `type`) VALUES
(33, 'Armyworm: Mythimna separata (Noctuidae: Lepidoptera)\r\n/ आर्मी वर्म (मिथिम्ना सेपरेटा)', ' पंखों का फैलाव 35-50 मिमी है। नर के पेट के नीचे के बेसल खंड पर युग्मित गुच्छों का अभाव होता है। [2] अगले पंख गहरे भूरे या लाल-पीले रंग के साथ भूरे पीले रंग के हैं। गोल और रेनीफ़ॉर्म धब्बे अस्पष्ट किनारों के साथ हल्के या पीले रंग के होते हैं, जबकि रेनिफ़ॉर्म स्पॉट निचले किनारे पर सफेद बिंदु के साथ होते हैं। बाहरी पंख का किनारा ऊपर से पीछे की ओर तिरछा काला पड़ गया है, गहरे स्ट्रोक के साथ और गहरे बिंदुओं की एक पंक्ति के साथ। हिंडविंग भूरे रंग के होते हैं, जिनका बाहरी किनारा गहरा होता है। ऐन्टेना धागे जैसा. अंडे गोलाकार और दूधिया सफेद होते हैं जिनकी सतह पतली जालीदार होती है। लार्वा में आमतौर पर छह इंस्टार होते हैं , शायद ही कभी सात। अपने अंतिम चरण में इसकी लंबाई 40 मिमी तक पहुंच गई। लार्वा में दो चौड़ी काली-भूरी और एक मध्यवर्ती हल्की पृष्ठीय धारियां होती हैं, स्पाइरैकल लाइन के साथ काली-भूरी पार्श्व धारियां होती हैं। काले रिम के साथ भूरे रंग के स्पाइराकल्स। प्यूपा पीले भूरे और चमकदार होते हैं। ...........................................................\r\n\r\n(The freshly emerged larvae spin threads from which they suspend themselves in the air and then with the help of air currents reach from one plant to another. In the early stages, they feed on tender leaves in the central whorl and later feed on older leaves  and skeletonize them totally. The grown-up caterpillars throw out faecal pellets, which are quite prominent. In the case of a severe attack, whole leaves, including the mid-rib, are consumed and the field looks as if grazed by cattle. The larvae feed voraciously and migrate from one field to another. The pest may also eat away ears, including the awns and immature grains.)', 'Pale brown adults live for 1·9 days and lay eggs singly in rows or in clusters on dry or fresh plants or on the soil. Freshly laid eggs are round, light green, turn pale yellow and finally black. Egg period 4-11 days in summer 19 days in winter. Freshly emerged larvae are very active, dull white and later turn green. In spring, the larval stage is completed in 13-14 days, but in the winter it is prolonged to 88-100 days.             In the pre-pupal stage, the insect spins a cocoon. The pre-pupal stage lasts 1-11 days during January to May. Pupation usually takes place in the soil at a depth of 0.5-5 cm, but it may also occur under dry leaves among the stubble or fresh tillers. Generally, the larvae before pupation seem to select sites near the water-channels. The pupal period is 9-13 days in May and 36-48 days in winter.', 'लार्वा को हाथ से चुना जा सकता है और वयस्कों को फेरोमोन का उपयोग करके आकर्षित किया जा सकता है । खेतों में जल स्तर का नियमन और वैकल्पिक मेज़बानों को खेत से हटाना भी प्रभावी है। जैविक नियंत्रणों में बत्तखें अच्छी हैं; वे मिट्टी में या पौधों के आधार पर छिपे लार्वा को आसानी से ढूंढ सकते हैं और उनका शिकार कर सकते हैं। कोटेसिया रूफिक्रस और यूप्टेरोमालस पार्नारे के परिचय ने भी लार्वा को परजीवी बना दिया। चुनिंदा कीटनाशकों और खरपतवारनाशी का भी उपयोग खेत में किया जा सकता है। सरकारों द्वारा अपनाई गई एकीकृत कीट प्रबंधन विधियाँ। ...................................................... (The pest can be suppressed by collecting and destroying the caterpillars. (ii)Spray 500 ml of dichlorvos 85 SL or 3 kg of carbaryl 50 WP or 1.0 L of quinalphos 25 EC in 500 L of water per ha.)', 'Screenshot 2023-11-12 at 1.01.20 PM.png', 'wheat'),
(34, 'Aphids / एफ़िड्स (माहू)', 'एफिड्स दुनिया भर में वितरित होते हैं , लेकिन समशीतोष्ण क्षेत्रों में सबसे आम हैं । कई टैक्सा के विपरीत , समशीतोष्ण क्षेत्रों की तुलना में उष्णकटिबंधीय क्षेत्रों में एफिड प्रजातियों की विविधता बहुत कम है । [2] वे मुख्य रूप से हवाओं द्वारा निष्क्रिय फैलाव के माध्यम से लंबी दूरी तक प्रवास कर सकते हैं। विंग्ड एफिड्स भी दिन में 600 मीटर तक ऊपर उठ सकते हैं जहां वे तेज हवाओं द्वारा ले जाए जाते हैं। [3] [4] उदाहरण के लिए, माना जाता है कि करंट-लेट्यूस एफिड, नैसोनोविया रिबिस्निग्री , पूर्वी हवाओं के माध्यम से 2004 के आसपास न्यूजीलैंड से तस्मानिया तक फैल गया था । [5] एफिड्स संक्रमित पौधों की सामग्री के मानव परिवहन द्वारा भी फैल गए हैं, जिससे कुछ प्रजातियां अपने वितरण में लगभग विश्वव्यापी बन गई हैं। ................................................................(The aphids feed on phloem sap, which weakens the plant and causes a metabolic imbalance, twisting of the leaves and, in extreme cases, causing leaf loss. Leaf loss affects the quantity and quality of the final harvest. Aphids also introduce toxins into the plant, systemically altering its development.  Furthermore, the honeydew secreted by the aphids is an ideal culture medium for a range of various fungi, which form a barrier on the leaf, stopping it from taking in all the light that hits it.  However, the most harmful effect of aphids is the transmission of viruses. Aphids can transmit dozens of viruses from a diseased plant to healthy one iin just a few seconds, especially the winged generations. The biggest problem with viruses is that there is no remedy for them, so the infection of a plant that is not tolerant or resistant to the virus leads inevitably to a decline in the final production.)', 'Natural enemies can be very important for controlling aphids especially in gardens not sprayed with broad-spectrum pesticides (e.g. organophosphates, carbamates, and pyrethroids) that kill natural enemy species as well as pests. Usually natural enemy populations do not appear in significant numbers until aphids begin to be numerous.  Among the most important natural enemies are various species of parasitic wasps that lay their eggs inside aphids. The skin of the parasitized aphid turns crusty and golden brown, a form called a mummy. The generation time of most parasites is quite short when the weather is warm, so once you begin to see mummies on your plants, the aphid population is likely to be reduced substantially within a week or two.  Many predators also feed on aphids. The most well known are lady beetle adults and larvae, lacewing larvae, soldier beetles, and syrphid fly larvae. Naturally occurring predators work best, especially in garden and landscape situations. For photos and more information about aphid natural enemies, see the Natural Enemies Gallery.', 'एफिड्स पर कीटनाशक नियंत्रण मुश्किल है, क्योंकि वे तेजी से प्रजनन करते हैं, इसलिए छोटे क्षेत्र छूट जाने से भी आबादी तुरंत ठीक हो सकती है। एफिड्स पत्तियों के निचले हिस्से पर कब्जा कर सकते हैं जहां स्प्रे उन पर नहीं पड़ता है, जबकि प्रणालीगत कीटनाशक फूलों की पंखुड़ियों में संतोषजनक ढंग से नहीं जाते हैं। अंत में, कुछ एफिड प्रजातियां कार्बामेट्स , ऑर्गनोफॉस्फेट और पाइरेथ्रोइड्स सहित सामान्य कीटनाशक वर्गों के प्रति प्रतिरोधी हैं । [126]\r\n.\r\nपिछवाड़े में छोटे संक्रमणों के लिए, हर कुछ दिनों में पौधों पर तेज़ पानी की धारा से अच्छी तरह से छिड़काव करना पर्याप्त सुरक्षा हो सकता है। एफिड्स को नियंत्रित करने के लिए कीटनाशक साबुन का घोल एक प्रभावी घरेलू उपाय हो सकता है, लेकिन यह केवल संपर्क में आने पर एफिड्स को मारता है और इसका कोई अवशिष्ट प्रभाव नहीं होता है। साबुन का स्प्रे पौधों को नुकसान पहुंचा सकता है, विशेष रूप से उच्च सांद्रता पर या 32 डिग्री सेल्सियस (90 डिग्री फारेनहाइट) से ऊपर के तापमान पर; कुछ पौधों की प्रजातियाँ साबुन स्प्रे के प्रति संवेदनशील होती हैं। .........................................(There are several cultivation techniques that we can use to prevent or minimize an infestation of aphids. These include:  Eliminating weeds that can serve as a reservoir of eggs and adults Using insect nets (sometimes insecticide-impregnated) to cover crops Avoiding the excessive use of nitrogenous fertilizer Removing crop residues Establishing plant species that can serve as a reservoir for predators (banker plants))', 'articles-pests-diseases-aphids_text_4.jpg', 'barley'),
(35, 'Flea Beetle / पिस्सू बीटल', 'क्रूसिफ़र पिस्सू बीटल को 1920 के दशक में उत्तरी अमेरिका में लाया गया था और अब यह दक्षिणी कनाडा और अमेरिका के उत्तरी ग्रेट प्लेन्स में वितरित किया जाता है, जिसमें नॉर्थ डकोटा, साउथ डकोटा, मोंटाना, उत्तर-पश्चिमी मिनेसोटा, मैनिटोबा, सस्केचेवान, अल्बर्टा, ब्रिटिश कोलंबिया, ओंटारियो शामिल हैं। , क्यूबेक और न्यू ब्रंसविक।  क्रूसिफर पिस्सू बीटल कैनोला पर हमला करने वाला सबसे आम और विनाशकारी पिस्सू बीटल है। उत्तरी अमेरिका में, धारीदार पिस्सू भृंग सबसे पहले 1668 से पहले के तलछट के नमूने में क्यूबेक, कनाडा में रिपोर्ट किया गया था और अब यह पूरे कनाडा और अमेरिका में व्यापक है।............................................................................Flea beetles attacking canola, mustard, and rapeseed are small, elliptical or oval shaped beetles less than 2.5 mm long. When disturbed, they use their powerful hind legs to jump away, hence the name flea beetle. The crucifer and striped flea beetle are the dominant species feeding on these plants.', 'जब पौधों पर बड़ी संख्या में पिस्सू भृंग मौजूद होते हैं और चोट लगने का खतरा होता है तो कीटनाशक आमतौर पर समस्या के प्रबंधन के लिए सबसे प्रभावी साधन होते हैं (तालिका 2)। कुछ पिस्सू बीटल उत्पाद पिस्सू बीटल को खाने से रोकने का काम करते हैं (उदाहरण के लिए डायटोमेसियस अर्थ, काओलिन क्ले) लेकिन अधिकांश पिस्सू बीटल को मार सकते हैं। हालाँकि, उन कीटनाशकों में काफी सीमा होती है कि वे पौधों को पिस्सू बीटल से बचाने के लिए कितने समय तक काम कर सकते हैं - कुछ घंटों (पाइरेथ्रिन) से लेकर कई दिनों तक (साइपरमेथ्रिन, साइहलोथ्रिन)। चूँकि पिस्सू बीटल के साथ सबसे गंभीर समस्याओं में वे प्रजातियाँ शामिल हैं जो अत्यधिक गतिशील हैं और आसानी से पौधों पर आक्रमण करती हैं (गोभी पिस्सू बीटल, सेब पिस्सू बीटल), लंबे समय तक बने रहने वाले कीटनाशक आमतौर पर सबसे अच्छा काम करेंगे। अक्सर अंकुर वाली फसलों की सुरक्षा के लिए एक से अधिक आवेदन की आवश्यकता हो सकती है क्योंकि आवेदन के बाद उत्पन्न होने वाली पत्तियों की वृद्धि कम संरक्षित होगी।....................................................................................Predators, parasites and diseases can be important in regulating insect populations. To date the effect of biological control agents seems to be limited but several insects have been observed attacking adult flea beetles.  Lacewing larvae (Chrysopa carnea), big-eyed bugs (Geocoris bullatus), the two-lined collops (Collops vittatus), the western damsel bug (Nabis alternatus) and the northern field cricket (Gryllus pennsylvanicus) are a few of the insects known to prey on flea beetles.  The native braconid wasp (Microctonus vittatae) parasitizes flea beetle adults. However, its overall effect on flea beetle populations is unknown.  Unfortunately, flea beetle populations emerge in large numbers during a relatively short period of time and tend to overwhelm the parasites and predators.', 'फ्लीया बीटल (बड इनीशिएशन): बायर कॉन्फिडोर (100 मिली), आयएफसी सुपर स्टिकर (40 मिली).................................................................................................Remove garden trash and plow or rototill under weeds to reduce overwintering sites. Floating row covers are extremely effective when placed on seedlings and left in place until plants are old enough to tolerate beetle damage. Place yellow sticky traps throughout garden rows every 15 to 30 feet to capture adults. Beneficial nematodes applied to the soil will destroy the larval stage, reducing root feeding and helping to prevent the next generation of adults from emerging. Apply organic Diatomaceous Earth for long-lasting protection. Made up of tiny fossilized aquatic organisms, that look like broken glass under the microscope, DE kills by scoring an insect’s outer layer as it crawls over the fine powder. Contains NO toxic poisons! Surround WP (kaolin clay) forms a protective barrier film, which acts as a broad spectrum crop protectant for preventing damage from insect pests. BotaniGard ES is a highly effective biological insecticide containing Beauveria bassiana, an entomopathogenic fungus that attacks a long-list of troublesome crop pests – even resistant strains! Weekly applications can prevent insect population explosions and provide protection equal to or better than conventional chemical pesticides. 70% Neem Oil is approved for organic use and can be sprayed on vegetables, fruit trees and flowers to kill eggs, larvae and adult insects. Mix 1 oz/ gallon of water and spray all leaf surfaces (including the undersides of leaves) until completely wet. Least-toxic botanical insecticides should be used as a last resort. Derived from plants which have insecticidal properties, these natural pesticides have fewer harmful side effects than synthetic chemicals and break down more quickly in the environment.', 'fig-1-crucifer-flea-be-opt.jpeg', 'canola'),
(36, 'Cutworms (Agrotis spp.) / काला कर्तनकीट (ब्लैक कटवार्म)', 'ब्लैक कटवर्म की उत्पत्ति अनिश्चित है, हालाँकि अब यह दुनिया के कई क्षेत्रों में पाया जाता है, मुख्य रूप से कुछ उष्णकटिबंधीय क्षेत्रों और ठंडे क्षेत्रों में अनुपस्थित है। यह दक्षिणी गोलार्ध की तुलना में उत्तरी गोलार्ध में अधिक व्यापक और हानिकारक है। यह हर साल समशीतोष्ण क्षेत्रों में फिर से आक्रमण करता है और गर्म या उपोष्णकटिबंधीय क्षेत्रों में शीतकाल बिताता है।  यूरोप, चीन और उत्तरी अमेरिका में वयस्कों के लंबी दूरी तक फैलाव का संदेह लंबे समय से रहा है। मूल पैटर्न वसंत ऋतु में उत्तर की ओर और शरद ऋतु में दक्षिण की ओर बढ़ना है। संयुक्त राज्य अमेरिका में किए गए अध्ययनों से पता चला है कि वसंत के दौरान पतंगों का उत्तर की ओर विस्थापन होता है, जो उत्तर की ओर बहने वाली हवा की मदद से दो से चार दिनों में 1000 किमी की दूरी तक पहुंच जाता है। शरद ऋतु में दक्षिण और दक्षिण-पश्चिम में इसी तरह के विस्थापन का दस्तावेजीकरण किया गया है। ...................................................................................................Cutworms, also called nocturnal moths, are insects of the order Lepidoptera which, in their larval stage (caterpillars), can damage potatoes. There are different species of cutworm, of the genus Agrotis, whose caterpillars develop mainly in the soil (terricolous cutworms), on the foliage (defoliator cutworms) or in the stems (borer cutworms: photo 1). The colour of the larvae is usually dull, grey or brown (especially the terricolous cutworms, more commonly called grey worms: photos 2 and 3), glabrous or fairly smooth. They are 4 to 5 cm long, with black dots on each segment; the numbers and patterns of these vary according to the species. ', 'काले कटवर्म के दमन के लिए आमतौर पर पौधों और मिट्टी पर लगातार कीटनाशकों का उपयोग किया जाता है, लेकिन उपसतह मिट्टी के बजाय सतह का उपयोग वांछनीय है। लार्वा आसानी से कीटनाशक-उपचारित चोकर और अन्य चारा स्वीकार कर लेते हैं। बीजों पर प्रणालीगत कीटनाशकों का अनुप्रयोग भी लार्वा की चोट के खिलाफ कुछ सुरक्षा प्रदान करता है। कटवर्म नियंत्रण के लिए आमतौर पर बैसिलस थुरिंजिएन्सिस की सिफारिश नहीं की जाती है।...................................................................................................Chemical control is warranted when there is a rapidly increasing area or proportion of crop damage. Treat the crop when seedling loss is nearing minimal plant density crop requirements Treat older plants if more than 50% of plants have 75% or more leaf tissue loss Chemical control is most effective when applied late in the day to maximise likelihood of larvae contacting/ingesting insecticide when they emerge at night to feed Ground rig applications may provide flexibility to treat just affected areas, or to apply a border spray where larvae are moving into the crop from neighbouring weeds.', 'घर के बगीचे में, कटवर्मों द्वारा अंकुरों को होने वाले नुकसान को रोकने के लिए बाधाएं कभी-कभी उपयोगी होती हैं। खपत को रोकने के लिए पौधे के तने के चारों ओर ऊपर और नीचे दोनों को हटाकर धातु या मोमयुक्त कागज के कंटेनर रखे जा सकते हैं। समान प्रभाव प्राप्त करने के लिए एल्यूमीनियम पन्नी को तने के चारों ओर लपेटा जा सकता है। क्योंकि लार्वा मिट्टी की रेखा के नीचे बिल खोदकर खाएगा, इसलिए इसे मिट्टी की सतह के नीचे अवरोध तक बढ़ाना आवश्यक है। क्योंकि काले कटवर्म पतंगे, जो आसानी से ऐसी बाधाओं को पार कर जाते हैं, बढ़ते मौसम के दौरान सक्रिय रहते हैं, अकेले इस प्रक्रिया का महत्व कम हो सकता है। लार्वा अवरोधों के अलावा, जाल या पंक्ति कवर का उपयोग अधिक प्रभावी साबित होना चाहिए।.......................................................................................................2 larvae per 0.5 metre of crop row (visual inspection)', 'cutworm-and-damage2-150x150.jpg', 'lupins'),
(37, 'Thrips / थ्रिप्स', 'थ्रिप्स सूक्ष्म पतला कीट होता है, जिसके पंखों के किनारे झालर दार होते हैं, यह पौधे के कोमल भागो में बाहरी सतह की कोशिकाओं को छिन्न-भिन्न कर उनका रस चूसते हैं ,और विषाणु जनित बीमारियों का वाहक होते हैं इनकी लगभग 105 प्रकार की प्रजातियां पाई जाती है |.................................................................................................Thrips, order Thysanoptera, are tiny, slender insects with fringed wings. They feed by puncturing the epidermal (outer) layer of host tissue and sucking out the cell contents, which results in stippling, discolored flecking, or silvering of the leaf surface. Thrips feeding is usually accompanied by black varnishlike flecks of frass (excrement). Pest species are plant feeders that discolor and scar leaf, flower, and fruit surfaces, and distort plant parts or vector plant pathogens. Many species of thrips feed on fungal spores and pollen and are often innocuous. However, pollen feeding on plants such as orchids and African violets can leave unsightly pollen deposits and may reduce flower longevity. Certain thrips are beneficial predators that feed on other insects and mites.', 'कई थ्रिप्स प्रजातियां पौधों के सुरक्षित भाग, फूलों के अंदर, बढ़ती हुई शाखाओं के ऊपरी भाग और लीफ कर्ल गाल्स में निवास करती है। इस कारण संपर्क (कॉन्टैक्ट) कीटनाशक केवल उन प्रजातियों पर ज्यादा प्रभाव डालते है जो पत्तों की सतह पर रहते है। थ्रिप्स की कुछ प्रजातियों की आबादी में कीटनाशक के विरुद्ध प्रतिरोध उत्पन्न हो सकता है जैसे की वेस्टर्न फ्लावर थ्रिप्स, प्याज थ्रिप्स और तरबूज थ्रिप्स।  इस वजह से जिन कीटनाशकों की कार्यवाई विधि अलग होती है उन्हें हर बार बदल-बदल कर प्रयोग करना चाहिए । कुछ थ्रिप्स की प्रजातियां केवल पराग पर भोजन करती है जो की पौधों को बहुत कम नुकसान पहुँचाती है । इसलिए उन थ्रिप्स की प्रजातियों की पहचान आवश्यक है जो फसलों के लिए हानिकारक होती है।  थ्रिप्स के विरुद्ध पंजीकृत अधिकांश कीटनाशक जैसे की ओर्गनोफॉस्फेट (1 बी), सिंथेटिक पाइरेथ्रोइड्स (3 A) या नियोनिकोटिनॉइड्स (4 A), इसके प्राकृतिक शत्रुओं पर उच्च दर से नकरात्मक प्रभाव डालते हैं । इन उत्पादकों का प्रयोग तब तक नहीं करना चाहिए जब तक कोई और विकल्प उपलब्ध न हो ।..................................................................................................Predatory thrips (Table 2), green lacewings, minute pirate bugs, mites, and certain parasitic wasps help to control plant-feeding thrips. To conserve and encourage naturally occurring populations of these beneficials, avoid creating dust and consider periodically rinsing dust off of small plants, avoid persistent pesticides, and grow a diversity of plant species.', 'बगीचे को साफ सुथरा रखें नीले रंग का स्टिकी ट्रैप लगाये 20 ट्रैप प्रति एकड़ फिप्रोनिल 1 मि.ली प्रति लीटर पानी में लेकर 15 दिन के अंतराल पर छिड़काव करें.................................................................................................. Greenhouse thrips can infest many plant species but primarily is a pest of evergreen, broadleaved perennials. It occurs mainly on the underside of leaves and on fruit clusters or other plant parts that touch each other. Greenhouse thrips is sluggish and the adults tend not to fly. Individuals feed in groups and populations usually begin in a limited part of the plant and spread slowly. If the underside of leaves on susceptible plants are regularly inspected to allow early detection and removal of new infestations, pruning off colonies can be effective.', 'images-2.jpeg', 'cotton'),
(38, 'Brown mite / भूरा गेहूं घुन', 'भूरा गेहूं घुन, पेट्रोबिया लैटेंस (मुलर), पश्चिमी कैनसस में शुष्क भूमि गेहूं का एक आम कीट है जो शुष्क वर्षों में मैनहट्टन के पूर्व में एक समस्या हो सकता है। यह भोजन करते समय पौधों की कोशिकाओं को नष्ट करके गेहूं के पौधों को नुकसान पहुंचाता है, जिससे पत्तियां झड़ जाती हैं। भूरे गेहूं के कण पत्तियों की नोकों को खाने की प्रवृत्ति रखते हैं, जिससे वे सूखकर मर जाते हैं। भारी प्रकोप वाले खेत झुलसे हुए, मुरझाए हुए दिखाई देते हैं।....................................................................................................They feed on leaves by sucking sap by inserting two needle like stylets into the leaf there by withdrawing nutrients from the plants. Affected leaves become whitish and under severe conditions become reddish brown and bronzy Leaves wither and dry', 'भूरे गेहूं के घुन की आबादी का आकलन करना मुश्किल हो सकता है क्योंकि पत्तियों में गड़बड़ी होने पर घुन पौधों को जल्दी से गिरा देते हैं। आर्थिक सीमा अच्छी तरह से परिभाषित नहीं है, लेकिन शुरुआती वसंत में प्रति फुट पंक्ति में कम से कम कई सौ घुन होने का अनुमान है। यदि पौधे तनावग्रस्त हैं या खराब ढंग से जुते हैं तो चिंता अधिक होती है। उपचार की प्रतिक्रिया अक्सर बाद में होने वाली वर्षा पर निर्भर करती है। अप्रैल के अंत तक, वयस्क सफेद, डायपॉजिंग अंडे देना शुरू कर देते हैं और आबादी में आम तौर पर प्राकृतिक गिरावट आती है। एक बार जब सफेद अंडे मिल जाते हैं और अधिकांश लाल, सर्दियों के अंडे फूट जाते हैं, तो रासायनिक नियंत्रण आमतौर पर उचित नहीं होता है.................................................................................................The western predatory mite and brown lacewing are both effective predators, but alone may not control brown mites. It is important to avoid using insecticides that kill these natural enemies; residues of certain pesticides, such as pyrethroids used during the dormant season, can harm predator mites.', 'भूरे गेहूं के कण धात्विक भूरे से काले रंग के होते हैं, और सामान्य समाचार पत्र प्रिंट में एक अवधि के आकार के होते हैं। उनके पैर हल्के पीले हैं, और उनके अगले पैर अन्य तीन जोड़ी पैरों की तुलना में विशिष्ट रूप से लंबे हैं। भूरे गेहूं के घुन की मादाएं दो प्रकार के अंडे देने के लिए जानी जाती हैं। दोनों प्रकार के अंडे संक्रमित पौधों के पास मिट्टी के कणों पर देते हैं। सर्दियों के दौरान, मादाएं लगभग गोलाकार, चेरी लाल अंडे देती हैं जो अनुकूल मौसम के साथ एक सप्ताह में फूट सकते हैं। वसंत ऋतु में, मादाएं मोमी कोटिंग और झालरदार टोपी के साथ सफेद अंडे देती हैं जो पतझड़ तक फूटते नहीं हैं। कोई भी मादा दोनों प्रकार के अंडे नहीं दे सकती।....................................................................................................In-season sprays for brown mites are generally not warranted in residential trees to protect fruit yield or quality. If brown mite has been a problem, wait until the delayed-dormant season when buds have swollen but before they open. Then apply narrow-range or horticultural oil to thoroughly cover buds and bark.', 'closeup-of-brown-wheat-mite-on-wheat-leaf--dnim0047--.jpg', 'wheat'),
(39, 'Shoot fly / ताना मक्खी', 'यह ज्वार का अंकुरण अवस्था में सबसे महत्वपूर्ण कीट है। वयस्क घरेलू मक्खी के समान होता है, आकार में छोटा (3-5 मिमी लंबा), और भूरे रंग का, और भूरे धब्बों के साथ पेट पीला होता है। लार्वा या मैगॉट्स पीले या सफेद रंग के होते हैं, 8 मिमी तक लंबे होते हैं। मक्खी या तो मिट्टी की सतह के पास नई टहनियों के आधार पर या पुराने पौधों की पत्तियों पर अंडे देती है। कीड़े म्यान के अंदर रेंगते हैं और युवा अंकुर के बीच में घुसकर विकास बिंदु और सबसे छोटी पत्ती को नष्ट कर देते हैं, जो भूरे रंग की हो जाती है और मुरझा जाती है। इस क्षति को \"डेड हार्ट\" के नाम से जाना जाता है। जब अच्छी वृद्धि की स्थिति होती है तो युवा पौधे आमतौर पर नए टिलर पैदा करके क्षति की भरपाई करने में सक्षम होते हैं, जो आंशिक रूप से हमले से बच सकते हैं, लेकिन बाद में बालियों का पकना असमान होगा। कमजोर पौधे में बार-बार संक्रमण से गंभीर नुकसान हो सकता है। कभी-कभी क्षति इतनी गंभीर होती है कि कई पौधे मर जाते हैं और खेत में दोबारा रोपाई करनी पड़ती है। पुराने पौधे (अंकुर निकलने के 30 दिन से अधिक बाद) आमतौर पर शूट फ्लाई से क्षतिग्रस्त नहीं होते हैं। हालाँकि, जब शूट मक्खियाँ प्रचुर मात्रा में होती हैं (बारिश के मौसम में मध्यम तापमान और उच्च आर्द्रता के तहत) तो पुराने पौधों पर हमला हो सकता है, लेकिन वे मृत-हृदय लक्षण पैदा नहीं करते हैं। इसके बजाय, क्षतिग्रस्त पत्ती पतली और कागज़ जैसी हो जाती है, और अन्य पत्तियों के चारों ओर लिपट जाती है। परिणामस्वरूप, पौधे सामान्य रूप से विकसित होने में विफल हो सकते हैं। देर से होने वाला संक्रमण प्रारंभिक चरण में पुष्पगुच्छ को भी नुकसान पहुंचा सकता है, जिसके परिणामस्वरूप शूट फ्लाई क्षति से प्रभावित पुष्पगुच्छ का एक हिस्सा सड़ सकता है या सूख सकता है।...................................................................................................It is the most important pest of sorghum at the seedling stage. The adult is similar to the housefly, smaller in size (3-5 mm long), and greyish in colour, and abdomen yellow with brown patches. The larvae or maggots are yellowish or whitish in colour, up to 8 mm long. The fly lays eggs either at the base of young shoots near soil surfaces, or in older plants, on the leaves. The maggots crawl inside the sheath and bore into the heart of the young shoot killing the growing point and the youngest leaf, which turns brown and withers. This damage is known as \"dead heart\". When good growing conditions prevail the young plants are usually able to compensate the damage by producing new tillers, which may partly escape attack, but later the ripening of the ear heads will be unequal. In weak plant repeated infestation may cause serious losses. Sometimes the damage is so severe that many seedlings die and the field has to be replanted. Older plants (over 30 days after seedling emergence) are generally not damaged by the shoot fly. However, when shoot flies are abundant (during the rainy season under moderate temperatures and high humidity) older plants may be attacked, but they do not produce the dead-heart symptoms. Instead, the damaged leaf becomes thin and papery, and wraps around the other leaves. As a result, the plants may fail to grow normally. Late infestations may also damage the panicle in the formative stage, resulting in rotting or drying up of a portion of the panicle affected by shoot fly damage.', 'ज्वार मुख्य रूप से अफ्रीका और एशिया के साथ दक्षिणी यूरोप के कुछ क्षेत्रों में भी उगाया जाता है । वयस्क मक्खी मेजबान पौधे की पत्ती के नीचे की तरफ अंडे देती है। एक मादा लगभग 75 अंडे दे सकती है। एक सप्ताह में अंडे फूटते हैं और लार्वा केंद्रीय चक्र में चला जाता है और बढ़ते सिरे को खाता है, जिसके परिणामस्वरूप पौधा बढ़ने में असफल हो जाता है। लार्वा लगभग 17 दिनों के बाद पुतले बन जाते हैं और वयस्क गर्म परिस्थितियों में अगले 11 दिनों के बाद उभर सकते हैं। [2] ऐसी फसल किस्मों के प्रजनन के लिए कई प्रयास किए गए हैं जो शूट फ्लाई के हमले के लिए प्रतिरोधी हैं। [3] रोपण के मौसम में बदलाव करना भी कुछ परिस्थितियों में प्रभावी हो सकता है क्योंकि मक्खियाँ केवल युवा पौधों पर ही हमला करती हैं। वयस्कों की निगरानी मछली के भोजन ( मछली के तेल के साथ ), शराब बनाने वाले के खमीर और अमोनियम सल्फाइड से युक्त चारे का उपयोग करके की जा सकती है । [4] फसलों के नुकसान को प्रबंधित करने या कम करने के लिए प्राकृतिक शिकारियों और परजीवियों को बढ़ाने का भी प्रयास किया गया है।................................................................................................. ETL: 10% Dead heart symptoms 2% white ear symtoms  Clip the seedling tips before transplanting to eliminate egg masses. Install light trap @ 1 / ha and pheromone trap @ 5 / ac. Release egg parasitoid, Trichogramma japonicum @ 2cc /ac 3 times at weely interval. Spray Neem seed kernel extract 5% or Azadirachtin 0.03% 400 ml/ac. Spray any one of the following insecticides Acephate 75 % SP 267-400 g/ac Carbofuran 3% CG 10 kg/ac Carbosulfan 6% G 6.7 kg/ac Carbosulfan 25% EC 320-400 ml/ac CartapHydrochloride 50 % SP 400 g/ac Chlorantraniliprole 18.5% SC 60 ml/ac Chlorantraniliprole 0.4% G 4 kg/ac Chlorpyriphos 20% EC 500 ml/ac Fipronil 5% SC 400-600 g/ac Fipronil 80%WG 20-25 g/ac Flubendiamide 20% WG 50 g/ac Flubendiamide 39.35% M/M SC 20 g/ac Thiacloprid 21.7% SC 200 g/ac Thiamethoxam 25% WG 40 g/ac', 'ज्वार मुख्य रूप से अफ्रीका और एशिया के साथ दक्षिणी यूरोप के कुछ क्षेत्रों में भी उगाया जाता है । वयस्क मक्खी मेजबान पौधे की पत्ती के नीचे की तरफ अंडे देती है। एक मादा लगभग 75 अंडे दे सकती है। एक सप्ताह में अंडे फूटते हैं और लार्वा केंद्रीय चक्र में चला जाता है और बढ़ते सिरे को खाता है, जिसके परिणामस्वरूप पौधा बढ़ने में असफल हो जाता है। लार्वा लगभग 17 दिनों के बाद पुतले बन जाते हैं और वयस्क गर्म परिस्थितियों में अगले 11 दिनों के बाद उभर सकते हैं। [2] ऐसी फसल किस्मों के प्रजनन के लिए कई प्रयास किए गए हैं जो शूट फ्लाई के हमले के लिए प्रतिरोधी हैं। [3] रोपण के मौसम में बदलाव करना भी कुछ परिस्थितियों में प्रभावी हो सकता है क्योंकि मक्खियाँ केवल युवा पौधों पर ही हमला करती हैं। वयस्कों की निगरानी मछली के भोजन ( मछली के तेल के साथ ), शराब बनाने वाले के खमीर और अमोनियम सल्फाइड से युक्त चारे का उपयोग करके की जा सकती है । [4] फसलों के नुकसान को प्रबंधित करने या कम करने के लिए प्राकृतिक शिकारियों और परजीवियों को बढ़ाने का भी प्रयास किया गया है।................................................................................................. ETL: 10% Dead heart symptoms 2% white ear symtoms  Clip the seedling tips before transplanting to eliminate egg masses. Install light trap @ 1 / ha and pheromone trap @ 5 / ac. Release egg parasitoid, Trichogramma japonicum @ 2cc /ac 3 times at weely interval. Spray Neem seed kernel extract 5% or Azadirachtin 0.03% 400 ml/ac. Spray any one of the following insecticides Acephate 75 % SP 267-400 g/ac Carbofuran 3% CG 10 kg/ac Carbosulfan 6% G 6.7 kg/ac Carbosulfan 25% EC 320-400 ml/ac CartapHydrochloride 50 % SP 400 g/ac Chlorantraniliprole 18.5% SC 60 ml/ac Chlorantraniliprole 0.4% G 4 kg/ac Chlorpyriphos 20% EC 500 ml/ac Fipronil 5% SC 400-600 g/ac Fipronil 80%WG 20-25 g/ac Flubendiamide 20% WG 50 g/ac Flubendiamide 39.35% M/M SC 20 g/ac Thiacloprid 21.7% SC 200 g/ac Thiamethoxam 25% WG 40 g/ac', '1494.400x400_7.jpeg', 'wheat');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` bigint(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `name`, `email`, `number`, `message`) VALUES
(2, 'navneet chaudhary', 'chaudharynavneet@gmail.com', 9759000083, 'hello how are you');

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`id`, `title`, `date`, `file`, `details`) VALUES
(1, 'Agriculture Infrastructure Fund', '2014-02-13', 'FINALSchemeGuidelinesAIF (2)-2.pdf', 'वही एग्रीकल्चर इंफ्रास्ट्रक्चर फंड स्कीम कोल्ड स्टोरेज, प्रोसेसिंग यूनिट्स, वेयरहाउस, पैकेजिंग यूनिट की स्थापना करने पर किसानों को 2 करोड़ रुपये तक का लोन देती है. केंद्र सरकार की ओर से इस योजना के माध्यम से किसानों को 2 करोड़ रुपए तक के लोन पर अधिकतम 7 साल तक ब्याज में 03% तक की छूट दी जा रही है.'),
(2, 'ATMA', '2018-10-03', 'ATMA-Guidelines 2018.pdf', '\'आत्मा\' योजना ( ATMA Yojana) की मदद से किसान और कृषि वैज्ञानिक एक-दूसरे के आमने-सामने आते हैं. कृषि वैज्ञानिक किसानों को आधुनिक तरीके से खेती करने का प्रशिक्षण देते हैं|'),
(3, 'AGMARKNET', '2014-03-14', 'Agmarknet_Guidelines.pdf', 'एगमार्कनेट भारत सरकार के अधीन कृषि मंत्रालय द्वारा भारतीय कृषि के वैश्वीकरण की दिशा में एक पहल है। यह पोर्टल कृषि विपणन सुधार पर विस्तृत जानकारी प्रदान करता है, विपणन अनुसंधान, बाजार प्रोफ़ाइल, कीमतों और आगमन तथा वस्तुओं और कृषि बाजार के अनुबंध खेती आदि के विवरण प्रदान करता है।'),
(4, 'Horticulture', '2014-04-05', 'midh_Guidelines.pdf', 'National Horticulture Mission योजना के जरिए बागवानी फसलों का उत्पादन बढ़ाने का प्लान है, ताकि किसानों की आय मे इजाफा किया जा सके. इस स्कीम के तहत बागवानी ट्रेनिंग, गाइडेंस और अनुदान भी दिया जाता है|'),
(5, 'Online Pesticide Registration', '2009-09-23', 'Pesticides_Registration.pdf', 'कीटनाशकों के निर्माण के लिए लाइसेंस के नवीनीकरण के लिए आवेदन'),
(6, 'DBT in Agriculture', '2014-05-12', 'Guideline_DBTinAgriculture.pdf', 'सरकार ने अक्‍तूबर, 2016 से उर्वरकों में प्रत्‍यक्ष लाभ अंतरण (डीबीटी) प्रणाली लागू की है। उर्वरक डीबीटी प्रणाली के तहत खुदरा विक्रेताओं द्वारा लाभार्थियों को की गई वास्‍तविक बिक्री के आधार पर उर्वरक कम्‍पनियों को विभिन्‍न उर्वरक ग्रेडों पर 100% राजसहायता जारी की जाती है।');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `clientlogin`
--
ALTER TABLE `clientlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `foundpest`
--
ALTER TABLE `foundpest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pests`
--
ALTER TABLE `pests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clientlogin`
--
ALTER TABLE `clientlogin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `foundpest`
--
ALTER TABLE `foundpest`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pests`
--
ALTER TABLE `pests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
