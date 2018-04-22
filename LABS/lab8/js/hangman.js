//variables
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
var wordlist = [];
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{word: "snake", hint: "It's a reptile."},
{word: "monkey",hint: "It's a mammal."},
{word: "beetle", hint: "It's an insect."},
{word: "horse", hint: "It's a mammal."},
{word: "dolphin", hint: "It's a mammal."},
{word: "dog", hint: "It's a mammal."}];

//events
window.onload = startGame();

$(".letter").click( function()
{
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$("#letterBtn").click(function()
{
    // alert("You pressed the button and it had the value " + boxVal);
    // var boxVal = $("#letterBox").val();
    alert( $("#letterBox").val())
} );

function startGame()
{
    createLetters();
    pickWord();
    initBoard();
    updateBoard();
}

function showWords()
{
    wordlist.push(selectedWord);
    $("#list").append("Words guessed: ");
    for(x = 0; x < wordlist.length; x++)
    {
         $("#list").append(wordlist[x]);
    }
}

function initBoard()
{
    for(var letter in selectedWord)
    {
        board.push("_");
    }
}

function pickWord()
{
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function updateBoard()
{
    $("#word").empty();
    
    
    for (var i=0; i < board.length; i++){
        $("#word").append(board[i] + " ");
    }
    
    
    // for(var letter of board)
    // {
    //     document.getElementById("word").innerHTML += letter + " ";
    // }
    
    $("#hint").click(function()
{
    
    $("#word").append("<br />");
    $("#word").append("<span class='hint'> Hint: " + selectedHint + "</span>");
    remainingGuesses -= 1;
    updateMan();
    $('#hint').hide();
    
});
}

$(".replayBtn").on("click", function()
{
    location.reload();
    // document.getElementById("letters").innerHTML = "";
    
    // createLetters();
    // $("#letters").show();
        
    // // for(var letter of alphabet)
    // // {
    // //     enableButton($(letter.attr("id")));
    // // }
    
    // board = [];
    // selectedWord = "";
    // selectedHint = "";
    // remainingGuesses = 6;
    
    // $('#won').hide();
    // $('#lost').hide();
    
    // $("#hangImg").attr("src", "img/stick_0.png");
    
    // pickWord();
    // initBoard();
    // updateBoard();
} );

function createLetters()
{
    for(var letter of alphabet)
    {
        $("#letters").append("<button class = 'letter' id = '" + letter + "'>" + letter + "</button>");
    }
}

function disableButton(btn)
{
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}

function enableButton(btn)
{
    btn.prop("disabled",false);
}

function checkLetter(letter)
{
    var positions = new Array();
    for(var i = 0; i < selectedWord.length; i++)
    {
        //console.log(selectedWord);
        if(letter == selectedWord[i])
        {
            positions.push(i);
        }
    }
    
    if(positions.length > 0)
    {
        updateWord(positions, letter);
        
        if(!board.includes('_'))
        {
            endGame(true);
            showWords();
        }
    }
    else
    {
        remainingGuesses -= 1;
        updateMan();
    }
    if(remainingGuesses <= 0)
    {
        endGame(false);
    }
}

function updateWord(positions, letter)
{
    for(var pos of positions)
    {
        board[pos] = letter;
    }
    updateBoard();
}

function updateMan()
{
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win)
{
    $("#letters").hide();
    if(win)
    {
        $('#won').show();
    }
    else
    {
        $('#lost').show();
    }
}
