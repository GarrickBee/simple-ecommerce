<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login As Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="loginForm" onsubmit="login(event)" class="row" action="index.html" method="post">
                    <p class="col-12 loginError text-danger"></p>
                    <div class="form-group col-12">
                        <label for="">Email</label>
                        <input type="email" name="user[email]" value="" class="form-control" placeholder="Enter Your Email" required=''>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Password</label>
                        <input type="password" name="user[password]" value="" class="form-control" placeholder="Enter Your Password" required=''>
                    </div>
                    <div class="col-12 text-right">
                        <button onClick="openSignUpModel()" type="button" class="btn btn-secondary">I Dont Have account</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>