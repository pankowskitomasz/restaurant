<section class="user-s1 container-fluid minh-25vh border-bottom border-dark">
</section>
<section class="user-s2 container-fluid d-flex align-items-start justify-content-center py-5 minh-75vh bg-white">
    <form action=""
        autocomplete="off"
        class="form-user w-100"
        method="post">
        <div class="row  minh-50vh">
            <div class="col-12 col-sm-4 col-md-3">
                <div class="list-group">
                    <input class="list-group-item list-group-item-action"
                        name="dashboard"
                        type="submit"
                        value="Dashboard">  
                    <input class="list-group-item list-group-item-action"
                        name="reservations"
                        type="submit"
                        value="Reservations">     
                    <?php 
                        if(isset($_SESSION["UserLogged"])
                        && $_SESSION["UserLogged"]==="administrator"){
                    ?>                      
                    <input class="list-group-item list-group-item-action"
                        name="users"
                        type="submit"
                        value="Users">          
                    <?php } ?>                 
                    <input class="list-group-item list-group-item-action"
                        name="logout"
                        type="submit"                                
                        value="Logout">
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-9">
                <div class="card w-100 h-100">
                    <div class="card-body">
                        <small class="text-muted">Dashboard</small>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>  