<?php

namespace App\Models\Api;

use App\Models\ParentModel;
use Spatie\Translatable\HasTranslations;

class Product extends ParentModel
{
    use HasTranslations;

    public $translatable = ['name', 'description'];
}
