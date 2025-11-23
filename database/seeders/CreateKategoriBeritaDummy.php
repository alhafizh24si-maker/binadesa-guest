<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateKategoriBeritaDummy extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // 100 Unique Main Categories
        $mainCategories = [
            // Teknologi & Digital
            'Artificial Intelligence', 'Machine Learning', 'Blockchain Technology', 'Cryptocurrency',
            'Internet of Things', 'Cloud Computing', 'Cybersecurity', 'Data Science', 'Big Data Analytics',
            'Software Engineering', 'Web Development', 'Mobile App Development', 'Digital Transformation',
            'Tech Startup', 'Gadget Review', 'Smart Home', 'Virtual Reality', 'Augmented Reality',
            '5G Technology', 'Quantum Computing', 'Robotics', 'Automation', 'DevOps', 'UI/UX Design',

            // Bisnis & Ekonomi
            'Economic Policy', 'Business Strategy', 'Digital Marketing', 'Social Media Marketing',
            'Content Marketing', 'Brand Management', 'Financial Technology', 'Investment Strategy',
            'Stock Market', 'Cryptocurrency Investment', 'Small Business', 'Entrepreneurship',
            'Corporate Management', 'Human Resources', 'Supply Chain Management', 'E-commerce Business',
            'Retail Innovation', 'Business Analytics', 'Market Research', 'Consumer Behavior',

            // Kesehatan
            'Public Health', 'Medical Research', 'Mental Wellness', 'Nutrition Science',
            'Fitness Training', 'Yoga & Meditation', 'Alternative Medicine', 'Preventive Healthcare',
            'Medical Technology', 'Pharmaceuticals', 'Health Insurance', 'Women Health',
            'Men Health', 'Child Health', 'Aging & Geriatrics', 'Telehealth Services',

            // Olahraga
            'Football News', 'Basketball Updates', 'Tennis Tournament', 'Swimming Sports',
            'Athletics Competition', 'Esports Gaming', 'Extreme Sports', 'Olympic Games',
            'Sports Science', 'Sports Medicine', 'Sports Business', 'Fantasy Sports',

            // Pendidikan
            'Early Childhood Education', 'Primary Education', 'Secondary Education', 'Higher Education',
            'Online Learning', 'Educational Technology', 'Curriculum Development', 'Special Education',
            'Language Learning', 'Vocational Training', 'Academic Research', 'Study Abroad',

            // Hiburan & Seni
            'Film Industry', 'Music Industry', 'Performing Arts', 'Visual Arts',
            'Digital Art', 'Photography', 'Literature', 'Poetry Writing',
            'Theater Performance', 'Dance Culture', 'Art Exhibition', 'Cultural Events',

            // Lifestyle
            'Fashion Trends', 'Beauty Tips', 'Skin Care', 'Makeup Tutorial',
            'Travel Destinations', 'Food & Dining', 'Recipe Cooking', 'Home Decor',
            'Gardening Tips', 'Pet Care', 'Relationship Advice', 'Parenting Guide',

            // Lainnya
            'Environmental News', 'Climate Change', 'Sustainable Living', 'Green Technology',
            'Social Issues', 'Community News', 'Political Analysis', 'Legal Updates',
            'Space Exploration', 'Scientific Discovery', 'Historical Research', 'Cultural Heritage'
        ];

        foreach ($mainCategories as $categoryName) {
            DB::table('kategori_berita')->insert([
                'nama' => $categoryName,
                'slug' => Str::slug($categoryName),
                'deskripsi' => $faker->sentence(12),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('100 kategori berita berhasil dibuat!');
    }
}
