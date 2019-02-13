

function editComment(id) {
    $.ajax({
        "url" : BASE_URL + "/comments/" + id + "/show",
        method : "get",
        type : 'json',
        success : function(data) {
            showComment(data);
        },
        error : function(error)
        {
            console.log("Something went wrong");
        }
    });
}

function showComment(data) {
    $("#insertComment").hide();
    var url = window.location.href.split("#")[0];
    var editForm = " <div class=\"comment-bottom\" id=\"insertComment\">\n" +
        "        <h3>Edit comment</h3>\n <br>" +
        "            <textarea cols=\"55\" rows=\"4\" id='contentComment' name=\"content\" placeholder=\"Leave a comment\">" + data.content + "</textarea>\n" +
        "            <button onclick='updateComment("+ data.id +")' class='btn btn-success'>Edit</button>\n" +
        "            <a href='" + url + "' class='btn btn-danger'>Cancel</a>\n" +
        "    </div>";
    $("#comments").html(editForm);
}

function updateComment(id) {
    var editedData = $("#contentComment").val();
    $.ajax({
        "url" : BASE_URL + "/comments/" + id + "/edit",
        method : "post",
        data : {
            'content' : editedData,
            '_method' : "post",
            '_token' : TOKEN
        },
        type : 'json',
        success : function(data) {
            hideAndReset(id, editedData);
        },
        error : function(error)
        {
            console.log("Something went wrong");
        }
    });
}

function hideAndReset(id, editedData)
{
    console.log(editedData);
    $("#comment" + id).html(editedData);
    $("#comments").html("<div class='alert alert-info'>Comment successfully edited!</div>");
}