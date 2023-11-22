<?php

namespace Modules\Event\Infrastructure\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'user_id',
        'is_approved',
        'status',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'event_category');
    }
}
