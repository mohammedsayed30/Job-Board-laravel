<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    /**
     * this function used to filter the results by the tags
     */
    public function scopeFilter($query, array $filters)
    {
        // filter based on the search
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%'.$filters['search'].'%')
                ->orwhere('description', 'like', '%'.$filters['search'].'%')
                ->orwhere('tags', 'like', '%'.$filters['search'].'%')
                ->orwhere('company', 'like', '%'.$filters['search'].'%')
                ->orwhere('location', 'like', '%'.$filters['search'].'%');
        }
        // filter based on the tags
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%'.$filters['tag'].'%');
        }
        // filter based on the tags
        if ($filters['user_id'] ?? false) {
            $query->where('user_id', 'like', '%'.$filters['user_id'].'%');
        }
    }

    // relationship with user
    public function user()
    {
        // many  listings belong  to one user
        return $this->belongsTo(User::class, 'user_id');
    }
}
