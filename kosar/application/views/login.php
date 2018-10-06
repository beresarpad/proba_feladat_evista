<div>
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><div class="panel-body"><?php echo $error_warning; ?></div></div>
    <?php } ?>

    <h1 class="login_title"><?php echo $heading_title; ?></h1>

    <form class="form-horizontal login_form" role="form" accept-charset="utf-8" action="login" enctype="multipart/form-data" method="post" id="form">
     <div class="form-group">
      <label for="Email" class="col-sm-3 control-label"><?php echo $entry_email; ?></label>
      <div class="col-sm-9 col-lg-3">
      	<input class="form-control"  type="text" name="email" value="<?php echo $email; ?>" />
        </div>
   	</div>

   	<div class="form-group">
      <label for="Password" class="col-sm-3 control-label"><?php echo $entry_password; ?></label>
      <div class="col-sm-9  col-lg-3">
            <input class="form-control" type="password" name="password" value="<?php echo $password; ?>" />
     </div>
     </div>
      <div class="form-group">
      <div class="col-sm-offset-3 col-sm-10">
         <input type="submit" class="btn btn-default" value="<?php echo $button_login; ?>" />
      </div>
   </div>
    </form>

</div>