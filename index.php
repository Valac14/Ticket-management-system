<?php
include "db_config.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card mt-5">
                    <div class="card-header">
                        Create a new ticket. (Normal Users i.e Branch Users)
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-floating ">
                                <label for="floatingInput">Ticket name:</label>
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Enter the ticket name">

                            </div>
                            <br>
                            <div class="form-floating">
                                <label for="floatingPassword">Ticket topic:</label>
                                <input type="text" class="form-control" id="floatingtext" placeholder="Enter the topic">

                            </div>
                            <br>
                            <label class="form-check-label" for="">Ticket Level: </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Low</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Average</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option3">
                                <label class="form-check-label" for="inlineCheckbox3">High</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option4">
                                <label class="form-check-label" for="inlineCheckbox4">Urgent</label>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="CATEGORY-DROPDOWN">Category</label>
                                <select class="form-control" id="category-dropdown">
                                    <option value="">Select Category</option>
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM categories where parent_id = 0");
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['id']; ?>">
                                        <?php echo $row["category"]; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="SUBCATEGORY">Sub Category</label>
                                <select class="form-control" id="sub-category-dropdown">
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>

                            <div class=" 5 6 mb-3">
                                <label class="form-label" for="">Current branch role:</label>
                                <input type="text" class="form-control" id="" placeholder="e.g Teller/remit/RM/BM">
                            </div>

                            <div class=" 6 mb-3">
                                <label class="form-label" for="">URL:</label>
                                <input type="text" class="form-control" id="" placeholder="e.g:- nrb.org.np">
                            </div>

                            <div class=" 9  10 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Single PC is effected
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Whole branch is effected
                                    </label>
                                </div>
                            </div>



                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>

                    </div>

                </div>
                <div class="notification">
                    <div class="container-1">
                        <div class="card-header">
                            Approval from the Branch Manager.
                        </div>
                        <div class="form-floating">

                            <br>
                            <br>
                            <textarea class="form-control" placeholder="Leave a review here"
                                id="floatingTextarea"></textarea>

                        </div>
                        <br>
                        <br>
                        <button type="button" class="btn btn-success">Approve</button>
                        <button type="button" class="btn btn-danger">Reject</button>


                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
        <script>
            $(document).ready(function () {
                $('#category-dropdown').on('change', function () {
                    var category_id = this.value;
                    $.ajax({
                        url: "get-subcat.php",
                        type: "POST",
                        data: {
                            category_id: category_id
                        },
                        cache: false,
                        success: function (result) {
                            $("#sub-category-dropdown").html(result);
                        }

                    });

                });

                $("#sub-category-dropdown").change(function () {
                    var name = $("#sub-category-dropdown").val()
                    $(".mb-3").hide();
                    $("." + name).show();
                    console.log(name);

                })

            });
        </script>
</body>

</html>