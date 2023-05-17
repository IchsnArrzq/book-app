<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'title',
        'publication_year',
        'writer',
        'stock'
    ];

    public function getRouteKeyName(): string
    {
        if ($this->isApi()) {
            return 'code';
        } else {
            return 'id';
        }
    }
    private function isApi(): bool
    {
        $route = request()->route();
        return $route && str()->startsWith($route->getPrefix(), 'api');
    }
}
