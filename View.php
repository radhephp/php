<html>
    <body>
        <form action="View.php" method="post">
            <?php
            include_once "crud.php";
            include_once "crud_dept.php";
            
            if (isset($_REQUEST["submit"]))//insert record
            {
                $eid=$_REQUEST["eid"];
                $ename=$_REQUEST["name"];
                $salary=$_REQUEST["salary"];
                $did=$_REQUEST["did"];
            
                $stat=insert($eid,$ename,$salary,$did);
                //if($stat)
                //{
                    echo '<script>alert("inserted")</script>';
               // }
            }
            if (isset($_REQUEST["update"]))//update record
            {
            
                $eid=$_REQUEST["eid"];
                $ename=$_REQUEST["name"];
                $salary=$_REQUEST["salary"];
                $did=$_REQUEST["did"];
                
                update($eid,$ename,$salary,$did);
            }
            
            $id=$name=$sal=$dept=$dept11="";

            if (isset($_GET['eid1']))//Code For DElete
           {

               delete($_GET['eid1']);
           }
           if (isset($_GET['eid']))//Code for Update
           {
               $result1=search_emp($_GET['eid']);
               $row=$result1->fetch_assoc();
               $id=$row["eid"];
               $name=$row["name"];
               $sal=$row["salary"];
               $dept11=$row["did"];

           }
            ?>
            <table border=2>
                <tr>
                    <th> Emp Id:</th>
                    <td> <input type="text" name="eid" value=<?php echo $id?> > </td>
                </tr>
                <tr>
                    <th> Emp Name:</th>
                    <td><input type="text" name="name" value=<?php echo $name?> ></td>
                </tr>
                <tr>
                    <th> Emp Salary:</th>
                    <td><input type="text" name="salary" value=<?php echo $sal?>></td>
                </tr>
                <tr>
                    <th> Department:</th>
                    <td><select name="did" >
                    <?php
                        $result=display_dept();   
                        if($result->num_rows>0)
                        {
                           while($row = $result->fetch_assoc()) 
                           {

                    ?>
                        <option value="<?php echo $row["did"];?>" <?php if($row["did"]==$dept11) echo 'selected' ?> > <?php echo $row["dname"];?></option>
                    <?php
                           }
                        }
                    ?>            
                    </select>
                    </td>
                </tr>
                <tr>
                    <td><input type=submit name="submit"/> </td>
                    <td><input type=submit name="update" value="update"/> </td>
                </tr>

            </table>
        <table border=2>
            <tr>
                <th>EmpID</th>
                <th>Emp Name</th>
                <th>Salary</th>
                <th>Department</th>
            </tr>
         <?php
             
             $result=display();   
             if($result->num_rows>0)
             {
                while($row = $result->fetch_assoc()) 
                {
         ?> 
            <tr>
                <td> <?php echo $row["eid"];?></td>    
                <td> <?php echo $row["name"];?></td>    
                <td> <?php echo $row["salary"];?></td>    
                <td> <?php echo $row["dname"];?></td>    
                <td> <a href="view.php?eid=<?php echo $row["eid"];?>"?>Edit</a></td>    
                <td> <a href="view.php?eid1=<?php echo $row["eid"];?>"?>Delete</a></td>    
            </tr>

        </form>


        <?php
                }
             }
                    
            
            
        ?>
</body>
</html>
