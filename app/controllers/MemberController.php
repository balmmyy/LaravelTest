<?php
class MemberController extends BaseController {
	
	public $form = array(
		'memberName'   => 'name',
		'memberAge'    => 'age',
		'memberStatus' => 'status'
	);
	
	public function home()
	{
		$dbs = new DBconnect();
		
		$rd = DB::collection($dbs->getTable())->get();
		
		return View::make('home', array(
			'member' => $rd
		));
	}
	
	public function add()
	{
		if (Request::isMethod('post')){
			$post = Input::get();
			//remove csrf token
			if(array_key_exists('_token', $post)){
				unset($post['_token']);
			}
			$dbs = new DBconnect();
			$dbs->insert($post);

			return Redirect::route('home');
		}else{
			//go to form page
			return View::make('form', array(
				'heading' => 'Add New Member',
				'form' => $this->form
			));
		}

	}
	
	public function edit($id)
	{
		$dbs = new DBconnect();
		$doc = $dbs->find($id);

		if (Request::isMethod('post')){
			$post = Input::get();

			//remove csrf token
			if(array_key_exists('_token', $post)){
				unset($post['_token']);
			}
			
			Eloquent::unguard();
			$doc->update($post);

			return Redirect::route('home');
		}else{
			//go to form page
			return View::make('form', array(
				'heading' => 'Edit Member',
				'form' => $this->setData($this->form, $doc->getAttributes())
			));
		}

	}
	
	public function delete($id)
	{
		$dbs = new DBconnect();
		$doc = $dbs->find($id);
		if($doc){
			$doc->delete();
		}
		return Redirect::route('home');
	}
	
	public function setData($form, $data)
	{

		$form['nameValue'] = $data['memberName'];
		$form['ageValue'] = $data['memberAge'];
		$form['statusValue'] = $data['memberStatus'];
		
		return $form;
	}
}