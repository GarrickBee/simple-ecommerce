<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signUpModalLabel">Create a account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signUpForm" onsubmit="signUp(event)" class="row" action="index.html" method="post">
                    <p class="col-12 signUpError text-danger"></p>
                    <div class="form-group col-12">
                        <label for="">Email</label>
                        <input type="email" name="user[email]" value="" class="form-control" placeholder="Enter Your Email" required=''>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Password</label>
                        <input type="password" name="user[password]" value="" class="form-control" placeholder="Enter Your Password" required=''>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Retype password</label>
                        <input type="password" name="user[repassword]" value="" class="form-control" placeholder="Enter Your Password" required=''>
                    </div>
                    <div class="col-12 text-right">
                        <button type="button" onClick="openLoginModel()" class="btn btn-primary">I Have Account</button>
                        <button type="submit" class="btn btn-secondary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>