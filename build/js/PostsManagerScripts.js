document.getElementById("proceedings_file").onchange = function () {
    var proceedings_file_label = document.getElementById("proceedings_file_label");
    if (proceedings_file.value.length !== 0) {
        proceedings_file_label.innerHTML = this.value.replace(/.*[\/\\]/, '');
    }
}
document.getElementById("post_file").onchange = function () {
    var post_file_label = document.getElementById("post_file_label");
    if (post_file.value.length !== 0) {
        post_file_label.innerHTML = this.value.replace(/.*[\/\\]/, '');
    }
}

document.getElementById("postDeliveryMethod").onchange = function () {
    if (postDeliveryMethod.value=='digital'){
        filesTR.hidden=false;
        if (postFormat.value=='پایان نامه'){
            thesisFileTH.hidden=false;
            thesisFileTD.hidden=false;
        }
    }else if(postDeliveryMethod.value=='physical'){
        filesTR.hidden=true;
    }
}
document.getElementById("NewPostForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // دریافت اطلاعات فرم
    var formData = $("#NewPostForm").serialize();
    var postName = $("#postName").val();
    var science_rank = $("#science_rank").val();
    console.log(science_rank);

    // ارسال اطلاعات به سمت سرور
    // $.ajax({
    //     url: "build/php/inc/Add_Post.php",
    //     method: "POST",
    //     data: formData,
    //     success: function(response) {
    //         // عملیات موفقیت‌آمیز
    //         console.log(response);
    //         // انجام دیگر عملیات مورد نیاز
    //     },
    //     error: function(xhr, status, error) {
    //         // خطا در ارسال درخواست
    //         console.log(xhr.responseText);
    //     }
    // });
});