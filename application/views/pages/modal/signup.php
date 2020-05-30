<div class="modal fade" id="create_account_modal" tabindex="-1" role="dialog" aria-labelledby="create_account_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_account_modalLabel">Create a account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_create_account_modal" action="index.html" method="post">
                    <div class="row">
                        <?php $this->load->view('layout/member/register_form'); ?>
                        <div class="col-12 mt-2">
                            <p>By clicking Register, you agree to <a href="<?php echo base_url('document/view?document=') . urlencode('flytor_terms_&_conditions.pdf') ?>" target="_blank">Flytor’s Conditions of Use</a> and <a href="<?php echo base_url('document/view?document=') . urlencode('flytor_privacy_policy.pdf')  ?>" target="_blank">Privacy Notice</a>.</p>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
                        </div>
                        <div class="col-12 text-center">
                            <p class="my-3">- OR -</p>
                        </div>
                        <div class="col-12">
                            <a href="javascript:void(0);" onclick="facebook_booking_login()" id="fbLink" class="btn btn-primary btn-block btn-lg" style="background-color:#3B5998 !important"><i class="fa fa-facebook-official" aria-hidden="true"></i> Register with Facebook</a>
                        </div>
                        <div class="col-12 mt-2">
                            <div id="gSignIn"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="toggle_login_modal" type="button" class="btn btn-secondary">Login as member</button>
            </div>
        </div>
    </div>
</div>