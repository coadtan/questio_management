<div class="row" style="background-color:#00bbff; height:50px;" >
    <div class="col-md-3" >
        <font style="font-size:30px;color:white">
            Questio
        </font>
        <font>
            Keeper
        </font>
    </div>
    <div class="col-md-6">
        <font style="font-size:30px;color:white">
            <?=$title?>
        </font>
    </div>
    <div class="col-md-3">
        <?php if($this->session->userdata('logged_in') != NULL) :?>
            <font style="font-size:20px;color:white">
            <?=$this->session->userdata('logged_in')['firstname'];?>
            <?=$this->session->userdata('logged_in')['lastname'];?>
            </font>
            <a href="<?=base_url('mainpage/logout')?>">
                <button
                    type="button"
                    class="btn btn-default">
                        Logout
                </button>
            </a>
        <?php else :?>
            <button
                type="button"
                class="btn btn-default"
                data-toggle="modal"
                data-target="#login">
                    Login
            </button>
        <?php endif; ?>
    </div>
</div>
<!-- Modal -->
<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
            <?=validation_errors();?>
            <?=form_open('login')?>
            <b>Username: </b>
            <input type="text" size="20" id="username" name="username"/>
            <br/>
            <b>Password: </b>
            <input type="password" size="20" id="password" name="password"/>
            <br/>
            <input type="submit" value="login">
            <?=form_close()?>
            <br>
            <a href="<?=base_url('register')?>">Register</a>
            <br>
            <a href="<?=base_url('forgotpassword')?>">Forgot password?</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
