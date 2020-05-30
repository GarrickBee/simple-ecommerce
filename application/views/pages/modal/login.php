<!-- LOGIN MODAL -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_login_modal" class="" action="<?php echo base_url("ajax/login") ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="login_modalLabel">Login As Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="text-primary font-weight-bold" style="font-size:1rem" for="">Email</label>
                            <input type="email" id="login_email" name="login_email" value="" class="form-control" required>
                        </div>
                        <div class="form-group col-12">
                            <label class="text-primary font-weight-bold" style="font-size:1rem" for="">Password</label>
                            <input type="password" id="login_password" name="login_password" value="" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="toggle_create_account_modal" type="button" class="btn btn-secondary button_create_account ">Don't Have An Account?</button>
                    <button id="login_submit" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>