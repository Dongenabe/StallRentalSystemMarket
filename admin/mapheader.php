<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Stall Management System</title>
    <link rel="stylesheet" href="../fontsicon/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/alert.css">
    <link rel="stylesheet" href="../css/hstyle.css">
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/css2.css" />

    <style>
        .header {
            background-color: #333; /* Dark background color */
            color: #fff; /* White text */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .header_img img {
            width: 50px; /* Reduce the size of the logo */
            height: 50px; /* Reduce the size of the logo */
        }

        .header_title {
            font-size: 24px;
        }

        .dropdown {
            position: relative;
        }

        .dropdown button {
            background: none;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .dropdown-content {
            position: absolute;
            background-color: #333; /* Dark background color */
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            right: 0; /* Align the dropdown to the right */
            display: none;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #444; /* Darker background color on hover */
        }

    .nav-item {
        padding: 10px;
        border-bottom: 1px solid #444;
        transition: background-color 0.3s;
    }

        .header_toggle {
            font-size: 24px;
            cursor: pointer;
        }

        .header_icons {
            display: flex;
            gap: 20px; /* Spacing between icons */
        }
    </style>
</head>

<body id="body-pd">

    <?php
    require '../includes/process.php';
    ?>
    <header class="header" id="header">
        <div class="header_img">
            <img src="../img/binalbagan.png">
        </div>
        <div class="header_title">
            <h4>Binalbgan Public Market Stall Map</h4>
        </div>
        <div class="header_icons">
            <i class="fa fa-bars header_toggle" id="header-toggle"></i>
            <div class="dropdown">
                <button class="dropbtn">Welcome <?php echo $_SESSION['usernm']; ?></button>
                <div class="dropdown-content">
                    <a href="cpass.php"><i class="fas fa-lock"></i> Change Password</a>
                    <a href="../includes/logout.inc.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                </div>
            </div>
        </div>
    </header>

    <div class="l-navbar border-end" id="nav-bar">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <center><img src="../img/binalbagan.png" width="100px" height="100px"></center>
                    <font class="matte-black-text">
                        <h4>&nbsp;&nbsp;Binalbgan Public Market Stall Map</h4>
                    </font>
                </li>
               <li>
                    <a href="manage.php"><i class="fas fa-arrow-left"></i>Go back</a>
                </li>
                <li class="nav-item">
                    <a href="wet_market.php"><i class="fa fa-shopping-basket fa-fw matte-black-icon"></i>Wet Market</a>
                </li>
                <li class="nav-item">
                    <a href="block_1.php"><i class="fa fa-building fa-fw matte-black-icon"></i>Block 1</a>
                </li>
                <li class="nav-item">
                    <a href="block_2.php"><i class="fa fa-building fa-fw matte-black-icon"></i>Block 2</a>
                </li>
                <li class="nav-item">
                    <a href="block_3.php"><i class="fa fa-building fa-fw matte-black-icon"></i>Block 3</a>
                </li>
                <li class="nav-item">
                    <a href="block_4.php"><i class="fa fa-building fa-fw matte-black-icon"></i>Block 4</a>
                </li>
                <li class="nav-item">
                    <a href="block_5-8.php"><i class="fa fa-building fa-fw matte-black-icon"></i>Blocks 5-8</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>

    <!-- Include jQuery at the end of the page -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Add a click event handler to all the <li> elements with class "nav-item"
            $(".nav-item").click(function () {
                // Remove the "active" class from all <li> elements
                $(".nav-item").removeClass("active");

                // Add the "active" class to the clicked <li> element
                $(this).addClass("active");
            });
        });
    </script>
</body>

</html>
