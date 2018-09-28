function starRating(id, value) {
    var rating = value ;
    var filledStars = Math.round(rating);
    var emptyStars = 5 - filledStars;
    var output = '<span title="'+rating+'">';
    while (filledStars > 0) {
        output += '<i class="fa fa-star checked"></i>&nbsp;';
        filledStars--;
    }
    while (emptyStars >= 1) {
        output += '<i class="fa fa-star"></i>&nbsp;';
        emptyStars--;
    }
    output += '</span>';
    document.getElementById(id).innerHTML = output;
 }

function bigStarRating(id,value){
    var rating = value ;
    var filledStars = Math.round(rating);
    var emptyStars = 5 - filledStars;
    var output = '<span title="'+rating+'">';
    while (filledStars > 0) {
        output += '<i class="fa fa-star checked review_star"></i>&nbsp;';
        filledStars--;
    }
    while (emptyStars >= 1) {
        output += '<i class="fa fa-star review_star"></i>&nbsp;';
        emptyStars--;
    }
    output += '</span>';
    document.getElementById(id).innerHTML = output;
}


function review_bar(class_name,width){
    var element = document.getElementsByClassName(class_name);
    
    element[0].style.width = width;
    element[0].style.height = '18px';
    
    switch(class_name){
        case 'bar-5':
            element[0].style.backgroundColor = '#4CAF50';
            break;
        case 'bar-4':
            element[0].style.backgroundColor = '#2196F3';
            break;
        case 'bar-3':
            element[0].style.backgroundColor = '#00bcd4';
            break;
        case 'bar-2':
            element[0].style.backgroundColor = '#ff9800';
            break;
        case 'bar-1':
            element[0].style.backgroundColor = '#f44336';
            break;
        default:
            break;
    }
}