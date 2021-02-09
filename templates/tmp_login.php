<section class="user-s1 container-fluid minh-25vh border-bottom border-dark">
</section>
<section class="user-s2 align-items-center d-flex bg-white text-white minh-75vh px-0 py-5">
    <div class="row mx-0 w-100">
        <div class="col-10 col-md-5 col-xl-4 p-0 card mx-auto border border-primary shadow">
            <div class="card-header bg-primary text-white">
                Sign in
            </div>
            <div class="card-body text-primary">
                <form autocomplete="off"
                    action=""
                    method="POST">
                    <label class="font-weight-bold">User Name</label>
                    <input type="text" 
                        class="form-control bg-transparent input-line-bottom"
                        maxlength="100"
                        name="username"
                        placeholder="User Name...">
                    <label class="font-weight-bold mt-3">Password</label>
                    <input type="password" 
                        class="form-control bg-transparent input-line-bottom"
                        maxlength="100"
                        name="userpass"
                        placeholder="Password...">
                    <div class="w-100 mt-3 text-right">
                        <input type="reset" value="Clear" 
                            class="btn btn-outline-dark border border-primary"> 
                        <input type="submit" 
                            value="Sign in" 
                            name="login"
                            class="btn btn-outline-dark border border-primary"> 
                    </div>                            
                </form>
            </div>
        </div>
    </div>
</section>