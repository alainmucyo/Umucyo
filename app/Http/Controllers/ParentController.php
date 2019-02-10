<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Sent;
use App\Mark;
use App\Lesson;
use App\Message;
use App\Period;
use App\Total;
class ParentController extends Controller
{
    public function index()
    {
    	
    	if (request("number")==null) {
    			return array(
    		"message"=>"Please Enter Phone Number"
    	);
    	}
    	$student=Student::where("contact",request("number"))->get()->count();
    
    	if ($student==0) {
    		return array(
    		"message"=>"Phone Contact Entered Is Not Found. Please Make Sure The Phone Number You Are Entering Is Registered At The School Where Your Student Studies."
    	);
    	}
    	else{

    		return array(
    			"message"=>"ok",
    			"name"=>Student::where("contact",request("number"))->first()->fname,
                "id"=>Student::where("contact",request("number"))->first()->id
    		);
    }
    
    	}
        public function student(){
            $id=request("id");
            $student=Student::find($id);
            $period=Period::get()->first;
            $term="";
           if (Period::get()->first()->term==1) {
                $term="First Term";
           }
           else if (Period::get()->first()->term==2) {
               $term="Second Term";
           }
           else{
            $term="Third Term";
           }
        $lessons=Student::find($id)->room->lessons;
        $sum=0;
        $sum2=0;
        $sum_lesson=0;
         foreach ($lessons as $lesson) {
            $total=$lesson->totals->where("student_id",$id)->pluck("total")->sum();
            $sum_lesson +=$lesson->hours*10;
            if ($total !=0) {
                $sum += round(($lesson->totals->where("student_id",$id)->pluck("marks")->sum()/$total)*$lesson->hours*10,2);
            }
          
             
         }
          foreach ($lessons as $lesson) {
            $total=$lesson->marks->where("student_id",$id)->pluck("total")->sum();
            
            if ($total !=0) {
                $sum2 += round(($lesson->marks->where("student_id",$id)->pluck("marks")->sum()/$total)*$lesson->hours*10,2);
            }
          
             
         }
       //  echo $total_marks= round((($sum/3)+$sum2/3)/2,2);
         $total_sum=$sum+$sum2;
         $total_marks= round(100*$total_sum/($sum_lesson*2),2);
           return array(
                "name"=>$student->fname,
                "room"=>$student->room->class,
                "level"=>$student->room->level->name,
                "mother"=>$student->mother,
                "father"=>$student->father,
                "contact"=>$student->contact,
                "address"=>$student->address,
                "gender"=>$student->gender ? "Male":"Female",
                "term"=>"Total Marks=$total_marks%\n".Period::get()->first()->year." ".$term
 
            ); 
            
        }
        public function sent(){           
        
            Sent::create([
            "title"=>request("title"),
            "message"=>request("message"),
            "student_id"=>request("id")
           ]);
           
            return "Message Sent  Successfully";

        }
        public function quiz($id){
         $lessons=Student::find($id)->room->lessons;
        
         $both=array();
        $sum=0;
         foreach ($lessons as $lesson) {
            $total=$lesson->marks->where("student_id",$id)->pluck("total")->sum();
            if ($total !=0) {
                 $sum +=round(($lesson->marks->where("student_id",$id)->pluck("marks")->sum()/$total)*100,2);
            }else{
                $sum +=0;
            }
          
            if ($total !=0) {
                array_push($both, $lesson->name.": ".round(($lesson->marks->where("student_id",$id)->pluck("marks")->sum()/$total)*100,2)."%");
            }
            else{
                array_push($both, $lesson->name.": No Quiz");
            }
             
         }
         $b=0;
         $num_total=0;
         $i=0;

         foreach ($both as $result) {
            $num_total +=1;

         }
          $percent=round($sum/$num_total,2)."%";
         for ($i=0; $i <$num_total ; $i++) { 
            echo $both[$b++]."\n";
         }
          $num_total;
         echo "\n  Total: ".$percent;      
         
            }
   public function exam($id){
          $lessons=Student::find($id)->room->lessons;
        
         $both=array();
        $sum=0;
         foreach ($lessons as $lesson) {
            $total=$lesson->totals->where("student_id",$id)->pluck("total")->sum();
            if ($total !=0) {
             
            $sum += round(($lesson->totals->where("student_id",$id)->pluck("marks")->sum()/$total)*100,2);
        }else{
            $sum +=0;
        }
            if ($total !=0) {
                array_push($both, $lesson->name.": ".round(($lesson->totals->where("student_id",$id)->pluck("marks")->sum()/$total)*100,2)."%");
            }
            else{
                array_push($both, $lesson->name.": No Exam");
            }
             
         }
        
         $results=array("result"=>$both);
         $res_arr=array();
        $num_total=0;
         $i=0;
         $b=0;
         foreach ($both as $result) {
            $num_total +=1;

         }
         $percent=round($sum/$num_total,2)."%";
         for ($i=0; $i <$num_total ; $i++) { 
            echo $both[$b++]."\n";
         } 
         echo "\n  Total: ".$percent;      
            }
            public function messages($id){
                Message::where("student_id",$id)->orWhere("student_id",0)->where("status",0)->update(["status"=>1]);
                $messages=Message::where("student_id",$id)->orWhere("student_id",0)->get();
                return array("results"=>$messages);
            }
            public function noty($id){
                $messages=Message::where("student_id",$id)->where("status",0)->orWhere("student_id",0)->where("status",0)->get();
                if ($messages->count()) {
                     return array("result"=>"ok");
                }
               
            } 

        
    }

