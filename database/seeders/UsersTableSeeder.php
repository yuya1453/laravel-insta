<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    private $user;

    /**
     * Run the database seeds.
     */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function run(): void
    {
        $this->user->name       = 'The Admin';
        $this->user->email      = 'admin@admin.com';
        $this->user->password   = Hash::make('admin12345');
        $this->user->role_id    = 1;
        $this->user->created_at = now();
        $this->user->updated_at = now();
        $this->user->save();
    }
}