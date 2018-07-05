<?php

namespace App\Console\Commands;

use App\Entity\User;
use App\UseCases\Auth\RegisterService;
use DomainException;
use Illuminate\Console\Command;

class UserVerifyCommand extends Command
{
    protected $signature = 'user:verify {email}';

    protected $description = 'Verify user email';

    private $service;

    public function __construct(RegisterService $registerService)
    {
        parent::__construct();
        $this->service = $registerService;
    }

    public function handle()
    {
        $email = $this->argument('email');

        if (!$user = User::where('email', $email)->first()) {
            $this->error('Undefined user email ' . $email);
            return false;
        }

        try {
            $this->service->verify($user->id);
        } catch (DomainException $exception) {
            $this->error($exception->getMessage());
            return false;
        }

        $this->info('User is successfully verified');
        return true;
    }
}
