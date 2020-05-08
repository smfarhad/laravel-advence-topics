<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['name'];
    public function formate()
    {

        return [
            'customer_id' => $this->id,
            'name' => $this->name,
            'created_by' => $this->user->email,
            'last_updated' => $this->updated_at->diffForHumans()
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
