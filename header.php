<nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-center">
  <div class="container">
      <a href="/" class="navbar-brand d-flex w-50 me-auto">Task System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
          <ul class="navbar-nav w-100 justify-content-center">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php">My Tasks</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">New Task</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">History</a>
              </li>
          </ul>
          <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> My Account </a>
                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="userdetails.php    ">My Data</a></li>
                      <li><a class="dropdown-item" href="#">Logout</a></li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>
</nav>
<script type="text/javascript">
    function remove() {
        var frm = document.getElementById("frm-remove");
        var tasks = document.getElementsByName("selectedTask");
        var selectedTask;

        for(var i = 0; i < tasks.length; i++) {
        if(tasks[i].checked)
            selectedTask  = tasks[i].value;
        }
        frm["task_id"].value = selectedTask;
        frm.action = "remove.php";
        frm.method = "POST";
        frm.submit();
    }
</script>
