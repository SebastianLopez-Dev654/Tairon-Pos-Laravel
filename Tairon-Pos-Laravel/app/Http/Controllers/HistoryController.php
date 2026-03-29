<?php

namespace App\Http\Controllers;

use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        return History::latest()->get();
    }
}