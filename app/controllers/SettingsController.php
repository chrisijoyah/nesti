<?php

class SettingsController extends BaseController {

	public function index()
	{
		return View::make('dashboard.settings.index');
	}
}