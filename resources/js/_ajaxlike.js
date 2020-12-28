$(function () {
  var like = $('.js-like-toggle');
  var likePostId;
  
  like.on('click', function () {
      var $this = $(this);
      likePostId = $this.data('postid');
      $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: '/ajaxlike', 
              type: 'POST', 
              data: {
                  'post_id': likePostId //コントローラーに渡すパラメーター
              },
      })
  
            .done(function (data) {
                $this.toggleClass('liked'); 
                $this.next('.likesCount').html(data.postLikesCount); 
                console.log(data.postLikesCount);

            })

          .fail(function (data, xhr, err) {
              console.log('エラー');
              console.log(err);
              console.log(xhr);
          });
      
      return false;
  });
  });