<?php
if(isset($_POST['upload-submit']))
{
    $caption = $_POST['imageCaption'];
    if(empty($caption)){
        $caption = $category . ' image'; 
    }

   $file=$_FILES['myfile'];
    $imageSize = $file['size'];
    $imageType = $file['type'];
    $imageName = $file['name'];
    $imageError = $file['error'];
    $imageTempName=$file['tmp_name'];
    $fileExt = explode(".",$imageName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array("jpg","jpeg","png");
    $targetDir="../images/";

    if(in_array($fileActualExt,$allowed)) // validate file type
    {
        if($imageError === 0)// validate that there's no error 
        {
            if($imageSize <= 41943040) //validate that the file size is within range
            {
                $fileDestination= $targetDir.$imageName; 

                include_once "dbh.php"; 
                if(empty($category)){
                    header("Location: ../gallery.php?upload=empty");
                    exit(); 
                }
                else // begin interacting with the DB
                {
                    $sql="SELECT * FROM gallery;";
                    $stmt = mysqli_stmt_init($conn);
                
                    
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        echo "Database connection error!";
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setOrder = $rowCount + 1; 

                        $sql = "INSERT INTO gallery(CATEGORY,CAPTION,PATHFILE,ORDERPICS) VALUES (?,?,?,?);";
                        if(!mysqli_stmt_prepare($stmt,$sql))
                        {
                            echo "Database connection error!";
                            exit();
                        }
                        else {// upload image to database
                            mysqli_stmt_bind_param($stmt,"ssss",$category,$caption,$fileDestination,$setOrder);
                            mysqli_stmt_execute($stmt);

                            //upload image to the server 
                            move_uploaded_file($imageTempName,$fileDestination);
                            header("Location: ../upload.php?upload=success");
                        }
                    }
                }
            }
            else
            {
                echo "The maximum file size should be no larger than 40MB."; 
                exit(); 
            }
        }
        else
        {
            echo "There is an error with this file.";
            exit(); 
        }

    }
    else
    {
        echo "Only .jpg, .jpeg, .png files are allowed!"; 
        exit(); 
    }
}
