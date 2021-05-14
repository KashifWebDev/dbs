function updateFields(circle1, circle2, circle3, circle4, circle5, circle6, bar1, bar2){
    let value1 = bar1+'%';
    let value2 = bar2+'%';
    $("#first_progress").css("height", value1);
    $("#second_progress").css("height", value2);

    // $("#first_progress").text(value1);
    // $("#second_progress").text(value2);
    $("#vertical_bar_value_1").text(bar1);
    $("#vertical_bar_value_2").text(bar2);
    $(".tempValueFormAPI").text(bar2);
    // console.log("Temp Val: :" + bar2);


    //SETTING ALERT CIRCLES
    if(parseInt(circle1)) {
        add_class('#alarm', 'alert-green');
    }else{
        add_class('#alarm', 'alert-red');
    }
    if(parseInt(circle2)) {
        add_class('#cutoff', 'alert-green');
    }else{
        add_class('#cutoff', 'alert-red');
    }
    if(parseInt(circle3)) {
        add_class('#lift_active', 'alert-green');
    }else{
        add_class('#lift_active', 'alert-red');
    }
    if(parseInt(circle4)) {
        add_class('#water_in_oil', 'alert-green');
    }else{
        add_class('#water_in_oil', 'alert-red');
    }
    if(parseInt(circle5)) {
        add_class('#low_oil', 'alert-green');
    }else{
        add_class('#low_oil', 'alert-red');
    }
    if(parseInt(circle6)) {
        add_class('#loss_motion', 'alert-green');
    }else{
        add_class('#loss_motion', 'alert-red');
    }
}

function add_class(completeElement, className) {
    // console.log("hi");
    if(className=="alert-green"){
        $(completeElement).removeClass('alert-red');
        $(completeElement).addClass('alert-green');
    }else{
        $(completeElement).removeClass('alert-green');
        $(completeElement).addClass('alert-red');
    }
}

