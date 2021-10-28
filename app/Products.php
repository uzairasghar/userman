<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
        // Table Name
        protected $fillable = [
            'name', 'description', 'price'
        ];
        // Primary Key
        public $primaryKey = 'id';
        // Timestamps
        public $timestamps = true;
    
        public function user(){
            return $this->belongsTo('App\User');
        }
}
