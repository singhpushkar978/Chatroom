<?php
#Getting the values of post parameters

$room = $_POST['room'];

#check for string size
if(strlen($room)>20 or strlen($room)<2)
{
    $message ="Please choose a name between 2 to 20 characters";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo '</script>';
}

#check whether room name is alphanumeric or not
else if(!ctype_alnum($room))
{
    $message ="Please choose an alphanumeric room name";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo '</script>';
}
else
{
    #connect to the database
    include 'db_connect.php';
}

#we could have connected to the databse in beginning but we do not wanted to put pressure on the database processor

//check if room already exists
//the below statement will return a row if a name is presemt with all the elements such as sno,roomaname etc.
$sql= "SELECT * FROM `rooms` WHERE roomname='$room'";
$result=mysqli_query($conn , $sql);
if($result)
{
   #check if already a room with name $room is present or not
   if(mysqli_num_rows($result)>0)
   {
       $message ="Please choose a Different room name,this room is claimed";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';#this dot operator is used for concatenation
        echo 'window.location="http://localhost/chatroom";';
        echo '</script>';
   }
   else
   {
    $sql="INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$room', current_timestamp());" ;  
       if(mysqli_query($conn,$sql))
    {       
       $message ="Your room is ready and you can chat now!";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost/chatroom/rooms.php?roomname=' .$room. '";';
        echo '</script>';
    }
        
   }
}
else
{
    echo "ERROR :" .mysqli_error($conn);
}



?>
