<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Compreline | Sign Up</title>
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

    <!-- Sweet Alert Css -->
    <link href="../../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
</head>

<body class="signup-page bg-teal">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Compreline|</b>Insurance</a>
            <small>Philippines</small>
        </div>
        <div class="card">
            <div class="body">
                <form id = "sign_up" action = "sign-up/submit" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="msg">Register a new system account</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id = "namesurname" name="namesurname" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id = "password" name="password" minlength="6" placeholder="Password" required>
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
                            <i class="material-icons">person_pin</i>
                        </span>
                        <div class="form-line">
                            <select id = "type" name = "type" class="form-control show-tick" required>
                                <option value="" style = "display: none;">-- Select User Type --</option>
                                <option value="1">Admin</option>
                            <select>
                        </div>
                    </div>
                    <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_box</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" required>
                                <option value="" style = "display: none;">-- Select Employee --</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-orange">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>
                    <div class="col-md-4" style = "display: none;">
                       <input id = "time" name = "time" type="text" class="form-control">
                    </div>

                    <button class="btn btn-block btn-lg bg-orange waves-effect" type="submit" onclick="document.getElementById('time').value = formatDate(new Date());">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="/sign-in">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    <script src="../../js/pages/examples/sign-up.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="../../../plugins/sweetalert/sweetalert.min.js"></script>


    <script>

        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function formatDate(date)
        {
          var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
          ];

          var day = date.getDate();
          var monthIndex = date.getMonth() + 1;
          var year = date.getFullYear();
          var h = addZero(date.getHours());
          var m = addZero(date.getMinutes());
          var s = addZero(date.getSeconds());

          return year + '-' + monthIndex + '-' + day + ' ' + h + ':' + m + ':' + s;
        }
    </script>

    @include('sweet::alert')
</body>

</html>
