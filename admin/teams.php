<?php include('partials/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Teams</h1>

            <?php
                if(isset($_SESSION['addTeams'])){
                    echo $_SESSION['addTeams'];
                    unset($_SESSION['addTeams']);
                }
                $flag=0;
                if($_SESSION['role']=='admin')
                    $flag = 1;
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
                    <th>Team ID</th>
                    <th>Team Name</th>
                </tr>

                <?php

                    $query = "SELECT * FROM team";

                    $result = mysqli_query($con, $query) or die(mysqli_error());

                    if($result==TRUE){
                        //Count no. of rows                        
                        $count = mysqli_num_rows($result);
                        if($count>0){
                            while($rows = mysqli_fetch_assoc($result)){

                                $id = $rows['team_id'];
                                $name = $rows['team_name'];
                                
                                //display in table
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $name;?></td>
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