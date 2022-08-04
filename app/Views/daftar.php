    
<?=$this->extend('frontend/base')?>

<?=$this->section('content')?>

    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Sign Up</h1>
                   <p>Fill out the form below to sign up for Tivo. Already signed up? Then just <a class="white" href="log-in.html">Log In</a></p> 
                    <!-- Sign Up Form -->
                    <?=session()->info?>
                    <div class="form-container text-left">
                        <form action="<?=base_url('reg')?>" method="post">
                        <?=csrf_field()?>
                            <div class="form-group">
                                <input type="email" class="form-control-input" value="<?=old('email')?>" id="semail" name="email">
                                <label class="label-control" for="semail">Email</label>  
                                <small class="text-danger"><?=(isset(session()->err['email'])) ? session()->err['email'] : null ?></small>          
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="sname" value="<?=old('username')?>" name="username">
                                <label class="label-control" for="sname">Username</label>     
                                <small class="text-danger"><?=(isset(session()->err['username'])) ? session()->err['username'] : null ?></small>                                     
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" id="spassword" name="password">
                                <label class="label-control" for="spassword">Password</label>    
                                <small class="text-danger"><?=(isset(session()->err['password'])) ? session()->err['password'] : null ?></small>                                      
                            </div>                           
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">SIGN UP</button>
                            </div>
                            <div class="form-message">
                                <div id="smsgSubmit" class="h3 text-center hidden"></div>
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