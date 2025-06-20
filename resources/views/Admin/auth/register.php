<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="<?php echo assets('assets/images/logos/favicon.png'); ?>" />
  <link rel="stylesheet" href="<?php echo assets('assets/css/styles.min.css');?>" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="./assets/images/logos/logo.svg" alt="">
                </a>
                <p class="text-center">User Register</p>
                <?php if(session()->getFlashdata('error')):?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif;?>
                <form action="<?php echo assets('/register'); ?>" method="post" enctype="multipart/form-data">
                   <?= csrf_field() ?>
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="<?=set_value('name')?>"  name="name" aria-describedby="textHelp">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('name') ?></small>
                    <?php endif;?>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" value="<?=set_value('email')?>" name="email" aria-describedby="emailHelp">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('email') ?></small>
                    <?php endif;?>
                  </div>
                  <div class="mb-3">
                    <label for="profile" class="form-label">Profile</label>
                    <input type="file" name="picture" class="form-control" id="profile">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('picture') ?></small>
                    <?php endif;?>
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" value="<?=set_value('password')?>" id="password" name="password">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('password') ?></small>
                    <?php endif;?>
                  </div>
                  <div class="mb-4">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" value="<?=set_value('cpassword')?>" name="cpassword">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('cpassword') ?></small>
                    <?php endif;?>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="<?= assets('/login') ?>">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo assets('assets/libs/jquery/dist/jquery.min.js');?>"></script>
  <script src="<?php echo assets('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>