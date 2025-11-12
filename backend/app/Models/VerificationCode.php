<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    protected $fillable = [
        'email',
        'code',
        'type',
        'data',
        'expires_at'
    ];

    protected $casts = [
        'data' => 'array',
        'expires_at' => 'datetime'
    ];

    public static function create_code($email, $type = 'registration', $data = null, $expiresInMinutes = 30)
    {
        // Remove códigos antigos para este email e tipo
        self::where('email', $email)->where('type', $type)->delete();

        // Gera código aleatório de 6 caracteres (letras e números)
        $caracteres = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $codigo = '';
        for ($i = 0; $i < 6; $i++) {
            $codigo .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }

        // Cria novo código
        return self::create([
            'email' => $email,
            'code' => $codigo,
            'type' => $type,
            'data' => $data,
            'expires_at' => now()->addMinutes($expiresInMinutes)
        ]);
    }

    public static function verify_code($code, $type = 'registration')
    {
        return self::where('code', strtoupper(trim($code)))
            ->where('type', $type)
            ->where('expires_at', '>', now())
            ->first();
    }

    public static function verify_code_by_email($email, $code, $type = 'registration')
    {
        return self::where('email', $email)
            ->where('code', strtoupper(trim($code)))
            ->where('type', $type)
            ->where('expires_at', '>', now())
            ->first();
    }

    public function isExpired()
    {
        return $this->expires_at->isPast();
    }
}