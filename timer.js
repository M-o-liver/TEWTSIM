let timer = 600; // 10 minutes in seconds

function startTimer() {
    const timerInterval = setInterval(() => {
        timer--;
        document.getElementById('timer').textContent = `Time remaining: ${Math.floor(timer / 60)}:${timer % 60}`;
        if (timer <= 0) {
            clearInterval(timerInterval);
            document.forms[0].submit(); // Auto-submit the form when time is up
        }
    }, 1000);
}

window.onload = startTimer;
