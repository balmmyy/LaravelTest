<?php
class MemberController extends BaseController {
	
	public function get($item)
	{
		$dbs = new DBconnect();
		$doc = $dbs->find($item);

		if($doc) {
			return Response::json($doc);
		}else{
			$doc = $dbs->where('memberName',$item);
			if(isset($doc->get()[0])){
				return Response::json($doc->get());
			}else{
				return Response::json(array('message'=>'not found'));
			}
		}
	}

	public function getAll()
	{
		$dbs = new DBconnect();
		$rd = DB::collection($dbs->getTable())->get();
		return Response::json($rd);
	}
	
	public function add()
	{

		$post = Input::get();
		//remove csrf token
		if(array_key_exists('_token', $post)){
			unset($post['_token']);
		}
		$dbs = new DBconnect();
		if($dbs->insert($post)){
			return Response::json(array('message'=>'success'));
		}else{
			return Response::json(array('message'=>'error'));
		}



	}
	
	public function edit($item)
	{
		$dbs = new DBconnect();
		$doc = $dbs->find($item);

		$post = Input::get();

		//remove csrf token
		if(array_key_exists('_token', $post)){
			unset($post['_token']);
		}

		Eloquent::unguard();

		if($doc) {
			if($doc->update($post)){
				return Response::json(array('message'=>'success'));
			}else{
				return Response::json(array('message'=>'error'));
			}
		}else{
			$doc = $dbs->where('memberName',$item);
			if(isset($doc->get()[0])){
				if($doc->update($post)){
					return Response::json(array('message'=>'success'));
				}else{
					return Response::json(array('message'=>'error'));
				}
			}else{
				return Response::json(array('message'=>'not found'));
			}
		}


	}
	
	public function delete($item)
	{
		$dbs = new DBconnect();
		$doc = $dbs->find($item);

		if($doc) {
			if($doc->delete()){
				return Response::json(array('message'=>'success'));
			}else{
				return Response::json(array('message'=>'error'));
			}
		}else{
			$doc = $dbs->where('memberName',$item);
			if(isset($doc->get()[0])){
				if($doc->delete()){
					return Response::json(array('message'=>'success'));
				}else{
					return Response::json(array('message'=>'error'));
				}
			}else{
				return Response::json(array('message'=>'not found'));
			}
		}


	}

}
