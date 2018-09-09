function starRating(id, value) {
    var rating = value ;
    var filledStars = Math.round(rating);
    var emptyStars = 5 - filledStars;
    var output = '<span title="'+rating+'">';
    while (filledStars > 0) {
        output += '<i class="fas fa-star"></i>&nbsp;';
        filledStars--;
    }
    while (emptyStars >= 1) {
        output += '<i class="far fa-star"></i>&nbsp;';
        emptyStars--;
    }
    output += '</span>';
    document.getElementById(id).innerHTML = output;
 }            