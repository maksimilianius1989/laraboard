<?php

namespace App\Console\Commands;

use App\Entity\User;
use DomainException;
use Illuminate\Console\Command;

class RoleCommand extends Command
{

    protected $signature = 'user:role {email} {role}';

    protected $description = 'Set role for user';

    public function handle()
    {
        $email = $this->argument('email');
        $role = $this->argument('role');

        if (!$user = User::where('email', $email)->first()) {
            $this->error('Undefined user email' . $email);
        }

        try {
            $user->changeRole($role);
        } catch (DomainException $exception) {
            $this->error($exception->getMessage());
            return false;
        }

        $this->info('Role is successfully changed');
        return true;
    }
}
