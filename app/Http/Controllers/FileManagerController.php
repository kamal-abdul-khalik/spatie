<?php

namespace App\Http\Controllers;

use App\Authorizable;

class FileManagerController extends Controller
{

    use Authorizable;

    public function show()
    {
        return view('admin.lfm.image');
    }
}
