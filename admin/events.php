<?php include('partials/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Events</h1>

            <?php
                if(isset($_SESSION['addEvent'])){
                    echo $_SESSION['addEvent'];
                    unset($_SESSION['addEvent']);
                }

                if(isset($_SESSION['deleteEvent'])){
                    echo $_SESSION['deleteEvent'];
                    unset($_SESSION['deleteEvent']);
                }
                if($_SESSION['role']=='admin')
                    $flag = 1;
                else $flag = 0;
            ?>

            <br><br>
            <?php
            if($flag){
                ?>
                <a href="add-team.php" class="btn-primary">Add team</a>
            <?php
            }
            ?>
            <br/><br/>

            <table class="tableFull">
                <tr>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <?php
                        if($flag==1){
                            ?>
                        <th>Actions</th>
                        <?php
                        }
                        ?>
                </tr>

                <?php

                    $query = "SELECT * FROM events";

                    $result = mysqli_query($con, $query) or die(mysqli_error());

                    if($result==TRUE){
                        //Count no. of rows                        
                        $count = mysqli_num_rows($result);
                        if($count>0){
                            while($rows = mysqli_fetch_assoc($result)){

                                $id = $rows['event_id'];
                                $name = $rows['event_name'];
                                
                                //display in table
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $name;?></td>
                                    <?php
                                    if($flag==1){
                                        ?>
                                        <td>
                                        <a href="delete-event.php?id=<?php echo $id;?>" class="btn-danger">Delete Event</a>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                        }
                    }
                ?>
            </table>
        </div>    
    </div>

<?php include('partials/footer.php') ?>