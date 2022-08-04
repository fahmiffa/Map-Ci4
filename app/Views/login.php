<?=$this->extend('frontend/base')?>

<?=$this->section('content')?>
    
    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Log In</h1>
                   <p>You don't have a password? Then please <a class="white" href="sign-up.html">Sign Up</a></p> 
                   <?=session()->info?>
                    <!-- Sign Up Form -->
                    <div class="form-container text-left">
                        <form action="<?=base_url('log')?>" method="post">
                        <?=csrf_field()?>
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="lemail" name="email">
                                <label class="label-control" for="lemail">Email</label>      
                                <small class="text-danger"><?=(isset(session()->err['email'])) ? session()->err['email'] : null ?></small>                             
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" id="lpassword" name="password">
                                <label class="label-control" for="lpassword">Password</label>              
                                <small class="text-danger"><?=(isset(session()->err['password'])) ? session()->err['password'] : null ?></small>                     
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">LOG IN</button>
                            </div>
                            <div class="form-message">
                                <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

    <?=$this->endSection()?>