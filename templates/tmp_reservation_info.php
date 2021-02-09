<?php

DatabaseConnect();
$reservations = new TReservation($GLOBALS['connection']);

?>

<section class="user-s1 container-fluid minh-25vh border-bottom border-dark">
</section>
<section class="user-s2 container-fluid d-flex align-items-start justify-content-center py-5 minh-75vh bg-white">
    <form action=""
        autocomplete="off"
        class="form-user w-100"
        method="post">
        <div class="row minh-70vh">
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
                <div class="card w-100 mb-3">
                    <div class="card-body">
                        <label class="">Find reservation</label>
                        <div class="input-group">
                            <input class="form-control text-center"
                                name="msearch"
                                tabindex="1"
                                type="text">
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark"
                                    name="msgsearch"
                                    tabindex="2"
                                    type="submit">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="btn-group float-right mb-2">
                    <button class="btn btn-sm btn-outline-secondary"
                        name="reservations"
                        type="submit">
                        Back to list
                    </button>
                </div>              
                <div class="card w-100">
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped m-0">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th colspan="2">Reservation data</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    if(isset($_POST["msginfo"])){
                                        $tab = $reservations->getById(htmlspecialchars($_POST["msginfo"]));
                                        if(is_array($tab)){
                                            foreach($tab as $key => $itm){
                                                echo "<tr>".
                                                    "<td class=\"text-left pl-4 font-weight-bold\">".ucfirst($key)."</td>". 
                                                    "<td>".$itm."</td>".
                                                    "</tr>";
                                            }
                                        }
                                    }
                                ?>    
                            </tbody>
                        </table>                
                    </div> 
                </div>                   
                <div class="btn-group float-right mt-2">
                    <button class="btn btn-sm btn-outline-secondary"
                        name="reservations"
                        type="submit">
                        Back to list
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>    