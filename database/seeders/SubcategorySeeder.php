<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creative Arts and Design
        Subcategory::factory()->create([
            'category_id' => 1,
            'name' => 'Graphic Design',
            'description' => "Explore the world of visual communication through digital graphics and layouts. Discover what you can create or learn about Graphic Design.",
            'image' => 'https://media.licdn.com/dms/image/C5112AQFpnxXF-u_tOw/article-cover_image-shrink_600_2000/0/1563609368824?e=2147483647&v=beta&t=9DrCnho9agCKI5Z9nFRDE9gFwg_31y0C5gkF33kht28',
            'status' => true,
        ]);
        Subcategory::factory()->create([
            'category_id' => 1,
            'name' => 'Illustration',
            'description' => "Learn the art of visual storytelling through drawing and digital illustration techniques. Discover what you can create or learn about Illustration.",
            'image' => 'https://png.pngtree.com/thumb_back/fh260/background/20190221/ourmid/pngtree-green-meadow-paper-plane-cartoon-background-rainbow-image_11718.jpg',
            'status' => true,
        ]);
        Subcategory::factory()->create([
            'category_id' => 1,
            'name' => 'Photography',
            'description' => "Master the art of capturing moments and telling stories through the lens. Discover what you can create or learn about Photography.",
            'image' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_640.jpg',
            'status' => true,
        ]);
        Subcategory::factory()->create([
            'category_id' => 1,
            'name' => 'Digital Art',
            'description' => "Dive into the realm of digital creativity, from digital painting to concept art. Discover what you can create or learn about Digital Art.",
            'image' => 'https://wallpapers.com/images/hd/digital-art-background-98hwar6swibxmlqv.jpg',
            'status' => true,
        ]);
        Subcategory::factory()->create([
            'category_id' => 1,
            'name' => 'UI/UX Design',
            'description' => "Understand the principles of user interface and user experience design for digital products. Discover what you can create or learn about UI/UX Design.",
            'image' => 'https://dreamix.eu/wp-content/uploads/2023/09/5881573-scaled-1.jpg',
            'status' => true,
        ]);
        Subcategory::factory()->create([
            'category_id' => 1,
            'name' => 'Fashion Design',
            'description' => "Unleash your creativity in the world of fashion, from sketching designs to creating garments. Discover what you can create or learn about Fashion Design.",
            'image' => 'https://media.istockphoto.com/id/1458215521/vector/line-icon-set-pattern-for-haute-couture-fashion.jpg?s=612x612&w=0&k=20&c=6WGriZvT6MeEZ0VW2-3ZPbeP0dai-u74v57bvYcCLaI=',
            'status' => true,
        ]);

        // Technology and Programming","status
        Subcategory::factory()->create([
            'category_id' => 2,
            'name' => 'Web Development',
            'description' => 'Build dynamic websites and web applications using the latest web technologies. Discover what you can create or learn about Web Development.',
            'image' => 'https://t4.ftcdn.net/jpg/02/83/46/33/360_F_283463385_mfnrx6RPU3BqObhVuVjYZjeZ5pegE7xq.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 2,
            'name' => 'Mobile App Development',
            'description' => 'Create innovative mobile applications for iOS and Android platforms. Discover what you can create or learn about Mobile App Development.',
            'image' => 'https://t4.ftcdn.net/jpg/04/04/21/61/360_F_404216128_AzxvFH2p321asyRWiGfH9G7XmqLb8zl8.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 2,
            'name' => 'Data Science',
            'description' => 'Analyze and interpret complex data to gain valuable insights and make data-driven decisions. Discover what you can create or learn about Data Science.',
            'image' => 'https://t4.ftcdn.net/jpg/04/04/21/61/360_F_404216128_AzxvFH2p321asyRWiGfH9G7XmqLb8zl8.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 2,
            'name' => 'Machine Learning and AI',
            'description' => 'Explore the frontier of artificial intelligence and machine learning algorithms. Discover what you can create or learn about Machine Learning and AI.',
            'image' => 'https://media.istockphoto.com/id/1207062970/vector/circuit-board-in-shape-electronic-brain-with-gyrus-symbol-ai-hanging-over-hand-symbol-of.jpg?s=612x612&w=0&k=20&c=I6emnhnndCzevDsCz83F-VjPx6aEo33USCZ7rLNwDgg=',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 2,
            'name' => 'Cybersecurity',
            'description' => 'protect digital systems and data from cyber threats and attacks. Discover what you can create or learn about Cybersecurity.',
            'image' => 'https://media.istockphoto.com/id/1331943958/photo/digital-cloud-security-background-concept.jpg?s=612x612&w=0&k=20&c=ktHShoivHgGcXbkgJGUpy6Q5JLYKMGsrbpY0e_4MrSc=',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 2,
            'name' => 'Blockchain Technology',
            'description' => 'Discover the revolutionary potential of blockchain technology in various industries. Discover what you can create or learn about Blockchain Technology.',
            'image' => 'https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIzLTA4L3Jhd3BpeGVsX29mZmljZV8zMF9hbl9hYnN0cmFjdF92aXN1YWxpemF0aW9uX29mX2FfYmxvY2tjaGFpbl9uZV80ZWIwODVmNC0yODFlLTRkYTMtYjdlMS00MmY1ZTFkMDkyM2VfMS5qcGc.jpg',
            'status' => true
        ]);

        // Business and Entrepreneurship","status
        Subcategory::factory()->create([
            'category_id' => 3,
            'name' => 'Startup Fundamentals',
            'description' => 'Master the essential skills and knowledge required to launch and grow a successful startup. Discover what you can create or learn about Startup Fundamental.',
            'image' => 'https://img.freepik.com/free-vector/illustration-startup-business_53876-18154.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 3,
            'name' => 'Business Strategy',
            'description' => 'Develop strategic thinking and planning skills to achieve long-term business goals. Discover what you can create or learn about Business Strategy.',
            'image' => 'https://wallpapers.com/images/hd/business-background-83br7zd1i2i2o59x.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 3,
            'name' => 'Marketing and Branding',
            'description' => ' Learn effective marketing techniques to promote products and build strong brands. Discover what you can create or learn about Marketing and Branding.',
            'image' => 'https://i.pinimg.com/originals/e9/54/a9/e954a90943691fad70f0eae6cb4cb29c.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 3,
            'name' => 'Finance and Accounting',
            'description' => 'Gain expertise in managing finances, budgeting, and financial analysis. Discover what you can create or learn about Finance and Accounting.',
            'image' => 'https://t3.ftcdn.net/jpg/02/81/48/32/360_F_281483212_fafo0892wj9fOuR6V3NOLMuXkMSWVNJ1.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 3,
            'name' => 'Project Management',
            'description' => ' Learn to efficiently plan, execute, and manage projects to achieve desired outcomes. Discover what you can create or learn about Project Management.',
            'image' => 'https://t4.ftcdn.net/jpg/04/23/21/81/360_F_423218148_3kp5rQtyakhPGDwDvZRSCjqesEylFOj9.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 3,
            'name' => 'E-commerce',
            'description' => 'Explore the world of online business and learn to build and manage successful e-commerce ventures. Discover what you can create or learn about E-commerce.',
            'image' => 'https://img.freepik.com/free-photo/arrangement-black-friday-shopping-carts-with-copy-space_23-2148667047.jpg',
            'status' => true
        ]);


        // Personal Development
        Subcategory::factory()->create([
            'category_id' => 4,
            'name' => 'Goal Setting and Productivity',
            'description' => 'Set meaningful goals and develop strategies to enhance productivity and achieve success. Discover what you can create or learn about Goal Setting and Productivity.',
            'image' => '',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 4,
            'name' => 'Time Management',
            'description' => ' Master the art of managing time effectively to maximize productivity and reduce stress. Discover what you can create or learn about Time Management.',
            'image' => 'https://www.creativefabrica.com/wp-content/uploads/2020/09/02/improve-productivity-performance-chart-Graphics-5236023-1.png',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 4,
            'name' => 'Mindfulness and Meditation',
            'description' => 'Cultivate mindfulness practices to reduce stress, enhance focus, and promote overall well-being. Discover what you can create or learn about Mindfulness and Meditation.',
            'image' => 'https://img.freepik.com/free-photo/zen-stones-balanced-beach-with-copy-space-sunrise-light-meditation-relaxation-ai-generative_123827-23551.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 4,
            'name' => 'Leadership Skills',
            'description' => ' Develop essential leadership qualities to inspire and motivate others towards common goals. Discover what you can create or learn about Leadership Skills.',
            'image' => 'https://imageio.forbes.com/specials-images/imageserve/62df7418b50fd7ef6dd194e4/10-Most-Important-Leadership-Skills-For-The-21st-Century-Workplace--And-How-To/960x0.jpg?height=532&width=711&fit=bounds',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 4,
            'name' => 'Career Development',
            'description' => 'Plan and manage your career path effectively to achieve professional growth and success. Discover what you can create or learn about Career Development.',
            'image' => 'https://blogassets.leverageedu.com/blog/wp-content/uploads/2019/09/23163958/Career-Planning-and-Development.png',
            'status' => true
        ]);


        // Lifestyle and Hobbies
        Subcategory::factory()->create([
            'category_id' => 5,
            'name' => 'Cooking and Baking',
            'description' => 'Discover the joy of cooking and baking delicious meals and treats. Discover what you can create or learn about Cooking and Baking.',
            'image' => 'https://st2.depositphotos.com/1194063/8994/i/450/depositphotos_89940720-stock-photo-colorful-spices-on-wooden-table.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 5,
            'name' => 'Fitness and Nutrition',
            'description' => 'Learn about fitness routines, nutrition plans, and healthy lifestyle choices. Discover what you can create or learn about Fitness and Nutrition.',
            'image' => 'https://t3.ftcdn.net/jpg/04/29/35/62/360_F_429356296_CVQ5LkC6Pl55kUNLqLisVKgTw9vjyif1.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 5,
            'name' => 'Yoga and Meditation',
            'description' => 'Cultivate physical and mental well-being through yoga and meditation practices. Discover what you can create or learn about Yoga and Meditation.',
            'image' => 'https://t3.ftcdn.net/jpg/06/03/89/72/360_F_603897278_Az1oNZjuHoqC32Iq7EE3sseU4hdd1b1O.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 5,
            'name' => 'DIY and Crafts',
            'description' => 'Explore your creative side with DIY projects and crafts for home decor and personal gifts. Discover what you can create or learn about DIY and Crafts.',
            'image' => 'https://t3.ftcdn.net/jpg/02/90/76/82/360_F_290768244_ubUscosPwZKybJid3cBECeMviYGGJQ43.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 5,
            'name' => 'Music and Instruments',
            'description' => ' Learn to play musical instruments or explore music theory and composition. Discover what you can create or learn about Music and Instruments.',
            'image' => 'https://img.freepik.com/premium-photo/back-music-school-concept-music-lesson-school-education-concept_192745-2032.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 5,
            'name' => 'Gardening and Plant Care',
            'description' => 'Connect with nature and learn to cultivate beautiful gardens and indoor plants. Discover what you can create or learn about Gardening and Plant Care.',
            'image' => 'https://png.pngtree.com/thumb_back/fh260/background/20220718/pngtree-fresh-gardening-tools-for-maintaining-a-lush-green-lawn-in-your-backyard-photo-image_28034040.jpg',
            'status' => true
        ]);


        // Language and Communication
        Subcategory::factory()->create([
            'category_id' => 6,
            'name' => 'English as a Second Language (ESL)',
            'description' => 'Improve your English language skills for academic, professional, or personal purposes. Discover what you can create or learn about English as a Second Language (ESL).',
            'image' => 'https://media.istockphoto.com/id/1047570732/vector/english.jpg?s=612x612&w=0&k=20&c=zgafUJxCytevU-ZRlrZlTEpw3mLlS_HQTIOHLjaSPPM=',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 6,
            'name' => 'Foreign Languages',
            'description' => 'Learn a new language or enhance your proficiency in a foreign language of your choice. Discover what you can create or learn about Foreign Languages.',
            'image' => 'https://media.istockphoto.com/id/1318495159/photo/foreign-languages-online-courses.webp?b=1&s=170667a&w=0&k=20&c=CVoTjewJ-EuHL74yjcqjYnjv3y3GSWbg4TAv9yxhDYU=',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 6,
            'name' => 'Writing and Grammar',
            'description' => ' Master the art of writing effectively and confidently, with a focus on grammar and style. Discover what you can create or learn about Writing and Grammar.',
            'image' => 'https://fluencycorp.com/wp-content/uploads/2019/01/hardest-part-learning-english.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 6,
            'name' => 'Communication Skills',
            'description' => 'Develop interpersonal communication skills for effective interaction in personal and professional settings. Discover what you can create or learn about Communication Skills.',
            'image' => 'https://wallpapers.com/images/hd/english-1600-x-900-wallpaper-vyobpv9xwkwbzvg6.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 6,
            'name' => 'Public Speaking',
            'description' => 'Overcome stage fright and become a confident and persuasive public speaker. Discover what you can create or learn about Public Speaking.',
            'image' => 'https://img.freepik.com/free-photo/corporate-businessman-giving-presentation-large-audience_53876-101865.jpg',
            'status' => true
        ]);

        Subcategory::factory()->create([
            'category_id' => 6,
            'name' => 'Storytelling Techniques',
            'description' => 'Learn the art of storytelling to engage and captivate audiences in various contexts. Discover what you can create or learn about Storytelling Techniques.',
            'image' => 'https://png.pngtree.com/background/20230612/original/pngtree-animation-kids-reading-books-picture-image_3370516.jpg',
            'status' => true
        ]);
    }
}
