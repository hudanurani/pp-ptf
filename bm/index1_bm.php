<?php
    include 'dbcon.php';
    session_start();

    $sql = "SELECT type FROM user WHERE username = '$_SESSION[user]' ";
    
    $results = mysqli_query($conn, $sql);

    if(mysqli_num_rows($results) > 0){
    while($userinfo = mysqli_fetch_array($results)){
        $type = $userinfo['type'];
        }
    }

    if(!isset($_SESSION['user']) OR ($type == "employee")){
    	header('Location: index.php');
    }else{

	    $sql1 = "SELECT user_id FROM user WHERE username = '$_SESSION[user]' ";

	    $results1= mysqli_query($conn, $sql1);

	    if(mysqli_num_rows($results1) > 0){
		    while($userinfo1=mysqli_fetch_array($results1)){
		    	$userid = $userinfo1['user_id'];
		    }
		    $sql = "SELECT * FROM posts WHERE user_id = '$userid' ";

		    $results= mysqli_query($conn, $sql);
		}
	}
?>
<html>
<head>
	<Title>Job List</Title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="tophead">
	    <header>
	        <div>
	            <h1>MY ADS</h1>
	        </div>
	    </header>

	    <nav>
	        <a class="mainlink" href="index1.php"> UTAMA </a>|
	        <a class="mainlink" href="#"> MENGENAI </a>
	        <div class="userlink"><a class="mainlink" href="#"> NAMA PENGGUNA </a>|<a class="mainlink" href="#"> MY-IKLAN </a>|<a class="mainlink" href="create-post.php"> JAWATAN BARU </a>|<a class="logoutlink" href="index.php"> LOG KELUAR </a></div>
	    </nav>
    </div>

     <div class="middlebody">
        <p>
            <table class="maintable"border="0" width="100%">
                <thead>
                    <tr>
                        <th class="hiddenmainth">Pengguna</th>
                        <th class="mainth">ID Pengguna</th>
                        <th class="mainth">Jawatan Kosong</th>
                        <!-- <th>Companies</th>
                        <th>Salary</th> -->
                        <!-- <th>Address</th>
                        <th>Job Scope</th>
                        <th>Info</th>
                        <th>Job Category</th>
                        <th>Location Category</th> -->
                        <th class="mainth">Tarikh Pos</th>
                        <th class="mainth" colspan="2">Pilihan</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php
                   if(mysqli_num_rows($results) > 0){
                    while($postinfo=mysqli_fetch_array($results)){
                        echo "<tr>";
                        echo "<td class='hiddenmaintd'>".$postinfo['post_id']."</td>";
                        echo "<td class='maintd'>".$postinfo['user_id']."</td>";
                        echo "<td class='maintd'>"."<a class=\"postlink\" href=\"viewpost1.php?post_id=".$postinfo['post_id']."\">"."<b>Job Title: </b>".$postinfo['work']."<br>"."<b>Employer: </b>".$postinfo['employer']."<br>"."<b>Salary: </b>"."RM".$postinfo['salary']."</a>"."</td>";
                        //echo "<td>".$postinfo['location']."</td>";
                        //echo "<td>".$postinfo['scope']."</td>";
                        //echo "<td>".$postinfo['addinfo']."</td>";
                        //echo "<td>".$postinfo['jobcat']."</td>";
                        //echo "<td>".$postinfo['loccat']."</td>";
                        echo "<td class='maintd'>".$postinfo['date_posted']."</td>";

                        // "\" = escape character
                        echo "<td class='maintd'><a href=\" updatepost.php?post_id=".$postinfo['post_id']." \">Edit</a></td>";
                        echo "<td class='maintd'><a href=\" delmessage.php?post_id=".$postinfo['post_id']." \">Delete</a></td>";
                        echo "</tr>";
                        //<a href=\"viewpost.php?id=".$postinfo['id']."\">
                    }
                }else{
                    echo "<tr>";
                        echo "<td class='maintd'>"."0 results"."</td>";
                        echo "<td class='maintd'>"."0 results"."</td>";
                        echo "<td class='maintd'>"."0 results"."</td>";
                        echo "<td class='maintd'>"."0 results"."</td>";
                        echo "</tr>";
                }
                    ?>
                </tbody>
            </table>
	    </p>
    </div>
</body>
</html>
