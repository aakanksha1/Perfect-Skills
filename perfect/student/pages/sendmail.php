<?php 
$topratik = "pratikgade13@gmail.com";
$subject1 = "AGS :Test Invitation Mail";


$msg = "
Dear Pratik, \nGreetings from Affluent Global Services! \n
We invite you to appear for online assessment for following tests: \nTest Details Here \nLast date to complete the assessment is Deadline Here. \n
You can also attend a Demo Assessment (It is advised to attend Demo Assessment for better understanding of the system) by visiting the URL below: \n
URL Here \n
Credentials : Username : cd@mail.com | Password : 123456 \n
Please refer to the notes at the end of the mail for more information. \n
Once you are ready to take your official assessment please login to the URL and proceed with your tests. \nURL Here \nCredentials : Username : cd@mail.com | Password : 123456 \n
Kindly call +91-9860430568 on if case of any assistance. \n
Important Notes: \n
1.It is advised you attempt the Demo Test for better understanding of the system.\n2.You must have an active Internet connection with a minimum speed of 256 Kbps and front camera to attend the assessment from smartphone or webcam, a microphone and speakers / headphones in order to attend the assessment from laptop or desktop.\n3.While the test is being conducted you'll be under proctoring and any movement away from the test screen will be monitored, upon window violation the test will be terminated immediately.\n4.Ensure that you complete it in advance to avoid last minutes technical issues.\n5.If you do not have any experience we recommend you to take demo assessment.\n6.The list of supported browsers are Google Chrome (Latest Version) (49+), Mozilla Firefox (Latest Version) (21+), Internet Explorer (11+) and Microsoft Edge.\n
Best of Luck & Regards, \n
Team Affluent Global Services \n
";
$headers = "From: info@affluentgs.com ";

mail($topratik,$subject1,$msg,$headers);
echo "Mail Sent to".$topratik;

?>