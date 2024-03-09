create database otpdb;

use otpdb;

create table usersignin(user_id int, username varchar(255), user_email varchar(255), user_password varchar(255), user_mobile_no varchar(11), reset_password varchar(11) DEFAULT NULL, reset_otp_exp datetime DEFAULT NULL, primary key (user_id), unique (reset_password));