# OTP verification using PHP

 This project is based on OTP verification to reset the password which does the job of sending to OTP to the mail. The project carries sequence of steps which is used for Account recovery and verifying the OTP which the user has entered, thereby resetting the user account.

## Execution of project

* The project was executed in **XAMPP** (for Apache server and mysql for dbms) application.

* Upload the whole file inside the **Xampp folder** [file upload location](C:\xampp\htdocs\). 

* Create a database as otpdb using mysql in the chrome by writting the **http as ' localhost/phpmyadmin/ '** or you can also use  the XAMPP control panel to access the database using the **admin** button.

* Create the following table in the database. The code for the table creation is presented in the **' database.sql '**, Execute the command in the database, because it is very important to store, retrieve the data.

* Finally inside the **sendotp.php** and **signin.php** file, under object **$mail->Username = 'your_email_id@gmail.com';** as well as **$mail->Password = 'your 2 step verification password/App password of gmail';** and Set sender of the mail as **$mail->setFrom('your_email_id@gmail.com');** ,contents of subject and body of the email can be entered according to specific roles. 


## Project development methodology :
The project was developed using HTML, CSS and JavaScript for the frontend, while PHP was employed for the backend, integrating with a MySQL database management system (DBMS).

## Project development tools:
•	HTML 
•	CSS
•	JavaScript
•	PHP
•	Mysql
•	Visual studio code (Code written platform)
•	Xampp (for Apache server and mysql for dbms)
•	Chrome (project testing and execution)