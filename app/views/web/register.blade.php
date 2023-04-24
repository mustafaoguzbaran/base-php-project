@include('layouts.header')
<div class="container" style="padding: 210px">
    <form method="post" action="register">
        <div class="form-group">
            <label>Nick Name</label>
            <input type="text" name="username_register" class="form-control">
        </div>
        <div class="form-group">
            <label>E-Mail</label>
            <input type="email" name="email_register" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password_register" class="form-control">
        </div>
        <button type="submit" style="margin: 10px" name="register" class="btn btn-primary">Register</button>
    </form>
</div>
@include('layouts.footer')