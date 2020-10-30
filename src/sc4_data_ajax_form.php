<form
    action="sc4_data_ajax_post.php"
    id="ajax-form"
    method="POST">

    <label for="myInputFormData">
        Type and Send to generate a 2nd AJAX call with POST content
        <input type="text" name="myInputFormData">
        <button>Send</button>

    </label>
    

    <label class="post-content" for="post-content">
        This is the POST content:
    </label>
    <div id="output" name="post-content" class="post-content"></div>

</form>