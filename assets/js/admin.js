$("#uploaded-img").attr('src','assets/images/uploads/uploadImg.png');
var file_data ;

$.validator.setDefaults({
    submitHandler: function() {
        debugger;
        
        SubmitMyPost();
       
    }
});

$().ready(function() {
    // validate the comment form when it is submitted
    //$("#postForm").validate();

    // validate signup form on keyup and submit
    $("#postForm").validate({
        rules: {
            title: "required",
            description: {
                required: true,
                minlength: 200
            },
        },
        messages: {
            title: "Please enter Post Title",
            description: {
                required: "Please enter Post Description",
                minlength: "Post Description must consist of at least 200 characters"
            }
        }  
    });

});

function SubmitMyPost(){
    debugger;
    var file_data = $('#pic').prop('files')[0];
    var fileSplit = file_data.name.split(".");
    var filename = file_data.name;        
    var fileLength = fileSplit.length;
    var extension = fileSplit[fileLength-1];
    filename = toSeoUrl(filename);
    filename = filename.replace(extension,"-");
    var title  =  $("#title").val();
    var description =  $("#description").val();
    var mypost =  $("#mypost").val();
    var url = toSeoUrl(title);
    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('action', 'InsertPost');
    form_data.append('filename', filename);
    form_data.append('extension', extension);
    form_data.append('title', title);
    form_data.append('description', description);
    form_data.append('mypost', mypost);
    form_data.append('url', url);	
    $.ajax({
        url         : '../../../blogJioFox/server/Post.php',     // point to server-side PHP script 
        dataType    : 'text',           // what to expect back from the PHP script, if anything
        cache       : false,
        contentType : false,
        processData : false,
        data        : form_data,                         
        type        : 'post',
        success     : function(data){
            debugger;
            $("#uploaded-img").attr('src','../assets/images/uploads/uploadImg.png');
            $('#postForm').trigger("reset");
            alert("added.");
        },
        error: function (request, status, error) {
            console.log('oh, errors here. The call to the server is not working.')
        }
    });
}

function toSeoUrl(url) {
    return url.toString()               // Convert to string
        .normalize('NFD')               // Change diacritics
        .replace(/[\u0300-\u036f]/g,'') // Remove illegal characters
        .replace(/\s+/g,'-')            // Change whitespace to dashes
        .toLowerCase()                  // Change to lowercase
        .replace(/&/g,'-and-')          // Replace ampersand
        .replace(/[^a-z0-9\-]/g,'')     // Remove anything that is not a letter, number or dash
        .replace(/-+/g,'-')             // Remove duplicate dashes
        .replace(/^-*/,'')              // Remove starting dashes
        .replace(/-*$/,'');             // Remove trailing dashes
 }

 $('#pic').on('change', function() {
    UploadImage(this);
 }); 

function UploadImage(input) {      
    if (input.files && input.files[0]) {
        file_data = input.files[0];
        var reader = new FileReader();  
        reader.onload = function(e) {
          $('#uploaded-img').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
      }
}


