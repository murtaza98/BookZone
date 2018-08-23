function starRating(value) {
    var rating = value ;
    var filledStars = Math.round(rating);
    var emptyStars = 10 - filledStars;
    var output = '<div title="'+rating+'">';
    while (filledStars > 0) {
        output += '<i class="glyphicon glyphicon-star" style="color: black; "></i>';
        filledStars--;
    }
    while (emptyStars >= 1) {
        output += '<i class="glyphicon glyphicon-star-empty" style="color: black; "></i>';
        emptyStars--;
    }
    output += '</div>';
    return output;
 }            