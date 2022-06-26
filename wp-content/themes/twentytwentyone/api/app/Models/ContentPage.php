<?php

namespace App\Models;

require dirname(__DIR__) . "/Models/TypeContent.php";
require dirname(__DIR__) . "/Models/Page.php";
require dirname(__DIR__) . "/Models/Status.php";

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeContent;
use App\Models\Page;
use App\Models\Status;

class ContentPage extends Model
{
    use HasFactory;

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function type_content()
    {
        return $this->belongsTo(TypeContent::class);
    }
}
