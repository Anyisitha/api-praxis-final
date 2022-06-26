<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TypeContent;

class ComplementsController extends Controller {
    public function getContentTypes()
    {
        $typeContents = TypeContent::all();
        return $this->response(true, ['type' => 'success', 'content' => 'Done.'], $typeContents);
    }
}