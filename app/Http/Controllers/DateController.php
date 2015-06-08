<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DateController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		return View::make('inventory.home', array('equipment' => Date::all())); //may have problems depend on view setup
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postCreate(){
		$input = Input::all();
		$input['date'] = date('Y-m-d', $input['date']);
		$validate = Date::validate($input);
		if($validate -> fails()){
			return Response::json(array('status' => 400, 'messages' => 'input validation failed', 'error' => $validate -> messages()), 400);
		}
		else{
			try{
				$date = Date::create($input);
				//$this->layout->content = View::make('inventory.equipmentForm', array('status' => 201, 'message' => 'Equipment Added Successfully'));
			}
			catch(Exception $e){
				//$this->layout->content = View::make('inventory.equipmentForm', array('status' => 400, 'message' => 'Failed to add Eqipment', 'error' => $e));
			}
	}

	/**
	*
	*
	*/
	public function getDelete($id){
		try{
			$date = Date::find($id);
			$reservations = Reservation::where('date_id', '=', $id);
			foreach ($reservations as $reserve){
				$reserve->delete()
			}
			$date -> delete();
			
		}
		catch(Exception $e){
			//return Redirect::back()->with('message', 'Entry Not Found')->with('alert', 'danger');
		}
		//return Redirect::back()->with('message', 'Entry Deleted')->with('alert', 'success');
	}


    /**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id){
		$input = Input::all();
		$validate = Equipment::validate($input);
		if($validate -> fails()){
			return Redirect::back()->with('message', 'Input Error')->with('alert', 'danger');
		}
		else{
			try{
				$equipment = Equipment::findOrFail($id);
				$equipment -> update($input);
			}
			catch(Exception $e){
				//return Redirect::back()->with('message', 'Equipment not Found')->with('alert', 'danger');
			}
		}
		//return Redirect::back()->with('message', 'Entry Update')->with('alert', 'sucess');
	}

	/**
	*
	*/
	public function missingMethod($parameters = array()){
		return Response::json(array('status' => 404, 'message' => 'Not found'), 404);
	}

}
