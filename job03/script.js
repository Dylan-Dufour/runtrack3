// Taquin 3x3 (8-puzzle)
const puzzleEl = document.getElementById('puzzle'); // container for puzzle
const restartBtn = document.getElementById('restartBtn'); // button to restart the game
const messageEl = document.getElementById('message'); // element to display messages

// The image is split into 9 cells; we'll use indices 0..8; 8 will be the blank
const SIZE = 3;
const TOTAL = SIZE * SIZE; // 9
const BLANK = TOTAL - 1; // 8

let state = []; // array of length 9: value is tile index (0..8), value BLANK means empty
let locked = false; // locked after win

// Generate a solvable random permutation (not the solved one)
function randomSolvable(){
    const arr = [];
    for(let i=0;i<TOTAL;i++) arr.push(i); // [0,1,2,3,4,5,6,7,8]
    // Fisher-Yates
    do{
        for(let i=arr.length-1;i>0;i--){ // shuffle
            const j = Math.floor(Math.random()*(i+1)); // random index from 0 to i
            [arr[i], arr[j]] = [arr[j], arr[i]]; // swap
        }
        // ensure solvable
    } while(!isSolvable(arr) || isSolved(arr)); // repeat if not solvable or already solved
    return arr;
}

// For 3x3 puzzle, puzzle solvable when inversion count even
function isSolvable(arr){
    const flat = arr.filter(v => v !== BLANK); // remove blank
    let inv = 0;
    for(let i=0;i<flat.length;i++){ // count inversions
        for(let j=i+1;j<flat.length;j++){ // compare pairs
            if(flat[i] > flat[j]) inv++; // count inversion
        }
    }
    return inv % 2 === 0; // solvable if even inversions
}

function isSolved(arr){ // check if array is in order 0..8
    for(let i=0;i<TOTAL;i++){ // check each position
        if(arr[i] !== i) return false; // if any position incorrect, not solved
    }
    return true;
}

function render(){ // render the puzzle based on current state
    puzzleEl.innerHTML = ''; // clear
    for(let pos=0; pos<TOTAL; pos++){ // for each position
        const tileValue = state[pos]; // get tile value at this position
        const tile = document.createElement('div'); // create tile element
        tile.className = 'tile'; // set class
        tile.dataset.pos = pos; // set position
        tile.dataset.value = tileValue; // set value
        if(tileValue === BLANK){ // blank tile
            tile.classList.add('blank'); // mark as blank
        } else {
            // Each tile shows part of the logo. background-position: compute by tileValue
            const row = Math.floor(tileValue / SIZE);
            const col = tileValue % SIZE;
            // background-size 300% 300% -> each cell is 33.333% ; position from 0% to 66.666%
            const x = (col * 50) / (SIZE - 1); // simpler mapping: 0,50,100 -> but we used 300% so adjust
            const y = (row * 50) / (SIZE - 1);
            // Better: using percentages with formula col*(100/(SIZE-1))
            const px = col * (100/(SIZE-1)); // compute percentage x
            const py = row * (100/(SIZE-1)); // compute percentage y
            tile.style.backgroundPosition = `${px}% ${py}%`; // set background position
        }
        // Click handler
        tile.addEventListener('click', onTileClick); // bind click
        puzzleEl.appendChild(tile);
    }
}

function onTileClick(e){
    if(locked) return;
    const pos = Number(this.dataset.pos); // position clicked
    const tileValue = Number(this.dataset.value); // tile value clicked
    if(tileValue === BLANK) return; // clicking blank does nothing
    const blankPos = state.indexOf(BLANK); // position of blank tile
    if(isAdjacent(pos, blankPos)){ // if clicked tile is adjacent to blank
        // swap
        [state[pos], state[blankPos]] = [state[blankPos], state[pos]]; // swap values
        render(); // re-render
        checkWin(); // check for win
    }
}

function isAdjacent(a, b){ // check if positions a and b are adjacent
    const ax = a % SIZE, ay = Math.floor(a / SIZE); // coordinates of a
    const bx = b % SIZE, by = Math.floor(b / SIZE); // coordinates of b
    return (Math.abs(ax - bx) + Math.abs(ay - by)) === 1; // adjacent if Manhattan distance is 1
}

function checkWin(){ // check if puzzle is solved
    if(isSolved(state)){ // if solved
        locked = true; // lock further moves
        messageEl.textContent = 'Vous avez gagné'; // show win message
        messageEl.style.color = 'green'; // set win message color
        // show restart button enabled
        restartBtn.textContent = 'Recommencer';
    }
}

// Setup buttons
restartBtn.addEventListener('click', () => { // restart game
    locked = false; // unlock moves
    messageEl.textContent = ''; // clear message
    state = randomSolvable(); // new random state
    render();
});

// Initialize
function init(){
    state = randomSolvable(); // initial random state
    render(); // render puzzle
}

init(); // start the game
