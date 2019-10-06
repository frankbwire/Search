<!--==Author (c)frankline_bwire==-->

<!--=====REGISTER PATIENT=====-->
<h1 style="font-weight:bolder">iSearch</h1>

<?php
include 'db.php';
//variable declaration
$pid='';
$fname='';
$mname='';
$lname='';
$dob='';
$email='';
$phone='';
$age='';
$address='';
$city='';
$idno='';
$gender='';

    //get values
if(isset($_POST['register'])){
$pid=mysqli_real_escape_string($connect,$_POST['pid']);    
$fname=mysqli_real_escape_string($connect,$_POST['fname']); 
$mname=mysqli_real_escape_string($connect,$_POST['mname']);
$lname=mysqli_real_escape_string($connect,$_POST['lname']);
$dob=mysqli_real_escape_string($connect,$_POST['dob']);
$email=mysqli_real_escape_string($connect,$_POST['email']);
$phone=mysqli_real_escape_string($connect,$_POST['phone']);
$age=mysqli_real_escape_string($connect,$_POST['age']);
$address=mysqli_real_escape_string($connect,$_POST['address']);
$city=mysqli_real_escape_string($connect,$_POST['city']);
$idno=mysqli_real_escape_string($connect,$_POST['idno']);
$gender=mysqli_real_escape_string($connect,$_POST['gender']);
    //emergency contacts
$ename=mysqli_real_escape_string($connect,$_POST['ename']);
$rel=mysqli_real_escape_string($connect,$_POST['rel']);
$ephone=mysqli_real_escape_string($connect,$_POST['ephone']);
$eidno=mysqli_real_escape_string($connect,$_POST['eidno']);
$egender=mysqli_real_escape_string($connect,$_POST['egender']);
    //post to database
$sql="INSERT into patients (patient_id,first_name,middle_name,last_name,patient_dob,patient_email,patient_phone,patient_age,patient_address,patient_city,id_number,patient_gender) VALUES('$pid','$fname','$mname','$lname','$dob','$email','$phone','$age','$address','$city','$idno','$gender')";
$query=mysqli_query($connect,$sql);
    if(!$query){
        echo "query failed" . mysqli_error($connect);
    }
$sql2="insert into emergency_contacts (patient_id,kin_name,relationship,kin_phone,kin_id,kin_gender) values('$pid','$ename','$rel','$ephone','$eidno','$egender') ";
    $query2=mysqli_query($connect,$sql2);
    if(!$query2){
        echo "query 2 failed" . mysqli_error($connect);
    }
    echo "<p style='color:#20c997'>Records Added Successfully</p>";
}

?>
<!--==Author (c)frankline_bwire==-->
<form class="row tracking_form" action="register.php" method="post" novalidate="novalidate" style="margin-left:50px;padding-left:15%;padding-right:15%">
                    <div class="col-md-11 form-group" id="form-title">
                        <p style="background-color: #20c997; font-weight: bold; text-align: center">Patient information</p>
                    </div>
                    <div class="col-md-12 form-group" style="padding-bottom: 15px; ">
                        <!--bill no-->
                        <label for="customerid">Patient ID:</label>
                        <input type="text" name="pid" value="N-<?php echo(rand(10000,99990)) ?>" readonly>
                        <!--date function-->
                        <label for="date" style="margin-left:20px">Date:</label>
                        <input type="text" id="date" name="email" placeholder="Current Date" value="<?php print date("m/d/y G.i:s");  ?>" readonly>
                    </div>
                    <div class="col-md-12 form-group" style="padding-left:50px; padding-bottom: 15px">
                        <!--first name-->
                        <input type="text" id="fname" name="fname" placeholder="First Name" style="width: 25%" required>
                        <!--middle name-->
                        <input type="text" id="mname" name="mname" placeholder="Middle Name" style="margin-left: 50px; width:25%" required>
                        <!--last name-->
                        <input type="text" id="fname" name="lname" placeholder="Last Name" style="margin-left: 50px; width: 25%" required>
                    </div>
                    <div class="col-md-12 form-group" style="padding-left:50px; padding-bottom: 15px">
                        <!--email-->
                        <input type="email" id="email" name="email" placeholder="Email Address" style="width: 40%" required>
                        <!--phone number-->
                        <input type="text" id="phone" name="phone" placeholder="Phone Number" style="width: 40%; margin-left: 50px" required>
                    </div>
                    <div class="col-md-12 form-group" style="padding-left:50px; padding-bottom: 15px">

                        <!--id number-->
                        <input type="text" id="idno" name="idno" placeholder="ID Number" style="width: 40%" required>
                    </div>
                    <div class="col-md-12 form-group" style="padding-left:50px; padding-bottom: 15px">
                        <!--age-->
                        <input type="text" id="age" name="age" placeholder="Age" style="width: 25%" required>
                        <!--dob-->
                        <input type="date" id="dob" name="dob" placeholder="dob" style="width: 25%;margin-left: 50px" required>
                        <!--gender-->
                        <strong style="margin-left: 25px;padding-right: 10px; color: #20c997">Gender| |</strong> Male <input type="radio" name="gender" value="Male" placeholder="male"> Female <input type="radio" name="gender" value="female" placeholder="female">
                    </div>
                    <div class="col-md-12 form-group" style="padding-left:50px; padding-bottom: 15px">
                        <!--City-->
                        <select style="width: 50%" name="city">
                            <option selected>Select City*</option>
                            <option>Nairobi</option>
                            <option>Mombasa</option>
                            <option>Nakuru</option>
                            <option>Eldoret</option>
                            <option>Kisumu</option>
                            <option>Busia</option>
                            <option>Marsabit</option>
                        </select>
                        <!--Address-->
                        <input type="text" id="address" name="address" placeholder="Address (eg. 123 Avenue)" style="width: 40%; margin-left: 50px" required>
                    </div>

                    <div class="col-md-11 form-group">
                        <hr>
                        <p style="background-color: #20c997; font-weight: bold; text-align: center">Emergency Contacts</p>
                    </div>
                    <div class="col-md-12 form-group" style="padding-left:50px; padding-bottom: 15px">
                        <!--emergency name-->
                        <input type="text" id="ename" name="ename" placeholder="Name of local friend or relative " style="width: 40%" required>
                        <!--relationship-->
                        <input type="text" id="relationship" name="rel" placeholder="Relationship to patient" style="width: 40%; margin-left: 50px" required>
                    </div>

                    <div class="col-md-12 form-group" style="padding-left:50px; padding-bottom: 15px">
                        <!--emergency phone-->
                        <input type="text" id="ephone" name="ephone" placeholder="Phone Number" style="width: 40%" required>
                        <!--gender-->
                        <strong style="margin-left: 50px;padding-right: 10px; color: #20c997">Gender| |</strong> Male <input type="radio" name="egender" value="Male" placeholder="male"> Female <input type="radio" name="egender" value="female" placeholder="female">
                    </div>
                    <div class="col-md-12 form-group" style="padding-left:50px; padding-bottom: 15px">
                        <!--emergency ID-->
                        <input type="text" id="eidno" name="eidno" placeholder="Kin ID Number" style="width: 40%" required>
                    </div>
                  

                    <div class="col-md-12 form-group" style="text-align: center">
                        <br>
                        <button type="submit" value="submit" name="register" class="btn submit_btn">Register</button>
                        <button type="reset" value="Reset" class="btn submit_btn" style="margin-left: 80px">Reset Form</button>
                    </div>
                </form>
<p><a href="search.php">Search</a> patients.</p>

<!--==Author (c)frankline_bwire==-->

