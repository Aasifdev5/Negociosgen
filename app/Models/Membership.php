<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Membership extends Model
    {
        use HasFactory;

        protected $fillable = ['name', 'price', 'benefits', 'duration', 'highlight_color'];

        // Accessor to decode benefits JSON
        public function getBenefitsAttribute($value)
        {
            return json_decode($value, true);
        }

        // Mutator to encode benefits JSON
        public function setBenefitsAttribute($value)
        {
            $this->attributes['benefits'] = json_encode($value);
        }
    }
