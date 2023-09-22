<?php
    include('../connection/conection.php');
    include ('./include/header.php');
    include ('./include/sidebar.php');
?>

<!-- Main Content -->

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <a href="assignment.php"><button type="btn" class="btn btn-primary mb-3" style="margin-left :91%;">
                            Add Assignment</button></a>
                    <div class="card">
                        <div class="card-header">
                            <h4>Assignment Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Add Assignment</th>
                                            <th>Choose Assignment Deadline</th>
                                            <th>Pages (250 words 1 Page)</th>
                                            <th>Description</th>
                                            <th>Enter Your Budget</th>
                                            <th>Date</th>
                                            <th>Assignment Picture</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                            <tbody>
                                                    <?php
                                                        $sql="SELECT * FROM `assign`";
                                                        $run=mysqli_query($conn,$sql);
                                                        while($fet=mysqli_fetch_assoc($run)){
                                                    ?>
                                                <tr>
                                                    <td><?php echo $fet['add_assign'];?></td>
                                                    <td><?php echo $fet['a_dead_line'];?></td>
                                                    <td><?php echo $fet['a_word'];?></td>
                                                    <td><?php echo $fet['des'];?></td>
                                                    <td><?php echo $fet['a_budget'];?></td>
                                                    <td><?php echo $fet['date'];?></td>
                                                    <td>
                                                        <?php
                                                            $pic=explode(",",$fet['spic']);
                                                            foreach($pic as $p){
                                                        ?>
                                                            <img src="<?php echo "./imgs/".$p ?>" width="60" height="50"
                                                                 alt="" srcset="">
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="td"><a class="btn btn-primary"
                                                        href="./update.php?uid=<?php echo $fet['aid'] ?>">Update</a></td>
                                                    <td class="td"><button type="button" class="btn btn-danger delete"
                                                        data-del="<?php echo $fet['aid'] ?>">Delete</button></td>
                                                </tr>
                                                    <?php
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php 
    include ('./include/footer.php');
?>

<script>
    $(document).ready(function() {
        $(document).on("click", ".delete", function() {
            var del = $(this).data("del");
            // alert(del);
            var msg = this;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "./files/assign_del.php",
                        method: "GET",
                        data: {
                            yourdel: del
                        },
                        success: function(res) {
                        // alert(res);
                        if (res == 1) {
                            const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter',
                                            Swal.stopTimer)
                                        toast.addEventListener('mouseleave',
                                        Swal.resumeTimer)
                                    }
                                })
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Assignment Has Been Deleted'
                                })
                                $(msg).closest("tr").fadeOut();
                            } else {
                                alert("Assignment HAS NOT BEEN DELETED");
                            }
                        }
                    })
                }
            })
        })
    })
</script>