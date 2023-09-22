<?php
    include ('./include/header.php');
    include ('./include/sidebar.php');
?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <a href="viewassignment.php"><button type="btn" class="btn btn-primary mb-5"
                            style="margin-left:78%;">
                            View Assignment</button></a>
                    <div class="card ">
                        <form id="myassignment">
                            <div class="card-header">
                                <h4>Assignment</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <button type="btn" class="btn btn-primary" name="add_assign"> Add Assignment</button>
                                    <!-- <button type="btn" class="btn btn-primary" name="add_assign"><a href="https://myassignmentwritinghelp.com/"> Add Assignment </a></button> -->
                                </div>
                                <div class="form-group">
                                    <label>Choose Assignment Deadline</label>
                                    <input type="date" name="a_dead_line" id="" class="form-control" required>
                                    <span id="errorname"></span>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Pages (250 words 1 Page)</label>
                                    <input type="number" class="form-control" id="" name="a_word" required="">
                                    <span id="errorstock"></span>
                                </div>
                                <br>
                                <div class="form-group mb-0">
                                    <label>Enter Your Message</label>
                                    <textarea class="form-control" id="des" name="des" required></textarea>
                                    <span id="errordes"></span>
                                </div>
                                <br>
                                <div class="form-group mb-0">
                                    <input type="file" name="spic[]" multiple class="form-control" required="">
                                </div>
                                <br>
                                <div class="form-group mb-0">
                                    <label>Enter Your Budget</label>
                                    <input class="form-control" id="stock" name="a_budget" required="">
                                    <span id="errorstock"></span>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" type="submit"
                                    name="sub" id="btn" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
    include ('./include/footer.php');
?>

<script>
$(document).ready(function() {
    $("#btn").on("click", function(e) {
        // alert("run");
        e.preventDefault();
        var mydata = new FormData(myassignment);
        $.ajax({
            url: "./files/assignment_insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                alert(res);
                if (res == 1){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Assignment Has Been Inserted successfully'
                    })
                    // alert("CATEGORY HAS BEEN INSERTED");
                    $('#myassignment').trigger('reset');
                } else if(res == 2) {
                    alert("Assignment HAS BEEN NOT INSERTED");
                } else {
                    alert ("Img is not right")
                }
            }
        });
    });
});
</script>

<!--================== form validation ==================-->

<script>
    // const form = document.querySelector("form");
      
    // form.addEventListener("submit", (event) => {
    //     event.preventDefault();
    //     const name = document.querySelector("#name").value;
    //     const des = document.querySelector("#des").value;
    //     if (!name.match(/^[A-Za-z]*$/)){
    //         // const Toast = Swal.mixin({
    //         //             toast: true,
    //         //             position: 'top-end',
    //         //             showConfirmButton: false,
    //         //             timer: 2000,
    //         //             timerProgressBar: true,
    //         //             didOpen: (toast) => {
    //         //                 toast.addEventListener('mouseenter', Swal.stopTimer)
    //         //                 toast.addEventListener('mouseleave', Swal
    //         //                     .resumeTimer)
    //         //             }
    //         //         })

    //         //         Toast.fire({
    //         //             icon: 'error',
    //         //             title: 'Name must only contain letters'
    //         //         })
    //         document.querySelector("#errorname").innerHTML="Name must only Contain letters."; 
    //     }else if (!des.match(/^[A-Za-z]*$/)){
    //         document.querySelector("#errordes").innerHTML="Name must only letters.";
    //     }else {
    //         alert("Form submitted successfully!");
    //         document.querySelector("#errorname").innerHTML="";
    //         document.querySelector("#errordes").innerHTML="";
    //     }
    // });

    var tr=document.getElementById("name");
        tr.addEventListener("input",(e)=>{
        var name=e.target.value;
        if (!name.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errorname").innerHTML="Name must only Contain letters.";
        }else{
            document.getElementById("errorname").innerHTML="";
        }
    })

    var tr=document.getElementById("des");
        tr.addEventListener("input",(e)=>{
        var name=e.target.value;
        if (!name.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errordes").innerHTML="Name must only Contain letters.";
        }else{
            document.getElementById("errordes").innerHTML="";
        }
    })


</script>