<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            // Kendari (city_id: 54)
            [
                'name' => 'Lasolo Waterfall',
                'description' => "Tucked away in the lush forests of Kota Lama Kendari, Lasolo Waterfall is a hidden gem in Sanua, West Kendari. This natural wonder offers a serene escape, surrounded by towering rocks and dense greenery, creating a peaceful atmosphere perfect for nature lovers.\n\nThe waterfall, standing over 3 meters tall, cascades into a spacious pool with a depth of about 1.5 meters. This pool is ideal for swimming, and the surrounding cliffs attract adventurous visitors who enjoy jumping into the refreshing water. The rocky landscape on both sides adds a rugged charm to the site.\n\nLasolo Waterfall is a great spot to relax and connect with nature. Its secluded location makes it feel like a secret retreat, perfect for a calming day trip. Bring your camera to capture the beauty of this tranquil oasis in Kendari.",
                'latitude' => -3.960915,
                'longitude' => 122.574523,
                'city_id' => 54,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nanga-Nanga Waterfall',
                'description' => "Nanga-Nanga Waterfall, located in Poasia, Kendari, is a stunning natural attraction surrounded by tall, shady trees. The 5-meter-high waterfall pours cool, clear water into a serene pool, offering a refreshing spot for visitors.\n\nThe surrounding dark brown rocks and lush greenery create a picturesque setting. The sunlight filtering through the trees casts beautiful hues, making it an excellent location for photos. The path to the waterfall is lined with verdant foliage, adding to the scenic charm.\n\nThis tranquil spot is perfect for those seeking a peaceful retreat. The cool water and calming environment make it ideal for unwinding. Whether you want to take a dip or simply enjoy the view, Nanga-Nanga Waterfall is a must-visit destination in Kendari for nature enthusiasts.",
                'latitude' => -4.056857,
                'longitude' => 122.562694,
                'city_id' => 54,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baterai Mata',
                'description' => "Baterai Mata, located in Mata, Kendari, is a historical site from the Japanese era, part of Kendari’s National Cultural Heritage Complex. Protected by law, this site offers a glimpse into the city’s past and is perfect for a weekend visit.\n\nSituated close to Kendari’s city center, Baterai Mata faces the beautiful Kendari Bay. Visitors can enjoy stunning views of the sea and watch ships sailing across the water. The site combines history with scenic beauty, making it a unique attraction.\n\nThis spot is ideal for those who love history and nature. Take a leisurely stroll, soak in the coastal views, and learn about Kendari’s heritage. It’s a great place to relax and explore the cultural side of the city.",
                'latitude' => -3.963877,
                'longitude' => 122.608085,
                'city_id' => 54,
                'category_id' => 4, // Culture
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Citraland Waterpark Kendari',
                'description' => "Citraland Waterpark in Anduonohu, Poasia, is a fun-filled destination for families in Kendari. This popular waterpark offers a variety of exciting rides and attractions suitable for all ages, ensuring a memorable day out.\n\nThe park features pools for adults and kids, thrilling water slides, and a dedicated children’s play area. Safety is a priority, so parents can relax while kids enjoy the fun. The wave pool, mimicking ocean waves, is a favorite, offering a beach-like experience in a safe environment.\n\nFor a more relaxed visit, float along the lazy river on an inflatable tube. With modern facilities and a welcoming atmosphere, Citraland Waterpark is perfect for creating joyful memories with loved ones. Bring your family and dive into the fun!",
                'latitude' => -3.994604,
                'longitude' => 122.536437,
                'city_id' => 54,
                'category_id' => 5, // Man-made
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kendari Bay Bridge',
                'description' => "Kendari Bay Bridge, inaugurated in 2020 by President Joko Widodo, is a modern icon of Kendari. Spanning 1,348 meters with four lanes, it connects Kota Lama and Poasia, offering both functionality and beauty.\n\nThe bridge overlooks the sparkling blue waters of Kendari Bay, providing breathtaking views for those crossing it. Integrated with the Outer Ring Road, it’s a vital part of the city’s infrastructure, but its scenic surroundings make it a tourist attraction too.\n\nDriving or walking across the bridge allows visitors to enjoy the stunning seascape and fresh sea breeze. It’s a great spot for a leisurely drive or to capture photos of Kendari’s coastal charm. Visit this landmark to experience the blend of modern engineering and natural beauty.",
                'latitude' => -3.976341,
                'longitude' => 122.586705,
                'city_id' => 54,
                'category_id' => 5, // Man-made
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kendari Botanical Garden',
                'description' => "Kendari Botanical Garden, located in the Nanga-Nanga Papolia forest, spans 113 hectares and is a haven for nature lovers. With 22 hectares of protected forest and 96 hectares of production forest, it offers a refreshing escape from the city.\n\nThe garden is filled with lush trees, colorful plants, and the soothing sounds of wildlife, creating a calm and inviting atmosphere. Visitors often return, especially on holidays, to enjoy the cool air and serene environment.\n\nThis spot is perfect for a relaxing walk or a family picnic. The diverse flora and fauna make every visit special, and the peaceful setting encourages you to stay longer. Explore Kendari Botanical Garden for a refreshing nature experience.",
                'latitude' => -4.048081,
                'longitude' => 122.577191,
                'city_id' => 54,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kendari Waterfront City',
                'description' => "Kendari Waterfront City in Petoaha, Abeli, is a transformed former slum now turned into a vibrant tourist spot. This scenic area is best visited in the late afternoon to catch stunning sunsets over Kendari Bay.\n\nThe waterfront offers views of the bay and the iconic Bungkutoko Yellow Bridge. Colorful flower gardens, comfortable seating areas, and decorative streetlights enhance the area’s charm. Visitors can watch traditional sampan boats glide across the water, adding to the peaceful vibe.\n\nThis destination is perfect for a relaxing evening stroll or to capture beautiful photos. Whether you’re with friends or family, Kendari Waterfront City provides a delightful blend of natural beauty and modern aesthetics.",
                'latitude' => -3.98499,
                'longitude' => 122.603927,
                'city_id' => 54,
                'category_id' => 5, // Man-made
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kendari Water Sport',
                'description' => "Kendari Water Sport, located in Tipulu, West Kendari, is a lively destination for both adventure and relaxation. This spot offers stunning views of Kendari Bay and the iconic Al Alam Mosque, making it a favorite among locals.\n\nThe area features a colorful mangrove tracking path, perfect for a scenic walk or light exercise. Visitors can explore the trail surrounded by hundreds of mangrove trees, adding a unique touch to the experience.\n\nWhether you want to jog, stroll, or simply enjoy the bay’s beauty, Kendari Water Sport is a great choice. It’s an ideal place to combine outdoor activities with breathtaking views, making it a must-visit in Kendari.",
                'latitude' => -3.966922,
                'longitude' => 122.549037,
                'city_id' => 54,
                'category_id' => 5, // Man-made
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nambo Beach',
                'description' => "Nambo Beach is a beloved destination in Kendari, offering a beautiful coastal escape for locals and tourists. Its natural setting makes it perfect for a variety of activities, from swimming to relaxing by the shore.\n\nVisitors can dive into the clear waters, rent a boat, or try fishing. The beach is also equipped with traditional-style gazebos, where you can sit and enjoy the cool sea breeze. The scenic surroundings make it a great spot for photos or simply soaking in the view.\n\nWhether you’re looking for adventure or a peaceful day by the sea, Nambo Beach has something for everyone. Bring your friends or family and enjoy a fun-filled day at this charming beach.",
                'latitude' => -4.000655,
                'longitude' => 122.61769,
                'city_id' => 54,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kendari Blue River',
                'description' => "Kendari Blue River, located on Bungkutoko Island, is a beautiful seawater bathing spot known for its clean and inviting environment. The clear blue waters and well-maintained surroundings make it a favorite among visitors to Kendari.\n\nThe natural beauty of Kendari Blue River is complemented by its affordability, with reasonably priced food and drinks available for guests. The serene atmosphere is perfect for relaxing, swimming, or enjoying a quiet day by the water.\n\nThis destination offers a refreshing escape for families or solo travelers. Whether you want to swim in the pristine waters or simply enjoy the tranquil setting, Kendari Blue River is a delightful spot to visit in Kendari.",
                'latitude' => -3.98752,
                'longitude' => 122.618533,
                'city_id' => 54,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // North Konawe (city_id: 55)
            [
                'name' => 'Wawolesea Hot Spring',
                'description' => "Wawolesea Hot Spring, located in Wawolesea Village, Lasolo, is a unique natural attraction. The hot spring forms a well that flows into terraced pools, resembling rice fields. Surrounded by limestone hills, the bubbling water creates a captivating sight, almost as if it’s boiling.\n\nThe water has a salty taste and a distinct sulfur smell due to its high sulfur content. This makes it not only a relaxing spot for soaking but also a place believed to have healing properties, such as treating skin conditions and eliminating bacteria.\n\nNestled among scenic hills, Wawolesea Hot Spring offers a tranquil escape. It’s perfect for those seeking a soothing and therapeutic experience in nature. Visit this hidden gem to unwind and enjoy its unique beauty.",
                'latitude' => -3.696264,
                'longitude' => 122.303326,
                'city_id' => 55,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Taipa Beach',
                'description' => "Taipa Beach, found in Taipa Village, Lasolo, faces the stunning Banda Sea. Its wide stretch of soft white sand creates a picturesque setting, inviting visitors to relax and enjoy the coastal beauty.\n\nFor adventure seekers, a steep hill nearby offers a challenging climb. From the top, you’ll be rewarded with breathtaking views of the ocean and the beach’s vibrant colors. If hiking isn’t your thing, you can unwind in gazebos or play in the shallow waters along the shore.\n\nTaipa Beach is perfect for both thrill-seekers and those looking for a peaceful day by the sea. Its natural charm and serene atmosphere make it a great spot for a relaxing getaway or a fun beach day.",
                'latitude' => -3.729524,
                'longitude' => 122.392517,
                'city_id' => 55,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Long Sand Beach',
                'description' => "Long Sand Beach, located in Labengki Village, Lasolo, stretches approximately 700 meters, earning its name for its long, pristine shoreline. This uninhabited beach is lined with rows of coconut trees, adding to its natural beauty.\n\nWith no facilities, the beach remains untouched, offering a pure and tranquil experience. For a stunning view, climb the hill on the right side of the beach. From there, you can enjoy the sight of white sand blending with the ocean’s vibrant hues.\n\nThis serene destination is ideal for those seeking a quiet escape in nature. Whether you relax on the shore or explore the hilltop views, Long Sand Beach offers a peaceful retreat away from the crowds.",
                'latitude' => -3.466575,
                'longitude' => 122.466536,
                'city_id' => 55,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Love Bay Beach',
                'description' => "Love Bay Beach in Labengki Island is named for its heart-shaped cove, a natural wonder that feels like a gift from nature. Its crystal-clear waters and blue gradients make it a breathtaking destination, rivaling famous spots like Raja Ampat.\n\nTo fully appreciate its beauty, hike up a 30-meter hill with a safe, designated trail. From the top, the heart-shaped bay comes into view, offering a perfect spot for photos or quiet reflection.\n\nThis hidden gem is ideal for those seeking a unique and serene coastal experience. Love Bay Beach’s untouched charm and stunning views make it a must-visit for nature lovers exploring Labengki.",
                'latitude' => -3.482009,
                'longitude' => 122.466267,
                'city_id' => 55,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Molara Swamp',
                'description' => "Molara Swamp, located in Wawongsangi Village, Wiwirano, is a stunning lowland marsh surrounded by lush greenery. Known for its natural beauty, this area is more than just a mining region—it’s a hidden treasure waiting to be explored.\n\nThe swamp features expansive pools of water framed by vibrant green grasses and thriving trees. Its untouched environment creates a peaceful and refreshing atmosphere, perfect for nature enthusiasts.\n\nVisitors are often captivated by the vast, green landscape and the sense of calm it provides. Molara Swamp is ideal for those looking to discover a pristine and lesser-known natural wonder in North Konawe.",
                'latitude' => -3.234291,
                'longitude' => 122.115998,
                'city_id' => 55,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lamesou Waterfall',
                'description' => "Lamesou Waterfall in Lametono Village, Lasolo, is a breathtaking natural attraction. Standing about 60 meters tall with a wide cascade, this waterfall delivers a powerful flow of water, creating a refreshing and awe-inspiring sight.\n\nNestled in the heart of Konut’s dense forest, the waterfall is surrounded by lush, green trees and a cool, serene atmosphere. The sturdy, ancient trees add to the site’s charm, making it a hidden gem in the region.\n\nThis spot is perfect for those seeking a peaceful retreat in nature. The soothing sound of falling water and the tranquil forest setting make Lamesou Waterfall a must-visit for a relaxing day trip.",
                'latitude' => -3.706061,
                'longitude' => 122.217323,
                'city_id' => 55,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mahumalalang Lake',
                'description' => "Mahumalalang Lake, also known as Blue Lagoon Labengki, is a serene gem on Labengki Island. Its crystal-clear, turquoise waters and surrounding tall karst cliffs create a tranquil and breathtaking escape from the outside world.\n\nThe lake’s vibrant colors and calm atmosphere make it a favorite among visitors, often called a “hidden paradise.” The peaceful setting offers a sense of inner calm, perfect for reflection or relaxation.\n\nSurrounded by stunning natural beauty, Mahumalalang Lake is ideal for those seeking a quiet retreat. Its untouched charm and soothing ambiance make it a must-visit destination for nature lovers exploring Labengki.",
                'latitude' => -3.47994,
                'longitude' => 122.439276,
                'city_id' => 55,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Matarombeo Karst',
                'description' => "Matarombeo Karst in North Konawe is one of Sulawesi’s largest karst landscapes, stretching across rugged mountains that rise about 1,500 meters above sea level. This vast area remains largely unexplored, offering a sense of adventure for visitors.\n\nThe region is home to diverse flora and fauna, including unique species like anoa and Sulawesi hornbills. A highlight is the Matarombeo Skull Cave, a prehistoric site containing ancient human remains, adding a touch of history to the natural wonder.\n\nSurrounded by lush forests, Matarombeo Karst is perfect for nature enthusiasts and explorers. Its dramatic landscape and rich biodiversity make it a unique destination for those seeking an off-the-beaten-path experience.",
                'latitude' => -3.061923,
                'longitude' => 121.680956,
                'city_id' => 55,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Red Sand Beach',
                'description' => "Red Sand Beach on Labengki Island is a striking destination with its glowing reddish-yellow sand that shines from a distance. Backed by towering karst mountains, the beach offers a majestic and unforgettable view.\n\nA unique feature is an unusual coconut tree that grows sideways toward the sea before curving upward, forming an L-shape. This quirky tree adds a special charm to the beach, making it a great spot for photos.\n\nThe untouched beauty of Red Sand Beach makes it perfect for those seeking a serene coastal escape. Whether you relax on the colorful sand or explore the surrounding scenery, this beach is a must-visit for its unique and captivating allure.",
                'latitude' => -3.415754,
                'longitude' => 122.419905,
                'city_id' => 55,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Oheo Blue Lagoon',
                'description' => "Oheo Blue Lagoon in Sambandete Village, Oheo, is a stunning natural pool nestled among rice fields and savanna. Its vibrant blue and turquoise waters, fed by a large natural spring, create a refreshing and scenic escape.\n\nThe lagoon’s clear waters shimmer beautifully under the midday sun, offering a perfect spot for relaxation or photography. A nearby river channels the water, adding to the serene atmosphere of the surrounding landscape.\n\nThis exotic destination is ideal for those seeking a peaceful retreat in nature. The cool air and pristine waters make Oheo Blue Lagoon a delightful spot to unwind and enjoy the beauty of North Konawe.",
                'latitude' => -3.361408,
                'longitude' => 122.071236,
                'city_id' => 55,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // South Buton (city_id: 56)
            [
                'name' => 'Waburi Park',
                'description' => "Waburi Park, located in Gaya Baru Village, Lapandewa, is a delightful coastal destination. Visitors can enjoy stunning views of the blue sea and relax in gazebos while savoring local cuisine or coffee, especially during the beautiful sunset.\n\nThe park offers modern facilities like toilets, accommodations, garden lights, and a security post, ensuring a comfortable visit. Food stalls and a scenic boardwalk add to the experience, making it a great spot for families or groups.\n\nWaburi Park is perfect for a relaxing day by the beach. Its serene atmosphere and well-maintained amenities make it an ideal place to unwind and enjoy the natural beauty of Lapandewa.",
                'latitude' => -5.663048,
                'longitude' => 122.76448,
                'city_id' => 56,
                'category_id' => 5, // Man-made
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gajah Mada Tomb',
                'description' => "Gajah Mada Tomb, located in the Lapala Mountains, Majaphit, is a historical site believed to be the resting place of the legendary Gajah Mada. Spanning 40x40 meters, the site features a large, shady tree at its center, adding to its mystique.\n\nThis tomb, nestled in the scenic South Buton mountains, attracts history enthusiasts and researchers eager to explore its cultural significance. The surrounding natural beauty enhances the site’s allure, making it a unique destination.\n\nLocal communities take pride in preserving this site, which is a vital part of their cultural identity. Visit Gajah Mada Tomb to experience a blend of history, mystery, and serene landscapes in South Buton.",
                'latitude' => -5.662489,
                'longitude' => 122.63998,
                'city_id' => 56,
                'category_id' => 4, // Culture
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'La Poili Ring Bridge',
                'description' => "La Poili Ring Bridge in Wawoangi Village, Sampolawa, is a hidden gem built beneath karst cliffs along the coast. Its unique design, resembling Maldivian bridges, overlooks the open sea and mountains, offering breathtaking views.\n\nThe clear blue waters below the bridge are perfect for swimming and snorkeling, with depths ranging from just over 1 meter to nearly 3 meters. This makes it suitable for both adults and children to enjoy.\n\nThis scenic spot is ideal for those seeking a mix of adventure and relaxation. The stunning coastal scenery and calm waters make La Poili Ring Bridge a must-visit destination in Sampolawa.",
                'latitude' => -5.659477,
                'longitude' => 122.686222,
                'city_id' => 56,
                'category_id' => 5, // Man-made
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lakadao Beach',
                'description' => "Lakadao Beach in Burangasi Village, Lapandewa, offers a pristine coastal experience with untouched natural beauty. Its standout feature is a towering 80-meter-high, 50-meter-wide cliff, perfect for rock-climbing enthusiasts.\n\nAt the beach’s center, a large coral rock topped with a gazebo provides a unique spot to relax and enjoy panoramic views. The soft sand and clear waters add to the beach’s charm, inviting visitors to unwind.\n\nLakadao Beach is ideal for adventurers and those seeking a serene escape. Its dramatic cliffs and tranquil shores make it a must-visit for a memorable day by the sea in Lapandewa.",
                'latitude' => -5.672194,
                'longitude' => 122.810272,
                'city_id' => 56,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Liwu Tongkidi Island',
                'description' => "Liwu Tongkidi Island, also known as Snake Island, spans about 1,000 square kilometers in South Buton. Its calm, crystal-clear waters and soft white sand create a stunning tropical paradise.\n\nThe island is a haven for snorkeling and diving, with vibrant marine life waiting to be explored. The tranquil waves and pristine beaches make it perfect for a relaxing day by the sea.\n\nLiwu Tongkidi Island offers an exotic escape for nature lovers. Its untouched beauty and diverse underwater world make it a must-visit destination in South Buton.",
                'latitude' => -5.594723,
                'longitude' => 122.509166,
                'city_id' => 56,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lagunci Beach',
                'description' => "Lagunci Beach in Sampolawa boasts a long shoreline with soft, white sand and calm, clear blue waters. On one side, the sparkling sea invites relaxation, while green hills on the other add a scenic backdrop.\n\nVisitors can swim, snorkel, or simply relax by the shore, enjoying the gentle sea breeze. The tranquil setting makes it suitable for all ages, from kids to adults.\n\nLagunci Beach is perfect for a fun and relaxing day by the sea. Its natural beauty and peaceful atmosphere make it a great spot for families or solo travelers in Sampolawa.",
                'latitude' => -5.685664,
                'longitude' => 122.720266,
                'city_id' => 56,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Samparona Waterfall',
                'description' => "Samparona Waterfall in Batuaga is a unique natural attraction with three distinct cascades. The first flows smoothly over a flat cliff, the second has gentle tiers, and the third features more pronounced steps, creating a varied and captivating sight.\n\nA spacious pool with varying depths offers a perfect spot for swimming or soaking. Surrounded by lush greenery, the waterfall provides a cool and refreshing escape in nature.\n\nThis hidden gem is ideal for those seeking a serene outdoor experience. Samparona Waterfall’s unique cascades and tranquil setting make it a must-visit in Batuaga for nature lovers.",
                'latitude' => -5.505631,
                'longitude' => 122.667939,
                'city_id' => 56,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lamando Hill',
                'description' => "Lamando Hill in Sampolawa offers stunning views that captivate visitors. From the summit, you can see the vast Banda Sea sparkling below, framed by golden grasslands swaying in the breeze.\n\nThe hill’s open landscape and cool sea air create a refreshing atmosphere, perfect for a midday hike. The scenic beauty, especially the wide meadows, makes it a great spot for photos or relaxation.\n\nLamando Hill is ideal for nature lovers and hikers seeking a peaceful escape. Its breathtaking vistas and serene setting make it a must-visit destination in Sampolawa.",
                'latitude' => -5.534018,
                'longitude' => 122.748112,
                'city_id' => 56,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jodoh Beach',
                'description' => "Jodoh Beach in Bola Village, Batauga, is a pristine coastal spot with soft white sand and clear blue waters. Surrounded by cliffs and lush trees, its natural beauty makes it a popular choice for photos and pre-wedding shoots.\n\nThe beach is perfect for camping, with stunning sunrise and sunset views to enjoy from your tent. The untouched environment adds to its charm, offering a peaceful retreat.\n\nJodoh Beach is ideal for those seeking a romantic or serene escape. Its natural allure and tranquil setting make it a must-visit for a memorable day in Batauga.",
                'latitude' => -5.690452,
                'longitude' => 122.632625,
                'city_id' => 56,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kabura-Burana Bathing Spot',
                'description' => "Kabura-Burana Bathing Spot in South Lawela Village, Batauga, is a refreshing natural pool nestled near a forest. Surrounded by tall trees and lush greenery, the area is filled with the soothing sounds of birdsong.\n\nThe crystal-clear water flows from a natural spring, offering a clean and inviting spot for swimming or soaking. Located close to a village, it’s easily accessible without a long trek.\n\nThis tranquil destination is perfect for those seeking a cool, nature-filled escape. Kabura-Burana’s serene atmosphere and pristine waters make it a must-visit in Batauga.",
                'latitude' => -5.555458,
                'longitude' => 122.611459,
                'city_id' => 56,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // South Konawe (city_id: 57)
            [
                'name' => 'Moramo Waterfall',
                'description' => "Moramo Waterfall, located in Sumber Sari Village, Moramo, is a stunning natural wonder. This cascade-style waterfall, about 100 meters tall, features 67 tiers, including 7 large and 60 smaller steps. The water flows over granite and limestone rocks, creating a mesmerizing sight.\n\nNestled within the Tanjung Peropa Nature Reserve, the waterfall is surrounded by dense, green trees, offering a cool and refreshing atmosphere. A unique tree growing in the middle of the falls adds an exotic touch to the scenery.\n\nThis destination is perfect for nature lovers seeking a serene escape. The lush forest and soothing sound of water make Moramo Waterfall a must-visit spot for a relaxing day in nature.",
                'latitude' => -4.220842,
                'longitude' => 122.745031,
                'city_id' => 57,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Namu Beach',
                'description' => "Namu Beach in Laonti District is a charming coastal destination with a curved shoreline framed by hills on both sides. Its white and black sand, lined with coconut trees and a long pier, creates a picturesque and inviting scene.\n\nThe calm waters, sheltered from strong waves, make it a safe spot for families to enjoy. The serene environment is perfect for relaxing, swimming, or simply soaking in the beauty of the bay.\n\nNamu Beach offers a peaceful retreat for those looking to unwind by the sea. Its natural charm and tranquil setting make it an ideal spot for a family outing or a quiet day by the shore.",
                'latitude' => -4.369975,
                'longitude' => 122.895936,
                'city_id' => 57,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Senja Beach',
                'description' => "Senja Beach, located in Wawatu Village, North Moramo, on Senja Island, is a tranquil coastal escape. The clear waters and gentle waves lap against a curved, sandy shore, surrounded by rocky cliffs and lush shrubs.\n\nThe beach faces a small coral island, adding to its serene and untouched charm. With no crowds, it’s perfect for those seeking a peaceful nature getaway, far from the hustle and bustle.\n\nVisitors can relax on the sand, enjoy the sea breeze, or take in the stunning views of cliffs and greenery. Senja Beach is an ideal spot for a quiet, reflective day by the ocean.",
                'latitude' => -4.08556,
                'longitude' => 122.661834,
                'city_id' => 57,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tanjung Kartika Beach',
                'description' => "Tanjung Kartika Beach in North Moramo is a stunning destination with clean white sand and crystal-clear waters. The vibrant green trees lining the shore create a refreshing and inviting atmosphere for visitors.\n\nThe water is so clear that you can see fish and marine plants without diving gear. At the back of the beach, tall karst rock formations form a natural circular pool, visible from above, adding a unique charm.\n\nThis beach is perfect for those who love marine beauty and serene surroundings. Whether you swim, relax, or explore the rocky landscape, Tanjung Kartika Beach offers a delightful coastal experience.",
                'latitude' => -4.08962,
                'longitude' => 122.661002,
                'city_id' => 57,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rawa Aopa Watumohai National Park',
                'description' => "Rawa Aopa Watumohai National Park in South Konawe spans 1,050 square kilometers and is a haven for wildlife. Home to 155 bird species, including 37 endemic and 32 rare ones, it’s a paradise for birdwatchers. The park also boasts 323 plant species.\n\nIts unique ecosystem blends lowland rainforests, mangroves, coastal forests, savannas, and freshwater swamps, creating a diverse and captivating landscape. This makes it an exciting destination for nature lovers and explorers.\n\nThe park offers a chance to connect with nature and discover rare wildlife. Its vast and varied terrain makes it a must-visit for those seeking an unforgettable outdoor adventure.",
                'latitude' => -4.438333,
                'longitude' => 121.873255,
                'city_id' => 57,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'California Agrotourism',
                'description' => "California Agrotourism, located in the mountainous Konda area, offers a blend of nature and fun activities. Visitors can enjoy horseback riding, archery, fishing, fruit picking, and motorbike rides, making it a versatile destination.\n\nWith a focus on nature and education, it’s perfect for families, students, or groups hosting casual gatherings. The open-air hall is great for discussions, while fresh farm produce and local food stalls add to the experience. Gazebos provide spots to relax.\n\nThis destination combines adventure, learning, and relaxation, making it ideal for a day out with loved ones or colleagues. California Agrotourism offers a refreshing escape with something for everyone.",
                'latitude' => -4.13327,
                'longitude' => 122.510185,
                'city_id' => 57,
                'category_id' => 5, // Man-made
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alebo Hill',
                'description' => "Alebo Hill in Alebo Village, Konda, is a scenic spot surrounded by lush green trees and local plantations. The hill is covered with tall grass, making it a perfect backdrop for photos or a relaxing nature escape.\n\nMany visitors come to camp and enjoy the stunning sunrise views in the morning. The peaceful setting and open landscape create a refreshing atmosphere, ideal for outdoor enthusiasts.\n\nAlebo Hill is a great destination for those seeking a calm retreat or a camping adventure. Its natural beauty and serene environment make it a must-visit for a relaxing day in Konda.",
                'latitude' => -4.116494,
                'longitude' => 122.447522,
                'city_id' => 57,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'White Sand Beach',
                'description' => "White Sand Beach in Watumelewe Village, Tinanggea, stretches 1,000 meters with soft, white sand. During low tide, the water recedes up to 200 meters, revealing a vast, beautiful shoreline surrounded by green mangroves.\n\nThe blue sea and scenic views make it a captivating spot for marine tourism. The wide beach is perfect for photography or simply enjoying the tranquil surroundings.\n\nThis destination is ideal for those seeking a peaceful coastal escape. White Sand Beach’s natural beauty and calm atmosphere make it a great spot for a relaxing day by the sea.",
                'latitude' => -4.482583,
                'longitude' => 122.297579,
                'city_id' => 57,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Popalia Mountain Peak',
                'description' => "Popalia Mountain Peak in Ranowila Village, Wolasi, is a favorite among nature lovers in Southeast Sulawesi. This challenging hike offers a rewarding escape from city life, surrounded by stunning natural beauty.\n\nThe trail may be tough, but the breathtaking views from the summit make it worthwhile. From the top, you can see endless landscapes, perfect for photos or quiet reflection.\n\nPopalia Mountain Peak is ideal for adventurers seeking a connection with nature. Its panoramic views and serene atmosphere make it a must-visit for hikers and outdoor enthusiasts.",
                'latitude' => -4.233336,
                'longitude' => 122.533333,
                'city_id' => 57,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wonua Monapa Swimming Pool',
                'description' => "Wonua Monapa Swimming Pool in Ranomeeto offers fun for all ages with two pools: one for kids and another for teens and adults. The children’s pool features slides and water jets, creating a playful environment.\n\nThe adult pool has varying depths, making it suitable for both beginners and experienced swimmers. The facility includes bathrooms, changing rooms, a restaurant, and gazebos for relaxation.\n\nThis family-friendly destination is perfect for a day of swimming and fun. With its modern amenities and welcoming atmosphere, Wonua Monapa is a great spot for a refreshing outing.",
                'latitude' => -4.055804,
                'longitude' => 122.446187,
                'city_id' => 57,
                'category_id' => 5, // Man-made
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Wakatobi (city_id: 58)
            [
                'name' => 'Hoga Island',
                'description' => "Hoga Island, located in Kaledupa District, offers a peaceful escape from city life. Its white sandy beaches, lined with swaying coconut trees, create a serene setting perfect for relaxation. The gentle sea breeze and soft waves add to the tranquil atmosphere.\n\nVisitors can unwind with family or friends, enjoying the calm surroundings after a day of diving or exploring. The island’s quiet charm makes it an ideal spot to relax and recharge away from the hustle and bustle.\n\nHoga Island is perfect for those seeking a laid-back beach getaway. Its natural beauty and soothing ambiance make it a must-visit destination in Kaledupa for a refreshing retreat.",
                'latitude' => -5.465303,
                'longitude' => 123.771107,
                'city_id' => 58,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sombu Dive',
                'description' => "Sombu Dive, located in Sombu Village, is a vibrant coastal spot marked by a large Napoleon fish statue, making it easy to find. The area features a scenic pier and Sombu Bridge, with shallow waters about 1 meter deep, perfect for swimming.\n\nThe small beach is bursting with colorful coral reefs and tropical fish, offering a stunning underwater experience. The clear waters enhance the beauty, making it ideal for snorkeling or simply enjoying the marine life from above.\n\nSombu Dive is a great destination for water lovers and families. Its vibrant ecosystem and accessible waters make it a must-visit in Sombu for a fun and relaxing day by the sea.",
                'latitude' => -5.265922,
                'longitude' => 123.519243,
                'city_id' => 58,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kontamale Water Spring',
                'description' => "Kontamale Water Spring, located in Pongo Sub-district, Wangi-Wangi, is a refreshing natural pool with clear, blue water. The cool, clean water reveals the cave’s base, creating a stunning and inviting spot for swimming or splashing around.\n\nThe main pool is spacious, ideal for visitors to swim, while a smaller pool is often used by locals for washing clothes. Remarkably, the water remains crystal-clear despite years of use, free from detergent pollution.\n\nThis serene spring is perfect for those seeking a cool, natural escape. Kontamale’s pristine waters and tranquil setting make it a must-visit in Wangi-Wangi for a refreshing day out.",
                'latitude' => -5.318102,
                'longitude' => 123.534754,
                'city_id' => 58,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Liya Togo Tourism Village',
                'description' => "Liya Togo Tourism Village, located in southern Wangi-Wangi, is a cultural gem with two historic landmarks: the Liya Fort, surrounding the village, and the Mubarok Mosque. Built in 1546, both reflect 20th-century Buton Kingdom architecture and are well-preserved.\n\nThe village offers traditional stilt-house homestays, equipped with modern comforts for a cozy stay. Visitors can immerse themselves in the village’s rich history while enjoying a comfortable and authentic experience.\n\nLiya Togo is perfect for those seeking a cultural adventure. Its historic sites and welcoming atmosphere make it a must-visit in Wangi-Wangi for a unique glimpse into local heritage.",
                'latitude' => -5.376864,
                'longitude' => 123.592576,
                'city_id' => 58,
                'category_id' => 4, // Culture
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bajo Mola Tourism Village',
                'description' => "Bajo Mola Tourism Village in Wangi-Wangi is a unique floating village of the Bajo people, built over the sea. This community relies entirely on the ocean’s resources, showcasing a fascinating way of life.\n\nVisitors can explore the Bajo’s culture, enjoy fresh seafood, and witness their commitment to preserving the marine environment. The village’s vibrant ecosystem and traditional lifestyle offer a one-of-a-kind experience.\n\nBajo Mola is perfect for those curious about unique cultures and marine life. Its floating homes and rich traditions make it a must-visit in Wangi-Wangi for an unforgettable cultural adventure.",
                'latitude' => -5.343982,
                'longitude' => 123.540176,
                'city_id' => 58,
                'category_id' => 4, // Culture
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Togo Mowondu Marina',
                'description' => "Togo Mowondu Marina in Wangi-Wangi blends modern design with natural beauty. Its scenic waterfront, comfortable pedestrian paths, and aesthetic lighting create a charming atmosphere, especially at night.\n\nThe marina is perfect for leisurely walks, relaxing by the sea, or enjoying the cool breeze. With green spaces and family-friendly facilities, it welcomes visitors of all ages.\n\nThis destination is ideal for those seeking a relaxing seaside experience. Togo Mowondu Marina’s inviting ambiance and stunning views make it a must-visit in Wangi-Wangi for a peaceful outing.",
                'latitude' => -5.321976,
                'longitude' => 123.532205,
                'city_id' => 58,
                'category_id' => 5, // Man-made
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cemara Beach',
                'description' => "Cemara Beach in Waha Village, Wangi-Wangi, is known for its shady cemara trees lining the shore, offering a cool and unique atmosphere compared to typical coconut-lined beaches. The soft sand and clear waters create a serene setting.\n\nMornings at the beach are perfect for relaxing, enjoying fresh air, and soaking in the tranquil environment. It’s an ideal spot for a peaceful start to the day or a quiet retreat.\n\nCemara Beach is perfect for those seeking a calm and shaded beach experience. Its natural beauty and refreshing vibe make it a must-visit in Wangi-Wangi.",
                'latitude' => -5.261488,
                'longitude' => 123.519977,
                'city_id' => 58,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wambuliga Beach',
                'description' => "Wambuliga Beach in Sombu Village boasts soft white sand and clear blue waters, creating a peaceful and natural setting. The wide shoreline is perfect for sunbathing, playing in the water, or enjoying the cool sea breeze.\n\nThe vibrant coral reefs, tropical fish, and anemones make snorkeling a highlight, with clear waters revealing the underwater beauty even from the surface. It’s a haven for marine enthusiasts.\n\nWambuliga Beach is ideal for those seeking relaxation or underwater exploration. Its pristine beauty and tranquil atmosphere make it a must-visit in Sombu for a delightful beach day.",
                'latitude' => -5.272398,
                'longitude' => 123.520947,
                'city_id' => 58,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rekan Dive Center',
                'description' => "Rekan Dive Center, located in Waha Village, Wangi-Wangi, is a new diving hub led by Mr. Udin. It welcomes both beginner and professional divers, offering an exciting way to explore the vibrant underwater world of Wakatobi.\n\nThe center provides access to rich marine ecosystems, with colorful corals and diverse fish species. The clear waters ensure a memorable diving experience for all skill levels.\n\nRekan Dive Center is perfect for adventure seekers and marine enthusiasts. Its professional guidance and stunning dive sites make it a must-visit in Wangi-Wangi for an unforgettable underwater adventure.",
                'latitude' => -5.260645,
                'longitude' => 123.520596,
                'city_id' => 58,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kahianga Peak',
                'description' => "Kahianga Peak, located in the traditional village of Kahianga, Tomia, is a serene escape for those seeking tranquility. Easily accessible, it offers stunning sunset views over the open sea, with orange hues painting the sky.\n\nThe gentle breeze and calm atmosphere create a peaceful setting, perfect for unwinding from daily stress. The peak’s natural beauty makes it a great spot for reflection or photography.\n\nKahianga Peak is ideal for visitors looking for a quiet retreat with breathtaking scenery. Its serene ambiance and captivating sunsets make it a must-visit in Tomia.",
                'latitude' => -5.760206,
                'longitude' => 123.942711,
                'city_id' => 58,
                'category_id' => 3, // Nature
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('destinations')->insert($data);
    }
}
