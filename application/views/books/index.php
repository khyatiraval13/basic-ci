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
    <div class="row" >
            <div class="col-xs-12" >
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="callout callout-success">
                        <p><?php echo $this->session->flashdata('success'); ?></p>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="callout callout-danger">
                        <p><?php echo $this->session->flashdata('error'); ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    <div class="row">
    <div class="col-md-12">

    <h1>Book List</h1>

    <table id="book-table" class="table table-bordered table-striped table-hover">
     <thead>
     <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td><td>Action</td></tr>
     </thead>
     <tbody>
     </tbody>
     </table>

    </div>
    </div>
    </div>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        var baseurl = '<?php echo base_url(); ?>';
$(document).ready(function() {
    $('#book-table').DataTable({
        "pageLength" : 5,
        "ajax": {
            url : "<?php echo site_url("books/books_page") ?>",
            type : 'GET'
        },
    });
});

function deleteData(id){
    $.ajax({
        url: baseurl + 'books/deleteData',
        type: 'post',
        data: 'id=' + id,
        beforeSend: function () {
            //showLoader();
        },
        success: function (result) {
            console.log(result);
            if (result > 0) {
                alert('Your data successfuly deleted');
                 location.reload();
                // hideLoader();
                // swal("Thanks!", "Thank you for sending request, we will be in touch with you very soon!", "success");
                // $("#productsafetyform").data('bootstrapValidator').resetForm();
                // $("#productsafetyform")[0].reset();
                // grecaptcha.reset();
            } else {
                alert('Sorry, Something wents wrong');
                 location.reload();
                // swal("Error!", "Please select captcha", "error");
                // hideLoader();
                // $("#form_submit").attr('disabled', false);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            return false;
        }
    })
}  
</script>
    </body>
</html>