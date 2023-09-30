<form action="/Hotel-reservation/pages/login.php" method="post">

  <div class="form-group">
    <h1 class="form-label my-4 text-center">Login to access your account!</h1>
    <div class="form-floating mb-3">
      <input name="email" autocomplete="off" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="password" autocomplete="off" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
      <button type="submit" name="submit" class="btn btn-success px-4 mt-2">login</button>
    </div>
  </div>
</form>
<a class="nav-link mt-4" href="/Hotel-reservation/pages/register.php">Create an account?</a>