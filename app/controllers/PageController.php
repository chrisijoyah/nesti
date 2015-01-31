<?php

class PageController extends BaseController {

	public function getPage($page)
	{
		return View::make('pages.'.$page);
	}
}