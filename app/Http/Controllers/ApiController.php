<?php

namespace App\Http\Controllers;

use App\Traits\ImageTraitor;
use App\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    use ApiResponser;
    use ImageTraitor;

}
