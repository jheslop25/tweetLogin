<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
        protected $table = 'tweets';

        public $timestamps = false;
}
