<?php
if(isset($_POST['submit'])){
    $newFileName=$_POST['itemname'];
    if(empty($newFileName)){
        $newFileName="gallery";
    }
    else{
        $newFileName=strtolower(str_replace(" ","-",$newFileName));
    }
    $ItemName=$_POST['itemname'];
    $ItemZnamka=$_POST['znamka'];
    $ItemCena=$_POST['cena'];
    $ItemOpis=$_POST['itemdesc'];
    $ItemModel=$_POST['model'];
    $ItemStanje=$_POST['stanje'];

    $file=$_FILES['file'];

    $fileName=$file["name"];
    $fileType=$file["type"];
    $fileTempName=$file["tmp_name"];
    $fileError=$file["error"];
    $fileSize=$file["size"];

    $fileExt=explode(".",$fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array("jpg","jpeg","png");
    
    if(in_array($fileActualExt,$allowed)){
        //include_once'../header2.php';
        session_start();
        $username=$_SESSION['idaccount'];
        $d = date('Y-m-d');

        if($fileError===0){
            if($fileSize>14000)
            {
                $imageFullName=$newFileName . "." . uniqid("",true) . "." . $fileActualExt;
                $fileDestination="../slike/userimg/" . $imageFullName;

                include_once "dbh.inc.php";
                if(empty($ItemName)||empty($ItemZnamka)||empty($ItemCena)||empty($ItemOpis)||empty($ItemModel)||empty($ItemStanje)){
                    header("Location:../profile.php?upload=empty");
                    exit();
                }
                else{
                    $sql="SELECT * FROM Item;";
                    $stmt=mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                       echo"SQL stmt failed"; 
                    }
                    else{
                        mysqli_stmt_execute($stmt);
                        $result=mysqli_stmt_get_result($stmt);
                        $rowCount=mysqli_num_rows($result);
                        //$setImageOrder=$rowCount+1;

                        $sql="INSERT INTO Item(ime,znamka,model,account_idaccount,opis,cena,stanje,imgpath,uploadDate) VALUES (?,?,?,?,?,?,?,?,?);";
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo"SQL stmt failed"; 
                         }
                         else{
                           echo mysqli_stmt_bind_param($stmt,"sssisdsss",$ItemName,$ItemZnamka,$ItemModel,$username,$ItemOpis,$ItemCena,$ItemStanje,$imageFullName,$d);
                            
                           echo mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName,$fileDestination);
                            header("location: ../profile.php?error=none");
                         }
                    }
                }

            }
            else{
                echo"file size too big";
            }

        }
        
        else{
            echo"napaka";
        }
    }
    else{
        echo"napacni file type";
        exit();
    }

}