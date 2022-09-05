function edit() {
    return confirm("تعديل ؟");
}


function del() {
    return confirm("إستمرار المسح ؟");
}



function academic_year_suspend() {
    return confirm("أستمرار إيقاف العام الدراسي قد يؤثر علي البحث و إضافة الطالب و الاقساط و عمليات أخري !! قم بتشغيل عام آخر بعد إيقاف هذا العام !");
}


function studentTrashed() {
    return confirm("سوف يتم إعادة الطالب للفصل الرجاء التأكد من انة لم تتم إضافة طالب آخر بنفس الإسم لنفس الفصل !! لتفادي التكرار");
}


function teacherTrashed() {
    return confirm("سوف يتم إعادة المدرس لقائمة المدرسين الرجاء التأكد من انة لم تتم إضافة مدرس آخر بنفس الإسم !! لتفادي التكرار");
}


function classTrashed() {
    return confirm("سوف يتم إعادة الفصل لقائمة الفصول الرجاء التأكد من انة لم تتم إضافة فصل آخر بنفس الإسم !! لتفادي التكرار");
}


function subjectTrashed() {
    return confirm("سوف يتم إعادة المادة لقائمة المواد الرجاء التأكد من انة لم تتم إضافة مادة آخرى بنفس الإسم !! لتفادي التكرار");
}




$(document).ready(function() {
    $("#show1").click(function() {
        $("#menu1").toggle();
    });
});


$(document).ready(function() {
    $("#show2").click(function() {
        $("#menu2").toggle();
    });
});



/*  Submit form */
