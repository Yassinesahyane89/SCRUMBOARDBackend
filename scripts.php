<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    //ROUTING
    //if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    function getTasks($q)
    {
        global $conn;
        $sql = "SELECT tasks.id ,title ,types.name 'type' ,priorities.name 'priority' , status.name 'status' ,task_datetime,description FROM tasks, status , types, priorities WHERE tasks.status_id = status.id and tasks.priority_id = priorities.id and tasks.type_id = types.id and status.name = '$q'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            echo '<pre>';
              print_r($row);
              echo '</pre>';
        }


    }
getTasks('Done');

    function saveTask()
    {

        global $conn;
        $title = $_POST["title"];
        $type = $_POST["type"];
        $priority = $_POST["priority"];
        $status = $_POST["status"];
        $data = $_POST["data"];
        $description = $_POST["description"];

        $insert_query="INSERT INTO tasks (`title`, `type_id`, `priority_id`,`status_id`,`task_datetime`,`description`)
         VALUES ('$title', '$type', '$priority', '$status', '$data', '$description')";
        $query_run = mysqli_query($conn,$insert_query);
        if($query_run){
            $_SESSION['message'] = "Task has been added successfully !";
            header('location: index.php');
        }

        //CODE HERE
        //SQL INSERT
    }

    function editTask($id)
    {
        global $conn;

        $sql = "SELECT * FROM `tasks` WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }

        $conn->close();
    }

    function updateTask()
    {
        global $conn;

        $id = $_POST["id"];
        $title = $_POST["title"];
        $type = $_POST["type"];
        $priority = $_POST["priority"];
        $status = $_POST["status"];
        $data = $_POST["data"];
        $description = $_POST["description"];

        echo $sql = "UPDATE tasks SET title='$title',type_id='$type',priority_id='$priority',status_id='$status',task_datetime='$data',description='$description' WHERE id=$id";
        $query_run = mysqli_query($conn,$sql);
        if($query_run){
            $_SESSION['message'] = "Task has been added successfully !";
            header('location: index.php');
        }
    }

    function deleteTask()
    {
        echo 'ff';
        global $conn;

        $id = $_POST["id"];

        $sql = "DELETE FROM tasks WHERE id=$id";
        $query_run = mysqli_query($conn,$sql);
        if($query_run){
            $_SESSION['message'] = "Task has been added successfully !";
            header('location: index.php');
        }
    }

?>