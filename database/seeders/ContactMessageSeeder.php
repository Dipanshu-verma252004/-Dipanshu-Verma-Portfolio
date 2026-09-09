<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Rohit Sharma',
                'email' => 'rohit@example.com',
                'subject' => 'Inventory system enquiry',
                'message' => 'Hi Dipanshu, we are looking for a Laravel developer to build an inventory management system for our warehouse. Can we schedule a call?',
                'status' => 'new',
                'read_at' => null,
                'replied_at' => null,
            ],
            [
                'name' => 'Anita Deshmukh',
                'email' => 'anita@example.com',
                'subject' => 'Pathology module question',
                'message' => 'We would like to know more about the reporting features in the pathology management system you built for our lab.',
                'status' => 'read',
                'read_at' => '2025-06-01 11:20:00',
                'replied_at' => null,
            ],
        ];

        foreach ($messages as $message) {
            ContactMessage::query()->updateOrCreate(
                ['email' => $message['email'], 'subject' => $message['subject']],
                $message,
            );
        }
    }
}
