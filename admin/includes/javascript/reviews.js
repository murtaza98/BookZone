function showReviewModal(book_id){
    var review_content = document.getElementById("content_"+book_id);
    var modal_textArea = document.getElementById("review_modal");
    var modal_book_id = document.getElementById("modal_book_id");
    if(review_content==undefined || modal_book_id == undefined){
        return;
    }
    modal_textArea.value = review_content.innerHTML;
    modal_book_id.setAttribute("value",book_id+"");
    
    
}