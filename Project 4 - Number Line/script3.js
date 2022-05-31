var dragging = false;
var block_size = 0;
var total_change = 0;
var total_max = 0;
var answer

const rand_num = (max) => {
    return Math.floor(Math.random() * (max - 1)) + 1;
}

const drag = (e, size) => {
    if(!dragging) {
        dragging = true;
        block_size = size;

        let newGhostBlock = document.createElement("div");

        newGhostBlock.className = "box" + size;
        newGhostBlock.id = "bldrag";
        newGhostBlock.style.position = "absolute";
        newGhostBlock.style.top = e.clientY - 20 + "px";
        newGhostBlock.style.left = e.clientX - 20 + "px";

        document.getElementsByTagName('body')[0].appendChild(newGhostBlock);
    }
}

const checkifholding = () => {
    if(dragging) {
        //remove bldrag element completely
        dragging = false;

        document.getElementById("bldrag").remove();

        let newBlock = document.createElement("div");

        newBlock.className = "box" + block_size;
        newBlock.id = "blplaced" + block_size;

        
        newBlock.style.margin = "10px";
        newBlock.style.padding = "10px";
        newBlock.style.position = "static";
        newBlock.style.display = "inline-block";

        total_change += block_size;

        document.getElementById("changeContain").appendChild(newBlock);
        
    }
}

const voidSelection = () => {
    if(dragging) {
        dragging = false;

        document.getElementById("bldrag").remove();

        block_size = 0;
    }
}

const mouse_move = (e) => {
    if(dragging) {
        let mouseX = e.clientX;
        let mouseY = e.clientY;

        let elem = document.getElementById("bldrag");

        elem.style.display = "block";
        elem.style.top = mouseY + "px";
        elem.style.left = mouseX + "px";
        elem.style.marginBottom = "10px";

    }
}

function newMoney() {
    let newNum = getRandomNumberBetween(100, 1000);
    let nextInt = Math.ceil(newNum);
    answer = Math.round(100 * (nextInt - newNum)) / 100;
  
    document.getElementById('changeContain').innerHTML = "";
    total_change = 0;

    document.getElementById('changeRequest').textContent = "The price is $" + newNum +
                                                            " and you are given $" + nextInt;
    document.getElementById('changeCounted').textContent = "Please enter the correct amount of change ";
    console.log(answer);
  } 

function calcChange() {
    console.log("the answer is " + answer);
    document.getElementById('changeCounted').textContent = "$" + total_change / 100;

    if (total_change/100 == answer) {
        alert("Correct!");
        newMoney();
    }
    else {
        alert("Try again!");
    }
  }
  
function getRandomNumberBetween(min,max){
    return Math.floor(Math.random()* (max - min) + min) / min;
  }

function resetCounter() {
    document.getElementById('changeContain').innerHTML = "";
    total_change = 0;
}
