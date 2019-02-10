<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TeacherMiddleware;
use App\Message;
use App\Sent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth',TeacherMiddleware::class]);
    }

    public function test($id){
       return view("test.message_tets", compact('id'));
   }
   public function store(){
       $this->validate(\request(),['body'=>'required','title'=>'required']);
if (request("id")==0) {
  Message::create([
            'student_id'=>"0",
            'body' =>\request('body')
        ]);
}
else{
        Message::create([
            'student_id'=>\request('id'),
            'body' =>\request('body')
        ]);
}
   }
   public function index(){
       $archives=Sent::selectRaw('year(created_at) year,monthname(created_at
)month,count(*) published')
           ->groupBy('year','month')
           ->orderByRaw('min(created_at) desc')
           ->get();
       $messages=Sent::latest();
if ($month=\request('month')){
    $messages->whereMonth("created_at",Carbon::parse($month)->month);
}
if ($year=\request('year')){
    $messages->whereYear("created_at",$year);
}
$messages=$messages->paginate(5);

       return view("message.messages",compact('messages','archives'));
   }

}
