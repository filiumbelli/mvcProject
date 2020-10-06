<?php
include_once APPROOT  . '/helpers/url_helper.php';
include_once APPROOT . '/helpers/session_helper.php';

class PagesController extends Controller
{
    private $products;
    public function __construct()
    {
        $this->users = $this->model('Your Model');
    }
    public function index()
    {
        $this->view('pages/index');
    }
}
