<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class NewsletterSubscriber extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * @return array<string>
     */
    public function toSearchableArray(): array
    {
        return [
            'email' => $this->email,
        ];
    }
}
