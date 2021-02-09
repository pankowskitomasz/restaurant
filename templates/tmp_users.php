<?php

DatabaseConnect();
$usr = new TUser($GLOBALS['connection']);

if(isset($_POST["deleteuser"])){
    $usr->deleteUser(htmlspecialchars($_POST["deleteuser"]));
}

//handle user list pagination
if(!isset($_SESSION["CurrentPage"])){
    $_SESSION["CurrentPage"]=1;
}
else{
    if(isset($_POST["prevpage"])
    && $_SESSION["CurrentPage"]>1){
        $_SESSION["CurrentPage"]--;
    }
    if(isset($_POST["nextpage"])
    && $_SESSION["CurrentPage"]<(ceil($usr->getListLength()/PAGE_SIZE))){
        $_SESSION["CurrentPage"]++;
    }
}

?>
<section class="user-s1 container-fluid minh-25vh border-bottom border-dark">
</section>
<section class="user-s2 container-fluid d-flex align-items-start justify-content-center py-5 minh-75vh bg-white">
    <form action=""
        autocomplete="off"
        class="form-user w-100"
        method="post">
        <div class="row minh-50vh">
            <div class="col-12 col-sm-4 col-md-3 mb-3">
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
                <div class="btn-toolbar mb-3 w-100">
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary"
                            name="edituser"
                            type="submit">
                            New user
                        </button>
                    </div>
                    <div class="btn-group ml-auto">
                        <button class="btn btn-sm btn-outline-secondary"
                            name="prevpage"
                            type="submit">
                            &lt;
                        </button>
                        <button class="btn btn-sm btn-outline-secondary"                        
                            disabled>
                            <?php 
                                if(isset($_SESSION["CurrentPage"])){
                                    echo $_SESSION["CurrentPage"]." / ".ceil($usr->getListLength()/PAGE_SIZE);
                                } 
                            ?>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary"
                            name="nextpage"
                            type="submit">
                            &gt;
                        </button>
                    </div>
                </div>
                <div class="my-2">
                    <small class="text-muted">
                        *Administrator account cannot be changed
                    </small>
                </div>
                <div class="card w-100">
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped m-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th colspan="2">User name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $tab = $usr->getList();
                                    $pstart = ($_SESSION["CurrentPage"]-1)*PAGE_SIZE;
                                    $pend = $pstart+(PAGE_SIZE);
                                    for($i=$pstart;$i<count($tab) && $i<$pend;$i++){
                                        $tabrow = "<tr><td>".$tab[$i][0]."</td>";
                                        $tabrow .= "<td>".$tab[$i][1]."</td><td>";
                                        if($tab[$i][1]!=="administrator"){
                                            $tabrow .= "<button type='submit' name='edituser' class='btn btn-sm btn-secondary float-right' value='";
                                            $tabrow .= $tab[$i][0]."'>Edit</button>";
                                            $tabrow .= "<button type='submit' name='deleteuser' class='btn btn-sm btn-danger float-right mx-2' value='";
                                            $tabrow .= $tab[$i][0]."'>&times;</button>";
                                        }
                                        $tabrow .= "</td></tr>";
                                        echo $tabrow;
                                    }
                                ?>  
                            </tbody>
                        </table>                
                    </div> 
                </div>          
            </div>
        </div>
    </form>
</section>  