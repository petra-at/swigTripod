<?php
    if(isset($_POST['contacts-submit']))
    {
        $name =  $_POST['name'];
        $from = $_POST['email'];
        $mobile = $_POST['phone'];
        $category = $_POST['category'];
        $emailMessage = $_POST['message'];

        $to = "aduteipetra@gmail.com";
        $subject = "PMP - Photography Enquiry";

        $message = "
        <html>
        <head>
        <title>PMP Enquiry</title>
        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
        </style>
        </head>
        <body>
        <h3>Generated from PMP website.</h3>
        <hr>
        <table>
        <tr>
            <th>Name</th>
            <th>Mobile No</th>
            <th>Category</th>
        </tr>
        <tr>
            <td>".$from."</td>
            <td>".$mobile."</td>
            <td>".$category."</td>
        </tr>
        </table>
        <p>
        ".$emailMessage."
        </p>
        </body>
        </html>
        ";


        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: PMP Photography ".$from."\r\n";
            
        echo "Email Sent";
        //mail($to,$subject,$message,$headers);
        header("Location: ../contacts.php?mail=success");
    }
?>