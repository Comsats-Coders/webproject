<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use Illuminate\Support\Facades\DB;
use Session;
class UserController extends Controller
{
    function login()
    {
        return view('login');
    }
    function signup()
    {
        return view('signup');
    }

    function settings()
    {
        return view('settings');
    }
    function changePass()
    {
        return view('changePass');
    }
  function home()
    {
        return view('home');
    }
    function explore()
    { 
        $resultsData = DB::select(DB::raw("select userName,profilePic,bio from user"));
        return view('explore',['resultsData' => $resultsData]);
       
    }

    function exploreSearch(Request $request)
    {  
        $searchTerm= $request->input('search');
        $resultsData = DB::select(DB::raw("select userName,profilePic,bio from user where userName like '$searchTerm%'"));
        return view('explore',['resultsData' => $resultsData]);
    }
    function profile()
    {
        return view('profile');
    }

    function emailCheck(Request $request)
    {
        $email= $request->input('email');
        $emailCheck = DB::select('select email from user where email=?',[$email]);
        if (count($emailCheck) > 0) {
                Session::put('email',$email);
                return redirect('forgot2');
                } 
        else {
                 $error = 'Email is not registered. ';
                 return view('forgot')->with('error', $error);
                }
            }

    function forgot()
    {
        return view('forgot');
    }
    function forgot2()
    {
        return view('forgot2');
    }
    function sendCode(Request $request){
      //  dd("hi im here");
       $code= '123456';
       $email=Session::get('email');
       $userCode= $request->input('userCode');
       if($userCode==$code){
        return redirect('forgot3');
       }
       else{
        $error = "Invalid code!";
        return view('forgot2')->with('error', $error);
       }
    }function forgot3(){
        return view('forgot3');
    }

    function store(Request $request)
    {
        $firstName = $request->input('Fname');
        $lastName = $request->input('Lname');
        $uname = $request->input('Uname');
        $pass = $request->input('password');
        $dob = $request->input('dob');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $country = $request->input('country');
        $profilePic = $request->file('pic2');
        $picName = $profilePic->getClientOriginalName();
        $picType = $profilePic->getClientOriginalExtension();
        $picSize = $profilePic->getSize();
        $profilePic->move('images', $picName);
        $destination = 'images/' . $picName;
        // $profilePic="Flogo.png";

        //DB::unprepared("insert into users (username,password) values ('$uname','$pass')");
        DB::insert('insert into user (userName,firstName,lastName,email,password,dob,country,gender,profilePic) values (?,?,?,?,?,?,?,?,?)', [$uname, $firstName, $lastName, $email, $pass, $dob, $country, $gender, $destination]); //sqlinjection
        return redirect('/login');
        //statements server side validation  , if email,username alreay registered
    }

    function loginCheck(Request $request)
    {
        $uname = $request->input('Uname');
        $pass = $request->input('password');

        $loginData = DB::select('select password from user where userName = ?', [$uname]);

        if (count($loginData) > 0) {
            foreach ($loginData as $tablepass) {
                if (($tablepass->password) == $pass) {
                    Session::put('username', $uname);
                    return redirect('home');
                } else {
                    $error = 'Password does not match';
                    return view('login')->with('error', $error);
                }
            }
        }
        //return redirect('login');
    }
    function deactivate()
    {
        $userName = Session::get('username');
        DB::delete('delete from user where userName= ?', [$userName]);
        return view('login');
    }

    function updatePass(Request $request)
    {
        $uname = Session::get('username');
        $pass = $request->input('current');
        $new = $request->input('new');
        $loginData = DB::select('select password from user where userName = ?', [$uname]);
        if (count($loginData) > 0) {
            foreach ($loginData as $tablepass) {
                if (($tablepass->password) == $pass) {
                    if (($tablepass->password) != $new) {
                        DB::update('update user set password=? where userName= ?', [$new, $uname]);
                        return redirect('login');
                    } else {
                        $error = 'You have recently used this password.';
                        return view('changePass')->with('error', $error);
                    }
                } else {
                    $error = 'Current password is incorrect';
                    return view('changePass')->with('error', $error);
                }
            }
        }
    }
    function logOut()
    {
        Session::forget('username');
        return view('login');
    }
    function xmlhttprequest()
    {
        $searchTerm = request('search');
        if (strlen($searchTerm) > 0) {
            $searchResults = DB::select(DB::raw("select userName,profilePic,bio from user where userName like '$searchTerm%'"));
            return response($searchResults);
        }
    }

