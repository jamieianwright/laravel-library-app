$(document).ready(function(){
    $("#addbtn").click(function(){
      $(this).text(function(i, text){
          return text === "Add New Book" ? "Close" : "Add New Book";
      })
    });

    $(".bookTitle").click(function(e){
      var id = $(this).parent('.book').data('id')
      $(this).text(function(i, text){
        $('#updateTitle').val(text)
      })
      $(this).siblings('.bookReleaseDate').text(function(i, text){
        $('#updateReleaseDate').val(text)
      })
      $(this).siblings('.bookDescription').text(function(i, text){
        $('#updateDescription').val(text)
      })
      $(this).siblings('.bookAuthor').text(function(i, text){
        $("#updateAuthor option:contains(" + text + ")").attr('selected','selected');
      }).change()
      $(this).siblings('.bookPublisher').text(function(i, text){
        $("#updatePublisher option:contains(" + text + ")").attr('selected','selected');
      })
      $('#updateBookForm').attr('action', '/books/' + id)
      $('#deleteBookForm').attr('action', '/books/' + id)
    })
});