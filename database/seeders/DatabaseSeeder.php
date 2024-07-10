<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Issue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $issues = [
            'Protecting Women’s Safe Spaces & Sports Integrity (NO MEN IN WOMENS SPORTS OR BATHROOMS!!)',
            'Protecting the Statutory PFD (Balance the budget by increasing revenue & decreasing expenses)',
            'Election Integrity (implement all the great changes we’ve made in the MSB elections at the State level)',
            'Tougher on Crime (specifically sex offenders & drug traffickers)',
            'Defending the Second Amendment',
            'Protecting the Unborn',
            'Backing the Blue & Law Enforcement',
            'Returning State Lands to the MSB Borough & other Boroughs for so they can be auctioned to Residents to help keep housing affordable',
            'Protecting Parents\' Rights in School Choice & Education',
            'Stricter Wildlife Regulations for Non-Alaskans (we must prioritize Residents!!)',
            'Responsible Resource Development & Revenue Generation so we can increase the PFD',
            'Revival of the Timber Industry (increase revenue for larger PFD & prevent costly wildfires)',
        ];

        foreach ($issues as $issue) {
            Issue::create([
                'description' => $issue,
            ]);
        }
    }
}
