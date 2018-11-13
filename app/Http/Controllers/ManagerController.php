<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\building;
use auth;
use Illuminate\Support\Facades\DB;
use App\room;
use App\User;
use App\booking;
use App\userDetails;
use App\rent;
use Illuminate\Mail\Mailer;
use Mail;
use App\expenses;
use PDF;


class ManagerController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('manager');
        
      
    }


    public function index()
    {
        
        return view('manager.dashboard');
    }
    public function AddRoom(Request $request){
        $id = Auth::user()->id;
        $Buildings = building::where('mid',"=",$id)->get();
        
        return view('manager/add-room')->with('buildings', $Buildings);
    }

    public function SaveRoom(Request $request){
        $room =   new room;
        $room->rno = $request->rno;
        $room->seats = $request->seats;
        $room->bid = $request->bid;
        $room->save();
        return redirect('manager.view-room')->with('message', 'Room Added');

    }
    public function ViewRoom(){
        $id = Auth::user()->id;
        $Buildings = building::where('mid',"=",$id)->first();
        $bid= $Buildings->id;
        $rooms = room::where('bid',"=",$bid)->get();
        return view('manager/view-room')->with('rooms', $rooms);

    }
    

    public function addUser(){
        $users=user::get();
        $id = Auth::user()->id;
        $Buildings = building::where('mid',"=",$id)->first();
        $bid= $Buildings->id;
        $rooms = room::where('bid',"=",$bid)->get();
        foreach ($rooms as $room ) {
            $rid = $room['id'];
        }
      
        return view('manager/add-user')->with(['users'=>$users, 'buildings'=>$Buildings,'rooms'=>$rooms]);
    }

    public function getSeat(Request $request){
      
      $rid= $request->rid;
      $rooms = room::where('id',"=",$rid)->get();
     $bookings = booking::where('rid','=',$rid)->get();
     $view = view('manager/getSeat')->with(['rooms'=>$rooms,'bookings'=>$bookings])->render();
     return response()->json(array('success' => true, 'html'=>$view));
     
    }
    public function Saveuser(Request $request){

        $adduser =   new userDetails;
        $adduser->cid = $request->cid;
        $adduser->bid=$request->bid;
        $adduser->fname=$request->fname;
        $adduser->dob=$request->dob;
        $adduser->mob=$request->mob;
        $adduser->state=$request->state;
        $adduser->city=$request->city;
        $adduser->add=$request->add;
        $adduser->rid=$request->rid;
        $adduser->sno=$request->sno;
        $adduser->doj=$request->doj;
        $adduser->rent=$request->rent;
        $adduser->security=$request->security;
        $adduser->adcno=$request->adcno;
        $adduser->doctype=$request->doctype;
        $adduser->idno=$request->idno;
        $adduser->save();

        $booking =   new booking;
        $booking->rid = $request->rid;
        $booking->sno = $request->sno;
        $booking->cid = $adduser->id;
        $booking->save();

        return redirect('manager/view-user')->with('message','User Added');
    }

    public function viewUser(){
        
        $userdata = user::get();
        $users = userDetails::get();
        return view('manager/view-user')->with(['users'=>$users, 'userdata'=>$userdata,'rooms'=>$rooms]);
    }

    public function addRent(){
        $userdata = user::get();
        $users = userDetails::get();
        $rand = mt_rand(10000, 99999);
        $date =  now();
        $dateDay = date_format($date, 'd');
        $dateMon = date_format($date, 'm');
        $dateYr = date_format($date, 'Y');
        $rcptId =  $dateYr.$dateMon.$dateDay.$rand;
        

        return view('manager/add-rent')->with(['users'=>$users,'userdata'=>$userdata,'rcptId'=>$rcptId]);
    }

    public function getUserDetails(Request $request){
        $cid= $request->cid;
        $totalPaidrent=0;
        $users = userDetails::where('cid','=',$cid)->first();
        $date =  now();
        $dateMon = date_format($date, 'm');
        $rents = rent::where('cid','=',$cid)->get();
        foreach ($rents as $rent) {
                $paydate = strtotime($rent->paydate);
                $PayMon = date("m", $paydate);
                    if($dateMon==$PayMon){
                        $totalPaidrent += $rent->amtpaid;
                    }
                    
        }
        $totalPaidrent;
        $monthrent= $users->rent;
        $payableAmount = $monthrent-$totalPaidrent;
        $rooms = room::where('id','=',$users->rid)->first();
        
       $view = view('manager/getUserDetails')->with(['users'=>$users,'payableAmount'=>$payableAmount,'room'=>$rooms ])->render();
       return response()->json(array('success' => true, 'html'=>$view));
       
      }
      public function StoreRent(Request $request){
            $userdata = user::where('id','=',$request->cid)->first();
            $addrent = new rent;
            $addrent->cid = $request->cid;
            $addrent->paydate = $request->paydate;
            $addrent->rcpid = $request->rcpid;
            $addrent->amtpaid = $request->amtpaid;
            $addrent->paymode = $request->paymode;
            $addrent->balance =$request->balance;
            $addrent->cmnt = $request->cmnt;
            $addrent->rid = $request->rid;
            $addrent->mid = Auth::user()->id;
            $addrent->save();
           

         
            $data = [
                    'cid' => $request->cid,
                    'paydate' => $request->paydate,
                    'rcpid' => $request->rcpid,
                    'amtpaid' => $request->amtpaid,
                    'paymode' => $request->paymode,
                    'balance' => $request->balance,
                    'cmnt' => $request->cmnt,
                    'rid' => $request->rid,
                    'useremail'=>$userdata->email,
                    'username'=>$userdata->name
                 ];
            Mail::send('Rentmail',$data,function($message)use($userdata){
                $message->to($userdata->email,'To'.$userdata->name.'')->subject('Rent Receipt From AMS Accommodation');
                $message->from('query@amspgindia.com', 'From AMS Accommodation ');
            });

             return redirect('manager/view-rent')->with('Message', 'Rent Added and Email send to user EmailId');

      }
   
    public function viewRent(){
        
          $rents = rent::get();
          $userdata = user::get();
          return view('manager/view-rent')->with(['rents'=>$rents,'userdata'=>$userdata]);
      }
      public function rentStatement(){
        $users=user::get();
        return view('manager/rent-statement')->with('users',$users);
      }
    
      public function getRentStatement(Request $request){
        $cid= $request->cid;
        $rents = rent::where('cid','=',$cid)->get();
        $view = view('manager/get-rent-statement')->with(['rents'=>$rents ])->render();
        return response()->json(array('success'=>true, 'html'=>$view));

      }
      public function daybook(){
        $userdata = user::get();
        $today = date("Y-m-d");
        $rents = rent::where('paydate','=',$today)->get();
        $expenses = expenses::where('date','=',$today)->get();
        return view('manager/daybook')->with(['rents'=>$rents,'userdata'=>$userdata,'expenses'=>$expenses]);
      }
      
      
      public function addExpenses(){
        $mid = Auth::user()->id;
        return  view('manager/add-expenses')->with('mid',$mid);
      }
      public function saveExpenses(Request $request){
        
        $expenses = new expenses;
        $expenses->discription = $request->discription;
        $expenses->amount = $request->amount;
        $expenses->mid = $request->mid;
        $expenses->date = $request->date;
        $expenses->save();
        return redirect ('manager/daybook')->with('message','Expenses Added on DayBook');
      }

    public function monthBook(){
        $income=null;
        $expens[]=null;
        $userdata = user::get();
        $date =  now();
        $dateMon = date_format($date, 'm');
        $currManager= Auth::user()->id;
        $rents = rent::where('mid','=',$currManager)->get();
        foreach ($rents as $rent) {
                $paydate = strtotime($rent->paydate);
                $PayMon = date("m", $paydate);
                    if($dateMon==$PayMon){
                        $income[]= $rent;
                    }
        }
        
        $expenses = expenses::where('mid','=',$currManager)->get();
        foreach ($expenses as $expense) {
            $expdate = strtotime($expense->date);
            $ExpMon = date("m", $expdate);
                if($dateMon==$ExpMon){
                    $expens[] = $expense;
                }
        }
        
      return view('manager/monthly-report')->with(['incomes'=>$income,'userdata'=>$userdata,'expens'=>$expens]);
    }
    public function viewReceipt(Request $request){
        $id = $request->id;
        $recipts =DB::table("rents")->where('id','=',$id)->get();
   
      
     return view('manager/view-receipt')->with('recipts',$recipts);    
    }
    public function downloadReceipt($id){
        $recipts =DB::table("rents")->where('id','=',$id)->first();
        $pdf = PDF::loadView('manager/download-receipt',['recipts'=>$recipts]);     
        return $pdf->download($recipts->rcpid.'.pdf');
    }
    

   
}
