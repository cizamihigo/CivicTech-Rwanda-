<?php
session_start();
if(isset($_POST['submit']) && !empty($_POST['submit']))
{
    if(isset($_FILES['Send']['tmp_name']) && !empty($_FILES['Send']['tmp_name']))
    {
        include("../wimage/WideImage.php");
        $filename = $_FILES['Send']['name'];
        $ext = strtolower(substr(strrchr($filename, '.'), 1));
        $image_name = $_SESSION['id'] . '.';
        $image = WideImage::load($_FILES['Send']['tmp_name'])->resize(45, 45);
        //$image->resize(200,300);
        $image->saveToFile("../images/profile/" . $image_name."jpg");
        header("Location: ../feed.php");
    }
    else
    {
        echo("An Error Occured");
        var_dump($image);
    }


}
else{
    echo("Nothing to show");
    header("Location: ../basicpicture.php");
}

?>