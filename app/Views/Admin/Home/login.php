<?php $this->extend('header-admin'); ?>
            
<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Login</h4>
                        </div>
                        <div class="card-body">
                            <?= alert(); ?>
                            
                            <form method="POST">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <button type="submit" name="login" value="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->endSection(); ?>