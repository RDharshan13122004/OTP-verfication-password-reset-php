<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Master</title>
    <link rel="icon" href="./img/entpp.png">
    <link rel="stylesheet" href="st.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav>
            <label class="logo">
                <h2>Task Master</h2>
            </label>
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a class="active" href="#">Service</a></li>
                <li><a class="active" href="#">Contact us</a></li>
                <li><a class="active" href="#">About us</a></li>
                <?php 
                if(!isset($_SESSION['username'])){
                    echo "<li><a href='index.php?signin' class='sigin active'>Sign up</a></li>";
                }
                else{
                    echo"<li><a href='logout.php' class='sigin active'>logout</a></li>";
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <?php 
        if(isset($_GET['signin'])){
            include("signin.php");
        }
        if(isset($_GET['signup'])){
            include("login.php");
        }
    ?>
    <div>
        <div class="namehq bgii">
            <?php
                if(!isset($_SESSION['username'])){
                    echo"<li' style='font-size: 30px; margin: 10px 5px 5px 10px'>
                    Welcome Guest
                  </li>";
                  }
                  else{
                    echo"<li style='font-size: 30px; margin: 10px 5px 5px 10px'>
                    Welcome ".$_SESSION['username']."
                  </li>";
                  }    
            ?>
        </div>
        <div class="bodyy">
            <div class="cont">
                <div class="box box-1" style="--img: url('./img/pp1.jpg');" data-text="satoru gojo"></div>
                <div class="box box-2" style="--img: url('./img/pp2.jpg');" data-text="terishki"></div>
                <div class="box box-3" style="--img: url('./img/pp3.jpg');" data-text="Tanjiro Kamado"></div>
                <div class="box box-4" style="--img: url('./img/pp4.jpg');" data-text="Bashira"></div>
                <div class="box box-5" style="--img: url('./img/pp5.jpg');" data-text="Haruto"></div>
            </div>
        </div>
        <div class="into">
            <h2>Introducing Taskmaster: Crafting Anime Characters with Precision</h2>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In the vibrant world of anime, where imagination knows no bounds, Taskmaster stands as a beacon of creativity and precision. 
                Taskmaster is not just a company; it's a powerhouse of talented artists, designers, and storytellers dedicated to bringing captivating anime characters to life. With a passion for detail and a commitment to pushing the boundaries of artistic expression, Taskmaster has carved a niche for itself in the ever-evolving landscape of anime design.
            </p>
            <h2>Origins of Excellence</h2>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Taskmaster was founded on the principle that every anime character is a work of art waiting to be discovered. 
                What began as a small team of enthusiasts with a shared love for anime has blossomed into a renowned studio revered for its unparalleled craftsmanship and attention to detail. 
                From humble beginnings, Taskmaster has grown into a hub of creativity, attracting top talent from around the world.
            </p>

            <h2>Crafting Characters with Care</h2>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;At Taskmaster, creating anime characters is not just a job; it's a labor of love. 
                Every character design is meticulously crafted, with each line and color carefully chosen to evoke emotion and captivate audiences. 
                Whether it's a fearless hero, a mischievous sidekick, or a formidable villain, Taskmaster's artists imbue each character with personality and depth, ensuring they leap off the screen and into the hearts of viewers.
            </p>        
            <h2>Collaboration and Innovation</h2>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Taskmaster understands that collaboration is key to creating unforgettable anime characters. 
                The studio works closely with clients, listening to their visions and ideas, and transforming them into stunning character designs that exceed expectations. 
                With a finger on the pulse of the latest trends and technologies, Taskmaster embraces innovation, constantly pushing the boundaries of what's possible in anime design.
            </p>
            <h2>A Legacy of Excellence</h2>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Over the years, Taskmaster has amassed a diverse portfolio of work, ranging from beloved anime series to blockbuster films and video games. 
                From the intricate costumes of fantasy epics to the sleek mechs of futuristic sci-fi, Taskmaster's signature style shines through in every project. With each new creation, the studio solidifies its reputation as a leader in the world of anime design, leaving an indelible mark on the industry.
            </p>
            <h2>Looking to the Future</h2>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;As Taskmaster looks to the future, the studio remains committed to its core values of creativity, collaboration, and excellence. With an eye toward expanding its reach and exploring new opportunities, Taskmaster continues to push the boundaries of anime design, inspiring audiences around the world with its breathtaking characters and imaginative storytelling.

            </p>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In the dynamic world of anime, Taskmaster stands as a shining example of what can be achieved when passion meets precision. With a dedication to craftsmanship and a commitment to innovation, Taskmaster continues to set the standard for anime design, shaping the future of the industry one character at a time.
            </p>       
        </div>
        
    </div>
    </main>  
    <hr>
    <footer>
    </footer>
</body>
</html>