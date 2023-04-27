@include('layouts.header')
<div class="container">
    <form style="margin: 100px" method="post" action="/backoffice/tokenrequest/" >
        <div class="form-group">
            <label>Token Oluşturmak İçin USER ID Giriniz:</label>
            <input type="text" name="uid" class="form-control">
        </div>
        <button type="submit" style="margin: 10px" name="requesttoken" class="btn btn-primary">Token Al</button>
    </form>
    <div class="card" style="margin: 140px; padding: 50px">
        <div class="card-title">
            <h1 style="text-align: center">Token</h1>
        </div>
        <a style="text-align: center"><?php echo $token ?></a>
    </div>
</div>

@include('layouts.footer')