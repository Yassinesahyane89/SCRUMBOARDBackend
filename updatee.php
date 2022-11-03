<?php
    include('scripts.php');
    $id = $_GET['id']; 
    $result = editTask($id);
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <title>YouCode | Scrum Board</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN core-css ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="assets/css/vendor.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/default/app.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- for sweetalert2 library -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ================== END core-css ================== -->
</head>
<body>
<!-- TASK MODAL -->
<?php
$row = $result->fetch_assoc();{
?>
<div class="modal-dialog">
    <div class="modal-content">
        <form action="scripts.php" method="POST" id="form-task">
            <div class="modal-header">
                <h5 class="modal-title">Add Task</h5>
                <a href="index.php" class="btn-close"></a>
            </div>
            <div class="modal-body"
            <!-- This Input Allows Storing Task Index  -->
            <input name="id" type="hidden" value="<?php echo $row['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" value="<?php echo $row['title'] ?>" class="form-control" name="title" id="task-title" required/>
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <div class="ms-3">
                    <div class="form-check mb-1">
                        <input class="form-check-input" name="type" type="radio" value="1" <?php echo $row['type_id']=='1' ? 'checked' :'' ?> id="task-type-feature" required/>
                        <label class="form-check-label" for="task-type-feature">Feature</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="type" type="radio" value="2" <?php echo $row['type_id']=='2' ? 'checked' :'' ?> id="task-type-bug" required/>
                        <label class="form-check-label" for="task-type-bug">Bug</label>
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <label class="form-label">Priority</label>
                <select class="form-select" id="task-priority" name="priority">
                    <option value="<?php echo $row['priority'] ?>">Please select</option>
                    <option <?php echo $row['priority_id']=='1' ? 'selected' :''?> value="1">Low</option>
                    <option <?php echo $row['priority_id']=='3' ? 'selected' :''?> value="3">Medium</option>
                    <option <?php echo $row['priority_id']=='2' ? 'selected' :''?> value="2">High</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label><select class="form-select" id="task-status" name="status">
                    <option value="">Please select</option>
                    <option <?php echo $row['status_id']=='1' ? 'selected' :''?> value="1">To Do</option>
                    <option <?php echo $row['status_id']=='2' ? 'selected' :''?> value="2">In Progress</option>
                    <option <?php echo $row['status_id']=='3' ? 'selected' :''?> value="3">Done</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="datetime-local" value="<?php echo $row['task_datetime'] ?>" name="data" class="form-control" id="task-date" required/>
            </div>
            <div class="mb-0">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="10" id="task-description" required><?php echo $row['description'] ?></textarea>
            </div>

            </div>
            <div class="modal-footer">
                <a href="index.php" class="btn btn-white">Cancel</a>
                <button type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</button>
                <button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</button>
            </div>
    </form>
    </div>
</div>
<?php } ?>
<!-- ================== BEGIN core-js ================== -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="scripts.js"></script>

<!-- ================== END core-js ================== -->
</body>
</html>