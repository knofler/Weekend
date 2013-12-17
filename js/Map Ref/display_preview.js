function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('wknd_photos_div').attr('src', e.target.result);
           
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#wknd_photos").change(function(){
    readURL(this);
});