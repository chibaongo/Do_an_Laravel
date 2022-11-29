<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelDB;
class AdminController extends Controller{
    protected $model;

    protected $perPage = 10;
    protected $table;

    protected $dataForeign;

    protected $view;
    protected $data;
    function __construct()
    {
        $this->view = 'admin.screen.';
    }
}
