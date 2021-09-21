<?php
    include_once("db.php");
    include_once("security.php");
    $sql = "
    SELECT 
        t.id_task,
        cu.name AS creation_user_name,
        cu.last_name AS creation_user_last_name,
        s.status_name AS status,
        s.id_status,
        t.title,
        t.description,
        t.due_date,
        t.last_update
    FROM 
        tasks t 
        INNER JOIN status s ON t.id_status = s.id_status
        INNER JOIN users cu ON t.creation_user = cu.username
        INNER JOIN users au ON t.assigned_user = au.username
    WHERE 
        t.assigned_user = :username";


    $stmt = $conn->prepare($sql);
    $stmt->bindParam("username", $logged_user);
    $stmt->execute();
    $tasks = $stmt->fetchAll();

?>
<script type="text/javascript">
    function remove() {
        debugger;
        var frm = document.getElementById("frm-remove");
        var tasks = document.getElementsByName("selectedTask");
        var selectedTask;

        for(var i = 0; i < tasks.length; i++) {
             if(tasks[i].checked) {
                    selectedTask  = tasks[i].value;
             }
        }
        frm["task_id"].value = selectedTask;
        frm.action = "remove.php";
        frm.method = "POST";
        frm.submit();
    }
</script>

<div class="container-fluid">
    <div class="row "> &nbsp;</div>
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <div class="table-responsive">
                <table class="table  table-sm table-striped table-bordered table-hover">
                    <thead class="table-light text-center">
                        <tr>
                            <th> &nbsp; </th>
                            <th>Task Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created By </th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($tasks as $task) { ?>
                        <tr class="table text-center ">
                            <td class="align-center align-middle"> <input class="form-check-input" type="radio"
                                    name="selectedTask" id="selectedTask" value=<?=$task['id_task']?>> </td>
                            <td>
                                <?=$task["id_task"]?>
                            </td>
                            <td>
                                <?=$task["title"]?>
                            </td>
                            <td>
                                <?=$task["description"]?>
                            </td>
                            <td>
                                <?=$task["status"]?>
                            </td>
                            <td>
                                <?=$task["creation_user_name"]." " .$task["creation_user_last_name"]?>
                            </td>
                            <td>
                                <?=date("d-m-Y", strtotime($task["due_date"]))?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 offset-sm-4">
                <div class="d-flex p-2 align-items-center"><button type="button" class="btn btn-primary"> Assign </button> </div>
            </div>   
            <div class="col-sm-1">
                <div class="d-flex p-2 align-items-center">
                    <button type="button" class="btn btn-primary" >New Status</button>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="d-flex p-2 align-items-center">
                    <button type="button" class="btn btn-primary"> Update </button>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="d-flex p-2 align-items-center">
                    <form mehtod="POST" id="frm-remove" name="frm-remove"> <input type="hidden" value="" name="task_id"/> </form>    
                    <button type="button" class="btn btn-primary" onclick="javascript:remove();"> Remove </button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>