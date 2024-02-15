<?php
include "databaseConnect.php";
/* Registration process, inserts user info into the database
   and sends account confirmation email message
 */
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['country'])) {
// Set session variables to be used on profile.php page
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['country'] = $_POST['country'];

    // Escape all $_POST variables to protect against SQL injections
    $username = $mysqli->escape_string($_POST['username']);
    $country = $mysqli->escape_string($_POST['country']);
    $email = $mysqli->escape_string($_POST['email']);
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $mysqli->escape_string( md5( rand(0,1000) ) );

    // Check existing email
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error);

    // If email is found in db return error message
    if ( $result->num_rows > 0 ) {

        $_SESSION['message'] = 'User with this email already exists!';
        echo "dont add";
        // display error msg --> header("location: error.php");
    }
    // if email is not found in db continue
    else {
    // add user to db and enable account
        $sql = "INSERT INTO users (username, country, email, password, hash, active)" . "VALUES ('$username','$country','$email','$password', '$hash', '1')";


    }
}

 ?>


  <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                    <h4 class="modal-title" id="myModalLabel">Register</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div id="regContainer" class="col-md-8" >
                            <div id="Registration">
                                <form role="form" class="form-horizontal" method="POST">
                                    <div class="form-group">
                                        <label for="fusername" class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" class="form-control" placeholder="Name" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="femail" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fcountry" class="col-sm-3 control-label">Country</label>

                                        <div class="col-sm-9">
                                            <input type="country" class="form-control" name="country" placeholder="Select Country" />
                                            <em>1-8 Characters</em>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fpassword" class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password" placeholder="*******" />
                                        </div>
                                    </div>

                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary btn-sm" name="register">Register</button>
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                        </div>

                                </form>
                            </div>


                        </div>

                        <div class="col-md-3">
                            <div class="row text-center sign-with">
                                <div class="col-md-12">
                                    <h4>Sign in with</h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="social-buttons text-center">
                                        <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Login with Facebook</a>
                                        <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Login with Twitter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
