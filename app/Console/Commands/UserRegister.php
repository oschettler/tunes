<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserRegister extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:register {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register a user';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        $this->info("Created user.");
    }
}
