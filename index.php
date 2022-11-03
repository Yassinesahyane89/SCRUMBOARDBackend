<?php
    include('scripts.php');
    $resultToDo = getTasks('To Do')??'';
    $resultDone = getTasks('Done');
    $resultInProgress = getTasks('In Progress');
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
    <style>
        .error {color: #FF0000;}
    </style>
	<!-- ================== END core-css ================== -->
</head>
<body>

	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar change">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">
			<div class="d-flex justify-content-between align-items-center">
				<div>
					<ol class="list-unstyled d-flex p-2">
						<li class="mx-2"><a href="javascript:;">Home</a></li>
						<li >/</li>
						<li class="mx-2">Scrum Board </li>
					</ol>
					<!-- BEGIN page-header -->
					<h1 class="page-header ms-2">
						Scrum Board
					</h1>
					<!-- END page-header -->
				</div>

				<div class="">
                    <button class="btn btn-success rounded-pill"  data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-plus"></i> Add Task</button>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-sm-12 col-md-6 my-3">
					<div class="rounded-top" id="to-do">
						<div class="bg-dark text-white p-2 rounded-top">
							<h4 class="">To do (<span id="to-do-tasks-count"><?= $resultToDo->num_rows ?? 0; ?></span>)</h4>
						</div>
						<div class="d-flex flex-column" id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
                            <?php if($resultToDo!='0'){ while($row = $resultToDo->fetch_assoc()) {?>
                                        <button class="d-flex align-items-center border-0 border-top"">
                                            <div class="col-1 text-success">
                                                <i class=""></i>
                                            </div>
                                            <div class="col-11 text-start">
                                                <div class="fw-800" id="taskTitle"><?php echo $row["title"] ?></div>
                                                <div class="">
                                                    <div class="fw-100 text-muted d-flex" ><?php echo $row["id"]  ?> created in <div  style="margin-left:5px" id="taskDate"><?php echo $row["task_datetime"] ?></div></div>
                                                    <div class="title1" title="<?php echo $row["description"] ?>" id="taskDescription"><?php echo $row["description"] ?></div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="col-11 py-2">
                                                        <span class="btn btn-primary btn-sm" id="taskPriorty"><?php echo $row["priority"] ?></span>
                                                        <span class="btn btn-secondary btn-sm" id="taskType"><?php echo $row["type"] ?></span>
                                                    </div>
                                                    <div class="col-1">
                                                        <a href="updatee.php?id=<?php echo $row['id'] ?>"><i class="fs-3 fa-solid fa-pen-to-square"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                            <?php } }else{?>
                                <div class="bg-light text-danger text-center p-3  fw-800">No Task Here !!!!!</div>
                            <?php }?>
						</div>
					</div>
				 </div>
				 <div class="col-lg-4 col-sm-12 col-md-6 my-3">
					<div class="d-flex flex-column" id="in-progress">
						<div class="bg-dark text-white p-2 rounded-top">
							<h4 class="">In Progress (<span id="in-progress-tasks-count"><?= $resultInProgress->num_rows ?? 0; ?></span>)</h4>

						</div>
						<div class="d-flex flex-column" id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->
                            <?php if($resultInProgress!='0'){ while($row = $resultInProgress->fetch_assoc()) {?>
                                <button class="d-flex align-items-center border-0 border-top"">
                                <div class="col-1 text-success">
                                    <i class=""></i>
                                </div>
                                <div class="col-11 text-start">
                                    <div class="fw-800" id="taskTitle"><?php echo $row["title"] ?></div>
                                    <div class="">
                                        <div class="fw-100 text-muted d-flex" ><?php echo $row["id"]  ?> created in <div  style="margin-left:5px" id="taskDate"><?php echo $row["task_datetime"] ?></div></div>
                                        <div class="title1" title="" id="taskDescription"><?php echo $row["description"] ?></div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="col-11 py-2">
                                            <span class="btn btn-primary btn-sm" id="taskPriorty"><?php echo $row["priority"] ?></span>
                                            <span class="btn btn-secondary btn-sm" id="taskType"><?php echo $row["type"] ?></span>
                                        </div>
                                        <div class="col-1">
                                            <a href="updatee.php?id=<?php echo $row['id'] ?>"><i class="fs-3 fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </button>
                            <?php } }else{?>
                                <div class="bg-light text-danger text-center p-3  fw-800">No Task Here !!!!!</div>
                            <?php }?>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-12 col-md-6 my-3">
					<div class="" id="done">
						<div class="bg-dark text-white p-2 rounded-top">
							<h4 class="">Done (<span id="done-tasks-count"><?= $resultDone->num_rows ?? 0; ?></span>)</h4>

						</div>
						<div class="d-flex flex-column" id="done-tasks">
							<!-- DONE TASKS HERE -->
                            <?php if($resultDone!='0'){ while($row = $resultDone->fetch_assoc()) {?>
                                <button class="d-flex align-items-center border-0 border-top"">
                                <div class="col-1 text-success">
                                    <i class=""></i>
                                </div>
                                <div class="col-11 text-start">
                                    <div class="fw-800" id="taskTitle"><?php echo $row["title"] ?></div>
                                    <div class="">
                                        <div class="fw-100 text-muted d-flex" ><?php echo $row["id"]  ?> created in <div  style="margin-left:5px" id="taskDate"><?php echo $row["task_datetime"] ?></div></div>
                                        <div class="title1" title="" id="taskDescription"><?php echo $row["description"] ?></div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="col-11 py-2">
                                            <span class="btn btn-primary btn-sm" id="taskPriorty"><?php echo $row["priority"] ?></span>
                                            <span class="btn btn-secondary btn-sm" id="taskType"><?php echo $row["type"] ?></span>
                                        </div>
                                        <div class="col-1">
                                            <a href="updatee.php?id=<?php echo $row['id'] ?>"><i class="fs-3 fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </button>
                            <?php } }else{?>
                                <div class="bg-light text-danger text-center p-3  fw-800">No Task Here !!!!!</div>
                            <?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END #content -->

		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->

	<!-- TASK MODAL -->
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="scripts.php" method="POST" id="form-task">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Task</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body"
                        <!-- This Input Allows Storing Task Index  -->
                        <input type="hidden" id="task-id">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" value="" class="form-control" name="title" id="task-title"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <div class="ms-3">
                                <div class="form-check mb-1">
                                    <input class="form-check-input" name="type" type="radio" value="1" id="task-type-feature" required/>
                                    <label class="form-check-label" for="task-type-feature">Feature</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="type" type="radio" value="2" id="task-type-bug" checked/>
                                    <label class="form-check-label" for="task-type-bug">Bug</label>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Priority</label>
                            <select class="form-select" id="task-priority" name="priority">
                                <option value="">Please select</option>
                                <option value="1">Low</option>
                                <option value="3">Medium</option>
                                <option value="2">High</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label><select class="form-select" id="task-status" name="status">
                                <option value="$_GET['title']">Please select</option>
                                <option value="1">To Do</option>
                                <option value="2">In Progress</option>
                                <option value="3">Done</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="data" class="form-control" id="task-date" required/>
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="10" id="task-description" required ></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                         <a href="index.php" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                         <button  type="submit" name="save" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
    <script src="scripts.js"></script>

	<!-- ================== END core-js ================== -->
</body>
</html>