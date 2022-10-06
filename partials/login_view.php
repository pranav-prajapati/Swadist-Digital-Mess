<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModal">Login Here!!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_loginhandler.php" method="POST">
                    <div class="form-group">
                        Email address
                        <input type="email" class="form-control" id="loginemail" name="loginemail"
                            aria-describedby="emailHelp" required>

                    </div>
                    <div class="form-group">
                        Password
                        <input type="password" id="loginpassword" name="loginpassword" class="form-control" required>
                    </div>
                    <div class="float-left">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="float-right">
                        <a href="partials/forgot_password_view.php">forgot password</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>




































<!-- #codeByPra9 -->




