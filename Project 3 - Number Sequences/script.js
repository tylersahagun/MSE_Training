const SEQ_LENGTH = 6;

let answer = null;
let correctCount = 0;
let wrongCount = 0; 
let numSeq = "";
let userAnswer = 0;


function getRanInt(min, max) {

    min = Math.ceil(min);
    max = Math.floor(max); 
    return Math.floor(Math.random() * (max - min) + min);
}

function newProblem() {
    console.log("onClick Working");

    var seqStart = getRanInt(1,50);
    var seqPattern = getRanInt(1,10);
    var blankNum = getRanInt(0, SEQ_LENGTH);
    let numSeq = "";

    for(var i = 0; i < SEQ_LENGTH; i++) {
                if(i == blankNum) {
                    numSeq += "_ ";
                    answer = ((i + seqStart) * seqPattern);
                }
                else {
                    numSeq += ((i + seqStart) * seqPattern) + " ";
                }

            //This is for trying different types of operators in different cases
            //I am running into the error of multiple blank spaces and repeated calculations leading to double numbers


            /*
            if(blankNum == 2) {
                if(i == blankNum) {
                    numSeq += "_ ";
                    answer = ((i - seqStart) * seqPattern);
                }
                else {
                    numSeq += ((i - seqStart) * seqPattern) + " ";
                }
            }
            if(blankNum == 3) {
                if(i == blankNum) {
                    numSeq += "_ ";
                    answer = ((i * seqStart) * seqPattern);
                }
                else {
                    numSeq += ((i * seqStart) * seqPattern) + " ";
                }
            }
            if(blankNum == 4) { 
                if(i == blankNum) {
                    numSeq += "_ ";
                    answer = ((i + seqStart) + seqPattern);
                }
                else {
                    numSeq += ((i + seqStart) + seqPattern) + " ";
                }
            }
            if(blankNum == 5) {
                if(i == blankNum) {
                    numSeq += "_ ";
                    answer = ((i * 7 * seqStart) * seqPattern);
                }
                else {
                    numSeq += ((i * 7 * seqStart) * seqPattern) + " ";
                }
            }
            if(blankNum == 6) {
                if(i == blankNum) {
                    numSeq += "_ ";
                    answer = ((i - 9 - seqStart * 2) * seqPattern);
                }
                else {
                    numSeq += ((i - 9 - seqStart * 2) * seqPattern) + " ";
                }   
            } */
        }
    console.log(numSeq);
    console.log(answer);
    document.getElementById('seqNums').textContent = numSeq;
}

function checkAnswer() {
    console.log("check working");

    userAnswer = document.getElementById('userIn').value;
    console.log(userAnswer)

    if(userAnswer == answer) {
        correctCount += 1;
        document.getElementById('rightCount').textContent = correctCount;
        newProblem();
    }
    else {
        wrongCount += 1;
        document.getElementById('wrongCount').textContent = wrongCount;
        newProblem();
    }

}

function clearLog() {
    console.log("clear working");
    correctCount = 0;
    wrongCount = 0;
    document.getElementById('rightCount').textContent = correctCount;
    document.getElementById('wrongCount').textContent = wrongCount;
    newProblem();

}