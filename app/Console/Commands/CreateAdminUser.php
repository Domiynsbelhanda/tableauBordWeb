<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $matricule = $this->ask('Entrer le matricule');
        $password = $this->secret('Entrer le mot de passe');

        $admin = new Admin([
            'matricule' => $matricule,
            'password' => Hash::make($password),
        ]);

        $admin->save();

        $this->info('Un Administrateur a été crée.');
    }
}
