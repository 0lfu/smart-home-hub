const items = document.querySelectorAll('.calc-item');
items.forEach(item => {
    item.addEventListener('mousedown', () => {
        item.style.transform = 'scale(0.97)';
        item.style.transitionDuration = '100ms';
    });
    item.addEventListener('mouseup', () => {
        item.style.transform = 'scale(0.99)';
        item.style.transitionDuration = '100ms';
    });
    item.addEventListener('mouseenter', () => {
        item.style.transform = 'scale(0.99)';
        item.style.transitionDuration = '100ms';
    });
    item.addEventListener('mouseleave', () => {
        item.style.transform = 'scale(1)';
        item.style.transitionDuration = '100ms';
    });
});

const output = document.getElementById("output");
const buttons = document.getElementById("buttons");
let prevValue = "";
let currentValue = "";
let operator = "";

buttons.addEventListener("click", (event) => {
    if (event.target.classList.contains("calc-item")) {
        const buttonValue = event.target.textContent;
        if (!isNaN(parseInt(buttonValue))) {
            currentValue += buttonValue;
            updateDisplay();
        } else {
            switch (buttonValue) {
                case "+":
                case "-":
                case "×":
                case "÷":
                handleOperator(buttonValue);
                break;
                case "%":
                handlePercent();
                break;
                case ",":
                handleDecimal();
                break;
                case "=":
                handleEqual();
                break;
                case "C":
                handleClear();
                break;
                case "◀":
                handleBackspace();
                break;
            }
        }
    }
});

function handleOperator(op) {
    if (currentValue) {
        if (prevValue) {
            handleEqual();
        }
        operator = op;
        prevValue = currentValue;
        currentValue = "";
        updateDisplay();
    }
}

function handlePercent() {
    if (currentValue) {
        currentValue = parseFloat(currentValue) / 100;
        updateDisplay();
    }
}

function handleDecimal() {
    if (currentValue.indexOf(".") === -1) {
        currentValue += ".";
        updateDisplay();
    }
}

function handleEqual() {
    if (currentValue && prevValue && operator) {
        let result;
        switch (operator) {
        case "+":
            result = parseFloat(prevValue) + parseFloat(currentValue);
            break;
        case "-":
            result = parseFloat(prevValue) - parseFloat(currentValue);
            break;
        case "×":
            result = parseFloat(prevValue) * parseFloat(currentValue);
            break;
        case "÷":
            result = parseFloat(prevValue) / parseFloat(currentValue);
            break;
        }
        currentValue = result.toString();
        prevValue = "";
        operator = "";
        updateDisplay();
    }
}

function handleClear() {
    currentValue = "";
    prevValue = "";
    operator = "";
    updateDisplay();
}

function handleBackspace() {
    if (currentValue) {
        currentValue = currentValue.slice(0, -1);
        updateDisplay();
    }
}

function updateDisplay() {
    const equation = prevValue + " " + operator + " " + currentValue;
    output.textContent = equation || "0";
}