<?php
include "config.php";
function showdata()
{
    global $con;
    $query="SELECT * FROM user";
    $result=mysqli_query($con,$query);
    if(!$result)
    {
    die('query failed'.mysqli_error());
    }
    while($row=mysqli_fetch_assoc($result))
    {
    $id=$row['id'];
    echo "<option value='$id'>$id</option>";
    }
}
function showstate()
{
    global $con;
    $query="SELECT * FROM state";
    $result=mysqli_query($con,$query);
    if(!$result)
    {
    die('query failed'.mysqli_error());
    }
    while($row=mysqli_fetch_assoc($result))
    {
    $state=$row['state_name'];
    echo "<option value='$state'>$state</option>";
    }
}

function update()
{
    if(isset($_POST['submit']))
    {
        global $con;
        $name=$_POST['name'];       
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $id=$_POST['id'];
        $query="UPDATE user SET name='$name',email='$email',mobile='$mobile',state='$state',city='$city',address='$address' WHERE id=$id";
        $result=mysqli_query($con,$query);
        if(!$result)
        {
            die('query failed'.mysqli_error($con));
        }
        else{
            echo "record updated";
        }
    }
}
function delete()
{
    if(isset($_POST['submit']))
    {
        global $con;       
        $id=$_POST['id'];    
        $query="DELETE FROM user WHERE id=$id";
        $result=mysqli_query($con,$query);
        if(!$result)
        {
            die('query failed'.mysqli_error($con));
        }
        else{
            echo "record deleted";
        }
    }

}
function insert()
{
    if(isset($_POST['submit']))
    {
        
        global $con;
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $name=mysqli_real_escape_string($con,$name);
        $email=mysqli_real_escape_string($con,$email);
        $mobile=mysqli_real_escape_string($con,$mobile);
        $state=mysqli_real_escape_string($con,$state);
        $city=mysqli_real_escape_string($con,$city);
        $address=mysqli_real_escape_string($con,$address);

        

        $query="INSERT INTO user(name,email,mobile,state,city,address)";
        $query.=" VALUES('$name','$email','$mobile','$state','$city','$address')";
        $result=mysqli_query($con,$query);
        if(!$result)
        {
            die('query failed'.mysqli_error());
        }
        else{
            echo "recored created";
        }
    }
}
function show()
{
    global $con;
    $query="SELECT * FROM user";
    $result=mysqli_query($con,$query);
    if(!$result)
    {
        die('query failed'.mysqli_error());
    }
    
    echo "<table>";

    while($row = mysql_fetch_array($result)){  

    echo "<tr><td>" .  $row['name'] . "</td><td>" . $row['email'] . "</td></td>" . $row['mobile'] . "</td><td>" . $row['state'] . "</td><td>" . $row['city'] . "</td><td>" . $row['address'] . "</td></tr>";
    }

    echo "</table>";
       
}

function view()
{
    global $con;
    $query="SELECT * FROM user";
    $result=mysqli_query($con,$query);
    if(!$result)
    {
        die('query failed'.mysqli_error());
    }
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. " - mobile: " . $row["mobile"] . " - state: " . $row["state"] . " - city: " . $row["city"] . " - address: " . $row["address"] . "<br/><br/>";
  }
} else {
  echo "0 results";
} 

}
?>