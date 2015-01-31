<?php

class InboxController extends BaseController {

	public function index()
	{
		$user = Auth::user();

		$messages = Auth::user()->messages;
		
		return View::make('inbox.index', array(
			'messages' => $messages,
		));
	}
}