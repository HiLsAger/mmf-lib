<?php

namespace Hilsager\MmfLib\Controllers;

use Hilsager\MmfLib\Classes\Controller;

class Site extends Controller
{
    public function index()
    {
        $this->render('index');
    }
}
