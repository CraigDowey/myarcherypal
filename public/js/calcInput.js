var blueButtonText = 'New Line';

var displayChildren;
var currentGo = 0;

var tieBreaker = 0;

$(function(){
    addDisplayBoxes();
    displayCalc();
    setOnClickListeners();
})


//Display cal buttons
function displayCalc(){
    var htmlButtonCode = '';
    var buttonHtmlStart = '<div class="cal-button button-base button-1">';
    var buttonHtmlEnd = '</div>';

    for (i = 1; i < 11; i++){
        htmlButtonCode += buttonHtmlStart + i + buttonHtmlEnd;
    }

    //Add submit class
    htmlButtonCode += '<div class="cal-button submit-button button-base button-1">' + blueButtonText + buttonHtmlEnd;
    htmlButtonCode += buttonHtmlStart + 'X' + buttonHtmlEnd;

    //Buttons
    $('.cal-container').html(htmlButtonCode);
}

//Add row of display boxes
function addDisplayBoxes(){
    //Style none to allow slide in
    var htmlDisplayCode = '<div class="display-container active-display" style="display: none">';

    var displayBoxHtmlStart = '<div class="display-box" data-order="';
    var displayBoxHtmlEnd = '"></div>';

    for(i = 0; i < 6; i++){
        htmlDisplayCode += displayBoxHtmlStart + i + displayBoxHtmlEnd;
    } 

    htmlDisplayCode += '</div>';

    //Add hidden code
    $('.score-lines-container').append(htmlDisplayCode);
    //Slide in hidden code
    $('.active-display').slideDown();
    //Highlight first box
    $('.active-display .display-box:first-child').addClass('display-box-current');
}

function setOnClickListeners(){

    setDisplayBoxOnClick();

    //Any cal button is clicked
    $('.cal-button').on('click', function(){
        var $this = $(this);
        displayChildren = $('.active-display').children();

        //If blueButtonText can be found
        if ($this.text().indexOf(blueButtonText) != -1){
            //NewLine Button
            var endOfGoes = true;

            //Check all display boxes have been filled
            for (i = 0; i < displayChildren.length; i++){
                if (!$(displayChildren[i]).text().length > 0){
                    //Dispaly box empty
                    endOfGoes = false;
                }

            } 


            if (endOfGoes){
                //If all display boxes have been filled
                var totalScore = Number($('#score').text());
                var averageScore;


                for (i = 0; i < displayChildren.length; i++){

                    var tempScore = $(displayChildren[i]).text();

                    if (tempScore == 'X'){
                        tempScore = 10;
                        tieBreaker++;
                    }


                    totalScore += Number(tempScore);

                }

                averageScore = totalScore / (($('.display-container').length) * 6);

                switch (true){
                    //White
                    case (0 <= averageScore && averageScore < 3):
                        $('.average-score-container').css({
                            'color': 'black',
                            'background-color': 'white'
                        });
                        break;
                    //Black
                    case (3 <= averageScore && averageScore < 5):
                        $('.average-score-container').css({
                            'color': 'white',
                            'background-color': 'black'
                        });
                        break;
                    //Blue
                    case (5 <= averageScore && averageScore < 7):
                        $('.average-score-container').css({
                            'color': 'white',
                            'background-color': '#12b6c9'
                        });
                        break;
                    //Red
                    case (7 <= averageScore && averageScore < 9):
                        $('.average-score-container').css({
                            'color': 'white',
                            'background-color': '#fb231c'
                        });
                        break;
                    //Yellow
                    case (9 <= averageScore):
                        $('.average-score-container').css({
                            'color': 'black',
                            'background-color': '#ffcc00'
                        });
                        break;
                        

                }


                $('#score').text(totalScore);
                //changed these two lines
                $('#average_score').text(Number(averageScore).toFixed(2));
                $('#tie_breaker').text(tieBreaker);

                //Current display-container is no longer active
                $('.display-container').removeClass('active-display');
                //Add new active display-container
                addDisplayBoxes();
                //Reset current go
                currentGo = 0;
                //Set on click listeners for editting score 
                setDisplayBoxOnClick();
            }

        } else {
            if (currentGo < 6) {
                //Score button has been clicked and not past the last box

                //Set score of current empty go
                $(displayChildren[currentGo]).text($this.text());

                var scoreItem = $this.text();

                if (scoreItem == 'X')
                    scoreItem = 10;

                scoreItem = Number(scoreItem);

                switch (true) {
                    //White
                    case (0 <= scoreItem && scoreItem < 3):
                        $(displayChildren[currentGo]).css({
                            'color': 'black',
                            'background-color': 'white'
                        });
                        break;
                    //Black
                    case (3 <= scoreItem && scoreItem < 5):
                        $(displayChildren[currentGo]).css({
                            'color': 'white',
                            'background-color': 'black'
                        });
                        break;
                    //Blue
                    case (5 <= scoreItem && scoreItem < 7):
                        $(displayChildren[currentGo]).css({
                            'color': 'white',
                            'background-color': '#12b6c9'
                        });
                        break;
                    //Red
                    case (7 <= scoreItem && scoreItem < 9):
                        $(displayChildren[currentGo]).css({
                            'color': 'white',
                            'background-color': '#fb231c'
                        });
                        break;
                    //Yellow
                    case (9 <= scoreItem):
                        $(displayChildren[currentGo]).css({
                            'color': 'black',
                            'background-color': '#ffcc00'
                        });
                        break;
                }

                //Move to focus and increment to next empty display box
                moveFocus(currentGo, ++currentGo);
            }
        }
    });


}

function setDisplayBoxOnClick(){
    //Remove all click events
    $('.display-box').off();
    //Add click events to active boxes
    $('.active-display .display-box').on('click', function(){
        var $this = $(this);
        //Move focus back selected box
        moveFocus(currentGo, $this.attr('data-order'));
        //Reset current go to selected place
        currentGo = $this.attr('data-order');
    });

}

function moveFocus(currentGo, nextGo){
    $(displayChildren[currentGo]).removeClass('display-box-current');
    $(displayChildren[nextGo]).addClass('display-box-current');
}
