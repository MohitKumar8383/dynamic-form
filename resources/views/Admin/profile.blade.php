<?=$this->include("Admin/include/header")?>

<section>
  <div class="container">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= assets('/dashboard')?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo session()->get('profile_path').'/'. session()->get('profile');?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo session()->get('name');?></h5>
            <p class="text-muted mb-1"><?php echo session()->get('email');?></p>
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
          <?php if (session()->has('validation')) : ?>
              <div class="alert alert-danger">
                  <?= session('validation')->listErrors() ?>
              </div>
          <?php endif; ?>

          <?php if (session()->has('success')) : ?>
            <div class="alert alert-success mb-2">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
        <div class="card mb-4">


          <div class="card-body">
            <form action="<?= assets('update-profile')?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?=session()->get('id')?>">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Name</p>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" placeholder="Enter name" value="<?=session()->get('name')?>"  name="name" aria-describedby="textHelp">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('name') ?></small>
                    <?php endif;?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?=session()->get('email')?>" name="email" aria-describedby="emailHelp">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('email') ?></small>
                    <?php endif;?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Profile</p>
              </div>
              <div class="col-sm-9">
                <input type="file" name="picture" class="form-control" id="profile">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('picture') ?></small>
                    <?php endif;?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Password</p>
              </div>
              <div class="col-sm-9">
                <input type="password" class="form-control"  placeholder="Enter password" value="<?=set_value('password')?>" id="password" name="password">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('password') ?></small>
                    <?php endif;?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Confirm Password</p>
              </div>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="cpassword"  placeholder="Enter confirm password" value="<?=set_value('cpassword')?>" name="cpassword">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('cpassword') ?></small>
                    <?php endif;?>
              </div>
            </div>
            <div class=" mt-4 mb-2">
              <button  type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>

<?=$this->include("Admin/include/footer")?>
