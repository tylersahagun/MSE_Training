var jumpSound = new Audio('assets/smb3_jump.wav');
var gameOverSound = new Audio('assets/smb3_player_down.wav');

function generateChar() {
    const CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijxlmnopqrstuvwxyz";

    return CHARS[Math.floor(Math.random() * CHARS.length)];
}

document.getElementById("char").textContent = generateChar();
var ranChar = document.getElementById("char").textContent;
console.log(ranChar);

var character = document.getElementById("character");
document.addEventListener("keypress", checkKey);

function checkKey(e) {
    let key = e.which || e.keyCode;
    if (key === ranChar.charCodeAt(0)) jump();
}

function newKey() {
    ranChar = document.getElementById("char").textContent;
    console.log(ranChar);
    document.removeEventListener("keypress", checkKey);
    document.addEventListener("keypress", checkKey);
}

function jump() {
    if(character.classList == "animate") {
        return;
    }
    character.classList.add("animate");
    jumpSound.play();
    document.getElementById("char").textContent = generateChar();
    newKey();

    setTimeout(removeJump,600);
};

function removeJump() {
    character.classList.remove("animate");
}

var block = document.getElementById("block");
function checkDead(){
    let characterTop = parseInt(window.getComputedStyle(character).getPropertyValue("top"));
    let blockLeft = parseInt(window.getComputedStyle(block).getPropertyValue("left"));
    if(blockLeft<20 && blockLeft>-20 && characterTop>=130){
        gameOverSound.play();
        alert("Game Over");
        console.log("Hit detection");
    }
}

setInterval(checkDead, 10);

