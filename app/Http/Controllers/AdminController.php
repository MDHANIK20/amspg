<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\location;
use App\building;
use App\Admin;
use App\role;
use Validator;
use App\role_admin;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }


    public function addLocation(){
      return view('admin.add-location');
    }
    public function storeLocation(Request $request){
        $location = new location;
        $location->state = $request->state;
        $location->city = $request->city;
        $location->location = $request->location;
        $location->pin = $request->pin;
        $location->save();
        return redirect('admin/view-location')->with('message','Location Added');
        
       
    }
    public function viewLocation(){
     $locations = location::get();
     return view('admin.view-location')->with('locations',$locations);
    }

    public function addBuilding(){
        $locations = location::get();
        $managers = admin::get();
        return view('admin.add-building')->with(['locations'=>$locations,'managers'=>$managers]);
    }

      public function storeBuilding(Request $request){
        $building = new building;
        $building->name = $request->name;
        $building->address = $request->address;
        $building->ownername = $request->ownername;
        $building->lid = $request->location;
        $building->mid = $request->manager;
        $building->save();
        return redirect('admin/view-building')->with('message','Building Added');
        
       
    }
      public function viewBuilding(){
        $Buildings = building::get();
        return view('admin.view-building')->with('buildings',$Buildings);
       }

       public function addManager(){
        $roles = role::get();
        return view('admin.add-manager')->with('roles',$roles);
      }
      public function storeManager(Request $request){
        $roles = role::get();
        $validatedData = $request->validate([
            'email' => 'required|unique:admins|max:255|email',
            'password' => 'required|min:7|max:20',
            
        ]);
       
            $manager = new admin;
            $manager->name = $request->name;
            $manager->email = $request->email;
            $manager->password=bcrypt($request->password);
            $manager->save();

            $setrole = new role_admin;
            $setrole->role_id= $request->role;
            $setrole->admin_id= $manager->id;
            $setrole->save();



        return redirect('admin/view-manager')->with('message','Manager Created');
      }

      public function viewManager(){
        $managers = admin::with('role')->get();
         return view('admin.view-manager')->with('managers',$managers);
       }
}
