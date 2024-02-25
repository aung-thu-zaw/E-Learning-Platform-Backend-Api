<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Graphic Design
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 1, 'name' => 'Design Principles']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 1, 'name' => 'Typography']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 1, 'name' => 'Adobe Illustrator']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 1, 'name' => 'Adobe Photoshop']);

        // Illustration
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 2, 'name' => 'Digital Illustration']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 2, 'name' => 'Character Design']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 2, 'name' => 'Storyboarding']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 2, 'name' => 'Concept Art']);

        // Photography
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 3, 'name' => 'DSLR Photography']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 3, 'name' => 'Photo Editing']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 3, 'name' => 'Lighting Techniques']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 3, 'name' => 'Composition']);

        // Digital Art
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 4, 'name' => ' Digital Drawing']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 4, 'name' => 'Digital Sculpting']);

        // UI/UX Design
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 5, 'name' => 'Digital Painting']);

        // Fashion Design
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 6, 'name' => 'Fashion Illustration']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 6, 'name' => 'Pattern Makin']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 6, 'name' => 'Sewing Techniques']);
        Tag::factory()->create(['category_id' => 1, 'subcategory_id' => 6, 'name' => 'Fashion Styling']);

        // Web Development
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 7, 'name' => 'HTML']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 7, 'name' => 'CSS']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 7, 'name' => 'JavaScript']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 7, 'name' => 'Responsive Design']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 7, 'name' => 'Frontend Frameworks']);

        // Mobile App Development
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 8, 'name' => 'iOS Development']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 8, 'name' => 'Android Development']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 8, 'name' => 'React Native']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 8, 'name' => 'Flutter']);

        // Data Science
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 9, 'name' => 'Data Analysis']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 9, 'name' => 'Machine Learning']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 9, 'name' => 'Data Visualization']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 9, 'name' => 'Python']);

        // Machine Learning and AI
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 10, 'name' => 'Neural Networks']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 10, 'name' => 'Deep Learning']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 10, 'name' => 'Natural Language Processing']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 10, 'name' => 'TensorFlow']);

        // Cybersecurity
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 11, 'name' => 'Ethical Hacking']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 11, 'name' => 'Network Security']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 11, 'name' => 'Penetration Testing']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 11, 'name' => 'Cryptography']);

        // Blockchain Technology
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 12, 'name' => 'Ethereum']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 12, 'name' => 'Smart Contracts']);
        Tag::factory()->create(['category_id' => 2, 'subcategory_id' => 12, 'name' => 'Solidity']);

        //         Startup Fundamentals
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 13, 'name' => 'Business Model Canvas']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 13, 'name' => 'Lean Startup Methodology']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 13, 'name' => 'Pitching']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 13, 'name' => 'MVP Development']);

        // Business Strategy
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 14, 'name' => 'Strategic Planning']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 14, 'name' => 'Competitive Analysis']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 14, 'name' => 'SWOT Analysis']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 14, 'name' => 'Business Development']);

        // Marketing and Branding
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 15, 'name' => 'Digital Marketing']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 15, 'name' => 'Social Media Marketing']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 15, 'name' => 'Brand Identity']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 15, 'name' => 'Content Marketing']);

        // Finance and Accounting
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 16, 'name' => 'Financial Modeling']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 16, 'name' => 'Budgeting']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 16, 'name' => 'Cash Flow Management']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 16, 'name' => 'Accounting Principles']);

        // Project Management
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 17, 'name' => 'Agile Methodology']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 17, 'name' => 'Scrum']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 17, 'name' => 'Kanban']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 17, 'name' => 'Project Planning']);

        // E-commerce
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 18, 'name' => 'Shopify']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 18, 'name' => 'WooCommerce']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 18, 'name' => 'Dropshipping']);
        Tag::factory()->create(['category_id' => 3, 'subcategory_id' => 18, 'name' => 'Online Marketing']);

        // Goal Setting and Productivity
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 19, 'name' => 'Time Management']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 19, 'name' => 'Goal Setting Techniques']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 19, 'name' => 'Personal Effectiveness']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 19, 'name' => 'Task Prioritization']);

        // Time Management
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 20, 'name' => 'Time Blocking']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 20, 'name' => 'Pomodoro Technique']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 20, 'name' => 'Eisenhower Matrix']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 20, 'name' => 'Productivity Tools']);

        // Mindfulness and Meditation
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 21, 'name' => 'Mindfulness Practices']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 21, 'name' => 'Meditation Techniques']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 21, 'name' => 'Stress Reduction']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 21, 'name' => 'Mindful Breathing']);

        // Leadership Skills
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 22, 'name' => 'Emotional Intelligence']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 22, 'name' => 'Team Building']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 22, 'name' => 'Decision Making']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 22, 'name' => 'Conflict Resolution']);

        // Career Development
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 23, 'name' => 'Resume Writing']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 23, 'name' => 'Job Search Strategies']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 23, 'name' => 'Interview Preparation']);
        Tag::factory()->create(['category_id' => 4, 'subcategory_id' => 23, 'name' => 'Networking Skills']);

        // Cooking and Baking
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 24, 'name' => 'Culinary Techniques']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 24, 'name' => 'Baking Essentials']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 24, 'name' => 'International Cuisine']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 24, 'name' => 'Pastry Arts']);

        // Fitness and Nutrition
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 25, 'name' => 'Workout Plans']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 25, 'name' => 'Nutrition Basics']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 25, 'name' => 'Healthy Eating Habits']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 25, 'name' => 'Weight Management']);

        // Yoga and Meditation
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 26, 'name' => 'Yoga Poses']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 26, 'name' => 'Meditation Practices']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 26, 'name' => 'Mind-Body Connection']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 26, 'name' => 'Yoga Philosophy']);

        //  DIY and Craft
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 27, 'name' => 'Crafting Techniques']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 27, 'name' => 'DIY Projects']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 27, 'name' => 'Upcycling']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 27, 'name' => 'Handmade Gifts']);

        // Music and Instruments
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 28, 'name' => 'Instrumental Techniques']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 28, 'name' => 'Music Theory']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 28, 'name' => 'Songwriting']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 28, 'name' => 'Music Production']);

        // Gardening and Plant Care
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 29, 'name' => 'Gardening Basics']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 29, 'name' => 'Plant Propagation']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 29, 'name' => 'Indoor Gardening']);
        Tag::factory()->create(['category_id' => 5, 'subcategory_id' => 29, 'name' => 'Sustainable Gardening']);

        //         English as a Second Language (ESL)
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 30, 'name' => 'English Grammar']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 30, 'name' => 'Vocabulary Buildin']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 30, 'name' => 'Pronunciation']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 30, 'name' => 'Conversation Skills']);

        // Foreign Languages
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 31, 'name' => 'Language Learning Strategies']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 31, 'name' => 'Language Proficiency Tests']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 31, 'name' => 'Cultural Awareness']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 31, 'name' => 'Language Immersion']);

        // Writing and Grammar
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 32, 'name' => 'Creative Writing']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 32, 'name' => 'Grammar Rules']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 32, 'name' => 'Editing Techniques']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 32, 'name' => 'Writing Styles']);

        // Communication Skills
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 33, 'name' => 'Effective Communication']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 33, 'name' => 'Active Listening']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 33, 'name' => 'Nonverbal Communication']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 33, 'name' => 'Public Speaking']);

        // Public Speaking
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 34, 'name' => 'Speech Writing']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 34, 'name' => 'Presentation Skills']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 34, 'name' => 'Overcoming Stage Fright']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 34, 'name' => 'Persuasive Speaking']);

        // Storytelling Techniques
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 35, 'name' => ' Narrative Structure']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 35, 'name' => 'Character Development']);
        Tag::factory()->create(['category_id' => 6, 'subcategory_id' => 35, 'name' => 'Story Arcs']);
    }
}
