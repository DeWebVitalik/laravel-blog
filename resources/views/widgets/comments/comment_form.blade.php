@inject('Comments', 'App\Widgets\Comments')
<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
        <div class="alert alert-danger alert-comment" style="display:none"></div>
        <div class="alert alert-success alert-comment" style="display:none"></div>
        <form action="{{$action}}" method="post" id="category-comment-form">
            <input type="hidden" name="{{$type==$Comments::TYPE_POST ? 'post_id' : 'category_id'}}" value="{{$id}}">
            <div class="form-group">
                <input type="text" name="author" class="form-control" placeholder="Enter you name and soname">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>

<script>
    window.onload = function () {
        jQuery('#category-comment-form').submit(function (e) {
            let $form = $(this);
            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: $form.serialize(),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    //reset form
                    $form.trigger('reset');
                    //hide error alerts
                    jQuery('.alert-danger').hide(200);
                    jQuery('.alert-comment-not-found').hide();
                    //show success
                    jQuery('.alert-success').show(200);
                    jQuery('.alert-success').text(res.success);
                    //show new comment
                    let commentTemplate = '<div class="media mb-4 comment new-comment">\n' +
                        '    <div class="avatar box-shadow">\n' +
                        '        <i class="fa fa-user" aria-hidden="true"></i>\n' +
                        '    </div>\n' +
                        '    <div class="media-body">\n' +
                        '        <h5 class="mt-0">' + res.comment.author + '</h5>\n' + res.comment.content +
                        '    \n</div>\n' +
                        '</div>';
                    jQuery('.comments-box').append(commentTemplate);
                    //scroll to a new comment
                    let destination = $('.new-comment').offset().top;
                    $('html').animate({scrollTop: destination}, 1100);
                },
                error: function (res) {
                    //clear error text
                    jQuery('.alert-danger').text('');
                    //hide success alert
                    jQuery('.alert-success').hide(200);
                    //show errors
                    jQuery.each(res.responseJSON, function (key, value) {
                        jQuery('.alert-danger').show(200);
                        jQuery('.alert-danger').append('<p>' + value + '</p>');
                    });
                }
            });
            //disable submit
            e.preventDefault();
            //hide alerts
            window.setTimeout(function () {
                $('.alert-comment').fadeOut(200);
            }, 3000);
        });
    }
</script>