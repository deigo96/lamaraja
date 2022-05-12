<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>LOGIN ADMIN</h3>
            <!-- <p>This is the best app ever!</p> -->
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form action="<?php echo base_url('admin/Login_admin/check_login') ?>" method="POST" id="loginForm">
                        <div class="form-group">
                            <?php
                                if($this->session->flashdata('error'))
                                    echo '<span class="help-block small text-center" style=color:#D80027;>'.$this->session->flashdata('error').'</span>';
                            ?>
                            <label class="control-label" for="username">Email</label>
                            <input type="email" placeholder="example@gmail.com" title="Masukan email anda" required="" value="" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                        </div>
                        <button class="btn btn-success btn-block loginbtn" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="text-center login-footer">
            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
        </div> -->
    </div>   
</div>