<?php

class AdminController extends BaseController {

	public function index()
	{
		return View::make('admin/dashboard');
	}

	public function usuarios()
	{
		return View::make('admin/usuarios');
	}

	public function doctores()
	{
		return View::make('admin/doctores');
	}
}