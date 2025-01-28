<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \App\Models\Listing;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $user=\App\Models\User::factory()->create([
            'name'=>'klay',
            'email'=>'klay@gmail.com',
         ]);
         Listing::create([
            'id' => 1,
            'user_id'=>$user->id,
            'title' => 'Senior Software Engineer',
            'tags' => 'PHP, Laravel, JavaScript, Vue.js, MySQL',
            'company' => 'TechCorp Inc.',
            'location' => 'San Francisco, CA',
            'email' => 'careers@techcorp.com',
            'website' => 'https://www.techcorp.com',
            'description' => 'We are looking for a Senior Software Engineer with expertise in PHP, Laravel, and modern JavaScript frameworks. You will work on building scalable web applications and collaborating with cross-functional teams.',
            'created_at' => '2023-10-01 12:00:00',
            'updated_at' => '2023-10-01 12:00:00',
         ]);

                // Job 1: Backend Developer
        Listing::create([
            'id' => 2,
            'user_id'=>$user->id,
            'title' => 'Backend Developer',
            'tags' => 'Python, Django, REST APIs, Docker',
            'company' => 'API Masters',
            'location' => 'Austin, TX',
            'email' => 'careers@apimasters.com',
            'website' => 'https://www.apimasters.com',
            'description' => 'We are looking for a Backend Developer with expertise in Python and Django. You will design and implement RESTful APIs and work with Docker for containerization.',
            'created_at' => '2023-10-04 10:00:00',
            'updated_at' => '2023-10-04 10:00:00',
        ]);

        // Job 2: Frontend Developer
        Listing::create([
            'id' => 3,
            'user_id'=>$user->id,
            'title' => 'Frontend Developer',
            'tags' => 'React, TypeScript, Redux, CSS',
            'company' => 'UI Innovators',
            'location' => 'Seattle, WA',
            'email' => 'jobs@uiinnovators.com',
            'website' => 'https://www.uiinnovators.com',
            'description' => 'We are hiring a Frontend Developer with experience in React and TypeScript. You will build responsive and user-friendly interfaces for our web applications.',
            'created_at' => '2023-10-05 11:00:00',
            'updated_at' => '2023-10-05 11:00:00',
        ]);

        // Job 3: DevOps Engineer
        Listing::create([
            'id' => 4,
            'user_id'=>$user->id,
            'title' => 'DevOps Engineer',
            'tags' => 'AWS, Kubernetes, Terraform, CI/CD',
            'company' => 'CloudOps Solutions',
            'location' => 'Remote',
            'email' => 'hr@cloudops.com',
            'website' => 'https://www.cloudops.com',
            'description' => 'We are seeking a DevOps Engineer with expertise in AWS, Kubernetes, and Terraform. You will manage our CI/CD pipelines and ensure smooth deployments.',
            'created_at' => '2023-10-06 12:00:00',
            'updated_at' => '2023-10-06 12:00:00',
        ]);

        // Job 4: Mobile App Developer
        Listing::create([
            'id' => 5,
            'user_id'=>$user->id,
            'title' => 'Mobile App Developer',
            'tags' => 'Flutter, Dart, Firebase, REST APIs',
            'company' => 'AppCraft Studios',
            'location' => 'Chicago, IL',
            'email' => 'careers@appcraft.com',
            'website' => 'https://www.appcraft.com',
            'description' => 'We are looking for a Mobile App Developer with experience in Flutter and Dart. You will build cross-platform mobile applications and integrate with REST APIs.',
            'created_at' => '2023-10-07 13:00:00',
            'updated_at' => '2023-10-07 13:00:00',
        ]);
        // Job 6: Full-Stack Developer
        Listing::create([
            'id' => 6,
            'user_id'=>$user->id,
            'title' => 'Full-Stack Developer',
            'tags' => 'React, Node.js, MongoDB, GraphQL',
            'company' => 'CodeCrafters Inc.',
            'location' => 'Los Angeles, CA',
            'email' => 'careers@codecrafters.com',
            'website' => 'https://www.codecrafters.com',
            'description' => 'We are looking for a Full-Stack Developer with expertise in React, Node.js, and MongoDB. You will work on building scalable web applications and APIs.',
            'created_at' => '2023-10-08 09:00:00',
            'updated_at' => '2023-10-08 09:00:00',
        ]);

        // Job 7: Data Engineer
        Listing::create([
            'id' => 7,
            'user_id'=>$user->id,
            'title' => 'Data Engineer',
            'tags' => 'Python, SQL, Apache Spark, AWS',
            'company' => 'DataFlow Solutions',
            'location' => 'Boston, MA',
            'email' => 'jobs@dataflow.com',
            'website' => 'https://www.dataflow.com',
            'description' => 'We are hiring a Data Engineer with experience in Python, SQL, and Apache Spark. You will design and maintain data pipelines and work with large datasets.',
            'created_at' => '2023-10-09 10:00:00',
            'updated_at' => '2023-10-09 10:00:00',
        ]);

        // Job 8: Machine Learning Engineer
        Listing::create([
            'id' => 8,
            'user_id'=>$user->id,
            'title' => 'Machine Learning Engineer',
            'tags' => 'Python, TensorFlow, PyTorch, AWS',
            'company' => 'AI Innovators',
            'location' => 'San Jose, CA',
            'email' => 'careers@aiinnovators.com',
            'website' => 'https://www.aiinnovators.com',
            'description' => 'We are seeking a Machine Learning Engineer with expertise in Python, TensorFlow, and PyTorch. You will develop and deploy machine learning models.',
            'created_at' => '2023-10-10 11:00:00',
            'updated_at' => '2023-10-10 11:00:00',
        ]);

        // Job 9: Cloud Solutions Architect
        Listing::create([
            'id' => 9,
            'user_id'=>$user->id,
            'title' => 'Cloud Solutions Architect',
            'tags' => 'AWS, Azure, Google Cloud, Terraform',
            'company' => 'CloudMasters LLC',
            'location' => 'Remote',
            'email' => 'hr@cloudmasters.com',
            'website' => 'https://www.cloudmasters.com',
            'description' => 'We are looking for a Cloud Solutions Architect with expertise in AWS, Azure, and Google Cloud. You will design and implement cloud infrastructure solutions.',
            'created_at' => '2023-10-11 12:00:00',
            'updated_at' => '2023-10-11 12:00:00',
        ]);

        // Job 10: QA Automation Engineer
        Listing::create([
            'id' => 10,
            'user_id'=>$user->id,
            'title' => 'QA Automation Engineer',
            'tags' => 'Selenium, Java, Jenkins, API Testing',
            'company' => 'Testify Solutions',
            'location' => 'Dallas, TX',
            'email' => 'careers@testify.com',
            'website' => 'https://www.testify.com',
            'description' => 'We are hiring a QA Automation Engineer with experience in Selenium, Java, and Jenkins. You will design and execute automated test scripts for web applications.',
            'created_at' => '2023-10-12 13:00:00',
            'updated_at' => '2023-10-12 13:00:00',
        ]);
    }
}
