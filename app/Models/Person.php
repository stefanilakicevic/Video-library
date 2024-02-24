<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'surname', 'b_date'];

    public function films(): BelongsToMany {
        return $this->belongsToMany(Film::class);
    }  

    protected function fullName(): Attribute{
        return Attribute::make(
            get: fn () => ($this->name . " " . $this->surname)
            ,
        );
    }
}