    function loadHome()
    {
        $uname = Session::get('username');
        $uid = DB::select('select userID from user where userName = ?', [$uname]);
        $userid = null;
        foreach ($uid as $row) {
            $userid = $row->userID;
        }
        if ($userid != null) {
           
            $searchResults = DB::select("select postID,content,userName,date,profilePic,totalLikes from post,user where post.userID=user.userID");
            $questionPosts = DB::select("select question,userName,profilePic,answer from qna,user where answer is not null and qna.recieverID=user.userID");
            $likedPosts = DB::select("select postID from likes where likes.userID=?", [$userid]);
             $myProfile= DB::select("select userName,bio,profilePic from user where userID=?",[$userid]);
            //dd($likedPosts);
            return view('home',  array ('searchResults' => $searchResults, 'questionPosts' => $questionPosts,'likedPosts' => $likedPosts,'myProfile'=> $myProfile));
        } else {
            return view('login');
        }
    }


    function Answer()
    {
        $uname = Session::get('username');
        $uid = DB::select('select userID from user where userName = ?', [$uname]);
        $userid = null;
        foreach ($uid as $row) {
            $userid = $row->userID;
        }
        if ($userid != null) {
            $questions = DB::select("select questionID,question from qna where recieverID=? and answer is null", [$userid]);
            // dd($questions);
            return view('Answer', ['questions' => $questions]);
        } else {
            return view('login');
        }
    }

    function fillAnswer(Request $request, $questionID)
    {
        $answer = $request->input('answer');
        DB::update('update qna set answer=? where questionID=?', [$answer, $questionID]);
        $uname = Session::get('username');
        $uid = DB::select('select userID from user where userName = ?', [$uname]);
        $userid = null;
        foreach ($uid as $row) {
            $userid = $row->userID;
        }
        $questions = DB::select("select questionID,question from qna where recieverID=? and answer is null", [$userid]);
        return view('Answer', ['questions' => $questions]);
    }

    function delQs($questionID)
    {
        DB::delete('delete from qna where questionID= ?', [$questionID]);
        $uname = Session::get('username');
        $uid = DB::select('select userID from user where userName = ?', [$uname]);
        $userid = null;
        foreach ($uid as $row) {
            $userid = $row->userID;
        }
        $questions = DB::select("select questionID,question from qna where recieverID=? and answer is null", [$userid]);
        return view('Answer', ['questions' => $questions]);
    }
    function updateUser(Request $request)
    {
        $uname = Session::get('username');
        $firstname = $request->input('name1');
        $lastname = $request->input('name2');
        $unamenew = $request->input('uname');
        $dob = $request->input('dob');
        $email = $request->input('email');
        $bio = $request->input('bio');
        DB::update("update user set firstName=?, lastName=? , email=?, dob=?, bio=?  where userName=?", [$firstname, $lastname, $email, $dob, $bio, $uname]);
        return redirect('/profile');
    }


    function loadSettings(Request $request)
    {
        $uname = Session::get('username');
        $uid = DB::select('select userID from user where userName = ?', [$uname]);
        $userid = null;
        foreach ($uid as $row) {
            $userid = $row->userID;
        }
        if ($userid != null) {
            $searchResults = DB::select("select firstName,lastName,userName,email,dob,bio from user where userName=?", [$uname]);


            return view('settings', ['searchResults' => $searchResults]);
        } else {
            return view('login');
        }
    }
    function resetPass(Request $request)
    {
        $email= Session::get('email');
        $pass = $request->input('password');
        DB::update('update user set password=? where email= ?', [$pass,$email]);
        Session::forget('email');  
        return redirect('login');
          
        }
    
}
