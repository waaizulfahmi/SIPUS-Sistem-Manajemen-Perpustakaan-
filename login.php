<?php session_start(); ?>
<?php include('db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="asset/css/bootstrap.min.css" />

    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0">
              <h5 class="text-center">Hai, <span class="font-weight-bold text-primary">Silakan Login Dulu</span></h5>
            </div>
            <div class="card-body">
              <form action="logincek.php" method="POST">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Username" />
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
                <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing" />
                  <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
