<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function index()
    {
        return Table::all();
    }
}
