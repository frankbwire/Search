<!--Creating a search button-->
<!--==Author (c)frankline_bwire==-->
<h1 style="font-weight:bolder">iSearch</h1>
<h4 style="width:40%">This database application lets you search for patient information, available in the patient database (searchdb.sql) from different tables and gives accurate output.</h4>

<?php
include 'db.php';
?>

<form method="post" action="search.php">
<input type=text name="search" placeholder="Search">
    <input type="submit" name="searchbt">
</form>
<!--Search Query-->
<?php
$search="";
if(isset($_POST["searchbt"])){
    $search=mysqli_real_escape_string($connect,$_POST["search"]);
    //get data from multiple tables (join)
    $sql="Select * from patients , emergency_contacts  where patients.patient_id = '$search' and emergency_contacts.patient_id = '$search' limit 1";
    $query=mysqli_query($connect,$sql) or die ("Unable to get result". mysqli_error($connect));
    $result=mysqli_fetch_assoc($query);
}
?>
<!--OUTPUT-->
<?php
if($result == true){
    ?>
<form>
    First Name: <input type="text" value="<?php  echo $result["first_name"]?>" readonly>
    <br>
   Last Name: <input type="text" value="<?php  echo $result["last_name"]?>" readonly>
    <br>
    Email: <input type="text" value="<?php  echo $result["patient_email"]?>" readonly>
    <br>
    City: <input type="text" value="<?php  echo $result["patient_city"]?>" readonly>
    <br>
    Address: <input type="text" value="<?php  echo $result["patient_address"]?>" readonly>
    <br>
    Gender: <input type="text" value="<?php  echo $result["patient_gender"]?>" readonly>
    <br>
     Kin: <input type="text" value="<?php  echo $result["kin_name"]?>" readonly>
    <br>
    Relationship: <input type="text" value="<?php  echo $result["relationship"]?>" readonly>
    <br>
    Kin Gender: <input type="text" value="<?php  echo $result["kin_gender"]?>" readonly>
</form>
<?php
}
if(!$result){
  echo "No results found for <strong style='color:red'>$search</strong> record, or the record does not exist.";  
    
};
echo "done";
?>

<p><a href="register.php">Register</a> new patient</p>