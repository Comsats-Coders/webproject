$(document).ready(
    function () {
           $('form > input').keyup(myfunction).change(myfunction);
           $('#Lname,#DOB').keyup(myfunction).change(myfunction);
           $('#Fname').keyup(testFname);
           $('#Lname').keyup(testLname);
            $('#Uname').keypress(noSpace).keyup(userConstraint);
           $('#email').keypress(noSpace).keyup(email);
           $('#DOB').change(checkAge).click(checkAge);          
    })

function myfunction() {
   if ( testFname() == true && testLname() == true && userConstraint()== true && email() == true && checkAge()>=13) {
       $('#signupBtn').removeClass("disabled");
   }
   else {
       
       $('#signupBtn').addClass("disabled");

   }
}

function testFname() {
   var regex = new RegExp("^[a-zA-Z\\s]*$");
   if (regex.test($("#Fname").val())) {
       $("#nameError").html(null);
       return true;
   }
   else {
       $("#nameError").html("Alphabets allowed only");
   }
}
function testLname() {
   var regex = new RegExp("^[a-zA-Z\\s]*$");
   if (regex.test($("#Lname").val())) {
       $("#nameError2").html(null);
       return true;
   }
   else {
       $("#nameError2").html("Alphabets allowed only ");
   }
}
function userConstraint(){

   var regex=new RegExp("^[A-Za-z][0-9a-zA-Z]{4,12}$");
   var user=$("#Uname").val();
   console.log(user);
   if(user!=""){
   if(regex.test(user)){
       $("#UserError").html(null);
       return true;
       
   }else{
       $("#UserError").html("No special characters allowed, minimum length 5");
   }

}
else{
   $("#UserError").html(null);
}}

function noSpace(event)
{     if(event.which==32){
     event.preventDefault();
  }
}

function checkAge(){
    var today = new Date(); 17-06-2021
    var birthDate = new Date($("#DOB").val()); 10-01-2017
    var age = today.getFullYear() - birthDate.getFullYear(); 4
    var month = today.getMonth() - birthDate.getMonth(); 5
    console.log(age);
    console.log(month);
    if(age==13){
    if (month < 0 || (month  === 0 && today.getDate() < birthDate.getDate())) {
        console.log(age);
        console.log(month);
        age--;
        console.log(age);
        $("#dateError").html("You should be atleast 13 years old");
        return age;
    }else{
        $("#dateError").html(null);
        console.log(age);
        return age;   
    }
}
    else if (age>13){
    $("#dateError").html(null);

}
else{
    $("#dateError").html("You should be atleast 13 years old");
}
return age;
}

function email() {

   var regex = new RegExp("^([a-z0-9\.-]+)@([a-z0-9-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$");
   var email = $("#email").val();
  
       if (regex.test(email)) {
           $("#emailError").html(null);
           return true;

       } else {
           $("#emailError").html("Email should be valid");
       }

   }
   


$("#form").submit(
   function (e) {
       e.preventDefault();
   });