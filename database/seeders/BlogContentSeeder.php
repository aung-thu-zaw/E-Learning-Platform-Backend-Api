<?php

namespace Database\Seeders;

use App\Models\BlogContent;
use Illuminate\Database\Seeder;

class BlogContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Tech Tips
        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => '10 Essential Keyboard Shortcuts Every Student Should Know',
            'status' => 'published',
            'thumbnail' => 'https://images.saymedia-content.com/.image/ar_16:9%2Cc_fill%2Ccs_srgb%2Cfl_progressive%2Cg_faces:center%2Cq_auto:eco%2Cw_620/MTc0NDg3MzMxMTY2NzU4NTM0/top-45-mac-keyboard-shortcuts-you-better-know.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'How to Stay Organized with Productivity Apps',
            'status' => 'published',
            'thumbnail' => 'https://miro.medium.com/v2/resize:fit:2912/1*Cv59R-kinaZ9JZwxb0w4hw.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Troubleshooting Common Tech Issues in Online Learning',
            'status' => 'published',
            'thumbnail' => 'https://sophiamavridi.com/wp-content/uploads/2020/07/IMG_7672.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'The Ultimate Guide to Effective Note-taking Apps',
            'status' => 'published',
            'thumbnail' => 'https://images.ctfassets.net/lzny33ho1g45/5iJ10OKtmYa4BZpYvhb2xw/e890aa9115b53ef2d41c9135902285a2/Best_note_taking_apps.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Mastering Online Collaboration Tools for Group Projects',
            'status' => 'published',
            'thumbnail' => 'https://filestage.io/wp-content/uploads/2019/08/Header_-Top-32-project-collaboration-tools-to-make-productivity-soa.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Enhancing Virtual Learning with Interactive Whiteboards',
            'status' => 'published',
            'thumbnail' => '',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Protecting Your Digital Identity: Cybersecurity Tips for Students',
            'status' => 'published',
            'thumbnail' => 'https://www.cybernx.com/images/blog/7-important-tips-for-protecting-your-digital-identity.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Simplifying Complex Concepts with Educational YouTube Channels',
            'status' => 'published',
            'thumbnail' => 'https://miro.medium.com/v2/resize:fit:1400/1*C_ctNTNw3h_w2yViGdZ3xg.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Harnessing the Power of Augmented Reality in Education',
            'status' => 'published',
            'thumbnail' => 'https://media.licdn.com/dms/image/D4D12AQEDOUuRD9b9TQ/article-cover_image-shrink_600_2000/0/1685701168629?e=2147483647&v=beta&t=ZAaSu10ZiEB4JhqQhnwxjH1wmSCgLfCkLWrFutvI8Wc',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'The Future of Learning: Exploring Virtual Reality Applications',
            'status' => 'published',
            'thumbnail' => 'https://vs-static.virtualspeech.com/img/blog/vr-classroom-teacher-students.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Optimizing Your Study Space: Tech Gadgets and Accessories You Need',
            'status' => 'published',
            'thumbnail' => 'https://cdn.autonomous.ai/static/upload/images/new_post/20-amazing-desk-gadgets-3504-1638801697160.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Mastering Microsoft Office: Tips and Tricks for Word, Excel, and PowerPoint',
            'status' => 'published',
            'thumbnail' => 'https://img-c.udemycdn.com/course/750x422/2743622_5add.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Digital Note-Taking vs. Pen and Paper: Pros and Cons',
            'status' => 'published',
            'thumbnail' => 'https://i.ytimg.com/vi/KL7meGSmvc4/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBu6dW_dAFLZxCXffsqO03yHnVLFg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Exploring Educational Podcasts: Learning on the Go',
            'status' => 'published',
            'thumbnail' => 'https://podcastle.ai/blog/content/images/2023/07/Educational-Podcasts.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'The Power of Digital Libraries: Accessing Resources Anywhere, Anytime',
            'status' => 'published',
            'thumbnail' => 'https://library.ceu.edu/wp-content/uploads/learn-4226965_1280-1080x675.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Introduction to Coding: Where to Start for Beginners',
            'status' => 'published',
            'thumbnail' => 'https://blog.hubspot.com/hs-fs/hubfs/how-to-start-coding-1.jpg?width=595&height=400&name=how-to-start-coding-1.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Enhancing Focus and Concentration with Tech Tools',
            'status' => 'published',
            'thumbnail' => 'https://miro.medium.com/v2/resize:fit:1024/0*UaOi0uPhqDtABqLQ.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'How to Avoid Digital Distractions While Studying Online',
            'status' => 'published',
            'thumbnail' => 'https://uploads.sarvgyan.com/news/2023/07/how-to-avoid-distraction-while-studying.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'Exploring Online Learning Platforms: Choosing the Right One for You',
            'status' => 'published',
            'thumbnail' => 'https://www.learnworlds.com/app/uploads/2023/02/best-online-learning-platforms.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 1,
            'title' => 'The Role of Artificial Intelligence in Education: Opportunities and Challenges',
            'status' => 'published',
            'thumbnail' => 'https://www.managedoutsource.com/wp-content/uploads/2023/06/artificial-intelligence-is-transforming-the-education-industry.jpg',
        ]);

        // 2. Study Hacks
        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => '5 Strategies for Beating Procrastination and Getting Things Done',
            'status' => 'published',
            'thumbnail' => 'https://plr.imgix.net/6185-overcoming-procrastination-5-tips-for-getting-things-done-1.jpg?ch=Width%2CDPR&dpr=2&ixlib=php-4.1.0&w=312&s=7f91776226047ad81eb2f79440bea861-1.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'The Pomodoro Technique: Boosting Productivity in Study Sessions',
            'status' => 'published',
            'thumbnail' => 'https://website-cdn.studysmarter.de/sites/2/uk/Pomodoro-Technique2.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'How to Create the Perfect Study Environment at Home',
            'status' => 'published',
            'thumbnail' => 'https://moinulkarim.com/wp-content/uploads/2021/05/4-5-768x433.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'Mind Mapping: Unlocking Creativity and Retention in Learning',
            'status' => 'published',
            'thumbnail' => 'https://aventislearning.com/wp-content/uploads/2020/02/Mind-Mapping.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'Effective Memory Techniques for Long-Term Retention',
            'status' => 'published',
            'thumbnail' => 'https://images.bannerbear.com/direct/4mGpW3zwpg0ZK0AxQw/requests/000/045/343/942/nE38ekNX9QnJVMraQMamprWxZ/b8748d4e6a920db1e51fe19ccf637e16d255f14f.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'Breaking Down Big Tasks: The Art of Chunking',
            'status' => 'published',
            'thumbnail' => 'https://fastercapital.com/i/Time-Management-Tips-for-Parentpreneurs--Making-the-Most-of-Your-Day--Making-the-Most-of-Your-Day-Setting-Realistic-Goals--Breaking-Them-Down-into-Manageable-Chunks.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'Overcoming Test Anxiety: Tips for Acing Exams Stress-Free',
            'status' => 'published',
            'thumbnail' => 'https://success.oregonstate.edu/sites/success.oregonstate.edu/files/LearningCorner/Images/managing_test_.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'Building a Sustainable Study Routine: Balancing Work and Rest',
            'status' => 'published',
            'thumbnail' => 'https://www.smartsheet.com/sites/default/files/styles/1300px/public/2023-05/IC-work-life-balance-benefits-c.webp?itok=OV0VylnD',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'Using Gamification to Make Learning Fun and Engaging',
            'status' => 'published',
            'thumbnail' => 'https://media.licdn.com/dms/image/D4D12AQFac0_wqwxFsA/article-cover_image-shrink_600_2000/0/1686114655908?e=2147483647&v=beta&t=4utSEq9upgZbC753XSUJbndxyzmzd9DZPRbgmBDnAOI',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'The Science of Sleep: Maximizing Brain Performance Through Rest',
            'status' => 'published',
            'thumbnail' => 'https://cdn.mos.cms.futurecdn.net/hZRkPVrx5Lt7KH6ruVGQYm-1200-80.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'Effective Time Management Strategies for Busy Students',
            'status' => 'published',
            'thumbnail' => 'https://miro.medium.com/v2/resize:fit:1080/1*xXIS_MtXJ10OL28jjoATZA.jpeg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'The Benefits of Mindfulness Meditation for Academic Success',
            'status' => 'published',
            'thumbnail' => 'https://www.krmangalamgurgaon.com/wp-content/uploads/2023/12/GetAttachmentThumbnail-63-1024x576-1920x1080.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'The Feynman Technique: A Simple Method for Learning Anything',
            'status' => 'published',
            'thumbnail' => 'https://www.tradebrains.in/wp-content/uploads/2019/02/the-feynman-technique-safal-niveshak.jpeg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'Balancing Academics and Extracurricular Activities: Tips for Success',
            'status' => 'published',
            'thumbnail' => 'https://myedge.in/blog/wp-content/uploads/2016/06/mom_1.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'The Importance of Setting SMART Goals in Education',
            'status' => 'published',
            'thumbnail' => 'https://www.thebigredgroup.com/wp-content/uploads/2022/08/image2-1-1024x613.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'How to Develop Critical Thinking Skills: Exercises and Techniques',
            'status' => 'published',
            'thumbnail' => 'https://tscfm.org/wp-content/uploads/2021/04/why-is-critical-thinking-important-1024x768.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'Building a Personal Knowledge Management System: Organize Your Learning',
            'status' => 'published',
            'thumbnail' => 'https://versoriaonline.com/wp-content/uploads/personal-knowledge-management.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'Exploring Different Learning Styles: Finding What Works for You',
            'status' => 'published',
            'thumbnail' => 'https://quuu.co/blog/wp-content/uploads/2022/11/LEARNING-STYLES.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'The Role of Creativity in Problem-Solving and Innovation',
            'status' => 'published',
            'thumbnail' => 'https://www.innovationtraining.org/wp-content/uploads/2022/05/Creative-Problem-Solving-Process.jpeg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 2,
            'title' => 'The Science of Motivation: How to Stay Inspired Throughout Your Studies',
            'status' => 'published',
            'thumbnail' => 'https://www.customwritings.com/blog/wp-content/uploads/2021/01/motivation-science.jpg',
        ]);

        // 3. Subject spotlights
        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Demystifying Calculus: Tips for Mastering Differential Equations',
            'status' => 'published',
            'thumbnail' => 'https://fastercapital.com/i/Differential-Calculus--Mastering-the-Flow-Derivative--Tips-for-Mastering-the-Flow-Derivative.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => "Exploring the World of Astrophysics: A Beginner's Guide",
            'status' => 'published',
            'thumbnail' => 'https://m.media-amazon.com/images/I/912iQ2qZMsL._AC_UF1000,1000_QL80_.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Unraveling the Mysteries of Quantum Mechanics',
            'status' => 'published',
            'thumbnail' => 'https://i.ytimg.com/vi/BtU9lTrN2MI/maxresdefault.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'The Art of Literary Analysis: Understanding Symbolism and Themes',
            'status' => 'published',
            'thumbnail' => 'https://assets.myperfectwords.com/blog/literary-analysis-essay-writing/literary-analysis-essay-topics/Literary-Analysis-Essay-Topics-10316.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Navigating the Periodic Table: Chemistry Made Easy',
            'status' => 'published',
            'thumbnail' => 'https://www.thescienceacademy.sg/wp-content/uploads/2020/06/Periodic-table-of-the-elements-used-in-O-level-chemistry-tuition.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Introduction to Computer Science: Coding Basics for Beginners',
            'status' => 'published',
            'thumbnail' => 'https://img-c.udemycdn.com/course/750x422/4978572_b8cb_3.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Understanding Microeconomics: Key Concepts Explained',
            'status' => 'published',
            'thumbnail' => 'https://www.investopedia.com/thmb/5PO0lISel7rnDv72LcNoLqgYCno=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/TermDefinitions_microeconomics-7d533d2308fa4a4d893819aa9d2ba85a.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Exploring World History Through Key Events and Figures',
            'status' => 'published',
            'thumbnail' => 'https://bookscouter.com/blog/wp-content/uploads/2022/06/All-You-Need-to-Know-about-Instructor-Edition-Textbooks-Buying-Using-and-Selling-2022-06-13T231457.284.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Anatomy and Physiology: A Comprehensive Overview',
            'status' => 'published',
            'thumbnail' => 'https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/237439912/original/7a1741fa577fba2f30827a77a0d10d68dda6e7bb/assist-in-anatomy-and-physiology-tasks.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Environmental Science Explained: Impact and Solutions',
            'status' => 'published',
            'thumbnail' => 'https://media.geeksforgeeks.org/wp-content/uploads/20230620175013/Environmental-Issues-.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Understanding Statistical Analysis: Key Concepts and Applications',
            'status' => 'published',
            'thumbnail' => 'https://fastercapital.com/i/Statistical-Analysis--Enhancing-Research-Activities-Credit-Outcomes--Key-Statistical-Concepts-and-Terminology.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Exploring Cultural Anthropology: Insights into Human Societies',
            'status' => 'published',
            'thumbnail' => 'https://anthroholic.com/wp-content/uploads/2023/05/Cultural-Anthropology.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Diving into Environmental Law: Principles and Policies',
            'status' => 'published',
            'thumbnail' => 'https://t4.ftcdn.net/jpg/06/60/23/97/360_F_660239768_fFlU3ULWJtcvcZHDdpL0AtziWut7obiC.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'The Impact of Globalization on Economics and Trade',
            'status' => 'published',
            'thumbnail' => 'https://miro.medium.com/v2/resize:fit:783/1*FENJPY-w87zjONh_SLkNGA.jpeg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Unraveling the Mysteries of Human Psychology: Introductory Concepts',
            'status' => 'published',
            'thumbnail' => 'https://englishpluspodcast.com/wp-content/uploads/2024/01/A-Very-Short-Introduction-to-Psychology.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'The Evolution of Modern Art: Movements and Masterpieces',
            'status' => 'published',
            'thumbnail' => 'https://www.danefineart.com/wp-content/uploads/2021/09/modern-art.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Exploring the World of Cryptography: History and Applications',
            'status' => 'published',
            'thumbnail' => 'https://miro.medium.com/v2/resize:fit:2000/1*2z2Pz4R-4phS9NgaJG1NVw.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Introduction to Philosophy: Major Thinkers and Philosophical Movements',
            'status' => 'published',
            'thumbnail' => 'https://bigthink.com/wp-content/uploads/2017/12/origin-121.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'The Role of Ethics in Business: Principles for Success',
            'status' => 'published',
            'thumbnail' => 'https://greatpeopleinside.com/wp-content/uploads/2020/02/business-ethics-1030x653.jpeg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 3,
            'title' => 'Exploring Robotics: Applications in Industry and Everyday Life',
            'status' => 'published',
            'thumbnail' => 'https://howtorobot.com/sites/default/files/2021-08/industrial-robot-applications-uses.jpg',
        ]);

        // 4. Career Boosters
        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Crafting the Perfect Resume: Tips for Standing Out to Employers',
            'status' => 'published',
            'thumbnail' => 'https://images.ctfassets.net/pdf29us7flmy/6UxT1UgK5KrMUQIOeOiRrx/e685484678fe6e5764cc450da81798e2/resume-format_US.png?w=720&q=100&fm=jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Mastering the Art of Networking: Building Professional Relationships',
            'status' => 'published',
            'thumbnail' => 'https://media.licdn.com/dms/image/D4D12AQEgS0nON1Y4SA/article-cover_image-shrink_720_1280/0/1690085120179?e=2147483647&v=beta&t=nWHSYmpBS0Xt_yKS51nsiNlwI5deUHs9iDpMuhpyCVs',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Navigating the Job Market: Strategies for Finding Your Dream Job',
            'status' => 'published',
            'thumbnail' => 'https://media.licdn.com/dms/image/D4D12AQFdYzH7JsQZjQ/article-cover_image-shrink_600_2000/0/1689347805821?e=2147483647&v=beta&t=IwjBHVDo75u66-cXy8Vj4Fs4tdiUrt8j0LoTu4ZyNJM',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Acing the Job Interview: Preparation and Confidence Tips',
            'status' => 'published',
            'thumbnail' => 'https://media.geeksforgeeks.org/wp-content/cdn-uploads/20230120122418/10-Best-tips-to-prepare-for-a-Job-Interview-in-2023-2.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Leveraging LinkedIn for Career Growth and Opportunities',
            'status' => 'published',
            'thumbnail' => 'https://media.licdn.com/dms/image/D4D12AQGQgqYGXxoaUQ/article-cover_image-shrink_720_1280/0/1696665348461?e=2147483647&v=beta&t=amArtwqTKnm7bh5kkSQDWpi1GSVdc0xT_BnJPUVNB8o',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'The Power of Personal Branding: Creating an Impactful Online Presence',
            'status' => 'published',
            'thumbnail' => 'https://images.squarespace-cdn.com/content/v1/643d2adbf5b08e3b88c79ef8/a06dd960-c2f1-4ef3-a399-52f4ae609ffc/BrandingPlatformChoice_RS_Gonzales_DMV.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Freelancing 101: How to Succeed as a Solo Entrepreneur',
            'status' => 'published',
            'thumbnail' => 'https://media.licdn.com/dms/image/D4D12AQGrGgzkJVDW3g/article-cover_image-shrink_720_1280/0/1680609862322?e=2147483647&v=beta&t=TloaVJAFxyc3NJ67C9W2cA9nHs4dWZV0Sguut6A6uUw',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Transitioning from College to Career: Essential Skills for Success',
            'status' => 'published',
            'thumbnail' => 'https://www.findyourwhen.com/wp-content/uploads/three-keys-to-a-successful-college-to-career-transition-img3.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Negotiating Your Salary: Tips for Getting the Compensation You Deserve',
            'status' => 'published',
            'thumbnail' => 'https://dailyarticles.co/wp-content/uploads/2022/01/pexels-karolina-grabowska-4968541.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Exploring Alternative Career Paths: Thinking Outside the Box',
            'status' => 'published',
            'thumbnail' => 'https://www.quotemaster.org/images/ff/fff9055151b87b1a6a75dff37854db4e.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Building a Professional Portfolio: Showcase Your Skills and Accomplishments',
            'status' => 'published',
            'thumbnail' => 'https://d1q3gj91a17lu.cloudfront.net/wp-content/uploads/2023/07/21124810/how-to-create-professional-portfolio-poster.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Exploring Remote Work Opportunities: Pros and Cons',
            'status' => 'published',
            'thumbnail' => 'https://bordio.com/wp-content/uploads/2022/08/Pros-of-remote-work.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Personal Finance 101: Budgeting and Saving for Future Success',
            'status' => 'published',
            'thumbnail' => 'https://media.licdn.com/dms/image/D5612AQHchytnqoGeAA/article-cover_image-shrink_720_1280/0/1680880108504?e=2147483647&v=beta&t=SsN_RUfOsESNAvgHfA21eba30BSf9docOQmA15KIQQg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Effective Communication Skills for the Workplace: Tips for Success',
            'status' => 'published',
            'thumbnail' => 'https://www.thebalancemoney.com/thmb/mp-WRJBs_fry0YhoayDf9fc4dFM=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/communication-skills-list-2063779_FINAL1-5b60d4a9c9e77c00251d3de9.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'The Importance of Continuing Education for Career Advancement',
            'status' => 'published',
            'thumbnail' => 'https://cdn.educba.com/academy/wp-content/uploads/2016/06/Career-progression.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Overcoming Imposter Syndrome: Strategies for Building Confidence',
            'status' => 'published',
            'thumbnail' => 'https://www.ccl.org/wp-content/uploads/2020/01/4-tactics-to-overcoming-impostor-syndrome-infographic-center-for-creative-leadership.png.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'The Gig Economy: How to Thrive as a Freelancer or Independent Contractor',
            'status' => 'published',
            'thumbnail' => 'https://assets-global.website-files.com/620e4101b2ce12a1a6bff0e8/645e3ce84b4045f143b5c6cf_Header_Gig%20Economy%20Meaning%2C%20causes%20and%20benefits_FEB23.webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Networking for Introverts: Building Connections in Your Own Way',
            'status' => 'published',
            'thumbnail' => 'https://www.keepmeposted.com.mt/wp-content/uploads/2023/02/Keepmeposted-Networking-for-introverts.jpeg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'Exploring Non-Traditional Career Paths: Pursuing Your Passion',
            'status' => 'published',
            'thumbnail' => 'https://media.licdn.com/dms/image/D4D12AQH28bkQQY7krw/article-cover_image-shrink_600_2000/0/1689940936981?e=2147483647&v=beta&t=Me3cNWFjI7eKKabdJTSrB0I-BgXIBEAdWjYoFA3AOQQ',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 4,
            'title' => 'The Future of Work: Trends and Predictions for Career Development',
            'status' => 'published',
            'thumbnail' => 'https://www.pearson.com/en-au/media/3ifiuyeb/trends.png',
        ]);

        // 5. Success Stories
        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => 'From Dropout to CEO: The Inspiring Journey of Sarah Martinez',
            'status' => 'published',
            'thumbnail' => 'https://cdn.canvasrebel.com/wp-content/uploads/2023/06/c-SarahMartinezMurray__THESTUDIOCO279_1687363273042.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => 'Overcoming Adversity: How John Smith Beat the Odds to Succeed',
            'status' => 'published',
            'thumbnail' => 'https://www.azquotes.com/picture-quotes/quote-win-or-lose-you-will-never-regret-working-hard-making-sacrifices-being-disciplined-or-john-smith-66-75-09.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => 'Turning Passion into Profit: The Entrepreneurial Journey of Emily Nguyen',
            'status' => 'published',
            'thumbnail' => 'https://media.licdn.com/dms/image/D5612AQEFKLjYqG69ew/article-cover_image-shrink_720_1280/0/1703224715059?e=2147483647&v=beta&t=RVGH6QVxHgVe9x11vZw8JDPcEYEgKUOTJHVfJ-IOL38',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "Breaking Barriers: James Thompson's Rise to Prominence in Renewable Energy",
            'status' => 'published',
            'thumbnail' => 'https://www.stantec.com/content/dam/stantec/images/ideas/blogs/021/reinventing-thompson-center-2-740x550.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "From Intern to Executive: Rebecca Johnson's Climb Up the Corporate Ladder",
            'status' => 'published',
            'thumbnail' => 'https://www.randjsc.com/wp-content/uploads/2017/09/Career-Ladder.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => 'Making an Impact: How David Brown is Changing the World Through Environmental Conservation',
            'status' => 'published',
            'thumbnail' => 'https://upload.wikimedia.org/wikipedia/commons/f/f8/Usstamp-save-our.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "The Power of Perseverance: Samantha Lewis's Story of Triumph Over Challenges",
            'status' => 'published',
            'thumbnail' => 'https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:705/https://www.filepicker.io/api/file/B7MZfndQPy5x2wOgcS4A',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "Empowering Others: Michael Garcia's Mission to Mentor and Inspire",
            'status' => 'published',
            'thumbnail' => 'https://www.latinosforeducation.org/wp-content/uploads/2023/08/DAVID-HENRY-Blog.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => 'Redefining Success: How Olivia Robinson Found Fulfillment Beyond Wealth',
            'status' => 'published',
            'thumbnail' => 'https://i.vimeocdn.com/video/1703338089-7ce50454fe1ba4682044dd292c91c3ca0997de72ef82a73b2e2cdf3be8cb2165-d_640?f=webp',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "Leading with Purpose: Daniel Lee's Journey to Leadership and Influence",
            'status' => 'published',
            'thumbnail' => 'https://www.mdpi.com/economies/economies-11-00036/article_deploy/html/images/economies-11-00036-g001.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "From College Dropout to Tech Innovator: Alex Chen's Story of Resilience",
            'status' => 'published',
            'thumbnail' => 'https://miro.medium.com/v2/resize:fit:1400/1*G2bR2hsTfkfxRaJL76XQlw@2x.jpeg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "Overcoming Failure: Lessons Learned from Lisa Williams's Journey to Success",
            'status' => 'published',
            'thumbnail' => 'https://media.licdn.com/dms/image/D4E12AQHsky8E4nGx4w/article-cover_image-shrink_720_1280/0/1676385847328?e=2147483647&v=beta&t=RCPBwAlPvHIyI-g5uD3ppRdMFLb4BOXpsfu5FVuQ90o',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "Empowering Women in STEM: Jessica Miller's Mission to Break Barriers",
            'status' => 'published',
            'thumbnail' => 'https://www.harrisburgu.edu/wp-content/uploads/stem-up-banner.jpg',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => 'The Power of Mentorship: How Marcus Adams Found Guidance and Inspiration',
            'status' => 'published',
            'thumbnail' => 'https://media.bizj.us/view/img/12454771/2023-mentoring-monday-hero*1200xx3600-2700-600-0.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "Building a Business from Scratch: Lauren Taylor's Entrepreneurial Journey",
            'status' => 'published',
            'thumbnail' => 'https://www.brushyourideas.com/blog/wp-content/uploads/2021/03/The-Growing-Business-of-Personalized-Products-3.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "Making a Difference in Education: Rachel Clark's Impactful Career as a Teacher",
            'status' => 'published',
            'thumbnail' => 'https://headguruteacher.files.wordpress.com/2019/01/3d_social-networking-1.jpg?w=930&h=450&crop=1',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "From Student to Scholar: Natalie White's Academic Achievements and Beyond",
            'status' => 'published',
            'thumbnail' => 'https://www.latinosforeducation.org/wp-content/uploads/2023/06/Erica-IHM.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "Finding Purpose Through Volunteering: Eric Ramirez's Story of Giving Back",
            'status' => 'published',
            'thumbnail' => 'https://www.latinosforeducation.org/wp-content/uploads/2019/09/Public-Narrative-Blog.png',
        ]);

        BlogContent::factory()->create([
            'blog_category_id' => 5,
            'title' => "Overcoming Challenges: Michelle Carter's Path to Personal and Professional Growth",
            'status' => 'published',
            'thumbnail' => 'https://www.womenonbusiness.com/wp-content/uploads/2022/12/overcome-self-doubt-reach-your-goals.png',
        ]);
    }
}
