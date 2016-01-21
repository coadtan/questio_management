<div class="row" style="background-color:white; height:50px;padding:5px" >
    <div class="col-md-3 col-xs-6" >
        <img class="questio-mini-logo" src="<?= base_url()?>assets/images/logo.png" alt="">
        <font style="font-size:20px" class="text-questio-title">Questio</font>
    </div>
    <div class="col-md-3 col-md-push-6 col-xs-3 col-xs-push-3">
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
    <div class="modal-content size">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Keeper Login</h4>
    </div>
    <div class="modal-body">
        <?=validation_errors();?>
        <?=form_open('login')?>
        <input type="text" size="20" id="username" name="username" placeholder ="Username" style ="margin-bottom:5px;width:300px;"/>
        <input type="password" size="20" id="password" name="password" placeholder ="Password"style ="width:300px;"/>
        <br/> <br/>
        <input class ="btn btn-info" type="submit" value="login">
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
