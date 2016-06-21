<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User View</title>
	<link rel="stylesheet" type="text/css" href=" <?= base_url('assets/css/bootstrap.css')?> ">
</head>
<body>
	<!-- Start of the navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#mynavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">MyWebpage</a>
            </div>
        

            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class=""><a href="<?= base_url('index.php/login/logout') ?>">
                    <?php if(!$this->session->userdata('user_id')): ?>
                        <?php echo "Login"; ?>
                    <?php else: ?>
                        <?php echo "Logout"; ?>
                    <?php endif; ?>
                    </a></li>
                    <li class="active"><a href="#" data-toggle="modal" data-target="#modal-2">SignUp</a></li>
                </ul>
            </div>
        </div>
    </nav>
	<!-- End of navbar -->