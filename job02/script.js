// Colors in correct order (left to right): red, orange, yellow, green, blue, purple
const colors = ['red','orange','yellow','green','blue','purple'];

const board = document.getElementById('board');
const slots = Array.from(document.querySelectorAll('.slot'));
const shuffleBtn = document.getElementById('shuffleBtn');
const resetBtn = document.getElementById('resetBtn');
const resultEl = document.getElementById('result');

// Create image elements for the pieces
function createPiece(color){
    const img = document.createElement('img');
    img.className = 'piece';
    img.draggable = true;
    img.alt = color;
    img.dataset.color = color;
    img.src = `${color}.svg`;
    // dragstart
    img.addEventListener('dragstart', (e) => {
        e.dataTransfer.setData('text/plain', color);
        e.dataTransfer.effectAllowed = 'move';
        img.classList.add('dragging');
    });
    img.addEventListener('dragend', () => img.classList.remove('dragging'));
    return img;
}

// Place pieces into slots in given order
function placePieces(order){
    // clear slots
    slots.forEach(s => s.innerHTML = '');
    order.forEach((color, i) => {
        const piece = createPiece(color);
        slots[i].appendChild(piece);
    });
}

// Shuffle array
function shuffleArray(arr){
    const a = arr.slice();
    for(let i = a.length -1; i>0; i--){
        const j = Math.floor(Math.random()*(i+1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}

// Drag & Drop handlers for slots
slots.forEach(slot => {
    slot.addEventListener('dragover', (e) => {
        e.preventDefault();
        e.dataTransfer.dropEffect = 'move';
        slot.classList.add('drag-over');
    });
    slot.addEventListener('dragleave', () => slot.classList.remove('drag-over'));
    slot.addEventListener('drop', (e) => {
        e.preventDefault();
        slot.classList.remove('drag-over');
        const color = e.dataTransfer.getData('text/plain');
        // remove piece from its old parent
        const dragging = document.querySelector('.dragging');
        if(dragging){
            // If dropped onto a slot that already has a child, swap
            if(slot.firstElementChild){
                const targetPiece = slot.firstElementChild;
                const srcParent = dragging.parentElement;
                // swap nodes
                slot.replaceChild(dragging, targetPiece);
                srcParent.appendChild(targetPiece);
            } else {
                // move
                slot.appendChild(dragging);
            }
        } else {
            // fallback: create new piece
            slot.appendChild(createPiece(color));
        }
        checkWin();
    });
});

// Check whether the pieces are in the correct order
function checkWin(){
    const current = slots.map(s => s.firstElementChild ? s.firstElementChild.dataset.color : null);
    const complete = current.every(c => c !== null);
    if(!complete){
        resultEl.textContent = '';
        return;
    }
    const ok = current.every((c, i) => c === colors[i]);
    if(ok){
        resultEl.textContent = 'Vous avez gagné';
        resultEl.style.color = 'green';
    } else {
        resultEl.textContent = 'Vous avez perdu';
        resultEl.style.color = 'red';
    }
}

// Shuffle button
shuffleBtn.addEventListener('click', () => {
    const shuffled = shuffleArray(colors);
    placePieces(shuffled);
    resultEl.textContent = '';
});

// Reset to correct order
resetBtn.addEventListener('click', () => {
    placePieces(colors);
    resultEl.textContent = '';
});

// initialize in order
placePieces(colors);