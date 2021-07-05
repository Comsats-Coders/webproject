<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use Illuminate\Support\Facades\DB;
use Session;
class ProfileController extends Controller{

    function loadMyProfile(){
        $uname=Session::get('username');
        $uid = DB::select('select userID from user where userName = ?', [$uname]);
            foreach ($uid as $row){ 
            $userid = $row->userID;}
        $profileData=DB::select('select userName,profilePic,country,bio from user where userName = ?', [$uname]);
        $questionPosts = DB::select("select question,userName,profilePic,answer from qna,user where answer is not null and qna.recieverID=? and qna.recieverID=user.userID",[$userid]);
        return view('profile',['profileData'=>$profileData],['questionPosts' => $questionPosts]);}

function showOtherProfile($userName){
    $uid = DB::select('select userID from user where userName = ?', [$userName]);
    foreach ($uid as $row){ 
    $userid = $row->userID;}
    $questionPosts = DB::select("select question,userName,profilePic,answer from qna,user where answer is not null and qna.recieverID=? and qna.recieverID=user.userID",[$userid]);
    $profileData=DB::select('select userID,userName,profilePic,country,bio from user where userName = ?', [$userName]);
    
    return view('OtherProfile',['profileData'=>$profileData],['questionPosts' => $questionPosts]);}

function addQ(Request $request, $userID){
    $uname=Session::get('username');
    $uid = DB::select('select userID from user where userName = ?', [$uname]);
        //$recieverid=null;
        foreach ($uid as $row){ 
        $hostid = $row->userID;}
        $question=$request->input("qs");
    DB::insert('insert into qna (hostID,recieverID,question) values (?,?,?)', [$hostid,$userID,$question]);
    $profileData=DB::select('select userID,userName,profilePic,country,bio from user where userID = ?', [$userID]);
    return view('OtherProfile',['profileData'=>$profileData]);}
}