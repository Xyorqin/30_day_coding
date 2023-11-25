<?php

namespace App\Models\Api;

use App\Models\ParentModel;
use Spatie\Translatable\HasTranslations;

class Category extends ParentModel
{
    use HasTranslations;

    public $translatable = ['name'];
}
