`use strict`;
// 新規ボックス作成
function addBox(boxNumber) {
    const divTest = document.getElementById('test');
    const divToAdd = document.createElement('div');
    divToAdd.classList.add('sample', 'font-weight-bold', 'font-italic', 'bg-warning');
    divToAdd.addEventListener('click', () => {
        alert(`アラート：${boxNumber}`);
    });
    divToAdd.textContent = boxNumber;
    styleChange(divToAdd, boxNumber);
    addBoxFirstChildInDiv(divToAdd, boxNumber);
    divTest.appendChild(divToAdd);
}
// ボックスの中にdiv作成
function addBoxFirstChildInDiv(divToAdd, boxNumber) {
    const divToAddInDiv = document.createElement('div');
    divToAddInDiv.classList.add('card');
    divToAddInDiv.textContent = `カード番号：${boxNumber}`;
    divToAdd.appendChild(divToAddInDiv);
}
// css設定
function styleChange(divToAdd, boxNumber) {
    Object.assign(divToAdd.style, {
        width: `${100 + boxNumber}px`,
        height: `${50 + boxNumber}px`,
        margin: '10px auto',
        textAlign: 'center',
        fontSize: '10px',
        borderRadius: '10px'
    });
}

// 繰り返し：box作成
for (let i = 0; i < 100; i++) {
    addBox(i + 1);
}


let arrayClass = [1, 2, 33, 4, 10, 6];
let addFor = '<div>aaa</div>';

arrayClass.push(addFor);
arrayClass.sort(function (a, b) { return b - a; });
console.log(arrayClass);