let catagory_price = parseInt($('#academicprice').val());
let quantity = 1;
let academicLevel_price = 0;
let grammerly = 0;
let copySpace = 0;
let turnitin = 0;
let deadlinePrice=0;
let typeOfPaperPrice=0;
let plagirism_total = grammerly + copySpace + turnitin;
let total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total) + deadlinePrice + typeOfPaperPrice;
let store_price = $('#mainprice').val(total_price)
let display_price = $('.displayPrice').text(total_price);
$('#price').text(total_price);


//============================++++++++++++++ Dynamically Show DeadLine
$('.deadline').on('change', function () {
    $('.deadline_for_client').text($(this).val())
})


// This Is Only Catagory prices Gets And Stores Script





// ***************Edit and Proofreading Script


// ***************Content Writing Script


$('#content-writing').on('change', function () {


    catagory_price = parseInt($('#contentprice').val());
    plagirism_total = grammerly + copySpace + turnitin;
    total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
    store_price = $('#mainprice').val(total_price)
    display_price = $('.displayPrice').text(total_price);
    $('#price').text(total_price);


})



// This Is Only Academic Level prices Gets And Stores Script

// ***************Academic High school Script

$('#academic_levelhIGH').on('change', function () {
    academicLevel_price = parseInt($('#highschoolprice').val())
    plagirism_total = grammerly + copySpace + turnitin;
    total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
    store_price = $('#mainprice').val(total_price)
    display_price = $('.displayPrice').text(total_price);
    $('#price').text(total_price);
    $('.aclevel_for_client').text('High School');

})

// ***************Academic UnderGraduate Script
$('#academic_levelUND').on('change', function () {
    academicLevel_price = parseInt($('#undergraprice').val())
    plagirism_total = grammerly + copySpace + turnitin;
    total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
    store_price = $('#mainprice').val(total_price)
    display_price = $('.displayPrice').text(total_price);
    $('#price').text(total_price);
    $('.aclevel_for_client').text('UnderGraduate');


})


// ***************Academic Bacholer Script
$('#academic_levelBACH').on('change', function () {

    academicLevel_price = parseInt($('#bacholerprice').val())
    plagirism_total = grammerly + copySpace + turnitin;
    total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
    store_price = $('#mainprice').val(total_price)
    display_price = $('.displayPrice').text(total_price);
    $('#price').text(total_price);
    $('.aclevel_for_client').text('Bachelor');


})
// ***************Academic Professional Script


$('#academic_levelPROF').on('change', function () {
    academicLevel_price = parseInt($('#professprice').val())
    plagirism_total = grammerly + copySpace + turnitin;
    total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
    store_price = $('#mainprice').val(total_price)
    display_price = $('.displayPrice').text(total_price);
    $('#price').text(total_price);
    $('.aclevel_for_client').text('Professional');




})

// This Is Only Quantity Increase and Decrease and set prices Gets And Stores Script


// **********This is Quantity Decrease

$('#pages_input_minus_input').on('click', function () {
    // alert(pageQty)
    let inputcount = $('#input_count')
    //  quantity=$('#input_count').val();
    //  alert(quantity-1)
    //  $('#input_count').val(quantity)
    let minus = inputcount.val();
    quantity = inputcount.val(minus - 1)

    if (inputcount.val() == 0) {
        inputcount.val(1)
    }
    quantity = $('#input_count').val()
    plagirism_total = grammerly + copySpace + turnitin;
    total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
    store_price = $('#mainprice').val(total_price)
    display_price = $('.displayPrice').text(total_price);
    $('#price').text(total_price);

    $('#words').text(quantity * 250);
    $('#pages').text(quantity);
    $('.quantity_for_client').text(quantity);

})

// **********This is Quantity Decrease

$('#pages_input_plus_input').on('click', function () {
    // alert(mainprice);
    let inputcount = $('#input_count');
    let add = inputcount.val();
    inputcount.val(parseInt(add) + 1)
    quantity = $('#input_count').val();
    plagirism_total = grammerly + copySpace + turnitin;
    total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
    store_price = $('#mainprice').val(total_price)
    display_price = $('.displayPrice').text(total_price);
    $('#price').text(total_price);


    $('#words').text(quantity * 250);
    $('#pages').text(quantity);
    $('.quantity_for_client').text(quantity);
    $('.quantity_for_client').text(quantity);


})

// This Is Only Plagirism Services Add prices Gets And Stores Script

//############### With Report
$('#plagirismwith').on('change', function () {
    document.querySelector('#reportWithShow').setAttribute('style', 'display:block;')
})
//############### Without Report
$('#plagirismwithout').on('change', function () {
    document.querySelector('#reportWithShow').setAttribute('style', 'display:none;')
    plagirism_total=0;
    total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
    store_price = $('#mainprice').val(total_price)
    display_price = $('.displayPrice').text(total_price);
    $('#price').text(total_price);
    // document.getElementById('grammerly').checked;
    
    if (document.getElementById('grammerly').checked==true) {
        document.getElementById('grammerly').click();
    }
    if (document.getElementById('content').checked==true) {
        document.getElementById('content').click();
    }
    if (document.getElementById('turnitin').checked==true) {
        document.getElementById('turnitin').click();
    }

    

   

})


