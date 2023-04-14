const recordBtn = document.querySelector("#voiceInputIcon"),
  result = document.querySelector("#VoiceIOBox"),
  inputLanguage = "en",
  clearBtn = document.querySelector(".clear");

let SpeechRecognition = 
    window.SpeechRecognition || window.webkitSpeechRecognition,
    recognition,
    recording = false;

function speechToText() {
  try {
    recognition = new SpeechRecognition();
    recognition.lang = inputLanguage;
    recognition.interimResults = true;
    recordBtn.classList.remove("fa-microphone");
    recordBtn.classList.add("fa-microphone-slash");
    //może placeholder dla input fielda ustawić na listening?
    //recordBtn.querySelector("p").innerHTML = "Listening...";
    console.log("listening");
    recognition.start();
    recognition.onresult = (event) => {
      const speechResult = event.results[0][0].transcript;
      if (event.results[0].isFinal) {
        result.innerHTML += " " + speechResult;
        result.querySelector("p").remove();

        if (speechResult.toLowerCase().includes("search for")) {
          const query = speechResult.toLowerCase().split("search for")[1].trim();
          search(query);
        }
      } else {
        //creative p with class interim if not already there
        if (!document.querySelector(".interim")) {
          const interim = document.createElement("p");
          interim.classList.add("interim");
          result.appendChild(interim);
        }
        //update the interim p with the speech result
        document.querySelector(".interim").innerHTML = " " + speechResult;
      }
    };
    recognition.onspeechend = () => {
      speechToText();
    };
    recognition.onerror = (event) => {
      stopRecording();
      if (event.error === "no-speech") {
        alert("No speech was detected. Stopping...");
      } else if (event.error === "audio-capture") {
        alert(
          "No microphone was found. Ensure that a microphone is installed."
        );
      } else if (event.error === "not-allowed") {
        alert("Permission to use microphone is blocked.");
      } else if (event.error === "aborted") {
        alert("Listening Stopped.");
      } else {
        alert("Error occurred in recognition: " + event.error);
      }
    };
  } catch (error) {
    recording = false;

    console.log(error);
  }
}

recordBtn.addEventListener("click", () => {
  if (!recording) {
    speechToText();
    recording = true;
  } else {
    stopRecording();
  }
});

function stopRecording() {
  recognition.stop();
  recordBtn.classList.remove("fa-microphone-slash");
  recordBtn.classList.add("fa-microphone");
  recording = false;
}

clearBtn.addEventListener("click", () => {
  result.innerHTML = "";
});