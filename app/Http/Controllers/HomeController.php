<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\DB;
use Session;
class HomeController extends Controller{

    function addPost() {
        $date=date("d M D");

        $uname=Session::get('username');
        $content=Request::input('post');
        $uid = DB::select('select userID from user where userName = ?', [$uname]);
        $userid=0;
            foreach ($uid as $row){ 
                $userid = $row->userID;}
               //dd($userid);
                DB::insert('insert into post (userID,content,date) values (?,?,?)', [$userid,$content,$date]); //sqlinjection
             //   $postId=DB::select('select max(postID) from post where userID=?', [$userid]); //sqlinjection
     /*   $sendID=0;
        //dd($postId,$uid);
        $array = json_decode(json_encode($postId),true);
        
        //dd($array);       
        foreach ($array as $postID){ 
        $sendID=$postID[0];
        }
   dd($sendID);
                 //  $sendID=$maxP->postID;}
                   
                DB::insert('insert into likes (postID,userID) values (?,?)', [$postId,0]);
                  */ 
                return redirect('home');  
    }

    function updateLike($postID) {
       
        $uname=Session::get('username');
        $uid = DB::select('select userID from user where userName = ?', [$uname]);
        $userid=0;
            foreach ($uid as $row){ 
            $userid = $row->userID;} //get the userID of user who is logged in
            
                $like=DB::select('select * from likes where postID=? and userID=?',[$postID,$userid]); //get ID's of all users who have liked
                if (count($like) > 0){
                    DB::delete('delete from likes where likes.postID= ? and likes.userID=?', [$postID,$userid]); 
                }else{
                    DB::insert('insert into likes (userID,postID) values (?,?)', [$userid,$postID]);
                        
                }
                $likes=DB::select('select * from likes where postID=?',[$postID]);
                $total=count($likes);

              DB::update('update post set totalLikes=? where postID= ?', [$total,$postID]);
                return response($total);
                    }
                }
                
                 /*  if($liked->userID!==$userid && $liked->postID!==$postID){ //check if user has already like or not
                        DB::insert('insert into likes (userID,postID) values (?,?)', [$userid,$postID]); //sqlinjection add like 
                    break;
                    }else if($liked->userID!==$userid && $liked->postID==$postID){
                        DB::insert('insert into likes (userID,postID) values (?,?)', [$userid,$postID]); //sqlinjection add like 
                    break;
                    }                    
                    elseif($liked->postID==$postID && $liked->userID==$userid  ){
                    DB::delete('delete from likes where likes.postID= ? and likes.userID=?', [$postID,$userid]); //delete like
                     echo("me agaya");
                    break;
                   //  DB::insert('insert into likes (userID,postID) values (?,?)', [$userid,$postID]); //sqlinjection add like 
                 
                    }
                    // else{  
                         // DB::delete('delete from likes where likes.postID= ? and likes.userID=?', [$postID,$userid]); //delete like
                      
                }
                //break;
               // $newLikes=DB::select('select COUNT(*) from likes where postID= ?', [$postID]); //get updated likes ,count the rows and return
                
               // return response($newLikes); 
}}
*/


