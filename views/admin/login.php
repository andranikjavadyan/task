<div class="card card-primary">
    <?php if(isset($_SESSION['error'])):?>
    <div class="alert alert-danger">
        <p>Invalid email or password</p>
    </div>
    <?php endif;?>
    <div class="card-header">
        <h3 class="card-title">Login</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form role="form" method="post">
            <!-- textarea -->
            <div class="form-group">
                <label>Email</label>
                <input required type="text" class="form-control" placeholder="Enter ..." name="email">
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label>Password</label>
                <input required type="password" class="form-control" placeholder="Enter password..." name="password" />
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
