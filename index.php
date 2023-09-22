<?php
include('./connection/conection.php');
$validFileerror;


if (isset($_POST['submits'])) {

    $extenstions = array('png', 'jpeg', 'jpg');
    $assignmentFile = $_FILES['assignemtfile']['name'];
    $exploadfile = explode('.', $assignmentFile);
    $getFileExt = end($exploadfile);
    print_r($extenstions);
    if (in_array($getFileExt, $extenstions) || $assignmentFile == '') {

        $_SESSION['post'] = $_POST;
        $_SESSION['imgfiles'] = $assignmentFile;
        move_uploaded_file($_FILES['assignemtfile']['tmp_name'], "./assignmentimage/" . $assignmentFile);
        header('location:./orderPlace.php');
    } else {
        $validFileerror = "Choose file only png , jpeg , jpg ";
    }
}


// ===========================Fetch Prices Script
$pricing = "SELECT * FROM `princing` WHERE 1";
$pricingrun = mysqli_query($conn, $pricing);
$fetchs = mysqli_fetch_assoc($pricingrun);
// print_r($fetchs);
?>


<!DOCTYPE html>
<html lang="en">


<body style="background-color: #f7f7f7;">
    <?php
include_once('./header.php');
?>
    <div data-path="order" class="main-wrapper main-wrapper-banner">
        <section class="order-wrapper-container"></section>

        <div class="order-form-contai">
            <div class="order-form-container__background"></div>
            <div class="container">
                <div id="newdesign-order" class="form-wrap ">


                    <div class="loader_order_form " style="display: none;">
                        <div class="loader_order_form_inner" style="display: none;"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="order-title">Order Form</h1>

                        </div>
                        <div class="col-12 text-center">
                            <div class="order-title-block">
                                <div class="order-title-t">
                                    Secure and confidential
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" id="_order_form" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="order-setep__wrapper">
                                <div id="order-form" class="order-form-pay">
                                    <div id="tab-1" class="tab-contents active-step">
                                        <div class="order-form-inner">

                                            <input type="hidden" name="totalPrice" value="" id="mainprice">


                                            <div class="row form-block" data-tos="">
                                                <div class="container-12">
                                                    <div class="btn-group group-type-services btn-group-level btn-group-toggle d-flex justify-content-around"
                                                        data-toggle="buttons" data-type-of-work="">
                                                        <label class="btn btn-secondary btn-custom active">
                                                            <div class="type-services-item">
                                                                <input class="services-academic-writing" type="radio"
                                                                    name="type_of_work" value="1" id="academic-writing"
                                                                    autocomplete="off" checked>
                                                                <div class="type-services-bold">Academic writing</div>
                                                                <input type="hidden" id="academicprice"
                                                                    value="<?php echo $fetchs['academicwriting_price'] ?>">
                                                                <!-- <div class="type-services-light">Writing from scratch
                                                            </div> -->
                                                            </div>
                                                        </label>
                                                        <label class="btn btn-secondary btn-custom ">
                                                            <div class="type-services-item">
                                                                <input class="services-editing-proofreading"
                                                                    type="radio" name="type_of_work" value="2"
                                                                    id="editing-proofreading" autocomplete="off">
                                                                <div class="type-services-bold">Editing & Proofreading
                                                                </div>
                                                                <input type="hidden" id="proofreadprice"
                                                                    value="<?php echo $fetchs['proofreading_price'] ?>">
                                                                <!-- <div class="type-services-light">Paper improvement</div> -->
                                                            </div>
                                                        </label>
                                                        <label class="btn btn-secondary btn-custom ">
                                                            <div class="type-services-item">
                                                                <input class="services-calculations" type="radio"
                                                                    name="type_of_work" value="3" id="content-writing"
                                                                    autocomplete="off">
                                                                <div class="type-services-bold">Content Writing</div>
                                                                <input type="hidden" id="contentprice"
                                                                    value="<?php echo $fetchs['contentwriting_price'] ?>">
                                                                <!-- <div class="type-services-light">Problem solving</div> -->
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row form-block  academic_levelhideshow" id="academic_level">
                                                <div class="container-12 academic-level-block">
                                                    <div class="wrap-lable academic_level_error_place"
                                                        data-ph-tst="of-acdm_lvl">
                                                        Academic Level
                                                    </div>
                                                    <div class="block-academic-level">
                                                        <div class="btn-group btn-group-level btn-group-toggle d-flex justify-content-around"
                                                            data-toggle="buttons">
                                                            <label data-ph-tst="of-hischl"
                                                                class="btn btn-secondary btn-custom academic_writing">
                                                                <input type="radio" name="academic_level" value="1001"
                                                                    data-academ-level-name="High School"
                                                                    id="academic_levelhIGH" autocomplete="off"> High
                                                                School
                                                            </label>
                                                            <input type="hidden" id="highschoolprice"
                                                                value="<?php echo $fetchs['academicwriting_highschool_price'] ?>">

                                                            <label data-ph-tst="of-colg"
                                                                class="btn btn-secondary btn-custom academic_writing ">
                                                                <input type="radio" name="academic_level" value="1002"
                                                                    data-academ-level-name="Undergraduate"
                                                                    id="academic_levelUND" autocomplete="off" checked>
                                                                Undergraduate
                                                            </label>
                                                            <input type="hidden" id="undergraprice"
                                                                value="<?php echo $fetchs['academicwriting_undergraduate_price'] ?>">

                                                            <label data-ph-tst="of-unrst"
                                                                class="btn btn-secondary btn-custom academic_writing">
                                                                <input type="radio" name="academic_level" value="1003"
                                                                    data-academ-level-name="Bachelor"
                                                                    id="academic_levelBACH" autocomplete="off"> Bachelor
                                                            </label>
                                                            <input type="hidden" id="bacholerprice"
                                                                value="<?php echo $fetchs['academicwrting_bachelor_price'] ?>">

                                                            <label data-ph-tst="of-phd"
                                                                class="btn btn-secondary btn-custom academic_writing">
                                                                <input type="radio" name="academic_level" value="1004"
                                                                    data-academ-level-name="Professional"
                                                                    id="academic_levelPROF" autocomplete="off">
                                                                Professional
                                                            </label>
                                                            <input type="hidden" id="professprice"
                                                                value="<?php echo $fetchs['academicwriting_professional_price'] ?>">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-block">
                                                <div class="col" data-hide-block-calculations=""
                                                    data-ignore-for-excel="1">
                                                    <div class="wrap-lable type_of_paper_error_place"
                                                        data-ph-tst="of-t_of_p">Type of Paper
                                                    </div>
                                                    <div class="wrap-select-arrow block-type-of-paper d-flex">
                                                        <select id="type_of_paper" name="type_of_paper"
                                                            class="dynamic-hints  select2-of paperPrice" required>
                                                            <option> Select the Topic</option>

                                                            <span id="specificTypeOfPaper">

                                                            </span>

                                                            <option data-top-category="" data-tow-writing="1"
                                                                data-tow-editing="1">Other
                                                            </option>
                                                        </select>
                                                        <i class="fa-solid fa-angle-down  "
                                                            style="margin-left:-30px; margin-top:18px;"></i>
                                                    </div>
                                                </div>

                                                <div class="subject-area-placeholder col"
                                                    data-show-block-calculations="" data-ignore-for-excel="1"
                                                    style="display: none">

                                                    <div class="wrap-lable subject_error_place text-left"></div>
                                                </div>


                                            </div>

                                            <div
                                                class="row form-block align-items-end new_column-box d-flex justify-content-between">
                                                <div class="col-6 col-md-3 col-lg-4">
                                                    <div class="wrap-lable pages_quantity">Quantity</div>
                                                    <div class="plus-minus-input d-flex">
                                                        <div class="input-group-button">
                                                            <button type="button"
                                                                class="button hollow circle _pages_decr"
                                                                data-quantity="minus" id="pages_input_minus_input"
                                                                data-field="quantity">
                                                                -
                                                            </button>
                                                        </div>
                                                        <input id="input_count" maxlength="5"
                                                            class="input-group-field _words " type="number" name="pages"
                                                            value="1">

                                                        <div class="input-group-button">
                                                            <button type="button"
                                                                class="button hollow circle _pages_incr"
                                                                data-quantity="plus" data-field="quantity"
                                                                id="pages_input_plus_input">
                                                                +
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-12 col-md-4 d-flex justify-content-start align-items-end flex-column">
                                                    <div class="switch-pages__spaced" data-hide-block-calculations="">
                                                        <div class="spacing__info"><span class="spaced-count-words"
                                                                id="words">250</span> words = <span
                                                                class="spaced-count-pages" id="pages">1</span> <span
                                                                class="spaced-count-pages-word">page</span></div>
                                                        <div class="switch-spacing__element">
                                                            <div class="switch-spacing">
                                                                <div class="spacing-radio double_spaced active-btn"
                                                                    data-type="2" data-arr="double_spaced"
                                                                    data-ph-tst="of-dbl_scd">double-spaced
                                                                </div>
                                                                <div class=" spacing-radio single-spaced" data-type="1"
                                                                    data-arr="single_spaced" data-ph-tst="of-sgl_scd">
                                                                    single-spaced
                                                                </div>
                                                                <input type="hidden" name="spacing" value="2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-problems-count" data-show-block-calculations=""
                                                        style="display: none">1 problem = 1 question in your assignment
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row form-block">
                                                <div class="col-sm-12 datetimepicker_wrap datepricker-new-addon">
                                                    <div
                                                        class="wrap-lable deadline_error_place deadline_picker_error_place">
                                                        Deadline
                                                    </div>
                                                    <!-- <input name="deadline" type="date" class="form-control" id="deadline" required> -->
                                                    <div class="d-flex">

                                                        <input type="text" id="datepicker" name="deadline"
                                                            class="form-control deadline" required />
                                                        <i class="fa-solid fa-calendar-days"
                                                            style="margin-left:-40px; margin-top:18px;"></i>
                                                        <p class="text-end" id="displayDeadlinePrice"
                                                            style="margin-top:13px; margin-left:-160px;"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="form--quick" class="content__inner" style="display:block">
                                                <div class=" element-block">

                                                    <div class="wrap-lable">Paper Instructions<span
                                                            class="empty-margin"></span></div>
                                                    <div class="_files-drop-zone topic-paper-details-block">
                                                        <div class="topic-block">
                                                            <input autocomplete="off" placeholder="Your Topic"
                                                                class="form-element" id="topic-input--quick"
                                                                data-ph-tst="of-tpc-qf" data-column-name="topic"
                                                                type="text" name="topic" required>
                                                        </div>
                                                        <div class="_files-drop-zone-con">
                                                            <textarea name="paper_details" data-ph-tst="of-ppr_dtls-qf"
                                                                data-column-name="paper_details"
                                                                id="paper_details--quick"
                                                                placeholder="Describe your paper, Assignment, Essay ,content Writing Detals"
                                                                required></textarea>
                                                            <div class="quick-forn__file-wrap">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-lable topic_error_place"></div>
                                                    <div class="wrap-lable paper_details_error_place"></div>

                                                    <div class="container-row mt-3">
                                                        <div class="container-12">
                                                            <div role="presentation" class=""
                                                                style="border:1px dashed gray; border-radius:5px;">
                                                                <input class="p-3" type="file" name="assignemtfile">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="wrapper__border wrapper__border--quick wrapper__border-plagiarism">
                                                    <div class="order-summary">
                                                        <div class="order-summary__wrapper">
                                                            <div class="block-academic-level">
                                                                <div class="btn-group btn-group-level btn-group-toggle d-flex justify-content-around"
                                                                    data-toggle="buttons">


                                                                    <label data-ph-tst="of-unrst"
                                                                        class="btn btn-secondary btn-custom ">
                                                                        <input type="radio" name="plagirism" value="1"
                                                                            data-academ-level-name="Bachelor"
                                                                            id="plagirismwith" autocomplete="off">
                                                                        Plagiarism With Report
                                                                    </label>

                                                                    <label data-ph-tst="of-phd"
                                                                        class="btn btn-secondary btn-custom ">
                                                                        <input type="radio" name="plagirism" value="0"
                                                                            data-academ-level-name="Professional"
                                                                            id="plagirismwithout" autocomplete="off">
                                                                        Plagiarism Without Report
                                                                    </label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrapper__border wrapper__border--quick wrapper__border-plagiarism "
                                                    style="display: none;" id="reportWithShow">
                                                    <div class="order-summary">
                                                        <div class="order-summary__wrapper">
                                                            <div
                                                                class="plagiarism-extras-holder plagiarism-extras-50 d-flex">
                                                                <div class="checkbox-v _grammerly checkbox-extras-1 "
                                                                    data-toggle="tooltip" title="">
                                                                    <label for="grammerly">
                                                                        <input type="checkbox"
                                                                            data-column-name="grammerly"
                                                                            name="grammerly" value="" id="grammerly">
                                                                        <input type="hidden"
                                                                            value="<?php echo $fetchs['grammerly'] ?>"
                                                                            id="grammerly_price">
                                                                        <span class="check-t check-text">
                                                                            <div class="extras__wrapper">
                                                                                <div
                                                                                    class="pr-extra–title pr-extra–title-vip">
                                                                                    Grammerly</div>
                                                                            </div>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox-v _content checkbox-extras-1 "
                                                                    data-toggle="tooltip" title="">
                                                                    <label for="content">
                                                                        <input type="checkbox"
                                                                            data-column-name="copy_space"
                                                                            name="copy_space" value="" id="content">
                                                                        <input type="hidden"
                                                                            value="<?php echo $fetchs['copy_space'] ?>"
                                                                            id="copyspace_price">

                                                                        <span class="check-t check-text">
                                                                            <div class="extras__wrapper">
                                                                                <div
                                                                                    class="pr-extra–title pr-extra–title-vip">
                                                                                    Copy Space</div>
                                                                            </div>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <div data-remembered="" class="checkbox-v _turnitin "
                                                                    data-toggle="tooltip" title="">
                                                                    <label for="turnitin">
                                                                        <input type="checkbox"
                                                                            data-column-name="turnitin" name="turnitins"
                                                                            value="" id="turnitin">
                                                                        <input type="hidden"
                                                                            value="<?php echo $fetchs['turnitin'] ?>"
                                                                            id="turnitin_price">

                                                                        <span class="check-t check-text">
                                                                            <div class="extras__wrapper">
                                                                                <div
                                                                                    class="pr-extra–title pr-extra–title-vip">
                                                                                    Turnitin</div>
                                                                            </div>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" name="submits" class="btn btn-lg text-light"
                                                    style="background:rgb(255, 114, 0) ;"> Next
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary__wrapper--sidebar" style=" margin-left:200px;">
                                    <div class="summary__wrapper-stickly">
                                        <div class="summary__wrapper">
                                            <div class="summary__item summary__item--essaytitle">
                                                <div class="summary__title">Summary</div>
                                            </div>

                                            <div class="summary_pane scroll-pane"
                                                style="overflow: hidden; padding: 0px; width: 290px;">

                                                <div class="jspContainer" style="width: 290px; height: 190px;">
                                                    <div class="jspPane"
                                                        style="padding: 0px; top: 65px; left: 5px; width: 290px;">
                                                        <div class="summary__item summary__item--essayblock ">
                                                            <div class="summary__item two_writers-summary"
                                                                style="display:none;">
                                                                <div class="top_for_client--block"><span
                                                                        class="top_for_extras--name">2nd version of
                                                                        paper</span><span
                                                                        class="top_for_extras--price"></span></div>
                                                            </div>

                                                            <!-- <div class="top_for_client--block">Essay <span> INR &nbsp;<span
                                                                        class="displayPrice">$15</span></span></div> -->

                                                            <p class="top_for_client--block top_for_client-light">
                                                                Quantity:
                                                                <span> <span class="quantity_for_client"> 1
                                                                    </span>page</span>
                                                            </p>
                                                            <div class="top_for_client--block  top_for_client-light ">
                                                                <span class="top_client-name">Deadline:</span> <span
                                                                    class="deadline_for_client"></span>
                                                            </div>
                                                            <div class="top_for_client--block top_for_client-light">
                                                                <span class="top_client-name">Academic Level:</span>
                                                                <span class="aclevel_for_client"></span>
                                                            </div>
                                                            <div class="top_for_client--block top_for_client-light"
                                                                style="display:none;">
                                                                <span class="top_client-name">Subject area:</span>
                                                                <span class="subject_area-block text-right">Art &amp;
                                                                    architecture</span>
                                                            </div>
                                                            <div class="top_for_client--block top_for_client-light"
                                                                style="display: none;">
                                                                <span class="top_client-name">Slides:</span>
                                                                <span class="slides_for_client">0</span>
                                                            </div>


                                                        </div>
                                                        <div class="summary__item advanced_writer-summary"
                                                            style="display:none;">
                                                            <div class="top_for_client--block"><span
                                                                    class="top_for_extras--name">Advanced <span
                                                                        class="sidebar-calculations">writer</span> <span
                                                                        class="sidebar-calculations-editor"
                                                                        style="display: none">expert</span></span><span
                                                                    class="top_for_extras--price">$9.99</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="price-all-con">
                                                <div class="price-all-container">
                                                    <div class="price-all-container-bl">
                                                        <div class="total-price"><span>TOTAL</span><span class="price"
                                                                data-ph-tst="of-prc">$ <span id="price">15.00</span>
                                                            </span></div>

                                                        <div class="total-price-approx" style="display:none;">
                                                            <div class="d-flex justify-content-between">
                                                                <span>Approximately</span>
                                                                <div class="price-approx-inner">
                                                                    <span class="price-approx">$14.00</span>
                                                                    <span class="info-tooltip"
                                                                        data-tooltip="The payment will be processed in USD. If your card-issuing company or bank uses a different currency, the final transaction price may differ due to currency exchange rates."></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="old-price" style="display:none"><span></span></div>
                                                        <div class="save-price-description"
                                                            style="display:none;color: #818181;font-size: 12px;">
                                                            You save $<span class="save-price-span">26.00</span>
                                                            <span class="bonus-price-span-holder">
                                                                now and get
                                                                $<span class="bonus-price-span-description">0</span>
                                                                for next order
                                                            </span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-3">
                                            <div
                                                class="tabs d-flex justify-content-center justify-content-md-between justify-content-lg-end">
                                                <div
                                                    class="go-back nav-step go_back_link d-none-back-button d-lg-none back-button">
                                                    <span>GO </span>Back
                                                </div>
                                                <button id="btn-check" type="button"
                                                    class="btn-check btn-continue next-btn-step nav-step d-flex go-to-step-2"
                                                    data-ph-tst="of-checkt-btn"><span>NEXT</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="hidden_auth_frame"></div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./custom.js"></script>
    <!-- Check It Up Script -->
    <script defer src="assets/dist/main.min.js"></script>

    <script src="assets/dist/modal/jQueryRotate.js"></script>
    <script>
    // first Time  default Count
    // let defaultPrice = parseInt($('#undergraprice').val()) + parseInt($('#academicprice').val());
    let mainprice = parseInt($('#mainprice').val(defaultPrice));
    $('.top_for_client').text(defaultPrice)

    //=================================== update value on edit froofreading in academic Level
    // $('#editing-proofreading').on('click',function(){
    //     alert('froofreding is working')
    // });
    </script>


    <script>
    //================================================================ This is Editing and proofreading function


    $('#editing-proofreading').on('change', function() {
        document.querySelector('.academic_levelhideshow').classList.remove('d-none');

        let disableActive = document.querySelectorAll('.academic_writing');
        console.log(disableActive);
        for (let i = 0; i < disableActive.length; i++) {
            const element = disableActive[i].classList.remove('active');

        }
        $('#highschoolprice').val(parseInt(<?php echo $fetchs['proofreading_highschool_price'] ?>))
        $('#undergraprice').val(parseInt(<?php echo $fetchs['proofreading_undergraduate_price'] ?>))
        $('#bacholerprice').val(parseInt(<?php echo $fetchs['proofreading_bacholer_price'] ?>))
        $('#professprice').val(parseInt(<?php echo $fetchs['proofreading_professional_price'] ?>))
        academicLevel_price = 0
        typeOfPaperPrice = 0;
        catagory_price = parseInt($('#proofreadprice').val());
        plagirism_total = grammerly + copySpace + turnitin;
        total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total) + deadlinePrice +
            typeOfPaperPrice;
        store_price = $('#mainprice').val(total_price)
        display_price = $('.displayPrice').text(total_price);
        $('#price').text(total_price);
        getPaperTopic();

    })


    //================================================================ this is Academic writing function

    $('#academic-writing').on('change', function() {
        document.querySelector('.academic_levelhideshow').classList.remove('d-none');

        let disableActive1 = document.querySelectorAll('.academic_writing');
        console.log(disableActive1);
        for (let i = 0; i < disableActive1.length; i++) {
            const element = disableActive1[i].classList.remove('active');
        }
        $('#highschoolprice').val(parseInt(<?php echo $fetchs['academicwriting_highschool_price'] ?>))
        $('#undergraprice').val(parseInt(<?php echo $fetchs['academicwriting_undergraduate_price'] ?>))
        $('#bacholerprice').val(parseInt(<?php echo $fetchs['academicwrting_bachelor_price'] ?>))
        $('#professprice').val(parseInt(<?php echo $fetchs['academicwriting_professional_price'] ?>))
        academicLevel_price = 0;
        typeOfPaperPrice = 0;
        catagory_price = parseInt($('#academicprice').val());
        plagirism_total = grammerly + copySpace + turnitin;
        total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total) + deadlinePrice +
            typeOfPaperPrice;
        store_price = $('#mainprice').val(total_price)
        display_price = $('.displayPrice').text(total_price);
        $('#price').text(total_price);
        getPaperTopic();

    })


    // ============================================================================this is Content Writing Script


    $('#content-writing').on('change', function() {

        document.querySelector('.academic_levelhideshow').classList.add('d-none');
        let disableActive = document.querySelectorAll('.academic_writing');
        console.log(disableActive);
        for (let i = 0; i < disableActive.length; i++) {
            const element = disableActive[i].classList.remove('active');

        }
        academicLevel_price = 0;
        typeOfPaperPrice = 0;
        catagory_price = parseInt($('#contentprice').val());
        plagirism_total = grammerly + copySpace + turnitin;
        total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total) + deadlinePrice +
            typeOfPaperPrice;
        store_price = $('#mainprice').val(total_price)
        display_price = $('.displayPrice').text(total_price);
        $('#price').text(total_price);

        let $data={
            content: 'content'
        }

        $.ajax({
            type: "POST",
            url: "./selectPaperTopic.php",
            data: $data,

            success: function(response) {
                console.log($('#type_of_paper'))


                $('#type_of_paper').html(response)
                // conso
            }
        });


    })


    function getPaperTopic(params) {
        $.ajax({
            type: "POST",
            url: "./selectPaperTopic.php",
            data: "",
            processData: false,
            contentType: false,
            success: function(response) {
                console.log($('#type_of_paper'))


                $('#type_of_paper').html(response)
                // conso
            }
        });
    }
    getPaperTopic();
    </script>

</body>

</html>