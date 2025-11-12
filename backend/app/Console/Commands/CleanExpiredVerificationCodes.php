<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VerificationCode;

class CleanExpiredVerificationCodes extends Command
{
    protected $signature = 'verification:clean';
    protected $description = 'Remove códigos de verificação expirados';

    public function handle()
    {
        $deleted = VerificationCode::where('expires_at', '<', now())->delete();
        
        $this->info("Removidos $deleted códigos expirados.");
        
        return Command::SUCCESS;
    }
}