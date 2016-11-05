<?php
/**
 * PageController
 *
 * @package 7agagner
 * @subpackage controllers
 */

use Facebook\FacebookRedirectLoginHelper;

class PageController extends Controller
{
	public function __construct(){
		$helper = new FacebookRedirectLoginHelper(route(''));
		$fbUrlConnect = $helper->getLoginUrl();
		parent::__construct();
	}

	public function home(){
		return view('home', compact('fbUrlConnect'));
	}

	public function add(){
		return view('pages/add');
	}

	public function compare(){
		return view('pages/compare');
	}

	public function contact(){
		return view('pages/contact');
	}

	public function vote(){
		return view('pages/vote');
	}
}
