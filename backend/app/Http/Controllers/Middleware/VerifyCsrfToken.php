<?php
// ...existing code...
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        '*', // ou o caminho da sua rota
    ];
}
// ...existing code...