<?php

namespace Database\Seeders;

use App\Models\LearningPath;
use Illuminate\Database\Seeder;

class LearningPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningPath::factory()->create([
            'image' => 'https://assets-global.website-files.com/606a802fcaa89bc357508cad/6070b09ef21778cd07e3b9f3_video-editor-at-work.jpeg',
            'title' => 'Start Your Freelance Video Editing Career',
            'description' => 'From defining your video editing style to streamlining your workflow to booking and navigating client projects, you’ll finish this learning path with a headstart on becoming a successful freelance video editor. Throughout these five classes, full-time editor, YouTuber, and cinematographer, Ryan Kao will walk you through the terms, techniques, and technical knowledge he wishes he knew before starting his career.',
            'materials' => 'Video editing software of choice, Pen and paper for note taking, Computer',
            'final_product' => 'Footage organization system, Editing portfolio, Client project template',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://cdn1.expresscomputer.in/wp-content/uploads/2023/09/29160907/EC_Gen_AI_09_Technology_750.jpg',
            'title' => 'Mastering Data Science and Machine Learning',
            'description' => "Dive deep into the world of data science and machine learning with this comprehensive learning path. Led by industry experts, you'll learn essential concepts, tools, and techniques for analyzing data, building predictive models, and deploying machine learning solutions in real-world scenarios.",
            'materials' => 'Python programming language, Jupyter notebook, Data visualization libraries (e.g., Matplotlib, Seaborn), Machine learning frameworks (e.g., Scikit-learn, TensorFlow)',
            'final_product' => 'Data analysis and visualization projects, Machine learning models, Deployment strategies',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://www.searchenginejournal.com/wp-content/uploads/2022/08/programmatic-advertising-1-630f56a4c8720-sej-1280x720.png',
            'title' => 'Unlocking the Secrets of Digital Marketing',
            'description' => "Discover the latest strategies and best practices for digital marketing success in this intensive learning path. From SEO and social media marketing to email campaigns and content creation, you'll gain the skills and knowledge needed to excel in today's competitive digital landscape.",
            'materials' => 'Digital marketing tools (e.g., Google Analytics, SEMrush), Content creation software (e.g., Adobe Creative Suite), Social media management platforms (e.g., Hootsuite, Buffer)',
            'final_product' => 'Marketing campaign strategies, Content calendar, Analytics dashboard',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://media.excellentwebworld.com/wp-content/uploads/2021/11/22114221/combination-of-node.js-with-react-js.jpg',
            'title' => 'Building Web Applications with React and Node.js',
            'description' => 'Learn how to build modern web applications using React.js on the frontend and Node.js on the backend. This hands-on learning path will guide you through the process of creating responsive UIs, managing state, handling user authentication, and deploying your applications to production.',
            'materials' => 'Node.js runtime environment, React.js library, Express.js framework, MongoDB database',
            'final_product' => 'Full-stack web applications, RESTful APIs, Deployment scripts',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://gritsearch.com/wp-content/uploads/2022/11/pmp-certification-og.png',
            'title' => 'Becoming a Certified Project Management Professional (PMP)',
            'description' => "Prepare for the PMP certification exam and advance your career in project management with this comprehensive learning path. Covering key concepts, methodologies, and best practices, you'll gain the knowledge and skills required to lead successful projects and teams.",
            'materials' => 'PMBOK Guide (Project Management Body of Knowledge), Project management software (e.g., Microsoft Project, Asana), Practice exam questions and simulations',
            'final_product' => 'PMP certification, Project management toolkit, Career advancement opportunities',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://miro.medium.com/v2/resize:fit:900/1*mtjwbFnS2U6LuDvciBz13g@2x.jpeg',
            'title' => 'Exploring the World of Artificial Intelligence',
            'description' => 'Delve into the fascinating field of artificial intelligence (AI) and discover its applications across various industries. From machine learning algorithms to neural networks, this learning path will equip you with the fundamentals and practical skills needed to embark on a journey into AI.',
            'materials' => 'Python programming language, TensorFlow framework, Deep learning libraries (e.g., Keras, PyTorch), Datasets for training and evaluation',
            'final_product' => ' AI-powered projects and prototypes, Research papers, Collaborative AI projects',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://financialmarketstoolkit.cliffordchance.com/content/micro-facm/en/financial-markets-resources/resources-by-type/training-and-presentations/apac-fundamentals-of-financial-markets/_jcr_content/text/image.img.jpg/1649258184334.jpg',
            'title' => 'Navigating the Fundamentals of Financial Markets',
            'description' => "Gain a comprehensive understanding of financial markets and investment strategies with this foundational learning path. From stock market basics to portfolio management techniques, you'll learn how to make informed decisions and navigate the complexities of the financial world.",
            'materials' => 'Financial market data sources (e.g., Bloomberg, Yahoo Finance), Investment analysis tools (e.g., Excel, MATLAB), Trading platforms (e.g., Robinhood, TD Ameritrade)',
            'final_product' => 'Investment portfolio, Financial analysis reports, Trading strategies',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://moonjiproduction.com/wp-content/uploads/2019/05/Moonji-Production_Production-Services-in-Myanmar_Art-of-Visual-Storytelling_Secondary-1024x576.jpg',
            'title' => 'The Art of Storytelling in Film and Television',
            'description' => "Explore the principles of storytelling in film and television and learn how to craft compelling narratives that engage and captivate audiences. Through analysis of classic and contemporary works, you'll discover the techniques used by master storytellers to evoke emotion and create memorable experiences.",
            'materials' => 'Film and television scripts, Storyboarding software (e.g., Celtx, Storyboard That), Editing software (e.g., Adobe Premiere Pro, Final Cut Pro)',
            'final_product' => 'Short film or television pilot, Storytelling portfolio, Pitch deck for original projects',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://www.skillshare.com/blog/wp-content/uploads/2023/04/RCvGdzopUEPPejwnXoXtotZg04MNZX-DLpu8T7vS7XPoMfIY_zCgOJRegGzKFxzFPPYT8NbCWgO5OYzWMxiboZo0IzXPqg1hiD4xPmC0xX0o4tgDHVCVmTCi4FDiD3QQr0EFd1STKKAsVXyVyh3W_BI.jpg',
            'title' => 'Mastering the Basics of Graphic Design',
            'description' => "Develop your creative skills and learn the fundamentals of graphic design in this hands-on learning path. From typography and color theory to layout and composition, you'll gain the knowledge and expertise needed to create visually stunning designs for print and digital media.",
            'materials' => 'Graphic design software (e.g., Adobe Illustrator, Photoshop), Design tutorials and resources, Design briefs and exercises',
            'final_product' => 'Design portfolio, Brand identity package, Client projects showcase',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://images.squarespace-cdn.com/content/v1/5e729a1e539ae951208110ff/04cf4425-668e-4eea-93d4-214b4124c869/ege+%288%29.jpg',
            'title' => 'Exploring the Science of Nutrition and Healthy Eating',
            'description' => "Dive into the science of nutrition and discover the principles of healthy eating in this informative learning path. From macronutrients and micronutrients to dietary patterns and meal planning, you'll learn how to make informed choices and adopt a balanced and sustainable approach to nutrition.",
            'materials' => 'Nutrition textbooks and journals, Food tracking apps (e.g., MyFitnessPal, Cronometer), Cooking utensils and equipment',
            'final_product' => 'Personalized nutrition plan, Recipe collection, Nutrition education materials',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://img-c.udemycdn.com/course/750x422/3653548_b5b9.jpg',
            'title' => 'Introduction to Cybersecurity and Ethical Hacking',
            'description' => "Get started in the exciting field of cybersecurity and ethical hacking with this introductory learning path. Covering topics such as network security, penetration testing, and digital forensics, you'll learn how to identify and mitigate security threats and protect against cyber attacks.",
            'materials' => 'Virtualization software (e.g., VirtualBox, VMware), Security tools (e.g., Wireshark, Nmap), Capture the Flag (CTF) challenges',
            'final_product' => 'Security audit report, Penetration testing report, Certificate of completion',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://iimtu.edu.in/blog/wp-content/uploads/2023/07/Public-speaking-1.jpg',
            'title' => 'Mastering the Art of Public Speaking',
            'description' => "Hone your communication skills and become a confident and compelling public speaker with this practical learning path. From overcoming stage fright to structuring persuasive speeches, you'll learn how to captivate audiences and deliver impactful presentations with ease.",
            'materials' => 'Public speaking books and resources, Presentation software (e.g., PowerPoint, Keynote), Video recording equipment',
            'final_product' => 'Recorded speeches and presentations, Speaker reel, Public speaking portfolio',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://miro.medium.com/v2/resize:fit:728/1*LyerURsst51ZqolG2M-nQw.jpeg',
            'title' => 'Exploring the Wonders of Space and Astronomy',
            'description' => "Embark on a journey through the cosmos and explore the wonders of space and astronomy in this fascinating learning path. From the origins of the universe to the search for extraterrestrial life, you'll discover the latest discoveries and theories in the field of astrophysics.",
            'materials' => 'Telescope, Astronomy software (e.g., Stellarium, Celestia), Astronomy textbooks and journals',
            'final_product' => 'Astrophotography images, Observational logs, Research papers',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://img.freepik.com/free-vector/mobile-app-development-isometric-background-with-composition-smartphone-screens-with-3d-app-icons-connections-vector-illustration_1284-77301.jpg?w=740&t=st=1677871112~exp=1677871712~hmac=551689a15f27db1ca842a83b6d0a162525b9be93c6fc9ead67f525fc915a4c83',
            'title' => 'The Fundamentals of User Experience (UX) Design',
            'description' => "Learn the essentials of user experience (UX) design and create intuitive and user-friendly digital products and services. From user research and wireframing to prototyping and usability testing, you'll gain the skills and knowledge needed to design effective and enjoyable user experiences.",
            'materials' => 'UX design software (e.g., Sketch, Adobe XD), Design thinking books and resources, User testing tools (e.g., UsabilityHub, UserTesting)',
            'final_product' => 'UX design portfolio, User personas and journey maps, Usability testing reports',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://images.squarespace-cdn.com/content/v1/62e7a92f066fa3730dcd4604/e1f3dd80-a5d2-4899-afa3-c86d13111995/v2-5nwh4-4drt8.jpg',
            'title' => 'Introduction to Sustainable Agriculture and Farming',
            'description' => "Discover the principles and practices of sustainable agriculture and learn how to cultivate healthy and resilient food systems. From organic farming techniques to permaculture design principles, you'll explore innovative approaches to food production that promote environmental stewardship and community resilience.",
            'materials' => 'Gardening tools and equipment, Sustainable agriculture textbooks and journals, Seeds and seedlings',
            'final_product' => 'Sustainable farm plan, Crop rotation schedule, Harvest and preservation guide',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://png.pngtree.com/thumb_back/fh260/background/20230416/pngtree-world-smile-day-smiley-face-balloon-background-image_2445767.jpg',
            'title' => 'The Psychology of Well-Being and Happiness',
            'description' => "Explore the science of happiness and well-being and learn how to cultivate a fulfilling and meaningful life. From positive psychology principles to mindfulness practices, you'll discover the factors that contribute to overall well-being and happiness.",
            'materials' => 'Positive psychology books and resources, Meditation and mindfulness apps (e.g., Headspace, Calm), Gratitude journal',
            'final_product' => 'Well-being action plan, Personalized happiness goals, Happiness journal',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://cdn.fs.teachablecdn.com/S1qsaX9VQHWw3xjv5VpB',
            'title' => 'Mastering the Fundamentals of Music Theory',
            'description' => "Develop a deep understanding of music theory and enhance your musical skills and creativity. From notation and rhythm to harmony and form, you'll learn the building blocks of music and how to apply them in composition, improvisation, and performance.",
            'materials' => 'Music theory textbooks and workbooks, Musical instruments (e.g., piano, guitar), Music notation software (e.g., Sibelius, Finale)',
            'final_product' => 'Original compositions, Music theory exercises and quizzes, Performance recordings',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://miro.medium.com/v2/resize:fit:1400/1*OF3P-NgYxkI3o4GtKUib5w.jpeg',
            'title' => 'Exploring the World of Cryptocurrency and Blockchain',
            'description' => "Dive into the revolutionary world of cryptocurrency and blockchain technology in this comprehensive learning path. From Bitcoin and Ethereum to decentralized finance (DeFi) and non-fungible tokens (NFTs), you'll learn about the latest trends and innovations in the crypto space.",
            'materials' => 'Cryptocurrency wallets (e.g., MetaMask, Ledger), Blockchain explorers (e.g., Etherscan, Blockchair), Cryptocurrency exchanges (e.g., Coinbase, Binance)',
            'final_product' => 'Cryptocurrency investment portfolio, Blockchain-based projects, NFT art collection',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://media.istockphoto.com/id/942483984/vector/green-eco-urban-city-environment-concept.jpg?s=612x612&w=0&k=20&c=257TCMAfgdMS2NFzIdt2wuxW-GKXPpoAAIr9NVx7id4=',
            'title' => 'Introduction to Environmental Science and Sustainability',
            'description' => "Gain a deeper understanding of environmental science and explore solutions to pressing environmental challenges in this informative learning path. From climate change and biodiversity loss to sustainable energy and conservation, you'll learn how to make a positive impact on the planet.",
            'materials' => 'Environmental science textbooks and journals, Sustainability documentaries and films, Environmental monitoring equipment',
            'final_product' => 'Environmental impact assessment, Sustainability action plan, Eco-friendly lifestyle guide',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://cdn.awesomepatternstudio.com/?source=aps/media/blogs/K9nebfoHd2_50.jpg&width=1600&height=900',
            'title' => 'The Art of Photography: Capturing Moments in Time',
            'description' => "Learn the art and craft of photography and unleash your creativity behind the lens. From mastering camera settings to composition techniques, you'll develop the skills and vision needed to capture stunning images and tell compelling visual stories.",
            'materials' => 'Digital or film camera, Photography tutorials and guides, Image editing software (e.g., Adobe Lightroom, Photoshop)',
            'final_product' => 'Photography portfolio, Photobook or exhibition, Photography blog or website',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://health.selfdecode.com/app/uploads/2019/11/13-Hacks-in-Keeping-a-Circadian-Rhythm-Zeitgebers.jpg',
            'title' => 'The Science of Sleep and Circadian Rhythms',
            'description' => " Explore the fascinating world of sleep science and circadian rhythms and learn how to optimize your sleep for better health and well-being. From sleep hygiene and chronobiology to sleep disorders and treatments, you'll discover the latest research and insights into the importance of sleep.",
            'materials' => 'Sleep tracking device (e.g., Fitbit, Oura Ring), Sleep diary and log, Relaxation and sleep-inducing techniques',
            'final_product' => 'Sleep improvement plan, Sleep quality assessment, Sleep research project',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://media.licdn.com/dms/image/D5612AQEmqbGGY0HEdQ/article-cover_image-shrink_600_2000/0/1664334710368?e=2147483647&v=beta&t=A-Vqh3y-7XlFen8ThRbs_VzqxM0ShGAkv5d7RnG7-dc',
            'title' => 'Mastering the Art of Negotiation and Conflict Resolution',
            'description' => "Develop essential negotiation and conflict resolution skills and learn how to navigate challenging situations with confidence and diplomacy. From communication strategies to negotiation tactics, you'll gain the knowledge and techniques needed to achieve win-win outcomes in any scenario.",
            'materials' => 'Negotiation books and resources, Conflict resolution training materials, Role-playing scenarios',
            'final_product' => 'Negotiation strategy playbook, Conflict resolution case studies, Negotiation simulation',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://media.licdn.com/dms/image/D5612AQFNyd0wwmdX0g/article-cover_image-shrink_600_2000/0/1688009281231?e=2147483647&v=beta&t=8tz1n8a9z29OmNF0sCFr70OO7-h0YkdL_0yMU7dANHQ',
            'title' => 'Exploring the World of Virtual Reality (VR) and Augmented Reality (AR)',
            'description' => "Immerse yourself in the exciting world of virtual reality (VR) and augmented reality (AR) and discover the potential of these immersive technologies. From VR gaming and entertainment to AR applications in education and industry, you'll explore the latest developments and trends in VR and AR.",
            'materials' => 'VR headset (e.g., Oculus Rift, HTC Vive), AR-enabled smartphone or tablet, VR/AR development tools (e.g., Unity, Unreal Engine)',
            'final_product' => 'VR/AR experiences, Immersive storytelling projects, VR/AR applications',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://legaldesire.com/wp-content/uploads/2020/04/Computer-Forensic.jpg',
            'title' => 'Introduction to Digital Forensics and Cyber Investigations',
            'description' => "Learn the fundamentals of digital forensics and cyber investigations and gain the skills needed to analyze digital evidence and solve cybercrimes. From forensic analysis techniques to chain of custody procedures, you'll explore the tools and methods used by digital investigators to uncover the truth.",
            'materials' => 'Digital forensics software (e.g., EnCase, FTK), Forensic hardware (e.g., write blockers, forensic imaging devices), Forensic analysis reports and case studies',
            'final_product' => 'Digital forensic investigation report, Expert witness testimony, Cybercrime prevention recommendations',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://builtin.com/sites/www.builtin.com/files/styles/og/public/2023-01/game-development-courses.jpg',
            'title' => 'Mastering the Basics of Game Development',
            'description' => "Learn the fundamentals of game development and create your own interactive experiences from scratch. From game design principles to programming languages and game engines, you'll gain the skills and knowledge needed to bring your game ideas to life.",
            'materials' => 'Game development software (e.g., Unity, Unreal Engine), Game design books and resources, Game assets and templates',
            'final_product' => 'Game prototype or demo, Game design document, Game development portfolio',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://cdn.sanity.io/images/tlr8oxjg/production/ada7e002d4675941802c42448a489b0b1b5c6854-1456x816.png?w=3840&q=80&fit=clip&auto=format',
            'title' => 'Understanding the Fundamentals of Artificial Intelligence Ethics',
            'description' => "Explore the ethical implications of artificial intelligence (AI) and learn how to develop responsible AI systems that prioritize fairness, transparency, and accountability. From bias detection algorithms to ethical design principles, you'll examine the social and ethical challenges posed by AI technology.",
            'materials' => 'AI ethics frameworks and guidelines, Case studies and scenarios, Ethical AI design tools (e.g., IBM AI Fairness 360)',
            'final_product' => 'AI ethics impact assessment, Ethical AI policy recommendations, AI ethics research paper',
            'status' => true,
        ]);

        LearningPath::factory()->create([
            'image' => 'https://cdn.mos.cms.futurecdn.net/ayTnhRypWyGEgi5zod4RAd.jpg',
            'title' => 'Introduction to Quantum Computing and Quantum Mechanics',
            'description' => "Dive into the fascinating world of quantum computing and quantum mechanics and explore the principles and applications of quantum theory. From qubits and superposition to quantum algorithms and cryptography, you'll discover the potential of quantum technologies to revolutionize computing and communication.",
            'materials' => 'Quantum computing textbooks and journals, Quantum computing simulators (e.g., Qiskit, Microsoft Quantum Development Kit), Quantum cryptography tools and protocols',
            'final_product' => 'Quantum computing project, Quantum algorithm implementation, Research paper on quantum mechanics',
            'status' => true,
        ]);
    }
}
