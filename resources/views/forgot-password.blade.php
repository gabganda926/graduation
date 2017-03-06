<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Compreline | Forgot Password</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/modal.css" rel="stylesheet">
    <link href="../css/modal-reset.css" rel="stylesheet">
</head>

<body class="fp-page bg-teal">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Compreline|</b>Insurance</a>
            <small>Philippines</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Enter the username that you used to register.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="namesurname" placeholder="Username" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-orange waves-effect" type="submit" data-toggle="modal" data-target="#resetPass">RESET MY PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="sign-in.php">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- MODAL RESET -->
    <div class="modal fade" id="resetPass" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-reset">
                            <h4><br/>Reset Password</h4>
                        </div>  <br/><br/>
                        <div class="modal-body">
                            <form id="sign_up" method="POST">
                    <div class="msg">Register a new system account</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="namesurname" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_box</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" required>
                                <option value="">-- Select Employee --</option>
                                <option value="10">No Min Woo</option>
                                <option value="20">Lee Songjuk</option>
                                <option value="30">Kim Myungsoo</option>
                                <option value="40">Kim Bo Gum</option>
                                <option value="50">Jeon Jungkoook</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person_pin</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" required>
                                <option value="">-- Select User Type --</option>
                                    <option value="10">Administrator</option>
                                    <option value="20">Manager</option>
                                    <option value="30">Accounting Staff</option>
                                    <option value="40">Underwriter</option>
                                </select>
                        </div>
                    </div><br/>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-orange">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="sign-in.php">You already have a membership?</a><br/>
                    </div>
                </form>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn bg-orange waves-effect" type="submit">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
    <!-- END MODAL -->


    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/examples/forgot-password.js"></script>
</body>

</html>
