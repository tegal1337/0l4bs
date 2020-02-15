const BLACKLISTED_KEY_CODES = [38];
const COMMANDS = {
  help:
    'Supported commands: <span class="code">about</span>, <span class="code">ls</span>, <span class="code">join</span>, <span class="code">contact</span>',
  ls:
    'List of chall : <br><br> ~ <a href="/xss-labs/chall/1.php">Chall 1 | URL </a><br> ~ <a href="/xss-labs/chall/2.php">Chall 2 | Form </a><br>~ <a href="/xss-labs/chall/3.php">Chall 3 | User-Agent </a><br>~ <a href="/xss-labs/chall/4.php">Chall 4 | Referrer </a><br>~ <a href="/xss-labs/chall/5.php">Chall 5 | Cookie </a><br>~ <a href="/xss-labs/chall/6.php">Chall 6 | LocalStorage </a><br>~ <a href="/xss-labs/chall/7.php">Chall 7 | Login Page </a><br>~ <a href="/xss-labs/chall/8.php">Chall 8 | File Upload </a><br>~ <a href="/xss-labs/chall/9.php">Chall 9 | Base64 Encoding </a><br>~ <a href="/xss-labs/chall/10.php">Chall 10 | Removes Alert </a><br>~ <a href="/xss-labs/chall/11.php">Chall 11 | Removes Script </a><br>~ <a href="/xss-labs/chall/12.php">Chall 12 | Preg_replace </a><br>~ <a href="/xss-labs/chall/13.php">Chall 13 | HTML Entities </a><br>~ <a href="/xss-labs/chall/14.php">Chall 14 | Regex Filter #1 </a><br>~ <a href="/xss-labs/chall/15.php">Chall 15 | Regex Filter #2 </a><br>~ <a href="/xss-labs/chall/16.php">Chall 16 | Regex Filter #3 </a><br>~ <a href="/xss-labs/chall/17.php">Chall 17 | HTML Entities + URL Encode </a><br>~ <a href="/xss-labs/chall/18.php">Chall 18 | HTML Entities #2 (Special Character) </a><br>~ <a href="/xss-labs/chall/19.php">Chall 19 | HTML Entities #3 (Input Value) </a><br>~ <a href="/xss-labs/chall/20.php">Chall 20 | HTML Entities #4 (Input Value + Capitalizes) </a><br>',
  about:
    'XSS Labs | Tegal1337<br>Cross-site scripting labs for web application security enthusiasts, <br>This website is made for practice, please dont hack',
  join:
    'Lets contribute with us, just enter your github username via email contact@dalpan.co with subject "JOIN Tegal1337"',
  resume: "<a href='#' class='success link'>resume.pdf</a>",
  experience: "No Experience😥",
  contact:
    "You can contact us on any of following links:<br><a href='https://www.facebook.com/tegal1337/' class='success link'>Facebook</a> ,<a href='https://www.instagram.com/tegal1337/' class='success link'>Instagram</a>",
  labs:
  "<ul><li><a href='https://labs.dalpan.co/xssrf/' class='succes link'>XSSRF</a></li><li><a href='https://dalpan.co/code/' class='succes link'>Code Playground</a></li></ul>"
};
let userInput, terminalOutput;

const app = () => {
  userInput = document.getElementById("userInput");
  terminalOutput = document.getElementById("terminalOutput");
  document.getElementById("dummyKeyboard").focus();
  console.log("Application loaded");
};

const execute = function executeCommand(input) {
  let output;
  input = input.toLowerCase();
  if (input.length === 0) {
    return;
  }
  output = `<div class="terminal-line"><span class="success">➜</span> <span class="directory">~</span> ${input}</div>`;
  if (!COMMANDS.hasOwnProperty(input)) {
    output += `<div class="terminal-line">no such command: ${input}</div>`;
    console.log("Oops! no such command");
  } else {
    output += COMMANDS[input];
  }

  terminalOutput.innerHTML = `${
    terminalOutput.innerHTML
  }<div class="terminal-line">${output}</div>`;
  terminalOutput.scrollTop = terminalOutput.scrollHeight;
};

const key = function keyEvent(e) {
  const input = userInput.innerHTML;

  if (BLACKLISTED_KEY_CODES.includes(e.keyCode)) {
    return;
  }

  if (e.key === "Enter") {
    execute(input);
    userInput.innerHTML = "";
    return;
  }

  userInput.innerHTML = input + e.key;
};

const backspace = function backSpaceKeyEvent(e) {
  if (e.keyCode !== 8 && e.keyCode !== 46) {
    return;
  }
  userInput.innerHTML = userInput.innerHTML.slice(
    0,
    userInput.innerHTML.length - 1
  );
};

document.addEventListener("keydown", backspace);
document.addEventListener("keypress", key);
document.addEventListener("DOMContentLoaded", app);