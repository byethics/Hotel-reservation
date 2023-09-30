<form action="/Hotel-reservation/pages/register.php" method="post" enctype="multipart/form-data">

  <div class="form-group mb-4">
    <h1 class="form-label my-4 text-center">register your account</h1>

    <div class="form-group">
      <label class="col-form-label mt-2" for="inputDefault">User name</label>
      <input type="text" name="name" class="form-control" placeholder="muslim uwi" id="inputDefault">
    </div>
    <div class="form-group">
      <label class="col-form-label mt-2" for="inputDefault">Password</label>
      <input name="password" type="password" class="form-control" placeholder="******" id="inputDefault">
    </div>
    <div class="form-group">
      <label class="col-form-label mt-2" for="inputDefault">Email</label>
      <input name="email" type="email" class="form-control" placeholder="uwi@gmail.com" id="inputDefault">
    </div>
    <div class="form-group">
      <fieldset>
        <label class="form-label mt-2" for="readOnlyInput">Role</label>
        <input class="form-control" id="readOnlyInput" type="text" placeholder="Guest" readonly="">
      </fieldset>
    </div>
    <div class="form-group">
      <label for="formFile" class="form-label mt-2">Profile picture</label>
      <input name="avatar" class="form-control" type="file" id="formFile">
    </div>
    <div class="form-floating">
      <button type="submit" name="submit" class="btn btn-success px-4 mt-2">Register</button>
    </div>
  </div>
</form>