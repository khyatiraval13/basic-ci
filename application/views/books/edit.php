<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Book Display</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        
    </head>
    <body>
<div class="container">
    <div class="row">
        <div class="col-md-8">
        <h1>Edit Book List</h1>
        <form name="book_edit" id="book_edit" method="POST" onsubmit="bookEditSubmit(event);" enctype="multipart/form-data">
            <input type="hidden" name="book_id" value="<?php echo (!empty($book_detail['ID'])) ? $book_detail['ID'] : '' ?>">
        <div class="form-group">
            <label for="book_title">Book Title:</label>
            <input type="text" class="form-control" name="book_title" id="book_title" value="<?php echo (!empty($book_detail['name'])) ? $book_detail['name'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="book_price">Book Price:</label>
            <input type="text" class="form-control" name="book_price" id="book_price" value="<?php echo (!empty($book_detail['price'])) ? $book_detail['price'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="book_author">Book Author:</label>
            <input type="text" class="form-control" name="book_author" id="book_author" value="<?php echo (!empty($book_detail['author'])) ? $book_detail['author'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="book_publisher">Publisher:</label>
            <input type="text" class="form-control" name="book_publisher" id="book_publisher" value="<?php echo (!empty($book_detail['publisher'])) ? $book_detail['publisher'] : '' ?>">
        </div>

        <div class="form-group">
            <label for="book_publisher">Image:</label>
            <input type="file" class="form-control" name="book_image" id="book_image" value="<?php echo (!empty($book_detail['book_image'])) ? $book_detail['book_image'] : '' ?>">
            <input type="file" name="dataupload" id="myupload">
        </div>

        <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        var baseurl = '<?php echo base_url(); ?>';
 
function bookEditSubmit(e){
    console.log(1121);
    e.preventDefault();
   // var formAction = form.attr('action');
    var formData = $("#book_edit").serialize();
    $.ajax({
        url: baseurl + 'books/editData',
        type: 'post',
        data: formData,
        success: function (result) {
            if(result == 1){
                alert('Your data has been successfully updated');
                window.location = baseurl + 'books';
            }else{
                alert('Oops! something is wrong.');
                location.reload();
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            return false;
        }
    });
}
</script>
    </body>
</html>