// ** ####### Grammerly Price


$('#grammerly').on('change', function () {
    // alert(cataContent)
    if ($(this).val() == '') {
        $(this).val('Grammerly');
        grammerly = parseInt($('#grammerly_price').val());
        plagirism_total = grammerly + copySpace + turnitin;
        total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
        store_price = $('#mainprice').val(total_price)
        display_price = $('.displayPrice').text(total_price);
        $('#price').text(total_price);


    } else if ($(this).val() == 'Grammerly') {
        $(this).val('');
        grammerly = 0;
        plagirism_total = grammerly + copySpace + turnitin;
        total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
        store_price = $('#mainprice').val(total_price)
        display_price = $('.displayPrice').text(total_price);
        $('#price').text(total_price);


    }
})

//**####### Copy Space Price

$('#content').on('change', function () {
    // alert($('#mainprice').val());
    if ($(this).val() == '') {
        $(this).val('copySpace');
        copySpace = parseInt($('#copyspace_price').val());
        plagirism_total = grammerly + copySpace + turnitin;
        total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
        store_price = $('#mainprice').val(total_price)
        display_price = $('.displayPrice').text(total_price);
        $('#price').text(total_price);



    } else if ($(this).val() == 'copySpace') {
        $(this).val('')
        copySpace = 0;
        plagirism_total = grammerly + copySpace + turnitin;
        total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
        store_price = $('#mainprice').val(total_price)
        display_price = $('.displayPrice').text(total_price);
        $('#price').text(total_price);

    }

})
//**####### Trunitin Price


$('#turnitin').on('change', function () {
    if ($(this).val() == '') {
        $(this).val('turnitins');
        turnitin = parseInt($('#turnitin_price').val());
        plagirism_total = grammerly + copySpace + turnitin;
        total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
        store_price = $('#mainprice').val(total_price)
        display_price = $('.displayPrice').text(total_price);
        $('#price').text(total_price);



    } else if ($(this).val() == 'turnitins') {
        $(this).val('')
        turnitin = 0
        plagirism_total = grammerly + copySpace + turnitin;
        total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
        store_price = $('#mainprice').val(total_price)
        display_price = $('.displayPrice').text(total_price);
        $('#price').text(total_price);




    }

})




// Fix Div on scroll

var fixmeTop = $('.summary__wrapper-stickly').offset().top;       // get initial position of the element

$(window).scroll(function() {                  // assign scroll event listener

    var currentScroll = $(window).scrollTop(); // get current position

    if (currentScroll >= fixmeTop) {           // apply position: fixed if you
        $('.summary__wrapper-stickly').css({                      // scroll to that element or below it
            position: 'fixed',
            top: '',
            left: ''
        });
    } else {                                   // apply position: static
        $('.summary__wrapper-stickly').css({                      // if you scroll above it
            position: 'static'
        });
    }

});




//============================ Select the date and related price in calender Script============================
$(function () {
    // Define the date ranges and prices
    var priceData = {
        "2023-06-1": 100,
        "2023-06-26": 2000,
        "2023-06-25": 3100,
        "2023-06-24": 4100,
        "2023-06-17": 5100,
        "2023-06-20": 7100,
        "2023-06-21": 6100,
        "2023-06-22": 9100,
        "2023-06-23": 99100,
        "2023-06-18": 150,
        "2023-06-19": 200,
        // Add more dates and prices as needed
    };

    $('#datepicker').datepicker({
        minDate: 0
    });

    $('.deadline').on('change', function () {
        $.ajax({
            type: "POST",
            url: "getDatePrice.php",
            // dataType: "json",
            data: "data",
            success: function (response) {
                console.log(response);
                var selectedDate = $('#datepicker').datepicker('getDate');
                var selectedDateString = $.datepicker.formatDate('yy-mm-dd', selectedDate);
                var price = response[selectedDateString];
                if (price==undefined){
                    price=0
                }
                $('#displayDeadlinePrice').text('Price: ' + (price ? '$' + price : '0'));
                deadlinePrice=price;
                total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
                store_price = $('#mainprice').val(total_price)
                display_price = $('.displayPrice').text(total_price);
                $('#price').text(total_price);
            }
        });
    });
});
//============================ Select the Price According to your Type od paper============================
$('.paperPrice').on('change',function (){
    let formdata=$(this).val();
    let pricevalarray=formdata.split("/")
   let PaperPrice= parseInt(pricevalarray[1]) ;
    typeOfPaperPrice=PaperPrice
    if (pricevalarray=="Other" || pricevalarray=='Select Type'){
        typeOfPaperPrice=0;
    }

    total_price = (catagory_price + academicLevel_price) * quantity + (plagirism_total)+ deadlinePrice+ typeOfPaperPrice;
    store_price = $('#mainprice').val(total_price)
    display_price = $('.displayPrice').text(total_price);
    $('#price').text(total_price);

});


