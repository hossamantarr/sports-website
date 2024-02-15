<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head-->
    <title>Sports Website</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/sports.css">
    <link rel="stylesheet" type="text/css" href="css/caru.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <!-- js methods -->
    <script type='text/javascript' src="js/jqueryLibrary.js"></script>
    <script type="text/javascript" src="js/searchbar.js"></script>

</head>

<body>
  <?php include 'include/header.php';?>
  <div id="testcontent" class="container-fluid text-center"  style="background-color:#f1f1f1;">
        <div class="row content">
            <!-- Sidenav -->
            <?php include 'sideNavigationMenu.php'; ?>
            <!-- center container col -->
            <div id= "profilediv" class="col-sm-10 text-left" style="background-color:#f1f1f1;">
            <h1>Welcome</h1>

            <a href="logout.php"><button class="button button-block" name="logout"/>Sign Out</button></a>

            <div class="card hovercard">
        <div class="card-background">
            <!-- Checked User Male icon by Icons8 -->
           <img class="card-bkimg" alt="" src="https://maxcdn.icons8.com/Color/PNG/96/Users/checked_user_male-96.png">
        </div>
        <div class="useravatar">
            <a href="https://icons8.com"><img src="https://maxcdn.icons8.com/Color/PNG/96/Users/checked_user_male-96.png" title="Checked User Male" width="96" height="96"></a>
        </div>
        <div class="card-info"> <span class="card-title"><?php echo $first_name.' '.$last_name; ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-default" data-toggle="tab">
            <!-- Message icon by Icons8 -->
            <img src="https://maxcdn.icons8.com/rsl/PNG/64/Messaging/message-64.png" title="Message" width="60" height="60">
                <div class="hidden-xs"><p><?= $email ?></p></div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" data-toggle="tab">
                <!-- Leaderboard icon by Icons8 -->
                <img src="https://maxcdn.icons8.com/office/PNG/60/Sports/leaderboard-60.png" title="Leaderboard" width="60" height="60">
                <div class="hidden-xs">".$score"</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" data-toggle="tab">
                <!-- Rating icon by Icons8 -->
                <img src="https://maxcdn.icons8.com/office/PNG/60/Messaging/rating-60.png" title="Rating" width="60" height="60">
                <div class="hidden-xs">".$bookmarksnumber"</div>
            </button>
        </div>
    </div>


            </div>
        </div>
    </div>



    <script async defer
        src="https://newsapi.org/v1/articles?source=the-next-web&sortBy=top&apiKey=c85d7a8b0bcb471e8666fbf2740b391f">
    </script>
    <?php include 'include/footer.php';?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--Change background colours-->

</body>
</html>
